<?php
class Prefeiturascontas extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM prefeituracontas where cmpCodPre = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function getListHistorico($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*, b.cmpNomePro FROM contrato a left join produto b on a.cmpCodPro = b.cmpCodPro where cmpCodPre = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function add($CodPre, $BancoPre, $AgPre, $ContaPre, $TipoContaPre, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO prefeituracontas (cmpCodPre, cmpBancoPre, cmpAgPre, cmpContaPre, cmpTipoContaPre, usuario) VALUES(:CodPre, :BancoPre, :AgPre, :ContaPre, :TipoContaPre, :usuario)");

		$sql->bindValue(":CodPre",$CodPre);
		$sql->bindValue(":BancoPre",$BancoPre);
		$sql->bindValue(":AgPre",$AgPre);
		$sql->bindValue(":ContaPre",$ContaPre);
		$sql->bindValue(":TipoContaPre",$TipoContaPre);
		$sql->bindValue(":usuario",$usuario);

		$sql->execute();

		return true;

	}



	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM prefeituracontas WHERE cmpCodPreC = :cmpCodPreC");
		$sql->bindValue(":cmpCodPreC",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from prefeituracontas where cmpCodPreC = :cmpCodPreC");
		$sql->bindValue(":cmpCodPreC", $id);
		$sql->execute();

		return true;
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT * FROM prefeituracontas WHERE a.cmpCodPreC = :cmpCodPreC");
		
		$sql->bindValue(":cmpCodPreC",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getPrefeiturassub(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM prefeituracontas ORDER BY cmpCodPreC");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function updateexa($id, $BancoPre, $AgPre, $ContaPre, $TipoContaPre, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE prefeituracontas set cmpBancoPre = :BancoPre, cmpAgPre = :AgPre, cmpContaPre = :ContaPre, cmpTipoContaPre = :TipoContaPre, usuario = :usuario where cmpCodPreC = :cmpCodPreC");

		$sql->bindValue(":cmpCodPreC", $id);
		$sql->bindValue(":BancoPre",$BancoPre);
		$sql->bindValue(":AgPre",$AgPre);
		$sql->bindValue(":ContaPre",$ContaPre);
		$sql->bindValue(":TipoContaPre",$TipoContaPre);
		$sql->bindValue(":usuario",$usuario);

		$sql->execute();

		return true;
	}


}
