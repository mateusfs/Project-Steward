<?php
$PHPWord = new PHPWord();

$section = $PHPWord->createSection();

$styleTable = array('borderSize'=>6, 'borderColor'=>'4390df', 'cellMargin'=>80);
$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'4390df', 'bgColor'=>'4390df');

$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

$fontStyle = array('bold'=>true, 'align'=>'center');


$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
$section->addText("Steward");
$section->addText("Sistema de Gerenciamento de Tarefas");
$section->addText("");
$section->addText("Steward “Sistema de Gerenciamento de Tarefas”, o projeto tem como objetivo criar tarefas para os usuários do sistema. A Tarefa por sua vez pode ser um objetivo, notificação, melhoria, adaptação. Tudo isso com o intuito de indicar e informar para os usuários do sistema quais são as suas prioridades, suas diferenças, seus melhores produtos, seus melhores clientes, analisando informações importantes. Podemos considerar que o Steward é um sistema gerencial de apoio a decisão.");
$section->addText("");

$section->addText("Empresas");

$table = $section->addTable('myOwnTableStyle');

$table->addRow();
$table->addCell(2000, $styleCell)->addText('Nome', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Status', $fontStyle);


$selecionados = Empresa::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(2000)->addText(utf8_decode($selecionado->getNome()));
	$table->addCell(2000)->addText(utf8_decode(Status::retrieveByPk($selecionado->getIdStatus())->getNome()));
}
$section->addText("");
$section->addText("Sistemas");
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Nome', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Status', $fontStyle);


$selecionados = Sistema::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(2000)->addText(utf8_decode($selecionado->getNome()));
	$table->addCell(2000)->addText(utf8_decode(Status::retrieveByPk($selecionado->getIdStatus())->getNome()));
}


$section->addText("");
$section->addText("Categorias");
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Nome', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Sistema', $fontStyle);


$selecionados = Categoria::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(2000)->addText(utf8_decode($selecionado->getNome()));
	$table->addCell(2000)->addText(utf8_decode(Sistema::retrieveByPk($selecionado->getIdSistema())->getNome()));
}


$section->addText("");
$section->addText("Produtos");
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(1000, $styleCell)->addText('Nome', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Valor', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Marca', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Modelo', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Categoria', $fontStyle);
$table->addCell(5000, $styleCell)->addText(utf8_decode('Descrição'), $fontStyle);



$selecionados = Produto::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(1000)->addText(utf8_decode($selecionado->getNome()));
	$table->addCell(1000)->addText(utf8_decode($selecionado->getValor()));
	$table->addCell(1000)->addText(utf8_decode($selecionado->getMarca()));
	$table->addCell(1000)->addText(utf8_decode($selecionado->getModelo()));
	$table->addCell(1000)->addText(utf8_decode(Categoria::retrieveByPk($selecionado->getIdcategoria())->getNome()));
	$table->addCell(5000)->addText(utf8_decode($selecionado->getDescricao()));
}

$section->addText("");
$section->addText("Compras");
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Codigo', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Cliente', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Data', $fontStyle);



$selecionados = Compra::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(2000)->addText(utf8_decode($selecionado->getCodigo()));
	$table->addCell(2000)->addText(utf8_decode(Cliente::retrieveByPk($selecionado->getIdcliente())->getNome()));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getData()));
}


$section->addText("");
$section->addText("Itens");
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Codigo', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Cliente', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Produto', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Valor', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Quantidade', $fontStyle);



$selecionados = Item::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(2000)->addText(utf8_decode($selecionado->getCodigo()));
	$table->addCell(2000)->addText(utf8_decode(Cliente::retrieveByPk(Compra::retrieveByPk($selecionado->getIdcompra())->getIdcliente())->getNome()));
	$table->addCell(2000)->addText(utf8_decode(Produto::retrieveByPk($selecionado->getIdproduto())->getNome()));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getValor()));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getQuantidade()));
}


$section->addText("");
$section->addText("Tarefas");
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(1000, $styleCell)->addText('Codigo', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Nome', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Porcentagem', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Cliente', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Usuario', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Prioridade', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Produto', $fontStyle);
$table->addCell(1000, $styleCell)->addText('Status', $fontStyle);
$table->addCell(5000, $styleCell)->addText('Justificativa', $fontStyle);



$selecionados = Tarefa::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(1000)->addText(utf8_decode($selecionado->getCodigo()));
	$table->addCell(1000)->addText(utf8_decode($selecionado->getNome()));
	$table->addCell(1000)->addText(utf8_decode($selecionado->getPorcentagem()));
	$table->addCell(1000)->addText(utf8_decode(($selecionado->getIdcliente())?Cliente::retrieveByPk($selecionado->getIdcliente())->getNome():"-"));
	$table->addCell(1000)->addText(utf8_decode(Usuario::retrieveByPk($selecionado->getIdusuario())->getNome()));
	$table->addCell(1000)->addText(utf8_decode(Prioridade::retrieveByPk($selecionado->getIdprioridade())->getNome()));
	$table->addCell(1000)->addText(utf8_decode(($selecionado->getIdproduto())?Produto::retrieveByPk($selecionado->getIdproduto())->getNome():"-"));
	$table->addCell(1000)->addText(utf8_decode(Status::retrieveByPk($selecionado->getIdstatus())->getNome()));
	$table->addCell(5000)->addText(utf8_decode(($selecionado->getJustificativa())?$selecionado->getJustificativa():"-"));
}


$section->addText("");
$section->addText("Clientes");
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Nome', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Email', $fontStyle);
$table->addCell(2000, $styleCell)->addText(utf8_decode('Função'), $fontStyle);
$table->addCell(2000, $styleCell)->addText('Data Nascimento', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Sexo', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Telefone', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Estado Civil', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Sistema', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Nota', $fontStyle);



$selecionados = Cliente::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(2000)->addText(utf8_decode($selecionado->getNome()));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getEmail()));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getFuncao()));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getDataNascimento()));
	$table->addCell(2000)->addText(utf8_decode(($selecionado->getSexo()== 'M')?"Masculino":"Femenino"));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getTelefone()));
	$table->addCell(2000)->addText(utf8_decode(EstadoCivil::retrieveByPk($selecionado->getIdEstadoCivil())->getNome()));
	$table->addCell(2000)->addText(utf8_decode(Sistema::retrieveByPk($selecionado->getIdSistema())->getNome()));
	$table->addCell(2000)->addText(utf8_decode(Nota::retrieveByPk($selecionado->getIdNota())->getNome()));
}



$section->addText("");
$section->addText("Usuarios");
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Nome', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Email', $fontStyle);
$table->addCell(2000, $styleCell)->addText(utf8_decode('Função'), $fontStyle);
$table->addCell(2000, $styleCell)->addText('Sexo', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Telefone', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Grupo', $fontStyle);



$selecionados = Usuario::retrieveAll();
foreach ($selecionados as $key => $selecionado) {
	$table->addRow();
	$table->addCell(2000)->addText(utf8_decode($selecionado->getNome()));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getEmail()));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getFuncao()));
	$table->addCell(2000)->addText(utf8_decode(($selecionado->getSexo()== 'M')?"Masculino":"Femenino"));
	$table->addCell(2000)->addText(utf8_decode($selecionado->getTelefone()));
	$table->addCell(2000)->addText(utf8_decode(Grupo::retrieveByPk($selecionado->getIdGrupo())->getNome()));
}




$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');

header('Content-type: application/docx');
header('Content-Disposition: attachment; filename="StewardDoc.docx"');

$objWriter->save('php://output');

header('Location: exportar/index.php');