<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\NodeModel,
    Model\Node_classModel;

class NodeController extends AdminController {

    //权限类列表
    function nodeClassList() {
        $ncmd = M('Node_class');

        //所有权限类
        $list = $ncmd->order('sort asc')->select();
        $total = $ncmd->count();
        $i = icount();
        foreach ($list as $k => $v) {
            $list[$k]['i'] = $i++;
        }
        $this->assign('list', $list);
        $this->assign('total', $total);
        $this->display();
    }

    //添加权限类
    function addNodeClass() {
        $ncmd = new Node_classModel();

        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $ncmd->create();
            if ($shu) {
                if ($ncmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $ncmd->getError();
            }
            $this->ajaxReturn($data);
        }
    }

    //修改权限类
    function reviseNodeClass() {
        $id = $_GET['id'];
        $ncmd = new Node_classModel();

        //查找修改角色
        $list = $ncmd->find($id);
        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $ncmd->create();
            if ($shu) {
                if ($ncmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '修改失败';
                }
            } else {
                $data['msg'] = $ncmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('list', $list);
        $this->display();
    }

    //删除权限类
    function deleteNodeClass() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $ncmd = M('Node_class');
        $info = $ncmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //添加权限
    function addNode() {
        $ndmd = new Node_classModel();

        $class = $ndmd->order('sort asc')->select();

        if (!empty($_POST)) {
            $ndmd = new NodeModel();
            $data['status'] = 0;
            $shu = $ndmd->create();
            if ($shu) {
                if ($ndmd->add($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '添加成功';
                } else {
                    $data['msg'] = '添加失败';
                }
            } else {
                $data['msg'] = $ndmd->getError();
            }
            $this->ajaxReturn($data);
        }
        $this->assign('class', $class);
        $this->display();
    }

    //权限列表
    function nodeList() {
        $ndmd = new NodeModel();
        $ncmd = new Node_classModel();

        //所有权限
        $flist = $ncmd->order('sort asc')->select();
        $zlist = $ndmd->order('sort asc')->select();
        $total = $ndmd->count();
        $i = icount();

        $this->assign('i', $i);
        $this->assign('flist', $flist);
        $this->assign('zlist', $zlist);
        $this->assign('total', $total);
        $this->display();
    }

    //权限编辑
    function reviseNode() {
        $id = $_GET['id'];
        $atmd = new NodeModel();
        $ndmd = new Node_classModel();

        $class = $ndmd->order('sort asc')->select();
        //查找修改角色
        $list = $atmd->find($id);
        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $atmd->create();
            if ($shu) {
                if ($atmd->save($shu)) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '修改失败';
                }
            } else {
                $data['msg'] = $atmd->getError();
            }
            $this->ajaxReturn($data);
        }
        $this->assign('class', $class);
        $this->assign('list', $list);
        $this->display();
    }

    //删除权限
    function deleteNode() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $atmd = new NodeModel();
        $info = $atmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

}
