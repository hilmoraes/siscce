<?php
class Empresas extends Model{

	public function getList(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM empresa");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function add($NomeEmp, $EndEmp, $NumEndEmp, $BairroEmp, $CepEmp, $CodCid, $Fone1Emp, $Fone2Emp, $ComplEmp, $CgfEmp, $CnpjEmp, $BancoEmp, $AgEmp, $CCEmp, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO empresa (cmpNomeEmp, cmpEndEmp, cmpNumEndEmp, cmpBairroEmp, cmpCepEmp, cmpCodCid, cmpFone1Emp, cmpFone2Emp, cmpComplEmp, cmpCgfEmp, cmpCnpjEmp, cmpBancoEmp, cmpAgEmp, , cmpCCEmp, usuario) VALUES(:NomeEmp, :EndEmp, :NumEndEmp, :BairroEmp, :CepEmp, :CodCid, :Fone1Emp, :Fone2Emp, :ComplEmp, :CgfEmp, :CnpjEmp, :BancoEmp, :AgEmp, :CCEmp, :usuario)");

		$sql->bindValue(":NomeEmp",$NomeEmp);
		$sql->bindValue(":EndEmp",$EndEmp);
		$sql->bindValue(":NumEndEmp",$NumEndEmp);
		$sql->bindValue(":BairroEmp",$BairroEmp);
		$sql->bindValue(":CepEmp",$CepEmp);
		if (empty($CodCid)) {
			$CodCid = 0;
		}
		$sql->bindValue(":CodCid",$CodCid);
		$sql->bindValue(":Fone1Emp",$Fone1Emp);
		$sql->bindValue(":Fone2Emp",$Fone2Emp);
		$sql->bindValue(":ComplEmp",$ComplEmp);
		$sql->bindValue(":CgfEmp",$CgfEmp);
		$sql->bindValue(":CnpjEmp",$CnpjEmp);
		$sql->bindValue(":BancoEmp",$BancoEmp);
		$sql->bindValue(":AgEmp",$AgEmp);
		$sql->bindValue(":CCEmp",$CCEmp);
		$sql->bindValue(":usuario",$usuario);
		
		$sql->execute();

