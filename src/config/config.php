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
Vruan::$container->set('router',function(){return new VictorRuan\lib\Router;});
