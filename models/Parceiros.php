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
		$valida1 = 0;
		$valida2 = 0;
		$valida3 = 0;
		$sql1 = $this->db->prepare("SELECT count(cmpCodPar) as tot1 from parceirocontatos where cmpCodPar = :cmpCodPar");
		$sql1->bindValue(":cmpCodPar", $id);
		$sql1->execute();
		$valida1 = $sql1->fetch();

		$sql2 = $this->db->prepare("SELECT count(cmpCodPar) as tot2 from parceirocontas where cmpCodPar = :cmpCodPar");
		$sql2->bindValue(":cmpCodPar", $id);
		$sql2->execute();
		$valida2 = $sql2->fetch();

		$sql3 = $this->db->prepare("SELECT count(cmpCodPar) as tot2 from convenio where cmpCodPar = :cmpCodPar");
		$sql3->bindValue(":cmpCodPar", $id);
		$sql3->execute();
		$valida3 = $sql3->fetch();

		$valida = $valida1['tot1'] . $valida2['tot2'] . $valida3['tot3'];

		if($valida  == '000'){
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
