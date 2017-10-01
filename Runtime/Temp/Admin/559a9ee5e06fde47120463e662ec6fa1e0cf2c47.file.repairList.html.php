<?php /* Smarty version Smarty-3.1.6, created on 2017-09-23 14:34:47
         compiled from "Admin/View\Repair\repairList.html" */ ?>
<?php /*%%SmartyHeaderCode:2342059c600877e5ce3-96861212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '559a9ee5e06fde47120463e662ec6fa1e0cf2c47' => 
    array (
      0 => 'Admin/View\\Repair\\repairList.html',
      1 => 1496643560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2342059c600877e5ce3-96861212',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59c60087ae4d0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c60087ae4d0')) {function content_59c60087ae4d0($_smarty_tpl) {?><!DOCTYPE html>
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
                <a><cite>维修列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="add('添加报修', '<?php echo @__CONTROLLER__;?>
/addRepair', '700', '500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：<span id="total"></span> 条</span></xblock>
            <table id="table1" class="layui-table">
                <thead>
                    <tr>
                        <th style="width: 7%;">
                            选择
                        </th>
                        <th style="width: 10%;">
                            设备编号
                        </th>
                        <th style="width: 14%;">
                            设备位置
                        </th>
                        <th style="width: 17%;">
                            故障描述
                        </th>
                        <th style="width: 10%;">
                            报修人
                        </th>
                        <th style="width: 10%;">
                            报修时间
                        </th>
                        <th style="width: 10%;">
                            审核状态
                        </th>
                        <th style="width: 10%;">
                            维修状态
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

                    var start = {
                        min: laydate.now()
                        , max: '2099-06-16 23:59:59'
                        , istoday: false
                        , choose: function (datas) {
                            end.min = datas; //开始日选好后，重置结束日的最小日期
                            end.start = datas //将结束日的初始值设定为开始日
                        }
                    };

                    var end = {
                        min: laydate.now()
                        , max: '2099-06-16 23:59:59'
                        , istoday: false
                        , choose: function (datas) {
                            start.max = datas; //结束日选好后，重置开始日的最大日期
                        }
                    };

                    document.getElementById('LAY_demorange_s').onclick = function () {
                        start.elem = this;
                        laydate(start);
                    }
                    document.getElementById('LAY_demorange_e').onclick = function () {
                        end.elem = this
                        laydate(end);
                    }

                });



                //分页执行
                function GetList(curr) {
                    $.getJSON("<?php echo @__CONTROLLER__;?>
/repairList",
                            {
                                p: curr,
                            }, function (datajson) {
                        var list = datajson.list;
                        var str = '';
                        for (var i = 0; i < list.length; i++) {
                            str += "<tr> <td> <input type='checkbox' name='uid' fd='" + list[i]['rp_id'] + "'> </td>" +
                                    "<td>" + list[i]['rp_device_identifier'] + "</td>" +
                                    "<td>" + list[i]['rp_location'] + "</td>" +
                                    "<td>" + list[i]['rp_matter'] + "</td>" +
                                    "<td>" + list[i]['rp_person'] + "</td>" +
                                    "<td>" + list[i]['rp_time'] + "</td>" +
                                    "<td id='status'>";
                            if (list[i]['rp_status'] == 1) {
                                str += "<span class='layui-btn layui-btn-mini layui-btn-radius layui-btn-warm'>" +
                                        "  待审核" +
                                        "</span>";
                            } else if (list[i]['rp_status'] == 2) {
                                str += "<span class='layui-btn layui-btn-mini layui-btn-radius layui-btn-normal'>" +
                                        "  通过审核" +
                                        "</span>";
                            } else if (list[i]['rp_status'] == 3) {
                                str += "<span class='layui-btn layui-btn-mini layui-btn-radius layui-btn-danger'>" +
                                        "  未通过审核" +
                                        "</span>";
                            }
                            str += "</td><td>";

                            if (list[i]['rp_solve_status'] == 1) {
                                str += "<span class='layui-btn layui-btn-mini layui-btn-radius layui-btn-warm'>" +
                                        "  待维修" +
                                        "</span>";
                            } else if (list[i]['rp_solve_status'] == 2) {
                                str += "<span class='layui-btn layui-btn-mini layui-btn-radius layui-btn-normal'>" +
                                        "  已维修" +
                                        "</span>";
                            } else if (list[i]['rp_solve_status'] == 3) {
                                str += "<span class='layui-btn layui-btn-mini layui-btn-radius'>" +
                                        "  维修中" +
                                        "</span>";
                            } else if (list[i]['rp_solve_status'] == 4) {
                                str += "<span class='layui-btn layui-btn-mini layui-btn-radius layui-btn-danger'>" +
                                        "  无法维修" +
                                        "</span>";
                            }
                            str += "</td>" +
                                    "<td class='td-manage'>" +
                                    "	<a style='text-decoration:none' onclick=" + '"' + "pass(this,'" + list[i]['rp_id'] + "','2')" + '"' + " href='javascript:;' title='通过'>" +
                                    "		<i class='layui-icon'>&#xe618;</i>" +
                                    "	</a>" +
                                    "	<a style='text-decoration:none' onclick=" + '"' + "not_pass(this,'" + list[i]['rp_id'] + "','3')" + '"' + " href='javascript:;' title='不通过'>" +
                                    "		<i class='layui-icon'>&#x1006;</i>" +
                                    "	</a>" +
                                    "	<a title='维修' href='javascript:;' onclick=" + '"' + "confirm('维修','<?php echo @__CONTROLLER__;?>
/confirm/id/" + list[i]['rp_id'] + "','4','700','500')" + '"' +
                                    "	class='ml-5' style='text-decoration:none'>" +
                                    "		<i class='layui-icon'>&#xe631;</i>" +
                                    "	</a>" +
                                    "	<a title='编辑' href='javascript:;' onclick=" + '"' + "edit('编辑','<?php echo @__CONTROLLER__;?>
/reviseRepair/id/" + list[i]['rp_id'] + "','4','700','500')" + '"' +
                                    "	class='ml-5' style='text-decoration:none'>" +
                                    "		<i class='layui-icon'>&#xe642;</i>" +
                                    "	</a>" +
                                    "	<a title='删除' href='javascript:;' onclick=" + '"' + "del(this,'" + list[i]['rp_id'] + "')" + '"' +
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
/deleteRepair", {id: s}, function (data) {
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

                /*维修*/
                function confirm(title, url, id, w, h) {
                    x_admin_show(title, url, w, h);
                }

                /*通过*/
                function pass(obj, id) {
                    layer.confirm('确定通过吗？', function (index) {
                        //发异步把审核状态进行更改
                        $.post("<?php echo @__CONTROLLER__;?>
/changeStatus", {id: id, status: 2}, function (data) {
                            if (data.msg) {
                                layer.msg(data.msg, {icon: 1, time: 1000});
                                if (data.status) {
                                    $(obj).parents("tr").find("#status").html('<span class="layui-btn layui-btn-mini layui-btn-radius layui-btn-normal">通过审核</span>');
                                }
                            } else {
                                layer.msg(data, {icon: 1, time: 1000});
                            }
                        });
                    });
                }
                /*不通过*/
                function not_pass(obj, id) {
                    layer.confirm('确定不通过吗？', function (index) {
                        //发异步把审核状态进行更改
                        $.post("<?php echo @__CONTROLLER__;?>
/changeStatus", {id: id, status: 3}, function (data) {
                            if (data.msg) {
                                layer.msg(data.msg, {icon: 1, time: 1000});
                                if (data.status) {
                                    $(obj).parents("tr").find("#status").html('<span class="layui-btn layui-btn-mini layui-btn-radius layui-btn-danger">未通过审核</span>');
                                }
                            } else {
                                layer.msg(data, {icon: 1, time: 1000});
                            }
                        });
                    });
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
/deleteRepair", {id: id}, function (data) {
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