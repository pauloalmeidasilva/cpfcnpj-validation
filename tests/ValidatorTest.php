<?php

use PHPUnit\Framework\TestCase;
use Src\Validator;
use Src\Cpf;
use Src\Cnpj;

final class ValidatorTest extends TestCase
{
    public function testValidCpf(): void
    {
        $this->assertTrue(Validator::validate('529.982.247-25'));
    }

    public function testInvalidCpf(): void
    {
        $this->assertFalse(Validator::validate('111.111.111-11'));
    }

    public function testGenerateCpfIsValid(): void
    {
        $cpf = Cpf::generate();
        $this->assertTrue(Validator::validate($cpf));
    }

    public function testValidCnpj(): void
    {
        $this->assertTrue(Validator::validate('04.252.011/0001-10'));
    }

    public function testInvalidCnpj(): void
    {
        $this->assertFalse(Validator::validate('11.111.111/1111-11'));
    }

    public function testGenerateCnpjIsValid(): void
    {
        $cnpj = Cnpj::generate();
        $this->assertTrue(Validator::validate($cnpj));
    }
}
