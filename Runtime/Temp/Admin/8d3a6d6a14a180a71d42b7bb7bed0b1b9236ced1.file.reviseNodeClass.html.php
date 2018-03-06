<?php /* Smarty version Smarty-3.1.6, created on 2018-01-30 16:13:08
         compiled from "Admin/View\Node\reviseNodeClass.html" */ ?>
<?php /*%%SmartyHeaderCode:271415a70291416bac4-71334648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d3a6d6a14a180a71d42b7bb7bed0b1b9236ced1' => 
    array (
      0 => 'Admin/View\\Node\\reviseNodeClass.html',
      1 => 1505996235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271415a70291416bac4-71334648',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a7029143db4d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7029143db4d')) {function content_5a7029143db4d($_smarty_tpl) {?><!DOCTYPE html>
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
                        <span class="x-red">*</span>权限类名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_user" name="name" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
">
                        <input type="hidden"  name="id" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                    </div>
                </div> 
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>排列序号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_user" name="sort"
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['sort'];?>
">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        将决定管理平台左侧模块顺序
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>显示状态
                    </label>
                    <div class="layui-input-inline">
                        <select name="display">
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['list']->value['display']==1){?> selected <?php }?> >显示</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['list']->value['display']==0){?> selected <?php }?>>不显示</option>
                        </select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        将决定管理平台左侧模块是否显示
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
/reviseNodeClass",
                            {id: data['field'].id, name: data['field'].name, sort: data['field'].sort, display: data['field'].display},
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