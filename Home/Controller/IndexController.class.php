<?php

namespace Home\Controller;

use Think\Controller,
    Model\RepairModel,
    Model\UserModel;

class IndexController extends \Tools\IndexController {

    function ajaxRepair() {
        $rpmd = new RepairModel();
        $data['rp_person'] = $_POST['person'];
        $data['rp_person_address'] = $_POST['ip'];
        $data['rp_location'] = $_POST['room'] . $_POST['number'];
        $data['rp_time'] = strtotime($_POST['time']);
        if ($rpmd->add($data)) {
            echo 1;
        }
    }

    //机房座位数
    function getNumber() {
        $mrmd = M('Machine_room');
        $room = $_POST['room'];
        $mr = $mrmd->where("mr_room=$room")->getField('mr_number');
        echo $mr;
    }

    //机房号数组
    function getRoom() {
        $mrmd = M('Machine_room');
        $list = $mrmd->field('mr_room')->select();
        foreach ($list as $v) {
            $mr .= $v['mr_room'] . ',';
        }
        $mr = rtrim($mr, ',');
        echo $mr;
    }

    //app注册
    function register($stu_id, $pwd) {
        $data['status'] = 400;
        $data['data'] = '';
        $info['user'] = $stu_id;
        $info['psd'] = $pwd;
        $info['reg_time'] = time();
        $usmd = new UserModel();
        $stud = $usmd->where("user=$stu_id")->find();
        if ($stud) {
            if ($stud['verify']) {
                $data['msg'] = '一卡通已经被注册';
            } else {
                $shu = $usmd->create($info);
                if ($shu) {
                    $shu['psd'] = password_hash($shu['psd'], PASSWORD_DEFAULT);
                    if ($usmd->where("user=$shu[user]")->save($shu)) {
                        $data['status'] = 200;
                        $data['msg'] = '注册成功';
                    } else {
                        $data['msg'] = '注册失败';
                    }
                } else {
                    $data['msg'] = $usmd->getError();
                }
            }
        } else {
            $shu = $usmd->create($info);
            if ($shu) {
                $shu['psd'] = password_hash($shu['psd'], PASSWORD_DEFAULT);
                if ($usmd->add($shu)) {
                    $data['status'] = 200;
                    $data['msg'] = '注册成功';
                } else {
                    $data['msg'] = '注册失败';
                }
            } else {
                $data['msg'] = $usmd->getError();
            }
        }
        echo rsa_encrypt($data);
    }

    //app登录
    function login($stu_id, $pwd) {
        session_start();
        $usmd = new UserModel();
        $data['status'] = 400;
        $info = $usmd->checkNamePwd($stu_id, $pwd);
        if ($info['status']) {
            $data['status'] = 200;
            $data['data']['verify'] = $info['msg']['verify'];
            $data['data']['type'] = $info['msg']['type'];
            $data['data']['timestamp'] = time();
            session('admin_user', $stu_id);
            session('verify', $info['msg']['verify']);
            session('type', $info['msg']['type']);
            session('access_key', md5(uniqid(md5(microtime(true)), true)));
            $data['data']['session_id'] = session_id();
            $data['data']['access_key'] = session('access_key');
            $data['data']['msg'] = '登录成功';
        } else {
            $data['data'] = '';
            $data['msg'] = $info['msg'];
        }
        echo rsa_encrypt($data);
    }

    //app用户认证
    function identification($stu_id, $pwd) {
        session_start();
        $data['status'] = 400;
        $data['data'] = '';
        $result = analogLogin($stu_id, $pwd);
        if ($result) {
            $usmd = M('User');
            $info['verify'] = 1;
            $info['username'] = $result['name'];
            $info['class'] = $result['class'];
            if ($usmd->where("user=$stu_id")->save($info)) {
                $data['status'] = 200;
                $data['msg'] = '认证成功！';
            } else {
                $data['msg'] = '已认证！';
            }
        } else {
            $data['msg'] = '认证失败！';
        }
        if ($data['status'] == 200) {
            $shuju = $usmd->where("user=$stu_id")->field('verify,type')->find();
            session('admin_user', $stu_id);
            session('verify', $shuju['verify']);
            session('type', $shuju['type']);
            session('access_key', md5(uniqid(md5(microtime(true)), true)));
            $data['data']['timestamp'] = time();
            $data['data']['session_id'] = session_id();
            $data['data']['access_key'] = session('access_key');
        }
        echo rsa_encrypt($data);
    }

    function logout() {
        $data['status'] = 200;
        $data['data'] = '';
        $data['msg'] = '退出成功！';
        session_unset();
        session_write_close();
        echo rsa_encrypt($data);
    }

    //忘记密码
    function backPwd($stu_id, $pwd, $newPwd) {
        $usmd = M('User');
        $data['status'] = 400;
        $check = $usmd->where("user=$stu_id")->find();
        if (!$check) {
            $data['msg'] = '用户不存在！';
            echo rsa_encrypt($data);
        }
        if (!verifyPwd($newPwd)) {
            $data['msg'] = '密码由6-21字母和数字组成！';
            echo rsa_encrypt($data);
        }
        $result = analogLogin($stu_id, $pwd);
        if ($result) {
            if ($check['verify'] == 0) {
                $info['verify'] = 1;
                $info['username'] = $result['name'];
                $info['class'] = $result['class'];
            }
            $info['psd'] = password_hash($newPwd, PASSWORD_DEFAULT);
            if ($usmd->where("user=$stu_id")->save($info)) {
                $data['status'] = 200;
                $data['msg'] = '找回密码成功！';
            } else {
                $data['msg'] = '找回密码失败！';
            }
        } else {
            $data['msg'] = '正方账号或密码错误！';
        }
        echo rsa_encrypt($data);
    }

}
