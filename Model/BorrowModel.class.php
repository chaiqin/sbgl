<?php

namespace Model;

use Think\Model;

class BorrowModel extends Model {

    protected $_validate = array(
        array('br_device_identifier', 'require', '设备编号不能为空'),
        array('br_device_identifier', 'number', '设备编号应该为数字！'),
        array('br_device_identifier', '10', '设备编号应该为10位', 0, 'length'),
        array('br_user', 'require', '借用者不能为空'),
        array('br_user', '2,32', '借用者书写长度在2~32位之间', 0, 'length'),
        array('br_reason', 'require', '借用原因不能为空'),
        array('br_reason', '1,255', '借用原因长度在1~255位之间', 0, 'length'),
        array('br_time', 'require', '借用时间不能为空'),
        array('br_return_time', 'require', '预计归还时间不能为空'),
        array('br_remark', '1,250', '归还设备状况描述长度在1~250', 2, 'length'),
    );

}
