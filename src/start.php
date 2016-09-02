<?php
include_once __DIR__ . '/../vendor/autoload.php';
use Workerman\Worker;
define('GLOBAL_START', 1);
// 加载IO 和 Web
require_once __DIR__ . '/start_io.php';
require_once __DIR__ . '/start_web.php';
// 运行所有服务
Worker::runAll();