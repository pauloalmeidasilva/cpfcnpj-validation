# cpfcnpj-validation

Biblioteca leve para validação, formatação e geração de CPF e CNPJ (pt-BR).

**Recursos principais**
- Validação de CPF e CNPJ via `Src\\Validator::validate(string): bool` (aceita entradas com ou sem pontuação).
- Geração de CPF e CNPJ via `Src\\Cpf::generate()` e `Src\\Cnpj::generate()`.
- Formatação e sanitização via `Src\\Formatter`.
- Exemplos em `example/` e testes com `phpunit` em `tests/`.

**Requisitos**
- PHP 8.0 ou superior
- Composer

**Instalação (usando Composer)**

```bash
composer require pauloalmeidasilva/cpfcnpj-validation
```

Ou, se estiver trabalhando com o repositório localmente:

```bash
composer install
```

## Uso rápido

- Validar CPF/CNPJ (aceita pontuação ou não):

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Src\Validator;

var_dump(Validator::validate('529.982.247-25')); // true
var_dump(Validator::validate('04252011000110')); // true (CNPJ sem pontuação)
```

- Gerar e validar (ex.: CPF):

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Src\Cpf;
use Src\Validator;

$cpf = Cpf::generate();            // formatado por padrão
$cpfRaw = Cpf::generate(false);    // sem formatação (apenas dígitos)

var_dump($cpf);
var_dump(Validator::validate($cpfRaw));
```

- Formatar / sanitizar com `Formatter`:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Src\Formatter;

echo Formatter::formatCpf('52998224725');    // 529.982.247-25
echo Formatter::formatCnpj('04252011000110'); // 04.252.011/0001-10
echo Formatter::sanitize('529.982.247-25');  // 52998224725
echo Formatter::autoFormat('04252011000110'); // 04.252.011/0001-10
```

## Referência da API

As classes públicas principais estão no namespace `Src`.

- `Src\Validator`
	- `public static function validate(string $value): bool` — valida CPF ou CNPJ, aceita entrada com pontuação ou não.

- `Src\Cpf`
	- `public static function validate(string $cpf): bool` — atalho para `Validator::validate` para CPFs.
	- `public static function generate(bool $formatting = true): string` — gera um CPF válido; retorna formatado por padrão (`xxx.xxx.xxx-xx`) quando `$formatting` for `true`.
	- Observação: métodos internos para geração de dígitos verificadores e formatação também existem (`formate`, `DVGenerate`), mas são privados/public estáticos conforme o uso.

- `Src\Cnpj`
	- `public static function validate(string $cnpj): bool` — atalho para `Validator::validate` para CNPJs.
	- `public static function generate(bool $formatting = true): string` — gera um CNPJ válido; retorna formatado por padrão (`xx.xxx.xxx/xxxx-xx`) quando `$formatting` for `true`.

- `Src\Formatter`
	- `public static function sanitize(string $value): string` — remove todos os caracteres não numéricos.
	- `public static function formatCpf(string $cpf): string` — formata CPF quando possível (11 dígitos), caso contrário retorna a entrada original.
	- `public static function formatCnpj(string $cnpj): string` — formata CNPJ quando possível (14 dígitos), caso contrário retorna a entrada original.
	- `public static function autoFormat(string $value): string` — escolhe CPF/CNPJ automaticamente com base no tamanho.
	- `public static function unformat(string $value): string` — alias para `sanitize`.

## Exemplos práticos

- Exemplo CLI para CPF (em `example/example_cpf_cli.php`):

```bash
php example/example_cpf_cli.php
```

- Exemplo HTML (simples) em `example/example_cpf_html.php` e `example/example_cnpj_html.php`.

## Executando testes

Os testes usam `phpunit` (já incluído como dependência no `vendor/` para este repositório).

```bash
./vendor/bin/phpunit --configuration phpunit.xml.dist
```

No Windows (se o binário estiver disponível em `vendor/bin`):

```powershell
vendor\bin\phpunit.bat --configuration phpunit.xml.dist
```

## Boas práticas

- Sempre sanitize entradas (use `Formatter::sanitize`) quando armazenar ou comparar CPFs/CNPJs.
- Para exibir ao usuário, utilize `Formatter::formatCpf` / `Formatter::formatCnpj`.
- Ao gerar dados para testes, use `Cpf::generate(false)` / `Cnpj::generate(false)` para obter a forma sem pontuação.

## Contribuindo

Pull requests são bem-vindos. Antes de enviar:

- Rode os testes com `phpunit`.
- Siga as convenções de codificação do projeto.

## Licença

Consulte o arquivo de licença no repositório.

