<?php
require "../vendor/autoload.php";

Use Src\Cnpj;

echo "<br><br>";
echo "==========================================================<br>";
echo "Generating formatted CNPJ<br>";
echo "==========================================================<br>";
$cnpj = Cnpj::generate();

var_dump($cnpj);
echo "<br>";
var_dump(Cnpj::validate($cnpj));

echo "<br><br>";
echo "==========================================================<br>";
echo "Generating unformatted CNPJ<br>";
echo "==========================================================<br>";
$cnpj = Cnpj::generate(false);

var_dump($cnpj);
echo "<br>";
var_dump(Cnpj::formate($cnpj));
echo "<br>";
var_dump(Cnpj::validate($cnpj));

echo "<br><br>";
echo "==========================================================<br>";
echo "CNPJ 64.123.337/0001-79<br>";
echo "==========================================================<br>";
var_dump(Cnpj::validate('64.123.337/0001-79'));

echo "<br><br>";
echo "==========================================================<br>";
echo "CNPJ 64.123.337/0002-79<br>";
echo "==========================================================<br>";
var_dump(Cnpj::validate('64.123.337/0002-79'));