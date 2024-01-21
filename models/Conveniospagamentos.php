<?php
class Conveniospagamentos extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*, (case when DATEDIFF(a.cmpDtPag,'0001-01-01')=0 then '0' else '1' end) as DtPag, b.cmpNomePar FROM conveniopagamento a left join parceiro b on a.cmpCodPar = b.cmpCodPar where cmpCodConv = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function getListTotais($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT sum(cmpVrRepassePag) as totVrRepassePag, sum(cmpVrCpPag) as totVrCpPag, sum(cmpVrTotalPag) as totVrTotalPag FROM conveniopagamento where cmpCodConv = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function add($CodConv, $DtPag, $DocPag, $VrTotalPag, $VrRepassePag, $VrCpPag, $CodPar, $TipoPag, $SituacaoPag, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO conveniopagamento (cmpCodConv, cmpDtPag, cmpDocPag, cmpVrTotalPag, cmpVrRepassePag, cmpVrCpPag, cmpCodPar, cmpTipoPag, cmpSituacaoPag, usuario, cmpCodEmp) VALUES (:CodConv, :DtPag, :DocPag, :VrTotalPag, :VrRepassePag, :VrCpPag, :CodPar, :TipoPag, :SituacaoPag, :usuario, :CodEmp)");

		if (empty($CodConv)) {
			$CodConv = 0;
		}
		$sql->bindValue(":CodConv",$CodConv);
		if (empty($DtPag)) {
			$DtPag = '0001-01-01';
		}
		$sql->bindValue(":DtPag",$DtPag);
		$sql->bindValue(":DocPag",$DocPag);
		if (empty($VrTotalPag)) {
			$VrTotalPag = 0;
		}
		$sql->bindValue(":VrTotalPag",$VrTotalPag);
		if (empty($VrRepassePag)) {
			$VrRepassePag = 0;
		}
		$sql->bindValue(":VrRepassePag",$VrRepassePag);
		if (empty($VrCpPag)) {
			$VrCpPag = 0;
		}
		$sql->bindValue(":VrCpPag",$VrCpPag);
		if (empty($CodPar)) {
			$CodPar = 0;
		}
		$sql->bindValue(":CodPar",$CodPar);
		$sql->bindValue(":TipoPag",$TipoPag);
		$sql->bindValue(":SituacaoPag",$SituacaoPag);
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


	public function update($id, $DtPag, $DocPag, $VrTotalPag, $VrRepassePag, $VrCpPag, $CodPar, $TipoPag, $SituacaoPag, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE conveniopagamento set cmpDtPag = :DtPag, cmpDocPag = :DocPag, cmpVrTotalPag =:VrTotalPag, cmpVrRepassePag = :VrRepassePag, cmpVrCpPag = :VrCpPag, cmpCodPar =:CodPar, cmpTipoPag = :TipoPag, cmpSituacaoPag = :SituacaoPag, usuario = :usuario, cmpCodEmp = :CodEmp where cmpCodPag = :cmpCodPag");

		$sql->bindValue(":cmpCodPag", $id);
		if (empty($DtPag)) {
			$DtPag = '0001-01-01';
		}
		$sql->bindValue(":DtPag",$DtPag);
		$sql->bindValue(":DocPag",$DocPag);
		if (empty($VrTotalPag)) {
			$VrTotalPag = 0;
		}
		$sql->bindValue(":VrTotalPag",$VrTotalPag);
		if (empty($VrRepassePag)) {
			$VrRepassePag = 0;
		}
		$sql->bindValue(":VrRepassePag",$VrRepassePag);
		if (empty($VrCpPag)) {
			$VrCpPag = 0;
		}
		$sql->bindValue(":VrCpPag",$VrCpPag);
		if (empty($CodPar)) {
			$CodPar = 0;
		}
		$sql->bindValue(":CodPar",$CodPar);
		$sql->bindValue(":TipoPag",$TipoPag);
		$sql->bindValue(":SituacaoPag",$SituacaoPag);
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
		$sql = $this->db->prepare("SELECT * FROM conveniopagamento WHERE cmpCodPag = :cmpCodPag");
		$sql->bindValue(":cmpCodPag",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from conveniopagamento where cmpCodPag = :cmpCodPag");
		$sql->bindValue(":cmpCodPag", $id);
		$sql->execute();

		return true;
	}


	public function getListId($c,$id){
		
		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT a.*, b.cmpNomePar FROM conveniopagamento a left join parceiro b on a.cmpCodPar = b.cmpCodPar WHERE cmpCodPag = :cmpCodPag");
		
		$sql->bindValue(":cmpCodPag",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getConveniospagamentos(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM conveniopagamento ORDER BY cmpCodPag");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function getParceirosconvenios($c){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT DISTINCT a.cmpCodConv, b.cmpCodPar, c.cmpNomePar FROM conveniopagamento a left join conveniocontrato b on a.cmpCodConv = b.cmpCodConv left join parceiro c on b.cmpCodPar = c.cmpCodPar where a.cmpCodConv = $c ORDER BY c.cmpNomePar");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
