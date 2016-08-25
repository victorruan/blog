<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/24
 * Time: 下午2:51
 */

namespace VictorRuan\app\ctrls;
use VictorRuan\app\models\User;
use VictorRuan\base\Ctrl;

class ActiveRecord extends Ctrl
{
    public function index(){

        /** @var \ActiveRecord $user */
        $user = new User();
        $user->isnotnull('id')->eq('id', 1)->lt('id', 2)->gt('id', 0)->find();
        echo $user->name."<br>";
    }
}