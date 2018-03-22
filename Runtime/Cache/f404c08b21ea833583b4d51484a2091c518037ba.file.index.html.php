<?php /* Smarty version Smarty-3.1.6, created on 2018-03-16 14:16:09
         compiled from "E:/sbgl/Home/View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:66035aab61293245c9-79971237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f404c08b21ea833583b4d51484a2091c518037ba' => 
    array (
      0 => 'E:/sbgl/Home/View\\Index\\index.html',
      1 => 1521180953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66035aab61293245c9-79971237',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aab61293c097',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aab61293c097')) {function content_5aab61293c097($_smarty_tpl) {?><!DOCTYPE html>
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
        <link rel="stylesheet" href="<<?php echo @__PUBLIC__;?>
>/Admin/css/x-admin.css" media="all">
    </head>
    <body>
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
        </div>
        <script src="<<?php echo @__PUBLIC__;?>
>/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="<<?php echo @__PUBLIC__;?>
>/Admin/js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['element', 'layer'], function () {
                $ = layui.jquery;//jquery
                lement = layui.element();//面包导航
                layer = layui.layer;//弹出层

            });


        </script>
    </body>
</html><?php }} ?>