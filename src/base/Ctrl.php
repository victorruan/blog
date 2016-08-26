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
    public $title = 'victorruan的小站';
    public $thread_key ;
    public function __construct()
    {

    }
    public function render($_file,$params=[],$layout='layout'){
        foreach($params as $k=>$v){
            $$k = $v;
        }
        $_title = $this->title;
        $_thread_key = $this->thread_key;
        include VIEWS_PATH.$layout.".php";
    }
}