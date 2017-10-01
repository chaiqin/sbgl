<?php

namespace Model;

use Think\Model;

class RepairModel extends Model {

    protected $_validate = array(
        //不为空验证
        array('rp_device_identifier', 'require', '设备编号不能为空'),
        array('rp_device_identifier', 'number', '设备编号应该为数字'),
        array('rp_device_identifier', '10', '设备编号应该为10位', 0, 'length'),
        array('rp_location', 'require', '请描述设备位置'),
        array('rp_location', '1,32', '设备位置描述长度在1~32之间！', 0, 'length'),
        array('rp_matter', 'require', '请描述故障原因'),
        array('rp_matter', '1,250', '设备故障描述长度在1~250之间！', 0, 'length'),
        array('rp_time', 'require', '报修时间不能为空'),
        array('rp_person', 'require', '报修人一卡通不能为空'),
        array('rp_person', 'number', '报修人一卡通应该为数字！'),
        array('rp_person', '9', '报修人一卡通应该为9位', 0, 'length'),
        array('rp_person_address', '1,15', '报修人ip不规范', 2, 'length'),
        array('rp_solve', 'require', '解决方法不能为空'),
        array('rp_solve', '1,250', '解决方法描述长度在1~250之间！', 2, 'length'),
        array('rp_solve_time', 'require', '维修时间不能为空'),
    );

}
