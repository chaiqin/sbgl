<?php /* Smarty version Smarty-3.1.6, created on 2018-01-30 16:30:02
         compiled from "Admin/View\Person\expt.html" */ ?>
<?php /*%%SmartyHeaderCode:915a702d0a54f233-06253822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d601556881cc4ca8f7534ba31c39eb60dc09978' => 
    array (
      0 => 'Admin/View\\Person\\expt.html',
      1 => 1505993705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '915a702d0a54f233-06253822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a702d0a6a3a5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a702d0a6a3a5')) {function content_5a702d0a6a3a5($_smarty_tpl) {?><!DOCTYPE html>
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
                        <span class="x-red">*</span>正方密码 :
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" name="stupsd" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
				   <div style="margin:0 auto;width:300px">
                    <button  class="layui-btn" lay-filter="add" lay-submit="" style="margin:0 10px;width:120px;float:left">
                        获 取
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
/expt", data['field'],
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