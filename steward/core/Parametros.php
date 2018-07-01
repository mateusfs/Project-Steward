<?php
class Parametros{

	public static function salvaFoto($foto, $pasta, $controller) {
		$extensoes = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $foto["name"]);
		$extensao = end($temp);
		if(in_array($extensao, $extensoes)){
			if (file_exists("..web/img/fotos/".$pasta."/" . $foto["name"])) {
				$this->wee->redirect($controller ,'index/codigo/'.$codigo.'/error/1');
			}else{
				move_uploaded_file($foto["tmp_name"], "web/files/".$pasta."/".$foto["name"]);
			}
		}else{
			$this->wee->redirect($controller , 'index/codigo/'.$codigo.'/error/2');
		}
	}

	public function trazEstados(){
		return array("AC"=>"Acre", 
							"AL"=>"Alagoas", 
							"AM"=>"Amazonas", 
							"AP"=>"Amapá",
							"BA"=>"Bahia",
							"CE"=>"Ceará",
							"DF"=>"Distrito Federal",
							"ES"=>"Espírito Santo",
							"GO"=>"Goiás","MA"=>"Maranhão",
							"MT"=>"Mato Grosso",
							"MS"=>"Mato Grosso do Sul",
							"MG"=>"Minas Gerais",
							"PA"=>"Pará",
							"PB"=>"Paraíba",
							"PR"=>"Paraná",
							"PE"=>"Pernambuco",
							"PI"=>"Piauí",
							"RJ"=>"Rio de Janeiro",
							"RN"=>"Rio Grande do Norte",
							"RO"=>"Rondônia",
							"RS"=>"Rio Grande do Sul",
							"RR"=>"Roraima",
							"SC"=>"Santa Catarina",
							"SE"=>"Sergipe",
							"SP"=>"São Paulo",
							"TO"=>"Tocantins");
	}	


}