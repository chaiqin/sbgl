<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 14:34:52
         compiled from "Admin/View\Repair\matterSolveList.html" */ ?>
<?php /*%%SmartyHeaderCode:2765359c6008cb07fe8-00898831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e1b50b7863c36a91e3bef3cd47d8427b65bea1c' => 
    array (
      0 => 'Admin/View\\Repair\\matterSolveList.html',
      1 => 1496041898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2765359c6008cb07fe8-00898831',
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
  'unifunc' => 'content_59c6008cdd1c3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c6008cdd1c3')) {function content_59c6008cdd1c3($_smarty_tpl) {?><!DOCTYPE html>
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
                <a><cite>设备维修</cite></a>
                <a><cite>常见问题方法</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <form class="layui-form x-center" action="" style="width:45%">
                <div class="layui-form-pane" style="margin-top: 15px;">
                    <div class="layui-form-item">
                        <div class="layui-input-inline">
                            <select name="ms_type">
                                <option value="1">常见问题</option>
                                <option value="2">常见方法</option>
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <input type="text" name="ms_value"  placeholder="描述" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-input-inline" style="width:80px">
                            <button class="layui-btn"  lay-submit="" lay-filter="*"><i class="layui-icon">&#xe608;</i>添加</button>
                        </div>
                    </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><span class="x-right" style="line-height:40px">共有数据：<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
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
                            类型
                        </th>
                        <th>
                            描述
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="x-link">
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
                            <input type="checkbox" name="uid" fd="<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['ms_id'];?>
">
                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

                        </td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['ms_type']==1){?>常见问题<?php }else{ ?>常见方法<?php }?>
                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['ms_value'];?>

                        </td>
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="edit('编辑', '<?php echo @__CONTROLLER__;?>
/reviseMatterSolve/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['ms_id'];?>
', '4', '700', '500')"
                               class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="del(this, '<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['ms_id'];?>
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
                                layui.use(['element', 'laypage', 'layer', 'form'], function () {
                                    $ = layui.jquery;//jquery
                                    lement = layui.element();//面包导航
                                    laypage = layui.laypage;//分页
                                    layer = layui.layer;//弹出层
                                    form = layui.form();//弹出层

                                    //监听提交
                                    form.on('submit(*)', function (data) {
                                        $.post("<?php echo @__CONTROLLER__;?>
/addMatterSolve", data['field'], function (result) {
                                            if (result.msg) {
                                                if (result.status) {
                                                    layer.alert(result.msg, function () {
                                                        self.location.reload();
                                                    });
                                                } else {
                                                    layer.alert(result.msg, {icon: 6});
                                                }
                                            } else {
                                                layer.msg(result, {icon: 1, time: 1000});
                                            }
                                        });
                                        return false;
                                    });

                                    $("tr:gt(0)").click(function () {
                                        var has = $(this).hasClass("bgcolor");
                                        if (!has) {
                                            $(this).addClass("bgcolor").find(":input").prop("checked", true);
                                        } else {
                                            $(this).removeClass("bgcolor").find(":input").removeProp("checked", false);
                                        }
                                    });
                                })


                                //批量删除提交
                                function delAll() {
                                    layer.confirm('确认要删除吗？', function (index) {
                                        var s = '';
                                        $('input[name="uid"]:checked').each(function () {
                                            s += $(this).attr('fd') + ',';
                                        });
                                        s = s.replace(/\,$/, '');
                                        $.post("<?php echo @__CONTROLLER__;?>
/deleteMatterSolve", {id: s}, function (data) {
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



                                //-编辑
                                function edit(title, url, id, w, h) {
                                    x_admin_show(title, url, w, h);
                                }

                                /*删除*/
                                function del(obj, id) {
                                    layer.confirm("确定删除吗？", function (index) {
                                        //发异步删除数据
                                        $.post("<?php echo @__CONTROLLER__;?>
/deleteMatterSolve", {id: id}, function (data) {
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