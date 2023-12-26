<?php

require_once 'funcoes/extenso.php';

class contratosController extends Controller{

	public function index(){

		$dados = array();
		$produto = new Produtos();
		$p = $produto->getProdutos();

		$empresa = new Empresas();
		$em = $empresa->getEmpresas();

		$fornecedor = new Fornecedores();
		$fo = $fornecedor->getFornecedores();

		$cliente = new Clientes();
		$cl = $cliente->getClientes();

		$contratante = new Contratantes();
		$co = $contratante->getContratante();

		$dados['produtos'] = $p;
		$dados['empresas'] = $em;
		$dados['fornecedores'] = $fo;
		$dados['clientes'] = $cl;
		$dados['contratantes'] = $co;

		$this->loadTemplate('contratos/cadastro', $dados);
	}

	public function lista(){

		$dados = array();

		$produto = new Produtos();
		$p = $produto->getProdutos();

		$empresa = new Empresas();
		$em = $empresa->getEmpresas();

		$fornecedor = new Fornecedores();
		$fo = $fornecedor->getFornecedores();

		$cliente = new Clientes();
		$cl = $cliente->getClientes();

		$contratante = new Contratantes();
		$co = $contratante->getContratante();

		$contrato = new contratos();
		$v = $contrato->getList();

		$dados['contratos'] = $v;
		$dados['produtos'] = $p;
		$dados['empresas'] = $em;
		$dados['fornecedores'] = $fo;
		$dados['clientes'] = $cl;
		$dados['contratantes'] = $co;

		$this->loadTemplate('contratos/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$Tipo = addslashes($_POST['Tipo']);
		$DataLanc = addslashes($_POST['DataLanc']);
		$DtIdent = addslashes($_POST['DtIdent']);
		$Ident = addslashes($_POST['Ident']);
		$CodFor = addslashes($_POST['CodFor']);
		$CodCli = addslashes($_POST['CodCli']);
		$CodPro = addslashes($_POST['CodPro']);
		$Embalagem = addslashes($_POST['Embalagem']);
		$Embarque = addslashes($_POST['Embarque']);
		$QtdSaca = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['QtdSaca'])));
		$QtdKgSaca = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['QtdKgSaca'])));
		$QtdTon = addslashes($_POST['QtdTon']);
		$QtdKg = addslashes($_POST['QtdKg']);
		$VrKg = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrKg'])));
		$Preco = addslashes($_POST['Preco']);
		$DescCarreg = addslashes($_POST['DescCarreg']);
		$TpFrete = addslashes($_POST['TpFrete']);
		$Qtde = addslashes($_POST['Qtde']);
		$CondPgto = addslashes($_POST['CondPgto']);
		$Carretas = addslashes($_POST['Carretas']);
		$Funrural = addslashes($_POST['Funrural']);
		$LocRetirada = addslashes($_POST['LocRetirada']);
		$Prazo = addslashes($_POST['Prazo']);
		$DataVF = addslashes($_POST['DataVF']);
		$V = addslashes($_POST['V']);
		$VrV = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrV'])));
		$Contratante = addslashes($_POST['Contratante']);
		$PorTon = addslashes($_POST['PorTon']);
		
		/*$DataCancel = addslashes($_POST['DataCancel']);*/
		$usuario = addslashes($_SESSION['login']);
		$CodEmp = addslashes($_POST['CodEmp']);

		$ExtensoVrKg = extenso($VrKg);
		$ExtensoPreco = extenso($Preco);
		$barra = array("/");
		$Extenso = @str_replace($barra, "", $ExtensoVrKg);
		$Extenso1 = @str_replace($barra, "", $ExtensoPreco);

		$contratos = new contratos();

		if($c = $contratos->add($Tipo, $DataLanc, $DtIdent, $Ident, $CodFor, $CodCli, $CodPro, $Embalagem, $Embarque, $QtdSaca, $QtdKgSaca, $QtdTon, $QtdKg, $VrKg, $Preco, $DescCarreg, $TpFrete, $Qtde, $CondPgto, $Carretas, $Funrural, $LocRetirada, $Prazo, $DataVF, $V, $VrV, $Contratante, $PorTon, $usuario, $CodEmp, $Extenso, $Extenso1)){

			header("Location: ".BASE_URL.'contratos/lista');
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <hDataNascMot4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

		}else{
			header("Location: ".BASE_URL.'contratos/lista');
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Cadastrar!</h4>
                                                </div>';
		}
		
	}


	public function edit($id){
		$dados = array();

		$con = new Contratos();
		$prod = new Produtos();
		$emp = new Empresas();
		$pro = new Fornecedores();
		$cli = new Clientes();
		$cont = new Contratantes();

		$dados['contrato'] = $con->getListId($id);
		$dados['produtos'] = $prod->getProdutos();
		$dados['empresas'] = $emp->getEmpresas();
		$dados['fornecedores'] = $pro->getFornecedores();
		$dados['clientes'] = $cli->getClientes();
		$dados['contratantes'] = $cont->getContratante();

		$this->loadTemplate('contratos/editar',$dados);
	}


	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$id = $_POST['id'];
			$Contrato = addslashes($_POST['Contrato']);
			$DataLanc = addslashes($_POST['DataLanc']);
			$DtIdent = addslashes($_POST['DtIdent']);
			$Ident = addslashes($_POST['Ident']);
			$CodFor = addslashes($_POST['CodFor']);
			$CodCli = addslashes($_POST['CodCli']);
			$CodPro = addslashes($_POST['CodPro']);
			$Embalagem = addslashes($_POST['Embalagem']);
			$Embarque = addslashes($_POST['Embarque']);
			$QtdSaca = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['QtdSaca'])));
			$QtdKgSaca = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['QtdKgSaca'])));
			$QtdTon = addslashes($_POST['QtdTon']);
			$QtdKg = addslashes($_POST['QtdKg']);
			$VrKg = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrKg'])));
			$Preco = addslashes($_POST['Preco']);
			$DescCarreg = addslashes($_POST['DescCarreg']);
			$TpFrete = addslashes($_POST['TpFrete']);
			$Qtde = addslashes($_POST['Qtde']);
			$CondPgto = addslashes($_POST['CondPgto']);
			$Carretas = addslashes($_POST['Carretas']);
			$Funrural = addslashes($_POST['Funrural']);
			$LocRetirada = addslashes($_POST['LocRetirada']);
			$Prazo = addslashes($_POST['Prazo']);
			$DataVF = addslashes($_POST['DataVF']);
			$V = addslashes($_POST['V']);
			$VrV = addslashes(str_replace(',', '.', str_replace('.', '', $_POST['VrV'])));
			$Contratante = addslashes($_POST['Contratante']);
			$PorTon = addslashes($_POST['PorTon']);
			
			/*$DataCancel = addslashes($_POST['DataCancel']);*/
			$usuario = addslashes($_SESSION['login']);
			$CodEmp = addslashes($_POST['CodEmp']);

			$ExtensoVrKg = extenso($VrKg);
			$ExtensoPreco = extenso($Preco);
			$barra = array("/");
			$Extenso = @str_replace($barra, "", $ExtensoVrKg);
			$Extenso1 = @str_replace($barra, "", $ExtensoPreco);
			$DataCancel = addslashes($_POST['DataCancel']);

			$contrato = new contratos();
			
			if ($c = $contrato->update($id, $Contrato, $DataLanc, $DtIdent, $Ident, $CodFor, $CodCli, $CodPro, $Embalagem, $Embarque, $QtdSaca, $QtdKgSaca, $QtdTon, $QtdKg, $VrKg, $Preco, $DescCarreg, $TpFrete, $Qtde, $CondPgto, $Carretas, $Funrural, $LocRetirada, $Prazo, $DataVF, $V, $VrV, $Contratante, $PorTon, $usuario, $CodEmp, $Extenso, $Extenso1, $DataCancel)){

				header("Location: ".BASE_URL.'contratos/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'contratos/listas');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($id){
		$dados = array();

		$contrato = new contratos();

		if(isset($id) && !empty($id)){
			$c = $contrato->del($id);
		}
		
		if ($c = $contrato->del($id)){

				header("Location: ".BASE_URL.'contratos/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'contratos/lista');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$contrato = new contratos();
			
			if ($c = $contrato->delete($id)){

				header("Location: ".BASE_URL.'contratos/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'contratos/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}



	public function editAjax(){
		$id = $_POST['id'];
		$mot = new contratos();
		$c = $mot->getListId($id);
		echo $c;
	}



// Inicio  de emissão de Contratos

	public function relcontratoc($ca){
		$dados = array();
		$dados['ca'] = $ca;

		$this->loadView('contratos/relatorios/relContratoC', $dados);
	}

	public function relcontratocf($ca){
		$dados = array();
		$dados['ca'] = $ca;
		
		$this->loadView('contratos/relatorios/relContratoCF', $dados);
	}

	public function relcontratoct($ca){
		$dados = array();
		$dados['ca'] = $ca;

		$this->loadView('contratos/relatorios/relContratoCT', $dados);
	}

	public function relcontratocft($ca){
		$dados = array();
		$dados['ca'] = $ca;
		
		$this->loadView('contratos/relatorios/relContratoCFT', $dados);
	}

// Fim de emissão de Contratos


// Inicio  de funçoes de relatorios

	public function relcontratos(){

		$dados = array();

		$fornecedor = new Fornecedores();
		$f = $fornecedor->getFornecedores();
		$dados['fornecedores'] = $f;

		$cliente = new Clientes();
		$c = $cliente->getClientes();
		$dados['clientes'] = $c;

		$produto = new Produtos();
		$p = $produto->getProdutos();
		$dados['produtos'] = $p;

		$this->loadTemplate('contratos/relcontratos',$dados);
	}

	public function relfuncconP($data1,$data2){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$this->loadView('contratos/relatorios/relContratoPorPeriodo', $dados);
	}

	public function relfuncconPCli($data1,$data2,$CodCli){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['CodCli'] = $CodCli;
		$this->loadView('contratos/relatorios/relContratoPorPeriodoCli', $dados);
	}

	public function relfuncconPFor($data1,$data2,$CodFor){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['CodFor'] = $CodFor;
		$this->loadView('contratos/relatorios/relContratoPorPeriodoFor', $dados);
	}

	public function relfuncconPTipo($data1,$data2,$tipoc){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['tipoc'] = $tipoc;
		$this->loadView('contratos/relatorios/relContratoPorPeriodoTipo', $dados);
	}

	public function relfuncconPTipoPro($data1,$data2,$tipoc,$CodPro){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['tipoc'] = $tipoc;
		$dados['CodPro'] = $CodPro;
		$this->loadView('contratos/relatorios/relContratoPorPeriodoTipoPro', $dados);
	}

	public function relfuncconPEstoqueDet($data1,$data2){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$this->loadView('contratos/relatorios/relContratoEstoquePorPeriodoDet', $dados);
	}

	public function relfuncconPEstoquePro($data1,$data2,$CodPro){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['CodPro'] = $CodPro;
		$this->loadView('contratos/relatorios/relContratoEstoquePorPeriodoPro', $dados);
	}

	public function relfuncconPEstoqueTipoPro($data1,$data2,$tipoc,$CodPro){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$dados['tipoc'] = $tipoc;
		$dados['CodPro'] = $CodPro;
		$this->loadView('contratos/relatorios/relContratoEstoquePorPeriodoTipoPro', $dados);
	}

	public function relfuncconF($id){
		$dados = array();
		$dados['fornecedor'] = $id;
		
		$this->loadView('contratos/relatorios/relContratoF', $dados);
	}

	public function relfuncconPCancel($data1,$data2){
		$dados = array();
		$dados['data1'] = $data1;
		$dados['data2'] = $data2;
		$this->loadView('contratos/relatorios/relContratoPorPeriodoCancel', $dados);
	}

// Fim de funçoes de relatorios


// Gerar CSV

    public function gerarCsvContratosPorPeriodo($data1,$data2) {
        $model = new Contratos();
        $dados = $model->csvContratosPorPeriodo($data1, $data2);

        // Criação do arquivo CSV
        $nomeArquivo = 'ContratosPorPeriodo.csv';

        // Define o cabeçalho das colunas
        $cabecalho = array('NumeroContrato', 'DataContrato', 'Fornecedor', 'Produto', 'QtdSacas', 'Toneladas', 'PesoKG', 'ValorSaca', 'TotalContrato');

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $nomeArquivo . '"');

        $handle = fopen('php://output', 'w');

        // Escreve o cabeçalho
        fputcsv($handle, $cabecalho, ';');
        
        foreach ($dados as $linha) {
            fputcsv($handle, $linha, ';');
        }
        
        fclose($handle);
        exit;
    }

    public function gerarCsvContratosPorFornecedor($CodFor) {
        $model = new Contratos();
        $dados = $model->csvContratosPorFornecedor($CodFor);

        // Criação do arquivo CSV
        $nomeArquivo = 'ContratosPorFornecedor.csv';

        // Define o cabeçalho das colunas
        $cabecalho = array('Fornecedor', 'NumeroContrato', 'DataContrato', 'Produto', 'QtdSacas', 'Toneladas', 'PesoKG', 'ValorSaca', 'TotalContrato');

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $nomeArquivo . '"');

        $handle = fopen('php://output', 'w');

        // Escreve o cabeçalho
        fputcsv($handle, $cabecalho, ';');
        
        foreach ($dados as $linha) {
            fputcsv($handle, $linha, ';');
        }
        
        fclose($handle);
        exit;
    }

// fim CSV
	
}