<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/10
 * Time: 17:09
 */

namespace app\Home\controller;

use app\Home\model\StudentModel;
use core\lib\Controller;

class IndexController extends Controller
{
    public function index() {
        $stuModel = new StudentModel();
        $condition = array(
            'class' => '04121503',
            'gender' => '男'
        );
        $field = array(
            'name',
            'num'
        );
        $stulist = $stuModel->select($condition, $field);
        $this->assign('title', '3班男生名单');
        $this->assign('getContextPath', getContextPath());
        $this->assign('name', '蒋天星');
        $this->assign('stulist', $stulist);
        $this->display('index.html');
    }

}