<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 15:25:06
         compiled from "Admin/View\Borrow\checkBorrow.html" */ ?>
<?php /*%%SmartyHeaderCode:274259c60c52c440d2-39221638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '845ea20932ef3ae2fceebe62e940bdad9f2e32c0' => 
    array (
      0 => 'Admin/View\\Borrow\\checkBorrow.html',
      1 => 1494144426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '274259c60c52c440d2-39221638',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'br_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c60c52e57c8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c60c52e57c8')) {function content_59c60c52e57c8($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\sbgl\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
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
                    <label class="layui-form-label">
                        <span class="x-red">*</span>归还时间
                    </label>
                    <div class="layui-input-inline">
					    <input type="text" id="actual_time" name="br_actual_time" required=""
                        autocomplete="off" class="layui-input" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['br_actual_time'],'%Y-%m-%d');?>
" >
					    <input type="hidden"  name="br_id" required=""
                        autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['br_id']->value;?>
">
                    </div>
                </div>
				<div class="layui-form-item">
                    <label class="layui-form-label">
                        归还状况
                    </label>
                    <div class="layui-input-inline">
					    <textarea name="br_remark"  class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['list']->value['br_remark'];?>
</textarea>
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
            layui.use(['laydate','form','layer'], function(){
			    $ = layui.jquery;
				var form = layui.form()
				,layer = layui.layer;
				laydate = layui.laydate;//日期插件
				
				//监听提交
				form.on('submit(add)', function(data){
				   $.post("<?php echo @__CONTROLLER__;?>
/checkBorrow",data['field'],
				   function(result){
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
				
              var start = {
			     min: '1970-01-01 00:00:01'
                ,max: '2038-01-09 03:14:07'
                ,istoday: false
                ,choose: function(datas){
                  end.min = datas; //开始日选好后，重置结束日的最小日期
                  end.start = datas //将结束日的初始值设定为开始日
                }
              };
						
              document.getElementById('actual_time').onclick = function(){
                start.elem = this;
                laydate(start);
              }
				
            });
        </script>
    </body>

</html><?php }} ?>