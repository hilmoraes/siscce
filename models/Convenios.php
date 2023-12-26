<?php
class Contratos extends Model{

	public function getList(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.*,replace(a.cmpContrato,'/','_') as contra, (case when DATEDIFF(a.cmpDataLanc,'0001-01-01')=0 then '0' else '1' end) as DataLanc, b.cmpNomePro, c.cmpNomFor FROM contrato a left join produto b on a.cmpCodPro = b.cmpCodPro left join fornecedor c on a.cmpCodFor = c.cmpCodFor where cmpTipo = 'COMPRA' order by a.cmpCodLanc DESC");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}



	// public function add($Tipo, $DataLanc, $DtIdent, $Ident, $CodFor, $CodCli, $CodPro, $Embalagem, $Embarque, $QtdSaca, $QtdKgSaca, $QtdTon, $QtdKg, $VrKg, $Preco, $DescCarreg, $TpFrete, $Qtde, $CondPgto, $Carretas, $Funrural, $LocRetirada, $Prazo, $DataVF, $V, $VrV, $Contratante, $PorTon, $usuario, $CodEmp, $Extenso, $Extenso1){

	// 	$sql = $this->db->query('SET NAMES utf8');
	// 	$sql= $this->db->prepare("INSERT INTO contrato (cmpTipo, cmpDataLanc, cmpDtIdent, cmpIdent, cmpCodFor, cmpCodCli, cmpCodPro, cmpEmbalagem, cmpEmbarque, cmpQtdSaca, cmpQtdKgSaca, cmpQtdTon, cmpQtdKg, cmpVrKg, cmpPreco, cmpDescCarreg, cmpTpFrete, cmpQtde, cmpCondPgto, cmpCarretas, cmpFunrural, cmpLocRetirada, cmpPrazo, cmpDataVF, cmpV, cmpVrV, cmpContratante, cmpPorTon, cmpUsuario, cmpCodEmp, cmpExtenso, cmpExtenso1) VALUES(:Tipo, :DataLanc, :DtIdent, :Ident, :CodFor, :CodCli, :CodPro, :Embalagem, :Embarque, :QtdSaca, :QtdKgSaca, :QtdTon, :QtdKg, :VrKg, :Preco, :DescCarreg, :TpFrete, :Qtde, :CondPgto, :Carretas, :Funrural, :LocRetirada, :Prazo, :DataVF, :V, :VrV, :Contratante, :PorTon, :usuario, :CodEmp, :Extenso, :Extenso1)");

	public function add($Tipo, $DataLanc, $DtIdent, $Ident, $CodFor, $CodCli, $CodPro, $Embalagem, $Embarque, $QtdSaca, $QtdKgSaca, $QtdTon, $QtdKg, $VrKg, $Preco, $DescCarreg, $TpFrete, $Qtde, $CondPgto, $Carretas, $Funrural, $LocRetirada, $Prazo, $DataVF, $V, $VrV, $Contratante, $PorTon, $usuario, $CodEmp, $Extenso, $Extenso1){
		
		$valida = 0;
		$query1 = $this->db->prepare("SELECT cmpSeqContCompra as SeqContCompra FROM seqcontrato");
		$query1->execute();
		$valida = $query1->fetch();
		$contrat = $valida['SeqContCompra'];
		$ano = date('y');
		$ContratoCompra = "C-".$contrat."/".$ano;

		$sql = $this->db->query('SET NAMES utf8');
		$sql= $this->db->prepare("INSERT INTO contrato (cmpContrato, cmpTipo, cmpDataLanc, cmpDtIdent, cmpIdent, cmpCodFor, cmpCodCli, cmpCodPro, cmpEmbalagem, cmpEmbarque, cmpQtdSaca, cmpQtdKgSaca, cmpQtdTon, cmpQtdKg, cmpVrKg, cmpPreco, cmpDescCarreg, cmpTpFrete, cmpQtde, cmpCondPgto, cmpCarretas, cmpFunRural, cmpLocRetirada, cmpPrazo, cmpDataVF, cmpV, cmpVrV, cmpContratante, cmpPorTon, cmpUsuario, cmpCodEmp, cmpExtenso, cmpExtenso1) VALUES(:ContratoCompra, :Tipo, :DataLanc, :DtIdent, :Ident, :CodFor, :CodCli, :CodPro, :Embalagem, :Embarque, :QtdSaca, :QtdKgSaca, :QtdTon, :QtdKg, :VrKg, :Preco, :DescCarreg, :TpFrete, :Qtde, :CondPgto, :Carretas, :Funrural, :LocRetirada, :Prazo, :DataVF, :V, :VrV, :Contratante, :PorTon, :usuario, :CodEmp, :Extenso, :Extenso1)");

		$sql->bindValue(":ContratoCompra",$ContratoCompra);
		$sql->bindValue(":Tipo",$Tipo);
		if (empty($DataLanc)) {
			$DataLanc = '0001-01-01';
		}
		$sql->bindValue(":DataLanc",$DataLanc);
		if (empty($DtIdent)) {
			$DtIdent = '0001-01-01';
		}
		$sql->bindValue(":DtIdent",$DtIdent);
		$sql->bindValue(":Ident",$Ident);
		if (empty($CodFor)) {
			$CodFor = 0;
		}
		$sql->bindValue(":CodFor",$CodFor);
		if (empty($CodCli)) {
			$CodCli = 0;
		}
		$sql->bindValue(":CodCli",$CodCli);
		if (empty($CodPro)) {
			$CodPro = 0;
		}
		$sql->bindValue(":CodPro",$CodPro);
		$sql->bindValue(":Embalagem",$Embalagem);
		$sql->bindValue(":Embarque",$Embarque);
		if (empty($QtdSaca)) {
			$QtdSaca = 0;
		}
		$sql->bindValue(":QtdSaca",$QtdSaca);
		if (empty($QtdKgSaca)) {
			$QtdKgSaca = 0;
		}
		$sql->bindValue(":QtdKgSaca",$QtdKgSaca);
		if (empty($QtdTon)) {
			$QtdTon = 0;
		}
		$sql->bindValue(":QtdTon",$QtdTon);
		if (empty($QtdKg)) {
			$QtdKg = 0;
		}
		$sql->bindValue(":QtdKg",$QtdKg);
		if (empty($VrKg)) {
			$VrKg = 0;
		}
		$sql->bindValue(":VrKg",$VrKg);
		if (empty($Preco)) {
			$Preco = 0;
		}
		$sql->bindValue(":Preco",$Preco);
		$sql->bindValue(":DescCarreg",$DescCarreg);
		$sql->bindValue(":TpFrete",$TpFrete);
		$sql->bindValue(":Qtde",$Qtde);
		$sql->bindValue(":CondPgto",$CondPgto);
		$sql->bindValue(":Carretas",$Carretas);
		$sql->bindValue(":Funrural",$Funrural);
		$sql->bindValue(":LocRetirada",$LocRetirada);
		$sql->bindValue(":Prazo",$Prazo);
		if (empty($DataVF)) {
			$DataVF = '0001-01-01';
		}
		$sql->bindValue(":DataVF",$DataVF);
		$sql->bindValue(":V",$V);
		$sql->bindValue(":VrV",$VrV);
		if (empty($Contratante)) {
			$Contratante = 0;
		}
		$sql->bindValue(":Contratante",$Contratante);
		if (empty($PorTon)) {
			$PorTon = 0;
		}
		$sql->bindValue(":PorTon",$PorTon);
		// if (empty($DataCancel)) {
		// 	$DataCancel = '0001-01-01';
		// }
		// $sql->bindValue(":DataCancel",$DataCancel);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);
		$sql->bindValue(":Extenso",$Extenso);
		$sql->bindValue(":Extenso1",$Extenso1);
		
		$sql->execute();

		$proximo = $contrat + 1;
		$query2 = $this->db->prepare("UPDATE seqcontrato set cmpSeqContCompra = $proximo");
		$query2->execute();
		
		// $id_cod = $this->db->lastInsertId();

		// print_r($id_cmpAte);
		// exit();

		return true;

	}


	public function getProdutos(){

		$array = array();
		$sql = $this->db->query("SELECT cmpCodPro, cmpNomPro FROM produto ORDER BY cmpNomPro");
		
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;

	}


	public function getProdutoscon($id){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.cmpCodPro, b.cmpNomPro FROM contrato a left join produto b on a.cmpCodPro = b.cmpCodPro where cmpCodLanc = :cmpCodLanc");
		$sql->bindValue(":cmpCodLanc", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function getFornecedorescon($id){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.cmpCodFor, b.cmpNomFor FROM contrato a left join fornecedor b on a.cmpCodFor = b.cmpCodFor where cmpCodLanc = :cmpCodLanc");
		$sql->bindValue(":cmpCodLanc", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function update($id, $Contrato, $DataLanc, $DtIdent, $Ident, $CodFor, $CodCli, $CodPro, $Embalagem, $Embarque, $QtdSaca, $QtdKgSaca, $QtdTon, $QtdKg, $VrKg, $Preco, $DescCarreg, $TpFrete, $Qtde, $CondPgto, $Carretas, $Funrural, $LocRetirada, $Prazo, $DataVF, $V, $VrV, $Contratante, $PorTon, $usuario, $CodEmp, $Extenso, $Extenso1, $DataCancel){

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare(" UPDATE contrato set cmpDataLanc = :DataLanc, cmpDtIdent =:DtIdent, cmpIdent = :Ident, cmpCodFor =:CodFor, cmpCodCli =:CodCli,  cmpCodPro =:CodPro, cmpEmbalagem = :Embalagem, cmpEmbarque = :Embarque, cmpQtdSaca = :QtdSaca, cmpQtdKgSaca = :QtdKgSaca, cmpQtdTon = :QtdTon, cmpQtdKg = :QtdKg, cmpVrKg = :VrKg, cmpPreco = :Preco, cmpDescCarreg = :DescCarreg, cmpTpFrete = :TpFrete, cmpQtde = :Qtde, cmpCondPgto = :CondPgto, cmpCarretas = :Carretas, cmpFunRural = :Funrural, cmpLocRetirada = :LocRetirada, cmpPrazo = :Prazo, cmpDataVF = :DataVF, cmpV = :V, cmpVrV = :VrV, cmpContratante = :Contratante,  cmpPorTon = :PorTon, cmpUsuario = :usuario, cmpCodEmp = :CodEmp, cmpExtenso = :Extenso, cmpExtenso1 = :Extenso1, cmpDataCancel = :DataCancel where cmpCodLanc = :cmpCodLanc");

		$sql->bindValue(":cmpCodLanc", $id);
		if (empty($DataLanc)) {
			$DataLanc = '0001-01-01';
		}
		$sql->bindValue(":DataLanc",$DataLanc);
		if (empty($DtIdent)) {
			$DtIdent = '0001-01-01';
		}
		$sql->bindValue(":DtIdent",$DtIdent);
		$sql->bindValue(":Ident",$Ident);
		if (empty($CodFor)) {
			$CodFor = 0;
		}
		$sql->bindValue(":CodFor",$CodFor);
		if (empty($CodCli)) {
			$CodCli = 0;
		}
		$sql->bindValue(":CodCli",$CodCli);
		if (empty($CodPro)) {
			$CodPro = 0;
		}
		$sql->bindValue(":CodPro",$CodPro);
		$sql->bindValue(":Embalagem",$Embalagem);
		$sql->bindValue(":Embarque",$Embarque);
		if (empty($QtdSaca)) {
			$QtdSaca = 0;
		}
		$sql->bindValue(":QtdSaca",$QtdSaca);
		if (empty($QtdKgSaca)) {
			$QtdKgSaca = 0;
		}
		$sql->bindValue(":QtdKgSaca",$QtdKgSaca);
		if (empty($QtdTon)) {
			$QtdTon = 0;
		}
		$sql->bindValue(":QtdTon",$QtdTon);
		if (empty($QtdKg)) {
			$QtdKg = 0;
		}
		$sql->bindValue(":QtdKg",$QtdKg);
		if (empty($VrKg)) {
			$VrKg = 0;
		}
		$sql->bindValue(":VrKg",$VrKg);
		if (empty($Preco)) {
			$Preco = 0;
		}
		$sql->bindValue(":Preco",$Preco);
		$sql->bindValue(":DescCarreg",$DescCarreg);
		$sql->bindValue(":TpFrete",$TpFrete);
		$sql->bindValue(":Qtde",$Qtde);
		$sql->bindValue(":CondPgto",$CondPgto);
		$sql->bindValue(":Carretas",$Carretas);
		$sql->bindValue(":Funrural",$Funrural);
		$sql->bindValue(":LocRetirada",$LocRetirada);
		$sql->bindValue(":Prazo",$Prazo);
		if (empty($DataVF)) {
			$DataVF = '0001-01-01';
		}
		$sql->bindValue(":DataVF",$DataVF);
		$sql->bindValue(":V",$V);
		$sql->bindValue(":VrV",$VrV);
		if (empty($Contratante)) {
			$Contratante = 0;
		}
		$sql->bindValue(":Contratante",$Contratante);
		if (empty($PorTon)) {
			$PorTon = 0;
		}
		$sql->bindValue(":PorTon",$PorTon);
		if (empty($DataCancel)) {
			$DataCancel = '0001-01-01';
		}
		$sql->bindValue(":DataCancel",$DataCancel);
		$sql->bindValue(":usuario",$usuario);
		if (empty($CodEmp)) {
			$CodEmp = 0;
		}
		$sql->bindValue(":CodEmp",$CodEmp);
		$sql->bindValue(":Extenso",$Extenso);
		$sql->bindValue(":Extenso1",$Extenso1);

		$sql->execute();

		return true;
	}


	public function consultaId($id){

		$array = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT * FROM contrato WHERE cmpCodLanc = :cmpCodLanc");
		$sql->bindValue(":cmpCodLanc",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	
	public function del($id){

		if ($this->validaContratoDel($id) == true) {
			$sql = $this->db->prepare("DELETE from contrato where cmpCodLanc = :cmpCodLanc");
			$sql->bindValue(":cmpCodLanc", $id);
			$sql->execute();
			return true;
		} else {
			return false;
		}

		return true;
	}


	public function validaContratoDel($id){
		$valida = 0;
		$sql = $this->db->prepare("SELECT count(cmpContratoCompra) as tot from frete where cmpContratoCompra = :cmpCodLanc");
		$sql->bindValue(":cmpCodLanc", $id);
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
		$sql= $this->db->prepare("SELECT a.*, b.cmpNomePro, c.cmpNomFor, d.cmpNomCli, e.cmpNomCli as cmpNomCliC, f.cmpNomeEmp FROM contrato a left join produto b on a.cmpCodPro = b.cmpCodPro left join fornecedor c on a.cmpCodFor = c.cmpCodFor left join clientes d on a.cmpCodCli = d.cmpCodCli left join contratante e on a.cmpContratante = e.cmpCodCli left join empresa f on a.cmpCodEmp = f.cmpCodEmp WHERE a.cmpCodLanc = :cmpCodLanc");
		
		$sql->bindValue(":cmpCodLanc",$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}



	public function getContratos(){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT cmpCodLanc, cmpDataLanc, cmpContrato FROM contrato where cmpTipo = 'COMPRA' ORDER BY cmpDataLanc");
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


	public function getContratosfor(){
		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT a.cmpCodLanc, b.cmpNomFor, a.cmpDataLanc FROM contrato a left join fornecedor b on a.cmpCodFor=b.cmpCodFor ORDER BY b.cmpNomFor, a.cmpDataLanc");
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}


// Gerar CSV

	public function csvContratosPorPeriodo($data1, $data2){
		$dados = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT a.cmpCodLanc, (case when CAST(a.cmpDataLanc AS DATE)='0001-01-01'then ''else DATE_FORMAT(CAST(a.cmpDataLanc AS DATE),'%d/%m/%Y')end) AS DataLanc, d.cmpNomFor, e.cmpNomPro, format(a.cmpQtdSaca,3,'de_DE'), format(a.cmpQtdTon,3,'de_DE'), format(a.cmpQtdKgTotal,3,'de_DE'), format(a.cmpVrSaco,2,'de_DE'), format(a.cmpVrTotalCon,2,'de_DE') FROM (select 'X' as X, a.* from contrato a) a left join fornecedor d on a.cmpCodFor=d.cmpCodFor left join produto e on a.cmpCodPro=e.cmpCodPro where (case when a.cmpDataLanc='0001-01-01'then ''else DATE_FORMAT(a.cmpDataLanc,'%Y%m%d')end) Between date(:data1) and date(:data2) ORDER BY a.cmpDataLanc, d.cmpNomFor");
		
		if (empty($data1)) {
			$data1 = '0001-01-01';
		}
		$sql->bindValue(":data1",$data1);
		if (empty($data2)) {
			$data2 = '0001-01-01';
		}
		$sql->bindValue(":data2",$data2);
		$sql->execute();

		if($sql->rowCount() > 0){
			$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $dados;
	}


	public function csvContratosPorFornecedor($CodFor){
		$dados = array();

		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->prepare("SELECT d.cmpNomFor, a.cmpCodLanc, (case when CAST(a.cmpDataLanc AS DATE)='0001-01-01'then ''else DATE_FORMAT(CAST(a.cmpDataLanc AS DATE),'%d/%m/%Y')end) AS DataLanc, e.cmpNomPro, format(a.cmpQtdSaca,3,'de_DE'), format(a.cmpQtdTon,3,'de_DE'), format(a.cmpQtdKgTotal,3,'de_DE'), format(a.cmpVrSaco,2,'de_DE'), format(a.cmpVrTotalCon,2,'de_DE') FROM (select 'X' as X, a.* from contrato a) a left join fornecedor d on a.cmpCodFor=d.cmpCodFor left join produto e on a.cmpCodPro=e.cmpCodPro where a.cmpCodFor = :CodFor ORDER BY a.cmpDataLanc");
		
		if (empty($CodFor)) {
			$CodFor = 0;
		}
		$sql->bindValue(":CodFor",$CodFor);
		$sql->execute();

		if($sql->rowCount() > 0){
			$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $dados;
	}

// Fim CSV

}
