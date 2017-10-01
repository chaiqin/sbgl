<?php

namespace Admin\Controller;

use Tools\AdminController;

class IndexController extends AdminController {

    //后台首页
    public function index() {
        $ncmd = M('Node_class');
        $ndmd = M('Node');
        $rlmd = M('Role');
        $usmd = M('User');
        $stmd = M('System');

        $bkstage = $stmd->where("name='backstage'")->find();

        //获取权限类和权限
        $admin_id = session('admin_id');
        $user = $usmd->find($admin_id);
        $role = $rlmd->find($user['role']);

        $node = $ndmd->where("display=1 and id in ({$role['node_list']})")->order('sort asc')->select();
        foreach ($node as $k => $v) {
            $list[] = $v['pid'];
        }
        $list = array_unique($list);
        $list = implode(',', $list);
        $flist = $ncmd->order('sort asc')->select($list);

        $this->assign('bkstage', $bkstage);
        $this->assign('flist', $flist);
        $this->assign('node', $node);
        $this->display();
    }

    //我的桌面
    function desktop() {
        $usWh = 'type=0';
        $amWh = 'type=1';

        $dvArray = $this->getNumber('Device', 'dv_time');
        $byArray = $this->getNumber('Buy', 'time');
        $rpArray = $this->getNumber('Repair', 'rp_time');
        $brArray = $this->getNumber('Borrow', 'br_time');
        $usArray = $this->getNumber('User', 'reg_time', $usWh);
        $amArray = $this->getNumber('User', 'reg_time', $amWh);


        $this->assign('dvArray', $dvArray);
        $this->assign('byArray', $byArray);
        $this->assign('rpArray', $rpArray);
        $this->assign('brArray', $brArray);
        $this->assign('usArray', $usArray);
        $this->assign('amArray', $amArray);
        $this->display();
    }

    function getNumber($modelName, $timeName, $elseWhere = '') {
        $model = M($modelName);
        //今天，昨天，本周，本月时间戳。
        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
        $beginYesterday = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
        $endYesterday = mktime(0, 0, 0, date('m'), date('d'), date('Y')) - 1;
        $beginLastweek = mktime(0, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y'));
        $endLastweek = mktime(23, 59, 59, date('m'), date('d') - date('w') + 7 - 7, date('Y'));
        $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y'));
        $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y'));

        $today = $timeName . '>=' . $beginToday . ' AND ' . $timeName . '<=' . $endToday;
        $yesterday = $timeName . '>=' . $beginYesterday . ' AND ' . $timeName . '<=' . $endYesterday;
        $lastweek = $timeName . '>=' . $beginLastweek . ' AND ' . $timeName . '<=' . $endLastweek;
        $thismonth = $timeName . '>=' . $beginThismonth . ' AND ' . $timeName . '<=' . $endThismonth;

        if ($elseWhere) {
            $today .= ' AND ' . $elseWhere;
            $yesterday .= ' AND ' . $elseWhere;
            $lastweek .= ' AND ' . $elseWhere;
            $thismonth .= ' AND ' . $elseWhere;
        }

        $array = array();

        $array[0] = $model->where($elseWhere)->count();
        $array[1] = $model->where($today)->count();
        $array[2] = $model->where($yesterday)->count();
        $array[3] = $model->where($lastweek)->count();
        $array[4] = $model->where($thismonth)->count();

        return $array;
    }

    //日常管理提醒
    function remind() {
        $bymd = M('Buy');
        $rpmd = M('Repair');
        $brmd = M('Borrow');
        $buy = array();
        $repair = array();
        $borrow = array();
        $buy[0] = $bymd -> where('status=0') -> count();
        $buy[1] = $bymd -> where('status=2') -> count();
        $repair[0] = $rpmd ->where('rp_status=1') -> count();
        $repair[1] = $rpmd ->where('rp_status=2 and rp_solve_status=1') -> count();
        $borrow[0] = $brmd -> where('br_status=1') -> count();
        $borrow[1] = $brmd -> where('br_status=2 and br_actual_time is null') -> count();
        $this ->assign('buy',$buy);
        $this ->assign('repair',$repair);
        $this ->assign('borrow',$borrow);
        $this->display();
    }

    
}
