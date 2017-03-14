<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/10
 * Time: 17:31
 */

namespace app\Admin\controller;

//Admin模块继承CommonController以实现身份验证
class IndexController extends CommonController
{
    public function index() {
        $name = $_SESSION['user'];
        $this->assign('name', $name);
        $this->display('index.html');
    }
}