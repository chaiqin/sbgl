<?php /* Smarty version Smarty-3.1.6, created on 2018-03-16 14:34:07
         compiled from "Admin/View\MachineRoom\reviseMachineRoom.html" */ ?>
<?php /*%%SmartyHeaderCode:122855aab655f7dcab1-39214940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80166bd270ab2806f46472775536628c97ae921b' => 
    array (
      0 => 'Admin/View\\MachineRoom\\reviseMachineRoom.html',
      1 => 1496056548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122855aab655f7dcab1-39214940',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aab655fa29e8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aab655fa29e8')) {function content_5aab655fa29e8($_smarty_tpl) {?><!DOCTYPE html>
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
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>机房号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="mr_room" required=""
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['mr_room'];?>
"> 
                        <input type="hidden" name="mr_id" 
                               autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['mr_id'];?>
">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        座位数量
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="mr_number" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['mr_number'];?>
"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        序号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="mr_sort" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['mr_sort'];?>
"
                               autocomplete="off" class="layui-input">
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
/reviseMachineRoom",data['field'],
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

                document.getElementById('LAY_demorange_s').onclick = function () {
                    start.elem = this;
                    laydate(start);
                }

                var buy = {
                    min: '1970-01-01 00:00:01'
                    , max: '2038-01-09 03:14:07'
                    , istoday: false
                    , choose: function (datas) {
                        end.min = datas; //开始日选好后，重置结束日的最小日期
                        end.start = datas //将结束日的初始值设定为开始日
                    }
                };

                document.getElementById('LAY_demorange_t').onclick = function () {
                    buy.elem = this;
                    laydate(buy);
                }
            });
        </script>
    </body>

</html><?php }} ?>