<?php

class conveniosdesembolsosController extends Controller{

	public function index(){

		$dados = array();

		$dados['id'] = $id;

		$this->loadTemplate('conveniosdesembolsos/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$conveniodesembolsos = new Conveniosdesembolsos();
		$c = $conveniodesembolsos->getList($id);

		$conveniodesembolsostotais = new Conveniosdesembolsos();
		$ct = $conveniodesembolsostotais->getListTotais($id);

		$dados['conveniosdesembolsos'] = $c;
		$dados['conveniosdesembolsostotais'] = $ct;
		$dados['id'] = $id;
		$this->loadTemplate('conveniosdesembolsos/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$CodConv = $_POST['id'];
		$DtDes = addslashes($_POST['DtDes']);
		$VrRepasseDes = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrRepasseDes'])));
		$VrCpDes = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCpDes'])));
		$VrTotalDes = addslashes($_POST['VrTotalDes']);
		$usuario = addslashes($_SESSION['login']);
		$CodEmp = addslashes($_POST['CodEmp']);

		$conveniosdesembolsos = new Conveniosdesembolsos();

		if($c = $conveniosdesembolsos->add($CodConv, $DtDes, $VrRepasseDes, $VrCpDes, $VrTotalDes, $usuario, $CodEmp)){

			header("Location: ".BASE_URL.'conveniosdesembolsos/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniosdesembolsos/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}


	public function edit($c,$id){
		$dados = array();

		$con = new Conveniosdesembolsos();

		$dados['conveniodesembolso'] = $con->getListId($c,$id);

		$this->loadTemplate('conveniosdesembolsos/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$conv = $_POST['conv'];
			$id = $_POST['id'];
			$DtDes = addslashes($_POST['DtDes']);
			$VrRepasseDes = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrRepasseDes'])));
			$VrCpDes = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCpDes'])));
			$VrTotalDes = addslashes($_POST['VrTotalDes']);
			$usuario = addslashes($_SESSION['login']);
			$CodEmp = addslashes($_POST['CodEmp']);

			$conveniodesembolso = new Conveniosdesembolsos();
			
			if ($c = $conveniodesembolso->update($id, $DtDes, $VrRepasseDes, $VrCpDes, $VrTotalDes, $usuario, $CodEmp)){

				header("Location: ".BASE_URL.'conveniosdesembolsos/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
          VrNovoVrConAdi                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniosdesembolsos/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($cc,$id){
		$dados = array();

		$conveniosdesembols = new Conveniosdesembolsos();

		if(isset($id) && !empty($id)){
			$c = $conveniosdesembols->del($id);
		}
		
		if ($c = $conveniosdesembols->del($id)){

				header("Location: ".BASE_URL.'conveniosdesembolsos/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniosdesembolsos/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$conveniodesembolsos = new Conveniosdesembolsos();
			
			if ($c = $conveniodesembolsos->delete($id)){

				header("Location: ".BASE_URL.'conveniosdesembolsos/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'conveniosdesembolsos/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}


	public function editAjax(){
		$id = $_POST['id'];
		$con = new Conveniosdesembolsos();
		$c = $con->getListId($id);
		echo $c;
	}

}