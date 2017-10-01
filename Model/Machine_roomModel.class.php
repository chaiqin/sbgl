<?php

namespace Model;

use Think\Model;

class Machine_roomModel extends Model {

    protected $_validate = array(
        //不为空验证
        array('mr_room', 'require', '机房号不能为空'),
        //长度验证
        array('mr_number', '0,255', '座位数量应在0~255之间！', 2, 'between'),
        array('mr_sort', '0,255', '排序大小应在0~255之间！', 2, 'between'),
        //规范验证
        array('mr_room', 'number', '机房号应该为数字'),
        array('mr_room', '3', '机房号书写不规范！', 0, 'length'),
    );

}
