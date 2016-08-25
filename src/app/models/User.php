<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/25
 * Time: 上午11:29
 */

namespace VictorRuan\app\models;


class User extends \ActiveRecord{
    public $table = 'user';
    public $primaryKey = 'id';


//    public $relations = array(
//        'contacts' => array(self::HAS_MANY, 'Contact', 'user_id'),
//        'contact' => array(self::HAS_ONE, 'Contact', 'user_id', array('where' => '1', 'order' => 'id desc')),
//    );
}