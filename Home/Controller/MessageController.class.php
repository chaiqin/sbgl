<?php

namespace Home\Controller;

use Tools\IndexController;

class MessageController extends IndexController {

    //获取设备分类和生产厂商
    function getDcMf() {
        $dmmd = M('Dc_mf');
        $dcmd = M('Device_class');
        $mfmd = M('Manufacturer');
        $data['status'] = 200;
        $data['msg'] = '获取成功';
        $data['data'] = '';
        
        $dclist = $dcmd -> select();
        foreach ($dclist as $v) {
            $array = array();
            $mflist = array();
            $mflist = $dmmd -> where("dm_dcid=$v[dc_id]") -> select();
            foreach ($mflist as $a) {
                $mf = $mfmd -> find($a['dm_mfid']);
                $array[] = $mf['mf_name'];
            }
            $data['data'][$v['dc_name']] = $array;
        }
        echo rsa_encrypt($data);
    }

}
