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
    public function render($_file,$_params=[],$_layout='layout'){
        foreach($_params as $k=>$v){
            $$k = $v;
        }
        $_title = $this->title;
        $_thread_key = $this->thread_key;
        if($_layout!==false){
            include VIEWS_PATH.$_layout.".php";
        }else{
            include VIEWS_PATH.$_file.".php";
        }
    }

}