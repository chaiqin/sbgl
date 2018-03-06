<?php /* Smarty version Smarty-3.1.6, created on 2018-01-30 15:23:34
         compiled from "Admin/View\Login\login.html" */ ?>
<?php /*%%SmartyHeaderCode:302275a701d76f00945-20061732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '265be31fa34b93622723604b6d901fc972e9e350' => 
    array (
      0 => 'Admin/View\\Login\\login.html',
      1 => 1506310195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '302275a701d76f00945-20061732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a701d772d512',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a701d772d512')) {function content_5a701d772d512($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="<?php echo @__PUBLIC__;?>
/Admin/css/x-admin.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo @__PUBLIC__;?>
/Admin/css/login.css"/>

    </head>
    <body>
        <div id="login">
            <h1>Login</h1>
            <form class="layui-form">
                <input type="text" required="required" placeholder="用户名" name="user">
                <input type="password" id="pwd" required="required" placeholder="密码" name="psd">
                <input type="text" required="required"  name="captcha" placeholder="验证码" class="cap">
                <div class="tu"><img id="imgRefresh" src="<?php echo @__CONTROLLER__;?>
/verifyImg" onclick="this.src = '<?php echo @__CONTROLLER__;?>
/verifyImg/' + Math.random()"></div>
                <button class="but" lay-filter="*" lay-submit type="submit" name="sub">登录</button>
			    <div  style="margin-top:10px;"><a href="#" onclick="modify('重置密码', '<?php echo @__CONTROLLER__;?>
/modify', '400', '280');return false;">忘记密码</a></div>
            </form>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
		<script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['element', 'form', 'layer'], function () {
                $ = layui.jquery;
				lement = layui.element();
                var form = layui.form(),
                        layer = layui.layer;

                $(document).ready(function () {
                    form.on('submit(*)', function (data) {
                        $.post("<?php echo @__SELF__;?>
", data['field'], function (result) {
                            if (result.status) {
                                window.location.href="<?php echo @__MODULE__;?>
/Index/index";
                            } else {
                                var src = $("#imgRefresh").attr('src');
                                $("#imgRefresh").attr('src', src + '?' + Math.random());
                                $("#pwd").val("");
                                layer.alert(result.msg, {icon: 6});
                            }
                        });
                        return false;
                    });
                });


            });

			
			function modify(title, url, w, h) {
                    x_admin_show(title, url, w, h);
                }
        </script>
    </body>
</html>

<?php }} ?>