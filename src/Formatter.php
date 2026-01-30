<?php
declare(strict_types=1);

namespace Src;

    class Formatter
    {
        /**
         * Remove todos os caracteres não numéricos.
         * English: Remove all non-numeric characters.
         *
         * @param string $value
         * @return string
         */
        public static function sanitize(string $value): string
        {
            return preg_replace('/\D+/', '', $value) ?? '';
        }

        /**
         * Formata um CPF (xxx.xxx.xxx-xx). Se a entrada não tiver 11 dígitos, retorna a entrada original.
         * English: Format a CPF (xxx.xxx.xxx-xx). If input doesn't have 11 digits, returns original.
         *
         * @param string $cpf
         * @return string
         */
        public static function formatCpf(string $cpf): string
        {
            $s = self::sanitize($cpf);
            if (strlen($s) !== 11) {
                return $cpf;
            }

            return substr($s, 0, 3) . '.' . substr($s, 3, 3) . '.' . substr($s, 6, 3) . '-' . substr($s, 9, 2);
        }

        /**
         * Formata um CNPJ (xx.xxx.xxx/xxxx-xx). Se a entrada não tiver 14 dígitos, retorna a entrada original.
         * English: Format a CNPJ (xx.xxx.xxx/xxxx-xx). If input doesn't have 14 digits, returns original.
         *
         * @param string $cnpj
         * @return string
         */
        public static function formatCnpj(string $cnpj): string
        {
            $s = self::sanitize($cnpj);
            if (strlen($s) !== 14) {
                return $cnpj;
            }

            return substr($s, 0, 2) . '.' . substr($s, 2, 3) . '.' . substr($s, 5, 3) . '/' . substr($s, 8, 4) . '-' . substr($s, 12, 2);
        }

        /**
         * Tenta formatar automaticamente com base no tamanho (11 -> CPF, 14 -> CNPJ).
         * Se não for um CPF/CNPJ conhecido, retorna a entrada sanitized.
         * English: Auto-format based on length (11 -> CPF, 14 -> CNPJ). Otherwise returns sanitized value.
         *
         * @param string $value
         * @return string
         */
        public static function autoFormat(string $value): string
        {
            $s = self::sanitize($value);
            if (strlen($s) === 11) {
                return self::formatCpf($s);
            }

            if (strlen($s) === 14) {
                return self::formatCnpj($s);
            }

            return $s;
        }

        /**
         * Remove formatação (mesmo que sanitize, mantido por clareza de API).
         * English: Remove formatting (same as sanitize, kept for API clarity).
         *
         * @param string $value
         * @return string
         */
        public static function unformat(string $value): string
        {
            return self::sanitize($value);
        }
    }
