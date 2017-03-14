<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/12
 * Time: 0:30
 */

namespace app\Home\model;

use core\lib\Model;

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct('user');
    }
}