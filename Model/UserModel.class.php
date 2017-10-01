<?php

namespace Model;

use Think\Model;

class UserModel extends Model {

    protected $_validate = array(
        array('user', 'require', '用户一卡通不能为空'),
        array('user', 'number', '用户一卡通应该为数字'),
        array('user', '9', '一卡通的长度为9位', 0, 'length'),
        array('psd', 'require', '请输入密码'),
        array('psd', '/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,21}$/', '密码由6-21字母和数字组成！', 0, 'regex'),
        array('repsd', 'require', '请确认密码'),
        array('repsd', 'psd', '两次密码输入不一致', 0, 'confirm'),
        array('email', '/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/', '邮箱格式错误', 2, 'regex'),
        array('phone', 'number', '手机号码应该为数字', 2),
        array('phone', '11', '手机号码应该为11位', 2, 'length'),
        array('sphone', 'number', '手机短号应该为数字', 2),
        array('sphone', '6', '手机短号应该为6位', 2, 'length'),
    );

    function checkNamePwd($name, $pwd) {
        //查找user_name为$name的信息
        $info['status'] = 0;
        $info = array();
        $info['msg'] = $this->where("user='{$name}'")->find();
        if (empty($name)) {
            $info['msg'] = '请填写用户名！';
        } else if (empty($pwd)) {
            $info['msg'] = '请填写密码！';
        } else if (!$info['msg']) {
            $info['msg'] = '用户不存在！';
        } else if (!$info['msg']['status']) {
            $info['msg'] = '用户已被停用！';
        } else if (!password_verify($pwd, $info['msg']['psd'])) {
            $info['msg'] = '密码错误！';
        } else {
            $info['status'] = 1;
        }
        return $info;
    }

    function setWhere($user, $start, $end) {
        $str = '';
        $start_time = strtotime($start);
        $end_time = strtotime($end);
        if (!empty($start) && !empty($end)) {
            $str = 'reg_time>=' . $start_time . ' AND reg_time<=' . $end_time;
        } else if (!empty($start) && empty($end)) {
            $str = 'reg_time>=' . $start_time;
        } else if (empty($start) && !empty($end)) {
            $str = 'reg_time<=' . $end_time;
        }

        if (!empty($user) && !empty($str)) {
            $str .= ' AND user=' . $user;
        } else if (!empty($user)) {
            $str .= 'user=' . $user;
        }

        return $str;
    }

    function test($info, $stu_psd) {
        $data['status'] = 0;
        if (!is_numeric($info['user']) || (strlen($info['user']) != 9)) {
            $data['msg'] = '一卡通号为9位数字！';
            return $data;
        }

        $stud = $this->where("user=$info[user]")->find();
        if (!$stud) {
            $data['msg'] = '请先进行注册！';
            return $data;
        }

        $result = analogLogin($info['user'], $stu_psd);
        if (!$result) {
            $data['msg'] = '正方密码有误！';
            return $data;
        }

        $res = preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,21}$/', $info['psd'], $match);
        if ($res) {
            $data['status'] = 1;
            $data['msg'] = '重置成功！';
            $info['psd'] = password_hash($info['psd'], PASSWORD_DEFAULT);
            $this->where("user=$info[user]")->save($info);
        } else {
            $data['msg'] = '新的密码由6-21字母和数字组成！';
        }

        return $data;
    }

}
