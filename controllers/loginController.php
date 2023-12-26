<?php

class loginController extends Controller{
	
	public function index(){

		if (!empty($_SESSION['login']) && isset($_SESSION['login'])) {
			header("Location: ".BASE_URL."home");
		} 


		if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {

			$usuario = addslashes($_POST['usuario']);
			$senha = sha1(addslashes($_POST['senha']));

			$log = new Usuarios();

			if ($u = $log->login($usuario, $senha)) {

				?>
				<script type="text/javascript"> window.location.href="<?=BASE_URL;?>home"; </script>
				<?php

			}else{
				
				$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> Usuário ou Senha inválidos!</h4>
                                                </div>';
			}
			

		}

		$this->loadView('login');
		// print_r("blz");

	}

	public function sair(){

		$this->loadView("sair");
	}



	public function alterarSenha(){

		// print_r($_POST);
		// exit;

		if(!empty($_POST['senhaAtual']) && !empty($_POST['novaSenha']) && !empty($_POST['id_funcionario'])){

			$id_funcionario = $_POST['id_funcionario'];
			$senhaAtual = sha1(addslashes($_POST['senhaAtual']));
			$novaSenha    = sha1(addslashes($_POST['novaSenha']));

			$user = new Usuarios();

			if($pw = $user->alterSenha($id_funcionario,$senhaAtual,$novaSenha)){
				echo "1";
			
			}else{
				echo "2";
			}
			
		}
	}

}