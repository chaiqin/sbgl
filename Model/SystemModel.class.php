<?php
namespace Model;
use Think\Model;
    class SystemModel extends Model {
        
        protected  $_validate = array(
		    //不为空验证
            array('name','require','系统变量名不能为空'),     
            array('contents','require','系统名不能为空'),     
          
			//长度验证
            array('name','1,64','系统名应在64位以内',0,'length'),            
            array('contents','1,250','系统名应在250位以内',0,'length'),            
		
        );
        
}