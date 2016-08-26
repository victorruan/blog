<?php
include_once "./../config/config.php";
include_once '../../vendor/autoload.php';
include_once '../functions.php';
use VictorRuan\lib\Factory;
include_once 'config/db.php';

/**
 * @var VictorRuan\lib\Router $router
 */
$router = Factory::getInstance('VictorRuan\lib\Router');

if(strpos($_SERVER['REQUEST_URI'], '?')!==false){
    $_SERVER['REQUEST_URI'] = strstr($_SERVER['REQUEST_URI'], '?', true);
}
$ctrl = $router->getCtrl();

if(is_object($ctrl)){
    if(method_exists($ctrl,$router->getAction())){
        call_user_func([$ctrl,$router->getAction()]);
    }else{
        call_user_func([$ctrl,'index'],$router->getAction());
    }
}
