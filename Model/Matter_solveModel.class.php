<?php

namespace Model;

use Think\Model;

class Matter_solveModel extends Model {

    protected $_validate = array(
        //不为空验证
        array('ms_value', 'require', '请进行描述'),
        //长度验证
        array('ms_value', '1,32', '描述长度在1~32之间！', 0, 'length'),
    );

}
