<?php
class Conveniosdesembolsos extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT *, (case when DATEDIFF(cmpDtDes,'0001-01-01')=0 then '0' else '1' end) as DtDes FROM conveniodesembolso where cmpCodConv = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function getListTotais($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT sum(cmpVrRepasseDes) as totVrRepasseDes, sum(cmpVrCpDes) as totVrCpDes, sum(cmpVrTotalDes) as totVrTotalDes FROM conveniodesembolso where cmpCodConv = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function add($CodConv, $DtDes, $VrRepasseDes, $VrCpDes, $VrTotalDes, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO conveniodesembolso (cmpCodConv, cmpDtDes, cmpVrRepasseDes, cmpVrCpDes, cmpVrTotalDes, usuario, cmpCodEmp) VALUES (:CodConv, :DtDes, :VrRepasseDes, :VrCpDes, :VrTotalDes, :usuario, :CodEmp)");

		if (empty($CodConv)) {
			$CodConv = 0;
		}
		$sql->bindValue(":CodConv",$CodConv);
		if (empty($DtDes)) {
			$DtDes = '0001-01-01';
		}
		$sql->bindValue(":DtDes",$DtDes);
		if (empty($VrRepasseDes)) {
			$VrRepasseDes = 0;
		}
		$sql->bindValue(":VrRepasseDes",$VrRepasseDes);
		if (empty($VrCpDes)) {
			$VrCpDes = 0;
		}
		$sql->bindValue(":VrCpDes",$VrCpDes);
		if (empty($VrTotalDes)) {
			$VrTotalDes = 0;
		}
		$sql->bindValue(":VrTotalDes",$VrTotalDes);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);

		$sql->execute();

		return true;

	}


	public function update($id, $DtDes, $VrRepasseDes, $VrCpDes, $VrTotalDes, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE conveniodesembolso set cmpDtDes = :DtDes, cmpVrRepasseDes = :VrRepasseDes, cmpVrCpDes =:VrCpDes, cmpVrTotalDes =:VrTotalDes, usuario = :usuario, cmpCodEmp = :CodEmp where cmpCodDes = :cmpCodDes");

		$sql->bindValue(":cmpCodDes", $id);
		if (empty($DtDes)) {
			$DtDes = '0001-01-01';
		}
		$sql->bindValue(":DtDes",$DtDes);
		if (empty($VrRepasseDes)) {
			$VrRepasseDes = 0;
		}
		$sql->bindValue(":VrRepasseDes",$VrRepasseDes);
		if (empty($VrCpDes)) {
			$VrCpDes = 0;
		}
		$sql->bindValue(":VrCpDes",$VrCpDes);
		if (empty($VrTotalDes)) {
			$VrTotalDes = 0;
		}
		$sql->bindValue(":VrTotalDes",$VrTotalDes);
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
		$sql = $this->db->prepare("SELECT * FROM conveniodesembolso WHERE cmpCodDes = :cmpCodDes");
		$sql->bindValue(":cmpCodDes",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from conveniodesembolso where cmpCodDes = :cmpCodDes");
		$sql->bindValue(":cmpCodDes", $id);
		$sql->execute();

		return true;
	}


	public function getListId($c,$id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT * FROM conveniodesembolso WHERE cmpCodDes = :cmpCodDes");
		
		$sql->bindValue(":cmpCodDes",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getConveniosdesembolsos(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM conveniodesembolso ORDER BY cmpCodDes");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
