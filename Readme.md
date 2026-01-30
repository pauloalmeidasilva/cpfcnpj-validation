# cpfcnpj-validation

Biblioteca leve para validação e geração de CPF e CNPJ (pt-BR).

**Recursos principais**
- Validação de CPF e CNPJ via `Src\\Validator::validate(string): bool` (aceita formatos com ou sem pontuação).
- Geração de CPF e CNPJ via `Src\\Cpf::generate()` e `Src\\Cnpj::generate()`.
- Formatação e sanitização via `Src\\Formatter`.
- Exemplos prontos em `example/` e testes automatizados (`phpunit`).

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

Uso (exemplos rápidos)

- Validar CPF/CNPJ (aceita pontuação ou não):

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Src\\Validator;

var_dump(Validator::validate('529.982.247-25')); // true
var_dump(Validator::validate('04252011000110')); // true (CNPJ sem pontuação)
```

- Gerar e validar (ex.: CPF):

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Src\\Cpf;
use Src\\Validator;

$cpf = Cpf::generate();            // formatado por padrão
$cpfRaw = Cpf::generate(false);    // sem formatação

var_dump($cpf);
var_dump(Validator::validate($cpf));
```

- Formatar / sanitizar com `Formatter`:
