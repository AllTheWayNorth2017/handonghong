<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/10
 * Time: 17:37
 */

namespace app\Home\controller;

use app\Home\model\UserModel;
use core\lib\Controller;

class LoginController extends Controller
{
    public function index() {
        $this->assign('getContextPath', getContextPath());
        $this->display('index.html');
    }

    public function check() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['username']) && $_POST['username'] != '' &&
                isset($_POST['password']) && $_POST['password'] != '') {
                $salt = "woshitianxingwopaishui";
                $username = addslashes($_POST['username']);
                $password = md5(md5($_POST['password']).$salt);
                $model = new UserModel();
                $data = $model->find(array('name' => $username));
                if ($password == $data['password']) {
                    $_SESSION['user'] = $data['name'];
                    return jsonReturn(
                        200,
                        '登录成功',
                        array(
                            'url' => 'http://localhost/mvc/admin/index'
                    ));
                } else {
                    jsonReturn(
                        400,
                        '登录失败，用户名或密码错误'
                    );
//                    $_SESSION['user'] = '123';
//                    return jsonReturn(
//                        200,
//                        '登录成功',
//                        array(
//                            'url' => 'http://localhost/mvc/admin/index'
//                    ));
                }
            }
        }
    }
}