<?php
class Contratossub extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*, (case when DATEDIFF(a.cmpDtBaixaCon,'0001-01-01')=0 then '0' else '1' end) as DtBaixaCon, (case when DATEDIFF(a.cmpDtChCon,'0001-01-01')=0 then '0' else '1' end) as DtChCon FROM contratosub a where a.cmpCodLanc = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function add($CodLanc, $DtBaixaCon, $VrCon, $VrAcresCon, $VrDescCon, $VrTotalCon, $FormaPgtoCon, $NumChCon, $DtChCon, $BancoChCon, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO contratosub (cmpCodLanc, cmpDtBaixaCon, cmpVrCon, cmpVrAcresCon, cmpVrDescCon, cmpVrTotalCon, cmpFormaPgtoCon, cmpNumChCon, cmpDtChCon, cmpBancoChCon, usuario) VALUES(:CodLanc, :DtBaixaCon, :VrCon, :VrAcresCon, :VrDescCon, :VrTotalCon, :FormaPgtoCon, :NumChCon, :DtChCon, :BancoChCon, :usuario)");

		$sql->bindValue(":CodLanc",$CodLanc);
		if (empty($DtBaixaCon)) {
			$DtBaixaCon = '0001-01-01';
		}
		$sql->bindValue(":DtBaixaCon",$DtBaixaCon);
		if (empty($VrCon)) {
			$VrCon = 0;
		}
		$sql->bindValue(":VrCon",$VrCon);

		if (empty($VrAcresCon)) {
			$VrAcresCon = 0;
		}
		$sql->bindValue(":VrAcresCon",$VrAcresCon);
		if (empty($VrDescCon)) {
			$VrDescCon = 0;
		}
		$sql->bindValue(":VrDescCon",$VrDescCon);
		if (empty($VrTotalCon)) {
			$VrTotalCon = 0;
		}
		$sql->bindValue(":VrTotalCon",$VrTotalCon);

		$sql->bindValue(":FormaPgtoCon",$FormaPgtoCon);
		$sql->bindValue(":NumChCon",$NumChCon);
		if (empty($DtChCon)) {
			$DtChCon = '0001-01-01';
		}
		$sql->bindValue(":DtChCon",$DtChCon);
		$sql->bindValue(":BancoChCon",$BancoChCon);
		$sql->bindValue(":usuario",$usuario);
		
		$sql->execute();

		$this->calcpagamento($CodLanc);

		return true;

	}


	public function calcpagamento($id){

		$valida = 0;
		$sql1 = $this->db->query("SELECT sum(cmpVrTotalCon) as VrTotalCon FROM contratosub WHERE cmpCodLanc = $id");
		$sql1->execute();
		$valida = $sql1->fetch();
		$VrTotalCon = $valida['VrTotalCon'];
		if (empty($VrTotalCon)) {
			$VrTotalCon = 0;
		}
		
		$sql3 = $this->db->prepare(" UPDATE contrato set cmpVrPagoCon = $VrTotalCon where cmpCodLanc = $id");
		$sql3->execute();

		return true;

	}



	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM contratosub WHERE cmpCodConSub = :cmpCodConSub");
		$sql->bindValue(":cmpCodConSub",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$valida0 = 0;
		$sql0 = $this->db->query("SELECT cmpCodLanc FROM contratosub WHERE cmpCodConSub = $id");
		$sql0->execute();
		$valida0 = $sql0->fetch();
		$CodLanc = $valida0['cmpCodLanc'];
		if (empty($CodLanc)) {
			$CodLanc = 0;
		}

		$sql = $this->db->prepare("DELETE from contratosub where cmpCodConSub = :cmpCodConSub");
		$sql->bindValue(":cmpCodConSub", $id);
		$sql->execute();

		$this->calcpagamento($CodLanc);

		// $valida = 0;
		// $sql1 = $this->db->query("SELECT sum(cmpVrTotalCon) as VrTotalCon FROM contratosub WHERE cmpCodCon = $CodLanc");
		// $sql1->execute();
		// $valida = $sql1->fetch();
		// $VrTotalCon = $valida['VrTotalCon'];
		// if (empty($VrTotalCon)) {
		// 	$VrTotalCon = 0;
		// }
		// $valida2 = 0;
		// $sql2 = $this->db->query("SELECT cmpVrFreteTotal FROM contrato WHERE cmpCodLanc = $CodLanc");
		// $sql2->execute();
		// $valida2 = $sql2->fetch();
		// $VrFreteTotal = $valida2['cmpVrFreteTotal'];
		// if (empty($VrFreteTotal)) {
		// 	$VrFreteTotal = 0;
		// }
		// $VrSaldo = $VrFreteTotal - $VrTotalCon;
		// $sql3 = $this->db->prepare(" UPDATE contrato set cmpVrTotalCon = $VrTotalCon, cmpVrSaldo = $VrSaldo where cmpCodLanc = $CodLanc");
		// $sql3->execute();

		return true;
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT * FROM contratosub WHERE a.cmpCodConSub = :cmpCodConSub");
		
		$sql->bindValue(":cmpCodConSub",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getContratossub(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM contratosub ORDER BY cmpCodConSub");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function updateexa($id, $DtAdiant, $VrTotalCon, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE contratosub set cmpDtAdiant = :DtAdiant, cmpVrTotalCon = :VrTotalCon, usuario = :usuario, CodEmp = :CodEmp where cmpCodConSub = :cmpCodConSub");

		if (empty($CodExa)) {
			$CodExa = 0;
		}
		$sql->bindValue(":cmpCodConSub", $id);
		if (empty($DtAdiant)) {
			$DtAdiant = '0001-01-01';
		}
		$sql->bindValue(":DtAdiant",$DtAdiant);
		$sql->bindValue(":VrTotalCon",$VrTotalCon);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);

		$sql->execute();

		return true;
	}


}
