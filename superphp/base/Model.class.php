<?php
/**
 * Created by PhpStorm.
 * User: LXT
 * Date: 2018/1/2
 * Time: 9:19
 */

class Model extends Sql
{
    public function __construct()
    {

//        echo 'Model 基类的构造函数';
        $this->connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        //这是一个基类
        $baseModel = get_class($this);
        $baseModel = rtrim($baseModel,'Model');
        $this->_table = strtolower($baseModel);

    }
}