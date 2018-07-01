<?php
	$conteudo = new CampoJanela("Administrador", $modulo, 'administrador/save', 950, 'adm.png');

	$br = new CampoBr();
	$sep = new CampoSeparador();

	$conteudo->setErrors($erros);

	/*
	 * Busca
	*/

	$divAdicionar = new CampoDiv("divAdicionar");
	$inputBusca = new CampoTexto("Busca", "busca", '', '', array("input" => array("size" => 40, 'onkeypress' => 'return verificaEnter(event)', 'autofocus' => 'autofocus')));
	$botaoBusca = new CampoButton("Filtrar", "filtrar", array("input" => array("onclick" => "executaFiltroPessoaAdm('tabelaDiv', 'administrador', 'tabelaAdm')")));

	$ajax = new CampoAjax('administrador/tabelaAdm', 'tabelaDiv');
	$campoDivFiltros = new CampoDiv("divFiltrosPessoaAdm");
	$campoDivFiltros->addConteudo($inputBusca->toHTML());
	$campoDivFiltros->addConteudo($botaoBusca->toHTML());
	$divAdicionar->addConteudo($campoDivFiltros->toHTML());
	$divAdicionar->addConteudo($br->toHTML());

	$conteudo->addConteudo($divAdicionar->toHTML());

	/*
	 * Tabela
	 */
	$atributos = array('div'=>array('class'=>'tabelaJCMSW'));
	$campoDiv = new CampoDiv('tabelaDiv', $atributos);


	$divBotoes = new CampoDiv("divBotoes", array("div" => array("class" => "right")));
	$divBotoes->addConteudo($br->toHTML());

	$conteudo->addConteudo($divBotoes->toHTML());
	$conteudo->addConteudo($br->toHTML());
	$conteudo->addConteudo($br->toHTML());
	$conteudo->addConteudo($campoDiv->toHTML());
	$conteudo->addConteudo($ajax->toHTML());
	$conteudo->toHTML();
?>
<script type="text/javascript">
function verificaEnter(e){
	if(e.which == 13){
		executaFiltroPessoaAdm('tabelaDiv', 'administrador', 'tabelaAdm');
		return false;
	}
}
</script>