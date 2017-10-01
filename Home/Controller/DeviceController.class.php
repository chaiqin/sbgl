<?php

namespace Home\Controller;

use Tools\IndexController,
    Model\BorrowModel,
    Model\RepairModel,
    Model\BuyModel,
    Model\ManufacturerModel;

class DeviceController extends IndexController {

    //设备采购录入
    function buy($name, $purchaser, $purchase_date, $unit_price, $total, $class, $manufacturer) {
        $bymd = new BuyModel();
        $mfmd = new ManufacturerModel();
        $dcmd = M('Device_class');
        $dmmd = M('Dc_mf');

        $record['person'] = $purchaser;
        $record['time'] = strtotime($purchase_date);
        $record['name'] = $name;
        $record['price'] = $unit_price;
        $record['number'] = $total;
        $record['dc'] = $class;
        $record['mf'] = $manufacturer;

        $data['status'] = 400;
        $data['data'] = '';

        //初步自动验证信息
        $shu = $bymd->create($record);
        if (!$shu) {
            $data['msg'] = $bymd->getError();
            $this->ajaxReturn($data);
        }

        //分类及厂商处理
        $dcid = $dcmd->where("dc_name='{$class}'")->getField('dc_id');
        $mfid = $mfmd->where("mf_name='{$manufacturer}'")->getField('mf_id');
        if (!$dcid) {
            $charu['dc_name'] = $class;
            $dcid = $dcmd->add($charu);
        }
        if (!$mfid) {
            $input['mf_name'] = $manufacturer;
            $mfid = $mfmd->add($input);
        }

        //分类及厂商关联
        $cha['dm_dcid'] = $dcid;
        $cha['dm_mfid'] = $mfid;
        $dmid = $dmmd->where($cha)->getField('dm_id');
        if (!$dmid) {
            $dmmd->add($cha);
        }

        //录入
        $shu['dc_id'] = $dcid;
        $shu['manufacturer_id'] = $mfid;
        if ($bymd->add($shu)) {
            $data['status'] = 200;
            $data['msg'] = '添加成功';
        } else {
            $data['msg'] = '添加失败';
        }

        $this->ajaxReturn($data);
    }

    //获取设备信息
    function getInformation($identifier) {
        $dvmd = M('Device');
        $data['status'] = 400;
        $iden['dv_identifier'] = $identifier;
        $dv = $dvmd->where($iden)->find();
        if ($dv) {
            $dcmd = M('Device_class');
            $rpmd = M('Repair');
            $cl = $dcmd->where("dc_id=$dv[dv_dcid]")->getField('dc_name');
            $rp = $rpmd->where("rp_status=2 and rp_solve_status!=2 and rp_device_identifier=$dv[dv_identifier]")->getField('rp_solve_status');
            $data['data']['identifier'] = $dv['dv_identifier'];
            $data['data']['class'] = $cl;
            $data['data']['version'] = $dv['dv_version'];
            $data['data']['state'] = 400;
            if ($rp == 1) {
                $data['data']['warm'] = '待维修';
            } else if ($rp == 3) {
                $data['data']['warm'] = '维修中';
            } else if ($rp == 4) {
                $data['data']['warm'] = '无法维修';
            } else {
                $data['data']['warm'] = '正常';
                $data['data']['state'] = 200;
            }
            $data['status'] = 200;
            $data['msg'] = '获取成功';
        } else {
            $data['data'] = '';
            $data['msg'] = '无此设备！';
        }
        $this->ajaxReturn($data);
    }

    //设备借用录入
    function borrow($identifier, $person,$reason, $time, $return_time) {
        $brmd = new BorrowModel();
        $dvmd = M('Device');

        $data['status'] = 400;
        $data['data'] = '';

        $array['br_user'] = $person;
        $array['br_reason'] = $reason;
        $array['br_time'] = strtotime($time);
        $array['br_return_time'] = strtotime($return_time);
        $array['br_status'] = 2;
        $array['br_consent'] = session('admin_user');

        //检验借用设备是否存在
        $iden = $identifier;
        foreach ($iden as $v) {
            $result = $brmd->where("br_actual_time is null and br_device_identifier=$v")->getField('br_id');
            $finally = $dvmd->find($v);
            if ($result) {
                $data['msg'] = '设备' . $v . '已被借用！';
                $this->ajaxReturn($data);
            }
            if (empty($finally)) {
                $data['msg'] = '设备' . $v . '不存在！';
                $this->ajaxReturn($data);
            }
        }

        //检验提交的信息并录入数据
        $shu = $brmd->create($array);
        if (!$shu) {
            $data['msg'] = $brmd->getError();
        } else {
            foreach ($iden as $m) {
                $array['br_device_identifier'] = $m;
                if (!($brmd->add($array))) {
                    $data['msg'] = '部分信息录入失败!';
                    $this->ajaxReturn($data);
                }
            }
            $data['status'] = 200;
            $data['msg'] = '记录成功!';
        }
        $this->ajaxReturn($data);
    }

