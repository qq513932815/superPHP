<?php
/**
 * superPHP 框架
 * User: LXT
 * Date: 2017/12/29
 * Time: 22:05
 */

//function __autoload($className)
//{
//    echo $className;
//}

//初始化一个常量

//框架路径
defined('FRAME_PATH') or define('FRAME_PATH',__DIR__.'/');
//应用根目录
defined('APP_PATH') or define('APP_PATH',dirname($_SERVER['SCRIPT_FILENAME']).'/');
//配置文件目录
defined('CONFIG_PATH') or define('CONFIG_PATH',APP_PATH.'config/');
//缓存目录
defined('RUNTIME_PATH') or define('RUNTIME_PATH',APP_PATH.'runtime/');

//包含配置文件
require CONFIG_PATH.'config.php';
//包含框架核心类库
require FRAME_PATH.'Core.php';

//实例化核心库
$super = new Core();
$super->run();