<?php
/**
 * superphp 核心库
 * User: LXT
 * Date: 2017/12/29
 * Time: 22:05
 */

class Core
{
    function run()
    {
        //将我们当前类里面的一个方法，注册到__autoload
//        spl_autoload_register('Core::loadClass');
//        $this::loadClass();

//        $a = array($this,'loadClass');
//        $a();
        //以上原理演变出下面的写法
        spl_autoload_register(array($this,'loadClass'));

//        echo $_GET['url'];
        $this->Route();
    }

    //路由方法
    function Route()
    {
        $controllerName = 'Home';//默认控制器名称
        $action = 'index';//默认方法

        //$_GET不为空
        if (!empty($_GET['url']))
        {
            $urlArray = explode('/',$_GET['url']);
            $controllerName = $urlArray[0];

            array_shift($urlArray);//删除数组第一项
            $action = empty($urlArray[0])?'index':$urlArray[0];//获取方法
            array_shift($urlArray);
            $queryString = empty($urlArray[0])?array():$urlArray;//获取参数
            //实例化控制器
            $controller = $controllerName.'Controller';
            $dispath = new $controller($controllerName,$action);

            //判断对象中是否有url中的$action方法
            if (method_exists($dispath,$action)){
                //存在方法则调用
                call_user_func_array(array($dispath,$action),$queryString);
            }else{
                die($action.'is not defound');
            }
        }

    }

    static function loadClass($class)
    {
        $class = ucfirst($class);
        $framePath = FRAME_PATH.'/base/'.ucfirst($class).'.class.php';
        $controllerPath = APP_PATH.'application/controllers/'.$class.'.class.php';
        $modelPath = APP_PATH.'application/models/'.$class.'.class.php';
        $sqlPath = FRAME_PATH.'db/Sql.class.php';
        if (file_exists($framePath)){
            include_once $framePath;//引入核心类
        }
        if (file_exists($controllerPath)){
            include_once $controllerPath;
        }
        if (file_exists($modelPath)){
            include_once $modelPath;
        }
        if (file_exists($sqlPath)){
            include_once $sqlPath;
        }
    }


}