<?php

class parceirosController extends Controller{

	public function index(){

		$dados = array();
		$this->loadTemplate('parceiros/cadastro', $dados);
	}

	public function lista(){

		$dados = array();

		$parceiro = new Parceiros();
		$c = $parceiro->getList();

		$dados['parceiros'] = $c;

		$this->loadTemplate('parceiros/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$NomePar = addslashes($_POST['NomePar']);
		$DtCadPar = addslashes($_POST['DtCadPar']);
		$Fone1Par = addslashes($_POST['Fone1Par']);
		$Fone2Par = addslashes($_POST['Fone2Par']);
		$EmailPar = addslashes($_POST['EmailPar']);
		$FJPar = addslashes($_POST['FJPar']);
		$inscricao = addslashes($_POST['inscricao']);
		$Obs = addslashes($_POST['Obs']);
		$usuario = addslashes($_SESSION['login']);
		$CodEmp = addslashes($_POST['CodEmp']);

		$parceiros = new Parceiros();

		if($c = $parceiros->add($NomePar, $DtCadPar, $Fone1Par, $Fone2Par, $EmailPar, $FJPar, $inscricao, $Obs, $usuario, $CodEmp)){

			header("Location: ".BASE_URL.'parceiros/lista');
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

		}else{
			header("Location: ".BASE_URL.'parceiros/lista');
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Cadastrar!</h4>
                                                </div>';
		}
		
	}


	public function edit($id){
		$dados = array();

		$for = new Parceiros();

		$dados['parceiro'] = $for->getListId($id);

		$this->loadTemplate('parceiros/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$id = $_POST['id'];
			$NomePar = addslashes($_POST['NomePar']);
			$DtCadPar = addslashes($_POST['DtCadPar']);
			$Fone1Par = addslashes($_POST['Fone1Par']);
			$Fone2Par = addslashes($_POST['Fone2Par']);
			$EmailPar = addslashes($_POST['EmailPar']);
			$FJPar = addslashes($_POST['FJPar']);
			$inscricao = addslashes($_POST['inscricao']);
			$Obs = addslashes($_POST['Obs']);
			$usuario = addslashes($_SESSION['login']);
			$CodEmp = addslashes($_POST['CodEmp']);
			$inativo = @addslashes($_POST['inativo']);
			if ($inativo=="on") {
				$inativo = 1;
			} else {
				$inativo = 0;
			}

			$parceiro = new Parceiros();
			
			if ($c = $parceiro->update($id, $NomePar, $DtCadPar, $Fone1Par, $Fone2Par, $EmailPar, $FJPar, $inscricao, $Obs, $usuario, $CodEmp, $inativo)){

				header("Location: ".BASE_URL.'parceiros/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'parceiros/listas');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($id){
		$dados = array();

		$parceir = new Parceiros();

		if(isset($id) && !empty($id)){
			$c = $parceir->del($id);
		}
		
		if ($c = $parceir->del($id)){

				header("Location: ".BASE_URL.'parceiros/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'parceiros/lista');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$parceiro = new Parceiros();
			
			if ($c = $parceiro->delete($id)){

				header("Location: ".BASE_URL.'parceiros/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'parceiros/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}



	public function editAjax(){
		$id = $_POST['id'];
		$for = new Parceiros();
		$c = $for->getListId($id);
		echo $c;
	}


// Inicio  de funçoes de relatorios

	public function relparceiros(){

		$dados = array();

		// $regiao = new Regioes();
		// $p = $regiao->getRegioes();
		// $dados['regioes'] = $p;

		$this->loadTemplate('parceiros/relparceiros',$dados);
	}


	public function relfuncparD($id){
		$dados = array();
		$dados['inati'] = $id;
		$this->loadView('parceiros/relatorios/relParceiroD', $dados);
	}

	public function relfuncparR($id){
		$dados = array();
		$dados['inati'] = $id;
		$this->loadView('parceiros/relatorios/relParceiroR', $dados);
	}

// Fim de funçoes de relatorios
	
}