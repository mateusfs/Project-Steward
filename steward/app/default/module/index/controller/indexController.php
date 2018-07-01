<?php
class indexController extends Security {

	public function index() {
		$sucesso = $this->getRequest('sucesso');
		$error = $this->getRequest('error');
		$aberto = $this->getRequest('aberto');
		$realizado = $this->getRequest('realizado');
		$busca = $this->getPost('busca');
		$prioridade = $this->getRequest('prioridade');

		if($aberto || $realizado){
			$status = ($aberto)?$aberto:$realizado;
			$tarefas = Tarefa::retrieveStatus($status);
		}else{
			$tarefas = Tarefa::retrieveAtivos();
		}

		if($busca){
			$tarefas = Tarefa::retrieveBusca($busca);
		}

		if($prioridade){
			$tarefas = Tarefa::retrievePrioridade($prioridade);
		}


		$prioridades = Prioridade::retrieveAll();

		$this->wee->prioridades = $prioridades;
		$this->wee->prioridade = $prioridade;
		$this->wee->tarefas = $tarefas;
		$this->wee->error = $error;
		$this->wee->aberto = $aberto;
		$this->wee->realizado = $realizado;
		$this->wee->sucesso = $sucesso;
		$this->wee->show('index');
	}

	public function  salvaPorcentagem(){
		$codigo = $this->getPost('codigo');
		$valor = $this->getPost('valor');

		$tarefa = Tarefa::retrieveByPk($codigo);
		if($tarefa){
			$tarefa->setPorcentagem($valor);
			$tarefa->save();
		}
	}

	public function realizado(){
		$justifica = $this->getPost('justifica');
		$codigo = $this->getPost('codigo');

		if($justifica == ""){
			$this->wee->redirect('index', "index/error/1");
		}

		$tarefa = Tarefa::retrieveByPk($codigo);
		if($tarefa){
			$tarefa->setJustificativa($justifica);
			$tarefa->setIdstatus(3);
			$tarefa->save();
		}
		$this->wee->redirect('index', 'index');
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