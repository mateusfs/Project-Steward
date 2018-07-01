<?php
class tarefaController extends Security {

	public function index() {
		$sucesso = $this->getRequest('sucesso');
		$error = $this->getRequest('error');
		$aberto = $this->getRequest('aberto');
		$realizado = $this->getRequest('realizado');
		$busca = $this->getPost('busca');

		if($aberto || $realizado){
			$status = ($aberto)?$aberto:$realizado;
			$tarefas = Tarefa::retrieveStatus($status);
		}else{
			$tarefas = Tarefa::retrieveAtivos();
		}

		if($busca){
			$tarefas = Tarefa::retrieveBusca($busca);
		}

		$this->wee->tarefas = $tarefas;
		$this->wee->error = $error;
		$this->wee->aberto = $aberto;
		$this->wee->realizado = $realizado;
		$this->wee->sucesso = $sucesso;
		$this->wee->show('index');
	}

	public function novo() {
		$codigo = $this->getRequest('codigo');

		$tarefa = Tarefa::retrieveByPk($codigo);

		$this->wee->tarefa = $tarefa;
		$this->wee->codigo = $codigo;
		$this->wee->show('novo');
	}

	public function codigo(){
		$codigo = $this->getPost('codigo');
		$justifica = $this->getPost('justifica');

		$tarefa = Tarefa::retrieveByPk($codigo);
		if($tarefa){
			$tarefa->setJustificativa($justifica);
			$tarefa->setIdstatus(4);
			$tarefa->save();
		}

		$this->wee->redirect('index', 'index/sucesso/2');
	}

	public function realizado(){
		$justifica = $this->getPost('justifica');
		$codigo = $this->getPost('codigo');

		if($justifica == ""){
			$this->wee->redirect('tarefa', "index/error/1");
		}

		$tarefa = Tarefa::retrieveByPk($codigo);
		if($tarefa){
			$tarefa->setJustificativa($justifica);
			$tarefa->setIdstatus(3);
			$tarefa->save();
		}
		$this->wee->redirect('tarefa', 'index');
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

	public function salvar() {
		$codigo = $this->getPost('codigo');
		$apelido = $this->getPost('apelido');
		$texto = $this->getPost('texto');
		$idprioridade = $this->getPost('prioridade');
		$idusuario = $this->getPost('usuario');
		$dataInicial = $this->getPost('dataIncial');
		$dataFinal = $this->getPost('dataFinal');
		$idgrafico = $this->getPost('grafico');
		$idcliente = $this->getPost('cliente');

		if($codigo){
			$tarefa = Tarefa::retrieveByPk($codigo);
			$tarefa->setCodigo($codigo);
			$tarefa->setApelido($apelido);
			$tarefa->setTexto($texto);
			$tarefa->setIdprioridade($idprioridade);
			$tarefa->setIdcliente($idcliente);
			$tarefa->setIdusuario($idusuario);
			$tarefa->setIdgrafico($idgrafico);
			if($tarefa->getPorcentagem() < 90){
				$tarefa->setPorcentagem($tarefa->getPorcentagem()+10);
			}
			$tarefa->setIdStatus($tarefa->getIdStatus());
			$tarefa->setDataInicial($dataInicial);
			$tarefa->setDataFinal($dataFinal);
			$tarefa->save();

		}else{
			$tarefa = new Tarefa();
			$tarefa->setNome('USUARIO');
			$tarefa->setApelido($apelido);
			$tarefa->setTexto($texto);
			$tarefa->setIdprioridade($idprioridade);
			$tarefa->setIdcliente(($idcliente > 0)?$idcliente:"");
			$tarefa->setIdusuario(($idusuario > 0)?$idusuario:"");
			$tarefa->setPorcentagem(10);
			$tarefa->setIdgrafico($idgrafico);
			$tarefa->setDataInicial($dataInicial);
			$tarefa->setDataFinal($dataFinal);
			$tarefa->setIdStatus(2);
			$tarefa->save();

		}

		$this->wee->redirect('tarefa');
	}


	public function excluir(){
		$codigo = $this->getRequest('codigo');

		if($codigo){
			$tarefa = Tarefa::retrieveByPk($codigo);
			if($tarefa){
				$tarefa->delete();
			}
		}

		$this->wee->redirect('tarefa');
	}
}