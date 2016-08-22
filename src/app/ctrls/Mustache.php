<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/22
 * Time: 下午3:19
 */

namespace VictorRuan\app\ctrls;

use VictorRuan\base\Ctrl;

class Mustache extends Ctrl
{
    function index(){
        $this->render('mustache', array('planet' => 'World')); // "Hello, World!"
    }
}