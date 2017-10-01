<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\BuyModel,
    Think\Model,
    Model\ManufacturerModel,
    Model\Device_classModel,
    Model\DeviceModel;

class BuyController extends AdminController {

    //设备分类列表
    function deviceClassList() {
        $dcmd = M('Device_class');

        $total = $dcmd->count();
        $list = $dcmd->select();
        $i = icount();


        $this->assign('i', $i);
        $this->assign('list', $list);
        $this->assign('total', $total);
        $this->display();
    }

    //添加设备分类
    function addDeviceClass() {
        $dcmd = new Device_classModel();
        $mfmd = M('Manufacturer');
        $dmmd = M('Dc_mf');

        $list = $mfmd->select();

        if (!empty($_POST)) {
            $data['status'] = 0;
            $indc['dc_name'] = $_POST['dc_name'];
            $shu = $dcmd->create($indc);
            if ($shu) {
                if ($dcid = $dcmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                    if ($_POST['mfids']) {
                        $mflist = rtrim($_POST['mfids'], ',');
                        $mflist = explode(',', $mflist);
                        $indm['dm_dcid'] = $dcid;
                        foreach ($mflist as $v) {
                            $indm['dm_mfid'] = $v;
                            $dmmd->add($indm);
                        }
                    }
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $dcmd->getError();
            }
            $this->ajaxReturn($data);
        }
        $this->assign('list', $list);
        $this->display();
    }

    //编辑设备分类
    function reviseDeviceClass() {
        $dmmd = M('Dc_mf');
        $dcmd = new Device_classModel();
        $mfmd = M('Manufacturer');
   
        if (!empty($_POST)) {
            $dc_name = $_POST['dc_name'];
            $dc_id = $_POST['dc_id'];
            $data['status'] = 0;
            $dcup['dc_name'] = $dc_name;
            $dcup['dc_id'] = $dc_id;
            $shu = $dcmd->create($dcup);
            if ($shu) {
                $data['status'] = 1;
                $data['msg'] = '修改成功';
                //厂商名修改
                $dcmd->save($shu);
            } else {
                $data['msg'] = $dcmd->getError();
                $this->ajaxReturn($data);
            }

            //关联更新
            $array1 = $dmmd->where("dm_dcid=$dc_id")->getField('dm_mfid',true);
            $mfids = rtrim($_POST['mfids'], ',');
            $array2 = explode(',', $mfids);
            $add = array_dif($array2,$array1);
            $del = array_dif($array1,$array2);
            $addup['dm_dcid'] = $dc_id;
            foreach ($add as $val) {
                if(empty($val)){
                    break;
                }
                $addup['dm_mfid'] = $val;
                $dmmd->add($addup);
            }
            $del = implode(',',$del);
            $where['dm_dcid'] = $dc_id;
            $where['dm_mfid'] = array('in',$del);
            $dmmd->where($where)->delete();

            $this->ajaxReturn($data);
        }

        $id = $_GET['id'];

        $list = $dcmd->find($id);
        $mflist = $mfmd->select();
        $dmlist = array();
        $dmdata = $dmmd->where("dm_dcid=$id")->field('dm_mfid')->select();
        foreach ($dmdata as $v) {
            $dmlist[] = $v['dm_mfid'];
        }

        $this->assign('list', $list);
        $this->assign('mflist', $mflist);
        $this->assign('dmlist', $dmlist);
        $this->display();
    }

    //删除设备分类
    function deleteDeviceClass() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $dcmd = M('Device_class');
        $info = $dcmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //采购列表
    function buyList() {

        if (!empty($_GET)) {
            $page = $_GET['p'] ? $_GET['p'] : 1;
            $bymd = new BuyModel();

            //分页
            $nums = 10;
            $index = ($page - 1) * $nums;
            $total = $bymd->count();
            $list = $bymd->join('LEFT JOIN __MANUFACTURER__ on __BUY__.manufacturer_id=__MANUFACTURER__.mf_id')->order('time desc,id desc')->limit("$index,$nums")->select();
            $i = icount();
            foreach ($list as $k => $v) {
                $list[$k]['i'] = $i++;
                $list[$k]['time'] = date('Y-m-d', $list[$k]['time']);
                if (!empty($list[$k]['received_time'])) {
                    $list[$k]['received_time'] = date('Y-m-d', $list[$k]['received_time']);
                }
            }
            $data['total'] = $total;
            $data['pages'] = ceil($total / $nums);
            $data['list'] = $list;
            $this->ajaxReturn($data);
        }

        $this->display();
    }

    //添加采购单
    function addBuy() {
        $mfmd = M('Manufacturer');
        $dcmd = M('Device_class');
        $bymd = new BuyModel();

        $time = date('Y-m-d', time());
        $mflist = $mfmd->select();
        $dclist = $dcmd->select();

        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $bymd->create($_POST);
            if ($shu) {
                $shu['status'] = 0;
                $shu['time'] = strtotime($shu['time']);

                if ($bymd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $bymd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('mflist', $mflist);
        $this->assign('dclist', $dclist);
        $this->assign('time', $time);
        $this->display();
    }

    //编辑采购单 	
    function reviseBuy() {
        $id = $_GET['id'];
        $bymd = new BuyModel();
        $mfmd = M('Manufacturer');
        $dcmd = M('Device_class');

        $list = $bymd->find($id);
        $mflist = $mfmd->select();
        $dclist = $dcmd->select();

        if ($list['status'] == 0) {
            $list['status'] = '未验收';
        } else if ($list['status'] == 1) {
            $list['status'] = '已验收';
        } else if ($list['status'] == 2) {
            $list['status'] = '部分验收';
        }

        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $bymd->create($_POST);
            if ($shu) {
                $shu['time'] = strtotime($shu['time']);
                $u = $bymd->save($shu);
                if ($u) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '未修改内容';
                }
            } else {
                $data['msg'] = $bymd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('dclist', $dclist);
        $this->assign('mflist', $mflist);
        $this->assign('list', $list);
        $this->display();
    }

    //删除采购单
    function deleteBuy() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $bymd = M('Buy');
        $info = $bymd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //采购验收
    function changeStatus() {
        if (!empty($_POST)) {
            $bymd = M('Buy');
            $up['id'] = $_POST['id'];
            $up['status'] = $_POST['status'];
            $up['received_time'] = time();
            $up['reviewer'] = session('admin_user');

            $data['status'] = 0;
            if ($bymd->save($up)) {
                $data['status'] = 1;
                $data['msg'] = '操作成功';
            } else {
                $data['msg'] = '操作失败';
            }
            $this->ajaxReturn($data);
        }
    }

    //厂商列表
    function manufacturerList() {

        if (!empty($_GET)) {
            $page = $_GET['p'] ? $_GET['p'] : 1;
            $mfmd = M('Manufacturer');

            //分页
            $nums = 10;
            $index = ($page - 1) * $nums;
            $total = $mfmd->count();
            $list = $mfmd->order('mf_id desc')->limit("$index,$nums")->select();
            $i = icount();
            foreach ($list as $k => $v) {
                $list[$k]['i'] = $i++;
            }

            $data['total'] = $total;
            $data['pages'] = ceil($total / $nums);
            $data['list'] = $list;
            $this->ajaxReturn($data);
        }

        $this->display();
    }

    //添加厂商
    function addManufacturer() {
        $mfmd = new ManufacturerModel();
        $dmmd = M('Dc_mf');
        $dcmd = M('Device_class');

        $list = $dcmd->select();

        if (!empty($_POST)) {
            $data['status'] = 0;
            $inmf['mf_name'] = $_POST['mf_name'];
            $shu = $mfmd->create($inmf);
            if ($shu) {
                if ($mfid = $mfmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                    if ($_POST['dcids']) {
                        $dclist = rtrim($_POST['dcids'], ',');
                        $dclist = explode(',', $dclist);
                        $indm['dm_mfid'] = $mfid;
                        foreach ($dclist as $v) {
                            $indm['dm_dcid'] = $v;
                            $dmmd->add($indm);
                        }
                    }
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $mfmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('list', $list);
        $this->display();
    }

    //编辑厂商
    function reviseManufacturer() {
        $dmmd = M('Dc_mf');
        $dcmd = M('Device_class');
        $mfmd = new ManufacturerModel();
        if (!empty($_POST)) {
            $mf_name = $_POST['mf_name'];
            $mf_id = $_POST['mf_id'];
            $data['status'] = 0;
            $mfup['mf_name'] = $mf_name;
            $mfup['mf_id'] = $mf_id;
            $shu = $mfmd->create($mfup);
            if ($shu) {
                $data['status'] = 1;
                $data['msg'] = '修改成功';
                //厂商名修改
                $mfmd->save($shu);
            } else {
                $data['msg'] = $mfmd->getError();
            }

            //关联更新
            $array1 = $dmmd->where("dm_mfid=$mf_id")->getField('dm_dcid',true);
            $dcids = rtrim($_POST['dcids'], ',');
            $array2 = explode(',', $dcids);
            $add = array_dif($array2,$array1);
            $del = array_dif($array1,$array2);
            $addup['dm_mfid'] = $mf_id;
            foreach ($add as $val) {
                if(empty($val)){
                    break;
                }
                $addup['dm_dcid'] = $val;
                $dmmd->add($addup);
            }
            $del = implode(',',$del);
            $where['dm_mfid'] = $mf_id;
            $where['dm_dcid'] = array('in',$del);
            $dmmd->where($where)->delete();

            $this->ajaxReturn($data);
        }

        $id = $_GET['id'];

        $list = $mfmd->find($id);
        $dclist = $dcmd->select();
        $dmlist = array();
        $dmdata = $dmmd->where("dm_mfid=$id")->field('dm_dcid')->select();
        foreach ($dmdata as $v) {
            $dmlist[] = $v['dm_dcid'];
        }

        $this->assign('list', $list);
        $this->assign('dclist', $dclist);
        $this->assign('dmlist', $dmlist);
        $this->display();
    }

    //删除厂商
    function deleteManufacturer() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $mfmd = M('Manufacturer');
        $info = $mfmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //设备快捷录入
    function quickInput() {
        $dvmd = new DeviceModel();
        $bymd = M('Buy');
        if (!empty($_POST)) {
            $buyId = $_POST['buyId'];
            $iden = $_POST['iden'];
            $room = $_POST['room'];
            $place = $_POST['place'];
            $first = $_POST['first'];
            $data['status'] = 0;
            $data['msg'] = '请填写数据';

            //验证
            $info = array();
            for ($i = 0; $i < count($iden); $i++) {
                if (!empty($iden[$i])) {
                    $info['dv_identifier'] = $iden[$i];
                    $info['place'] = $place[$i];
                    $info['dv_room_id'] = $room[$i];
                    $shu = $dvmd->create($info);
                    if (!$shu) {
                        $num = $first + $i;
                        $data['msg'] = '设备' . $num . $dvmd->getError();
                        $this->ajaxReturn($data);
                    }
                }
            }

            //录入
            $buy = $bymd->where("id=$buyId")->field('dc_id,manufacturer_id,price,name')->find();
            $input['dv_version'] = $buy['name'];
            $input['dv_manufacturer_id'] = $buy['manufacturer_id'];
            $input['dv_price'] = $buy['price'];
            $input['dv_dcid'] = $buy['dc_id'];
            $input['dv_buy_id'] = $buyId;
            for ($i = 0; $i < count($iden); $i++) {
                if (!empty($iden[$i])) {
                    $input['dv_identifier'] = $iden[$i];
                    $input['dv_room_id'] = $room[$i];
                    $input['dv_place'] = $place[$i];
                    $input['dv_time'] = time();
                    $dvmd->add($input);
                    $data['status'] = 1;
                    $data['msg'] = '录入成功';
                }
            }
            $this->ajaxReturn($data);
        }

        $buyId = $_GET['id'];
        $number = $_GET['number'];
        $mrmd = M('Machine_room');

        $dvcl = $dvmd->join("LEFT JOIN __MACHINE_ROOM__ ON __DEVICE__.dv_room_id=__MACHINE_ROOM__.mr_id")->where("dv_buy_id=$buyId")->field('dv_identifier,dv_place,mr_room')->select();
        foreach ($dvcl as $k => $v) {
            $dvcl[$k]['i'] = $k + 1;
        }
        $count = count($dvcl);
        $then = $count + 1;
        $else = $number - $count;
        for ($i = 0; $i < $else; $i++) {
            $remain[] = array('i' => ++$count);
        }

        $room = $mrmd->field('mr_id,mr_room')->select();

        $this->assign('first', $then);
        $this->assign('buyId', $buyId);
        $this->assign('room', $room);
        $this->assign('class', $dvcl);
        $this->assign('remain', $remain);
        $this->display();
    }
    

}
