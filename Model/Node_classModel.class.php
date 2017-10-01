<?php
namespace Model;
use Think\Model;
    class Node_classModel extends Model {
        
        protected $_validate = array(
            //不为空验证
            array('name','require','权限类名称不能为空'),
            
            //长度验证
            array('name','1,20','权限类名称长度在1~20',0,'length'),
            array('sort','1,255','序号大小在1~255',2,'between'),
        );
        
       
}