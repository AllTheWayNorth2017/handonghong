<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/11
 * Time: 21:58
 */

namespace core\lib;

class Model
{
    protected $table;
    protected $pdo;
    protected $statement;

    /**
     * 构造函数 实例化pdo对象
     * Model constructor.
     * @param $table 模型对应数据表名
     * @param string $prefix 数据表前缀
     */
    public function __construct($table, $prefix = '')
    {
        $this->table = $table;
        $config = require_once DIR . '/config.php';
        $this->pdo = new \PDO($config['dsn'], $config['user'], $config['password']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

//    $data = array(
//        'class' => '04121503',
//        'gender' => '男'
//    );
//    $field = array(
//        'name',
//        'num'
//    );
//    $sql = "select name, num from stulist where class='04121503' and gender='男'";
    /**
     * 多条记录查询
     * @param null $data
     * @param array $field
     * @return array
     */
    public function select($data = null, $field = array()) {
        $sql = "select {$this->getSearchFields($field)} from {$this->table} {$this->getSearchConditions($data)}";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * 单条记录查询
     * @param null $data
     * @param array $field
     * @return mixed
     */
    public function find($data = null, $field = array()) {
        $sql = "select {$this->getSearchFields($field)} from {$this->table} {$this->getSearchConditions($data)}";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetch(\PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * 获取sql语句中where条件部分
     * @param $data
     *    $data = array(
     *        'class' => '04121503',
     *        'gender' => '男'
     *    );
     * @return string
     *    where class='04121503' and gender='男'
     */
    private function getSearchConditions($data) {
        if ($data == null || empty($data)) {
            return '';
        }
        $condition = '';
        if (is_string($data)) {
            $condition = "where {$data}";
        } else if (is_array($data)) {
            $combine = function ($key, $value) {
                return "{$key}='{$value}'";
            };
            $items = array_map($combine, array_keys($data), array_values($data));
            $condition = 'where ' . implode(' and ', $items);
        }
        return $condition;
    }

    /**
     * 获取sql语句中的表单字段部分
     * @param array $fileds
     * $field = array(
     *       'name',
     *       'num'
     *    );
     * @return string
     *   name, num
     */
    private function getSearchFields($fileds = array()) {
        $filed = '*';
        if (!empty($fileds)) {
            $filed = implode(',', $fileds);
        }
        return $filed;
    }

    /**
     * 插入单列信息
     * @param null $key
     * @param null $value
     * @return bool
     */
    public function save($key = null, $value = null) {
        $sql = "INSERT INTO {$this->table} ($key) VALUES ($value)";
        $statement = $this->pdo->prepare($sql);
        $boolean = $statement->execute();
        return $boolean;
    }

    /**
     * 插入多列信息
     * @param array $filed
     * @return bool
     */
    public function insert($filed = array()) {
        $sql = "INSERT INTO {$this->table} ({$this->getInsertKey($filed)}) VALUES ({$this->getInsertValue($filed)})";
        $statement = $this->pdo->prepare($sql);
        $boolean = $statement->execute();
        return $boolean;
    }


    /**
     *
     * 获取列名
     * @param array $filed
     * @return string
     */
    private function getInsertKey($filed = array()) {
        $key = array_keys($filed);
        $str = '';
        foreach ($key as $value) {
            $str .= $value.',';
        }
        $str = rtrim($str, ',');
        return $str;
    }

    /**
     * 获取键值
     * @param array $filed
     * @return string
     */
    private function getInsertValue($filed = array()) {
        $value = array_values($filed);
        $str = '';
        foreach ($value as $val) {
            $str .= $val.',';
        }
        $str = rtrim($str, ',');
        return $str;
    }

    /**
     * 修改数据库内容
     *
     * @param null $data
     * $data = array(
     *        'class' => '04121503',
     *        'gender' => '男'
     *    );
     * @param array $filed
     * $filed = array(
     *        'class' => '04121503',
     *        'gender' => '男'
     *    );
     * @return bool
     */
    public function update($data = null, $filed = array()) {
        $sql = "UPDATE {$this->table} SET {$this->getUpdataKeyValue($filed)} {$this->getSearchConditions($data)}";
        $statement = $this->pdo->prepare($sql);
        $boolean = $statement->execute();
        return $boolean;
    }

    /**
     * @param array $filed
     * $filed = array(
     *        'class' => '04121503',
     *        'gender' => '男'
     *    );
     * @return string
     */
    private function getUpdataKeyValue($filed = array()) {
        $combine = function ($key, $value) {
            return "{$key}='{$value}'";
        };
        $items = array_map($combine, array_keys($filed), array_values($filed));
        $keyvaluecouple = implode(',', $items);
        return $keyvaluecouple;
    }
}