# Validador de CPF e CNPJ

Este validador foi criado para uso próprio, mas devido a sua grande nacessidade em aplicações resolvi disponibilizá-lo gratuitamente. O mais interessante é que a biblioteca é simples, leve (2,3MB com os arquivos de exemplo) e direto ao ponto.

## Instalação
Para baixar é fácil, basta copiar o comando abaixo e utilizálo no terminal:

* Baixe o repositório via Composer
```
composer require pauloalmeidasilva/cpfcnpj-validation
```
## Utilização

* Para CPF 
```
<?php
require "../vendor/autoload.php";

Use Src\Cpf;

var_dump(Cpf::validate('986.454.880-86'));

```

* Para CNPJ
```
<?php
require "../vendor/autoload.php";

Use Src\Cnpj;

var_dump(Cnpj::validate('64.123.337/0001-79'));

```

Ele retornará **TRUE** caso seja válido ou **FALSE** caso seja inválido.

Espero que seja de bom uso para todos!!!