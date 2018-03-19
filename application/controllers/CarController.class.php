<?php
/**
 * Created by PhpStorm.
 * User: LXT
 * Date: 2018/1/4
 * Time: 22:46
 */

//声明一个控制器，继承superPHP里面的控制器
class CarController extends Controller
{
    public function all($arr)
    {
        //获取全部车辆信息
        $model = new CarModel();
        $cars = $model->selectAll();

        $this->assgin('cars',$cars);
    }

    function delete($id)
    {
        $count = (new CarModel())->delete($id);
        if ($count>0){
            $this->assgin('msg','删除成功');
        }else{
            $this->assgin('msg','删除失败');
        }
    }

    function add()
    {
        $carname = $_POST["carname"];//各种验证
        $price = $_POST["price"];//各种验证
        //数据库插入
        $data = ["name"=>"'".$carname."'","price"=>"'".$price."'"];//判断$price是否为数字
        $count = (new CarModel())->insert($data);
        if ($count>0){
            $this->assgin('msg','插入成功');
        }else{
            $this->assgin('msg','插入失败');
        }
    }
}