    //设备归还
    function deviceReturn($identifier, $remark) {
        $data['status'] = 400;
        $data['data'] = '';
        $brmd = M('Borrow');
        $whe['br_device_identifier'] = $identifier;
        $whe['br_actual_time'] = array('exp', 'is null');
        $info['br_actual_time'] = time();
        $info['br_remark'] = $remark;
        $info['br_reviewer'] = session('admin_user');
        if ($brmd->where($whe)->save($info)) {
            $data['status'] = 200;
            $data['msg'] = '验收成功';
        } else {
            $data['msg'] = '验收失败';
        }
        $this->ajaxReturn($data);
    }

    //获取借出的和需要维修的设备信息
    function getBrRp() {
        $data['status'] = 200;
        $data['msg'] = '';
        $rpmd = M('Repair');
        $brmd = M('Borrow');
        $dvmd = M('Device');
        $dcmd = M('Device_class');
        $rpmd->where('rp_status!=3 and rp_solve_status!=2 and rp_solve_status!=4')->field('rp_id,rp_device_identifier,rp_location,rp_matter,rp_time,rp_person,rp_status,rp_solve_status')->order('rp_time desc');
        $rplist = $rpmd->select();
        foreach ($rplist as $k => $v) {
            $de = $dvmd->where("dv_identifier=$v[rp_device_identifier]")->field('dv_version,dv_dcid')->find();
            $rplist[$k]['rp_version'] = $de['dv_version'];
            $rplist[$k]['rp_class'] = $dcmd->where("dc_id=$de[dv_dcid]")->getField('dc_name');
            $rplist[$k]['rp_time'] = date('Y-m-d', $rplist[$k]['rp_time']);
            if ($rplist[$k]['rp_status'] == 1) {
                $rplist[$k]['rp_status'] = '待审核';
            } else if ($rplist[$k]['rp_status'] == 2) {
                $rplist[$k]['rp_status'] = '通过审核';
            }
            if ($rplist[$k]['rp_solve_status'] == 1) {
                $rplist[$k]['rp_solve_status'] = '未维修';
            } else if ($rplist[$k]['rp_solve_status'] == 3) {
                $rplist[$k]['rp_status'] = '维修中';
            }
        }
        $brmd->where('br_status!=3 and br_actual_time is null')->field('br_id,br_device_identifier,br_user,br_reason,br_time,br_return_time,br_status,br_consent')->order('br_time desc');
        $brlist = $brmd->select();
        foreach ($brlist as $k => $v) {
            $de = $dvmd->where("dv_identifier=$v[br_device_identifier]")->field('dv_version,dv_dcid')->find();
            $brlist[$k]['br_version'] = $de['dv_version'];
            $brlist[$k]['br_class'] = $dcmd->where("dc_id=$de[dv_dcid]")->getField('dc_name');
            $brlist[$k]['br_time'] = date('Y-m-d', $brlist[$k]['br_time']);
            $brlist[$k]['br_return_time'] = date('Y-m-d', $brlist[$k]['br_return_time']);
            if ($brlist[$k]['br_status'] == 1) {
                $brlist[$k]['br_status'] = '待审核';
            } else if ($brlist[$k]['br_status'] == 2) {
                $brlist[$k]['br_status'] = '通过审核';
            }
        }
        $data['data']['repair'] = $rplist;
        $data['data']['borrow'] = $brlist;
        $this->ajaxReturn($data);
    }

    //获取用户借用未还的设备
    function getMyBr() {
        $data['status'] = 200;
        $data['msg'] = '';
        $brmd = M('Borrow');
        $info['br_user'] = session('admin_user');
        $info['br_status'] = 2;
        $info['br_actual_time'] = array('exp', 'is null');
        $brlist = $brmd->where($info)->field('br_user,br_device_identifier,br_reason,br_time,br_return_time')->select();
        foreach ($brlist as $k => $v) {
            $brlist[$k]['br_time'] = date('Y-m-d', $brlist[$k]['br_time']);
            $brlist[$k]['br_return_time'] = date('Y-m-d', $brlist[$k]['br_return_time']);
        }
        $data['data'] = $brlist;
        $this->ajaxReturn($data);
    }

