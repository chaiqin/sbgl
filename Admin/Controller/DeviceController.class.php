<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\DeviceModel,
    Think\Model,
    Model\Device_classModel;

class DeviceController extends AdminController {

    //设备列表
    function deviceList() {
        $dcmd = M('Device_class');
        $mfmd = M('Manufacturer');
        $mrmd = M('Machine_room');

        $dclist = $dcmd->select();
        $mflist = $mfmd->select();
        $mrlist = $mrmd->select();

        if (!empty($_GET)) {
            $page = $_GET['p'] ? $_GET['p'] : 1;
            $dvmd = new DeviceModel();

            $start = $_GET['start'];
            $end = $_GET['end'];
            $dc_id = $_GET['dc'];
            $mf_id = $_GET['mf'];
            $mr_id = $_GET['mr'];
            $num = $_GET['num'];
            $iden = $_GET['iden'];

            $where = $dvmd->setWhere($start, $end, $dc_id, $mf_id, $mr_id, $iden);

            //分页
            $nums = is_numeric($num) ? $num:10;
            $index = ($page - 1) * $nums;

            $list = $dvmd->join('LEFT JOIN __DEVICE_CLASS__ on __DEVICE__.dv_dcid=__DEVICE_CLASS__.dc_id')->where($where)->limit("$index,$nums")->order('dv_time desc,dv_identifier desc')->select();

            $i = icount($nums);
            foreach ($list as $k => $v) {
                $list[$k]['i'] = $i++;
                $list[$k]['dv_time'] = date('Y-m-d', $list[$k]['dv_time']);
            }

            $total = $dvmd->where($where)->count();

            $data['total'] = $total;
            $data['pages'] = ceil($total / $nums);
            $data['list'] = $list;
            $this->ajaxReturn($data);
        }

        $this->assign('dclist', $dclist);
        $this->assign('mflist', $mflist);
        $this->assign('mrlist', $mrlist);
        $this->display();
    }

