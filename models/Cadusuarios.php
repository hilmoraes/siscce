<?php
class Cadusuarios extends Model{

	public function getList(){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.*, b.nm_status FROM login a left join status b on a.id_status = b.id_status");

		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function add($usuario, $senha, $id_status, $Sexo, $NomeUsu, $FuncaoUsu){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO login (usuario, senha, id_status, cmpSexo, cmpNomeUsu, cmpFuncaoUsu) VALUES(:usuario, :senha, :id_status, :Sexo, :NomeUsu, :FuncaoUsu)");

		$sql->bindValue(":usuario",$usuario);
		$sql->bindValue(":senha",$senha);
		$sql->bindValue(":id_status",$id_status);
		$sql->bindValue(":Sexo",$Sexo);
		$sql->bindValue(":NomeUsu",$NomeUsu);
		$sql->bindValue(":FuncaoUsu",$FuncaoUsu);
		
		$sql->execute();

		return true;

	}



	public function getStatus(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT id_status, nm_status FROM status ORDER BY nm_status");
		
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;

	}

	public function getCadusuariossta($id){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.id_status, b.nm_status FROM login a left join status b on a.id_status = b.id_status where id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}




	public function update($id, $usuario, $senha, $id_status, $Sexo, $NomeUsu, $FuncaoUsu){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE login set usuario = :usuario, senha = :senha, id_status = :id_status, cmpSexo = :Sexo, cmpNomeUsu = :NomeUsu, cmpFuncaoUsu = :FuncaoUsu where id = :id");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":usuario",$usuario);
		$sql->bindValue(":senha",$senha);
		$sql->bindValue(":id_status",$id_status);
		$sql->bindValue(":Sexo",$Sexo);
		$sql->bindValue(":NomeUsu",$NomeUsu);
		$sql->bindValue(":FuncaoUsu",$FuncaoUsu);

		$sql->execute();

		return true;
	}



	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM login WHERE id = :id");
		$sql->bindValue(":id",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from login where id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		return true;
	}



	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT a.*, b.nm_status FROM login a left join status b on a.id_status = b.id_status WHERE id = :id");
		
		$sql->bindValue(":id",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}


	
	public function getCadusuarios(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT id, usuario, senha, id_status, cmpSexo, cmpNomeUsu, cmpFuncaoUsu FROM login ORDER BY usuario");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
