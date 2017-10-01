<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 13:45:58
         compiled from "Admin/View\Buy\reviseBuy.html" */ ?>
<?php /*%%SmartyHeaderCode:1204859c5f516b71ef1-03735209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90511b62db06f43a3f217f37179b21804831fe46' => 
    array (
      0 => 'Admin/View\\Buy\\reviseBuy.html',
      1 => 1496460887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1204859c5f516b71ef1-03735209',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dclist' => 0,
    'list' => 0,
    'mflist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c5f516e7de1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c5f516e7de1')) {function content_59c5f516e7de1($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\sbgl\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
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
                        <span class="x-red">*</span>设备分类
                    </label>
                    <div class="layui-input-inline">
                        <select name="dc_id">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dclist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <option value="<?php echo $_smarty_tpl->tpl_vars['dclist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['dc_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['dclist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['dc_id']==$_smarty_tpl->tpl_vars['list']->value['dc_id']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['dclist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['dc_name'];?>
</option>
                            <?php endfor; endif; ?>	
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>生产厂商
                    </label>
                    <div class="layui-input-inline">
                        <select name="manufacturer_id">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mflist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <option value="<?php echo $_smarty_tpl->tpl_vars['mflist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mf_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['mflist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mf_id']==$_smarty_tpl->tpl_vars['list']->value['manufacturer_id']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['mflist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mf_name'];?>
</option>
                            <?php endfor; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>设备型号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="name" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
"> 
                        <input type="hidden" name="id" 
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>设备单价
                    </label>
                    <div class="layui-input-inline">
                        <input type="text"  name="price" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['price'];?>
">
                    </div>
                </div> 
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>采购数量
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="number" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['number'];?>
">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>采购者
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="person"
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['person'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>购买日期
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="time" name="time" required=""
                               autocomplete="off" class="layui-input" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['time'],"%Y-%m-%d");?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>验收状态
                    </label>
                    <div class="layui-input-inline">
                        <input type="text"  disabled
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['status'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        验收人
                    </label>
                    <div class="layui-input-inline">
                        <input type="text"  disabled
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['reviewer'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        验收日期
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" disabled
                               autocomplete="off" class="layui-input" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['received_time'],"%Y-%m-%d");?>
">
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
            layui.use(['laydate', 'form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form()
                        , layer = layui.layer;
                laydate = layui.laydate;//日期插件

                //监听提交
                form.on('submit(add)', function (data) {
                    $.post("<?php echo @__CONTROLLER__;?>
/reviseBuy", data['field'],
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
                        end.min = datas; //开始日选好后，重置结束日的最小日期
                        end.start = datas //将结束日的初始值设定为开始日
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