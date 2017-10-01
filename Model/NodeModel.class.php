<?php
namespace Model;
use Think\Model;
    class NodeModel extends Model {
        
        protected $_validate = array(
            //不为空验证
            array('name','require','操作方法不能为空'),
            array('alias','require','权限名称不能为空'),
            
            //长度验证
            array('name','1,100','操作长度在1~20',0,'length'),
        );
        
       
}