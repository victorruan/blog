<?php
$pdo = \VictorRuan\lib\Factory::getInstance('PDO','sqlite:datas/victorruan.db');
ActiveRecord::setDb($pdo);
ActiveRecord::execute("CREATE TABLE IF NOT EXISTS user (
            id INTEGER PRIMARY KEY,
            name TEXT,
            password TEXT
        );");
ActiveRecord::execute("DELETE from user ;");
/** @var VictorRuan\app\models\User $user */
$user = \VictorRuan\lib\Factory::getInstance('VictorRuan\app\models\User');
$user->limit(1)->find();
if(!isset($user->id)){
    $user->name = 'demo';
    $user->password = md5('demo');
    $user->insert();
}