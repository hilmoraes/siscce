<?php
class Convenioslicitacoes extends Model{

	public function getList($id){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*, (case when DATEDIFF(a.cmpDtHomologacaoLic,'0001-01-01')=0 then '0' else '1' end) as DtHomologacaoLic, b.cmpNomePar, b.cmpCpfCnpjPar FROM conveniolicitacao a left join parceiro b on a.cmpCodPar = b.cmpCodPar where cmpCodConv = $id");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function add($CodConv, $DtHomologacaoLic, $ModalidadeLic, $NumLic, $VrPropostaLic, $CodPar, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO conveniolicitacao (cmpCodConv, cmpDtHomologacaoLic, cmpModalidadeLic, cmpNumLic, cmpVrPropostaLic, cmpCodPar, usuario, cmpCodEmp) VALUES (:CodConv, :DtHomologacaoLic, :ModalidadeLic, :NumLic, :VrPropostaLic, :CodPar, :usuario, :CodEmp)");

		if (empty($CodConv)) {
			$CodConv = 0;
		}
		$sql->bindValue(":CodConv",$CodConv);
		if (empty($DtHomologacaoLic)) {
			$DtHomologacaoLic = '0001-01-01';
		}
		$sql->bindValue(":DtHomologacaoLic",$DtHomologacaoLic);
		$sql->bindValue(":ModalidadeLic",$ModalidadeLic);
		$sql->bindValue(":NumLic",$NumLic);
		if (empty($VrPropostaLic)) {
			$VrPropostaLic = 0;
		}
		$sql->bindValue(":VrPropostaLic",$VrPropostaLic);
		if (empty($CodPar)) {
			$CodPar = 0;
		}
		$sql->bindValue(":CodPar",$CodPar);
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


	public function update($id, $DtHomologacaoLic, $ModalidadeLic, $NumLic, $VrPropostaLic, $CodPar, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE conveniolicitacao set cmpDtHomologacaoLic = :DtHomologacaoLic, cmpModalidadeLic = :ModalidadeLic, cmpNumLic =:NumLic, cmpVrPropostaLic = :VrPropostaLic, cmpCodPar =:CodPar, usuario = :usuario, cmpCodEmp = :CodEmp where cmpCodLic = :cmpCodLic");

		$sql->bindValue(":cmpCodLic", $id);
		if (empty($DtHomologacaoLic)) {
			$DtHomologacaoLic = '0001-01-01';
		}
		$sql->bindValue(":DtHomologacaoLic",$DtHomologacaoLic);
		$sql->bindValue(":ModalidadeLic",$ModalidadeLic);
		$sql->bindValue(":NumLic",$NumLic);
		if (empty($VrPropostaLic)) {
			$VrPropostaLic = 0;
		}
		$sql->bindValue(":VrPropostaLic",$VrPropostaLic);
		if (empty($CodPar)) {
			$CodPar = 0;
		}
		$sql->bindValue(":CodPar",$CodPar);
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
		$sql = $this->db->prepare("SELECT * FROM conveniolicitacao WHERE cmpCodLic = :cmpCodLic");
		$sql->bindValue(":cmpCodLic",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		$sql = $this->db->prepare("DELETE from conveniolicitacao where cmpCodLic = :cmpCodLic");
		$sql->bindValue(":cmpCodLic", $id);
		$sql->execute();

		return true;
	}


	public function getListId($c,$id){
		
		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT a.*, b.cmpNomePar FROM conveniolicitacao a left join parceiro b on a.cmpCodPar = b.cmpCodPar WHERE cmpCodLic = :cmpCodLic");
		
		$sql->bindValue(":cmpCodLic",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getConvenioslicitacoes(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM conveniolicitacao ORDER BY cmpCodLic");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
