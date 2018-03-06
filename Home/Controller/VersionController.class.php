<?php

namespace Home\Controller;

use Tools\IndexController,
    Model\VersionModel;

class VersionController extends IndexController {

    public function update($type, $version) {
        $vsmd = new VersionModel();

        $data['status'] = 200;
        $data['msg'] = '版本更新！';

        $client = $vsmd->where("client_type=$type")->order('time desc')->find();
        $current = explode('.', $version);
        $latest = explode('.', $client['client_version']);

        $bool = $vsmd->check($current, $latest);

        if ($bool) {
            $data['data'] = array(
                'is_update' => TRUE, //是否需要更新
                'is_required' => $client['is_required'] == 1 ? TRUE : FALSE, //是否必须更新
                'latest_version' => $client['client_version'], //最新的版本号
                'update_note' => $client['update_note'], //更新的说明
                'down_link' => $_SERVER['SERVER_NAME'].'/Public/Version/'.$client['client_link'], //安装包的下载地址      
            );
        } else {
            $data['data'] = array(
                'is_update' => FALSE,
                'is_required' => FALSE,
                'latest_version' => $client['client_version'],
                'update_note' => '',
                'down_link' => ''
            );
        }
        echo rsa_encrypt($data);
    }

}
