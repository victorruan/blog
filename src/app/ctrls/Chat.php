<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/9/2
 * Time: 下午3:18
 */

namespace VictorRuan\app\ctrls;


use VictorRuan\base\Ctrl;

class Chat extends Ctrl
{
    public function index(){
        $this->render('chat',[],false);
    }
}