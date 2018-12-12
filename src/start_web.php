<?php
include_once __DIR__ . '/../vendor/autoload.php';
use Workerman\Worker;
$web = new \Workerman\WebServer('http://0.0.0.0:1024');
$web->addRoot('',__DIR__.'/app');
if(!defined('GLOBAL_START'))
{
    Worker::runAll();
}
