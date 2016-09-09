<?php
namespace VictorRuan\app\ctrls;
use VictorRuan\base\Ctrl;
class Sf extends Ctrl
{
   public function index(){
       array_walk(get_sf_questions(),function($v,$k){
           echo "<a href=\"{$k}\">{$v}</a><br>";
       });
   }
}