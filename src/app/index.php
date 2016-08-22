<?php
include_once '../../vendor/autoload.php';
include_once '../functions.php';
include_once 'config/db.php';
use VictorRuan\lib\Factory;
$route = Factory::getInstance('VictorRuan\lib\Router');
$views = Factory::getInstance('Mustache_Loader_FilesystemLoader',dirname(__FILE__) . '/views');
$mustache = Factory::getInstance('Mustache_Engine',[
    'loader' => $views,
]);
$ctrl = $route->getCtrl($mustache);
if(is_object($ctrl))
call_user_func([$ctrl,$route->getAction()]);
