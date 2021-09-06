<?php

	namespace Src;

	class Cnpj {

		/**
		 * Brazilian-portuguese: Este método é responsável por validar o CNPJ
		 * English: This method is responsible for validating the CNPJ
		 * 
		 * @param String cnpj
		 * @return Bollean
		 */
		public static function validate(string $cnpj): bool
		{
			// CNPJ score cleaning
			$cnpj = preg_replace('/\D/', '', $cnpj);

			// CNPJ Size Verification
			if(strlen($cnpj) < 14){
				return false;
			}

			// False Positive Verification
			if(self::invalidCnpj($cnpj)){
				return false;
			}

			// Obtaining cnpj for validation
			$cnpjValidacao = self::DVGenerate(substr($cnpj, 0, 12));
			$cnpjValidacao = self::DVGenerate($cnpjValidacao);

			// Validation
			return ($cnpj == $cnpjValidacao);
		}

		/**
		 * Brazilian-portuguese: Este método é responsável por gerar o dígito verificador
		 * English: This method is responsible for generating the check digit
		 * 
		 * @param String cnpj
		 * @return String
		 */
		private static function DVGenerate(string $cnpj): string
		{
			// auxiliary variables
			$multiplicator = 2;
			$amount = 0;

			// Check Digit Calculation
			for ($i = strlen($cnpj) - 1 ; $i >= 0; $i--) {
				if($multiplicator > 9){
					$multiplicator = 2;
				}
				$amount += $cnpj[$i] * $multiplicator++;
			}

			// Getting the check digit
			$DV = 11 - ($amount % 11);

			// Correction in specific cases
			$DV = $DV <= 9 ? $DV : 0;

			return $cnpj.$DV;
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
		private static function invalidCnpj(string $cnpj): bool
		{
			// Inserir CNPJs considerados falso-positivo neste array sem pontuação
			// Insert CNPJs considered false positive in this array without punctuation
			$arrayCnpj = ['00000000000000','11111111111111','22222222222222','33333333333333','44444444444444','55555555555555','66666666666666','77777777777777','88888888888888','99999999999999'];

			return in_array($cnpj, $arrayCnpj);
		}
	}