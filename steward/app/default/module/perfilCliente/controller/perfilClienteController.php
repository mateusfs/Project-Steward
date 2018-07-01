<?php
class perfilClienteController extends Security {

	public function index() {
		$codigo = $this->getRequest('codigo');
		$error = $this->getRequest('error');
		$sucesso = $this->getRequest('sucesso');
		if($codigo){
			$cliente = Cliente::retrieveByPk($codigo);
			$endereco = Endereco::retrieveByCliente($codigo);
			$tarefas = Tarefa::retrieveByCliente($codigo);
			$compras =  Compra::retrieveByCliente($codigo);
			if(!$endereco){
				$endereco = new Endereco();
			}
			if(!$tarefas){
				$tarefas = null;
			}
			if(!$compras){
				$compras = null;
			}
		}else{
			$cliente = new Cliente();
			$endereco = new Endereco();
			$tarefas = null;
			$compras = null;
		}

		$this->wee->sucesso = $sucesso;
		$this->wee->error = $error;
		$this->wee->tarefas = $tarefas;
		$this->wee->compras = $compras;
		$this->wee->endereco = $endereco;
		$this->wee->cliente = $cliente;
		$this->wee->show('index');
	}


	public function salvar(){
		$codigo = $this->getPost('codigo');
		$nome = $this->getPost('nome');
		$sexo = $this->getPost('sexo');
		$foto = $this->getFile('foto');
		$telefone = $this->getPost('telefone');
		$funcao = $this->getPost('funcao');
		$dataNascimento = $this->getPost('nascimento');
		$lingua = $this->getPost('lingua');
		$sistema = $this->getPost('sistema');
		$email = $this->getPost('email');
		$idestadoCivil = $this->getPost('estadoCivil');

		if($foto['name']){
			Parametros::salvaFoto($foto, 'cliente', 'perfilCliente');
		}

		$cliente = Cliente::retrieveByPk($codigo);

		if($cliente){
			$cliente->setNome($nome);
			$cliente->setSexo($sexo);
			$cliente->setTelefone($telefone);
			$cliente->setFuncao($funcao);
			if($foto['name']){
				$cliente->setFoto($foto['name']);
			}
			$cliente->setDataNascimento($dataNascimento);
			$cliente->setIdLingua($lingua);
			$cliente->setIdestadoCivil($idestadoCivil);
			$cliente->setEmail($email);
			$cliente->setIdsistema($sistema);
			$cliente->save();

		}else{
			$cliente = new Cliente();
			$cliente->setNome($nome);
			$cliente->setSexo($sexo);
			$cliente->setTelefone($telefone);
			$cliente->setFuncao($funcao);
			$cliente->setFoto($foto['name']);
			$cliente->setDataNascimento($dataNascimento);
			$cliente->setIdLingua($lingua);
			$cliente->setIdnota(3);
			$cliente->setIdestadoCivil($idestadoCivil);
			$cliente->setEmail($email);
			$cliente->setIdsistema($sistema);
			$cliente->saveInsert();
			$this->wee->redirect('cliente');
		}

		$this->wee->redirect('perfilCliente' , 'index/codigo/'.$codigo.'/sucesso/1');
	}


	public function salvarEndereco(){
		$codigo = $this->getPost('codigo');
		$idcliente = $this->getPost('idCliente');
		$bairro = $this->getPost('bairro');
		$cep = $this->getPost('cep');
		$numero = $this->getPost('numero');
		$complemento = $this->getPost('complemento');
		$cidade = $this->getPost('cidade');
		$estado = $this->getPost('estado');
		$rua = $this->getPost('rua');


		if($codigo){
			$endereco = Endereco::retrieveByPk($codigo);
			if($endereco){
				$endereco->setBairro($bairro);
				$endereco->setCep($cep);
				$endereco->setCidade($cidade);
				$endereco->setComplemento($complemento);
				$endereco->setEstado($estado);
				$endereco->setIdcliente($idcliente);
				$endereco->setNumero($numero);
				$endereco->setRua($rua);
				$endereco->save();
			}
		}else{
			$endereco = new Endereco();
			$endereco->setBairro($bairro);
			$endereco->setCep($cep);
			$endereco->setCidade($cidade);
			$endereco->setComplemento($complemento);
			$endereco->setEstado($estado);
			$endereco->setIdcliente($idcliente);
			$endereco->setNumero($numero);
			$endereco->setRua($rua);
			$endereco->save();
		}
		$this->wee->redirect('perfilCliente', 'index/codigo/'.$idcliente);
	}

	public function excluir(){
		$codigo = $this->getRequest('codigo');

		if(SessaoUtils::sessionGet('USUARIO')->getAdministrador()  === 'S'){
			$cliente = Cliente::retrieveByPk($codigo);

			if($cliente){
				$cliente->delete();
			}
		}else{
			$this->wee->redirect('perfilCliente' , 'index/codigo/'.$codigo.'/error/3');
		}
		$this->wee->redirect('cliente');
	}

	public function realizado(){
		$justifica = $this->getPost('justifica');
		$codigo = $this->getPost('codigo');

		if($justifica == ""){
			$this->wee->redirect('cliente', "index/error/1");
		}

		$tarefa = Tarefa::retrieveByPk($codigo);
		if($tarefa){
			$tarefa->setJustificativa($justifica);
			$tarefa->setIdstatus(3);
			$tarefa->save();
		}
		$this->wee->redirect('cliente', 'index');
	}

	public function ignorar(){
		$codigo = $this->getRequest('codigo');

		$tarefa = Tarefa::retrieveByPk($codigo);
		if($tarefa){
			$tarefa->setIdstatus(0);
			$tarefa->save();
		}
		$this->wee->redirect('index', 'index');
	}
}