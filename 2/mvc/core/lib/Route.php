<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/10
 * Time: 16:26
 */

namespace core\lib;

class Route
{
    //模块
    private $module;
    //控制器
    private $controller;
    //控制器方法
    private $action;

    //对pathinfo进行处理获取 模块 控制器 控制器方法 名称
    public function __construct()
    {
        $requestMap = array('home', 'index', 'index');
        if (isset($_SERVER['PATH_INFO'])) {
            $pathInfo = trim($_SERVER['PATH_INFO'], '/');
            if ($pathInfo) {
                $pathArr = explode('/', $pathInfo);
                $count = count($pathArr);
                for ($i = 0; $i < $count && $i < 3; $i++) {
                    $requestMap[$i] = $pathArr[$i];
                }
                if ($count > 3) {
                    for ($i = 3; $i < $count; $i += 2) {
                        if (isset($pathArr[$i + 1]))
                            $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                    }
                }
            }
        }
        $this->module = ucfirst($requestMap[0]);
        $this->controller = ucfirst($requestMap[1]);
        $this->action = $requestMap[2];
    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }

    public function getModule() {
        return $this->module;
    }
}