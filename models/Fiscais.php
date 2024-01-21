<?php
class Fiscais extends Model{

	public function getList(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM fiscal");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function add($NomeFis, $FoneFis, $CelularFis, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO fiscal (cmpNomeFis, cmpFoneFis, cmpCelularFis, usuario) VALUES(:NomeFis, :FoneFis, :CelularFis, :usuario)");

		$sql->bindValue(":NomeFis",$NomeFis);
		$sql->bindValue(":FoneFis",$FoneFis);
		$sql->bindValue(":CelularFis",$CelularFis);
		$sql->bindValue(":usuario",$usuario);
		
		$sql->execute();

		return true;

	}


	public function update($id, $NomeFis, $FoneFis, $CelularFis, $usuario, $inativo){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE fiscal set cmpNomeFis = :NomeFis, cmpFoneFis = :FoneFis, cmpCelularFis = :CelularFis, usuario = :usuario, inativo = :inativo where cmpCodFis = :cmpCodFis");

		$sql->bindValue(":cmpCodFis", $id);
		$sql->bindValue(":NomeFis",$NomeFis);
		$sql->bindValue(":FoneFis",$FoneFis);
		$sql->bindValue(":CelularFis",$CelularFis);
		$sql->bindValue(":usuario",$usuario);
		$sql->bindValue(":inativo",$inativo);

		$sql->execute();

		return true;
	}


	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM fiscal WHERE cmpCodFis = :cmpCodFis");
		$sql->bindValue(":cmpCodFis",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

/*		if ($this->validFiscalDel($id) == true) {*/
			$sql = $this->db->prepare("DELETE from fiscal where cmpCodFis = :cmpCodFis");
			$sql->bindValue(":cmpCodFis", $id);
			$sql->execute();
			return true;
/*		} else {
			return false;
		}*/

	}


	public function validFiscalDel($id){
		$valida = 0;
		$sql = $this->db->prepare("SELECT count(cmpCodFis) as tot from convenio where cmpCodFis = :cmpCodFis");
		$sql->bindValue(":cmpCodFis", $id);
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
		$sql= $this->db->prepare("SELECT * FROM fiscal WHERE cmpCodFis = :cmpCodFis");
		
		$sql->bindValue(":cmpCodFis",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getFiscais(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT cmpCodFis, cmpNomeFis FROM fiscal ORDER BY cmpNomeFis");
		
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
