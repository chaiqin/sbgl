<?php
namespace Admin\Controller;
use Tools\AdminController,    Model\RoleModel,
    Model\NodeModel;

class RoleController extends AdminController {
    
	//角色列表
    function roleList(){
        $romd = new RoleModel();
        
        $list  = $romd  -> select();
        $total = $romd  -> count();
		$i = icount();
        foreach($list as $k => $v){
			$list[$k]['i'] = $i++; 
		}
        $this -> assign('list',$list);
        $this -> assign('total',$total);
        $this -> display();
    }

    
	//添加角色
    function addRole(){
        $romd = new RoleModel();
        $ncmd = M('Node_class');
        $ndmd = M('Node');
		
		$nodeClass = $ncmd -> order('sort asc') -> select(); 
		$nodes = $ndmd -> where('public=1') -> select();
		
        if(!empty($_POST)){
			$data['status'] = 0;
			$_POST['node_list'] = rtrim($_POST['node_list'],',');
            $shu = $romd -> create();
            if($shu){
                if($romd -> add($shu)){
					$data['status'] = 1;
                    $data['msg']  = '创建成功';
                }else{
                    $data['msg']  = '创建失败';
                    }
            }else {
                $data['msg']  =  $romd -> getError();
            }
			$this -> ajaxReturn($data);
        }
        $this -> assign('nodes',$nodes);
        $this -> assign('nodeClass',$nodeClass);
        $this -> display();
    }
    
	
	//编辑角色
	function reviseRole(){
		$id   = $_GET['id'];
        $romd = new RoleModel();
        $ncmd = M('Node_class');
        $ndmd = M('Node');
		
		$nodeClass = $ncmd -> order('sort asc') -> select(); 
		$nodes = $ndmd -> where('public=1') -> select();
		
        //查找修改角色
        $list = $romd -> find($id);
		$node_list = explode(',',$list['node_list']);
        //修改
        if(!empty($_POST)){
			$data['status'] = 0;
			$_POST['node_list'] = rtrim($_POST['node_list'],',');
            $shu = $romd -> create();
            if($shu){
                if($romd -> save($shu)){
					$data['status'] = 1;
                    $data['msg']  = '修改成功';
                }else{
                    $data['msg']  = '修改失败';
                    }
            }else {
                $data['msg']  =  $romd -> getError();
            }
			$this -> ajaxReturn($data);
        }
               
        $this -> assign('list',$list);
        $this -> assign('nodes',$nodes);
        $this -> assign('nodeClass',$nodeClass);
        $this -> assign('node_list',$node_list);
        $this -> display();
    }
    
	
	
	//删除角色
    function deleteRole(){
		$data['status'] = 0;
		$id = $_POST['id'];
		
		if(empty($id)){
			$data['msg'] = '请选择要删除的数据！';
			$this -> ajaxReturn($data);
		}
		
        $romd = new RoleModel();
        $info  = $romd -> delete($id);
        if($info) {
			$data['status'] = 1;
            $data['msg']    = '删除成功';
        }else {
            $data['msg'] = '删除失败';
        }
		$this -> ajaxReturn($data);
    }
	
	
	

    
}