<?php
//定义bower管理目录
defined('BOWER_PATH') or define('BOWER_PATH', __DIR__.'/../../bower_components/');
defined('VIEWS_PATH') or define('VIEWS_PATH', __DIR__.'/../app/views/');
defined('DATAS_PATH') or define('DATAS_PATH', __DIR__.'/../app/datas/');
//composer 自动加载
include_once '../../vendor/autoload.php';
include_once 'db.php';
include_once '../functions.php';

use VictorRuan\lib\Vruan;
//定义容器
Vruan::$container = new Slince\Di\Container;
Vruan::$container->set('router',function(){return new \Klein\Klein();},true);
Vruan::$container->set('index',function(){return new \VictorRuan\app\ctrls\Index();});
Vruan::$container->set('lists',function(){return new \VictorRuan\app\ctrls\Lists();});
Vruan::$container->set('p',function(){return new \VictorRuan\app\ctrls\P();});
Vruan::$container->set('chat',function(){return new \VictorRuan\app\ctrls\Chat();});
Vruan::$container->set('login',function(){return new \VictorRuan\app\ctrls\Login();});
Vruan::$container->set('sf',function(){return new \VictorRuan\app\ctrls\Sf();});
$router = Vruan::$container->get('router');
$router->respond('/', [Vruan::$container->get('index'),'index']);
$router->respond('GET', '/lists', [Vruan::$container->get('lists'),'get']);
$router->respond('POST', '/lists', [Vruan::$container->get('lists'),'post']);
$router->respond('/chat', [Vruan::$container->get('chat'),'index']);
$router->respond('/login', [Vruan::$container->get('login'),'index']);
$router->respond('/sf', [Vruan::$container->get('sf'),'index']);
$router->with('/p', function () use ($router) {
    $router->respond('GET', '/[:id]', [Vruan::$container->get('p'),'index']);
    $router->respond('POST', '/edit', [Vruan::$container->get('p'),'edit']);
    $router->respond('GET', '/edit/[:id]', [Vruan::$container->get('p'),'edit']);
    $router->respond('GET', '/getPostById/[:id]', [Vruan::$container->get('p'),'getPostById']);
});
