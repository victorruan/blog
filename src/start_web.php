<?php
$web = new \Workerman\WebServer('http://0.0.0.0:1024');
$web->addRoot('',__DIR__.'/app');