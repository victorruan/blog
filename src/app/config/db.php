<?php
$db = [
    'driver'=>'mysql',
    'host'=>'0.0.0.0',
    'port'=>'3306',
    'user'=>'root',
    'pass'=>'123456',
    'db'=>'victorruan'
];
$pdo = new PDO("{$db['driver']}:host={$db['host']}:{$db['port']};dbname={$db['db']}","{$db['user']}","{$db['pass']}");
ActiveRecord::setDb($pdo);
unset($db);
unset($pdo);
