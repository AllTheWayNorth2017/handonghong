<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/10
 * Time: 17:32
 */

namespace app\Admin\controller;

use core\lib\Controller;

class CommonController extends Controller
{
    //Admin模块session检验 以构造函数充当过滤器
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            redirect('/home/login');
        }
        parent::__construct();
    }
}