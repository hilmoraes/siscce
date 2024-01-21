<?php

class conveniospagamentosController extends Controller{

	public function index(){

		$dados = array();

		$parceiro = new Parceiros();
		$pa = $parceiro->getParceiros();

		$dados['id'] = $id;
		$dados['parceiros'] = $pa;

		$this->loadTemplate('conveniospagamentos/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$parceiro = new Conveniospagamentos();
		$pa = $parceiro->getParceirosconvenios($id);

		$conveniopagamentos = new Conveniospagamentos();
		$c = $conveniopagamentos->getList($id);

		$conveniopagamentostotais = new Conveniospagamentos();
		$ct = $conveniopagamentostotais->getListTotais($id);

		$dados['conveniospagamentos'] = $c;
		$dados['conveniospagamentostotais'] = $ct;
		$dados['parceiros'] = $pa;
		$dados['id'] = $id;
		$this->loadTemplate('conveniospagamentos/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$CodConv = $_POST['id'];
		$DtPag = addslashes($_POST['DtPag']);
		$DocPag = addslashes($_POST['DocPag']);
		$VrTotalPag = addslashes($_POST['VrTotalPag']);
		$VrRepassePag = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrRepassePag'])));
		$VrCpPag = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCpPag'])));
		$CodPar = addslashes($_POST['CodPar']);
		$TipoPag = addslashes($_POST['TipoPag']);
		$SituacaoPag = addslashes($_POST['SituacaoPag']);
		$usuario = addslashes($_SESSION['login']);
		$CodEmp = addslashes($_POST['CodEmp']);

		$conveniospagamentos = new Conveniospagamentos();

		if($c = $conveniospagamentos->add($CodConv, $DtPag, $DocPag, $VrTotalPag, $VrRepassePag, $VrCpPag, $CodPar, $TipoPag, $SituacaoPag, $usuario, $CodEmp)){

			header("Location: ".BASE_URL.'conveniospagamentos/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniospagamentos/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}


	public function edit($c,$id){
		$dados = array();

		$con = new Conveniospagamentos();
		$par = new Conveniospagamentos();

		$dados['conveniopagamento'] = $con->getListId($c,$id);
		$dados['parceiros'] = $par->getParceirosconvenios($c);

		$this->loadTemplate('conveniospagamentos/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$conv = $_POST['conv'];
			$id = $_POST['id'];
			$DtPag = addslashes($_POST['DtPag']);
			$DocPag = addslashes($_POST['DocPag']);
			$VrTotalPag = addslashes($_POST['VrTotalPag']);
			$VrRepassePag = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrRepassePag'])));
			$VrCpPag = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCpPag'])));
			$CodPar = addslashes($_POST['CodPar']);
			$TipoPag = addslashes($_POST['TipoPag']);
			$SituacaoPag = addslashes($_POST['SituacaoPag']);
			$usuario = addslashes($_SESSION['login']);
			$CodEmp = addslashes($_POST['CodEmp']);

			$conveniopagamento = new Conveniospagamentos();
			
			if ($c = $conveniopagamento->update($id, $DtPag, $DocPag, $VrTotalPag, $VrRepassePag, $VrCpPag, $CodPar, $TipoPag, $SituacaoPag, $usuario, $CodEmp)){

				header("Location: ".BASE_URL.'conveniospagamentos/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniospagamentos/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($cc,$id){
		$dados = array();

		$conveniospagament = new Conveniospagamentos();

		if(isset($id) && !empty($id)){
			$c = $conveniospagament->del($id);
		}
		
		if ($c = $conveniospagament->del($id)){

				header("Location: ".BASE_URL.'conveniospagamentos/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniospagamentos/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$conveniopagamentos = new Conveniospagamentos();
			
			if ($c = $conveniopagamentos->delete($id)){

				header("Location: ".BASE_URL.'conveniospagamentos/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'conveniospagamentos/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}


	public function editAjax(){
		$id = $_POST['id'];
		$con = new Conveniospagamentos();
		$c = $con->getListId($id);
		echo $c;
	}

}