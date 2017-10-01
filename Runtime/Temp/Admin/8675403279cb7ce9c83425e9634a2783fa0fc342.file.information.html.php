<?php /* Smarty version Smarty-3.1.6, created on 2017-09-27 22:28:32
         compiled from "Admin/View\Person\information.html" */ ?>
<?php /*%%SmartyHeaderCode:2625159c614ea3ffe92-53236356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8675403279cb7ce9c83425e9634a2783fa0fc342' => 
    array (
      0 => 'Admin/View\\Person\\information.html',
      1 => 1506522510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2625159c614ea3ffe92-53236356',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c614ea561af',
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c614ea561af')) {function content_59c614ea561af($_smarty_tpl) {?><!DOCTYPE html>
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
                <a><cite>个人中心</cite></a>
                <a><cite>我的信息</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
		 <form class="layui-form">
                <label class="layui-form-label" style="font-size:20px;text-align:left;">基本信息</label><a href="#" class="layui-btn" onclick="exp('从正方系统导出', '<?php echo @__CONTROLLER__;?>
/expt', '400', '170');return false;">从正方系统导出</a>          
				<button  class="layui-btn" lay-filter="*" lay-submit="">
                    保存
                </button>
                <hr class="layui-bg-green">
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        你的姓名：
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="username" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['username'];?>
">
                    </div>
                    <label class="layui-form-label">
                        正方账号：
                    </label>
                    <div class="layui-input-inline">
                        <input type="text"  required="" disabled
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['user'];?>
">
                        <input type="hidden" name='id' class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        所在班级：
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="class" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['class'];?>
">
                    </div>
                    <label class="layui-form-label">
                        常用邮箱：
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="email" 
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['email'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        联系手机：
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="phone" 
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['phone'];?>
">
                    </div>
                    <label class="layui-form-label">
                        手机短号：
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="sphone" 
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['sphone'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                </div>
            </form>
            <form class="layui-form">
                <label class="layui-form-label" style="font-size:20px;text-align:left;">修改密码</label>  
                <button  class="layui-btn" lay-filter="change" lay-submit="">
                    确定
                </button>
                <hr class="layui-bg-green">
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        旧的密码：
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" name="old_psd" required=""
                               autocomplete="off" class="layui-input" >
                    </div>
                    <label class="layui-form-label">
                        新的密码：
                    </label>
                    <div class="layui-input-inline">
                        <input type="password"  name="new_psd" required="" 
                               autocomplete="off" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        重复密码：
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" name="repsd" required=""
                               autocomplete="off" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                </div>
            </form>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-layui.js" charset="utf-8"></script>
        <script>
                    layui.use(['element', 'form', 'layer'], function () {
                        $ = layui.jquery;//jquery
                        lement = layui.element();//面包导航
                        var form = layui.form()
                                , layer = layui.layer;

                        form.on('submit(*)', function (data) {
                            $.post("<?php echo @__SELF__;?>
", data['field'], function (result) {
                                if (result.msg) {
                                    if (result.status) {
                                        layer.alert(result.msg, function () {
                                            self.location.reload();
                                        });
                                    } else {
                                        layer.alert(result.msg, {icon: 6});
                                    }
                                } else {
                                    layer.msg(result, {icon: 1, time: 1000});
                                }
                            });
                            return false;
                        });


                        form.on('submit(change)', function (data) {
                            $.post("<?php echo @__CONTROLLER__;?>
/change", data['field'], function (result) {
                                if (result.msg) {
                                    if (result.status) {
                                        layer.alert(result.msg, function () {
                                            self.location.reload();
                                        });
                                    } else {
                                        layer.alert(result.msg, {icon: 6});
                                    }
                                } else {
                                    layer.msg(result, {icon: 1, time: 1000});
                                }
                            });
                            return false;
                        });

                    });

                    function exp(title, url, w, h) {
                        x_admin_show(title, url, w, h);
                    }

        </script>
    </body>
</html><?php }} ?>