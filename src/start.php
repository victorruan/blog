<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/20
 * Time: 下午5:29
 */
require_once __DIR__.'/../vendor/workerman/workerman/Autoloader.php';
$web = new \Workerman\WebServer('http://0.0.0.0:1024');
$web->addRoot('',__DIR__.'/app');
$web->count = 2;
\Workerman\Worker::runAll();