<?php
require "../vendor/autoload.php";

Use Src\Cpf;

echo "\n\n";
echo "==========================================================\n";
echo "Generating formatted CPF\n";
echo "==========================================================\n";
$cpf = Cpf::generate();

var_dump($cpf);
var_dump(cpf::validate($cpf));

echo "\n\n";
echo "==========================================================\n";
echo "Generating unformatted CPF\n";
echo "==========================================================\n";
$cpf = Cpf::generate(false);

var_dump($cpf);
var_dump(cpf::formate($cpf));
var_dump(cpf::validate($cpf));

echo "\n\n";
echo "==========================================================\n";
echo "CPF 790.055.670-23\n";
echo "==========================================================\n";
var_dump(Cpf::validate('790.055.670-23'));

echo "\n\n";
echo "==========================================================\n";
echo "CPF 790.055.670-29\n";
echo "==========================================================\n";
var_dump(Cpf::validate('790.055.670-29'));

