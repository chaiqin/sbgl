<?php

namespace Tools;

use Think\Controller;

class IndexController extends Controller {

    function __construct() {
        parent::__construct();

        //对接收数据进行转义
        $_GET = I('get.','','htmlspecialchars');
        
        //拒绝pc端访问
//        if(is_pc()){
//            exit();
//        }
        
        if($_GET['session_id']){
            session_id($_GET['session_id']);
        }
        session_start();
        
        $admin_id = '';
        $type = '';
        $verify = '';
        $sign = CONTROLLER_NAME.ACTION_NAME.$_GET['timestamp'].session('access_key');
        if ($_GET['signature'] == md5($sign)) {
            //请求时间限制
            $service = time();
            $client  = $_GET['timestamp'];
            if($service>$client){
                $differ = $service-$client;
            }else{
                $differ = $client-$service;
            }
            if($differ>60){
                exit();
            }
            $admin_id = session('admin_user');
            $type = session('type');
            $verify = session('verify');
        }

        //访问控制器/操作方法
        $visit = CONTROLLER_NAME . '/' . ACTION_NAME;

        //公有权限
        $public = '.Index/ajaxRepair,Index/index,Index/getNumber,Index/getRoom,Index/register,Index/login,Index/identification,Index/logout,'
                . 'Index/backPwd';
        //会员权限
        $member = '.Device/repair,Version/update,Device/getMyBr,Person/revisePwd';
        //管理员权限
        $admin = '.Device/getManufacturer,Device/buy,Device/getInformation,Device/borrow,Device/getBrRp,Device/checkStatus,'
                . 'Device/confirm,Device/getClass,Device/classSearch,MachineRoom/getLog,Message/getDcMf,MachineRoom/getRoom,'
                . 'MachineRoom/addLog';

        //没登录并且不是公有权限
        if (empty($admin_id) && strpos($public, $visit) == false) {
            exit();
        }

        //登录了没有认证并且不是公有权限
        if ($verify == 0 && strpos($public, $visit) == false) {
            exit();
        }

        //认证了是会员访问权限是管理员权限
        if ($verify == 1 && $type = 0 && strpos($admin, $visit) == true) {
            exit();
        }
    }

}
