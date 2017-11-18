<?php /* Smarty version Smarty-3.1.6, created on 2017-11-18 16:00:26
         compiled from "Admin/View\Device\deviceList.html" */ ?>
<?php /*%%SmartyHeaderCode:2475559c5f871e125c0-42043155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bc4202331a6ea1240897a2d6533dcaa46112621' => 
    array (
      0 => 'Admin/View\\Device\\deviceList.html',
      1 => 1510988508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2475559c5f871e125c0-42043155',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c5f87220989',
  'variables' => 
  array (
    'dclist' => 0,
    'mflist' => 0,
    'mrlist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c5f87220989')) {function content_59c5f87220989($_smarty_tpl) {?><!DOCTYPE html>
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
                <a><cite>设备列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <div class="layui-form-pane" style="margin-top: 15px;width: 90%;">
                <div class="layui-form-item">
                    <label class="layui-form-label" style="line-height:60px;">条件查询</label>
                    <div class="layui-input-inline bot">
                        <input class="layui-input" placeholder="设备编号" id="iden">
                    </div>
                    <form class="layui-form x-center" action="">
                        <div class="layui-input-inline bot">
                            <select id="dc">
                                <option value="0">--所有设备类型--</option>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['c'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['c']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['name'] = 'c';
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dclist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total']);
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['dclist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['c']['index']]['dc_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dclist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['c']['index']]['dc_name'];?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                        </div>
                        <div class="layui-input-inline bot">
                            <select id="mf">
                                <option value="0">--所有生产厂商--</option>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['c'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['c']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['name'] = 'c';
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mflist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total']);
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['mflist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['c']['index']]['mf_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['mflist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['c']['index']]['mf_name'];?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                        </div>
                        <div class="layui-input-inline bot">
                            <select id="mr">
                                <option value="0">--所有机房--</option>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['c'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['c']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['name'] = 'c';
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mrlist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['c']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['c']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['c']['total']);
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['mrlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['c']['index']]['mr_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['mrlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['c']['index']]['mr_room'];?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                        </div>
                        <div class="layui-input-inline  bot">
                            <input class="layui-input" placeholder="开始日" id="start">
                        </div>
                        <div class="layui-input-inline  bot">
                            <input class="layui-input" placeholder="截止日" id="end">
                        </div>
                        <div class="layui-input-inline  bot">
                            <input class="layui-input" placeholder="--每页显示条数--" id="num">
                        </div>
                    </form>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" id="lookup"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                </div>
            </div> 
            <xblock>
                <button class="layui-btn layui-btn-danger" onclick="delAll()">
                    <i class="layui-icon">&#xe640;</i>批量删除
                </button>
                <button class="layui-btn" onclick="add('设备录入', '<?php echo @__CONTROLLER__;?>
/addDevice', '700', '500')">
                    <i class="layui-icon">&#xe608;</i>添加
                </button>
                <a href="<?php echo @__CONTROLLER__;?>
/export" class="layui-btn">导出</a>
                <span class="x-right" style="line-height:40px">共有数据：<span id="total"></span> 条</span>
            </xblock>
            <table id="table1" class="layui-table">
                <thead>
                    <tr>
                        <th style="width: 7%;">
                            选择
                        </th>
                        <th style="width: 7%;">
                            编号
                        </th>
                        <th style="width: 15%;">
                            设备类型
                        </th>
                        <th style="width: 15%;">
                            设备编号
                        </th>
                        <th style="width: 15%;">
                            设备型号
                        </th>
                        <th style="width: 15%;">
                            价格
                        </th>
                        <th style="width: 15%;">
                            进货时间
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="list">			
                </tbody>
            </table>
            <div id="page" class="divide"></div>
        </div>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="<?php echo @__PUBLIC__;?>
/Admin/js/x-layui.js" charset="utf-8"></script>
        <script>
                    layui.use(['laydate', 'element', 'laypage', 'layer', 'form'], function () {
                        $ = layui.jquery;//jquery
                        laydate = layui.laydate;//日期插件
                        lement = layui.element();//面包导航
                        layer = layui.layer;//弹出层	
                        laypage = layui.laypage;//分页
                        form = layui.form();//弹出层

                        $(document).ready(function () {
                            GetList(1);
                            $("#lookup").click(function () {
                                var start = $("#start").val();
                                var end = $("#end").val();
                                var dc = $("#dc").val();
                                var mf = $("#mf").val();
                                var mr = $("#mr").val();
                                var num = $("#num").val();
                                var iden = $("#iden").val();
                                GetList(1, start, end, dc, mf, mr, num, iden);
                            });
                        });


                        $("tr:gt(0)").click(function () {
                            var has = $(this).hasClass("bgcolor");
                            if (!has) {
                                $(this).addClass("bgcolor").find(":input").prop("checked", true);
                            } else {
                                $(this).removeClass("bgcolor").find(":input").removeProp("checked", false);
                            }
                        });


                        var start = {
                            min: '1970-01-01 00:00:01',
                            max: '2038-01-09 03:14:07',
                            istoday: false,
                            choose: function (datas) {
                                end.min = datas; //开始日选好后，重置结束日的最小日期
                                end.start = datas; //将结束日的初始值设定为开始日
                            }
                        };

                        var end = {
                            min: '1970-01-01 00:00:01'
                            , max: '2099-06-16 23:59:59'
                            , istoday: false
                            , choose: function (datas) {
                                start.max = datas; //结束日选好后，重置开始日的最大日期
                            }
                        };

                        document.getElementById('start').onclick = function () {
                            start.elem = this;
                            laydate(start);
                        }
                        document.getElementById('end').onclick = function () {
                            end.elem = this
                            laydate(end);
                        }


                    });

                    //分页执行
                    function GetList(curr, start = '', end = '', dc = '', mf = '', mr = '', num = '', iden = '') {

                        $.getJSON("<?php echo @__CONTROLLER__;?>
/deviceList",
                                {
                                    p: curr,
                                    start: start,
                                    end: end,
                                    dc: dc,
                                    mf: mf,
                                    mr: mr,
                                    num: num,
                                    iden: iden
                                }, function (datajson) {
                            var list = datajson.list;
                            var str = '';
                            for (var i = 0; i < list.length; i++) {
                                str += "<tr> <td> <input type='checkbox' name='uid' fd='" + list[i]['dv_identifier'] + "'> </td>" +
                                        "<td>" + list[i]['i'] + "</td>" +
                                        "<td>" + list[i]['dc_name'] + "</td>" +
                                        "<td>" + list[i]['dv_identifier'] + "</td>" +
                                        "<td>" + list[i]['dv_version'] + "</td>" +
                                        "<td>" + list[i]['dv_price'] + "</td>" +
                                        "<td>" + list[i]['dv_time'] + "</td>";
                                str += "<td class='td-manage'>" +
                                        "	<a title='编辑' href='javascript:;' onclick=" + '"' + "edit('编辑','<?php echo @__CONTROLLER__;?>
/reviseDevice/iden/" + list[i]['dv_identifier'] + "','4','700','500')" + '"' +
                                        "	class='ml-5' style='text-decoration:none'>" +
                                        "		<i class='layui-icon'>&#xe642;</i>" +
                                        "	</a>" +
                                        "	<a title='删除' href='javascript:;' onclick=" + '"' + "del(this,'" + list[i]['dv_identifier'] + "')" + '"' +
                                        "	style='text-decoration:none'>" +
                                        "		<i class='layui-icon'>&#xe640;</i>" +
                                        "	</a>" +
                                        "</td></tr>";
                            }

                            $('#list').html(str);
                            $('#total').html(datajson.total);

                            $("tr:gt(0)").click(function () {
                                var has = $(this).hasClass("bgcolor");
                                if (!has) {
                                    $(this).addClass("bgcolor").find(":input").prop("checked", true);
                                } else {
                                    $(this).removeClass("bgcolor").find(":input").removeProp("checked", false);
                                }
                            });

                            //调用分页
                            laypage({
                                cont: 'page',
                                pages: datajson.pages, //总页数
                                groups: 5, //连续显示分页数
                                skip: true, //是否开启跳页
                                curr: curr || 1, //当前页,
                                jump: function (obj, first) {//触发分页后的回调
                                    if (!first) {//点击跳页触发函数自身，并传递当前页：obj.curr
                                        GetList(obj.curr, start, end, dc, mf, mr, num, iden);
                                    }
                                }
                            });

                        });
                    }


                    //批量删除提交
                    function delAll() {
                        layer.confirm('确认要删除吗？', function (index) {
                            var s = '';
                            $('input[name="uid"]:checked').each(function () {
                                s += $(this).attr('fd') + ',';
                            });
                            s = s.replace(/\,$/, '');
                            $.post("<?php echo @__CONTROLLER__;?>
/deleteDevice", {iden: s}, function (data) {
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

                    // 编辑
                    function edit(title, url, id, w, h) {
                        x_admin_show(title, url, w, h);
                    }

                    /*删除*/
                    function del(obj, iden) {
                        layer.confirm("确定删除吗？", function (index) {
                            //发异步删除数据
                            $.post("<?php echo @__CONTROLLER__;?>
/deleteDevice", {iden: iden}, function (data) {
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