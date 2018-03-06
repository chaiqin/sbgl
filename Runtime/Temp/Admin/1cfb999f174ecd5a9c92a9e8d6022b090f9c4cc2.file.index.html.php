<?php /* Smarty version Smarty-3.1.6, created on 2018-01-30 15:23:47
         compiled from "Admin/View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:65345a701d835db594-33496964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cfb999f174ecd5a9c92a9e8d6022b090f9c4cc2' => 
    array (
      0 => 'Admin/View\\Index\\index.html',
      1 => 1496328262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65345a701d835db594-33496964',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bkstage' => 0,
    'flist' => 0,
    'node' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a701d837e6bb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a701d837e6bb')) {function content_5a701d837e6bb($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo $_smarty_tpl->tpl_vars['bkstage']->value['contents'];?>

        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="<?php echo @__PUBLIC__;?>
/Admin/css/x-admin.css" media="all">
    </head>
    <body>
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header header header-demo">
                <div class="layui-main">
                    <span class="logo">
                        <?php echo $_smarty_tpl->tpl_vars['bkstage']->value['contents'];?>

                    </span>
                    <ul class="layui-nav">
                        <li class="layui-nav-item">欢迎您！</li>
                        <li class="layui-nav-item">
                            <a href="javascript:;"><?php echo $_SESSION['admin_user'];?>
</a>
                            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                                <dd><a href="<?php echo @__MODULE__;?>
/Login/logout">注销</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="layui-side layui-bg-black x-side">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['flist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <cite><?php echo $_smarty_tpl->tpl_vars['flist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['name'];?>
</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['z'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['z']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['name'] = 'z';
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['node']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['z']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['z']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['z']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['z']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['z']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['z']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['z']['total']);
?>
                                    <?php if ($_smarty_tpl->tpl_vars['node']->value[$_smarty_tpl->getVariable('smarty')->value['section']['z']['index']]['pid']==$_smarty_tpl->tpl_vars['flist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['id']){?>
                                <dd class="">
                                    <a href="javascript:;" _href="<?php echo @__MODULE__;?>
/<?php echo $_smarty_tpl->tpl_vars['node']->value[$_smarty_tpl->getVariable('smarty')->value['section']['z']['index']]['name'];?>
">
                                        <cite><?php echo $_smarty_tpl->tpl_vars['node']->value[$_smarty_tpl->getVariable('smarty')->value['section']['z']['index']]['alias'];?>
</cite>
                                    </a>
                                </dd>
                                <?php }?>	
                                <?php endfor; endif; ?>	
                                </dd>
                            </dl>
                        </li> 
                        <?php endfor; endif; ?>	
                    </ul>
                </div>

            </div>
            <div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">
                <div class="x-slide_left"></div>
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        我的桌面
                        <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                    </li>
                </ul>
                <div class="layui-tab-content site-demo site-demo-body">
                    <div class="layui-tab-item layui-show">
                        <iframe frameborder="0" src="<?php echo @__CONTROLLER__;?>
/desktop" class="x-iframe"></iframe>
                    </div>
                </div>
            </div>
            <div class="site-mobile-shade">
            </div>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-admin.js"></script>
    </body>
</html><?php }} ?>