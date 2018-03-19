<?php
/**
 * Created by PhpStorm.
 * User: LXT
 * Date: 2018/1/2
 * Time: 9:19
 */

//控制器的基类
class Controller
{
    protected $_controller;
    protected $_action;
    protected $_view;

    function __construct($controller,$action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_view = new View($controller,$action);//实例化View
    }

    //是C层的分配变量
    function assgin($name,$value)
    {
        $this->_view->assgin($name,$value);
    }

    function __destruct()
    {
        $this->_view->render();//调用view里的渲染方法
    }
}