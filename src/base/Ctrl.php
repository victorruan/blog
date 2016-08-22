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
    public $engine;
    public function __construct(\Mustache_Engine $engine)
    {
        $this->engine = $engine;
    }
    public function render($template,$context=[]){
        echo $this->engine->render($template,$context);
    }
}