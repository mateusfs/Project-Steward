<?php
class Security extends BaseController {

	public function __construct(Wee $wee) {
		parent::__construct($wee);

		if(SessaoUtils::sessionGet('USUARIO') == null){
			$this->wee->redirect('login');
		}

	}

	public function index(){
	}
}