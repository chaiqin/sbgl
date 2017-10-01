<?php
namespace Model;
use Think\Model;
    class ManufacturerModel extends Model {
        
        protected $_validate = array(
            //不为空验证
            array('mf_name','require','厂商名称不能为空'),
            
            //长度验证
            array('mf_name','1,64','厂商名称长度在1~64',0,'length'),
        );
        
       
}