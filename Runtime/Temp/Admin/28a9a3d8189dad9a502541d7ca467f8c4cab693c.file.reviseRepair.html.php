<?php /* Smarty version Smarty-3.1.6, created on 2018-01-30 15:32:29
         compiled from "Admin/View\Repair\reviseRepair.html" */ ?>
<?php /*%%SmartyHeaderCode:246875a701f8dd94779-16007106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28a9a3d8189dad9a502541d7ca467f8c4cab693c' => 
    array (
      0 => 'Admin/View\\Repair\\reviseRepair.html',
      1 => 1496461234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '246875a701f8dd94779-16007106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a701f8e2a6f3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a701f8e2a6f3')) {function content_5a701f8e2a6f3($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\sbgl\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
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
                    <label class="layui-form-label">
                        <span class="x-red">*</span>设备编号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="rp_device_identifier" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['rp_device_identifier'];?>
">
                        <input type="hidden" name="rp_id"
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['rp_id'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>位置描述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="rp_location" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['rp_location'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>故障描述
                    </label>
                    <div class="layui-input-inline">
                        <textarea name="rp_matter"  class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['list']->value['rp_matter'];?>
</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>报修时间
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="rp_time" required=""
                               autocomplete="off" class="layui-input" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['rp_time'],"%Y-%m-%d");?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>报修人
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" disabled
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['rp_person'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>审核状态
                    </label>
                    <div class="layui-input-inline">
                        <select name="rp_status">
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['list']->value['rp_status']==1){?> selected <?php }?> >待审核</option>
                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['list']->value['rp_status']==2){?> selected <?php }?> >通过审核</option>
                            <option value="3" <?php if ($_smarty_tpl->tpl_vars['list']->value['rp_status']==3){?> selected <?php }?> >未通过审核</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        维修状态
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" disabled
                               autocomplete="off" class="layui-input"  value="<?php echo $_smarty_tpl->tpl_vars['list']->value['rp_solve_status'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        维修人
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" disabled
                               autocomplete="off" class="layui-input"  value="<?php echo $_smarty_tpl->tpl_vars['list']->value['rp_solve_user'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        方法描述
                    </label>
                    <div class="layui-input-inline">
                        <textarea  class="layui-textarea" disabled><?php echo $_smarty_tpl->tpl_vars['list']->value['rp_solve'];?>
</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        维修时间
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" disabled
                               autocomplete="off" class="layui-input" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['rp_solve_time'],"%Y-%m-%d");?>
" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
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
/reviseRepair", data['field'],
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