		return true;

	}

	public function getCidades(){

		$array = array();
		$sql = $this->db->query("SELECT a.id_cidade, a.nm_cidade, b.nm_sigla FROM cidades a left join estados b on a.id_estado = b.id_estado ORDER BY nm_cidade");
		
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;

	}


	public function getCidadesemp($id){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.cmpCodCid, b.nm_cidade FROM empresa a left join cidades b on a.cmpCodCid = b.id_cidade where cmpCodEmp = :cmpCodEmp");
		$sql->bindValue(":cmpCodEmp", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function update($id, $NomeEmp, $EndEmp, $NumEndEmp, $BairroEmp, $CepEmp, $CodCid, $Fone1Emp, $Fone2Emp, $ComplEmp, $CgfEmp, $CnpjEmp, $BancoEmp, $AgEmp, $CCEmp, $usuario, $inativo){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE empresa set cmpNomeEmp = :NomeEmp, cmpEndEmp = :EndEmp, cmpNumEndEmp = :NumEndEmp, cmpBairroEmp = :BairroEmp, cmpCepEmp = :CepEmp, cmpCodCid = :CodCid, cmpFone1Emp = :Fone1Emp, cmpFone2Emp = :Fone2Emp, cmpComplEmp = :ComplEmp, cmpCgfEmp = :CgfEmp, cmpCnpjEmp = :CnpjEmp, cmpBancoEmp = :BancoEmp, cmpAgEmp = :AgEmp, cmpCCEmp = :CCEmp, usuario = :usuario, inativo = :inativo where cmpCodEmp = :cmpCodEmp");

		$sql->bindValue(":cmpCodEmp", $id);
		$sql->bindValue(":NomeEmp",$NomeEmp);
		$sql->bindValue(":EndEmp",$EndEmp);
		$sql->bindValue(":NumEndEmp",$NumEndEmp);
		$sql->bindValue(":BairroEmp",$BairroEmp);
		$sql->bindValue(":CepEmp",$CepEmp);
		if (empty($CodCid)) {
			$CodCid = 0;
		}
		$sql->bindValue(":CodCid",$CodCid);
		$sql->bindValue(":Fone1Emp",$Fone1Emp);
		$sql->bindValue(":Fone2Emp",$Fone2Emp);
		$sql->bindValue(":ComplEmp",$ComplEmp);
		$sql->bindValue(":CgfEmp",$CgfEmp);
		$sql->bindValue(":CnpjEmp",$CnpjEmp);
		$sql->bindValue(":BancoEmp",$BancoEmp);
		$sql->bindValue(":AgEmp",$AgEmp);
		$sql->bindValue(":CCEmp",$CCEmp);
		$sql->bindValue(":usuario",$usuario);
		$sql->bindValue(":inativo",$inativo);

		$sql->execute();

		return true;
	}


	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM empresa WHERE cmpCodEmp = :cmpCodEmp");
		$sql->bindValue(":cmpCodEmp",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		// if ($this->validaEmpresaDel($id) == true) {
			$sql = $this->db->prepare("DELETE from empresa where cmpCodEmp = :cmpCodEmp");
			$sql->bindValue(":cmpCodEmp", $id);
			$sql->execute();
			return true;
		// } else {
		// 	return false;
		// }

		

		return true;
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT a.*, b.nm_cidade FROM empresa a left join cidades b on a.cmpCodCid = b.id_cidade WHERE a.cmpCodEmp = :cmpCodEmp");
		
		$sql->bindValue(":cmpCodEmp",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getEmpresas(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT cmpCodEmp, cmpNomeEmp FROM empresa where inativo='0' ORDER BY cmpNomeEmp");

		$sql->execute();
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;

	}



/*	public function validaEmpresaDel($id){
		$valida = 0;
		$sql = $this->db->prepare("SELECT count(cmpCodEmp) as tot from empresacontatos where cmpCodEmp = :cmpCodEmp");
		$sql->bindValue(":cmpCodEmp", $id);
		$sql->execute();
		$valida = $sql->fetch();
		if($valida['tot']  == '0'){
			return true;
		}else{
			return false;
		}
	}*/



/*	public function getListIdCont($id){

		// print_r($id);
		// exit;

		$array = array();

		$sql= $this->db->prepare("SELECT a.*, b.cmpNomeEmp FROM empresacontatos a left join empresa  b on a.cmpCodEmp = b.cmpCodEmp WHERE a.cmpCodEmp = :cmpCodEmp");
		
		$sql->bindValue(":cmpCodEmp",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return json_encode($array);
	}


	public function addContato($idEmp, $NomeRes, $EndRes, $NumEndRes, $BaiRes, $CepRes, $CodCidRes, $FoneRes, $CelularRes, $CpfRes, $RgRes, $user){

		$sql= $this->db->prepare("INSERT into empresacontatos (cmpCodEmp, cmpNomeRes, cmpEndRes, cmpNumEndRes, cmpBaiRes, cmpCepRes, cmpCodCidRes, cmpFoneRes, cmpCelularRes, cmpCpfRes, cmpRgRes, usuario) VALUES(:CodEmp, :NomeRes, :EndRes, :NumEndRes, :BaiRes, :CepRes, :CodCidRes, :FoneRes, :CelularRes, :CpfRes, :RgRes, :user)");

		$sql->bindValue(":CodEmp",$idEmp);
		$sql->bindValue(":NomeRes",$NomeRes);
		$sql->bindValue(":EndRes",$EndRes);
		$sql->bindValue(":NumEndRes",$NumEndRes);
		$sql->bindValue(":BaiRes",$BaiRes);
		$sql->bindValue(":CepRes",$CepRes);
		$sql->bindValue(":CodCidRes",$CodCidRes);
		$sql->bindValue(":FoneRes",$FoneRes);
		$sql->bindValue(":CelularRes",$CelularRes);
		$sql->bindValue(":CpfRes",$CpfRes);
		$sql->bindValue(":RgRes",$RgRes);
		$sql->bindValue(":user", $user);
		$sql->execute();

		return true;
	}



	public function editContatos($idCon, $NomeRes, $EndRes, $NumEndRes, $BaiRes, $CepRes, $CodCidRes, $FoneRes, $CelularRes, $CpfRes, $RgRes, $user){
		
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("UPDATE empresacontatos set cmpNomeRes = :NomeRes, cmpEndRes = :EndRes, cmpNumEndRes = :NumEndRes, cmpBaiRes = :BaiRes,  cmpCepRes = :CepRes, cmpCodCidRes = :CodCidRes, cmpFoneRes = :FoneRes, cmpCelularRes = :CelularRes, cmpCpfRes = :CpfRes, cmpRgRes = :RgRes, usuario = :user where cmpCodRes = :CodRes");

		$sql->bindValue(":CodRes", $idCon);
		$sql->bindValue(":NomeRes",$NomeRes);
		$sql->bindValue(":EndRes",$EndRes);
		$sql->bindValue(":NumEndRes",$NumEndRes);
		$sql->bindValue(":BaiRes",$BaiRes);
		$sql->bindValue(":CepRes",$CepRes);
		$sql->bindValue(":CodCidRes",$CodCidRes);
		$sql->bindValue(":FoneRes",$FoneRes);
		$sql->bindValue(":CelularRes",$CelularRes);
		$sql->bindValue(":CpfRes",$CpfRes);
		$sql->bindValue(":RgRes",$RgRes);
		$sql->bindValue(":user", $user);

		$sql->execute();

		return true;
	}


	public function excContatos($id){

		$sql = $this->db->prepare("DELETE FROM empresacontatos where cmpCodRes = :CodRes");

		$sql->bindValue(":CodRes", $id);

		$sql->execute();

		return true;
	}*/


}
