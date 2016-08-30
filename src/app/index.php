<?php
include_once "../config/config.php";
use VictorRuan\lib\Vruan;
use Workerman\Protocols\Http;
$router = Vruan::$container->get('router');
$ctrl = $router->getCtrl();
Http::sessionStart();
if(is_object($ctrl)){
    if(method_exists($ctrl,$router->getAction())){
        call_user_func([$ctrl,$router->getAction()]);
    }else{
        call_user_func([$ctrl,'index'],$router->getParam());
    }
}