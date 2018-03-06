<?php /* Smarty version Smarty-3.1.6, created on 2018-02-23 11:17:05
         compiled from "Admin/View\System\addVersion.html" */ ?>
<?php /*%%SmartyHeaderCode:96745a8f87b1d2f2e2-70301215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a73d6a60d1c05f762a424c3561f66befdb50355' => 
    array (
      0 => 'Admin/View\\System\\addVersion.html',
      1 => 1496554709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96745a8f87b1d2f2e2-70301215',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a8f87b209aa3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8f87b209aa3')) {function content_5a8f87b209aa3($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\sbgl\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
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
            <form class="layui-form" action="<?php echo @__SELF__;?>
" enctype="multipart/form-data" method="post" >
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>版本类型
                    </label>
                    <div class="layui-input-inline">
                        <select name="client_type">
                            <option value="1">IOS</option>
                            <option value="2">ANDROID</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>版本版号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="client_version" required=""
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>资源上传
                    </label>
                    <div>
                        <input type="file" name="source" >
                    </div>
                </div> 
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                        <span class="x-red">*</span>更新说明
                    </label>
                    <div class="layui-input-inline">
                        <textarea name="update_note"  class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>更新要求
                    </label>
                    <div class="layui-input-inline">
                        <select name="is_required">
                            <option value="0">选择更新</option>
                            <option value="1">强制更新</option>
                        </select>
                    </div>
                </div> 
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>更新时间
                    </label>
                    <div class="layui-input-inline">
                        <input type="text"  name="time" required=""
                               autocomplete="off" class="layui-input" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
">
                    </div>
                </div> 
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        增加
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