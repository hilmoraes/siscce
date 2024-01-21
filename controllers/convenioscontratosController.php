<?php

class convenioscontratosController extends Controller{

	public function index(){

		$dados = array();

		$parceiro = new Parceiros();
		$pa = $parceiro->getParceiros();

		$conveniolicitacao = new Convenioslicitacoes();
		$cl = $conveniolicitacao->getConvenioslicitacoes();

		$dados['id'] = $id;
		$dados['parceiros'] = $pa;
		$dados['convenioslicitacoes'] = $cl;

		$this->loadTemplate('convenioscontratos/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$parceiro = new Parceiros();
		$pa = $parceiro->getParceiros();

		$conveniolicitacao = new Convenioscontratos();
		$cl = $conveniolicitacao->getConvenioslicitacoesconvenios($id);

		$conveniocontratos = new Convenioscontratos();
		$c = $conveniocontratos->getList($id);

		$dados['convenioscontratos'] = $c;
		$dados['parceiros'] = $pa;
		$dados['convenioslicitacoes'] = $cl;
		$dados['id'] = $id;
		$this->loadTemplate('convenioscontratos/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$CodConv = $_POST['id'];
		$CodLic = addslashes($_POST['CodLic']);
		$DtVigenciaIniCon = addslashes($_POST['DtVigenciaIniCon']);
		$DtVigenciaFimCon = addslashes($_POST['DtVigenciaFimCon']);
		$VrCon = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCon'])));
		$CodPar = addslashes($_POST['CodPar']);
		$NumCon = addslashes($_POST['NumCon']);
		$usuario = addslashes($_SESSION['login']);
		$CodEmp = addslashes($_POST['CodEmp']);

		$convenioscontratos = new Convenioscontratos();

		if($c = $convenioscontratos->add($CodConv, $CodLic, $DtVigenciaIniCon, $DtVigenciaFimCon, $VrCon, $CodPar, $NumCon, $usuario, $CodEmp)){

			header("Location: ".BASE_URL.'convenioscontratos/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'convenioscontratos/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}


	public function edit($c,$id){
		$dados = array();

		$con = new Convenioscontratos();
		$conl = new Convenioscontratos();
		$par = new Parceiros();

		$dados['conveniocontrato'] = $con->getListId($c,$id);
		$dados['parceiros'] = $par->getParceiros();
		$dados['convenioslicitacoes'] = $conl->getConvenioslicitacoesconvenios($c);

		$this->loadTemplate('convenioscontratos/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$conv = $_POST['conv'];
			$id = $_POST['id'];
			$CodLic = addslashes($_POST['CodLic']);
			$DtVigenciaIniCon = addslashes($_POST['DtVigenciaIniCon']);
			$DtVigenciaFimCon = addslashes($_POST['DtVigenciaFimCon']);
			$VrCon = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCon'])));
			$CodPar = addslashes($_POST['CodPar']);
			$NumCon = addslashes($_POST['NumCon']);
			$usuario = addslashes($_SESSION['login']);
			$CodEmp = addslashes($_POST['CodEmp']);

			$conveniocontrato = new Convenioscontratos();
			
			if ($c = $conveniocontrato->update($id, $CodLic, $DtVigenciaIniCon, $DtVigenciaFimCon, $VrCon, $CodPar, $NumCon, $usuario, $CodEmp)){

				header("Location: ".BASE_URL.'convenioscontratos/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'convenioscontratos/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($cc,$id){
		$dados = array();

		$Convenioscontrat = new Convenioscontratos();

		if(isset($id) && !empty($id)){
			$c = $Convenioscontrat->del($id);
		}
		
		if ($c = $Convenioscontrat->del($id)){

				header("Location: ".BASE_URL.'convenioscontratos/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'convenioscontratos/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$conveniocontratos = new Convenioscontratos();
			
			if ($c = $conveniocontratos->delete($id)){

				header("Location: ".BASE_URL.'convenioscontratos/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'convenioscontratos/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}


	public function editAjax(){
		$id = $_POST['id'];
		$con = new Convenioscontratos();
		$c = $con->getListId($id);
		echo $c;
	}

}