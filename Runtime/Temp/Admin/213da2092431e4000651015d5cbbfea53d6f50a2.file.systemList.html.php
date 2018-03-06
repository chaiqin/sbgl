<?php /* Smarty version Smarty-3.1.6, created on 2018-01-30 16:29:36
         compiled from "Admin/View\System\systemList.html" */ ?>
<?php /*%%SmartyHeaderCode:238935a702cf0960ef8-60584808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '213da2092431e4000651015d5cbbfea53d6f50a2' => 
    array (
      0 => 'Admin/View\\System\\systemList.html',
      1 => 1495372344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238935a702cf0960ef8-60584808',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bkstage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a702cf0a746a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a702cf0a746a')) {function content_5a702cf0a746a($_smarty_tpl) {?><!DOCTYPE html>
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
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>系统设置</cite></a>
              <a><cite>基本设置</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
              <form class="layui-form">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>系统名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_user" name="backstage" 
                        autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['bkstage']->value['contents'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        确定
                    </button>
                </div>
            </form>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['element','form','layer'], function(){
                $ = layui.jquery;
              lement = layui.element();//面包导航
              var form = layui.form()
              ,layer = layui.layer;

              //监听提交
              form.on('submit(add)', function(data){
				   $.post("<?php echo @__CONTROLLER__;?>
/reviseSystem",{backstage:data['field'].backstage},function(result){ 
					    layer.alert(result.msg, {icon: 6});
				   });
					return false;
              });
              
              
            });
         
		</script>
    </body>
</html><?php }} ?>