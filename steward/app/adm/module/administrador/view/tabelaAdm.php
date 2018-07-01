<?php

//Listagem
$lista = new CampoLista();
$thead = array('Código', "Nome Pessoa","Codigo Cracha","Codigo Professor","Administrador");

$atributosHead = array(
		array('align' => 'center', 'width'=>80)
		, array('align' => 'center')
		, array('align'=>'center', 'width' => 60)
		, array('align'=>'center', 'width' => 60)
		, array('align'=>'center', 'width' => 60)
);

$lista->addTHead($thead, $atributosHead);

if (!empty($result)) {
	foreach($result as $admRow){
		$adm = $admRow->getAdministrador();
		if ($adm == "N"){
			$adm = "<a href='administrador/save/codigo/".$admRow->getCodigo()."' onclick='return window.confirm(\"".('Realmente deseja tornar essa pessoa Administradora?')."\")'><img alt='".('Adicionar')."' title='".('Adicionar')."'src='../web/img/icon/adm_delete.png' 'style='cursor:pointer' width='20'/></a>";
		}else{
			$adm = "<a href='administrador/save/codigo/".$admRow->getCodigo()."' onclick='return window.confirm(\"".('Deseja retirar essa pessoa de ser Administradora?')."\")'><img alt='".('Remover')."' title='".('Remover')."'src='../web/img/icon/adm_add.png' style='cursor:pointer' width='20'/></a>";
		}
		$lista->addTBody(array(
				$admRow->getCodigo()
				, $admRow->getNome()
				, $admRow->getCodigoPessoa()
				, $admRow->getCodigoProfessor()
				, $adm
		), array(
				array('align' => 'center', 'width' => 40)
				,array('align' => 'center', 'onclick' => 'checkOne('.$admRow->getCodigo().')', 'width'=>80)
				, array('align'=>'center', 'width' => 40)
				, array('align'=>'center', 'width' => 40)
				, array('align'=>'center', 'width' => 40)
		));
	}
}

//Monta Paginação

$lista->addPaginacao($pagina, $count, $this->pessoa.'/tabelaAdm', 'tabelaDiv');
$lista->toHTML();

