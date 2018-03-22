<?php /* Smarty version Smarty-3.1.6, created on 2018-03-17 20:21:11
         compiled from "Home/View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:187545aab628dcb0639-18193615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd69f17d9c178b9bac87ee7dcaa591ea91c6d234' => 
    array (
      0 => 'Home/View\\Index\\index.html',
      1 => 1521289268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187545aab628dcb0639-18193615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aab628ddb9aa',
  'variables' => 
  array (
    'mrlist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aab628ddb9aa')) {function content_5aab628ddb9aa($_smarty_tpl) {?><!DOCTYPE html>
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
/Admin/lib/layui/css/layui.css" media="all">
        <link rel="stylesheet" href="<?php echo @__PUBLIC__;?>
/Home/css/extra.css" media="all">
    </head>
    <body>
        <div class="head">
            <div class="layui-main" >
                <ul class="layui-nav bg">
                    <li class="layui-nav-item"><a href="http://lab.jyueka.com/">首页</a></li>
                    <li class="layui-nav-item layui-this"><a href="">设备报修</a></li>
                    <li class="layui-nav-item head-right"><a href="/Admin.php">后台管理</a></li>
                </ul>
            </div>
        </div>
        <fieldset class="layui-elem-field ind_rp">
            <legend>报修</legend>
            <div class="layui-form-item" >
                <form class="layui-form">
                    <div class="layui-form-item"  >
                        <label class="layui-form-label">
                            机房房号：
                        </label>
                        <div class="layui-input-inline">
                            <select name="room">
                                <option value="">--请选择--</option>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mrlist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['mrlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mr_room'];?>
"><?php echo $_smarty_tpl->tpl_vars['mrlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mr_room'];?>
</option>
                                <?php endfor; endif; ?>	
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item"  >
                        <label class="layui-form-label">
                            座位号数：
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" name="seat" required="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item"  >
                        <label class="layui-form-label">
                            故障描述：
                        </label>
                        <div class="layui-input-inline">
                            <textarea name="matter"  class="layui-textarea"></textarea>   
                        </div>
                    </div>
                    <div class="layui-form-item"  >
                        <label class="layui-form-label">
                        </label>
                        <div class="layui-input-inline">
                            <button  class="layui-btn" lay-filter="add" lay-submit="" style="float: left;" >报修</button>  
                        </div>
                    </div>
                </form>
            </div>
        </fieldset>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script>
            layui.use(['element', 'form', 'layer'], function () {
                $ = layui.jquery;//jquery
                var form = layui.form();
                lement = layui.element();//面包导航
                layer = layui.layer;//弹出层

                //监听提交
                form.on('submit(add)', function (data) {
                    $.post("<?php echo @__CONTROLLER__;?>
/index", data['field'],
                            function (result) {
                                if (result.status) {
                                    $("form")[0].reset();
                                    layer.alert(result.msg, {icon: 6});
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