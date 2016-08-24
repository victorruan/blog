<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/24
 * Time: 下午2:51
 */

namespace VictorRuan\app\ctrls;
use VictorRuan\base\{Ctrl,ActiveRecord as AR};

class ActiveRecord extends Ctrl
{
    public function index(){
        AR::setDb(new \PDO("mysql:host=0.0.0.0;dbname=victorruan",'root','123456'));
        $results = AR::_query("select * from books;");
        foreach($results as $key => $result){
            echo $result->name;
        }
    }
}