<?php
include __DIR__.'/../../vendor/autoload.php';
defined('DATAS_PATH') or define('DATAS_PATH', __DIR__.'/../app/datas/');
include __DIR__.'/../functions.php';
if(in_array("pdo_sqlite", get_loaded_extensions())){
        @unlink(DATAS_PATH.'victorruan.db');
        ActiveRecord::setDb(new PDO('sqlite:'.DATAS_PATH.'victorruan.db'));
        ActiveRecord::execute("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY,
            name TEXT,
            password TEXT
        );");
        ActiveRecord::execute("
            CREATE TABLE IF NOT EXISTS posts (
              id INTEGER PRIMARY KEY ,
              alias TEXT UNIQUE,
              title TEXT,
              content TEXT,
              create_time INTEGER,
              update_time INTEGER
            );
        ");
        ActiveRecord::execute("DELETE from users ;");
        ActiveRecord::execute("DELETE from posts ;");
        /** @var VictorRuan\app\models\User $user */
        /** @var VictorRuan\app\models\Post $post */
        $user = \VictorRuan\lib\Factory::getInstance('VictorRuan\app\models\User');
        $post = \VictorRuan\lib\Factory::getInstance('VictorRuan\app\models\Post');

        $post->title = '如何创建一个自己的【Composer/Packagist】包';
        $post->content = file_get_contents(DATAS_PATH.'posts/composer.md');
        $post->alias = 'composer';
        $post->insert();
        $user->name = 'demo';
        $user->password = md5('demo');
        $user->insert();
        $print_info['users_table']='初始化成功';
        $print_info['posts_table']='初始化成功';
        printf_info($print_info);
}else{
    printf_info(['pdo_sqlite'=>'<em style="color: red">未安装!</em>']);
}

