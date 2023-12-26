<?php

class contratossubController extends Controller{

	public function index(){

		$dados = array();

		$dados['ids'] = $ids;
		$dados['id'] = $id;

		$this->loadTemplate('contratossub/lista', $dados);
	}

	public function lista($id,$contra){

		$dados = array();

		$contratosub = new Contratossub();
		$c = $contratosub->getList($id);

		$dados['contratossub'] = $c;
		$dados['contra'] = $contra;
		$dados['id'] = $id;
		$this->loadTemplate('contratossub/listagem',$dados);
	}


	public function inserir($id){
		$dados = array();

		$reqs = new Contratossub();

		$dados['contrato'] = $reqs->getListId($id);
		$dados['ids'] = $id;

		$this->loadTemplate('contratossub/cadastro',$dados);
	}



	public function add(){

		$dados = array();

		// $CodVenda = $_POST['ids'];
		$contra = $_POST['contra'];
		$CodLanc = $_POST['id'];
		$DtBaixaCon = addslashes($_POST['DtBaixaCon']);
		$VrCon = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCon'])));
		$VrAcresCon = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrAcresCon'])));
		$VrDescCon = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrDescCon'])));
		$VrTotalCon = addslashes($_POST['VrTotalCon']);
		$FormaPgtoCon = addslashes($_POST['FormaPgtoCon']);
		$NumChCon = addslashes($_POST['NumChCon']);
		$DtChCon = addslashes($_POST['DtChCon']);
		$BancoChCon = addslashes($_POST['BancoChCon']);
		$usuario = addslashes($_SESSION['login']);

		$contratossub = new Contratossub();

		if($c = $contratossub->add($CodLanc, $DtBaixaCon, $VrCon, $VrAcresCon, $VrDescCon, $VrTotalCon, $FormaPgtoCon, $NumChCon, $DtChCon, $BancoChCon, $usuario)){

			header("Location: ".BASE_URL.'contratossub/lista/'.$CodLanc.'/'.$contra);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'contratossub/lista/'.$CodLanc.'/'.$contra);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}



	public function excluir($cc,$contra,$id){
		$dados = array();

		$carrega = new Contratossub();

		if(isset($id) && !empty($id)){
			$c = $carrega->del($id);
		}
		
		if ($c = $carrega->del($id)){

				header("Location: ".BASE_URL.'contratossub/lista/'.$cc.'/'.$contra);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'contratossub/lista/'.$cc.'/'.$contra);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$contratosub = new Contratossub();
			
			if ($c = $contratosub->delete($id)){

				header("Location: ".BASE_URL.'contratossub/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'contratossub/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}
	
}