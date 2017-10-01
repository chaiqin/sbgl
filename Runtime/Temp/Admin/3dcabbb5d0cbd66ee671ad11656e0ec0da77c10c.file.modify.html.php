<?php /* Smarty version Smarty-3.1.6, created on 2017-09-25 11:45:04
         compiled from "Admin/View\Login\modify.html" */ ?>
<?php /*%%SmartyHeaderCode:1800259c86bdf356e10-58714321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dcabbb5d0cbd66ee671ad11656e0ec0da77c10c' => 
    array (
      0 => 'Admin/View\\Login\\modify.html',
      1 => 1506311101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1800259c86bdf356e10-58714321',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c86bdf44172',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c86bdf44172')) {function content_59c86bdf44172($_smarty_tpl) {?><!DOCTYPE html>
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
			    <div class="layui-form-item" >
                    <label  class="layui-form-label" style="text-align:left;width:80px;font-size:16px;" >
                        一卡通号 :
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="stu_id" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item" >
                    <label  class="layui-form-label" style="text-align:left;width:80px;font-size:16px;" >
                        正方密码 :
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" name="stu_psd" autocomplete="off" class="layui-input">
                    </div>
                </div>
				<div class="layui-form-item" >
                    <label  class="layui-form-label" style="text-align:left;width:80px;font-size:16px;" >
                        新的密码 :
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" name="new_psd" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
				   <div style="margin:0 auto;width:300px">
                    <button  class="layui-btn" lay-filter="add" lay-submit="" style="margin:0 10px;width:120px;float:left">
                        确定
                    </button>
					<button  class="layui-btn" lay-filter="close" lay-submit="" style="margin:0 10px;width:120px;float:right">
                        取 消
                    </button>
				   </div>
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
            layui.use(['laydate', 'form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form()
				, layer = layui.layer;
 

                //监听提交
                form.on('submit(add)', function (data) {
                    $.post("<?php echo @__CONTROLLER__;?>
/modify", data['field'],
                            function (result) {
                                if (result.status) {
                                    parent.layer.alert(result.msg, {icon: 6}, function () {
                                        // 获得frame索引
                                        var index = parent.layer.getFrameIndex(window.name);
                                        //关闭当前frame
                                        parent.layer.close(index);
                                        parent.self.location.reload();
                                    });
                                } else {
                                    parent.layer.alert(result.msg, {icon: 6});
                                }
                            });
                    return false;
                });
				
				form.on('submit(close)', function (data) {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
				
            });
			
        </script>
    </body>

</html><?php }} ?>