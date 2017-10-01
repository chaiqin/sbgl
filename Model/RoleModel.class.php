<?php
namespace Model;
use Think\Model;
    class RoleModel extends Model {
        
        protected  $_validate = array(
            array('name','require','角色名不能为空'),            
            array('name','1,15','角色名应在32位以内',0,'length'),            
        );
        
}