    //设备报修审核
    function checkStatus($rp_id, $status) {
        $rpmd = M('Repair');
        $data['status'] = 400;
        $data['data'] = '';
        if ($status != 1 && $status != 2 && $status != 3) {
            $data['msg'] = '提交状态有误！';
        } else {
            $info['rp_id'] = $rp_id;
            $info['rp_status'] = $status;
            if ($rpmd->save($info)) {
                $data['status'] = 200;
                $data['msg'] = '修改成功';
            } else {
                $data['msg'] = '修改失败';
            }
        }
        $this->ajaxReturn($data);
    }

    //设备维修确认
    function confirm($id, $status, $solve, $time) {
        $rpmd = new RepairModel();
        $info['rp_id'] = $id;
        $info['rp_solve_status'] = $status;
        $info['rp_solve_user'] = session('admin_user');
        $info['rp_solve'] = $solve;
        $info['rp_solve_time'] = strtotime($time);
        $data['status'] = 400;
        $data['data'] = '';
        $shu = $rpmd->create($info);
        if ($shu) {
            if ($rpmd->save($shu)) {
                $data['status'] = 200;
                $data['msg'] = '维修成功';
            } else {
                $data['msg'] = '维修失败';
            }
        } else {
            $data['msg'] = $rpmd->getError();
        }
        $this->ajaxReturn($data);
    }

    //设备一键维修
    function quickRepair($identifier, $location, $matter, $solve) {
        $rpmd = new RepairModel();
        $info['rp_device_identifier'] = $identifier;
        $info['rp_location'] = $location;
        $info['rp_matter'] = $matter;
        $info['rp_time'] = time();
        $info['rp_person'] = session('admin_user');
        $info['rp_solve_user'] = session('admin_user');
        $info['rp_solve'] = $solve;
        $info['rp_solve_time'] = time();
        $info['rp_status'] = 2;
        $info['rp_solve_status'] = 2;

        $data['status'] = 400;
        $data['data'] = '';

        $shu = $rpmd->create($info);
        if ($shu) {
            if ($rpmd->add($shu)) {
                $data['status'] = 200;
                $data['msg'] = '一键维修成功';
            } else {
                $data['msg'] = '一键维修失败';
            }
        } else {
            $data['msg'] = $rpmd->getError();
        }
        $this->ajaxReturn($data);
    }

    //设备报修
    function repair($identifier, $location, $matter, $time) {
        $dvmd = M('Device');
        $rpmd = new RepairModel();
        $info['rp_device_identifier'] = $identifier;
        $info['rp_location'] = $location;
        $info['rp_matter'] = $matter;
        $info['rp_person'] = session('admin_user');
        $info['rp_time'] = strtotime($time);
        $data['status'] = 400;
        $data['data'] = '';
        $device = $dvmd->where("dv_identifier=$identifier")->find();
        if (!$device) {
            $data['msg'] = '报修设备不存在！';
        } else {
            $shu = $rpmd->create($info);
            if ($shu) {
                if ($rpmd->add($shu)) {
                    $data['status'] = 200;
                    $data['msg'] = '报修成功';
                } else {
                    $data['msg'] = '报修失败';
                }
            } else {
                $data['msg'] = $rpmd->getError();
            }
        }
        $this->ajaxReturn($data);
    }

    //所有设备分类
    function getClass() {
        $dcmd = M('Device_class');
        $data['status'] = 200;
        $data['msg'] = '';
        $data['data'] = $dcmd->select();
        $this->ajaxReturn($data);
    }

    //查找同一设备分类的设备信息
    function classSearch($class) {
        $dvmd = M('Device');
        $info['dv_pid'] = $class;
        $data['status'] = 200;
        $data['msg'] = '';
        $list = $dvmd->join('LEFT JOIN __MANUFACTURER__ ON __DEVICE__.dv_manufacturer_id=__MANUFACTURER__.mf_id ')
                        ->join('LEFT JOIN __MACHINE_ROOM__ ON __DEVICE__.dv_room_id=__MACHINE_ROOM__.mr_id')
                        ->join('LEFT JOIN __DEVICE_CLASS__ ON __DEVICE__.dv_dcid=__DEVICE_CLASS__.dc_id')->where($info)->select();
        foreach ($list as $k => $v) {
            $data['data'][$k]['identifier'] = $v['dv_identifier'];
            $data['data'][$k]['class'] = $v['dc_name'];
            $data['data'][$k]['version'] = $v['dv_version'];
            $data['data'][$k]['manufacturer'] = $v['mf_name'];
            $data['data'][$k]['number'] = $v['dv_number'];
            $data['data'][$k]['price'] = $v['dv_price'];
            $data['data'][$k]['place'] = $v['mr_room'] . $v['dv_place'];
            $data['data'][$k]['time'] = date('Y-m-d', $v['dv_time']);
        }
        $this->ajaxReturn($data);
    }

}
