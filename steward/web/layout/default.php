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
<title>".$__title."</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta http-equiv='X-UA-Compatible' content='IE=edge' />
<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
<meta name='description' content='".$__description."'/>
<meta name='keywords' content='".$__keywords."'/>
<base href='".$this->getConfig(Wee::WWW_BASE).$this->getApp()."/'/>
<link rel='shortcut icon' href='../".$this->getConfig('favicon')."' type='image/x-icon'/>
".$__htmlCSS."
".$__htmlJS."
</head>
";
$usuarioNovo = false;
if($this->getController() === 'perfilUsuario'){
	$usuarioNovo = true;
}
$usuarioIndex = SessaoUtils::sessionGet('USUARIO');
if($usuarioIndex){
	echo "<body class='metro'><div id='container'>";
	include 'header.php';
	include 'menu.php';
	echo "<div id='conteudo'>";
	include ($path);
	echo "</div>";
}else{
	if(!$usuarioNovo){
		echo "<body class='metro'>";
		include ($path);
	}
}
if($usuarioNovo && $usuarioIndex == NULL){
	echo "<body class='metro'><div id='container'>";
	include 'header.php';
	echo "<div id='conteudo' style='margin-left:25%'>";
	include ($path);
	echo "</div>";
}

$javascript ="
$(document).ready(function(){
init();
});
";
echo Funcoes::javascript($javascript);
echo "<div class='clearfooter'></div>";
if($usuarioIndex || $usuarioNovo){
	include 'footer.php';
}
echo "</div></body></html>";