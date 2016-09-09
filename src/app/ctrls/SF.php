<?php
namespace VictorRuan\app\ctrls;
use VictorRuan\base\Ctrl;
class Sf extends Ctrl
{
   public function index(){
       echo get_sf_questions();
   }
}