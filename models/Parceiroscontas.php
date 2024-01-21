<?php
class Parceiroscontas extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM parceirocontas where cmpCodPar = $id");

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


	public function add($CodPar, $BancoPar, $AgPar, $ContaPar, $TipoContaPar, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO parceirocontas (cmpCodPar, cmpBancoPar, cmpAgPar, cmpContaPar, cmpTipoContaPar, usuario) VALUES(:CodPar, :BancoPar, :AgPar, :ContaPar, :TipoContaPar, :usuario)");

		$sql->bindValue(":CodPar",$CodPar);
		$sql->bindValue(":BancoPar",$BancoPar);
		$sql->bindValue(":AgPar",$AgPar);
		$sql->bindValue(":ContaPar",$ContaPar);
		$sql->bindValue(":TipoContaPar",$TipoContaPar);
		$sql->bindValue(":usuario",$usuario);

		$sql->execute();

		return true;

	}



	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM parceirocontas WHERE cmpCodParC = :cmpCodParC");
		$sql->bindValue(":cmpCodParC",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from parceirocontas where cmpCodParC = :cmpCodParC");
		$sql->bindValue(":cmpCodParC", $id);
		$sql->execute();

		return true;
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT * FROM parceirocontas WHERE a.cmpCodParC = :cmpCodParC");
		
		$sql->bindValue(":cmpCodParC",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getParceirossub(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM parceirocontas ORDER BY cmpCodParC");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function updateexa($id, $BancoPar, $AgPar, $ContaPar, $TipoContaPar, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE parceirocontas set cmpBancoPar = :BancoPar, cmpAgPar = :AgPar, cmpContaPar = :ContaPar, cmpTipoContaPar = :TipoContaPar, usuario = :usuario where cmpCodParC = :cmpCodParC");

		$sql->bindValue(":cmpCodParC", $id);
		$sql->bindValue(":BancoPar",$BancoPar);
		$sql->bindValue(":AgPar",$AgPar);
		$sql->bindValue(":ContaPar",$ContaPar);
		$sql->bindValue(":TipoContaPar",$TipoContaPar);
		$sql->bindValue(":usuario",$usuario);

		$sql->execute();

		return true;
	}


}
