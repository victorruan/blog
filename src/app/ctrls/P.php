<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/26
 * Time: 上午11:58
 */

namespace VictorRuan\app\ctrls;
use HyperDown\Parser;

use VictorRuan\base\Ctrl;

class P extends Ctrl
{
    public function index($id){
        $parser = new Parser;
        $text = <<<MARKDOWN
# victorruan
[![Build Status](https://travis-ci.org/victorruan/victorruan.svg?branch=master)](https://travis-ci.org/victorruan/victorruan)

* 这是一个为了装B自实现的php的MVC框架.
* 特点是基于php-cli实现web服务器.
* 不需要nginx等web容器支持.

##如何启动?
* ```bower install```
* ```git clone https://github.com/victorruan/victorruan.git```
* ```cd victorruan;composer install;```
* ```cd src```
* ```php start.php start```

##项目依赖
* 需要安装PDO php7.0-sqlite3 扩展
* 仅支持php7 以上
* 见`composer.json`
* 见`bower.json`

##注意
* 请配置 ```src/app/config/db.php```
MARKDOWN;
        $html = $parser->makeHtml($text);
        if(!empty($id))
        $this->thread_key.='\\'.$id;
        $this->render('post',['html'=>$html]);
    }
}