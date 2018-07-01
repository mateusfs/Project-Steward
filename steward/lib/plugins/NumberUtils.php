<?php 

class NumberUtils{
	
	/*
	 * Formata o n�mero para duas casas decimais, separado por ponto
	 */
	public static function formatToEn($number){
		return number_format($number,2,'.','');
	}
	
	/*
	 * Formata do n�mero BR para salvar no BD
	 */
	public static function convertToDB($number){
		return str_replace(',','.',str_replace('.','',$number));		
	}
	
	/*
	 * Formata do n�mero do BD para formato BR
	 */
	public static function format($number){		
		return number_format($number,2,',','.');
	}
	
	/*
	 * Formata o n�mero apenas se for um float, se for inteiro, mant�m sem pontua��o
	 */
	public static function formatFloat($number){
		if(strstr($number,".") || strstr($number,",")){
			return number_format($number,2,',','.');
		}
		
		return $number;
	}
	
	
	/*
	 * Lan�a exce��o se for fora do range
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