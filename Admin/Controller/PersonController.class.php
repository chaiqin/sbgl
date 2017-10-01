<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\UserModel;

class PersonController extends AdminController {

    //个人信息
    function information() {
        $usmd = M('User');
        $stu_id = session('admin_user');
        $list = $usmd->where("user=$stu_id")->find();
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
        $this->display();
    }

    //从正方导出个人信息
    function expt() {
        if (!empty($_POST)) {
            $stu_user = session('admin_user');
            $stu_psd = $_POST['stupsd'];
            $data['status'] = 0;
            if (empty($stu_psd)) {
                $data['msg'] = '请填写正方密码！';
                $this->ajaxReturn($data);
            }
            $result = analogLogin($stu_user, $stu_psd);
            if ($result) {
                $usmd = M('User');
                $info['verify'] = 1;
                $info['username'] = $result['name'];
                $info['class'] = $result['class'];
                $usmd->where("user=$stu_user")->save($info);
                $data['status'] = 1;
                $data['msg'] = '导出成功！';
            } else {
                $data['msg'] = '导出失败！';
            }
            $this->ajaxReturn($data);
        }

        $this->display();
    }

    //修改密码
    function change() {
        if (!empty($_POST)) {
            $usmd = new UserModel();
            $data['status'] = 0;
            $user = session('admin_user');
            $old_psd = $_POST['old_psd'];
            $new_psd = $_POST['new_psd'];
            $repsd = $_POST['repsd'];

            $info = $usmd->where("user=$user")->find();
            if (!password_verify($old_psd, $info['psd'])) {
                $data['msg'] = '密码错误！';
                $this->ajaxReturn($data);
            }

            $res = preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,21}$/', $new_psd, $match);
            if (!$res) {
                $data['msg'] = '新的密码由6-21字母和数字组成！';
                $this->ajaxReturn($data);
            }

            if ($new_psd != $repsd) {
                $data['msg'] = '两次密码不一致！';
                $this->ajaxReturn($data);
            }

            $shu['psd'] = password_hash($new_psd, PASSWORD_DEFAULT);
            $usmd->where("user=$user")->save($shu);
            $data['status'] = 1;
            $data['msg'] = '更改成功';

            $this->ajaxReturn($data);
        }
    }

}
