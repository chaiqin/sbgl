<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 13:53:17
         compiled from "Admin/View\Index\remind.html" */ ?>
<?php /*%%SmartyHeaderCode:771459c5f6cdb4ce26-27521625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f8e564f8c5633541688dfc4fc02f9a0029d95a3' => 
    array (
      0 => 'Admin/View\\Index\\remind.html',
      1 => 1495353816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '771459c5f6cdb4ce26-27521625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buy' => 0,
    'repair' => 0,
    'borrow' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c5f6cdca65f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c5f6cdca65f')) {function content_59c5f6cdca65f($_smarty_tpl) {?><!DOCTYPE html>
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
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a><cite>首页</cite></a>
                <a><cite>日常管理提醒</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body" style="font-size: 20px;">
            <table class="layui-table" lay-skin="row" style="width:200px;margin:10px;float: left;">
                <colgroup>
                    <col width="150">
                </colgroup>
                <thead>
                    <tr>
                        <td>设备采购</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>    
                        未验收：
                      </td>
                    </tr>
                    <tr>
                      <td style=" text-align: right;">
                        <?php echo $_smarty_tpl->tpl_vars['buy']->value[0];?>

                      </td>
                    </tr>   
                    <tr>
                      <td>    
                        部分验收：
                      </td>
                    </tr>
                    <tr>
                      <td style=" text-align: right;">
                        <?php echo $_smarty_tpl->tpl_vars['buy']->value[1];?>

                      </td>
                    </tr>    
                </tbody>
            </table>
            <table class="layui-table" lay-skin="row" style="width:200px;margin:10px;float: left;">
                <colgroup>
                    <col width="150">
                </colgroup>
                <thead>
                    <tr>
                        <td>设备维修</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>    
                        待审核：
                      </td>
                    </tr>
                    <tr>
                      <td style=" text-align: right;">
                        <?php echo $_smarty_tpl->tpl_vars['repair']->value[0];?>

                      </td>
                    </tr>   
                    <tr>
                      <td>    
                        待维修：
                      </td>
                    </tr>
                    <tr>
                      <td style=" text-align: right;">
                        <?php echo $_smarty_tpl->tpl_vars['repair']->value[1];?>

                      </td>
                    </tr> 
                </tbody>
            </table>
            <table class="layui-table" lay-skin="row" style="width:200px;margin:10px;float: left;">
                <colgroup>
                    <col width="150">
                </colgroup>
                <thead>
                    <tr>
                        <td>设备出借</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>    
                        待审核：
                      </td>
                    </tr>
                    <tr>
                      <td style=" text-align: right;">
                        <?php echo $_smarty_tpl->tpl_vars['borrow']->value[0];?>

                      </td>
                    </tr>   
                    <tr>
                      <td>    
                        待验收：
                      </td>
                    </tr>
                    <tr>
                      <td style=" text-align: right;">
                        <?php echo $_smarty_tpl->tpl_vars['borrow']->value[1];?>

                      </td>
                    </tr> 
                </tbody>
            </table>
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
    
                //以上模块根据需要引入
            });


        </script>
    </body>
</html><?php }} ?>