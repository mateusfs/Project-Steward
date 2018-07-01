<?php

/**
 * Modelo Tarefa que estende de BaseTarefa
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-05-23 02:08:25
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseTarefa
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Tarefa extends BaseTarefa {

	public static function retrieveAll() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "SELECT * FROM  tarefa" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}



	public static function retrieveStatus($status) {

		$sqlParam = array();
		$sqlParam[':STATUS'] = $status;

		$whereSql = "";

		if($status == 1){
			$count = $status +1;
			$whereSql .= "OR idstatus = $count";
		}

		$db = Database::getInstance();
		$sql = "SELECT * FROM  tarefa WHERE idstatus = :STATUS $whereSql" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrievePrioridade($codigo) {

		$sqlParam = array();
		$sqlParam[':PRIORIDADE'] = $codigo;

		$db = Database::getInstance();
		$sql = "SELECT * FROM  tarefa WHERE idPrioridade = :PRIORIDADE AND idStatus > 0 AND idStatus <= 2" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveBusca($busca) {

		$sqlParam = array();
		$sqlParam[':BUSCA'] = "%".$busca."%";

		$db = Database::getInstance();
		$sql = "SELECT * FROM
					tarefa
				WHERE
					UPPER(nome) LIKE UPPER(:BUSCA)
				OR
					UPPER(apelido) LIKE UPPER(:BUSCA)
				OR
					UPPER(texto) LIKE UPPER(:BUSCA)
				OR
					UPPER(justificativa) LIKE UPPER(:BUSCA)";

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function countPrioridadeBySistema($prioridade, $sistema) {

		$sqlParam = array();
		$sqlParam[':PRIORIDADE'] = $prioridade;
		$sqlParam[':SISTEMA'] = $sistema;

		$db = Database::getInstance();
		$sql = "SELECT count(t.codigo) as count FROM tarefa t
				INNER JOIN cliente c
				ON t.idCliente = c.codigo
				INNER JOIN sistema s
				ON s.codigo = c.idSistema
				WHERE t.idPrioridade = :PRIORIDADE
				AND s.codigo = :SISTEMA" ;

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				return $result['count'];
			}

		} catch (PDOException $e) {
			echo "<pre>";var_dump($e);die("</pre>");
			throw new PDOException($e->getMessage());
		}
	}

	public static function countMes($mes) {

		$proximo = $mes+1;
		$sqlParam = array();
		$sqlParam[':DATA'] = date('Y').'-'.$mes.'-'.date('d');
		$sqlParam[':PROXIMO'] = date('Y').'-'.$proximo.'-'.date('d');
		$db = Database::getInstance();
		$sql = "SELECT count(data_inicial) as data FROM tarefa WHERE data_inicial > :DATA AND data_inicial < :PROXIMO " ;

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				return $result['data'];
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveAtivos() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "
				SELECT
					t.*
				FROM
					tarefa t
				INNER JOIN
					cliente c
				ON
					t.idusuario = c.codigo
				INNER JOIN
					sistema s
				ON
					c.idsistema = s.codigo
				INNER JOIN
					empresa e
				ON
					e.codigo = s.idempresa
				WHERE
					e.idstatus = 1
				AND
					s.idstatus = 1
				AND
					t.idstatus < 3
				AND
					t.idstatus >= 1
				"
		;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveByEmpresa($codigo) {

		$sqlParam = array();
		$sqlParam[':EMPRESA'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT
					t.*
				FROM
					tarefa t
				INNER JOIN
					cliente c
				ON
					t.idusuario = c.codigo
				INNER JOIN
					sistema s
				ON
					c.idsistema = s.codigo
				INNER JOIN
					empresa e
				ON
					e.codigo = s.idempresa
				WHERE
					e.codigo = :EMPRESA" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveByUsuario($codigo) {

		$sqlParam = array();
		$sqlParam[':idusuario'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM  tarefa WHERE idusuario = :idusuario AND idStatus <= 2 AND idStatus >= 1" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveTarefaNome($nome, $idUsuario) {

		$sqlParam = array();
		$sqlParam[':nome'] = $nome;
		$sqlParam[':idUsuario'] = $idUsuario;

		$db = Database::getInstance();
		$sql = "SELECT * FROM  tarefa WHERE nome = :nome AND idUsuario = :idUsuario" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveByCliente($codigo) {

		$sqlParam = array();
		$sqlParam[':idcliente'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM  tarefa WHERE idcliente = :idcliente AND idStatus <= 2 AND idStatus >= 1" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Tarefa();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}



	public static function retrieveByUsuarioCliente($idCliente, $idUsuario){

		$sqlParam = array();
		$sqlParam[':idCliente'] = $idCliente;
		$sqlParam[':idUsuario'] = $idUsuario;


		$db = Database::getInstance();
		$sql = "SELECT * FROM tarefa WHERE idCliente = :idCliente AND idUsuario = :idUsuario " ;

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Tarefa();
				$obj->hydrate($result);

				return $obj;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function criaTarefaEndereco() {
		$enderecos = Endereco::retrieveAll();
		if(is_array($enderecos)){
			foreach ($enderecos as $endereco) {
				if($endereco->getBairro() == null || $endereco->getCep() == null || $endereco->getCidade() == null || $endereco->getEstado()== null || $endereco->getNumero()== null || $endereco->getRua()== null){
					$mensagem = Mensagem::retrieveByNome('ENDERECO');
					$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();
					$cliente = Cliente::retrieveByPk($endereco->getIdcliente());
					$tarefaUsuario = Tarefa::retrieveByUsuarioCliente($cliente->getCodigo(), $idUsuario);
					$tarefaCliente = Tarefa::retrieveByCliente($cliente->getCodigo());
					if($tarefaUsuario == NULL && $tarefaCliente == NULL){
						$tarefa = new Tarefa();
						$tarefa->setIdcliente($endereco->getIdcliente());
						$tarefa->setIdusuario($idUsuario);
						$tarefa->setIdprioridade(rand(1, 2));
						$tarefa->setNome('ENDERECO');
						$tarefa->setApelido('Endereço Incompleto');
						$tarefa->setTexto('Por favor verifique o endereço do cliente '.$cliente->getNome().', o mesmo se encontra incompleto. '.$mensagem->getTexto());
						$tarefa->setPorcentagem(rand(1,10));
						$tarefa->setDataInicial(date('Y-m-d'));
						$dia = date('d');
						$mes = date('m') + 3;
						$ano = date('Y');
						$tarefa->setDataFinal($ano."-".$mes."-".$dia);
						$tarefa->setIdstatus(1);
						$tarefa->save();
					}
				}
			}
		}
	}


	public static function criaTarefaCliente() {
		$clientes = Cliente::retrieveAll();
		if(is_array($clientes)){
			foreach ($clientes as $cliente) {
				if($cliente->getEmail() == null || $cliente->getTelefone() == null || $cliente->getFuncao() == null){
					$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();
					$tarefaUsuario = Tarefa::retrieveByUsuarioCliente($cliente->getCodigo(), $idUsuario);
					$tarefaCliente = Tarefa::retrieveByCliente($cliente->getCodigo());
					if($tarefaUsuario == NULL && $tarefaCliente == NULL){
						$tarefa = new Tarefa();
						$mensagem = Mensagem::retrieveByNome('CLIENTE');
						$tarefa->setIdCliente($cliente->getCodigo());
						$tarefa->setIdUsuario($idUsuario);
						$tarefa->setIdprioridade(rand(1, 2));
						$tarefa->setNome('CLIENTE');
						$tarefa->setApelido('Cadastro Incompleto');
						$tarefa->setTexto('Por favor verifique o cadastro do cliente'.$cliente->getNome().', o mesmo se encontra incompleto.'.$mensagem->getTexto());
						$tarefa->setPorcentagem(rand(1,10));
						$tarefa->setIdstatus(1);
						$tarefa->setDataInicial(date('Y-m-d'));
						$dia = date('d');
						$mes = date('m') + 3;
						$ano = date('Y');
						$tarefa->setDataFinal($ano."-".$mes."-".$dia);
						$tarefa->save();
					}
				}
			}
		}

	}


	public static function criaTarefaUsuario() {
		$usuarios = Usuario::retrieveAll();
		if(is_array($usuarios)){
			foreach ($usuarios as $usuario) {
				if($usuario->getEmail() == null || $usuario->getTelefone() == null || $usuario->getFuncao() == null){
					$mensagem = Mensagem::retrieveByNome('USUARIO');
					$tarefa = Tarefa::retrieveByUsuario($usuario->getCodigo());
					if($tarefa == NULL){
						$tarefa = new Tarefa();
						$tarefa->setIdUsuario($usuario->getCodigo());
						$tarefa->setIdprioridade(rand(1, 2));
						$tarefa->setNome('Cadastro Incompleto');
						$tarefa->setTexto('Por favor verifique o cadastro do usuario'.$usuario->getNome().', o mesmo se encontra incompleto.'.$mensagem->getTexto());
						$tarefa->setPorcentagem(rand(1,10));
						$tarefa->setIdstatus(1);
						$tarefa->setDataInicial(date('Y-m-d'));
						$dia = date('d');
						$mes = date('m') + 3;
						$ano = date('Y');
						$tarefa->setDataFinal($ano."-".$mes."-".$dia);
						$tarefa->save();
					}
				}
			}
		}
	}

	public static function criaTarefaRecomendacaoClientes() {
		require_once 'lib/OpenSlopeOne.php';
		$openslopeone = new OpenSlopeOne();
		$openslopeone->initSlopeOneTable('MySQL');

		$clientes = Cliente::retrieveAll();
		if(is_array($clientes)){
			foreach ($clientes as $cliente) {
				$recommendedUsers = $openslopeone->getRecommendedItemsByUser($cliente->getCodigo());
				if(count($recommendedUsers) > 2){
					$clienteTemp = Cliente::retrieveByPk($recommendedUsers[0]);
					if($clienteTemp->getCodigo()){
						$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();
						$tarefaProduto = Tarefa::retrieveTarefaNome('RECOMENDA', $idUsuario);
						if($tarefaProduto == NULL){
							$produto = Produto::retrieveByPk($recommendedUsers[1]);
							$categoria = Categoria::retrieveByPk($produto->getIdcategoria());
							$mensagem = Mensagem::retrieveByNome('RECOMENDA');
							$tarefa = new Tarefa();
							$tarefa->setIdUsuario($idUsuario);
							$tarefa->setIdcliente($clienteTemp->getCodigo());
							$tarefa->setIdprioridade(rand(3,4));
							$tarefa->setIdproduto($recommendedUsers[1]);
							$tarefa->setNome('RECOMENDA');
							$tarefa->setApelido('Recomendação de Produtos');
							$tarefa->setTexto('Recomendamos esse produto póis encontramos simililaridades nas compras. Recomende o produto '.$produto->getNome().' da categoria '.$categoria->getNome().' para o cliente '.$clienteTemp->getNome().'.'.$mensagem->getTexto());
							$tarefa->setPorcentagem(rand(1,10));
							$tarefa->setIdstatus(1);
							$tarefa->setDataInicial(date('Y-m-d'));
							$dia = date('d');
							$mes = date('m') + 3;
							$ano = date('Y');
							$tarefa->setDataFinal($ano."-".$mes."-".$dia);
							$tarefa->save();
						}
					}
				}
			}
		}
	}

	public static function criaTarefaSimilaridade() {
		require_once 'lib/OpenSlopeOne.php';
		$openslopeone = new OpenSlopeOne();
		$openslopeone->initSlopeOneTable('MySQL');

		$produtos = Produto::retrieveAll();
		if(is_array($produtos)){
			foreach ($produtos as $produto) {
				$recommendedItems = $openslopeone->getRecommendedItemsById($produto->getCodigo());
				if(count($recommendedItems) > 2){
					$idUsuario =SessaoUtils::sessionGet('USUARIO')->getCodigo();
					$tarefaSimilaridade = Tarefa::retrieveTarefaNome('SIMILARIDADE', $idUsuario);
					if($tarefaSimilaridade == NULL){
						$produtoTemp1 = Produto::retrieveByPk($recommendedItems[0]);
						$produtoTemp2 = Produto::retrieveByPk($recommendedItems[1]);
						$mensagem = Mensagem::retrieveByNome('SIMILARIDADE');
						$tarefa = new Tarefa();
						$tarefa->setIdUsuario($idUsuario);
						$tarefa->setIdprioridade(rand(4,5));
						$tarefa->setNome('SIMILARIDADE');
						$tarefa->setApelido('Similaridade');
						$tarefa->setTexto('Encontramos uma similaridade entre os produtos '.$produtoTemp1->getNome().'e o produto '.$produtoTemp2->getNome().'. '.$mensagem->getTexto());
						$tarefa->setPorcentagem(rand(1,10));
						$tarefa->setIdstatus(1);
						$tarefa->setDataInicial(date('Y-m-d'));
						$dia = date('d');
						$mes = date('m') + 3;
						$ano = date('Y');
						$tarefa->setDataFinal($ano."-".$mes."-".$dia);
						$tarefa->save();
					}
				}
			}
		}
	}

	public static function criaTarefaCompras() {
		$compra = Compra::retrieveUltima();
		if($compra->getData() != NULL){
			$compra = explode('-', $compra->getData());
			$mes = date('m');
			$ano = date('Y');
			if($compra[0] == $ano && $compra[1] < $data){
				$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();
				$tarefaCompra = Tarefa::retrieveTarefaNome('COMPRA', $idUsuario);
				if($tarefaCompra == NULL){
					$mensagem = Mensagem::retrieveByNome('COMPRA');
					$tarefa = new Tarefa();
					$tarefa->setIdUsuario($idUsuario);
					$tarefa->setIdprioridade(rand(1,3));
					$tarefa->setNome('COMPRA');
					$tarefa->setApelido('Cadastre Compras');
					$tarefa->setTexto($mensagem->getTexto());
					$tarefa->setPorcentagem(rand(1,10));
					$tarefa->setIdstatus(1);
					$tarefa->setDataInicial(date('Y-m-d'));
					$dia = date('d');
					$mes = date('m') + 3;
					$ano = date('Y');
					$tarefa->setDataFinal($ano."-".$mes."-".$dia);
					$tarefa->save();
				}
			}
		}
	}

	public static function criaTarefaSistema() {
		$empresas = Empresa::retrieveAll();
		if(is_array($empresas)){
			foreach ($empresas as $empresa) {
				$sistemas = Sistema::retrieveByEmpresa($empresa->getCodigo());
				$verificaSistemas = array();
				foreach ($sistemas as $sistema) {
					if($sistema->getIdStatus() == 0){
						$verificaSistemas[] = $sistema->getIdStatus();
					}
				}

				if(count($sistemas) == count($verificaSistemas)){
					$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();

					$tarefaSistema = Tarefa::retrieveTarefaNome('SISTEMA', $idUsuario);
					if($tarefaSistema == NULL){
						$mensagem = Mensagem::retrieveByNome('SISTEMA');
						$tarefa = new Tarefa();
						$tarefa->setIdUsuario($idUsuario);
						$tarefa->setIdprioridade(rand(1,3));
						$tarefa->setNome('SISTEMA');
						$tarefa->setApelido('Verifique os Sistemas');
						$tarefa->setTexto($mensagem->getTexto());
						$tarefa->setPorcentagem(rand(1,10));
						$tarefa->setIdstatus(1);
						$tarefa->setDataInicial(date('Y-m-d'));
						$dia = date('d');
						$mes = date('m') + 3;
						$ano = date('Y');
						$tarefa->setDataFinal($ano."-".$mes."-".$dia);
						$tarefa->save();
					}
				}
			}
		}
	}

	public static function criaTarefaGraficoMeses() {
		$empresas = Empresa::retrieveAll();
		if(is_array($empresas)){
			foreach ($empresas as $empresa) {

				$janeiro = Tarefa::countMes(1);
				$fevereiro = Tarefa::countMes(2);
				$marco = Tarefa::countMes(3);
				$abril = Tarefa::countMes(4);
				$maio = Tarefa::countMes(5);
				$junho = Tarefa::countMes(6);
				$julho = Tarefa::countMes(7);
				$agosto = Tarefa::countMes(8);
				$setembro = Tarefa::countMes(9);
				$outubro = Tarefa::countMes(10);
				$novembro = Tarefa::countMes(11);
				$dezembro = Tarefa::countMes(12);

				if($janeiro === $fevereiro && $maio === $julho && $julho === $agosto && $setembro === $outubro && $novembro === $dezembro && $janeiro != 0 && $fevereiro != 0 && $maio != 0){
					$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();

					$tarefaGarfico = Tarefa::retrieveTarefaNome('GRAFICO_MENSAL', $idUsuario);
					if($tarefaGarfico == NULL){
						$mensagem = Mensagem::retrieveByNome('GRAFICO_MENSAL');
						$tarefa = new Tarefa();
						$tarefa->setIdUsuario($idUsuario);
						$tarefa->setIdprioridade(rand(1,3));
						$tarefa->setNome('GRAFICO_MENSAL');
						$tarefa->setApelido('Verifique o Grafico Meses');
						$tarefa->setTexto($mensagem->getTexto());
						$tarefa->setPorcentagem(rand(1,10));
						$tarefa->setIdgrafico(Grafico::retrieveByNome('GRAFICO_MENSAL')->getCodigo());
						$tarefa->setIdstatus(1);
						$tarefa->setDataInicial(date('Y-m-d'));
						$dia = date('d');
						$mes = date('m') + 3;
						$ano = date('Y');
						$tarefa->setDataFinal($ano."-".$mes."-".$dia);
						$tarefa->save();
					}
				}
			}
		}
	}

	public static function criaTarefaGraficoTarefas() {
		$empresas = Empresa::retrieveAll();
		if(is_array($empresas)){
			foreach ($empresas as $empresa) {
				$prioridades = Prioridade::retrieveAll();
				foreach ($prioridades as $prioridade){
					$sistemas = Sistema::retrieveByEmpresa($empresa->getCodigo());
					if(count($sistemas) > 1){
						for ($i = 1; $i < count($sistemas); $i++) {
							$meses[] = Tarefa::countPrioridadeBySistema($prioridade->getCodigo(),  $i);
						}
						$mesesUnique = $meses;

						if(count($meses) !== count($mesesUnique)){
							$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();

							$tarefa = Tarefa::retrieveTarefaNome('GRAFICO_TAREFA', $idUsuario);
							if($tarefa == NULL){
								$mensagem = Mensagem::retrieveByNome('GRAFICO_TAREFA');
								$tarefa = new Tarefa();
								$tarefa->setIdUsuario($idUsuario);
								$tarefa->setIdprioridade(rand(1,3));
								$tarefa->setNome('GRAFICO_TAREFA');
								$tarefa->setApelido('Verifique o Grafico Tarefas');
								$tarefa->setTexto($mensagem->getTexto());
								$tarefa->setPorcentagem(rand(1,10));
								$tarefa->setIdgrafico(Grafico::retrieveByNome('GRAFICO_TAREFA')->getCodigo());
								$tarefa->setIdstatus(1);
								$tarefa->setDataInicial(date('Y-m-d'));
								$dia = date('d');
								$mes = date('m') + 3;
								$ano = date('Y');
								$tarefa->setDataFinal($ano."-".$mes."-".$dia);
								$tarefa->save();
							}
						}
					}
				}
			}
		}
	}

	public static function criaTarefaGraficoProduto() {
		$empresas = Empresa::retrieveAll();
		if(is_array($empresas)){
			foreach ($empresas as $empresa) {
				$produtos = Produto::retrieveAtivos();
				foreach ($produtos as $produto){
					$janeiro = Produto::countMes($produto->getCodigo(), 1);
					$fevereiro = Produto::countMes($produto->getCodigo(), 2);
					$marco = Produto::countMes($produto->getCodigo(), 3);
					$abril = Produto::countMes($produto->getCodigo(), 4);
					$maio = Produto::countMes($produto->getCodigo(), 5);
					$junho = Produto::countMes($produto->getCodigo(), 6);
					$julho = Produto::countMes($produto->getCodigo(), 7);
					$agosto = Produto::countMes($produto->getCodigo(), 8);
					$setembro = Produto::countMes($produto->getCodigo(), 9);
					$outubro = Produto::countMes($produto->getCodigo(), 10);
					$novembro = Produto::countMes($produto->getCodigo(), 11);
					$dezembro = Produto::countMes($produto->getCodigo(), 12);

					if($janeiro === $fevereiro && $maio === $julho && $julho === $agosto && $setembro === $outubro && $novembro === $dezembro && $janeiro != 0 && $fevereiro != 0 && $maio != 0){

						$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();

						$tarefaProduto = Tarefa::retrieveTarefaNome('GRAFICO_PRODUTO', $idUsuario);
						if($tarefaProduto == NULL){
							$mensagem = Mensagem::retrieveByNome('GRAFICO_PRODUTO');
							$tarefa = new Tarefa();
							$tarefa->setIdUsuario($idUsuario);
							$tarefa->setIdprioridade(rand(1,3));
							$tarefa->setNome('GRAFICO_PRODUTO');
							$tarefa->setApelido('Verifique o Grafico Produtos');
							$tarefa->setTexto($mensagem->getTexto());
							$tarefa->setIdgrafico(Grafico::retrieveByNome('GRAFICO_PRODUTO')->getCodigo());
							$tarefa->setPorcentagem(rand(1,10));
							$tarefa->setIdstatus(1);
							$tarefa->setDataInicial(date('Y-m-d'));
							$dia = date('d');
							$mes = date('m') + 3;
							$ano = date('Y');
							$tarefa->setDataFinal($ano."-".$mes."-".$dia);
							$tarefa->save();
						}
					}
				}
			}
		}
	}

	public static function criaTarefaGrupoModulo() {
		$empresas = Empresa::retrieveAll();
		if(is_array($empresas)){
			foreach ($empresas as $empresa) {
				$grupos = Grupo::retrieveAll();
				foreach ($grupos as $grupo){
					$grupoModulo = GrupoModulo::RetrieveAllGrupo($grupo->getCodigo());
					foreach ($grupoModulo as $grupoTemp) {
						$arrayGrupo[] = $grupoTemp->getIdStatus();
					}

					$arrayGrupos = array_unique($arrayGrupo);
					if(count($arrayGrupos) == 1 && $arrayGrupos[0] == 0){

						$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();

						$tarefaProduto = Tarefa::retrieveTarefaNome('GRUPO_MODULO', $idUsuario);
						if($tarefaProduto == NULL){
							$mensagem = Mensagem::retrieveByNome('GRUPO_MODULO');
							$tarefa = new Tarefa();
							$tarefa->setIdUsuario($idUsuario);
							$tarefa->setIdprioridade(rand(1,2));
							$tarefa->setNome('GRUPO_MODULO');
							$tarefa->setApelido('Verifique o Grupo Modulo - '.$grupo->getNome());
							$tarefa->setTexto($mensagem->getTexto());
							$tarefa->setPorcentagem(rand(1,10));
							$tarefa->setIdstatus(1);
							$tarefa->setDataInicial(date('Y-m-d'));
							$dia = date('d');
							$mes = date('m') + 3;
							$ano = date('Y');
							$tarefa->setDataFinal($ano."-".$mes."-".$dia);
							$tarefa->save();
						}
					}
				}
			}
		}
	}

}