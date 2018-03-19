<?php
/**
 * Created by PhpStorm.
 * User: LXT
 * Date: 2018/1/2
 * Time: 9:19
 */

//View 页面的基类
class View
{
    protected $_controller;
    protected $_action;
    protected $_vars;

    function __construct($controller,$action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
//        echo 'View 构造函数';
    }

    //页面的渲染方法
    function render()
    {
        extract($this->_vars);//extract()将关联数组的key转换成一个变量，value转换成变量的值
//        $title = $this->_vars['title'];
//        $content = $this->_vars['content'];
        $defaultHeader = APP_PATH.'application/views/header.html';
        $defaultFooter = APP_PATH.'application/views/footer.html';
        $header = APP_PATH.'application/views/'.strtolower($this->_controller).'/header.html';
        $footer = APP_PATH.'application/views/'.strtolower($this->_controller).'/footer.html';

        if (file_exists($header)){
            include $header;
        }else{
            include $defaultHeader;
        }

        include APP_PATH.'application/views/'.strtolower( $this->_controller).'/'.strtolower($this->_action).'.html';

        if (file_exists($footer)){
            include $footer;
        }else{
            include $defaultFooter;
        }
    }

    //接受参数的方法
    function assgin($name,$value)
    {
        $this->_vars[$name] = $value;//接收多个变量进来
    }


}