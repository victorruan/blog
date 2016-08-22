<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/20
 * Time: 下午5:32
 */
include_once '../../vendor/autoload.php';
//首先需要加载functions
include_once '../functions.php';

use VictorRuan\lib\Factory;
$route = Factory::getInstance('VictorRuan\lib\Router');
$views = Factory::getInstance('Mustache_Loader_FilesystemLoader',dirname(__FILE__) . '/views');
$mustache = Factory::getInstance('Mustache_Engine',[
    'loader' => $views,
]);
$ctrl = $route->getCtrl($mustache);

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory(dirname(__FILE__) . '/models');
    $cfg->set_connections(['development' => 'mysql://root:123456@0.0.0.0/victorruan']);
});


if(is_object($ctrl))
call_user_func([$ctrl,$route->getAction()]);
