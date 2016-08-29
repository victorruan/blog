<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/29
 * Time: 下午1:41
 */

namespace VictorRuan\app\models;

class Post extends \ActiveRecord{
    public $table = 'posts';
    public $primaryKey = 'id';
}
