<?php
// aes
$plaintext = "Hello World";
$key = "this is a key";
$iv = "this is a iv    ";

$encrypt_text = openssl_encrypt($plaintext,"AES-128-CBC",$key,0,$iv);
echo $encrypt_text,"\n";
echo openssl_decrypt($encrypt_text,"AES-128-CBC",$key,0,$iv);



