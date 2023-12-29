<?php
class Prefeituras extends model{

	public function getList(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT * FROM prefeitura");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	public function add($NomPre, $DtCadPre, $EndPre, $NumEndPre, $BaiPre, $CepPre, $CodCid, $Fone1Pre, $Fone2Pre, $EmailPre, $SitePre, $Obs, $usuario){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO prefeitura (cmpNomPre, cmpDtCadPre, cmpEndPre, cmpNumEndPre, cmpBaiPre, cmpCepPre, cmpCodCid, cmpFone1Pre, cmpFone2Pre, cmpEmailPre, cmpSitePre, cmpObs, usuario) VALUES(:NomPre, :DtCadPre, :EndPre, :NumEndPre, :BaiPre, :CepPre, :CodCid, :Fone1Pre, :Fone2Pre, :EmailPre, :SitePre, :Obs, :usuario)");

		$sql->bindValue(":NomPre",$NomPre);
		if (empty($DtCadPre)) {
			$DtCadPre = '0001-01-01';
		}
		$sql->bindValue(":DtCadPre",$DtCadPre);
		$sql->bindValue(":EndPre",$EndPre);
		$sql->bindValue(":NumEndPre",$NumEndPre);
		$sql->bindValue(":BaiPre",$BaiPre);
		$sql->bindValue(":CepPre",$CepPre);
		if (empty($CodCid)) {
			$CodCid = 0;
		}
		$sql->bindValue(":CodCid",$CodCid);
		$sql->bindValue(":Fone1Pre",$Fone1Pre);
		$sql->bindValue(":Fone2Pre",$Fone2Pre);
		$sql->bindValue(":EmailPre",$EmailPre);
		$sql->bindValue(":SitePre",$SitePre);
		$sql->bindValue(":Obs",$Obs);
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


