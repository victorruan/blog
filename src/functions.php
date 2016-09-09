<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/20
 * Time: 下午5:37
 */
use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
//打印输出数组信息
function printf_info($data)
{
    if(is_array($data)){
        foreach($data as $key=>$value){
            if(is_array($value))
            {
                printf_info($value);
            }
            else{
                if(php_sapi_name()==='cli')
                echo "$key : $value \n";
                else
                echo "<font color='#bd5a27;'>$key</font> : $value <br/>";
            }
        }
    }
    else{
        echo $data;
    }
}

function get_bower($path){
    $js = new AssetCollection([
        new FileAsset(BOWER_PATH.$path),
    ]);
    return $js->dump();
}

function is_not_json($str){
    return is_null(json_decode($str));
}

function auth(){
    if(!is_login()){
        \Workerman\Protocols\Http::header('Location:/login');
    }
}
function is_login(){
    return isset($_SESSION['login'])&&$_SESSION['login'];
}
function is_post(){
    return $_SERVER['REQUEST_METHOD']=='POST';
}
//获取segmentfault未解决问题的首屏
function get_sf_questions(){
    $html =  file_get_contents('https://segmentfault.com/t/php?type=unsolved');
    preg_match_all("/<h2 class=\"title\"><a href=\"(\/q\/\d+)\">(.*)<\/a><\/h2>/",$html,$match);
    array_walk($match[1],function(&$v,$k){
        $v = "https://segmentfault.com".$v;
    });
    return array_combine($match[1],$match[2]);
}