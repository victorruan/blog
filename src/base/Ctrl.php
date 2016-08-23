<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/22
 * Time: 下午3:40
 */

namespace VictorRuan\base;


class Ctrl
{
    public function __construct()
    {

    }
    public function render($file,$params=[]){
        foreach($params as $k=>$v){
            $$k = $v;
        }
        include VIEWS_PATH.$file.".php";
    }
}