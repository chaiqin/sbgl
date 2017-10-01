<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 14:35:36
         compiled from "Admin/View\Device\lookup.html" */ ?>
<?php /*%%SmartyHeaderCode:1340259c600b89e4899-21708732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '440aed614682374e34b210157ee16b2df1ae95a4' => 
    array (
      0 => 'Admin/View\\Device\\lookup.html',
      1 => 1495697653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1340259c600b89e4899-21708732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c600b8bb5a0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c600b8bb5a0')) {function content_59c600b8bb5a0($_smarty_tpl) {?><!DOCTYPE html>
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
        <link rel="stylesheet" href="<?php echo @__PUBLIC__;?>
/Admin/css/extra.css" media="all">
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a><cite>设备管理</cite></a>
                <a><cite>查询设备信息</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body" >
            <fieldset class="layui-elem-field layui-field-title">
                <legend><a name="default">查询</a></legend>   
                <div class="layui-form-pane x-center" style="margin-top: 15px;">
                    <div class="layui-form-item" style="width:500px;margin: 10px auto;text-align: center;">
                        <label class="layui-form-label">设备编号</label>
                        <div class="layui-input-inline">
                            <input class="layui-input" id="identifier">
                        </div>
                        <div class="layui-input-inline" style="width:80px">
                            <button class="layui-btn" id="lookup"><i class="layui-icon">&#xe615;</i></button>
                        </div>
                    </div>
                </div> 
            </fieldset>
            <fieldset class="layui-elem-field">
                <legend>查询结果</legend>
                <div class="layui-field-box" style="width: 800px;margin: 0 auto;">
                    <div class="layui-form-pane x-center layui-form-item" style="margin-top: 15px;">
                        <div class="lookup left">
                            <label class="layui-form-label">设备分类</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="class">
                            </div>
                        </div>
                        <div class="lookup right">
                            <label class="layui-form-label">设备型号</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="version">
                            </div>
                        </div>
                        <div class="lookup left">
                            <label class="layui-form-label">生产厂商</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="manufacturer">
                            </div>
                        </div>
                        <div class="lookup right">
                            <label class="layui-form-label">设备单价</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="price">
                            </div>
                        </div>
                        <div class="lookup left">
                            <label class="layui-form-label">所在机房</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="room">
                            </div>
                        </div>
                        <div class="lookup right">
                            <label class="layui-form-label">位置描述</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="place">
                            </div>
                        </div>
                        <div class="lookup left">
                            <label class="layui-form-label">添加时间</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="time">
                            </div>
                        </div>
                        <div class="lookup right">
                            <label class="layui-form-label">维修状态</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="status">
                            </div>
                        </div>
                        <div class="lookup left">
                            <label class="layui-form-label">流动状态</label>
                            <div class="layui-input-inline">
                                <input class="layui-input" id="br_status">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['element', 'layer'], function () {
                $ = layui.jquery;//jquery
                lement = layui.element();//面包导航
                layer = layui.layer;//弹出层

                $("#lookup").click(function () {
                    var identifier = $("#identifier").val();
                    $.post("<?php echo @__ACTION__;?>
", {identifier: identifier},
                            function (result) {
                                if (result.status) {
                                    $("#class").val(result.msg.class);
                                    $("#version").val(result.msg.dv_version);
                                    $("#manufacturer").val(result.msg.mf_name);
                                    $("#number").val(result.msg.dv_number);
                                    $("#price").val(result.msg.dv_price);
                                    $("#room").val(result.msg.room);
                                    $("#place").val(result.msg.dv_place);
                                    $("#time").val(result.msg.time);
                                    $("#status").val(result.msg.status);
                                    $("#br_status").val(result.msg.br_status);
                                } else {
                                    layer.alert('请正确填写设备编号！', {icon: 6});
                                }
                            });
                });
            });


        </script>
    </body>
</html><?php }} ?>