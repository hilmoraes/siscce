<?php

class convenioslicitacoesController extends Controller{

	public function index(){

		$dados = array();

		$parceiro = new Parceiros();
		$pa = $parceiro->getParceiros();

		$dados['id'] = $id;
		$dados['parceiros'] = $pa;

		$this->loadTemplate('convenioslicitacoes/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$parceiro = new Parceiros();
		$pa = $parceiro->getParceiros();

		$conveniolicitacoes = new Convenioslicitacoes();
		$c = $conveniolicitacoes->getList($id);

		$dados['convenioslicitacoes'] = $c;
		$dados['parceiros'] = $pa;
		$dados['id'] = $id;
		$this->loadTemplate('convenioslicitacoes/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$CodConv = $_POST['id'];
		$DtHomologacaoLic = addslashes($_POST['DtHomologacaoLic']);
		$ModalidadeLic = addslashes($_POST['ModalidadeLic']);
		$NumLic = addslashes($_POST['NumLic']);
		$VrPropostaLic = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrPropostaLic'])));
		$CodPar = addslashes($_POST['CodPar']);
		$usuario = addslashes($_SESSION['login']);
		$CodEmp = addslashes($_POST['CodEmp']);

		$convenioslicitacoes = new Convenioslicitacoes();

		if($c = $convenioslicitacoes->add($CodConv, $DtHomologacaoLic, $ModalidadeLic, $NumLic, $VrPropostaLic, $CodPar, $usuario, $CodEmp)){

			header("Location: ".BASE_URL.'convenioslicitacoes/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'convenioslicitacoes/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}


	public function edit($c,$id){
		$dados = array();

		$con = new Convenioslicitacoes();
		$par = new Parceiros();

		$dados['conveniolicitacao'] = $con->getListId($c,$id);
		$dados['parceiros'] = $par->getParceiros();

		$this->loadTemplate('convenioslicitacoes/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$conv = $_POST['conv'];
			$id = $_POST['id'];
			$DtHomologacaoLic = addslashes($_POST['DtHomologacaoLic']);
			$ModalidadeLic = addslashes($_POST['ModalidadeLic']);
			$NumLic = addslashes($_POST['NumLic']);
			$VrPropostaLic = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrPropostaLic'])));
			$CodPar = addslashes($_POST['CodPar']);
			$usuario = addslashes($_SESSION['login']);
			$CodEmp = addslashes($_POST['CodEmp']);

			$conveniolicitacao = new Convenioslicitacoes();
			
			if ($c = $conveniolicitacao->update($id, $DtHomologacaoLic, $ModalidadeLic, $NumLic, $VrPropostaLic, $CodPar, $usuario, $CodEmp)){

				header("Location: ".BASE_URL.'convenioslicitacoes/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'convenioslicitacoes/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($cc,$id){
		$dados = array();

		$Convenioslicita = new Convenioslicitacoes();

		if(isset($id) && !empty($id)){
			$c = $Convenioslicita->del($id);
		}
		
		if ($c = $Convenioslicita->del($id)){

				header("Location: ".BASE_URL.'convenioslicitacoes/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'convenioslicitacoes/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$conveniolicitacoes = new Convenioslicitacoes();
			
			if ($c = $conveniolicitacoes->delete($id)){

				header("Location: ".BASE_URL.'convenioslicitacoes/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'convenioslicitacoes/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}


	public function editAjax(){
		$id = $_POST['id'];
		$con = new Convenioslicitacoes();
		$c = $con->getListId($id);
		echo $c;
	}

}