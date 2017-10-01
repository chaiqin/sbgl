<?php
namespace Model;
use Think\Model;
    class Device_classModel extends Model {
        
        protected  $_validate = array(
		    //不为空验证
		    array('dc_name','require','设备分类名称不能为空'),
			//长度验证
			array('dc_name','1,32','设备分类名称长度在1~32之间！',0,'length'),
        );
         
}