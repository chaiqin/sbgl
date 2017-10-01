<?php /* Smarty version Smarty-3.1.6, created on 2017-09-27 22:18:17
         compiled from "Admin/View\User\reviseUser.html" */ ?>
<?php /*%%SmartyHeaderCode:1316059c6167db1ea82-15159927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbf55fe2ac59896c3d18154be83ff8bc7069e68e' => 
    array (
      0 => 'Admin/View\\User\\reviseUser.html',
      1 => 1506521891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1316059c6167db1ea82-15159927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c6167dd97da',
  'variables' => 
  array (
    'list' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c6167dd97da')) {function content_59c6167dd97da($_smarty_tpl) {?><!DOCTYPE html>
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
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>一卡通号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text"  required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['user'];?>
" disabled>
                        <input type="hidden"  name="id" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                    </div>
                </div> 
				<div class="layui-form-item">
                    <label  class="layui-form-label">
                        用户姓名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="username"
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['username'];?>
">
                    </div>
                </div> 
				<div class="layui-form-item">
                    <label  class="layui-form-label">
                        所在班级
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="class"
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['class'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>您的邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="email"
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['email'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>手机号码
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="phone"
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['phone'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        手机短号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="sphone"
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['sphone'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>用户身份
                    </label>
                    <div class="layui-input-inline">
                        <select name="type" id="type" lay-filter="sel">
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==0){?> selected <?php }?> >会员</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?> selected <?php }?> >管理人员</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>用户角色
                    </label>
                    <div class="layui-input-inline">
                        <select name="role">
                            <option value="0">--请选择--</option>
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['role']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total']);
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['role']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['id']==$_smarty_tpl->tpl_vars['list']->value['role']){?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['role']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['name'];?>
</option>
                            <?php endfor; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        修改
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
            layui.use(['form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form()
                        , layer = layui.layer;

                //监听提交
                form.on('submit(add)', function (data) {
                    $.post("<?php echo @__CONTROLLER__;?>
/reviseUser", data['field'],
                            function (result) {
                                if (result.status) {
                                    layer.alert(result.msg, {icon: 6}, function () {
                                        // 获得frame索引
                                        var index = parent.layer.getFrameIndex(window.name);
                                        //关闭当前frame
                                        parent.layer.close(index);
                                        parent.self.location.reload();
                                    });
                                } else {
                                    layer.alert(result.msg, {icon: 6});
                                }
                            });
                    return false;
                });

            });
        </script>
    </body>

</html><?php }} ?>