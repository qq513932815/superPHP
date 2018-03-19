<?php
/**
 * Created by PhpStorm.
 * User: LXT
 * Date: 2018/1/2
 * Time: 23:37
 */

//例子：使用此框架创建一个Movie页面 movies/show/1 显示第一个电影
class MovieController extends Controller
{
    function show($mid)
    {
        $this->assgin('title',$mid);
        $this->assgin('content','潘金莲大战西门庆');
    }
}