<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/20
 * Time: 下午5:51
 */

namespace VictorRuan\lib;


class Router
{
    const CtrlNameSpace = 'VictorRuan\app\ctrls';
    private $request_uri;
    public function __construct()
    {
        if(strpos($_SERVER['REQUEST_URI'], '?')!==false){
            $this->request_uri = strstr($_SERVER['REQUEST_URI'], '?', true);
        }else{
            $this->request_uri = $_SERVER['REQUEST_URI'];
        }
    }

    public function getCtrl(){
        if(!isset(explode('/',$this->request_uri)[1]) or empty(explode('/',$this->request_uri)[1])){
            $ctrl = 'index';
        }else{
            $ctrl = explode('/',$this->request_uri)[1];
        }
        $ctrls = explode('_',$ctrl);
        foreach($ctrls as &$value){
            $value = ucfirst($value);
        }
        $ctrl = implode('',$ctrls);
        try{
            $ctrl = $this::CtrlNameSpace.'\\'.$ctrl;
        }catch(\Exception $e){
            printf_info($ctrl.' is not a ctrl!');
        }
       return new $ctrl;
    }

    public function getAction(){
        return explode('/',$this->request_uri)[2]??'index';
    }

    public function getParam(){
        $arr = explode('/',$this->request_uri);
        array_splice($arr, 0, 2);
        return implode('/',$arr);
    }
}