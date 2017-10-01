<?php

namespace Home\Controller;

use Tools\IndexController,
    Model\UserModel;

class PersonController extends IndexController {

    //修改密码
    function revisePwd($pwd, $newPwd) {
        $data['status'] = 400;
        $data['data'] = '';
        if (!verifyPwd($newPwd)) {
            $data['msg'] = '密码由6-21字母和数字组成！';
            $this->ajaxReturn($data);
        }
        $usmd = new UserModel();
        $stu_id = session('admin_user');
        $info = $usmd->where("user='{$stu_id}'")->find();
        if (password_verify($pwd, $info['psd'])) {
            $shu['psd'] = password_hash($newPwd, PASSWORD_DEFAULT);
            if ($usmd->where("user=$stu_id")->save($shu)) {
                $data['status'] = 200;
                $data['msg'] = '修改密码成功';
            } else {
                $data['msg'] = '修改密码失败';
            }
        } else {
            $data['msg'] = '现有密码错误！';
        }
        $this->ajaxReturn($data);
    }

}
