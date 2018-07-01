<?php 

class NumberUtils{
	
	/*
	 * Formata o número para duas casas decimais, separado por ponto
	 */
	public static function formatToEn($number){
		return number_format($number,2,'.','');
	}
	
	/*
	 * Formata do número BR para salvar no BD
	 */
	public static function convertToDB($number){
		return str_replace(',','.',str_replace('.','',$number));		
	}
	
	/*
	 * Formata do número do BD para formato BR
	 */
	public static function format($number){		
		return number_format($number,2,',','.');
	}
	
	/*
	 * Formata o número apenas se for um float, se for inteiro, mantém sem pontuação
	 */
	public static function formatFloat($number){
		if(strstr($number,".") || strstr($number,",")){
			return number_format($number,2,',','.');
		}
		
		return $number;
	}
	
	
	/*
	 * Lança exceção se for fora do range
	 */
	public static function rangeValidator($numero, $rangeMinimo = '', $rangeMaximo = ''){
		if($rangeMinimo === ''){
			if($numero > $rangeMaximo){
				return false;
			}	
		}
		
		if($rangeMaximo === ''){
			if($numero < $rangeMinimo){
				return false;
			}
		}
		
		if($numero < $rangeMinimo || $numero > $rangeMaximo){
			return false;
		}
		
		return true;
	}
}

?>