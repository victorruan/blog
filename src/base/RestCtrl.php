<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/23
 * Time: 下午4:26
 */

namespace VictorRuan\base;


class RestCtrl
{
    public function index(){
        if(isset($_SERVER['REQUEST_METHOD'])){
            $method = strtolower($_SERVER['REQUEST_METHOD']);
            $this->$method();
        }
    }
}