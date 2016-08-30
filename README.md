# [victorruan](https://github.com/victorruan/victorruan)

[![Build Status](https://travis-ci.org/victorruan/victorruan.svg?branch=master)](https://travis-ci.org/victorruan/victorruan)

* 这是一个用来练手的小博客
* 包含了一个为了装B自实现的php的MVC框架.
* 包含了基于php-cli实现web服务器.
* 当然这个web服务器使用的是workerman框架中的webserver
* 所以不需要nginx等web容器支持.

##如何启动?
* ```git clone https://github.com/victorruan/victorruan.git```
* ```cd victorruan;composer install;```
* ```cd src```
* ```php app/install.php（数据初始化）```
* ```php start.php start（这里参考workerman框架）``` 

##项目依赖
* 需要安装PDO php7.0-sqlite3 扩展
* php7
* 见`composer.json`
