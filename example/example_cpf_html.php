<?php
require "../vendor/autoload.php";

Use Src\Cpf;

echo "<br><br>";
echo "==========================================================<br>";
echo "Generating formatted CPF<br>";
echo "==========================================================<br>";
$cpf = Cpf::generate();

var_dump($cpf);
echo "<br>";
var_dump(cpf::validate($cpf));

echo "<br><br>";
echo "==========================================================<br>";
echo "Generating unformatted CPF<br>";
echo "==========================================================<br>";
$cpf = Cpf::generate(false);

var_dump($cpf);
echo "<br>";
var_dump(cpf::formate($cpf));
echo "<br>";
var_dump(cpf::validate($cpf));

echo "<br><br>";
echo "==========================================================<br>";
echo "CPF 790.055.670-23<br>";
echo "==========================================================<br>";
var_dump(Cpf::validate('790.055.670-23'));

echo "<br><br>";
echo "==========================================================<br>";
echo "CPF 790.055.670-29<br>";
echo "==========================================================<br>";
var_dump(Cpf::validate('790.055.670-29'));

