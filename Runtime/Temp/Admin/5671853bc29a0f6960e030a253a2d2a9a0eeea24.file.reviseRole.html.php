<?php /* Smarty version Smarty-3.1.6, created on 2017-09-25 18:08:04
         compiled from "Admin/View\Role\reviseRole.html" */ ?>
<?php /*%%SmartyHeaderCode:554559c8d5849a2c00-29363988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5671853bc29a0f6960e030a253a2d2a9a0eeea24' => 
    array (
      0 => 'Admin/View\\Role\\reviseRole.html',
      1 => 1496408179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '554559c8d5849a2c00-29363988',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'nodeClass' => 0,
    'nodes' => 0,
    'node_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c8d584c9a23',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c8d584c9a23')) {function content_59c8d584c9a23($_smarty_tpl) {?><!DOCTYPE html>
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
                        <span class="x-red">*</span>角色名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
">
                        <input type="hidden" id="name" name="id" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有权限
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nodeClass']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <tr>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['nodeClass']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['name'];?>

                                </td>
                                <td>
                                    <div class="layui-input-block">
                                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['z'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['z']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['name'] = 'z';
$_smarty_tpl->tpl_vars['smarty']->value['section']['z']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nodes']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <?php if ($_smarty_tpl->tpl_vars['nodes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['z']['index']]['pid']==$_smarty_tpl->tpl_vars['nodeClass']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['id']){?>
                                        <div style="width:180px;margin: 5px;float:left;">
                                            <input name="node" type="checkbox" fd="<?php echo $_smarty_tpl->tpl_vars['nodes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['z']['index']]['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['nodes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['z']['index']]['id'],$_smarty_tpl->tpl_vars['node_list']->value)){?> checked <?php }?> > <?php echo $_smarty_tpl->tpl_vars['nodes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['z']['index']]['alias'];?>

                                        </div>
                                        <?php }?>
                                        <?php endfor; endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endfor; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="desc" name="remark" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['list']->value['remark'];?>
</textarea>
                    </div>
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
                    $('input[name="node"]:checked').each(function () {
                        s += $(this).attr('fd') + ',';
                    });
                    $.post("<?php echo @__CONTROLLER__;?>
/reviseRole", {id: data['field'].id, name: data['field'].name, node_list: s, remark: data['field'].remark}, function (result) {
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