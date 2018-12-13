<?php
function calculator($op,$n1,$n2){
    return eval("return $n1 $op $n2;");
}

echo calculator("+",1,2);
echo "\n";
echo calculator("*",3,5);
