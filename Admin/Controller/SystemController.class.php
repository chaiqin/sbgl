<?php

namespace Admin\Controller;

use Tools\AdminController,
    Model\SystemModel,
    Model\VersionModel;

class SystemController extends AdminController {

    //基本设置列表
    public function systemList() {
        $stmd = M('System');

        $bkstage = $stmd->where("name='backstage'")->find();

        $this->assign('bkstage', $bkstage);
        $this->display();
    }

    //编辑设置
    function reviseSystem() {
        $mfmd = new SystemModel();

        if (!empty($_POST)) {
            $bk['name'] = 'backstage';
            $bk['contents'] = $_POST['backstage'];
            $shu = $mfmd->create($bk);
            if ($shu) {
                $u = $mfmd->save($shu);
                if ($u) {
                    $data['msg'] = '修改成功';
                } else {
                    $data['msg'] = '修改失败';
                }
            } else {
                $data['msg'] = $mfmd->getError();
            }
            $this->ajaxReturn($data);
        }
    }

    //版本列表
    function versionList() {
        $vcmd = M('Version');

        //所有权限类
        $list = $vcmd->order('client_type asc,time desc')->select();
        $total = $vcmd->count();
        $i = icount();

        foreach ($list as $k => $v) {
            $list[$k]['client_link'] = $_SERVER['SERVER_NAME'].'/Public/Version/'.$v['client_link'];
        }

        $this->assign('total', $total);
        $this->assign('i', $i);
        $this->assign('list', $list);
        $this->display();
    }

    //添加版本
    function addVersion() {
        $vcmd = new VersionModel();

        if (!empty($_POST)) {
            $_POST['time'] = strtotime($_POST['time']);
            $shu = $vcmd->create($_POST);
            if (!$shu) {
                $this->error($vcmd->getError());
            }

            //文件上传
            $config = array(
                'rootPath' => "Public/Version/", //保存根路径
                'maxSize' => 500000000, //上传的文件大小限制
                'exts' => array('apk'), //允许上传的文件后缀
                'saveName' => 'time',
            );
            $upload = new \Think\Upload($config);
            $info = $upload->uploadOne($_FILES['source']);
            if (!$info) {
                $this->error($upload->getError());
            } else {
                $shu['client_link'] = $info['savepath'] . $info['savename'];
                if ($vcmd->add($shu)) {
                    $this->redirect('System/addVersion', array(), 3, '添加成功了...');
                } else {
                    $this->error('添加失败');
                }
            }
            $this->ajaxReturn($data);
        }

        $this->display();
    }

    //编辑版本
    function reviseVersion() {
        $id = $_REQUEST['id'];
        $vcmd = new VersionModel();

        $list = $vcmd->find($id);
        $list['client_link'] = $_SERVER['SERVER_NAME'].'/Public/Version/'.$list['client_link'];
        
        if (!empty($_POST)) {
            $_POST['time'] = strtotime($_POST['time']);
            $shu = $vcmd->create($_POST);
            if (!$shu) {
                $this->error($vcmd->getError());
            }

            if ($_FILES['source']['error'] < 4) {
                //文件重新上传
                $config = array(
                    'rootPath' => "Public/Version/", //保存根路径
                    'maxSize' => 2000000, //上传的文件大小限制
                    'exts' => array('apk'), //允许上传的文件后缀
                    'saveName' => 'time',
                );
                $upload = new \Think\Upload($config);
                $info = $upload->uploadOne($_FILES['source']);
                if (!$info) {
                    $this->error($upload->getError());
                } else {
                     //上传成功，删除旧文件
                    $url = $upload->rootPath . $list['client_link'];
                    unlink($url);
                    $shu['client_link'] = $info['savepath'] . $info['savename'];
                }
            }
            if ($vcmd->save($shu)) {
                $this->redirect('System/reviseVersion', array('id'=>$id), 2, '修改成功了...');
            } else {
                $this->error('修改失败');
            }
        }

        $this->assign('list', $list);
        $this->display();
    }

    //删除版本
    function deleteVersion() {
        $data['status'] = 0;
        $id = $_POST['id'];

        if (empty($id)) {
            $data['msg'] = '请选择要删除的数据！';
            $this->ajaxReturn($data);
        }

        $vcmd = new VersionModel();
        $list = $vcmd->field('client_link')->select($id);
        foreach ($list as $v) {
            $url = 'Public/Version/'.$v['client_link'];
            unlink($url);
        }
        $info = $vcmd->delete($id);
        if ($info) {
            $data['status'] = 1;
            $data['msg'] = '删除成功';
        } else {
            $data['msg'] = '删除失败';
        }
        $this->ajaxReturn($data);
    }

}
