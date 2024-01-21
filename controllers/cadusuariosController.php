<?php

class cadusuariosController extends Controller{

	public function index(){

		$dados = array();

		$status = new Status();
		$cf = $status->getStatus();

		$cadusuario = new Cadusuarios();
		$c = $cadusuario->getCadusuarios();

		$dados['cadusuarios'] = $c;
		$dados['status'] = $cf;

		$this->loadTemplate('cadusuarios/cadastro', $dados);
	}



	public function lista(){

		$dados = array();

		$cadusuario = new Cadusuarios();
		$c = $cadusuario->getList();

		$dados['cadusuarios'] = $c;

		$this->loadTemplate('cadusuarios/listagem',$dados);
	}


	public function add(){

		$dados = array();

		$usuario = addslashes($_POST['usuario']);
		$senha = sha1(addslashes($_POST['senha']));
		$id_status = addslashes($_POST['id_status']);
		$Sexo = addslashes($_POST['Sexo']);
		$NomeUsu = addslashes($_POST['NomeUsu']);
		$FuncaoUsu = addslashes($_POST['FuncaoUsu']);

		$cadusuarios = new Cadusuarios();

		if($c = $cadusuarios->add($usuario, $senha, $id_status, $Sexo, $NomeUsu, $FuncaoUsu)){

			header("Location: ".BASE_URL.'cadusuarios/lista');
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Cadastrado com sucesso!</h4>
                                                </div>';

		}else{
			header("Location: ".BASE_URL.'cadusuarios/lista');
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Cadastrar!</h4>
                                                </div>';
		}
		
	}



	public function edit($id){
		$dados = array();

		$cadu = new Cadusuarios();
		$status = new Status();

		$dados['cadusuario'] = $cadu->getListId($id);
		$dados['status'] = $status->getStatus();

		$this->loadTemplate('cadusuarios/editar',$dados);
	}



	public function update(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$id = $_POST['id'];
			$usuario = addslashes($_POST['usuario']);
			$senha = sha1(addslashes($_POST['senha']));
			$id_status = addslashes($_POST['id_status']);
			$Sexo = addslashes($_POST['Sexo']);
			$NomeUsu = addslashes($_POST['NomeUsu']);
			$FuncaoUsu = addslashes($_POST['FuncaoUsu']);

			$cadusuario = new Cadusuarios();
			
			if ($c = $cadusuario->update($id, $usuario, $senha, $id_status, $Sexo, $NomeUsu, $FuncaoUsu)){

				header("Location: ".BASE_URL.'cadusuarios/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Alterado com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'cadusuarios/listas');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Alterar!</h4>
                                                </div>';
			}
		}

	}


	public function excluir($id){
		$dados = array();

		$cadusua = new Cadusuarios();

		if(isset($id) && !empty($id)){
			$c = $cadusua->del($id);
		}
		
		if ($c = $cadusua->del($id)){

				header("Location: ".BASE_URL.'cadusuarios/lista');
				$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Excluido com sucesso!</h4>
                                                </div>';

			}else{
				header("Location: ".BASE_URL.'cadusuarios/lista');
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Falha ao Excluir!</h4>
                                                </div>';
			}
	}


	public function delete(){

		if(isset($_POST['id']) && !empty($_POST['id'])){

			$cadusuario = new Cadusuarios();
			
			if ($c = $cadusuario->delete($id)){

				header("Location: ".BASE_URL.'cadusuarios/lista');
				$_SESSION['msg'] = 'Excluído com sucesso!';

			}else{
				header("Location: ".BASE_URL.'cadusuarios/lista');
				$_SESSION['msg'] = 'Erro ao excluir registro!';
			}
		}

	}

}
