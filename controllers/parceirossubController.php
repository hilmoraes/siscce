<?php

class parceirossubController extends Controller{

	public function index(){

		$dados = array();

		$dados['id'] = $id;

		$this->loadTemplate('parceirossub/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$parceirosub = new Parceirossub();
		$c = $parceirosub->getList($id);

		$dados['parceirossub'] = $c;
		$dados['id'] = $id;
		$this->loadTemplate('parceirossub/listagem',$dados);
	}


	public function inserir($id){
		$dados = array();

		$reqs = new Parceirossub();

		$dados['parceiro'] = $reqs->getListId($id);
		$dados['ids'] = $id;

		$this->loadTemplate('parceirossub/cadastro',$dados);
	}



	public function add(){

		$dados = array();

		$CodPar = $_POST['id'];
		$NomeCon = addslashes($_POST['NomeCon']);
		$EmailCon = addslashes($_POST['EmailCon']);
		$FoneCon = addslashes($_POST['FoneCon']);
		$CelularCon = addslashes($_POST['CelularCon']);
		$CargoCon = addslashes($_POST['CargoCon']);
		$usuario = addslashes($_SESSION['login']);

		$parceirossub = new Parceirossub();

		if($c = $parceirossub->add($CodPar, $NomeCon, $EmailCon, $FoneCon, $CelularCon, $CargoCon, $usuario)){

			header("Location: ".BASE_URL.'parceirossub/lista/'.$CodPar);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'parceirossub/lista/'.$CodPar);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}



	public function excluir($cc,$id){
		$dados = array();

		$parceir = new Parceirossub();

		if(isset($id) && !empty($id)){
			$c = $parceir->del($id);
		}
		
		if ($c = $parceir->del($id)){

				header("Location: ".BASE_URL.'parceirossub/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'parceirossub/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$parceirosub = new Parceirossub();
			
			if ($c = $parceirosub->delete($id)){

				header("Location: ".BASE_URL.'parceirossub/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'parceirossub/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}

}