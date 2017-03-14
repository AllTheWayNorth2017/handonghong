<?php
//开启session
session_start();
//项目根目录
define('DIR', realpath('./'));
//项目核心文件夹目录
define('CORE', realpath('./core'));
//引入核心类
require_once CORE .'/lib/Core.php';
//引入自定义全局函数
require_once CORE .'/common/function.php';
//文件异常处理
try {
    //类自动加载注册
    spl_autoload_register('\\core\\lib\\Core::autoload');
    //启动程序
    core\lib\Core::run();
}catch (Exception $e) {
    echo $e->getMessage();
}