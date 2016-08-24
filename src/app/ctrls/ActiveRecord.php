<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/24
 * Time: 下午2:51
 */

namespace VictorRuan\app\ctrls;
use VictorRuan\app\models\Book;
use VictorRuan\base\Ctrl;

class ActiveRecord extends Ctrl
{
    public function index(){
        $results = Book::_query("select * from books;");
        foreach($results as $key => $result){
            echo $result->name."<br>";

        }
    }
}