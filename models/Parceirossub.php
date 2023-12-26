<?php
class Parceirossub extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM parceirocontatos where cmpCodPar = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function getListHistorico($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*, b.cmpNomePro FROM contrato a left join produto b on a.cmpCodPro = b.cmpCodPro where cmpCodPar = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function add($CodPar, $NomeCon, $EmailCon, $FoneCon, $CelularCon, $CargoCon, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO parceirocontatos (cmpCodPar, cmpNomeCon, cmpEmailCon, cmpFoneCon, cmpCelularCon, cmpCargoCon, usuario) VALUES(:CodPar, :NomeCon, :EmailCon, :FoneCon, :CelularCon, :CargoCon, :usuario)");

		$sql->bindValue(":CodPar",$CodPar);
		$sql->bindValue(":NomeCon",$NomeCon);
		$sql->bindValue(":EmailCon",$EmailCon);
		$sql->bindValue(":FoneCon",$FoneCon);
		$sql->bindValue(":CelularCon",$CelularCon);
		$sql->bindValue(":CargoCon",$CargoCon);
		$sql->bindValue(":usuario",$usuario);

		$sql->execute();

		return true;

	}



	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM parceirocontatos WHERE cmpCodCon = :cmpCodCon");
		$sql->bindValue(":cmpCodCon",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from parceirocontatos where cmpCodCon = :cmpCodCon");
		$sql->bindValue(":cmpCodCon", $id);
		$sql->execute();

		return true;
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT * FROM parceirocontatos WHERE a.cmpCodCon = :cmpCodCon");
		
		$sql->bindValue(":cmpCodCon",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getParceirossub(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM parceirocontatos ORDER BY cmpCodCon");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function updateexa($id, $NomeCon, $EmailCon, $FoneCon, $CelularCon, $CargoCon, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE parceirocontatos set cmpNomeCon = :NomeCon, cmpEmailCon = :EmailCon, cmpFoneCon = :FoneCon, cmpCelularCon = :CelularCon, cmpCargoCon = :CargoCon, usuario = :usuario where cmpCodCon = :cmpCodCon");

		$sql->bindValue(":cmpCodCon", $id);
		$sql->bindValue(":NomeCon",$NomeCon);
		$sql->bindValue(":EmailCon",$EmailCon);
		$sql->bindValue(":FoneCon",$FoneCon);
		$sql->bindValue(":CelularCon",$CelularCon);
		$sql->bindValue(":CargoCon",$CargoCon);
		$sql->bindValue(":usuario",$usuario);

		$sql->execute();

		return true;
	}


}
