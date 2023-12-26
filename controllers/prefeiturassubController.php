<?php

class prefeiturassubController extends Controller{

	public function index(){

		$dados = array();

		$dados['id'] = $id;

		$this->loadTemplate('prefeiturassub/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$prefeiturasub = new Prefeiturassub();
		$c = $prefeiturasub->getList($id);

		$dados['prefeiturassub'] = $c;
		$dados['id'] = $id;
		$this->loadTemplate('prefeiturassub/listagem',$dados);
	}


	public function inserir($id){
		$dados = array();

		$reqs = new Prefeiturassub();

		$dados['prefeiturasub'] = $reqs->getListId($id);
		$dados['ids'] = $id;

		$this->loadTemplate('prefeiturassub/cadastro',$dados);
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

		$prefeiturassub = new Prefeiturassub();

		if($c = $prefeiturassub->add($CodPar, $NomeCon, $EmailCon, $FoneCon, $CelularCon, $CargoCon, $usuario)){

			header("Location: ".BASE_URL.'prefeiturassub/lista/'.$CodPar);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'prefeiturassub/lista/'.$CodPar);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}



	public function excluir($cc,$id){
		$dados = array();

		$prefeiturasu = new Prefeiturassub();

		if(isset($id) && !empty($id)){
			$c = $prefeiturasu->del($id);
		}
		
		if ($c = $prefeiturasu->del($id)){

				header("Location: ".BASE_URL.'prefeiturassub/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'prefeiturassub/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$prefeiturasub = new Prefeiturassub();
			
			if ($c = $prefeiturasub->delete($id)){

				header("Location: ".BASE_URL.'prefeiturassub/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'prefeiturassub/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}

}