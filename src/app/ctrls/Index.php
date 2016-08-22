<?php
namespace VictorRuan\app\ctrls;
use VictorRuan\app\models\Book;
use VictorRuan\base\Ctrl;

class Index extends Ctrl
{
    public function index(){
        $book = Book::first();
        $this->render('index',$book);
    }
}