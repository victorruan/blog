<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/24
 * Time: 上午11:21
 */

namespace VictorRuan\base;


/**
 * 把属性存在一个数组里
 */
class Object {
    /**
     * @var array 在当前对象里把属性存在一个数组$attributes里
     */
    public $attributes = [];
    public function __construct($config = []) {
        foreach($config as $key => $val) $this->$key = $val;
    }
    public function __set($var, $val) {
        $this->attributes[$var] = $val;
    }
    public function __get($var) {
        return $this->attributes[$var] ?? null;
    }
    public static function name(){
        return get_called_class();
    }
}