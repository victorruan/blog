<?php
namespace VictorRuan\app\ctrls;
use VictorRuan\base\Ctrl;

class Index extends Ctrl
{
    public function index(){
        $message = 'Hello Vue.js!';
        $disabledTip = "计划学习之中!";
        $testLists = json_encode([
            ['url'=>'http://cn.vuejs.org/guide/','title'=>'Vue.js学习指南'],
            ['url'=>'http://www.baidu.com','title'=>'百度','disable'=>true],
            ['url'=>'http://www.baidu.com','title'=>'百度']
        ]);
        $this->render('index',['message'=>$message,'disabledTip'=>$disabledTip,'testLists'=>$testLists]);
    }
}