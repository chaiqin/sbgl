<?php

namespace Model;

use Think\Model;

class VersionModel extends Model {

    protected $_validate = array(
        //不为空验证
        array('client_version', 'require', '版本号不能为空'),
        array('client_link', 'require', '下载链接不能为空'),
        array('time', 'require', '更新时间不能为空'),
    );

    function check($current, $latest) {
        if ($latest[0] > $current[0]) {
            return true;
        } elseif ($latest[0] == $current[0]) {
            if ($latest[1] > $current[1]) {
                return true;
            } elseif ($latest[1] == $current[1]) {
                if ($latest[2] >= $current[2]) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
