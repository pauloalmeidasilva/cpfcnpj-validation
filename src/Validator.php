<?php

namespace Src;

    class Validator
    {
        public static function validate(string $value): bool
        {
            $clean = preg_replace('/\D/', '', $value);

            if (strlen($clean) === 11) {
                return self::validateCpf($clean);
            }

            if (strlen($clean) === 14) {
                return self::validateCnpj($clean);
            }

            return false;
        }

        private static function validateCpf(string $cpf): bool
        {
            if (strlen($cpf) !== 11) {
                return false;
            }

            $invalid = ['00000000000','11111111111','22222222222','33333333333','44444444444','55555555555','66666666666','77777777777','88888888888','99999999999'];
            if (in_array($cpf, $invalid, true)) {
                return false;
            }

            $base = substr($cpf, 0, 9);
            $base .= self::calcCpfDigit($base);
            $base .= self::calcCpfDigit($base);

            return $base === $cpf;
        }

        private static function calcCpfDigit(string $base): string
        {
            $length = strlen($base) + 1;
            $sum = 0;
            for ($i = 0; $i < strlen($base); $i++) {
                $sum += intval($base[$i]) * ($length - $i);
            }

            $dv = 11 - ($sum % 11);
            $dv = $dv <= 9 ? $dv : 0;

            return (string)$dv;
        }

        private static function validateCnpj(string $cnpj): bool
        {
            if (strlen($cnpj) !== 14) {
                return false;
            }

            $invalid = ['00000000000000','11111111111111','22222222222222','33333333333333','44444444444444','55555555555555','66666666666666','77777777777777','88888888888888','99999999999999'];
            if (in_array($cnpj, $invalid, true)) {
                return false;
            }

            $base = substr($cnpj, 0, 12);
            $base .= self::calcCnpjDigit($base);
            $base .= self::calcCnpjDigit($base);

            return $base === $cnpj;
        }

        private static function calcCnpjDigit(string $base): string
        {
            // Weights for CNPJ calculation (right-to-left algorithm adapted)
            $weights = [];
            $len = strlen($base);

            if ($len === 12) {
                $weights = [5,4,3,2,9,8,7,6,5,4,3,2];
            } else { // 13
                $weights = [6,5,4,3,2,9,8,7,6,5,4,3,2];
            }

            $sum = 0;
            for ($i = 0; $i < $len; $i++) {
                $sum += intval($base[$i]) * $weights[$i];
            }

            $remainder = $sum % 11;
            $dv = $remainder < 2 ? 0 : 11 - $remainder;

            return (string)$dv;
        }
    }
