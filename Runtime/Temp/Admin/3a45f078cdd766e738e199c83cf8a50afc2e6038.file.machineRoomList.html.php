<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 15:54:08
         compiled from "Admin/View\MachineRoom\machineRoomList.html" */ ?>
<?php /*%%SmartyHeaderCode:1323959c61320470323-29965106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a45f078cdd766e738e199c83cf8a50afc2e6038' => 
    array (
      0 => 'Admin/View\\MachineRoom\\machineRoomList.html',
      1 => 1495634941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1323959c61320470323-29965106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'list' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c6132065574',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c6132065574')) {function content_59c6132065574($_smarty_tpl) {?><!DOCTYPE html>
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
                <a><cite>机房列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="add('添加机房', '<?php echo @__CONTROLLER__;?>
/addMachineRoom', '700', '500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            选择
                        </th>
                        <th>
                            编号
                        </th>
                        <th>
                            机房号
                        </th>
                        <th>
                            座位数量
                        </th> 
                        <th>
                            序号(升序)
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <input type="checkbox"  name="uid" fd=" <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mr_id'];?>
">
                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mr_room'];?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mr_number'];?>

                        </td> 
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mr_sort'];?>

                        </td> 
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="edit('编辑', '<?php echo @__CONTROLLER__;?>
/reviseMachineRoom/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mr_id'];?>
', '4', '700', '500')"
                               class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="del(this, '<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['mr_id'];?>
')" 
                               style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    <?php endfor; endif; ?>
                </tbody>
            </table>
            <div id="page"></div>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-layui.js" charset="utf-8"></script>
        <script>
                                layui.use(['laydate', 'element', 'laypage', 'layer'], function () {
                                    $ = layui.jquery;//jquery
                                    laydate = layui.laydate;//日期插件
                                    lement = layui.element();//面包导航
                                    laypage = layui.laypage;//分页
                                    layer = layui.layer;//弹出层

                                    $("tr:gt(0)").click(function () {
                                        var has = $(this).hasClass("bgcolor");
                                        if (!has) {
                                            $(this).addClass("bgcolor").find(":input").prop("checked", true);
                                        } else {
                                            $(this).removeClass("bgcolor").find(":input").removeProp("checked", false);
                                        }
                                    });

                                    //以上模块根据需要引入
                                });

                                //批量删除提交
                                function delAll() {
                                    layer.confirm('确认要删除吗？', function (index) {
                                        var s = '';
                                        $('input[name="uid"]:checked').each(function () {
                                            s += $(this).attr('fd') + ',';
                                        });
                                        s = s.replace(/\,$/, '');
                                        $.post("<?php echo @__CONTROLLER__;?>
/deleteMachineRoom", {id: s}, function (data) {
                                            if (data.msg) {
                                                layer.msg(data.msg, {icon: 1, time: 1000});
                                                if (data.status) {
                                                    $('input[name="uid"]:checked').each(function () {
                                                        $(this).parents("tr").remove();
                                                    });
                                                }
                                            } else {
                                                layer.msg(data, {icon: 1, time: 1000});
                                            }
                                        });

                                    });
                                }
                                /*添加*/
                                function add(title, url, w, h) {
                                    x_admin_show(title, url, w, h);
                                }


                                //编辑
                                function edit(title, url, id, w, h) {
                                    x_admin_show(title, url, w, h);
                                }


                                /*删除*/
                                function del(obj, id) {
                                    layer.confirm("确定删除吗？", function (index) {
                                        //发异步删除数据
                                        $.post("<?php echo @__CONTROLLER__;?>
/deleteMachineRoom", {id: id}, function (data) {
                                            if (data.msg) {
                                                layer.msg(data.msg, {icon: 1, time: 1000});
                                                if (data.status) {
                                                    $('input[name="uid"]:checked').each(function () {
                                                        $(this).parents("tr").remove();
                                                    });
                                                }
                                            } else {
                                                layer.msg(data, {icon: 1, time: 1000});
                                            }
                                        });
                                    });
                                }
        </script>
    </body>
</html><?php }} ?>