<?php
class Usuarios extends Model{

	public function login($usuario, $senha){

		// print_r($usuario);
		// print_r($senha);
		// exit();

		$sql = $this->db->prepare("SELECT * FROM login  WHERE usuario = :usuario and senha = :senha");
		$sql->bindValue(":usuario",$usuario);
		$sql->bindValue(":senha",$senha);
		$sql->execute();
		
		if($sql->rowCount() > 0){

			$dados = $sql->fetch(PDO::FETCH_ASSOC);

			$_SESSION['id_login'] = $dados['id'];
			$_SESSION['login'] = $dados['usuario'];
			$_SESSION['status'] = $dados['id_status'];
			$_SESSION['sexo'] = $dados['cmpSexo'];
			$_SESSION['nomensu'] = $dados['cmpNomeUsu'];
			$_SESSION['funcaousu'] = $dados['cmpFuncaoUsu'];

			return true;	

		}else{

			return false;

		}

	}


	public function alterSenha($id_funcionario,$senhaAtual,$novaSenha){

		if(!empty($id_funcionario)){
			$pw = $this->db->prepare("UPDATE login SET senha=:nova_senha WHERE usuario = :id_funcionario AND senha=:senha");

			$pw->bindValue(":id_funcionario",$id_funcionario);
			$pw->bindValue(":senha",$senhaAtual);
			$pw->bindValue(":nova_senha",$novaSenha);
			$pw->execute();
			if($pw->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}

}