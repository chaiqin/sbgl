<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 15:16:21
         compiled from "Admin/View\Repair\confirm.html" */ ?>
<?php /*%%SmartyHeaderCode:2127459c60a45dad851-38387084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a6931025e54e60c2623fc7e75b050f38ddcf452' => 
    array (
      0 => 'Admin/View\\Repair\\confirm.html',
      1 => 1496050515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2127459c60a45dad851-38387084',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'solve' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c60a4612bcc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c60a4612bcc')) {function content_59c60a4612bcc($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\sbgl\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
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
                        <span class="x-red">*</span>维修状态
                    </label>
                    <div class="layui-input-inline">
                        <select name="rp_solve_status">
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['list']->value['rp_solve_status']==1){?> selected <?php }?> >待维修</option>
                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['list']->value['rp_solve_status']==2){?> selected <?php }?> >已维修</option>
                            <option value="3" <?php if ($_smarty_tpl->tpl_vars['list']->value['rp_solve_status']==3){?> selected <?php }?> >维修中</option>
                            <option value="4" <?php if ($_smarty_tpl->tpl_vars['list']->value['rp_solve_status']==4){?> selected <?php }?> >无法维修</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        常见方法
                    </label>
                    <div class="layui-input-inline">
                        <select name="solve1">
                            <option value="">--请选择--</option>
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['solve']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <option value="<?php echo $_smarty_tpl->tpl_vars['solve']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['ms_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['solve']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['ms_value'];?>
</option>
                            <?php endfor; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        方法补充
                    </label>
                    <div class="layui-input-inline">
                        <textarea name="rp_solve"  class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['list']->value['rp_solve'];?>
</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>维修时间
                    </label>
                    <div class="layui-input-inline">
                        <input type="hidden" name="rp_id" 
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['rp_id'];?>
">
                        <input type="text" id="time" name="rp_solve_time" 
                               autocomplete="off" class="layui-input" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['rp_solve_time'],"%Y-%m-%d");?>
" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        确定
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
            layui.use(['laydate', 'form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form()
                        , layer = layui.layer;
                laydate = layui.laydate;//日期插件

                //监听提交
                form.on('submit(add)', function (data) {
                    $.post("<?php echo @__SELF__;?>
", data['field'],
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

                var start = {
                    min: '1970-01-01 00:00:01'
                    , max: '2038-01-09 03:14:07'
                    , istoday: false
                    , choose: function (datas) {
                    }
                };

                document.getElementById('time').onclick = function () {
                    start.elem = this;
                    laydate(start);
                }

            });
        </script>
    </body>

</html><?php }} ?>