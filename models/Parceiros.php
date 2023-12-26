<?php
class Parceiros extends model{

	public function getList(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM parceiro");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function add($NomePar, $DtCadPar, $Fone1Par, $Fone2Par, $EmailPar, $FJPar, $inscricao, $Obs, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO parceiro (cmpNomePar, cmpDtCadPar, cmpFone1Par, cmpFone2Par, cmpEmailPar, cmpFJPar, cmpCpfCnpjPar, cmpObs, usuario, cmpCodEmp) VALUES(:NomePar, :DtCadPar, :Fone1Par, :Fone2Par, :EmailPar, :FJPar, :inscricao, :Obs, :usuario, :CodEmp)");

		$sql->bindValue(":NomePar",$NomePar);
		if (empty($DtCadPar)) {
			$DtCadPar = '0001-01-01';
		}
		$sql->bindValue(":DtCadPar",$DtCadPar);
		$sql->bindValue(":Fone1Par",$Fone1Par);
		$sql->bindValue(":Fone2Par",$Fone2Par);
		$sql->bindValue(":EmailPar",$EmailPar);
		$sql->bindValue(":FJPar",$FJPar);
		$sql->bindValue(":inscricao",$inscricao);
		$sql->bindValue(":Obs",$Obs);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);
		
		$sql->execute();

		return true;

	}

	public function update($id, $NomePar, $DtCadPar, $Fone1Par, $Fone2Par, $EmailPar, $FJPar, $inscricao, $Obs, $usuario, $CodEmp, $inativo){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE parceiro set cmpNomePar = :NomePar, cmpDtCadPar = :DtCadPar, cmpFone1Par = :Fone1Par, cmpFone2Par = :Fone2Par, cmpEmailPar = :EmailPar, cmpFJPar = :FJPar, cmpCpfCnpjPar = :inscricao, cmpObs = :Obs, usuario = :usuario, cmpCodEmp = :CodEmp, inativo = :inativo where cmpCodPar = :cmpCodPar");

		$sql->bindValue(":cmpCodPar", $id);
		$sql->bindValue(":NomePar",$NomePar);
		if (empty($DtCadPar)) {
			$DtCadPar = '0001-01-01';
		}
		$sql->bindValue(":DtCadPar",$DtCadPar);
		$sql->bindValue(":Fone1Par",$Fone1Par);
		$sql->bindValue(":Fone2Par",$Fone2Par);
		$sql->bindValue(":EmailPar",$EmailPar);
		$sql->bindValue(":FJPar",$FJPar);
		$sql->bindValue(":inscricao",$inscricao);
		$sql->bindValue(":Obs",$Obs);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);
		$sql->bindValue(":inativo",$inativo);

		$sql->execute();

		return true;
	}


	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM parceiro WHERE cmpCodPar = :cmpCodPar");
		$sql->bindValue(":cmpCodPar",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		if ($this->validaParceiroDel($id) == true) {
			$sql = $this->db->prepare("DELETE from parceiro where cmpCodPar = :cmpCodPar");
			$sql->bindValue(":cmpCodPar", $id);
			$sql->execute();
			return true;
		} else {
			return false;
		}

		

		return true;
	}


	public function validaParceiroDel($id){
		$valida = 0;
		$sql = $this->db->prepare("SELECT count(cmpCodPar) as tot from parceirocontatos where cmpCodPar = :cmpCodPar");
		$sql->bindValue(":cmpCodPar", $id);
		$sql->execute();
		$valida = $sql->fetch();

		$valida2 = 0;
		$sql2 = $this->db->prepare("SELECT count(cmpCodPar) as tot from convenio where cmpCodPar = :cmpCodPar");
		$sql2->bindValue(":cmpCodPar", $id);
		$sql2->execute();
		$valida2 = $sql2->fetch();

		$vv2 = $valida['tot'] + $valida2['tot'];

		if($vv2 == '00'){
			return true;
		}else{
			return false;
		}
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT * FROM parceiro WHERE cmpCodPar = :cmpCodPar");
		
		$sql->bindValue(":cmpCodPar",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getParceiros(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT cmpCodPar, cmpNomePar FROM parceiro where inativo='0' ORDER BY cmpNomePar");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;

	}



	public function getListIdCont($id){

		$array = array();

		$sql= $this->db->prepare("SELECT a.*, b.cmpNomePar FROM parceirocontatos a left join parceiro  b on a.cmpCodPar = b.cmpCodPar WHERE a.cmpCodPar = :cmpCodPar");
		
		$sql->bindValue(":cmpCodPar",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return json_encode($array);
	}

}
