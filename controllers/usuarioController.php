<?php

class usuarioController extends controller{

	private $user;

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$dados = array();

		$this->loadTemplate('usuario/cadastro',$dados);
	}
}