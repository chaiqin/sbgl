<?php

return array(
    //'配置项'=>'配置值'

    //'LOG_RECORD' => true, // 进行日志记录
    //'LOG_RECORD_LEVEL' => array('EMERG', 'ALERT', 'CRIT', 'ERR', 'WARN', 'NOTIC', 'INFO', 'DEBUG', 'SQL'), // 允许记录的日志级别
    //'DB_FIELDS_CACHE' => false, //数据库字段缓存
    //'SHOW_RUN_TIME' => true, // 运行时间显示
    //'SHOW_ADV_TIME' => true, // 显示详细的运行时间
    //'SHOW_DB_TIMES' => true, // 显示数据库查询和写入次数
    //'SHOW_CACHE_TIMES' => true, // 显示缓存操作次数
    //'SHOW_USE_MEM' => true, // 显示内存开销
    //'SHOW_PAGE_TRACE' => true, // 显示页面Trace信息 由Trace文件定义和Action操作赋值
    //'APP_FILE_CASE' => true, // 是否检查文件的大小写 对Windows平台有效
    //默认分组设置
    'ALLOW_MODULE_LIST' => array('Home', 'Admin'),
    //设置模板引擎
    'TMPL_ENGINE_TYPE' => 'Smarty',
    //数据库设置
    'DB_TYPE' => 'Mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'jyusbgl', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'sbgl_', // 数据库表前缀
    'DEFAULT_FILTER' => '', // 默认参数过滤方法 用于I函数...
    'TMPL_ACTION_ERROR' => 'Public:jump', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:jump', // 默认成功跳转对应的模板文件
);
