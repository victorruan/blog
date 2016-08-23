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
            echo "<font color='#bd5a27;'>$key</font> : $value <br/>";
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