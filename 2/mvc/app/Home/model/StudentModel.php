<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/11
 * Time: 23:35
 */

namespace app\Home\model;
use core\lib\Model;

class StudentModel extends Model
{
    public function __construct()
    {
        $table = 'stulist';
        parent::__construct($table);
    }
}