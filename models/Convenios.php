<?php
class Convenios extends Model{

	public function getList(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*, (case when DATEDIFF(a.cmpDtVigenciaConv,'0001-01-01')=0 then '0' else '1' end) as DtVigenciaConv, (case when DATEDIFF(a.cmpDtFimVigenciaConv,'0001-01-01')=0 then 'EXECUÇÃO' else 'ENCERRADO' end) as situacao, b.cmpNomeGes, c.cmpNomeFis, d.cmpNomPre, (e.VrTotalDes - f.VrTotalPag) as SaldoConv FROM convenio a left join gestor b on a.cmpCodGes = b.cmpCodGes left join fiscal c on a.cmpCodFis = c.cmpCodFis left join prefeitura d on a.cmpCodPre = d.cmpCodPre left join (SELECT cmpCodConv, sum(cmpVrTotalDes) as VrTotalDes from conveniodesembolso group by cmpCodConv) e on a.cmpCodConv = e.cmpCodConv left join (SELECT cmpCodConv, sum(cmpVrTotalPag) as VrTotalPag from conveniopagamento group by cmpCodConv) f on a.cmpCodConv = f.cmpCodConv order by a.cmpNumConv DESC");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function getListTotais(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT sum(a.cmpVrTotalConv) as totVrTotalConv, sum(e.VrTotalDes - f.VrTotalPag) as totSaldoConv FROM convenio a  left join (SELECT cmpCodConv, sum(cmpVrTotalDes) as VrTotalDes from conveniodesembolso group by cmpCodConv) e on a.cmpCodConv = e.cmpCodConv left join (SELECT cmpCodConv, sum(cmpVrTotalPag) as VrTotalPag from conveniopagamento group by cmpCodConv) f on a.cmpCodConv = f.cmpCodConv");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}


	public function add($CodPre, $EparceriaConv, $NumConv, $OrgaoConv, $ObjetoConv, $DtVigenciaConv, $DtFimVigenciaConv, $CodGes, $CodFis, $VrRepasseConv, $VrCpConv, $AditivoConv, $VrRepasseAConv, $VrCpAConv, $VrTotalConv, $ObsConv, $usuario, $CodEmp){

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO convenio (cmpCodPre, cmpEparceriaConv, cmpNumConv, cmpOrgaoConv, cmpObjetoConv, cmpDtVigenciaConv, cmpDtFimVigenciaConv, cmpCodGes, cmpCodFis, cmpVrRepasseConv, cmpVrCpConv, cmpAditivoConv, cmpVrRepasseAConv, cmpVrCpAConv, cmpVrTotalConv, cmpObsConv, usuario, cmpCodEmp) VALUES(:CodPre, :EparceriaConv, :NumConv, :OrgaoConv, :ObjetoConv, :DtVigenciaConv, :DtFimVigenciaConv, :CodGes, :CodFis, :VrRepasseConv, :VrCpConv, :AditivoConv, :VrRepasseAConv, :VrCpAConv, :VrTotalConv, :ObsConv, :usuario, :CodEmp)");

		if (empty($CodPre)) {
			$CodPre = 0;
		}
		$sql->bindValue(":CodPre",$CodPre);
		$sql->bindValue(":EparceriaConv",$EparceriaConv);
		$sql->bindValue(":NumConv",$NumConv);
		$sql->bindValue(":OrgaoConv",$OrgaoConv);
		$sql->bindValue(":ObjetoConv",$ObjetoConv);
		if (empty($DtVigenciaConv)) {
			$DtVigenciaConv = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaConv",$DtVigenciaConv);
		if (empty($DtFimVigenciaConv)) {
			$DtFimVigenciaConv = '0001-01-01';
		}
		$sql->bindValue(":DtFimVigenciaConv",$DtFimVigenciaConv);
		if (empty($CodGes)) {
			$CodGes = 0;
		}
		$sql->bindValue(":CodGes",$CodGes);
		if (empty($CodFis)) {
			$CodFis = 0;
		}
		$sql->bindValue(":CodFis",$CodFis);
		if (empty($VrRepasseConv)) {
			$VrRepasseConv = 0;
		}
		$sql->bindValue(":VrRepasseConv",$VrRepasseConv);
		if (empty($VrCpConv)) {
			$VrCpConv = 0;
		}
		$sql->bindValue(":VrCpConv",$VrCpConv);
		$sql->bindValue(":AditivoConv",$AditivoConv);
		if (empty($VrRepasseAConv)) {
			$VrRepasseAConv = 0;
		}
		$sql->bindValue(":VrRepasseAConv",$VrRepasseAConv);
		if (empty($VrCpAConv)) {
			$VrCpAConv = 0;
		}
		$sql->bindValue(":VrCpAConv",$VrCpAConv);
		if (empty($VrTotalConv)) {
			$VrTotalConv = 0;
		}
		$sql->bindValue(":VrTotalConv",$VrTotalConv);
		$sql->bindValue(":ObsConv",$ObsConv);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);
		
		$sql->execute();

		return true;
	}


	public function getGestores(){
		$array = array();
		$sql = $this->db->query("SELECT cmpCodGes, cmpNomeGes FROM gestor ORDER BY cmpNomeGes");
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function getFiscais(){
		$array = array();
		$sql = $this->db->query("SELECT cmpCodFis, cmpNomeFis FROM fiscal ORDER BY cmpNomeFis");
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function getPrefeituras(){
		$array = array();
		$sql = $this->db->query("SELECT cmpCodPre, cmpNomePre FROM prefeitura ORDER BY cmpNomPre");
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function getGestoresconv($id){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.cmpCodGes, b.cmpNomeGes FROM convenio a left join gestor b on a.cmpCodGes = b.cmpCodGes where cmpCodConv = :cmpCodConv");
		$sql->bindValue(":cmpCodConv", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	public function getPrefeiturasconv($id){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.cmpCodPre, b.cmpNomePre FROM convenio a left join prefeitura b on a.cmpCodPre = b.cmpCodPre where cmpCodConv = :cmpCodConv");
		$sql->bindValue(":cmpCodConv", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function getFiscaisconv($id){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.cmpCodFis, b.cmpNomeFis FROM convenio a left join fiscal b on a.cmpCodFis = b.cmpCodFis where cmpCodConv = :cmpCodConv");
		$sql->bindValue(":cmpCodConv", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function update($id, $CodPre, $EparceriaConv, $NumConv, $OrgaoConv, $ObjetoConv, $DtVigenciaConv, $DtFimVigenciaConv, $CodGes, $CodFis, $VrRepasseConv, $VrCpConv, $AditivoConv, $VrRepasseAConv, $VrCpAConv, $VrTotalConv, $ObsConv, $usuario, $CodEmp, $DataCancel){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE convenio set cmpCodPre = :CodPre, cmpEparceriaConv = :EparceriaConv, cmpNumConv =:NumConv, cmpOrgaoConv = :OrgaoConv, cmpObjetoConv =:ObjetoConv, cmpDtVigenciaConv =:DtVigenciaConv, cmpDtFimVigenciaConv =:DtFimVigenciaConv,  cmpCodGes =:CodGes, cmpCodFis = :CodFis, cmpVrRepasseConv = :VrRepasseConv, cmpVrCpConv = :VrCpConv, cmpAditivoConv = :AditivoConv, cmpVrRepasseAConv = :VrRepasseAConv, cmpVrCpAConv = :VrCpAConv, cmpVrTotalConv = :VrTotalConv, cmpObsConv = :ObsConv, usuario = :usuario, cmpCodEmp = :CodEmp, cmpDataCancel = :DataCancel where cmpCodConv = :cmpCodConv");

		$sql->bindValue(":cmpCodConv", $id);
		if (empty($CodPre)) {
			$CodPre = 0;
		}
		$sql->bindValue(":CodPre",$CodPre);
		$sql->bindValue(":EparceriaConv",$EparceriaConv);
		$sql->bindValue(":NumConv",$NumConv);
		$sql->bindValue(":OrgaoConv",$OrgaoConv);
		$sql->bindValue(":ObjetoConv",$ObjetoConv);
		if (empty($DtVigenciaConv)) {
			$DtVigenciaConv = '0001-01-01';
		}
		$sql->bindValue(":DtVigenciaConv",$DtVigenciaConv);
		if (empty($DtFimVigenciaConv)) {
			$DtFimVigenciaConv = '0001-01-01';
		}
		$sql->bindValue(":DtFimVigenciaConv",$DtFimVigenciaConv);
		if (empty($CodGes)) {
			$CodGes = 0;
		}
		$sql->bindValue(":CodGes",$CodGes);
		if (empty($CodFis)) {
			$CodFis = 0;
		}
		$sql->bindValue(":CodFis",$CodFis);
		if (empty($VrRepasseConv)) {
			$VrRepasseConv = 0;
		}
		$sql->bindValue(":VrRepasseConv",$VrRepasseConv);
		if (empty($VrCpConv)) {
			$VrCpConv = 0;
		}
		$sql->bindValue(":VrCpConv",$VrCpConv);
		$sql->bindValue(":AditivoConv",$AditivoConv);
		if (empty($VrRepasseAConv)) {
			$VrRepasseAConv = 0;
		}
		$sql->bindValue(":VrRepasseAConv",$VrRepasseAConv);
		if (empty($VrCpAConv)) {
			$VrCpAConv = 0;
		}
		$sql->bindValue(":VrCpAConv",$VrCpAConv);
		if (empty($VrTotalConv)) {
			$VrTotalConv = 0;
		}
		$sql->bindValue(":VrTotalConv",$VrTotalConv);
		$sql->bindValue(":ObsConv",$ObsConv);
		if (empty($DataCancel)) {
			$DataCancel = '0001-01-01';
		}
		$sql->bindValue(":DataCancel",$DataCancel);
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
		$sql = $this->db->prepare("SELECT * FROM convenio WHERE cmpCodConv = :cmpCodConv");
		$sql->bindValue(":cmpCodConv",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		if ($this->validaConvenioDel($id) == true) {
			$sql = $this->db->prepare("DELETE from convenio where cmpCodConv = :cmpCodConv");
			$sql->bindValue(":cmpCodConv", $id);
			$sql->execute();
			return true;
		} else {
			return false;
		}

		return true;
	}


	public function validaConvenioDel($id){
		$valida = 0;
		$valida1 = 0;
		$valida2 = 0;
		$valida3 = 0;
		$valida4 = 0;
		$valida5 = 0;
		$sql1 = $this->db->prepare("SELECT count(cmpCodConv) as tot1 from conveniolicitacao where cmpCodConv = :cmpCodConv");
		$sql1->bindValue(":cmpCodConv", $id);
		$sql1->execute();
		$valida1 = $sql1->fetch();

		$sql2 = $this->db->prepare("SELECT count(cmpCodConv) as tot2 from conveniocontrato where cmpCodConv = :cmpCodConv");
		$sql2->bindValue(":cmpCodConv", $id);
		$sql2->execute();
		$valida2 = $sql2->fetch();

		$sql3 = $this->db->prepare("SELECT count(cmpCodConv) as tot3 from convenioaditivo where cmpCodConv = :cmpCodConv");
		$sql3->bindValue(":cmpCodConv", $id);
		$sql3->execute();
		$valida3 = $sql3->fetch();

		$sql4 = $this->db->prepare("SELECT count(cmpCodConv) as tot4 from conveniodesembolso where cmpCodConv = :cmpCodConv");
		$sql4->bindValue(":cmpCodConv", $id);
		$sql4->execute();
		$valida4 = $sql4->fetch();

		$sql5 = $this->db->prepare("SELECT count(cmpCodConv) as tot5 from conveniopagamento where cmpCodConv = :cmpCodConv");
		$sql5->bindValue(":cmpCodConv", $id);
		$sql5->execute();
		$valida5 = $sql5->fetch();

		$valida = $valida1['tot1'] . $valida2['tot2'] . $valida3['tot3'] . $valida4['tot4'] . $valida5['tot5'];

		if($valida  == '00000'){
			return true;
		}else{
			return false;
		}
	}


	public function getListId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("SELECT a.*, b.cmpNomeGes, c.cmpNomeFis, d.cmpNomPre FROM convenio a left join gestor b on a.cmpCodGes = b.cmpCodGes left join fiscal c on a.cmpCodFis = c.cmpCodFis left join prefeitura d on a.cmpCodPre = d.cmpCodPre WHERE a.cmpCodConv = :cmpCodConv");
		
		$sql->bindValue(":cmpCodConv",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getConvenios(){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT cmpCodConv, cmpDtVigenciaConv, cmpNumConv FROM convenio ORDER BY cmpDtVigenciaConv");
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function getConveniosges(){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.cmpCodConv, b.cmpNomeGes, a.cmpDtVigenciaConv FROM convenio a left join gestor b on a.cmpCodGes=b.cmpCodGes ORDER BY b.cmpNomeGes, a.cmpDtVigenciaConv");
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}

}