	public function getCidadespre($id){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.cmpCodCid, b.nm_cidade FROM prefeitura a left join cidades b on a.cmpCodCid = b.id_cidade where cmpCodPre = :cmpCodPre");
		$sql->bindValue(":cmpCodPre", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function update($id, $NomPre, $DtCadPre, $EndPre, $NumEndPre, $BaiPre, $CepPre, $CodCid, $Fone1Pre, $Fone2Pre, $EmailPre, $SitePre, $Obs, $usuario, $inativo){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE prefeitura set cmpNomPre = :NomPre, cmpDtCadPre = :DtCadPre, cmpEndPre = :EndPre, cmpNumEndPre = :NumEndPre, cmpBaiPre = :BaiPre, cmpCepPre = :CepPre, cmpCodCid = :CodCid, cmpFone1Pre = :Fone1Pre, cmpFone2Pre = :Fone2Pre, cmpEmailPre = :EmailPre, cmpSitePre = :SitePre, cmpObs = :Obs, usuario = :usuario, inativo = :inativo where cmpCodPre = :cmpCodPre");

		$sql->bindValue(":cmpCodPre", $id);
		$sql->bindValue(":NomPre",$NomPre);
		if (empty($DtCadPre)) {
			$DtCadPre = '0001-01-01';
		}
		$sql->bindValue(":DtCadPre",$DtCadPre);
		$sql->bindValue(":EndPre",$EndPre);
		$sql->bindValue(":NumEndPre",$NumEndPre);
		$sql->bindValue(":BaiPre",$BaiPre);
		$sql->bindValue(":CepPre",$CepPre);
		if (empty($CodCid)) {
			$CodCid = 0;
		}
		$sql->bindValue(":CodCid",$CodCid);
		$sql->bindValue(":Fone1Pre",$Fone1Pre);
		$sql->bindValue(":Fone2Pre",$Fone2Pre);
		$sql->bindValue(":EmailPre",$EmailPre);
		$sql->bindValue(":SitePre",$SitePre);
		$sql->bindValue(":Obs",$Obs);
		$sql->bindValue(":usuario",$usuario);
		$sql->bindValue(":inativo",$inativo);

		$sql->execute();

		$sql1 = $this->db->prepare(" UPDATE colegio set usuario = :usuario, inativo = :inativo where cmpCodPre = :cmpCodPre");
		$sql1->bindValue(":cmpCodPre", $id);
		$sql1->bindValue(":usuario",$usuario);
		$sql1->bindValue(":inativo",$inativo);
		$sql1->execute();

		$sql2 = $this->db->prepare("UPDATE aluno a left join colegio b on a.cmpCodCol = b.cmpCodCol set a.usuario = :usuario, a.inativo = :inativo where b.cmpCodPre = :cmpCodPre");
		$sql2->bindValue(":cmpCodPre", $id);
		$sql2->bindValue(":usuario",$usuario);
		$sql2->bindValue(":inativo",$inativo);
		$sql2->execute();

		$sql3 = $this->db->prepare("UPDATE pessoal a left join colegio b on a.cmpCodCol = b.cmpCodCol set a.usuario = :usuario, a.inativo = :inativo where b.cmpCodPre = :cmpCodPre");
		$sql3->bindValue(":cmpCodPre", $id);
		$sql3->bindValue(":usuario",$usuario);
		$sql3->bindValue(":inativo",$inativo);
		$sql3->execute();

		return true;
	}


	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM prefeitura WHERE cmpCodPre = :cmpCodPre");
		$sql->bindValue(":cmpCodPre",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		if ($this->validaprefeituraDel($id) == true) {
			$sql = $this->db->prepare("DELETE from prefeitura where cmpCodPre = :cmpCodPre");
			$sql->bindValue(":cmpCodPre", $id);
			$sql->execute();
			return true;
		} else {
			return false;
		}

		

		return true;
	}


	public function validaPrefeituraDel($id){
		$valida = 0;
		$sql = $this->db->prepare("SELECT count(cmpCodPre) as tot from prefeituracontatos where cmpCodPre = :cmpCodPre");
		$sql->bindValue(":cmpCodPre", $id);
		$sql->execute();
		$valida = $sql->fetch();
		if($valida['tot']  == '0'){
			return true;
		}else{
			return false;
		}
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT a.*, b.nm_cidade FROM prefeitura a left join cidades b on a.cmpCodCid = b.id_cidade WHERE a.cmpCodPre = :cmpCodPre");
		
		$sql->bindValue(":cmpCodPre",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getPrefeituras(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT cmpCodPre, cmpNomPre FROM prefeitura ORDER BY cmpNomPre");
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}



	public function getListIdCont($id){

		// print_r($id);
		// exit;

		$array = array();

		$sql= $this->db->prepare("SELECT a.*, b.cmpNomPre FROM prefeituracontatos a left join prefeitura  b on a.cmpCodPre = b.cmpCodPre WHERE a.cmpCodPre = :cmpCodPre");
		
		$sql->bindValue(":cmpCodPre",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return json_encode($array);
	}


	public function addContato($idPre, $NomeRes, $EndRes, $NumEndRes, $BaiRes, $CepRes, $CodCidRes, $FoneRes, $CelularRes, $CpfRes, $RgRes, $user){

		$sql= $this->db->prepare("INSERT into prefeituracontatos (cmpCodPre, cmpNomeRes, cmpEndRes, cmpNumEndRes, cmpBaiRes, cmpCepRes, cmpCodCidRes, cmpFoneRes, cmpCelularRes, cmpCpfRes, cmpRgRes, usuario) VALUES(:CodPre, :NomeRes, :EndRes, :NumEndRes, :BaiRes, :CepRes, :CodCidRes, :FoneRes, :CelularRes, :CpfRes, :RgRes, :user)");

		$sql->bindValue(":CodPre",$idPre);
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
		$sql = $this->db->prepare("UPDATE prefeituracontatos set cmpNomeRes = :NomeRes, cmpEndRes = :EndRes, cmpNumEndRes = :NumEndRes, cmpBaiRes = :BaiRes,  cmpCepRes = :CepRes, cmpCodCidRes = :CodCidRes, cmpFoneRes = :FoneRes, cmpCelularRes = :CelularRes, cmpCpfRes = :CpfRes, cmpRgRes = :RgRes, usuario = :user where cmpCodRes = :CodRes");

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

		$sql = $this->db->prepare("DELETE FROM prefeituracontatos where cmpCodRes = :CodRes");

		$sql->bindValue(":CodRes", $id);

		$sql->execute();

		return true;
	}


}
