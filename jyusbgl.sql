-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-28 08:59:41
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jyusbgl`
--

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_borrow`
--

CREATE TABLE `sbgl_borrow` (
  `br_id` int(10) UNSIGNED NOT NULL,
  `br_device_identifier` int(10) UNSIGNED NOT NULL,
  `br_user` varchar(32) NOT NULL,
  `br_reason` varchar(255) NOT NULL,
  `br_time` int(10) UNSIGNED NOT NULL,
  `br_return_time` int(10) UNSIGNED NOT NULL,
  `br_actual_time` int(10) UNSIGNED DEFAULT NULL,
  `br_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1待审核，2通过审核，3未通过审核',
  `br_consent` int(10) UNSIGNED DEFAULT NULL,
  `br_remark` varchar(250) DEFAULT NULL,
  `br_reviewer` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_borrow`
--

INSERT INTO `sbgl_borrow` (`br_id`, `br_device_identifier`, `br_user`, `br_reason`, `br_time`, `br_return_time`, `br_actual_time`, `br_status`, `br_consent`, `br_remark`, `br_reviewer`) VALUES
(39, 2017092301, '亲亲', '测试', 1506096000, 1506614400, NULL, 2, 151110192, NULL, NULL),
(40, 2017092401, '亲斯蒂芬', '第三方', 1506182400, 1506182400, NULL, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_buy`
--

CREATE TABLE `sbgl_buy` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` double NOT NULL,
  `number` smallint(6) UNSIGNED NOT NULL,
  `dc_id` smallint(5) UNSIGNED NOT NULL,
  `manufacturer_id` smallint(9) UNSIGNED NOT NULL,
  `person` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未验收，1验收，2部分验收',
  `time` int(10) UNSIGNED NOT NULL COMMENT '购买时间',
  `reviewer` int(10) UNSIGNED DEFAULT NULL,
  `received_time` int(10) UNSIGNED DEFAULT NULL COMMENT '验收时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_buy`
--

INSERT INTO `sbgl_buy` (`id`, `name`, `price`, `number`, `dc_id`, `manufacturer_id`, `person`, `status`, `time`, `reviewer`, `received_time`) VALUES
(25, '小新出色版i2000', 4300, 1, 31, 43, '亲', 1, 1506096000, 151110192, 1506147425);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_dc_mf`
--

CREATE TABLE `sbgl_dc_mf` (
  `dm_id` int(11) UNSIGNED NOT NULL,
  `dm_dcid` int(11) UNSIGNED NOT NULL,
  `dm_mfid` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_dc_mf`
--

INSERT INTO `sbgl_dc_mf` (`dm_id`, `dm_dcid`, `dm_mfid`) VALUES
(3, 31, 43);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_device`
--

CREATE TABLE `sbgl_device` (
  `dv_identifier` int(10) UNSIGNED NOT NULL,
  `dv_version` varchar(32) NOT NULL COMMENT '型号',
  `dv_dcid` smallint(5) UNSIGNED NOT NULL,
  `dv_manufacturer_id` smallint(5) UNSIGNED NOT NULL,
  `dv_price` decimal(10,0) UNSIGNED DEFAULT NULL,
  `dv_room_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `dv_place` varchar(64) DEFAULT NULL,
  `dv_time` int(10) UNSIGNED NOT NULL,
  `dv_buy_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_device`
--

INSERT INTO `sbgl_device` (`dv_identifier`, `dv_version`, `dv_dcid`, `dv_manufacturer_id`, `dv_price`, `dv_room_id`, `dv_place`, `dv_time`, `dv_buy_id`) VALUES
(2017092301, '小新出色版i2000', 31, 43, '4300', 13, '', 1506147437, 25),
(2017092401, '红色帝国', 31, 43, '5000', 13, '', 1506182400, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_device_class`
--

CREATE TABLE `sbgl_device_class` (
  `dc_id` int(10) UNSIGNED NOT NULL,
  `dc_name` varchar(32) NOT NULL COMMENT '设备种类名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_device_class`
--

INSERT INTO `sbgl_device_class` (`dc_id`, `dc_name`) VALUES
(31, '笔记本');

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_machine_room`
--

CREATE TABLE `sbgl_machine_room` (
  `mr_id` smallint(5) UNSIGNED NOT NULL,
  `mr_room` smallint(3) UNSIGNED NOT NULL COMMENT '房号',
  `mr_number` tinyint(3) UNSIGNED DEFAULT NULL COMMENT '座位数',
  `mr_sort` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_machine_room`
--

INSERT INTO `sbgl_machine_room` (`mr_id`, `mr_room`, `mr_number`, `mr_sort`) VALUES
(13, 203, 60, 3);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_machine_room_log`
--

CREATE TABLE `sbgl_machine_room_log` (
  `mrl_id` int(10) UNSIGNED NOT NULL,
  `mrl_time` int(10) UNSIGNED NOT NULL,
  `mrl_place` int(10) UNSIGNED NOT NULL,
  `mrl_contents` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_machine_room_log`
--

INSERT INTO `sbgl_machine_room_log` (`mrl_id`, `mrl_time`, `mrl_place`, `mrl_contents`) VALUES
(6, 1506226046, 13, '检修');

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_manufacturer`
--

CREATE TABLE `sbgl_manufacturer` (
  `mf_id` int(10) UNSIGNED NOT NULL,
  `mf_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_manufacturer`
--

INSERT INTO `sbgl_manufacturer` (`mf_id`, `mf_name`) VALUES
(43, 'LENOVO');

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_matter_solve`
--

CREATE TABLE `sbgl_matter_solve` (
  `ms_id` smallint(5) UNSIGNED NOT NULL,
  `ms_value` varchar(32) NOT NULL,
  `ms_type` tinyint(1) NOT NULL COMMENT '1为问题，2为解决方法'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_matter_solve`
--

INSERT INTO `sbgl_matter_solve` (`ms_id`, `ms_value`, `ms_type`) VALUES
(20, '擦拭内存金手指', 2),
(19, '内存故障', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_node`
--

CREATE TABLE `sbgl_node` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(32) DEFAULT NULL,
  `pid` smallint(6) UNSIGNED NOT NULL COMMENT '权限类id',
  `sort` tinyint(3) NOT NULL DEFAULT '1',
  `public` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0是公有权限，1不是',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0不显示，1显示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_node`
--

INSERT INTO `sbgl_node` (`id`, `name`, `alias`, `pid`, `sort`, `public`, `display`) VALUES
(13, 'User/userList', '用户列表', 3, 1, 1, 1),
(14, 'User/addUser', '添加用户', 3, 10, 1, 0),
(15, 'User/deleteUser', '删除用户', 3, 12, 1, 0),
(16, 'User/reviseUser', '编辑用户', 3, 11, 1, 0),
(17, 'Role/roleList', '角色列表', 3, 2, 1, 1),
(18, 'Role/addRole', '添加角色', 3, 13, 1, 0),
(19, 'Role/reviseRole', '编辑角色', 3, 14, 1, 0),
(20, 'Role/deleteRole', '删除角色', 3, 15, 1, 0),
(21, 'Node/nodeClassList', '权限分类列表', 3, 3, 1, 1),
(22, 'Node/addNodeClass', '添加权限分类', 3, 16, 1, 0),
(23, 'Node/deleteNodeClass', '删除权限分类', 3, 17, 1, 0),
(24, 'Node/reviseNodeClass', '编辑权限分类', 3, 18, 1, 0),
(25, 'Node/nodeList', '权限列表', 3, 4, 1, 1),
(26, 'Node/addNode', '添加权限', 3, 19, 1, 0),
(27, 'Node/deleteNode', '删除权限', 3, 19, 1, 0),
(28, 'Node/reviseNode', '编辑权限', 3, 20, 1, 0),
(29, 'Login/login', '后台登录界面', 7, 5, 0, 0),
(30, 'Index/index', '后台首页', 7, 4, 1, 0),
(31, 'Login/logout', '注销', 7, 6, 0, 0),
(32, 'Buy/buyList', '采购列表', 4, 5, 1, 1),
(33, 'Buy/addBuy', '添加采购单', 4, 6, 1, 0),
(34, 'Buy/manufacturerList', '厂商列表', 4, 4, 1, 1),
(35, 'Buy/addManufacturer', '添加厂商', 4, 9, 1, 0),
(36, 'Buy/reviseManufacturer', '编辑厂商名', 4, 11, 1, 0),
(37, 'Buy/deleteManufacturer', '删除厂商', 4, 9, 1, 0),
(39, 'System/systemList', '基本设置', 8, 5, 1, 1),
(40, 'System/reviseSystem', '编辑设置', 8, 6, 1, 0),
(41, 'Buy/reviseBuy', '编辑采购单', 4, 7, 1, 0),
(42, 'Buy/deleteBuy', '删除采购单', 4, 8, 1, 0),
(46, 'System/versionList', '版本列表', 8, 4, 1, 1),
(47, 'System/addVersion', '添加版本', 8, 10, 1, 0),
(48, 'System/reviseVersion', '编辑版本', 8, 15, 1, 0),
(49, 'System/deleteVersion', '删除版本', 8, 17, 1, 0),
(50, 'Buy/deviceClassList', '设备分类列表', 4, 3, 1, 1),
(51, 'Buy/addDeviceClass', '添加设备分类', 4, 15, 1, 0),
(52, 'Buy/reviseDeviceClass', '编辑设备分类', 4, 16, 1, 0),
(53, 'Buy/deleteDeviceClass', '删除设备分类', 4, 17, 1, 0),
(54, 'MachineRoom/machineRoomList', '机房列表', 14, 5, 1, 1),
(55, 'MachineRoom/addMachineRoom', '添加机房', 14, 20, 1, 0),
(56, 'MachineRoom/reviseMachineRoom', '编辑机房信息', 14, 21, 1, 0),
(57, 'MachineRoom/deleteMachineRoom', '删除机房', 14, 22, 1, 0),
(58, 'Device/deviceList', '设备列表', 2, 15, 1, 1),
(59, 'Device/addDevice', '设备录入', 2, 23, 1, 0),
(60, 'Device/reviseDevice', '编辑设备', 2, 23, 1, 0),
(61, 'Device/deleteDevice', '删除设备', 2, 25, 1, 0),
(62, 'Repair/matterSolveList', '常见问题方法', 12, 5, 1, 1),
(63, 'Repair/addMatterSolve', '添加问题方法', 12, 7, 1, 0),
(64, 'Repair/reviseMatterSolve', '编辑问题方法', 12, 9, 1, 0),
(65, 'Repair/deleteMatterSolve', '删除问题方法', 12, 10, 1, 0),
(66, 'Repair/repairList', '维修列表', 12, 7, 1, 1),
(67, 'Repair/addRepair', '添加维修', 12, 11, 1, 0),
(68, 'Repair/reviseRepair', '编辑维修信息', 12, 12, 1, 0),
(69, 'Repair/deleteRepair', '删除维修', 12, 13, 1, 0),
(70, 'Repair/changeStatus', '审核报修', 12, 14, 1, 0),
(71, 'Borrow/borrowList', '流动列表', 5, 5, 1, 1),
(72, 'Borrow/addBorrow', '添加出借', 5, 10, 1, 0),
(73, 'Borrow/reviseBorrow', '编辑出借', 5, 11, 1, 0),
(74, 'Borrow/deleteBorrow', '删除出借', 5, 12, 1, 0),
(75, 'Borrow/changeStatus', '出借审核', 5, 13, 1, 0),
(76, 'Borrow/checkBorrow', '验收审核', 5, 14, 1, 0),
(77, 'Buy/changeStatus', '采购验收', 4, 12, 1, 0),
(78, 'User/changeStatus', '修改用户状态', 3, 21, 1, 0),
(79, 'Index/desktop', '我的桌面', 7, 7, 1, 1),
(80, 'Index/remind', '日常管理提醒', 7, 10, 1, 1),
(81, 'Device/lookup', '查询设备信息', 2, 17, 1, 1),
(82, 'Login/verifyImg', '后台验证码', 7, 5, 0, 0),
(83, 'Person/information', '我的信息', 13, 10, 1, 1),
(85, 'MachineRoom/logList', '维护日志', 14, 8, 1, 1),
(86, 'MachineRoom/addLog', '添加日志', 14, 23, 1, 0),
(87, 'MachineRoom/reviseLog', '编辑维护日志', 14, 24, 1, 0),
(88, 'MachineRoom/deleteLog', '删除维护日志', 14, 25, 1, 0),
(89, 'Repair/confirm', '维修确认', 12, 17, 1, 0),
(90, 'Buy/quickInput', '设备快捷录入', 4, 20, 1, 0),
(91, 'Device/export', '设备导出', 2, 30, 1, 0),
(92, 'Person/expt', '正方导出信息', 13, 20, 1, 0),
(93, 'Login/modify', '忘记密码', 7, 20, 0, 0),
(94, 'Person/change', '修改密码', 13, 25, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_node_class`
--

CREATE TABLE `sbgl_node_class` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL,
  `sort` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `display` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_node_class`
--

INSERT INTO `sbgl_node_class` (`id`, `name`, `sort`, `display`) VALUES
(8, '系统设置', 19, 1),
(2, '设备管理', 10, 0),
(3, '用户管理', 15, 1),
(4, '设备采购', 11, 1),
(5, '设备流动', 13, 1),
(7, '首页', 9, 0),
(12, '设备维修', 12, 1),
(13, '个人中心', 17, 1),
(14, '机房管理', 14, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_repair`
--

CREATE TABLE `sbgl_repair` (
  `rp_id` int(10) UNSIGNED NOT NULL,
  `rp_device_identifier` int(10) UNSIGNED DEFAULT NULL,
  `rp_location` varchar(32) NOT NULL,
  `rp_matter` varchar(250) DEFAULT NULL,
  `rp_time` int(10) UNSIGNED NOT NULL,
  `rp_person` int(10) UNSIGNED NOT NULL,
  `rp_person_address` varchar(32) DEFAULT NULL,
  `rp_solve_user` int(10) UNSIGNED DEFAULT NULL,
  `rp_solve` varchar(250) DEFAULT NULL,
  `rp_solve_time` int(10) UNSIGNED DEFAULT NULL,
  `rp_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1待审核，2通过审核，3未通过审核',
  `rp_solve_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1未维修，2已维修，3维修中，4无法维修'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_repair`
--

INSERT INTO `sbgl_repair` (`rp_id`, `rp_device_identifier`, `rp_location`, `rp_matter`, `rp_time`, `rp_person`, `rp_person_address`, `rp_solve_user`, `rp_solve`, `rp_solve_time`, `rp_status`, `rp_solve_status`) VALUES
(39, 2017092301, '20345', '内存故障', 1506096000, 151110192, NULL, NULL, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_role`
--

CREATE TABLE `sbgl_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `node_list` text,
  `remark` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_role`
--

INSERT INTO `sbgl_role` (`id`, `name`, `node_list`, `remark`) VALUES
(2, '超级管理员', '30,79,80,58,59,60,61,81,91,32,33,34,35,36,37,41,42,50,51,52,53,77,90,62,63,64,65,66,67,68,69,70,89,71,72,73,74,75,76,54,55,56,57,85,86,87,88,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,78,83,92,94,39,40,46,47,48,49', '我是神。'),
(3, '普通管理员', '30,13,14', '万年老二。'),
(4, '买卖', '', '没有买卖，就没有伤害。'),
(6, '路人甲', '', '我是路人。'),
(7, '我', '30', '就是都很');

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_system`
--

CREATE TABLE `sbgl_system` (
  `name` varchar(64) NOT NULL,
  `contents` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_system`
--

INSERT INTO `sbgl_system` (`name`, `contents`) VALUES
('backstage', '实验室设备管理系统');

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_user`
--

CREATE TABLE `sbgl_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` int(11) UNSIGNED NOT NULL,
  `psd` char(60) NOT NULL,
  `username` varchar(16) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `sphone` int(6) UNSIGNED DEFAULT NULL,
  `role` tinyint(3) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为会员，1为管理人员',
  `verify` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未认证，1认证',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0停用，1正常',
  `reg_time` int(10) UNSIGNED NOT NULL,
  `login_ip` varchar(16) DEFAULT NULL,
  `login_time` int(10) UNSIGNED DEFAULT NULL,
  `login_number` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_user`
--

INSERT INTO `sbgl_user` (`id`, `user`, `psd`, `username`, `class`, `email`, `phone`, `sphone`, `role`, `type`, `verify`, `status`, `reg_time`, `login_ip`, `login_time`, `login_number`) VALUES
(39, 151110192, '$2y$10$offJrp7LwCLnkB3gwAtMhO.s9.hJJ4rSVVJkJhi/7Orpl9ug4IDEG', '陈海钦', '计算机1504班', 'abcde@qq.com', '11111111111', 691931, 2, 1, 1, 1, 1505983260, '127.0.0.1', 1506521826, 14),
(38, 151110193, '$2y$10$BAmvMFR7NPNC/1xdHLyJZuAnBC09putzDvVLNsSuZI1QU2DQf0HQG', NULL, NULL, '', '', NULL, 2, 1, 1, 1, 1505910463, '127.0.0.1', 1505983673, 2);

-- --------------------------------------------------------

--
-- 表的结构 `sbgl_version`
--

CREATE TABLE `sbgl_version` (
  `id` int(11) NOT NULL,
  `client_type` tinyint(1) NOT NULL COMMENT '1 IOS，2 android',
  `client_version` varchar(16) NOT NULL COMMENT 'APP版本号',
  `update_note` text NOT NULL COMMENT '更新说明',
  `client_link` varchar(255) NOT NULL,
  `is_required` tinyint(1) NOT NULL COMMENT '1强制更新，0选择更新',
  `time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sbgl_version`
--

INSERT INTO `sbgl_version` (`id`, `client_type`, `client_version`, `update_note`, `client_link`, `is_required`, `time`) VALUES
(31, 2, '3.0', 'frjhrtjh', '2017-09-27/1506503508.apk', 0, 1506441600),
(30, 2, '2.1.2', '阿萨德\r\n阿飞', '2017-06-05/1496652579.apk', 1, 1496592000),
(28, 2, '2.0.0', '我是NO.1', '2017-06-04/1496560196.apk', 0, 1496505600),
(29, 1, '2.0.0', '随随便便', '2017-06-05/1496637554.apk', 1, 1496592000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sbgl_borrow`
--
ALTER TABLE `sbgl_borrow`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `sbgl_buy`
--
ALTER TABLE `sbgl_buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbgl_dc_mf`
--
ALTER TABLE `sbgl_dc_mf`
  ADD PRIMARY KEY (`dm_id`),
  ADD KEY `dm_dcid` (`dm_dcid`),
  ADD KEY `dm_mfid` (`dm_mfid`),
  ADD KEY `dm_dcid_2` (`dm_dcid`);

--
-- Indexes for table `sbgl_device`
--
ALTER TABLE `sbgl_device`
  ADD PRIMARY KEY (`dv_identifier`);

--
-- Indexes for table `sbgl_device_class`
--
ALTER TABLE `sbgl_device_class`
  ADD PRIMARY KEY (`dc_id`);

--
-- Indexes for table `sbgl_machine_room`
--
ALTER TABLE `sbgl_machine_room`
  ADD PRIMARY KEY (`mr_id`);

--
-- Indexes for table `sbgl_machine_room_log`
--
ALTER TABLE `sbgl_machine_room_log`
  ADD PRIMARY KEY (`mrl_id`);

--
-- Indexes for table `sbgl_manufacturer`
--
ALTER TABLE `sbgl_manufacturer`
  ADD PRIMARY KEY (`mf_id`);

--
-- Indexes for table `sbgl_matter_solve`
--
ALTER TABLE `sbgl_matter_solve`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `sbgl_node`
--
ALTER TABLE `sbgl_node`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbgl_node_class`
--
ALTER TABLE `sbgl_node_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbgl_repair`
--
ALTER TABLE `sbgl_repair`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `sbgl_role`
--
ALTER TABLE `sbgl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbgl_system`
--
ALTER TABLE `sbgl_system`
  ADD PRIMARY KEY (`name`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `sbgl_user`
--
ALTER TABLE `sbgl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbgl_version`
--
ALTER TABLE `sbgl_version`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sbgl_borrow`
--
ALTER TABLE `sbgl_borrow`
  MODIFY `br_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- 使用表AUTO_INCREMENT `sbgl_buy`
--
ALTER TABLE `sbgl_buy`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `sbgl_dc_mf`
--
ALTER TABLE `sbgl_dc_mf`
  MODIFY `dm_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `sbgl_device_class`
--
ALTER TABLE `sbgl_device_class`
  MODIFY `dc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 使用表AUTO_INCREMENT `sbgl_machine_room`
--
ALTER TABLE `sbgl_machine_room`
  MODIFY `mr_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `sbgl_machine_room_log`
--
ALTER TABLE `sbgl_machine_room_log`
  MODIFY `mrl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `sbgl_manufacturer`
--
ALTER TABLE `sbgl_manufacturer`
  MODIFY `mf_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- 使用表AUTO_INCREMENT `sbgl_matter_solve`
--
ALTER TABLE `sbgl_matter_solve`
  MODIFY `ms_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `sbgl_node`
--
ALTER TABLE `sbgl_node`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- 使用表AUTO_INCREMENT `sbgl_node_class`
--
ALTER TABLE `sbgl_node_class`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `sbgl_repair`
--
ALTER TABLE `sbgl_repair`
  MODIFY `rp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- 使用表AUTO_INCREMENT `sbgl_role`
--
ALTER TABLE `sbgl_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `sbgl_user`
--
ALTER TABLE `sbgl_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- 使用表AUTO_INCREMENT `sbgl_version`
--
ALTER TABLE `sbgl_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 限制导出的表
--

--
-- 限制表 `sbgl_dc_mf`
--
ALTER TABLE `sbgl_dc_mf`
  ADD CONSTRAINT `sbgl_dc_mf_ibfk_1` FOREIGN KEY (`dm_dcid`) REFERENCES `sbgl_device_class` (`dc_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sbgl_dc_mf_ibfk_2` FOREIGN KEY (`dm_mfid`) REFERENCES `sbgl_manufacturer` (`mf_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
