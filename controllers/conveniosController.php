<?php

require_once 'funcoes/extenso.php';

class conveniosController extends Controller{

	public function index(){

		$dados = array();
		$gestor = new Gestores();
		$p = $gestor->getGestores();

		$fiscal = new Fiscais();
		$em = $fiscal->getFiscais();

		$prefeitura = new Prefeituras();
		$pr = $prefeitura->getPrefeituras();

		$dados['gestores'] = $p;
		$dados['fiscais'] = $em;
		$dados['prefeituras'] = $pr;

		$this->loadTemplate('convenios/cadastro', $dados);
	}

	public function lista(){

		$dados = array();

		$gestor = new Gestores();
		$p = $gestor->getGestores();

		$fiscal = new Fiscais();
		$em = $fiscal->getFiscais();

		$prefeitura = new Prefeituras();
		$pr = $prefeitura->getPrefeituras();

		$convenio = new convenios();
		$v = $convenio->getList();

		$conveniototais = new convenios();
		$vt = $conveniototais->getListTotais();

		$dados['convenios'] = $v;
		$dados['conveniostotais'] = $vt;
		$dados['gestores'] = $p;
		$dados['fiscais'] = $em;
		$dados['prefeituras'] = $pr;

		$this->loadTemplate('convenios/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$CodPre = addslashes($_POST['CodPre']);
		$EparceriaConv = addslashes($_POST['EparceriaConv']);
		$NumConv = addslashes($_POST['NumConv']);
		$OrgaoConv = addslashes($_POST['OrgaoConv']);
		$ObjetoConv = addslashes($_POST['ObjetoConv']);
		$DtVigenciaConv = addslashes($_POST['DtVigenciaConv']);
		$DtFimVigenciaConv = addslashes($_POST['DtFimVigenciaConv']);
		$CodGes = addslashes($_POST['CodGes']);
		$CodFis = addslashes($_POST['CodFis']);
		$VrRepasseConv = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrRepasseConv'])));
		$VrCpConv = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCpConv'])));
		$AditivoConv = addslashes($_POST['AditivoConv']);
		$VrRepasseAConv = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrRepasseAConv'])));
		$VrCpAConv = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCpAConv'])));
		$VrTotalConv = addslashes($_POST['VrTotalConv']);
		$ObsConv = addslashes($_POST['ObsConv']);
		$usuario = addslashes($_SESSION['login']);
		$CodEmp = addslashes($_POST['CodEmp']);

		$convenios = new convenios();

		if($c = $convenios->add($CodPre, $EparceriaConv, $NumConv, $OrgaoConv, $ObjetoConv, $DtVigenciaConv, $DtFimVigenciaConv, $CodGes, $CodFis, $VrRepasseConv, $VrCpConv, $AditivoConv, $VrRepasseAConv, $VrCpAConv, $VrTotalConv, $ObsConv, $usuario, $CodEmp)){

			header("Location: ".BASE_URL.'convenios/lista');
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <hDataNascMot4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

		}else{
			header("Location: ".BASE_URL.'convenios/lista');
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Cadastrar!</h4>
                                                </div>';
		}
		
	}


	public function edit($id){
		$dados = array();

		$con = new Convenios();
		$gest = new Gestores();
		$fisc = new Fiscais();
		$pref = new Prefeituras();

		$dados['convenio'] = $con->getListId($id);
		$dados['gestores'] = $gest->getGestores();
		$dados['fiscais'] = $fisc->getFiscais();
		$dados['prefeituras'] = $pref->getPrefeituras();

		$this->loadTemplate('convenios/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$id = $_POST['id'];
			$CodPre = addslashes($_POST['CodPre']);
			$EparceriaConv = addslashes($_POST['EparceriaConv']);
			$NumConv = addslashes($_POST['NumConv']);
			$OrgaoConv = addslashes($_POST['OrgaoConv']);
			$ObjetoConv = addslashes($_POST['ObjetoConv']);
			$DtVigenciaConv = addslashes($_POST['DtVigenciaConv']);
			$DtFimVigenciaConv = addslashes($_POST['DtFimVigenciaConv']);
			$CodGes = addslashes($_POST['CodGes']);
			$CodFis = addslashes($_POST['CodFis']);
			$VrRepasseConv = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrRepasseConv'])));
			$VrCpConv = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCpConv'])));
			$AditivoConv = addslashes($_POST['AditivoConv']);
			$VrRepasseAConv = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrRepasseAConv'])));
			$VrCpAConv = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrCpAConv'])));
			$VrTotalConv = addslashes($_POST['VrTotalConv']);
			$ObsConv = addslashes($_POST['ObsConv']);
			$usuario = addslashes($_SESSION['login']);
			$CodEmp = addslashes($_POST['CodEmp']);
			$DataCancel = addslashes($_POST['DataCancel']);

			$convenio = new convenios();
			
			if ($c = $convenio->update($id, $CodPre, $EparceriaConv, $NumConv, $OrgaoConv, $ObjetoConv, $DtVigenciaConv, $DtFimVigenciaConv, $CodGes, $CodFis, $VrRepasseConv, $VrCpConv, $AditivoConv, $VrRepasseAConv, $VrCpAConv, $VrTotalConv, $ObsConv, $usuario, $CodEmp, $DataCancel)){

				header("Location: ".BASE_URL.'convenios/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'convenios/listas');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($id){
		$dados = array();

		$convenio = new convenios();

		if(isset($id) && !empty($id)){
			$c = $convenio->del($id);
		}
		
		if ($c = $convenio->del($id)){

				header("Location: ".BASE_URL.'convenios/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'convenios/lista');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$convenio = new convenios();
			
			if ($c = $convenio->delete($id)){

				header("Location: ".BASE_URL.'convenios/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'convenios/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}



	public function editAjax(){
		$id = $_POST['id'];
		$mot = new convenios();
		$c = $mot->getListId($id);
		echo $c;
	}



// Inicio  de emissão de Convenios

	public function relconvenioc($ca){
		$dados = array();
		$dados['ca'] = $ca;

		$this->loadView('convenios/relatorios/relConvenioC', $dados);
	}

// Fim de emissão de Convenios


// Inicio  de funçoes de relatorios

	public function relconvenios(){

		$dados = array();

		$gestor = new Gestores();
		$f = $gestor->getGestores();
		$dados['gestores'] = $f;

		$fiscal = new Fiscais();
		$c = $fiscal->getFiscais();
		$dados['fiscais'] = $c;

		$prefeitura = new Prefeituras();
		$c = $prefeitura->getPrefeituras();
		$dados['prefeituras'] = $c;

		$this->loadTemplate('convenios/relconvenios',$dados);
	}

	public function relfuncconvP($data1,$data2){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$this->loadView('convenios/relatorios/relConvenioPorPeriodo', $dados);
	}

	public function relfuncconvPGes($data1,$data2,$CodGes){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['CodGes'] = $CodGes;
		$this->loadView('convenios/relatorios/relConvenioPorPeriodoGes', $dados);
	}

	public function relfuncconvPFis($data1,$data2,$CodFis){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['CodFis'] = $CodFis;
		$this->loadView('convenios/relatorios/relConvenioPorPeriodoFis', $dados);
	}

	public function relfuncconvPPre($data1,$data2,$CodPre){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['CodPre'] = $CodFis;
		$this->loadView('convenios/relatorios/relConvenioPorPeriodoPre', $dados);
	}

// Fim de funçoes de relatorios

}