<?php

namespace Model;

use Think\Model;

class DeviceModel extends Model {

    protected $_validate = array(
        array('dv_identifier', 'require', '设备编号不能为空!'),
        array('dv_identifier', 'number', '设备编号应该为数字！'),
        array('dv_identifier', '10', '设备编号应该为10位!', 0, 'length'),
        array('dv_dcid', 'require', '请选择设备分类!'),
        array('dv_mfid', 'require', '请选择设备编号!'),
        array('dv_version', 'require', '设备型号不能为空!'),
        array('dv_version', '1,32', '设备型号长度在1~32之间！', 0, 'length'),
        array('dv_price', '/(^[1-9]([0-9]{1,9})?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/', '价格整数位数10位以内，小数保留两位！', 0, 'regex'),
        array('dv_room_id', 'require', '请选择所在机房!'),
        array('dv_time', 'require', '添加时间不能为空!'),
        array('dv_place', 'checkPlace', '请完善设备所在信息！', 0, 'function'),
        array('dv_place', '1,64', '位置描述长度在1~64之间！', 2, 'length'),
        array('place', '1,64', '位置描述长度在1~64之间！', 2, 'length'),
    );

    //生成条件语句
    function setWhere($start, $end, $dc_id, $mf_id, $mr_id, $iden) {
        $str = '';
        $start_time = strtotime($start);
        $end_time = strtotime($end);

        if (!empty($start) && !empty($end)) {
            $str = 'sbgl_device.dv_time>=' . $start_time . ' AND sbgl_device.dv_time<=' . $end_time;
        } else if (!empty($start) && empty($end)) {
            $str = 'sbgl_device.dv_time>=' . $start_time;
        } else if (empty($start) && !empty($end)) {
            $str = 'sbgl_device.dv_time<=' . $end_time;
        }

        if ($dc_id != 0 && !empty($str)) {
            $str .= " AND dv_dcid=" . $dc_id;
        } else if ($dc_id != 0) {
            $str .= "dv_dcid=" . $dc_id ;
        }

        if ($mf_id != 0 && !empty($str)) {
            $str .= " AND dv_manufacturer_id=" . $mf_id;
        } else if ($mf_id != 0) {
            $str .= "dv_manufacturer_id=" . $mf_id;
        }

        if ($mr_id != 0 && !empty($str)) {
            $str .= ' AND dv_room_id=' . $mr_id;
        } else if ($mr_id != 0) {
            $str .= 'dv_room_id=' . $mr_id;
        }

        if (!empty($iden) && !empty($str)) {
            $str .= ' AND dv_identifier=' . $iden;
        } else if (!empty($iden)) {
            $str .= 'dv_identifier=' . $iden;
        }

        return $str;
    }

    //获取查找的生产厂商ids
//    function getMf_ids($dc_id,$mf_id){
//        $mfmd = M('Manufacturer');
//        $str = 0;
//        if($dc_id!=0&&$mf_id==0){
//            $list = $mfmd -> where("mf_pid=$dc_id") ->field('mf_id') -> select();
//            foreach ($list as $k=>$v){
//                $info .= $v['mf_id'].',';
//            }
//            $str = rtrim($info, ',');
//        }
//        if($dc_id!=0&&$mf_id!=0){
//            $str = $mf_id;
//        }
//        return $str;
//    }
}
