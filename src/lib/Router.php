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
    public function getCtrl(\Mustache_Engine $engine){
        if(!isset(explode('/',$_SERVER['REQUEST_URI'])[1]) or empty(explode('/',$_SERVER['REQUEST_URI'])[1])){
            $ctrl = 'index';
        }else{
            $ctrl = explode('/',$_SERVER['REQUEST_URI'])[1];
        }
        try{
            $ctrl = Factory::getInstance($this::CtrlNameSpace.'\\'.ucfirst($ctrl),$engine);
        }catch(\Exception $e){
            printf_info($ctrl.' is not a ctrl!');
        }
       return $ctrl;
    }

    public function getAction(){
        return explode('/',$_SERVER['REQUEST_URI'])[2]??'index';
    }
}