<?php

use PHPUnit\Framework\TestCase;
use Src\Formatter;

final class FormatterTest extends TestCase
{
    public function testSanitizeRemovesNonDigits(): void
    {
        $this->assertSame('52998224725', Formatter::sanitize('529.982.247-25'));
    }

    public function testFormatCpfReturnsFormattedWhenValid(): void
    {
        $this->assertSame('529.982.247-25', Formatter::formatCpf('52998224725'));
    }

    public function testFormatCpfReturnsOriginalWhenInvalid(): void
    {
        $orig = '1234';
        $this->assertSame($orig, Formatter::formatCpf($orig));
    }

    public function testFormatCnpjReturnsFormattedWhenValid(): void
    {
        $this->assertSame('04.252.011/0001-10', Formatter::formatCnpj('04252011000110'));
    }

    public function testAutoFormatDetectsCpfAndCnpj(): void
    {
        $this->assertSame('529.982.247-25', Formatter::autoFormat('52998224725'));
        $this->assertSame('04.252.011/0001-10', Formatter::autoFormat('04.252.011/0001-10'));
    }

    public function testUnformatEqualsSanitize(): void
    {
        $this->assertSame(Formatter::sanitize('04.252.011/0001-10'), Formatter::unformat('04.252.011/0001-10'));
    }
}
