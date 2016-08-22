<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/20
 * Time: 下午6:14
 */
namespace VictorRuan\lib;
class Factory{
    static $class_map = [];
    static function getInstance($classname,$config=false){
        if(class_exists($classname)){
            if(!isset(self::$class_map[$classname])){
                if($config){
                    self::$class_map[$classname] = new $classname($config);
                }else{
                    self::$class_map[$classname] = new $classname;
                }
            }
            return self::$class_map[$classname];
        }else{
            throw new \Exception($classname.' class not found');
        }
    }
}