<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\BorrowModel;

class BorrowController extends AdminController {

    //出借列表
    function borrowList() {

        if (!empty($_GET)) {
            $page = $_GET['p'] ? $_GET['p'] : 1;
            $brmd = M("Borrow");

            //分页
            $nums = 10;
            $index = ($page - 1) * $nums;
            $total = $brmd->count();
            $list = $brmd->order('br_time desc,br_id desc')->limit("$index,$nums")->select();
            $i = icount();
            foreach ($list as $k => $v) {
                $list[$k]['i'] = $i++;
                $list[$k]['br_time'] = date('Y-m-d', $list[$k]['br_time']);
                $list[$k]['br_return_time'] = date('Y-m-d', $list[$k]['br_return_time']);
                if (!empty($list[$k]['br_actual_time'])) {
                    $list[$k]['br_actual_time'] = date('Y-m-d', $list[$k]['br_actual_time']);
                }
            }

            $data['total'] = $total;
            $data['pages'] = ceil($total / $nums);
            $data['list'] = $list;
            $this->ajaxReturn($data);
        }
        $this->display();
    }

    //添加出借
    function addBorrow() {
        $brmd = new BorrowModel();
        $dvmd = M('Device');

        if (!empty($_POST)) {
            $data['status'] = 0;
            $identifier = $_POST['br_device_identifier'];
            $shu = $brmd->create($_POST);
            if ($shu) {
                $result = $brmd->where("br_actual_time is null and br_device_identifier='{$identifier}'")->getField('br_id');
                $device = $dvmd->where("dv_identifier='{$identifier}'")->find();
                if ($result) {
                    $data['msg'] = '设备' . $identifier . '已被借用！';
                    $this->ajaxReturn($data);
                }
                if (!$device) {
                    $data['msg'] = '借用设备不存在！';
                    $this->ajaxReturn($data);
                }
                $shu['br_return_time'] = strtotime($shu['br_return_time']);
                $shu['br_time'] = strtotime($shu['br_time']);
				$shu['br_status'] = 2;

                if ($brmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $brmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->display();
    }

    //编辑出借
    function reviseBorrow() {
        $id = $_GET['id'];
        $brmd = new BorrowModel();

        $list = $brmd->find($id);
        if ($list['br_status'] == 1) {
            $list['br_status'] = '待审核';
        } else if ($list['br_status'] == 2) {
            $list['br_status'] = '通过审核';
        } else if ($list['br_status'] == 3) {
            $list['br_status'] = '未通过审核';
        }

        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $brmd->create($_POST);
            if ($shu) {
                $shu['br_return_time'] = strtotime($shu['br_return_time']);
                $shu['br_time'] = strtotime($shu['br_time']);

                if ($brmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '未修改内容';
                }
            } else {
                $data['msg'] = $brmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('list', $list);
        $this->display();
    }

    //删除出借
    function deleteBorrow() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $brmd = M("Borrow");
        $info = $brmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //出借审核
    function changeStatus() {
        if (!empty($_POST)) {
            $brmd = M("Borrow");
            $up['br_id'] = $_POST['id'];
            $up['br_status'] = $_POST['status'];
            $up['br_consent'] = session('admin_user');

            $data['status'] = 0;
            if ($brmd->save($up)) {
                $data['status'] = 1;
                $data['msg'] = '操作成功';
            } else {
                $data['msg'] = '操作失败';
            }
            $this->ajaxReturn($data);
        }
    }

    //验收出借设备
    function checkBorrow() {
        $data['status'] = 0;
        $id = $_GET['id'];
        $brmd = new BorrowModel();

        $list = $brmd->find($id);

        if (!empty($_POST)) {
            $data['status'] = 0;

            if (empty($_POST['br_actual_time'])) {
                $data['msg'] = '请填写归还时间';
                $this->ajaxReturn($data);
            }

            $shu = $brmd->create($_POST);
            if ($shu) {
                $shu['br_reviewer'] = session('admin_user');
                $shu['br_actual_time'] = strtotime($shu['br_actual_time']);
                if ($brmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '验收成功';
                } else {
                    $data['msg'] = '验收失败';
                }
            } else {
                $data['msg'] = $brmd->getError();
            }
            $this->ajaxReturn($data);
        }
        $this->assign('br_id', $id);
        $this->assign('list', $list);
        $this->display();
    }

}
