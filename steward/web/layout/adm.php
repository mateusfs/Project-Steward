<?php

$__settings = $this->getConfig($this->getApp());

$__arrHEAD = $__settings['head'];
$__arrCss  = $__settings['css'];
$__arrJS   = $__settings['javascript'];



$__title 		= $__arrHEAD['title'];
$__description 	= $__arrHEAD['description'];
$__keywords 	= $__arrHEAD['keywords'];



$__htmlCSS = "";
foreach ($__arrCss as $__cssFile) {
	$__htmlCSS.= "<link href='../".$__cssFile."' type='text/css' rel='stylesheet'>\n";
}


$__htmlJS = "";
foreach ($__arrJS as $__jsFile) {
	$__htmlJS.= "<script src='../".$__jsFile."' type='text/javascript'></script>\n";
}

echo "<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='utf8'>
<meta name='robots' content='noindex,nofollow'/>
<meta http-equiv='X-UA-Compatible' content='IE=edge' />
<title>".$__title."</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta name='description' content='".$__description."'/>
<meta name='keywords' content='".$__keywords."'/>
<base href='".$this->getConfig(Wee::WWW_BASE).$this->getApp()."/'/>
<link rel='icon' href='../".$this->getConfig('favicon')."' type='image/x-icon'/>
".$__htmlCSS."
".$__htmlJS."
</head>
<body>
<div id='welcome_bar'>
	<div id='welcome_bar_exit'>
		<div id='botao_sair'><a href='login/logout' class='letra_negrito'>Sair</a></div>
	</div>
</div>
<div id='conteudo'>	
";
include ($path);
echo "			</div>
<div id='rodape'>
<div id='rodape_texto'>
<a href='http://steward.leveorganicos.com.br' target='_blank'>:: Steward - 2014 - Todos os direitos reservados</a> ::
</div>
</div>
";

$javascript = "
$(document).ready(function(){
init();
});
";
echo Funcoes::javascript($javascript);

echo "		</body>
</html>";