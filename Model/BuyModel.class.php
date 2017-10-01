<?php
namespace Model;
use Think\Model;
    class BuyModel extends Model {
        
        protected  $_validate = array(
		    
            //app进行的附加验证
            array('dc','1,32','设备分类名称长度在1~32之间！',0,'length'),
            array('mf','1,64','厂商名称长度在1~64',0,'length'),
            //表验证
            array('dc_id','require','请选择设备分类'), 
            array('manufacturer_id','require','请选择生产厂商'), 
            array('name','require','设备型号不能为空'), 
            array('name','1,64','设备型号长度应在64位以内',0,'length'), 			
            array('price','require','设备单价不能为空'), 
            array('price','1,16777215','设备单价大小不符合实际！',2,'between'),			
            array('number','require','采购数量不能为空'),
            array('number','number','采购数量只能为数字'),
            array('price','1,16777215','采购数量大小不符合实际！',2,'between'),			
            array('person','require','采购者不能为空'), 
            array('person','1,32','采购者姓名长度过长',0,'length'),			
            array('time','require','采购时间不能为空'),     
			
        );
        
}