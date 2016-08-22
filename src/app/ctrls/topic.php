<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/22
 * Time: 下午2:43
 */
namespace VictorRuan\app\ctrls;
use VictorRuan\app\models\Book;
use VictorRuan\base\Ctrl;

class Topic extends Ctrl{
    public function index(){
        $book = Book::first();
        $this->render('index',$book);
    }
}