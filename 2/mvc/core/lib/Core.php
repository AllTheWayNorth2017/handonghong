<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/3/10
 * Time: 16:27
 */

namespace core\lib;

class Core
{
    //防止类重复加载
    private static $requestMap = array();

    //加载控制器 调用控制器方法
    public static function run() {
        $route = new \core\lib\Route();
        $module = $route->getModule();
        $controller = $route->getController();
        $action = $route->getAction();
        $filePath = DIR."/app/{$module}/controller/{$controller}Controller.php";
        //类的全写
        $classPath = "\\app\\{$module}\\controller\\{$controller}Controller";
        //模板文件所在基础目录
        $templatePath = DIR."/app/{$module}/view/{$controller}/";
        //此处检验类文件是否存在
        self::checkFile(array(
            $filePath,$templatePath
        ));
        $controller = new $classPath();
        $controller->setTemplateDir($templatePath);

        $controller->$action();
    }

    //类自动加载实现
    public static function autoload($class) {
        $file = str_replace('/', "\\", DIR . '/' . ucfirst($class) . '.php');
        //比较坑的是Smarty的主类命名不合此mvc风格，无法使用checkFile()函数统一检验
        if (is_file($file)) {
            //如果类文件存在则加载并放入$requestMap中
            if (!isset(self::$requestMap[$class])) {
                require_once $file;
                self::$requestMap[$class] = $file;
            }
            return true;
        }
        return false;
    }

    //统一类自动加载异常抛出
    public static function checkFile($files) {
        $errors = array();
        if (!is_array($files)) {
            $files = array($files);
        }
        foreach ($files as  $item) {
            if (!is_file($item) && !is_dir($item)) {
                $errors[] = "文件不存在---{$item}";
            }
        }
        if (!empty($errors)) {
            $errorMessage = implode("<br/>", $errors);
            throw new \Exception($errorMessage);
        }
    }
}