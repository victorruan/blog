<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/30
 * Time: 上午9:53
 */

namespace VictorRuan\app\ctrls;


use VictorRuan\base\Ctrl;
use Workerman\Protocols\Http;
use Workerman\Protocols\HttpCache;

class Login extends Ctrl
{
    public function index(){
        if(strtolower($_SERVER['REQUEST_METHOD'])!='post'){
            if($_SESSION['login']==true){
                Http::header("Location:/");
            }
            $this->render('login',[],false);
        }
        else {
            if($_POST['username']=='admin' && $_POST['password']=='123456'){
                $_SESSION['username'] = 'admin';
                $_SESSION['login'] = true;
                Http::header("Location:/");
            }
        }
    }
}