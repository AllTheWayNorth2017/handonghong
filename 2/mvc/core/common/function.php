<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/10
 * Time: 16:42
 */
/*
 * 遍历数组
 */
function varDump($array) {
    foreach ($array as $key => $value) {
        echo $key.'=='.$value."<br/>";
    }
}

/*
 * 获取项目url地址
 */
function getContextPath() {
    $pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '//';
    $uri = $_SERVER['REQUEST_URI'];
    return str_replace($pathInfo, '', $uri);
}

/*
 * 重定向
 */
function redirect($newPathInfo) {
    $path = getContextPath().$newPathInfo;
    header("location: {$path}");
}

/*
 * 同一json返回格式
 */
function jsonReturn($status, $message, $data = array()) {
    exit(
        json_encode(
            array(
                'status' => $status,
                'message' => $message,
                'data' => $data
            )
        )
    );
}


