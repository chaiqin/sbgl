<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\Machine_room_logModel,
    Model\Machine_roomModel;

class MachineRoomController extends AdminController {

    //机房列表
    function machineRoomList() {
        $mrmd = M('Machine_room');

        $total = $mrmd->count();
        $list = $mrmd->order('mr_sort asc,mr_id desc')->select();
        $i = icount();


        $this->assign('i', $i);
        $this->assign('list', $list);
        $this->assign('total', $total);
        $this->display();
    }

    //添加机房
    function addMachineRoom() {
        $mrmd = new Machine_roomModel();

        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $mrmd->create();
            if ($shu) {
                if ($mrmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $mrmd->getError();
            }
            $this->ajaxReturn($data);
        }
        $this->display();
    }

    //修改机房信息
    function reviseMachineRoom() {
        $id = $_GET['id'];
        $mrmd = new Machine_roomModel();

        $list = $mrmd->find($id);
        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $mrmd->create();
            if ($shu) {
                if ($mrmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '修改失败';
                }
            } else {
                $data['msg'] = $mrmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('list', $list);
        $this->display();
    }

    //删除机房
    function deleteMachineRoom() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $mrmd = M('Machine_room');
        $info = $mrmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //维护列表
    function logList() {

        if (!empty($_GET)) {
            $page = $_GET['p'] ? $_GET['p'] : 1;
            $mrlmd = M("Machine_room_log");

            //分页
            $nums = 10;
            $index = ($page - 1) * $nums;
            $total = $mrlmd->count();
            $list = $mrlmd->join('LEFT JOIN __MACHINE_ROOM__ ON __MACHINE_ROOM_LOG__.mrl_place=__MACHINE_ROOM__.mr_id')->order('mrl_time desc')->limit("$index,$nums")->select();
            $i = icount();
            foreach ($list as $k => $v) {
                $list[$k]['i'] = $i++;
                $list[$k]['mrl_time'] = date('Y-m-d H:i:s', $list[$k]['mrl_time']);
            }

            $data['total'] = $total;
            $data['pages'] = ceil($total / $nums);
            $data['list'] = $list;
            $this->ajaxReturn($data);
        }
        $this->display();
    }

    //添加维护日志
    function addLog() {
        $mrmd = M('Machine_room');
        $mrlmd = new Machine_room_logModel();

        $room = $mrmd->field('mr_id,mr_room')->select();

        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $mrlmd->create($_POST);
            if ($shu) {
                $shu['mrl_time'] = strtotime($shu['mrl_time']);

                if ($mrlmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $mrlmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('room', $room);
        $this->display();
    }

    //编辑维护日志信息
    function reviseLog() {
        $id = $_GET['id'];
        $mrmd = M('Machine_room');
        $mrlmd = new Machine_room_logModel();

        $list = $mrlmd->find($id);
        $room = $mrmd->field('mr_id,mr_room')->select();

        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $mrlmd->create($_POST);
            if ($shu) {
                $shu['mrl_time'] = strtotime($shu['mrl_time']);

                if ($mrlmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '未修改内容';
                }
            } else {
                $data['msg'] = $mrlmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('room', $room);
        $this->assign('list', $list);
        $this->display();
    }

    //删除出借
    function deleteLog() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $mrlmd = M("Machine_room_log");
        $info = $mrlmd->delete($id);
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
