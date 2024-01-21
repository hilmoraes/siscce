<?php

class parceiroscontasController extends Controller{

	public function index(){

		$dados = array();

		$dados['id'] = $id;

		$this->loadTemplate('parceiroscontas/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$parceirocontas = new Parceiroscontas();
		$c = $parceirocontas->getList($id);

		$dados['parceiroscontas'] = $c;
		$dados['id'] = $id;
		$this->loadTemplate('parceiroscontas/listagem',$dados);
	}


	public function inserir($id){
		$dados = array();

		$reqs = new Parceiroscontas();

		$dados['parceiro'] = $reqs->getListId($id);
		$dados['ids'] = $id;

		$this->loadTemplate('parceiroscontas/cadastro',$dados);
	}



	public function add(){

		$dados = array();

		$CodPar = $_POST['id'];
		$BancoPar = addslashes($_POST['BancoPar']);
		$AgPar = addslashes($_POST['AgPar']);
		$ContaPar = addslashes($_POST['ContaPar']);
		$TipoContaPar = addslashes($_POST['TipoContaPar']);
		$usuario = addslashes($_SESSION['login']);

		$parceiroscontas = new Parceiroscontas();

		if($c = $parceiroscontas->add($CodPar, $BancoPar, $AgPar, $ContaPar, $TipoContaPar, $usuario)){

			header("Location: ".BASE_URL.'parceiroscontas/lista/'.$CodPar);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'parceiroscontas/lista/'.$CodPar);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}



	public function excluir($cc,$id){
		$dados = array();

		$parceir = new Parceiroscontas();

		if(isset($id) && !empty($id)){
			$c = $parceir->del($id);
		}
		
		if ($c = $parceir->del($id)){

				header("Location: ".BASE_URL.'parceiroscontas/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'parceiroscontas/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$parceirocontas = new Parceiroscontas();
			
			if ($c = $parceirocontas->delete($id)){

				header("Location: ".BASE_URL.'parceiroscontas/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'parceiroscontas/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}

}