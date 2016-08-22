<?php
$config = [
    'driver'=>'mysql',
    'host'=>'0.0.0.0',
    'port'=>'3306',
    'user'=>'root',
    'pass'=>'123456',
    'db'=>'victorruan'
];

ActiveRecord\Config::initialize(function($cfg) use ($config)
{
    $cfg->set_model_directory(dirname(__FILE__) . '/../models');
    $cfg->set_connections(
        [
            'development' =>
                $config['driver'].
                "://".$config['user'].
                ":".$config['pass'].
                "@".$config['host'].":".$config['port'].
                "/".$config['db']
        ]
    );
});