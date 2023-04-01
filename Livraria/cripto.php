<?php
$senha = "senacrs||devWeb||".$_GET['senha'];

$algarismo = "AES-256-CBC";
$chave = "senac@2127";
$iv = "Abc_De_fghijk_Lm";

$cript = openssl_encrypt($senha, $algarismo, $chave, OPENSSL_RAW_DATA, $iv);

$cript64 = base64_encode($cript);

echo $cript64."<br>";

$descript64 = base64_decode($cript64);
$descript = openssl_decrypt($descript64,$algarismo,$chave, OPENSSL_RAW_DATA, $iv);
echo $descript;


?>