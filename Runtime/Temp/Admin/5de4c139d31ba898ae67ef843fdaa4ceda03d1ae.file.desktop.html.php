<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 13:36:54
         compiled from "Admin/View\Index\desktop.html" */ ?>
<?php /*%%SmartyHeaderCode:1990659c5f2f6b3e458-86240127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5de4c139d31ba898ae67ef843fdaa4ceda03d1ae' => 
    array (
      0 => 'Admin/View\\Index\\desktop.html',
      1 => 1505998370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1990659c5f2f6b3e458-86240127',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dvArray' => 0,
    'byArray' => 0,
    'rpArray' => 0,
    'brArray' => 0,
    'usArray' => 0,
    'amArray' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c5f2f6dcb3f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c5f2f6dcb3f')) {function content_59c5f2f6dcb3f($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\sbgl\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            X-admin v1.0
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
            <span style="font-size:17px;color:#009688;"><p>登录次数：<?php echo $_SESSION['log_number'];?>
 </p>
                <p>上次登录IP：<?php echo $_SESSION['log_ip'];?>
&nbsp;&nbsp;&nbsp;上次登录时间：<?php echo smarty_modifier_date_format($_SESSION['log_time'],"%Y-%m-%d %T");?>
</p></span>
            <fieldset class="layui-elem-field layui-field-title site-title">
              <legend><a name="default">信息统计</a></legend>
            </fieldset>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>统计</th>
                        <th>设备</th>
                        <th>设备采购</th>
                        <th>设备维修</th>
                        <th>设备出借</th>
                        <th>用户</th>
                        <th>管理员</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>总数</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['dvArray']->value[0];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['byArray']->value[0];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rpArray']->value[0];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['brArray']->value[0];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['usArray']->value[0];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['amArray']->value[0];?>
</td>
                    </tr>
                    <tr>
                        <td>今日</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['dvArray']->value[1];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['byArray']->value[1];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rpArray']->value[1];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['brArray']->value[1];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['usArray']->value[1];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['amArray']->value[1];?>
</td>
                    </tr>
                    <tr>
                        <td>昨日</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['dvArray']->value[2];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['byArray']->value[2];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rpArray']->value[2];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['brArray']->value[2];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['usArray']->value[2];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['amArray']->value[2];?>
</td>
                    </tr>
                    <tr>
                        <td>本周</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['dvArray']->value[3];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['byArray']->value[3];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rpArray']->value[3];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['brArray']->value[3];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['usArray']->value[3];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['amArray']->value[3];?>
</td>
                    </tr>
                    <tr>
                        <td>本月</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['dvArray']->value[4];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['byArray']->value[4];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rpArray']->value[4];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['brArray']->value[4];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['usArray']->value[4];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['amArray']->value[4];?>
</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-admin.js"></script>
    </body>
</html><?php }} ?>