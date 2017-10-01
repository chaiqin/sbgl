<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\Matter_solveModel,
    Model\RepairModel;

class RepairController extends AdminController {

    //常见问题和方法
    public function matterSolveList() {
        $msmd = M("Matter_solve");

        $total = $msmd->count();
        $list = $msmd->order('ms_id desc')->select();
        $i = icount();

        $this->assign('total', $total);
        $this->assign('i', $i);
        $this->assign('list', $list);
        $this->display();
    }

    //添加问题或方法
    function addMatterSolve() {
        $msmd = new Matter_solveModel();

        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $msmd->create();
            if ($shu) {
                if ($msmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $msmd->getError();
            }
            $this->ajaxReturn($data);
        }
    }

    //修改问题或方法
    function reviseMatterSolve() {
        $id = $_GET['id'];
        $msmd = new Matter_solveModel();

        $list = $msmd->find($id);
        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $msmd->create();
            if ($shu) {
                if ($msmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '修改失败';
                }
            } else {
                $data['msg'] = $msmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('list', $list);
        $this->display();
    }

    //删除常见问题或方法
    function deleteMatterSolve() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $msmd = M("Matter_solve");
        $info = $msmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //维修列表
    function repairList() {

        if (!empty($_GET)) {
            $page = $_GET['p'] ? $_GET['p'] : 1;
            $rpmd = M("Repair");

            //分页
            $nums = 10;
            $index = ($page - 1) * $nums;
            $total = $rpmd->count();
            $list = $rpmd->order('rp_time desc,rp_id desc')->limit("$index,$nums")->select();
            $i = icount();
            foreach ($list as $k => $v) {
                $list[$k]['i'] = $i++;
                $list[$k]['rp_time'] = date('Y-m-d', $list[$k]['rp_time']);
            }

            $data['total'] = $total;
            $data['pages'] = ceil($total / $nums);
            $data['list'] = $list;
            $this->ajaxReturn($data);
        }
        $this->display();
    }

    //添加维修
    function addRepair() {
        $rpmd = new RepairModel();
        $msmd = M("Matter_solve");
        $dvmd = M('Device');

        $matter = $msmd->where('ms_type=1')->select();
        $solve = $msmd->where('ms_type=2')->select();

        if (!empty($_POST)) {
            $data['status'] = 0;
            $identifier = $_POST['rp_device_identifier'];
            $device = $dvmd->where("dv_identifier='{$identifier}'")->find();
            if (!$device) {
                $data['msg'] = '报修设备不存在！';
                $this->ajaxReturn($data);
            }
            $_POST['rp_time'] = strtotime($_POST['rp_time']);

            if (!empty($_POST['matter1'])) {
                $_POST['rp_matter'] = $_POST['matter1'] . $_POST['rp_matter'];
            }

            $shu = $rpmd->create();
            if ($shu) {
                $shu['rp_person'] = session('admin_user');
                $shu['rp_status'] = 2;
                if ($rpmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $rpmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('matter', $matter);
        $this->assign('solve', $solve);
        $this->display();
    }

    //修改维修信息
    function reviseRepair() {
        $id = $_GET['id'];
        $rpmd = new RepairModel();
        $msmd = M("Matter_solve");

        $matter = $msmd->where('ms_type=1')->select();
        $solve = $msmd->where('ms_type=2')->select();

        $list = $rpmd->find($id);
        
        if($list['rp_solve_status']==1){
            $list['rp_solve_status'] = '待维修';
        }else if($list['rp_solve_status']==2){
            $list['rp_solve_status'] = '已维修';
        }else if($list['rp_solve_status']==3){
            $list['rp_solve_status'] = '维修中';
        }else if($list['rp_solve_status']==4){
            $list['rp_solve_status'] = '无法维修';
        }
        
        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;

            $_POST['rp_time'] = strtotime($_POST['rp_time']);
            if (!empty($_POST['rp_solve_time'])) {
                $_POST['rp_solve_time'] = strtotime($_POST['rp_solve_time']);
            } else {
                unset($_POST['rp_solve_time']);
            }

            $shu = $rpmd->create();
            if ($shu) {
                if ($rpmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '修改失败';
                }
            } else {
                $data['msg'] = $rpmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('matter', $matter);
        $this->assign('solve', $solve);
        $this->assign('list', $list);
        $this->display();
    }

    //删除维修
    function deleteRepair() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $rpmd = M("Repair");
        $info = $rpmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //审核报修
    function changeStatus() {
        if (!empty($_POST)) {
            $rpmd = M("Repair");
            $up['rp_id'] = $_POST['id'];
            $up['rp_status'] = $_POST['status'];

            $data['status'] = 0;
            if ($rpmd->save($up)) {
                $data['status'] = 1;
                $data['msg'] = '操作成功';
            } else {
                $data['msg'] = '操作失败';
            }
            $this->ajaxReturn($data);
        }
    }

    //维修确认
    function confirm() {
        $data['status'] = 0;
        $id = $_GET['id'];
        $rpmd = new RepairModel();
        $msmd = M("Matter_solve");

        $list = $rpmd->find($id);
        $solve = $msmd->select();

        if (!empty($_POST)) {
            $data['status'] = 0;
            
            if (!empty($_POST['solve1'])) {
                $_POST['rp_solve'] = $_POST['solve1'] . $_POST['rp_solve'];
            }
            
            $shu = $rpmd->create($_POST);
            if ($shu) {
                $shu['rp_solve_user'] = session('admin_user');
                $shu['rp_solve_time'] = strtotime($shu['rp_solve_time']);
                if ($rpmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '维修确认成功';
                } else {
                    $data['msg'] = '维修确认失败';
                }
            } else {
                $data['msg'] = $rpmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('list', $list);
        $this->assign('solve', $solve);
        $this->display();
    }

}
