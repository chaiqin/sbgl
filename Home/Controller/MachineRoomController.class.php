<?php

namespace Home\Controller;

use Tools\IndexController,
    Model\Machine_room_logModel;

class MachineRoomController extends IndexController {

    //机房维护日志
    function getLog() {
        $mrlmd = M('Machine_room_log');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $nums = 10;
        $index = ($p - 1) * $nums;
        $data['status'] = 200;
        $data['msg'] = '获取成功';
        $mrlmd->join('LEFT JOIN __MACHINE_ROOM__ ON __MACHINE_ROOM_LOG__.mrl_place=__MACHINE_ROOM__.mr_id')->field('mrl_time,mr_room,mrl_contents')->order('mrl_time desc');
        $list = $mrlmd->limit("$index,$nums")->select();
        foreach ($list as $k => $v) {
            $list[$k]['mrl_time'] = date('Y-m-d H:i:s', $list[$k]['mrl_time']);
        }
        $data['data'] = $list;
        echo rsa_encrypt($data);
    }

    //获取机房列表
    function getRoom() {
        $mrmd = M('Machine_room');
        $data['status'] = 200;
        $data['data'] = '';
        $mrlist = $mrmd -> field('mr_id,mr_room') -> order('mr_sort asc')-> select();
        $array = array();
        foreach ($mrlist as $k => $v) {
            $array[$k]['id'] = $v['mr_id'];
            $array[$k]['room'] = $v['mr_room'];
        }
        $data['data'] = $array;
        echo rsa_encrypt($data);
    }

    //添加日志
    function addLog($time, $place, $contents) {
        $mrlmd = new Machine_room_logModel();
        $info['mrl_time'] = strtotime($time);
        $info['mrl_place'] = $place;
        $info['mrl_contents'] = $contents;

        $data['status'] = 400;
        $data['data'] = '';

        $shu = $mrlmd->create($info);
        if ($shu) {
            if ($mrlmd->add($shu)) {
                $data['status'] = 200;
                $data['msg'] = '添加成功';
            } else {
                $data['msg'] = '添加失败';
            }
        } else {
            $data['msg'] = $mrlmd->getError();
        }
        echo rsa_encrypt($data);
    }

}
