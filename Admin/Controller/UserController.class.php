<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\UserModel,
    Model\RoleModel;

class UserController extends AdminController {

    //增加用户	 
    function addUser() {
        $usmd = new UserModel();

        //收集注册信息
        if (!empty($_POST)) {
            //验证
            $data['status'] = 0;

            $shu = $usmd->create($_POST);
            if ($shu) {
                //注册
                $shu['reg_time'] = time();
                $shu['psd'] = password_hash($shu['psd'], PASSWORD_DEFAULT);
				$shu['verify'] = 1;
                $stud = $usmd->where("user=$shu[user]")->find();
                if ($stud) {
                    if ($stud['verify']) {
                        $data['msg'] = '一卡通已经被注册';
                    } else {
                        if ($usmd->where("user=$shu[user]")->save($shu)) {
                            $data['status'] = 200;
                            $data['msg'] = '注册成功';
                        } else {
                            $data['msg'] = '注册失败';
                        }
                    }
                } else {
                        if ($usmd->add($shu)) {
                            $data['status'] = 200;
                            $data['msg'] = '注册成功';
                        } else {
                            $data['msg'] = '注册失败';
                        }

                }
            } else {
                $data['msg'] = $usmd->getError();
            }
            $this->ajaxReturn($data);
        }
        $this->display();
    }

    //用户列表
    function userList() {

        if (!empty($_GET)) {
            $page = $_GET['p'] ? $_GET['p'] : 1;
            $usmd = new UserModel();

            $start = $_GET['start'];
            $end = $_GET['end'];
            $user = $_GET['user'];

            $where = $usmd->setWhere($user,$start, $end);

            //分页
            $nums = 10;
            $index = ($page - 1) * $nums;
            $total = $usmd->where($where)->count();
            $list = $usmd->field('id,user,phone,sphone,email,status,reg_time')->where($where)->order('reg_time desc')->limit("$index,$nums")->select();
            $i = icount();
            foreach ($list as $k => $v) {
                $list[$k]['i'] = $i++;
                $list[$k]['reg_time'] = date('Y-m-d', $list[$k]['reg_time']);
            }
            $data['total'] = $total;
            $data['pages'] = ceil($total / $nums);
            $data['list'] = $list;
            $this->ajaxReturn($data);
        }

        $this->display();
    }

    //删除用户
    function deleteUser() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $usmd = new UserModel();
        $info = $usmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

    //编辑用户
    function reviseUser() {
        $id = $_GET['id'];
        $usmd = new UserModel();
        $rlmd = new RoleModel();

        $role = $rlmd->select();

        //获得要修改用户信息
        $list = $usmd->find($id);

        //修改
        if (!empty($_POST)) {
            $data['status'] = 0;
            $shu = $usmd->create($_POST);
            if ($shu) {
                if (empty($shu['sphone'])) {
                    $shu['sphone'] = null;
                }
                $u = $usmd->save($shu);
                if ($u) {
                    $data['status'] = 1;
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '未修改内容';
                }
            } else {
                $data['msg'] = $usmd->getError();
            }
            $this->ajaxReturn($data);
        }

        $this->assign('list', $list);
        $this->assign('role', $role);
        $this->display();
    }

    //修改用户状态
    function changeStatus() {
        if (!empty($_POST)) {
            $usmd = M('User');
            $up['id'] = $_POST['id'];
            $up['status'] = $_POST['status'];

            $data['status'] = 0;
            if ($usmd->save($up)) {
                $data['status'] = 1;
                $data['msg'] = '操作成功';
            } else {
                $data['msg'] = '操作失败';
            }
            $this->ajaxReturn($data);
        }
    }

}
