<?php /* Smarty version Smarty-3.1.6, created on 2018-01-30 15:38:09
         compiled from "Admin/View\User\addUser.html" */ ?>
<?php /*%%SmartyHeaderCode:199845a7020e13c6202-91570512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fab846fc45a2f84344ac7436e57cc252cdeaf8e' => 
    array (
      0 => 'Admin/View\\User\\addUser.html',
      1 => 1496548501,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199845a7020e13c6202-91570512',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a7020e165823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7020e165823')) {function content_5a7020e165823($_smarty_tpl) {?><!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            设备管理系统
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="<?php echo @__PUBLIC__;?>
/Admin/css/x-admin.css" media="all">
    </head>
    
    <body>
        <div class="x-body">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>一卡通号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_user" name="user" required=""
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>将会成为您唯一的登入账号
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>输入密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="psd" required=""
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span>确认密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="repsd" required=""
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        增加
                    </button>
                </div>
            </form>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-layui.js" charset="utf-8">
        </script>
        <script>
            layui.use(['form','layer'], function(){
			    $ = layui.jquery;
				var form = layui.form()
				,layer = layui.layer;
				
				//监听提交
				form.on('submit(add)', function(data){
				   $.post("<?php echo @__CONTROLLER__;?>
/addUser",{user:data['field'].user,psd:data['field'].psd,repsd:data['field'].repsd},function(result){
				     if(result.status){
						 layer.alert(result.msg, {icon: 6},function () {
						  // 获得frame索引
						 var index = parent.layer.getFrameIndex(window.name);
						 //关闭当前frame
						 parent.layer.close(index);
                                                 parent.self.location.reload();
					    });
					 }else{
					     layer.alert(result.msg, {icon: 6});
					 }
				   });
					return false;
				});
            });
        </script>
    </body>

</html><?php }} ?>