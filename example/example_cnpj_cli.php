<?php
require "../vendor/autoload.php";

Use Src\Cnpj;

echo "\n\n";
echo "==========================================================\n";
echo "Generating formatted CNPJ\n";
echo "==========================================================\n";
$cnpj = Cnpj::generate();

var_dump($cnpj);
var_dump(Cnpj::validate($cnpj));

echo "\n\n";
echo "==========================================================\n";
echo "Generating unformatted CNPJ\n";
echo "==========================================================\n";
$cnpj = Cnpj::generate(false);

var_dump($cnpj);
var_dump(Cnpj::formate($cnpj));
var_dump(Cnpj::validate($cnpj));

echo "\n\n";
echo "==========================================================\n";
echo "CNPJ 64.123.337/0001-79\n";
echo "==========================================================\n";
var_dump(Cnpj::validate('64.123.337/0001-79'));

echo "\n\n";
echo "==========================================================\n";
echo "CNPJ 64.123.337/0002-79\n";
echo "==========================================================\n";
var_dump(Cnpj::validate('64.123.337/0002-79'));