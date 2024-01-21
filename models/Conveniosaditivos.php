<?php
class Conveniosaditivos extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*, (case when DATEDIFF(a.cmpDtVigenciaIniAdi,'0001-01-01')=0 then '0' else '1' end) as DtVigenciaIniAdi, (case when DATEDIFF(a.cmpDtVigenciaFimAdi,'0001-01-01')=0 then '0' else '1' end) as DtVigenciaFimAdi, c.cmpNumCon FROM convenioaditivo a left join conveniocontrato c on a.cmpCodCon = c.cmpCodCon where a.cmpCodConv = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function add($CodConv, $CodCon, $NumAdi, $TipoAdi, $VrAdi, $VrNovoVrConAdi, $DtVigenciaIniAdi, $DtVigenciaFimAdi, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO convenioaditivo (cmpCodConv, cmpCodCon, cmpNumAdi, cmpTipoAdi, cmpVrAdi, cmpVrNovoVrConAdi, cmpDtVigenciaIniAdi, cmpDtVigenciaFimAdi, usuario, cmpCodEmp) VALUES (:CodConv, :CodCon, :NumAdi, :TipoAdi, :VrAdi, :VrNovoVrConAdi, :DtVigenciaIniAdi, :DtVigenciaFimAdi, :usuario, :CodEmp)");

		if (empty($CodConv)) {
			$CodConv = 0;
		}
		$sql->bindValue(":CodConv",$CodConv);
		if (empty($CodCon)) {
			$CodCon = 0;
		}
		$sql->bindValue(":CodCon",$CodCon);
		$sql->bindValue(":NumAdi",$NumAdi);
		$sql->bindValue(":TipoAdi",$TipoAdi);
		if (empty($VrAdi)) {
			$VrAdi = 0;
		}
		$sql->bindValue(":VrAdi",$VrAdi);
		if (empty($VrNovoVrConAdi)) {
			$VrNovoVrConAdi = 0;
		}
		$sql->bindValue(":VrNovoVrConAdi",$VrNovoVrConAdi);
		if (empty($DtVigenciaIniAdi)) {
			$DtVigenciaIniAdi = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaIniAdi",$DtVigenciaIniAdi);
		if (empty($DtVigenciaFimAdi)) {
			$DtVigenciaFimAdi = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaFimAdi",$DtVigenciaFimAdi);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);

		$sql->execute();

		return true;

	}


	public function update($id, $CodCon, $NumAdi, $TipoAdi, $VrAdi, $VrNovoVrConAdi, $DtVigenciaIniAdi, $DtVigenciaFimAdi, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE convenioaditivo set cmpCodCon = :CodCon, cmpNumAdi = :NumAdi, cmpTipoAdi =:TipoAdi, cmpVrAdi = :VrAdi, cmpVrNovoVrConAdi =:VrNovoVrConAdi, cmpDtVigenciaIniAdi =:DtVigenciaIniAdi, cmpDtVigenciaFimAdi =:DtVigenciaFimAdi, usuario = :usuario, cmpCodEmp = :CodEmp where cmpCodAdi = :cmpCodAdi");

		$sql->bindValue(":cmpCodAdi", $id);
		if (empty($CodCon)) {
			$CodCon = 0;
		}
		$sql->bindValue(":CodCon",$CodCon);
		$sql->bindValue(":NumAdi",$NumAdi);
		$sql->bindValue(":TipoAdi",$TipoAdi);
		if (empty($VrAdi)) {
			$VrAdi = 0;
		}
		$sql->bindValue(":VrAdi",$VrAdi);
		if (empty($VrNovoVrConAdi)) {
			$VrNovoVrConAdi = 0;
		}
		$sql->bindValue(":VrNovoVrConAdi",$VrNovoVrConAdi);
		if (empty($DtVigenciaIniAdi)) {
			$DtVigenciaIniAdi = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaIniAdi",$DtVigenciaIniAdi);
		if (empty($DtVigenciaFimAdi)) {
			$DtVigenciaFimAdi = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaFimAdi",$DtVigenciaFimAdi);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);

		$sql->execute();

		return true;
	}


	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM convenioaditivo WHERE cmpCodAdi = :cmpCodAdi");
		$sql->bindValue(":cmpCodAdi",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from convenioaditivo where cmpCodAdi = :cmpCodAdi");
		$sql->bindValue(":cmpCodAdi", $id);
		$sql->execute();

		return true;
	}


	public function getListId($c,$id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT a.*, c.cmpNumCon FROM convenioaditivo a left join conveniocontrato c on a.cmpCodCon = c.cmpCodCon WHERE cmpCodAdi = :cmpCodAdi");
		
		$sql->bindValue(":cmpCodAdi",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getConveniosaditivos(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM convenioaditivo ORDER BY cmpCodAdi");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function getConvenioscontratosconvenios($c){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM conveniocontrato where cmpCodConv = $c ORDER BY cmpCodCon");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
