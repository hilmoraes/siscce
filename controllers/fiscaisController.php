<?php

class fiscaisController extends Controller{

	public function index(){

		$dados = array();

		$this->loadTemplate('fiscais/cadastro', $dados);
	}

	public function lista(){

		$dados = array();

		$fiscal = new Fiscais();
		$c = $fiscal->getList();

		$dados['fiscais'] = $c;

		$this->loadTemplate('fiscais/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$NomeFis = addslashes($_POST['NomeFis']);
		$FoneFis = addslashes($_POST['FoneFis']);
		$CelularFis = addslashes($_POST['CelularFis']);
		$usuario = addslashes($_SESSION['login']);

		$fiscais = new Fiscais();

		if($c = $fiscais->add($NomeFis, $FoneFis, $CelularFis, $usuario)){

			header("Location: ".BASE_URL.'fiscais/lista');
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

		}else{
			header("Location: ".BASE_URL.'fiscais/lista');
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Cadastrar!</h4>
                                                </div>';
		}
		
	}


	public function edit($id){
		$dados = array();

		$fisca = new Fiscais();

		$dados['fiscal'] = $fisca->getListId($id);

		$this->loadTemplate('fiscais/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$id = $_POST['id'];
			$NomeFis = addslashes($_POST['NomeFis']);
			$FoneFis = addslashes($_POST['FoneFis']);
			$CelularFis = addslashes($_POST['CelularFis']);
			$usuario = addslashes($_SESSION['login']);
			$inativo = addslashes($_POST['inativo']);
			if ($inativo=="on") {
				$inativo = 1;
			} else {
				$inativo = 0;
			}

			$fiscal = new Fiscais();
			
			if ($c = $fiscal->update($id, $NomeFis, $FoneFis, $CelularFis, $usuario, $inativo)){

				header("Location: ".BASE_URL.'fiscais/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'fiscais/listas');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($id){
		$dados = array();

		$fisca = new Fiscais();

		if(isset($id) && !empty($id)){
			$c = $fisca->del($id);
		}
		
		if ($c = $fisca->del($id)){

				header("Location: ".BASE_URL.'fiscais/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'fiscais/lista');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$fiscal = new Fiscais();
			
			if ($c = $fiscal->delete($id)){

				header("Location: ".BASE_URL.'fiscais/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'fiscais/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}



	public function editAjax(){
		$id = $_POST['id'];
		$ser = new Fiscais();
		$c = $ser->getListId($id);
		echo $c;
	}



// Inicio  de funçoes de relatorios

	public function relfiscais(){

		$this->loadTemplate('fiscais/relfiscais');
	}


	public function relfuncfisR($id){
		$dados = array();
		$dados['inati'] = $id;
		$this->loadView('fiscais/relatorios/relFiscalR', $dados);
	}

// Fim de funçoes de relatorios
	
}