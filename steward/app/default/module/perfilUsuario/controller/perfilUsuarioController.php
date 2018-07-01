
<?php
class perfilUsuarioController extends SecurityLogin {

	public function index() {
		$codigo = $this->getRequest('codigo');
		$error = $this->getRequest('error');
		$sucesso = $this->getRequest('sucesso');

		if($codigo){
			$usuario = Usuario::retrieveByPk($codigo);
			$tarefas = Tarefa::retrieveByUsuario($codigo);
			if(!$tarefas){
				$tarefas = new Tarefa();
			}
		}else{
			$usuario = new Usuario();
			$tarefas = new Tarefa();
		}

		$this->wee->sucesso = $sucesso;
		$this->wee->error = $error;
		$this->wee->tarefas = $tarefas;
		$this->wee->usuarioPerfil = $usuario;
		$this->wee->codigo = $codigo;
		$this->wee->show('index');
	}


	public function salvar(){
		$codigo = $this->getPost('codigo');
		$nome = $this->getPost('nome');
		$foto = $this->getFile('foto');
		$telefone = $this->getPost('telefone');
		$funcao = $this->getPost('funcao');
		$email = $this->getPost('email');
		$sexo = $this->getPost('sexo');
		$senha = $this->getPost('senha');
		$senhaAtual = $this->getPost('atual');
		$senhaNova = $this->getPost('nova');
		$administrador = $this->getPost('administrador');
		$grupo = $this->getPost('grupo');

		if(!$nome){
			$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/8');
		}
		if(!$email){
			$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/9');
		}

		if($senha || $senhaNova || $senhaAtual){
			if(SessaoUtils::sessionGet('USUARIO')){
				if($codigo == SessaoUtils::sessionGet('USUARIO')->getCodigo()){
					if(!$senha || !$senhaNova){
						$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/10');
					}
				}
			}
		}


		if($foto['name'] != ""){
			Parametros::salvaFoto($foto, 'usuario', 'perfilUsuario');
		}
		if($codigo){
			$usuario = Usuario::retrieveByPk($codigo);
		}else{
			$usuario = null;
		}

		if($usuario){
			if($senha && $codigo){
				if($senhaAtual != $usuario->getSenha()){
					$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/4');
				}

				if($senha == $senhaAtual){
					$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/5');
				}

				if($senha != $senhaNova){
					$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/6');
				}
			}

			if($nome && $telefone && $funcao && $email){
				$usuario->setNome($nome);
				$usuario->setTelefone($telefone);
				$usuario->setFuncao($funcao);
				if($foto['name']){
					$usuario->setFoto($foto['name']);
				}
				$usuario->setIdgrupo($grupo);
				$usuario->setAdministrador($administrador);
				$usuario->setEmail($email);
				$usuario->setSexo($sexo);
				if($senha){
					$usuario->setSenha($senha);
				}
				$usuario->save();

			}
		}else{

			if($senha != $senhaNova){
				$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/7');
			}
			$usuario = new Usuario();
			$usuario->setNome($nome);
			$usuario->setTelefone($telefone);
			$usuario->setFuncao($funcao);
			$usuario->setFoto($foto['name']);
			$usuario->setIdgrupo(($grupo)?$grupo:'0');
			$usuario->setAdministrador(($administrador)?$administrador:'N');
			$usuario->setSexo($sexo);
			$usuario->setEmail($email);
			$usuario->setSenha($senha);
			$usuario->save();

			$this->wee->redirect('login' , 'index/sucesso/novo');
		}

		$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/sucesso/1');
	}

	public function excluir(){
		$codigo = $this->getRequest('codigo');

		if(SessaoUtils::sessionGet('USUARIO')->getAdministrador()  == 'S'){
			$usuario = Usuario::retrieveByPk($codigo);
			if($usuario){
				$tarefa = Tarefa::retrieveByUsuario($usuario->getCodigo());
				if($tarefa){
					$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/11');
				}else{
					$usuario->delete();
				}
			}
		}else{
			$this->wee->redirect('perfilUsuario' , 'index/codigo/'.$codigo.'/error/3');
		}
		$this->wee->redirect('perfilUsuario' , 'index');
	}

	public function realizado(){
		$justifica = $this->getPost('justifica');
		$codigo = $this->getPost('codigo');

		if($justifica == ""){
			$this->wee->redirect('usuario', "index/error/1");
		}

		$tarefa = Tarefa::retrieveByPk($codigo);
		if($tarefa){
			$tarefa->setJustificativa($justifica);
			$tarefa->setIdstatus(3);
			$tarefa->save();
		}
		$this->wee->redirect('usuario', 'index');
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