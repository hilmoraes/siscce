<?php
class Convenioscontratos extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*, (case when DATEDIFF(a.cmpDtVigenciaIniCon,'0001-01-01')=0 then '0' else '1' end) as DtVigenciaIniCon, (case when DATEDIFF(a.cmpDtVigenciaFimCon,'0001-01-01')=0 then '0' else '1' end) as DtVigenciaFimCon, b.cmpNomePar, b.cmpCpfCnpjPar, c.cmpNumLic FROM conveniocontrato a left join parceiro b on a.cmpCodPar = b.cmpCodPar left join conveniolicitacao c on a.cmpCodLic = c.cmpCodLic where a.cmpCodConv = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function add($CodConv, $CodLic, $DtVigenciaIniCon, $DtVigenciaFimCon, $VrCon, $CodPar, $NumCon, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO conveniocontrato (cmpCodConv, cmpCodLic, cmpDtVigenciaIniCon, cmpDtVigenciaFimCon, cmpVrCon, cmpCodPar, cmpNumCon, usuario, cmpCodEmp) VALUES (:CodConv, :CodLic, :DtVigenciaIniCon, :DtVigenciaFimCon, :VrCon, :CodPar, :NumCon, :usuario, :CodEmp)");

		if (empty($CodConv)) {
			$CodConv = 0;
		}
		$sql->bindValue(":CodConv",$CodConv);
		if (empty($CodLic)) {
			$CodLic = 0;
		}
		$sql->bindValue(":CodLic",$CodLic);
		if (empty($DtVigenciaIniCon)) {
			$DtVigenciaIniCon = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaIniCon",$DtVigenciaIniCon);
		if (empty($DtVigenciaFimCon)) {
			$DtVigenciaFimCon = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaFimCon",$DtVigenciaFimCon);
		if (empty($VrCon)) {
			$VrCon = 0;
		}
		$sql->bindValue(":VrCon",$VrCon);
		if (empty($CodPar)) {
			$CodPar = 0;
		}
		$sql->bindValue(":CodPar",$CodPar);
		$sql->bindValue(":NumCon",$NumCon);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);

		$sql->execute();

		return true;

	}


	public function getParceiros(){
		$array = array();
		$sql = $this->db->query("SELECT cmpCodPar, cmpNomePar FROM Parceiro ORDER BY cmpNomePar");
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function update($id, $CodLic, $DtVigenciaIniCon, $DtVigenciaFimCon, $VrCon, $CodPar, $NumCon, $usuario, $CodEmp){
// print_r($id . '-' . $CodLic . '-' . $DtVigenciaIniCon . '-' . $DtVigenciaFimCon . '-' . $VrCon . '-' . $CodPar . '-' . $NumCon . '-' . $usuario . '-' . $CodEmp);
// exit();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE conveniocontrato set cmpCodLic = :CodLic, cmpDtVigenciaIniCon = :DtVigenciaIniCon, cmpDtVigenciaFimCon =:DtVigenciaFimCon, cmpVrCon = :VrCon, cmpCodPar =:CodPar, cmpNumCon =:NumCon, usuario = :usuario, cmpCodEmp = :CodEmp where cmpCodCon = :cmpCodCon");

		$sql->bindValue(":cmpCodCon", $id);
		if (empty($CodLic)) {
			$CodLic = 0;
		}
		$sql->bindValue(":CodLic",$CodLic);
		if (empty($DtVigenciaIniCon)) {
			$DtVigenciaIniCon = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaIniCon",$DtVigenciaIniCon);
		if (empty($DtVigenciaFimCon)) {
			$DtVigenciaFimCon = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaFimCon",$DtVigenciaFimCon);
		if (empty($VrCon)) {
			$VrCon = 0;
		}
		$sql->bindValue(":VrCon",$VrCon);
		if (empty($CodPar)) {
			$CodPar = 0;
		}
		$sql->bindValue(":CodPar",$CodPar);
		$sql->bindValue(":NumCon",$NumCon);
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
		$sql = $this->db->prepare("SELECT * FROM conveniocontrato WHERE cmpCodCon = :cmpCodCon");
		$sql->bindValue(":cmpCodCon",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from conveniocontrato where cmpCodCon = :cmpCodCon");
		$sql->bindValue(":cmpCodCon", $id);
		$sql->execute();

		return true;
	}


	public function getListId($c,$id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT a.*, b.cmpNomePar, c.cmpNumLic FROM conveniocontrato a left join parceiro b on a.cmpCodPar = b.cmpCodPar left join conveniolicitacao c on a.cmpCodLic = c.cmpCodLic WHERE cmpCodCon = :cmpCodCon");
		
		$sql->bindValue(":cmpCodCon",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getConvenioscontratos(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM conveniocontrato ORDER BY cmpCodCon");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function getConvenioslicitacoesconvenios($c){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM conveniolicitacao where cmpCodConv = $c ORDER BY cmpCodLic");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
