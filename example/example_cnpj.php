<?php
// Variáveis
$isDev = true;

// Exibe erros em ambiente de desenvolvimento
if($isDev){
	ini_set('display_errors', 1);
	ini_set('display_startup_erros', 1);
	error_reporting(E_ALL);
}

require "../vendor/autoload.php";

Use Src\Cnpj;

var_dump(Cnpj::validate('64.123.337/0001-79'));