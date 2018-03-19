<?php
/**
 * Created by PhpStorm.
 * User: LXT
 * Date: 2018/1/2
 * Time: 15:45
 */

class ItemController extends Controller
{
    function add($aaa)
    {

    }

    //返回一个列表
    function all($id)
    {
        $items = (new ItemModel())->select_id_one($id);//从M层获取数据


        //传递参数
        $this->assgin('title',$id);
        $this->assgin('content','新闻详情');
        $this->assgin('items',$items);
    }

    function update()
    {
        echo 'aaa';
    }
}

