# Validador de CPF e CNPJ

Este validador foi criado para uso próprio, mas devido a sua grande nacessidade em aplicações resolvi disponibilizá-lo gratuitamente.

Para utilizar é fácil, basta seguir os passos abaixo:

* Para CPF 
```
<?php
require "../vendor/autoload.php";

Use Src\Cpf;

var_dump(Cpf::validate('090.873.046-25'));

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