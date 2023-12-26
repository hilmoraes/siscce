<?php

class prefeiturasController extends Controller{

	public function index(){

		$dados = array();
		$cidade = new Cidades();
		$c = $cidade->getCidades();

		$dados['cidades'] = $c;

		$this->loadTemplate('prefeituras/cadastro', $dados);
	}

	public function lista(){

		$dados = array();

		$cidade = new Cidades();
		$ci = $cidade->getCidades();

		$prefeitura = new Prefeituras();
		$c = $prefeitura->getList();

		$dados['prefeituras'] = $c;
		$dados['cidades'] = $ci;

		$this->loadTemplate('prefeituras/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$NomPre = addslashes($_POST['NomPre']);
		$DtCadPre = addslashes($_POST['DtCadPre']);
		$EndPre = addslashes($_POST['EndPre']);
		$NumEndPre = addslashes($_POST['NumEndPre']);
		$BaiPre = addslashes($_POST['BaiPre']);
		$CepPre = addslashes($_POST['CepPre']);
		$CodCid = addslashes($_POST['cidade']);
		$Fone1Pre = addslashes($_POST['Fone1Pre']);
		$Fone2Pre = addslashes($_POST['Fone2Pre']);
		$EmailPre = addslashes($_POST['EmailPre']);
		$SitePre = addslashes($_POST['SitePre']);
		$Obs = addslashes($_POST['Obs']);
		$usuario = addslashes($_SESSION['login']);

		$prefeituras = new Prefeituras();

		if($c = $prefeituras->add($NomPre, $DtCadPre, $EndPre, $NumEndPre, $BaiPre, $CepPre, $CodCid, $Fone1Pre, $Fone2Pre, $EmailPre, $SitePre, $Obs, $usuario)){

			header("Location: ".BASE_URL.'prefeituras/lista');
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

		}else{
			header("Location: ".BASE_URL.'prefeituras/lista');
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Cadastrar!</h4>
                                                </div>';
		}
		
	}


	public function edit($id){
		$dados = array();

		$pre = new Prefeituras();
		$cid = new Cidades();

		$dados['prefeitura'] = $pre->getListId($id);
		$dados['cidades'] = $cid->getCidades();

		$this->loadTemplate('prefeituras/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$id = $_POST['id'];
			$NomPre = addslashes($_POST['NomPre']);
			$DtCadPre = addslashes($_POST['DtCadPre']);
			$EndPre = addslashes($_POST['EndPre']);
			$NumEndPre = addslashes($_POST['NumEndPre']);
			$BaiPre = addslashes($_POST['BaiPre']);
			$CepPre = addslashes($_POST['CepPre']);
			$CodCid = addslashes($_POST['cidade']);
			$Fone1Pre = addslashes($_POST['Fone1Pre']);
			$Fone2Pre = addslashes($_POST['Fone2Pre']);
			$EmailPre = addslashes($_POST['EmailPre']);
			$SitePre = addslashes($_POST['SitePre']);
			$Obs = addslashes($_POST['Obs']);
			$usuario = addslashes($_SESSION['login']);
			$inativo = addslashes($_POST['inativo']);
			if ($inativo=="on") {
				$inativo = 1;
			} else {
				$inativo = 0;
			}

			$prefeitura = new Prefeituras();
			
			if ($c = $prefeitura->update($id, $NomPre, $DtCadPre, $EndPre, $NumEndPre, $BaiPre, $CepPre, $CodCid, $Fone1Pre, $Fone2Pre, $EmailPre, $SitePre, $Obs, $usuario, $inativo)){

				header("Location: ".BASE_URL.'prefeituras/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'prefeituras/listas');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($id){
		$dados = array();

		$prefeitur = new Prefeituras();

		if(isset($id) && !empty($id)){
			$c = $prefeitur->del($id);
		}
		
		if ($c = $prefeitur->del($id)){

				header("Location: ".BASE_URL.'prefeituras/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'prefeituras/lista');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$prefeitura = new Prefeituras();
			
			if ($c = $prefeitura->delete($id)){

				header("Location: ".BASE_URL.'prefeituras/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'prefeituras/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}



	public function editAjax(){
		$id = $_POST['id'];
		$pre = new Prefeituras();
		$c = $pre->getListId($id);
		echo $c;
	}

	public function contato(){
		$id = $_POST['id'];
		$pre = new Prefeituras();
		$c = $pre->getListIdCont($id);
		echo $c;
	}



	public function addContato(){

		$idPre    = $_POST['id'];
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

		$addCont = new Prefeituras();

		if($cnt = $addCont->addContato($idPre, $NomeRes, $EndRes, $NumEndRes, $BaiRes, $CepRes, $CodCidRes, $FoneRes, $CelularRes, $CpfRes, $RgRes, $user)){

			$atualiacont = $addCont->getListIdCont($idPre);
			echo ($atualiacont);

		}else{

			header("Location: ".BASE_URL.'prefeituras/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> falha ao cadastrar!</h4>
                                                </div>';
		}

	}



	public function editContatoPre(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$idCon    = $_POST['id'];
			$idPre    = $_POST['idPre'];
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

			$editCon = new Prefeituras();
			$cnt = $editCon->editContatos($idCon, $NomeRes, $EndRes, $NumEndRes, $BaiRes, $CepRes, $CodCidRes, $FoneRes, $CelularRes, $CpfRes, $RgRes, $user);

			if($cnt){
				$atualiacont = $editCon->getListIdCont($idPre);
				echo ($atualiacont);

			}else{
				echo "erro";
			}
		}

	}


	public function excContato(){

		$idPre = $_POST['idPre'];

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$idCon = $_POST['id'];

			$excCon = new Prefeituras();
			
			if($cnt = $excCon->excContatos($idCon)){
				$atualiacont = $excCon->getListIdCont($idPre);
				echo ($atualiacont);

			}else{
				echo "erro";
			}
		}

	}


// Inicio  de funçoes de relatorios

	public function relprefeituras(){

		$dados = array();

		$this->loadTemplate('prefeituras/relprefeituras',$dados);
	}

	public function relfuncpreD($id){
		$dados = array();
		$dados['inati'] = $id;
		$this->loadView('prefeituras/relatorios/relPrefeituraD', $dados);
	}

	public function relfuncpreR($id){
		$dados = array();
		$dados['inati'] = $id;
		$this->loadView('prefeituras/relatorios/relPrefeituraR', $dados);
	}

// Fim de funçoes de relatorios
	
}