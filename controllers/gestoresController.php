<?php

class gestoresController extends Controller{

	public function index(){

		$dados = array();

		$this->loadTemplate('gestores/cadastro', $dados);
	}

	public function lista(){

		$dados = array();

		$gestor = new Gestores();
		$c = $gestor->getList();

		$dados['gestores'] = $c;

		$this->loadTemplate('gestores/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$NomeGes = addslashes($_POST['NomeGes']);
		$FoneGes = addslashes($_POST['FoneGes']);
		$CelularGes = addslashes($_POST['CelularGes']);
		$usuario = addslashes($_SESSION['login']);

		$gestores = new Gestores();

		if($c = $gestores->add($NomeGes, $FoneGes, $CelularGes, $usuario)){

			header("Location: ".BASE_URL.'gestores/lista');
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

		}else{
			header("Location: ".BASE_URL.'gestores/lista');
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Cadastrar!</h4>
                                                </div>';
		}
		
	}


	public function edit($id){
		$dados = array();

		$gesto = new Gestores();

		$dados['gestor'] = $gesto->getListId($id);

		$this->loadTemplate('gestores/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$id = $_POST['id'];
			$NomeGes = addslashes($_POST['NomeGes']);
			$FoneGes = addslashes($_POST['FoneGes']);
			$CelularGes = addslashes($_POST['CelularGes']);
			$usuario = addslashes($_SESSION['login']);
			$inativo = addslashes($_POST['inativo']);
			if ($inativo=="on") {
				$inativo = 1;
			} else {
				$inativo = 0;
			}

			$gestor = new Gestores();
			
			if ($c = $gestor->update($id, $NomeGes, $FoneGes, $CelularGes, $usuario, $inativo)){

				header("Location: ".BASE_URL.'gestores/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'gestores/listas');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($id){
		$dados = array();

		$gesto = new Gestores();

		if(isset($id) && !empty($id)){
			$c = $gesto->del($id);
		}
		
		if ($c = $gesto->del($id)){

				header("Location: ".BASE_URL.'gestores/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'gestores/lista');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$gestor = new Gestores();
			
			if ($c = $gestor->delete($id)){

				header("Location: ".BASE_URL.'gestores/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'gestores/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}



	public function editAjax(){
		$id = $_POST['id'];
		$ser = new Gestores();
		$c = $ser->getListId($id);
		echo $c;
	}



// Inicio  de funçoes de relatorios

	public function relgestores(){

		$this->loadTemplate('gestores/relgestores');
	}


	public function relfuncgesR($id){
		$dados = array();
		$dados['inati'] = $id;
		$this->loadView('gestores/relatorios/relGestorR', $dados);
	}

// Fim de funçoes de relatorios
	
}