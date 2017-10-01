<?php

namespace Tools;

use Think\Controller;

class AdminController extends Controller {

    function __construct() {
        parent::__construct();

        //转义
        $_POST = I('post.', '', 'htmlspecialchars');

        $ndmd = M('Node');
        $rlmd = M('Role');
        $usmd = M('User');
        $admin_id = session('admin_id');

        //访问控制器/操作方法
        $visit = CONTROLLER_NAME . '/' . ACTION_NAME;

        //共有权限
        $publ = $ndmd->where('public=0')->select();

		$public = "";
        foreach ($publ as $k => $v) {
            $public .= $v['name'] . ',';
        }
        $public = rtrim($public, ',');
        $public = '.' . $public;
        //没登录并且不是公有权限
        if (empty($admin_id) && strpos($public, $visit) == false) {
            $this->redirect('Login/login');
        }

        //用户拥有权限
        $role = session('admin_role');
        if (empty($role)) {
            $list = '';
        } else {
            $role = $rlmd->find($role);
            $node = $ndmd->select($role['node_list']);
            foreach ($node as $k => $v) {
                $list .= $v['name'] . ',';
            }
            $list = rtrim($list, ',');
            $list = '.' . $list;
        }

        //没有权限并且不是公有权限
        if (strpos($list, $visit) == false && strpos($public, $visit) == false) {
            exit('无权限');
        }
    }

}
