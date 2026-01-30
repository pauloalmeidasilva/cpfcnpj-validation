<?php
require __DIR__ . "/../vendor/autoload.php";

use Src\Cnpj;
use Src\Validator;
use Src\Formatter;

echo "<h3>CNPJ HTML Example</h3>";
echo "<pre>";

echo "Generating formatted CNPJ:\n";
$cnpj = Cnpj::generate();
echo "CNPJ: {$cnpj}\n";
echo "Formatted: " . Formatter::formatCnpj($cnpj) . "\n";
echo "Valid? " . (Validator::validate($cnpj) ? 'yes' : 'no') . "\n";

echo "\nGenerating unformatted CNPJ:\n";
$cnpj = Cnpj::generate(false);
echo "CNPJ (raw): {$cnpj}\n";
echo "Formatted: " . Formatter::formatCnpj($cnpj) . "\n";
echo "Valid? " . (Validator::validate($cnpj) ? 'yes' : 'no') . "\n";

echo "\nCheck known CNPJs:\n";
$tests = ['64.123.337/0001-79', '64.123.337/0002-79'];
foreach ($tests as $t) {
	echo "{$t} -> " . (Validator::validate($t) ? 'valid' : 'invalid') . "\n";
}

echo "</pre>";