<?php

class conveniosaditivosController extends Controller{

	public function index(){

		$dados = array();

		$Conveniocontrato = new Convenioscontratos();
		$pa = $Conveniocontrato->getConvenioscontratos();

		$convenioaditivo = new Conveniosaditivos();
		$cl = $convenioaditivo->getConveniosaditivos();

		$dados['id'] = $id;
		$dados['parceiros'] = $pa;
		$dados['convenioscontratos'] = $cl;

		$this->loadTemplate('conveniosaditivos/lista', $dados);
	}

	public function lista($id){

		$dados = array();

		$conveniocontrato = new Conveniosaditivos();
		$cl = $conveniocontrato->getConvenioscontratosconvenios($id);

		$convenioaditivos = new Conveniosaditivos();
		$c = $convenioaditivos->getList($id);

		$dados['conveniosaditivos'] = $c;
		$dados['convenioscontratos'] = $cl;
		$dados['id'] = $id;
		$this->loadTemplate('conveniosaditivos/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$CodConv = $_POST['id'];
		$CodCon = addslashes($_POST['CodCon']);
		$NumAdi = addslashes($_POST['NumAdi']);
		$TipoAdi = addslashes($_POST['TipoAdi']);
		$VrAdi = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrAdi'])));
		$VrNovoVrConAdi = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrNovoVrConAdi'])));
		$DtVigenciaIniAdi = addslashes($_POST['DtVigenciaIniAdi']);
		$DtVigenciaFimAdi = addslashes($_POST['DtVigenciaFimAdi']);
		$usuario = addslashes($_SESSION['login']);
		$CodEmp = addslashes($_POST['CodEmp']);

		$conveniosaditivos = new Conveniosaditivos();

		if($c = $conveniosaditivos->add($CodConv, $CodCon, $NumAdi, $TipoAdi, $VrAdi, $VrNovoVrConAdi, $DtVigenciaIniAdi, $DtVigenciaFimAdi, $usuario, $CodEmp)){

			header("Location: ".BASE_URL.'conveniosaditivos/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniosaditivos/lista/'.$CodConv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
		}
		
	}


	public function edit($c,$id){
		$dados = array();

		$con = new Conveniosaditivos();
		$conl = new Conveniosaditivos();
		$par = new Parceiros();

		$dados['convenioaditivo'] = $con->getListId($c,$id);
		$dados['convenioscontratos'] = $conl->getConvenioscontratosconvenios($c);

		$this->loadTemplate('conveniosaditivos/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$conv = $_POST['conv'];
			$id = $_POST['id'];
			$CodCon = addslashes($_POST['CodCon']);
			$NumAdi = addslashes($_POST['NumAdi']);
			$TipoAdi = addslashes($_POST['TipoAdi']);
			$VrAdi = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrAdi'])));
			$VrNovoVrConAdi = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrNovoVrConAdi'])));
			$DtVigenciaIniAdi = addslashes($_POST['DtVigenciaIniAdi']);
			$DtVigenciaFimAdi = addslashes($_POST['DtVigenciaFimAdi']);
			$usuario = addslashes($_SESSION['login']);
			$CodEmp = addslashes($_POST['CodEmp']);

			$convenioaditivo = new Conveniosaditivos();
			
			if ($c = $convenioaditivo->update($id, $CodCon, $NumAdi, $TipoAdi, $VrAdi, $VrNovoVrConAdi, $DtVigenciaIniAdi, $DtVigenciaFimAdi, $usuario, $CodEmp)){

				header("Location: ".BASE_URL.'conveniosaditivos/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
          VrNovoVrConAdi                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniosaditivos/lista/' . $conv);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($cc,$id){
		$dados = array();

		$conveniosaditiv = new Conveniosaditivos();

		if(isset($id) && !empty($id)){
			$c = $conveniosaditiv->del($id);
		}
		
		if ($c = $conveniosaditiv->del($id)){

				header("Location: ".BASE_URL.'conveniosaditivos/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'conveniosaditivos/lista/'.$cc);
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){
			
			$convenioaditivos = new Conveniosaditivos();
			
			if ($c = $convenioaditivos->delete($id)){

				header("Location: ".BASE_URL.'conveniosaditivos/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'conveniosaditivos/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}


	public function editAjax(){
		$id = $_POST['id'];
		$con = new Conveniosaditivos();
		$c = $con->getListId($id);
		echo $c;
	}

}