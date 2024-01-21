<?php

class prefeiturascontasController extends Controller{

	public function index(){

		$dados = array();

		$dados['id'] = $id;

		$this->loadTemplate('prefeiturascontas/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$prefeituracontas = new Prefeiturascontas();
		$c = $prefeituracontas->getList($id);

		$dados['prefeiturascontas'] = $c;
		$dados['id'] = $id;
		$this->loadTemplate('prefeiturascontas/listagem',$dados);
	}


	public function inserir($id){
		$dados = array();

		$reqs = new Prefeiturascontas();

		$dados['prefeitura'] = $reqs->getListId($id);
		$dados['ids'] = $id;

		$this->loadTemplate('prefeiturascontas/cadastro',$dados);
	}



	public function add(){

		$dados = array();

		$CodPre = $_POST['id'];
		$BancoPre = addslashes($_POST['BancoPre']);
		$AgPre = addslashes($_POST['AgPre']);
		$ContaPre = addslashes($_POST['ContaPre']);
		$TipoContaPre = addslashes($_POST['TipoContaPre']);
		$usuario = addslashes($_SESSION['login']);

		$prefeiturascontas = new Prefeiturascontas();

		if($c = $prefeiturascontas->add($CodPre, $BancoPre, $AgPre, $ContaPre, $TipoContaPre, $usuario)){

			header("Location: ".BASE_URL.'prefeiturascontas/lista/'.$CodPre);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'prefeiturascontas/lista/'.$CodPre);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}



	public function excluir($cc,$id){
		$dados = array();

		$prefeitur = new Prefeiturascontas();

		if(isset($id) && !empty($id)){
			$c = $prefeitur->del($id);
		}
		
		if ($c = $prefeitur->del($id)){

				header("Location: ".BASE_URL.'prefeiturascontas/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'prefeiturascontas/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$prefeituracontas = new Prefeiturascontas();
			
			if ($c = $prefeituracontas->delete($id)){

				header("Location: ".BASE_URL.'prefeiturascontas/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'prefeiturascontas/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}

}