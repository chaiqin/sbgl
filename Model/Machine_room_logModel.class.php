<?php

namespace Model;

use Think\Model;

class Machine_room_logModel extends Model {

    protected $_validate = array(
        array('mrl_time', 'require', '维护时间不能为空'),
        array('mrl_place', 'require', '请选择维护机房房号'),
        array('mrl_contents', 'require', '维护内容不能为空'),
        array('mrl_contents', '1,255', '维护内容描述过长', 0, 'length'),
    );

}
