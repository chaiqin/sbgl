<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\UserModel,
    Think\Verify;

class LoginController extends AdminController {

    public function login() {
        $usmd = new UserModel();
		
        //登陆信息
        if (!empty($_POST)) {
            $verify = new Verify();
            $data['status'] = 0;
            if (!$verify->check($_POST['captcha'])) {
                $data['msg'] = '验证码错误';
                $this->ajaxReturn($data);
            }
            $info = $usmd->checkNamePwd($_POST['user'], $_POST['psd']);
			
            if ($info['status']) {
				
                $data['status'] = 1;
                session('admin_id', $info['msg']['id']);
                session('admin_user', $info['msg']['user']);
                session('admin_role', $info['msg']['role']);
                session('log_time', $info['msg']['login_time']);
                session('log_ip', $info['msg']['login_ip']);
                //更新数据
                $up['id'] = $info['msg']['id'];
                $up['login_time'] = time();
                $up['login_ip'] = get_client_ip();
                $up['login_number'] = $info['msg']['login_number'] + 1;
                session('log_number', $up['login_number']);
                $usmd->save($up);
            } else {
                $data['msg'] = $info['msg'];
            }
            $this->ajaxReturn($data);
        }

        $this->display();
    }

    public function logout() {
        if (session('?admin_id')) {
            session(null);
            $this->assign("jumpUrl", __URL__ . '/login/');
            $this->success('注销成功！');
        }
    }

    function verifyImg() {
        //输出验证码图片
        $config = array(
            'fontSize' => 20, // 验证码字体大小(px)
            'imageH' => 38, // 验证码图片高度
            'imageW' => 142, // 验证码图片宽度
            'length' => 4, // 验证码位数
            'fontttf' => '4.ttf', // 验证码字体，不设置随机获取
        );
        $very = new Verify($config);

        $very->entry();
    }
	
	
	//重置密码
	function modify(){
		if(!empty($_POST)){
			$info['user'] = $_POST['stu_id'];
			$stu_psd = $_POST['stu_psd'];
			$info['psd'] = $_POST['new_psd'];
			$data['status'] = 0;
			
			$usmd = new UserModel();
			$data = $usmd -> test($info,$stu_psd);
			
			$this->ajaxReturn($data);
		}
		$this->display();
	}

}
