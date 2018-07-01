<?php
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Steward - Sistema de Gerenciamento de Tarefas");

$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Empresas');
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nome');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Status');

for($i = 0; $i < 2; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Empresa::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode(Status::retrieveByPk($selecionado->getIdstatus())->getNome()));
}

//Sistemas

$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(1);
$objPHPExcel->getActiveSheet()->setTitle('Sistemas');

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nome');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Status');

for($i = 0; $i < 2; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Sistema::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode(Status::retrieveByPk($selecionado->getIdstatus())->getNome()));
}

//Categorias
$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(2);
$objPHPExcel->getActiveSheet()->setTitle('Categorias');

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nome');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Sistema');

for($i = 0; $i < 2; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Categoria::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode(Sistema::retrieveByPk($selecionado->getIdsistema())->getNome()));
}

//Produtos
$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(3);
$objPHPExcel->getActiveSheet()->setTitle('Produtos');

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nome');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Valor');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Marca');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Modelo');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Categoria');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', utf8_decode('Descrição'));

for($i = 0; $i < 6; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Produto::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode($selecionado->getValor()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i+2, utf8_decode($selecionado->getMarca()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $i+2, utf8_decode($selecionado->getModelo()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $i+2, utf8_decode(Categoria::retrieveByPk($selecionado->getIdcategoria())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $i+2, utf8_decode($selecionado->getDescricao()));
}


//Compras
$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(4);
$objPHPExcel->getActiveSheet()->setTitle('Compras');

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Codigo');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Cliente');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Data');

for($i = 0; $i < 3; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Compra::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getCodigo()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode(Cliente::retrieveByPk($selecionado->getIdcliente())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i+2, utf8_decode($selecionado->getData()));
}


//Item
$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(5);
$objPHPExcel->getActiveSheet()->setTitle('Itens');

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Codigo');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Cliente');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Produto');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Valor');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Quantidade');

for($i = 0; $i < 5; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Item::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getCodigo()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode(Cliente::retrieveByPk(Compra::retrieveByPk($selecionado->getIdcompra())->getIdcliente())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i+2, utf8_decode(Produto::retrieveByPk($selecionado->getIdproduto())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $i+2, utf8_decode($selecionado->getValor()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $i+2, utf8_decode($selecionado->getQuantidade()));
}



//Tarefa
$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(6);
$objPHPExcel->getActiveSheet()->setTitle('Tarefas');

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Codigo');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nome');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Porcentagem');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Cliente');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Prioridade');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Produto');
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Status');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Justificativa');

for($i = 0; $i < 9; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Tarefa::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getCodigo()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode($selecionado->getApelido()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i+2, utf8_decode($selecionado->getPorcentagem()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $i+2, utf8_decode(($selecionado->getIdcliente())?Cliente::retrieveByPk($selecionado->getIdcliente())->getNome():"-"));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $i+2, utf8_decode(Usuario::retrieveByPk($selecionado->getIdusuario())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $i+2, utf8_decode(Prioridade::retrieveByPk($selecionado->getIdprioridade())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $i+2, utf8_decode(($selecionado->getIdproduto())?Produto::retrieveByPk($selecionado->getIdproduto())->getNome():"-"));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $i+2, utf8_decode(Status::retrieveByPk($selecionado->getIdstatus())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, $i+2, utf8_decode(($selecionado->getJustificativa())?$selecionado->getJustificativa():"-"));
}


//Clientes
$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(7);
$objPHPExcel->getActiveSheet()->setTitle('Clientes');

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nome');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Email');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', utf8_decode('Função'));
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Data Nascimento');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Sexo');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Telefone');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Estado Civil');
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Sistema');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Nota');

for($i = 0; $i < 9; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Cliente::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode($selecionado->getEmail()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i+2, utf8_decode($selecionado->getFuncao()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $i+2, utf8_decode($selecionado->getDatanascimento()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $i+2, utf8_decode(($selecionado->getSexo()== 'M')?"Masculino":"Femenino"));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $i+2, utf8_decode($selecionado->getTelefone()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $i+2, utf8_decode(EstadoCivil::retrieveByPk($selecionado->getIdEstadoCivil())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $i+2, utf8_decode(Sistema::retrieveByPk($selecionado->getIdsistema())->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, $i+2, utf8_decode(Nota::retrieveByPk($selecionado->getIdNota())->getNome()));
}




//Usuarios
$objWorkSheet = $objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(8);
$objPHPExcel->getActiveSheet()->setTitle('Usuarios');

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nome');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Email');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', utf8_decode('Função'));
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Sexo');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Telefone');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Grupo');

for($i = 0; $i < 9; $i++){
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i,1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
}

$selecionados = Usuario::retrieveAll();
for($i = 0; $i < count($selecionados); $i++){
	$selecionado = $selecionados[$i];

	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2, utf8_decode($selecionado->getNome()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2, utf8_decode($selecionado->getEmail()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i+2, utf8_decode($selecionado->getFuncao()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $i+2, utf8_decode(($selecionado->getSexo()== 'M')?"Masculino":"Femenino"));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $i+2, utf8_decode($selecionado->getTelefone()));
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $i+2, utf8_decode(Grupo::retrieveByPk($selecionado->getIdGrupo())->getNome()));
}


$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="StewardExcel.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');


header('Location: exportar/index.php');