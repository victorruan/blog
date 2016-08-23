<?php
include_once "./../config/config.php";
include_once '../../vendor/autoload.php';
include_once '../functions.php';
include_once 'config/db.php';
use VictorRuan\lib\Factory;
$route = Factory::getInstance('VictorRuan\lib\Router');

$ctrl = $route->getCtrl();
if(is_object($ctrl))
call_user_func([$ctrl,$route->getAction()]);
