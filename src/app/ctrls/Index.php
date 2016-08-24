<?php
namespace VictorRuan\app\ctrls;
use VictorRuan\base\Ctrl;

class Index extends Ctrl
{
    public function index(){
        $disabledTip = "计划学习之中!";
        if(isset($_GET['edit']) and $_GET['edit']==='true'){
            $edit = 'true';
        }else{
            $edit = 'false';
        }
        $this->render('index',['disabledTip'=>$disabledTip,'edit'=>$edit]);
    }
}