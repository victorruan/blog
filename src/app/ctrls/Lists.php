<?php
namespace VictorRuan\app\ctrls;
use VictorRuan\base\RestCtrl;
use Workerman\Protocols\HttpCache;
//首页文章列表
class Lists extends RestCtrl
{

    public function get(){
        HttpCache::$header['Content-Type'] = "Content-type: application/json";
        $testLists = file_get_contents(DATAS_PATH.'lists.json');

        echo is_not_json($testLists)?<<<JSON
[
  {"url":"http://cn.vuejs.org/guide/","title":"Vue.js学习指南"},
  {"url":"http://www.baidu.com","title":"百度","disable":true},
  {"url":"https://iiunknown.gitbooks.io/iscroll-5-api-cn/content/index.html","title":"iScroll 5 API 中文版"}
]
JSON
:$testLists;
    }

    public function post(){
        file_put_contents(DATAS_PATH.'lists.json',$GLOBALS['HTTP_RAW_POST_DATA']);
    }
}