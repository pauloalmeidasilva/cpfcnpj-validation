<?php
require __DIR__ . "/../vendor/autoload.php";

use Src\Cpf;
use Src\Validator;
use Src\Formatter;

echo PHP_EOL . "=== CPF CLI Example ===" . PHP_EOL;

echo "\nGenerating formatted CPF:\n";
$cpf = Cpf::generate();
echo "CPF: {$cpf}\n";
echo "Formatted: " . Formatter::formatCpf($cpf) . "\n";
echo "Valid? " . (Validator::validate($cpf) ? 'yes' : 'no') . "\n";

echo "\nGenerating unformatted CPF:\n";
$cpf = Cpf::generate(false);
echo "CPF (raw): {$cpf}\n";
echo "Formatted: " . Formatter::formatCpf($cpf) . "\n";
echo "Valid? " . (Validator::validate($cpf) ? 'yes' : 'no') . "\n";

echo "\nCheck known CPFs:\n";
$tests = ['790.055.670-23', '790.055.670-29', '529.982.247-25'];
foreach ($tests as $t) {
	echo "{$t} -> " . (Validator::validate($t) ? 'valid' : 'invalid') . "\n";
}

