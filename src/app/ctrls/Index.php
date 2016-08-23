<?php
namespace VictorRuan\app\ctrls;
use VictorRuan\base\Ctrl;

class Index extends Ctrl
{
    public function index(){
        $disabledTip = "计划学习之中!";
        $this->render('index',['disabledTip'=>$disabledTip]);
    }
}