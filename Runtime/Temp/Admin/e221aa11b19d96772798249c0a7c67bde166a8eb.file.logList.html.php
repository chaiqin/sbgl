<?php /* Smarty version Smarty-3.1.6, created on 2017-09-24 12:07:24
         compiled from "Admin/View\MachineRoom\logList.html" */ ?>
<?php /*%%SmartyHeaderCode:2177559c72f7c407e34-94771994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e221aa11b19d96772798249c0a7c67bde166a8eb' => 
    array (
      0 => 'Admin/View\\MachineRoom\\logList.html',
      1 => 1495541148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2177559c72f7c407e34-94771994',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c72f7c6ad6d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c72f7c6ad6d')) {function content_59c72f7c6ad6d($_smarty_tpl) {?><!DOCTYPE html>
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
                <a><cite>机房管理</cite></a>
                <a><cite>维护日志</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="add('添加维护', '<?php echo @__CONTROLLER__;?>
/addLog', '700', '500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：<span id="total"></span> 条</span></xblock>
            <table id="table1" class="layui-table">
                <thead>
                    <tr>
                        <th>
                            选择
                        </th>
                        <th>
                            编号
                        </th>
                        <th>
                            时间
                        </th>
                        <th>
                            地点
                        </th>
                        <th>
                            维护内容
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
                layui.use(['laydate', 'element', 'laypage', 'layer'], function () {
                    $ = layui.jquery;//jquery
                    laydate = layui.laydate;//日期插件
                    lement = layui.element();//面包导航
                    laypage = layui.laypage;//分页
                    layer = layui.layer;//弹出层		  

                    $(document).ready(function () {
                        GetList(1);
                    });
                });


                //分页执行
                function GetList(curr) {
                    $.getJSON("<?php echo @__SELF__;?>
",
                            {
                                p: curr,
                            }, function (datajson) {
                        var list = datajson.list;
                        var str = '';
                        for (var i = 0; i < list.length; i++) {
                            str += "<tr> <td> <input type='checkbox' name='uid' fd='" + list[i]['mrl_id'] + "'> </td>" +
                                    "<td>" + list[i]['i'] + "</td>" +
                                    "<td>" + list[i]['mrl_time'] + "</td>" +
                                    "<td>" + list[i]['mr_room'] + "</td>" +
                                    "<td>" + list[i]['mrl_contents'] + "</td>";
                            str += "<td class='td-manage'>" +
                                    "	<a title='编辑' href='javascript:;' onclick=" + '"' + "edit('编辑','<?php echo @__CONTROLLER__;?>
/reviseLog/id/" + list[i]['mrl_id'] + "','4','700','500')" + '"' +
                                    "	class='ml-5' style='text-decoration:none'>" +
                                    "		<i class='layui-icon'>&#xe642;</i>" +
                                    "	</a>" +
                                    "	<a title='删除' href='javascript:;' onclick=" + '"' + "del(this,'" + list[i]['mrl_id'] + "')" + '"' +
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
                                    GetList(obj.curr);
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
/deleteLog", {id: s}, function (data) {
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
                function del(obj, id) {
                    layer.confirm("确定删除吗？", function (index) {
                        //发异步删除数据
                        $.post("<?php echo @__CONTROLLER__;?>
/deleteLog", {id: id}, function (data) {
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