<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 13:46:29
         compiled from "Admin/View\Buy\addManufacturer.html" */ ?>
<?php /*%%SmartyHeaderCode:1132459c5f535369d83-85062109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf49b3f082b890d54314a91d21386896981b92ce' => 
    array (
      0 => 'Admin/View\\Buy\\addManufacturer.html',
      1 => 1496413731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1132459c5f535369d83-85062109',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c5f53553c76',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c5f53553c76')) {function content_59c5f53553c76($_smarty_tpl) {?><!DOCTYPE html>
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
            <form action="" method="post" class="layui-form layui-form-pane">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>厂商名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="mf_name" required=""
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        选择生产分类
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="layui-input-block">
                                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <div style="width:180px;margin: 5px;float:left;">
                                            <input name="dc" type="checkbox" fd="<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['dc_id'];?>
" > <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['dc_name'];?>

                                        </div>
                                        <?php endfor; endif; ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit="" lay-filter="add">增加</button>
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
                    var s = '';
                    $('input[name="dc"]:checked').each(function () {
                        s += $(this).attr('fd') + ',';
                    });
                    $.post("<?php echo @__SELF__;?>
",{mf_name:data['field'].mf_name,dcids:s}, function (result) {
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