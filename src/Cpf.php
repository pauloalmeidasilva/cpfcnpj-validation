<?php

	namespace Src;

	class Cpf {

		/**
		 * Brazilian-portuguese: Este método é responsável por validar o CPF
		 * English: This method is responsible for validating the CPF
		 * 
		 * @param String cpf
		 * @return Bollean
		 */
		public static function validate(string $cpf): bool
		{
			// CPF score cleaning
			$cpf = preg_replace('/\D/', '', $cpf);

			// CPF Size Verification
			if(strlen($cpf) < 11){
				return false;
			}

			// False Positive Verification
			if(self::invalidCpf($cpf)){
				return false;
			}

			// Obtaining CPF for validation
			$cpfValidacao = self::DVGenerate(substr($cpf, 0, 9));
			$cpfValidacao = self::DVGenerate($cpfValidacao);

			// Validation
			return ($cpf == $cpfValidacao);
		}

		/**
		 * Brazilian-portuguese: Este método é responsável por gerar o dígito verificador
		 * English: This method is responsible for generating the check digit
		 * 
		 * @param String cpf
		 * @return String
		 */
		private static function DVGenerate(string $cpf): string
		{
			// auxiliary variables
			$multiplicator = strlen($cpf) + 1;
			$amount = 0;

			// Check Digit Calculation
			for ($i=0; $i < strlen($cpf); $i++) { 
				$amount += $cpf[$i] * $multiplicator--;
			}

			// Getting the check digit
			$DV = 11 - ($amount % 11);

			// Correction in specific cases
			$DV = $DV <= 9 ? $DV : 0;

			return $cpf.$DV;
		}

		/**
		 * Brazilian-portuguese: Este método é responsável por verificar a existência de CPF inválido
		 * dentre o array de falsos-positivo
		 * English: This method is responsible for checking the existence of invalid CPF among the
		 * false-positive array
		 * 
		 * @param String cpf
		 * @return Bollean
		 */
		private static function invalidCpf(string $cpf): bool
		{
			// Inserir CPFs considerados falso-positivo neste array sem pontuação
			// Insert CPFs considered false positive in this array without punctuation
			$arrayCpf = ['00000000000','11111111111','22222222222','33333333333','44444444444','55555555555','66666666666','77777777777','88888888888','99999999999'];

			return in_array($cpf, $arrayCpf);
		}
	}