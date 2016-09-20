<?php
include_once "../config/config.php";
use VictorRuan\lib\Vruan;
use Workerman\Protocols\Http;
Http::sessionStart();
if(empty($_COOKIE['guid'])){
    Http::setcookie('guid',uniqid());
}
$router = Vruan::$container->get('router');
$router->dispatch();