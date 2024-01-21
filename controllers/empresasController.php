<?php

class empresasController extends Controller{

	public function index(){

		$dados = array();
		$cidade = new Cidades();
		$c = $cidade->getCidades();

		$dados['cidades'] = $c;

		$this->loadTemplate('empresas/cadastro', $dados);
	}

	public function lista(){

		$dados = array();

		$cidade = new Cidades();
		$ci = $cidade->getCidades();

		$empresa = new Empresas();
		$c = $empresa->getList();

		$dados['empresas'] = $c;
		$dados['cidades'] = $ci;

		$this->loadTemplate('empresas/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$NomeEmp = addslashes($_POST['NomeEmp']);
		$EndEmp = addslashes($_POST['EndEmp']);
		$NumEndEmp = addslashes($_POST['NumEndEmp']);
		$BairroEmp = addslashes($_POST['BairroEmp']);
		$CepEmp = addslashes($_POST['CepEmp']);
		$CodCid = addslashes($_POST['cidade']);
		$Fone1Emp = addslashes($_POST['Fone1Emp']);
		$Fone2Emp = addslashes($_POST['Fone2Emp']);
		$ComplEmp = addslashes($_POST['ComplEmp']);
		$CgfEmp = addslashes($_POST['CgfEmp']);
		$CnpjEmp = addslashes($_POST['CnpjEmp']);
		$BancoEmp = addslashes($_POST['BancoEmp']);
		$AgEmp = addslashes($_POST['AgEmp']);
		$CCEmp = addslashes($_POST['CCEmp']);
		$usuario = addslashes($_SESSION['login']);

		$empresas = new Empresas();

		if($c = $empresas->add($NomeEmp, $EndEmp, $NumEndEmp, $BairroEmp, $CepEmp, $CodCid, $Fone1Emp, $Fone2Emp, $ComplEmp, $CgfEmp, $CnpjEmp, $BancoEmp, $AgEmp, $CCEmp, $usuario)){

			header("Location: ".BASE_URL.'empresas/lista');
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

		}else{
			header("Location: ".BASE_URL.'empresas/lista');
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Cadastrar!</h4>
                                                </div>';
		}
		
	}


	public function edit($id){
		$dados = array();

		$emp = new Empresas();
		$cid = new Cidades();

		$dados['empresa'] = $emp->getListId($id);
		$dados['cidades'] = $cid->getCidades();

		$this->loadTemplate('empresas/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$id = $_POST['id'];
			$NomeEmp = addslashes($_POST['NomeEmp']);
			$EndEmp = addslashes($_POST['EndEmp']);
			$NumEndEmp = addslashes($_POST['NumEndEmp']);
			$BairroEmp = addslashes($_POST['BairroEmp']);
			$CepEmp = addslashes($_POST['CepEmp']);
			$CodCid = addslashes($_POST['cidade']);
			$Fone1Emp = addslashes($_POST['Fone1Emp']);
			$Fone2Emp = addslashes($_POST['Fone2Emp']);
			$ComplEmp = addslashes($_POST['ComplEmp']);
			$CgfEmp = addslashes($_POST['CgfEmp']);
			$CnpjEmp = addslashes($_POST['CnpjEmp']);
			$BancoEmp = addslashes($_POST['BancoEmp']);
			$AgEmp = addslashes($_POST['AgEmp']);
			$CCEmp = addslashes($_POST['CCEmp']);
			$usuario = addslashes($_SESSION['login']);
			$inativo = addslashes($_POST['inativo']);
			if ($inativo=="on") {
				$inativo = 1;
			} else {
				$inativo = 0;
			}

			$empresa = new Empresas();
			
			if ($c = $empresa->update($id, $NomeEmp, $EndEmp, $NumEndEmp, $BairroEmp, $CepEmp, $CodCid, $Fone1Emp, $Fone2Emp, $ComplEmp, $CgfEmp, $CnpjEmp, $BancoEmp, $AgEmp, $CCEmp, $usuario, $inativo)){

				header("Location: ".BASE_URL.'empresas/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'empresas/listas');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($id){
		$dados = array();

		$empres = new Empresas();

		if(isset($id) && !empty($id)){
			$c = $empres->del($id);
		}
		
		if ($c = $empres->del($id)){

				header("Location: ".BASE_URL.'empresas/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'empresas/lista');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$empresa = new Empresas();
			
			if ($c = $empresa->delete($id)){

				header("Location: ".BASE_URL.'empresas/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'empresas/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}



	public function editAjax(){
		$id = $_POST['id'];
		$emp = new Empresas();
		$c = $emp->getListId($id);
		echo $c;
	}

/*	public function contato(){
		$id = $_POST['id'];
		$emp = new Empresas();
		$c = $emp->getListIdCont($id);
		echo $c;
	}*/



/*	public function addContato(){

		$idEmp    = $_POST['id'];
		$NomeRes     = $_POST['NomeRes'];
		$EndRes     = $_POST['EndRes'];
		$NumEndRes = $_POST['NumEndRes'];
		$BaiRes	  = $_POST['BaiRes'];
		$CepRes    = $_POST['CepRes'];
		$CodCidRes    = $_POST['CodCidRes'];
		$FoneRes    = $_POST['FoneRes'];
		$CelularRes    = $_POST['CelularRes'];
		$CpfRes    = $_POST['CpfRes'];
		$RgRes    = $_POST['RgRes'];
		$user  = $_POST['user'];

		$addCont = new Empresas();

		if($cnt = $addCont->addContato($idEmp, $NomeRes, $EndRes, $NumEndRes, $BaiRes, $CepRes, $CodCidRes, $FoneRes, $CelularRes, $CpfRes, $RgRes, $user)){

			$atualiacont = $addCont->getListIdCont($idEmp);
			echo ($atualiacont);

		}else{

			header("Location: ".BASE_URL.'empresas/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> falha ao cadastrar!</h4>
                                                </div>';
		}

	}



	public function editContatoEmp(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$idCon    = $_POST['id'];
			$idEmp    = $_POST['idEmp'];
			$NomeRes     = $_POST['NomeRes'];
			$EndRes     = $_POST['EndRes'];
			$NumEndRes = $_POST['NumEndRes'];
			$BaiRes	  = $_POST['BaiRes'];
			$CepRes    = $_POST['CepRes'];
			$CodCidRes    = $_POST['CodCidRes'];
			$FoneRes    = $_POST['FoneRes'];
			$CelularRes    = $_POST['CelularRes'];
			$CpfRes    = $_POST['CpfRes'];
			$RgRes    = $_POST['RgRes'];
			$user  = $_POST['user'];

			$editCon = new Empresas();
			$cnt = $editCon->editContatos($idCon, $NomeRes, $EndRes, $NumEndRes, $BaiRes, $CepRes, $CodCidRes, $FoneRes, $CelularRes, $CpfRes, $RgRes, $user);

			if($cnt){
				$atualiacont = $editCon->getListIdCont($idEmp);
				echo ($atualiacont);

			}else{
				echo "erro";
			}
		}

	}


	public function excContato(){

		$idEmp = $_POST['idEmp'];

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$idCon = $_POST['id'];

			$excCon = new Empresas();
			
			if($cnt = $excCon->excContatos($idCon)){
				$atualiacont = $excCon->getListIdCont($idEmp);
				echo ($atualiacont);

			}else{
				echo "erro";
			}
		}

	}*/


// Inicio  de funçoes de relatorios

/*	public function relempresas(){

		$dados = array();

		$prefeitura = new Prefeituras();
		$p = $prefeitura->getPrefeituras();
		$dados['prefeituras'] = $p;

		$this->loadTemplate('empresas/relempresas',$dados);
	}

	public function relfuncempD($id){
		$dados = array();
		$dados['inati'] = $id;
		$this->loadView('empresas/relatorios/relEmpresaD', $dados);
	}

	public function relfuncempR($id){
		$dados = array();
		$dados['inati'] = $id;
		$this->loadView('empresas/relatorios/relEmpresaR', $dados);
	}

	public function relfuncempRP($id,$CodPre){
		$dados = array();
		$dados['inati'] = $id;
		$dados['CodPre'] = $CodPre;
		$this->loadView('empresas/relatorios/relEmpresaRP', $dados);
	}*/

// Fim de funçoes de relatorios
	
}