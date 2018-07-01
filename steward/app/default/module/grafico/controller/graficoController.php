<?php
class graficoController extends Security {

	public function index() {

		$graficos = Grafico::retrieveAtivos();
		$this->wee->graficos = $graficos;
		$this->wee->show('index');
	}


	public function gerar() {

		$grafico = $this->getPost('grafico');

		$this->wee->grafico = $grafico;
		$this->wee->show('mostra');
	}

	public function olap(){
		$this->wee->show('olap');
	}
}