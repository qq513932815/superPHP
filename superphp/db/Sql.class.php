<?php
/**
 * Created by PhpStorm.
 * User: LXT
 * Date: 2018/1/4
 * Time: 9:17
 * 数据库的所有操作
 * Model.class.php 继承该文件
 */

class sql
{
    protected $_db;//PDO对象
    protected $_result;//查询结果集
    protected $_table;//表名
    private $filed_str = "";//字段名称的集合
    private $values_str = "";//值的集合

    //数据库连接函数
    function connect($host,$user,$pass,$dbname)
    {
        try{
            //尝试执行的代码块，可能会报错
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8',$host,$dbname);
            //数据库查询的结果，一般需要 array("name"=>"aaa","password"=>"password")
            $this->_db = new PDO($dsn,$user,$pass,array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC));
        }catch (PDOException $exception){
            //exit()
            die("error：".$exception.getMessage());
        }
    }

    //查询所有
    function selectAll()
    {
        $sql = sprintf('SELECT * FROM %s',$this->_table);
        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    //根据ID查询一条数据
    function select_id_one($id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id=%s',$this->_table,$id);
        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    //删除表中的某一条数据
    function delete($id)
    {
        $sql = sprintf('DELETE FROM %s WHERE id=%s',$this->_table,$id);
        $sth = $this->_db->prepare($sql);
        $sth->execute();//PDO操作
        return $sth->rowCount();
    }

    //插入操作
    function insert($data)
    {
        $this->formateInsert($data);
        $sql = sprintf("INSERT INTO %s(%s) VALUES (%s)",$this->_table,$this->filed_str,$this->values_str);
//        echo $sql;
        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }

    //格式化插入操作的字段和值
    function formateInsert($data)
    {
        $fileds = array();
        $values = array();
        foreach ($data as $key=>$value)
        {
            $fileds[] = $key;
            $values[] = $value;
        }
        //数组转化成字符串，并且用逗号分隔
        $this->filed_str = implode(',',$fileds);
        $this->values_str = implode(',',$values);
    }

}