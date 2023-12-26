<?php
class Gestores extends Model{

	public function getList(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM gestor");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function add($NomeGes, $FoneGes, $CelularGes, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO gestor (cmpNomeGes, cmpFoneGes, cmpCelularGes, usuario) VALUES(:NomeGes, :FoneGes, :CelularGes, :usuario)");

		$sql->bindValue(":NomeGes",$NomeGes);
		$sql->bindValue(":FoneGes",$FoneGes);
		$sql->bindValue(":CelularGes",$CelularGes);
		$sql->bindValue(":usuario",$usuario);
		
		$sql->execute();

		return true;

	}


	public function update($id, $NomeGes, $FoneGes, $CelularGes, $usuario, $inativo){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE gestor set cmpNomeGes = :NomeGes, cmpFoneGes = :FoneGes, cmpCelularGes = :CelularGes, usuario = :usuario, inativo = :inativo where cmpCodGes = :cmpCodGes");

		$sql->bindValue(":cmpCodGes", $id);
		$sql->bindValue(":NomeGes",$NomeGes);
		$sql->bindValue(":FoneGes",$FoneGes);
		$sql->bindValue(":CelularGes",$CelularGes);
		$sql->bindValue(":usuario",$usuario);
		$sql->bindValue(":inativo",$inativo);

		$sql->execute();

		return true;
	}


	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM gestor WHERE cmpCodGes = :cmpCodGes");
		$sql->bindValue(":cmpCodGes",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

/*		if ($this->validGestorDel($id) == true) {*/
			$sql = $this->db->prepare("DELETE from gestor where cmpCodGes = :cmpCodGes");
			$sql->bindValue(":cmpCodGes", $id);
			$sql->execute();
			return true;
/*		} else {
			return false;
		}*/

	}


	public function validGestorDel($id){
		$valida = 0;
		$sql = $this->db->prepare("SELECT count(cmpCodGes) as tot from convenio where cmpCodGes = :cmpCodGes");
		$sql->bindValue(":cmpCodGes", $id);
		$sql->execute();
		$valida = $sql->fetch();
		if($valida['tot']  == '0'){
			return true;
		}else{
			return false;
		}
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT * FROM gestor WHERE cmpCodGes = :cmpCodGes");
		
		$sql->bindValue(":cmpCodGes",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getGestores(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT cmpCodGes, cmpNomeGes FROM gestor ORDER BY cmpNomeGes");
		
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