    //添加设备
    function addDevice() {
        $dvmd = new DeviceModel();
        $dcmd = M("Device_class");
        $mfmd = M("Manufacturer");
        $mrmd = M("Machine_room");

        $data['status'] = 0;

        if (!empty($_FILES['file']['name'])) {
            include './Public/Library/PHPExcel-1.8/PHPExcel.php';
            //文件上传
            $config = array(
                'rootPath' => "Public/Upload/", //保存根路径
                'maxSize' => 10000000, //上传的文件大小限制
                'exts' => array('xlsx', 'xls'), //允许上传的文件后缀
                'saveName' => 'time',
            );
            $upload = new \Think\Upload($config);
            $result = $upload->uploadOne($_FILES['file']);
            if (!$result) {
                $data['msg'] = $upload->getError();
            } else {
                $excelpath = $upload->rootPath . $result['savepath'] . $result['savename'];
                $type = explode('.', $excelpath);
                $suffix = $type[count($type) - 1];
                if ($suffix == 'xlsx') {
                    $objReader = new \PHPExcel_Reader_Excel2007();
                } else if ($suffix == 'xls') {
                    $objReader = new \PHPExcel_Reader_Excel5();
                }
                $objPHPExcel = $objReader->load($excelpath, 'utf-8');
                $sheet = $objPHPExcel->getSheet(0);
                $rows = $sheet->getHighestRow();    //取得总行数
                $column = $sheet->getHighestColumn(); //取得总列数
                //获取设备分类和生产厂商数组
                $dcarray = $dcmd->field('dc_id,dc_name')->select();
                $mfarray = $mfmd->field('mf_id,mf_name')->select();
                $mrarray = $mrmd->field('mr_id,mr_room')->select();

                for ($j = 2; $j <= $rows; $j++) {
                    $head = '数据录到第' . $j . '行时发现错误：';
                    $end = '并删除第' . $j . '行前面已录入的数据再重新上传文件录入！';

                    //检验设备编号是否已存在
                    $info['dv_identifier'] = $objPHPExcel->getActiveSheet()->getCell("A$j")->getValue();
                    if ($dvmd->find($info['dv_identifier'])) {
                        unlink($excelpath);
                        $data['msg'] = $head . '该行设备编号已存在！请改正' . $end;
                        $this->ajaxReturn($data);
                    }

                    //检查设备分类
                    $dcname = trim($objPHPExcel->getActiveSheet()->getCell("B$j")->getValue());
                    $info['dv_dcid'] = '';
                    foreach ($dcarray as $v) {
                        if ($dcname == $v['dc_name']) {
                            $info['dv_dcid'] = $v['dc_id'];
                            break;
                        }
                    }
                    if (empty($info['dv_dcid'])) {
                        unlink($excelpath);
                        $data['msg'] = $head . '该行设备分类不存在！请先添加设备分类' . $end;
                        $this->ajaxReturn($data);
                    }

                    //检查生产厂商
                    $mfname = trim($objPHPExcel->getActiveSheet()->getCell("C$j")->getValue());
                    $info['dv_manufacturer_id'] = '';
                    foreach ($mfarray as $m) {
                        if ($mfname == $m['mf_name']) {
                            $info['dv_manufacturer_id'] = $m['mf_id'];
                            break;
                        }
                    }
                    if (empty($info['dv_manufacturer_id'])) {
                        unlink($excelpath);
                        $data['msg'] = $head . '该行生产厂商不存在！请先添加设备分类' . $end;
                        $this->ajaxReturn($data);
                    }

                    //检查机房号
                    $mrname = $objPHPExcel->getActiveSheet()->getCell("F$j")->getValue();
                    $info['dv_room_id'] = '';
                    foreach ($mrarray as $r) {
                        if ($mrname == $r['mr_room']) {
                            $info['dv_room_id'] = $r['mr_id'];
                            break;
                        }
                    }
                    if (empty($info['dv_room_id'])) {
                        unlink($excelpath);
                        $data['msg'] = $head . '该行机房不存在！请先添加机房' . $end;
                        $this->ajaxReturn($data);
                    }

                    //规范检查
                    $info['dv_version'] = $objPHPExcel->getActiveSheet()->getCell("D$j")->getValue();
                    $info['dv_price'] = $objPHPExcel->getActiveSheet()->getCell("E$j")->getValue();
                    $info['place'] = $objPHPExcel->getActiveSheet()->getCell("G$j")->getValue();

                    if ($shu = $dvmd->create($info)) {
                        $shu['dv_place'] = $objPHPExcel->getActiveSheet()->getCell("G$j")->getValue();
                        $shu['dv_time'] = time();
                        $dvmd->add($shu);
                    } else {
                        unlink($excelpath);
                        $data['msg'] = $head . $dvmd->getError() . '请改正' . $end;
                        $this->ajaxReturn($data);
                    }
                }
                unlink($excelpath);
                $data['status'] = 1;
                $data['msg'] = '录入成功';
            }
            $this->ajaxReturn($data);
        }

        $dclist = $dcmd->select();
        $mflist = $mfmd->select();
        $mrlist = $mrmd->select();


        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $dvmd->create();
            if ($shu) {
                $shu['dv_time'] = strtotime($shu['dv_time']);
                if ($dvmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $dvmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('dclist', $dclist);
        $this->assign('mflist', $mflist);
        $this->assign('mrlist', $mrlist);
        $this->display();
    }

    //编辑设备
    function reviseDevice() {
        $iden = $_GET['iden'];
        $dvmd = new DeviceModel();
        $dcmd = M("Device_class");
        $mfmd = M("Manufacturer");
        $mrmd = M("Machine_room");

        $dclist = $dcmd->select();
        $mflist = $mfmd->select();
        $mrlist = $mrmd->select();
        $list = $dvmd->find($iden);

        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $_POST['dv_time'] = strtotime($_POST['dv_time']);
            $shu = $dvmd->create();
            if ($shu) {
                if ($dvmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '修改失败';
                }
            } else {
                $data['msg'] = $dvmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('dclist', $dclist);
        $this->assign('mflist', $mflist);
        $this->assign('mrlist', $mrlist);
        $this->assign('list', $list);
        $this->display();
    }

    //删除设备
    function deleteDevice() {
        $data['status'] = 0;
        $iden = $_POST['iden'];

        if (empty($iden)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $dvmd = M('Device');
        $info = $dvmd->delete($iden);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //查询设备
    function lookup() {
        if (!empty($_POST)) {
            $rpmd = M('Repair');
            $brmd = M('Borrow');
            $dvmd = M('Device');
            $dcmd = M('Device_class');
            $mfmd = M('Manufacturer');
            $mrmd = M('Machine_room');
            $iden['dv_identifier'] = $_POST['identifier'];
            $data['status'] = 0;
            $dv = $dvmd->where($iden)->find();
            if ($dv) {
                $cl = $dcmd->where("dc_id=$dv[dv_dcid]")->getField('dc_name');
                $rp = $rpmd->where("rp_status=2 and rp_solve_status!=2 and rp_device_identifier=$dv[dv_identifier]")->getField('rp_solve_status');
                $mf = $mfmd->where("mf_id=$dv[dv_manufacturer_id]")->getField('mf_name');
                $mr = $mrmd->where("mr_id=$dv[dv_room_id]")->getField('mr_room');
                $br = $brmd->where("br_device_identifier=$iden[dv_identifier] and br_status=2 and br_actual_time is null")->getField('br_id');
                $dv['status'] = '正常';
                if ($rp == 1) {
                    $dv['status'] = '待维修';
                } else if ($rp == 3) {
                    $dv['status'] = '维修中';
                } else if ($rp == 4) {
                    $dv['status'] = '无法维修';
                }
                $dv['br_status'] = '无';
                if (!empty($br)) {
                    $dv['br_status'] = '出借中';
                }
                $dv['time'] = date('Y-m-d', $dv['dv_time']);
                $dv['class'] = $cl;
                $dv['mf_name'] = $mf;
                $dv['room'] = $mr;
                $data['status'] = 1;
                $data['msg'] = $dv;
            }
            $this->ajaxReturn($data);
        }

        $this->display();
    }

    //导出设备数据
    function export($data = array(), $title = array()) {
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=" . time() . ".xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $title = array('设备编号','设备型号','设备类型','生产厂商','设备价格','所在机房','位置描述','录入时间');
        $dvmd = M('Device');
        $data = $dvmd->join("LEFT JOIN __DEVICE_CLASS__ ON __DEVICE__.dv_dcid=__DEVICE_CLASS__.dc_id")
                        ->join("LEFT JOIN __MANUFACTURER__ ON __MANUFACTURER__.mf_id=__DEVICE__.dv_manufacturer_id")
                        ->join("LEFT JOIN __MACHINE_ROOM__ ON __MACHINE_ROOM__.mr_id=__DEVICE__.dv_room_id")
                        ->field('dv_identifier,dv_version,dc_name,mf_name,dv_price,mr_room,dv_place,dv_time')->select();
        //导出xls 开始
        if (!empty($title)) {
            $title = implode("\t", $title);
            echo "$title\n";
        }
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                $data[$key]['dv_time'] = date('Y-m-d H:i:s', $data[$key]['dv_time']);
                $data[$key] = implode("\t", $data[$key]);
            }
            echo implode("\n", $data);
        }
        exit();
    }

}
