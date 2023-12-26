<?php
		ob_end_clean();
		include_once('class/tcpdf/tcpdf.php');
		include_once("class/PHPJasperXML.inc.php");
		include_once ('setting.php');
		$xml =  simplexml_load_file("relatorios/relContratoF.jrxml");
		// $data1 = "'" . $data1 . "'";
		// $data2 = "'" . $data2 . "'";
		$CodFor = $fornecedor;
		$PHPJasperXML = new PHPJasperXML();
		$PHPJasperXML->debugsql=false;
		$PHPJasperXML->arrayParameter=array("rel"=>$rel, "CodFor"=>$CodFor);
		$PHPJasperXML->xml_dismantle($xml);
		$PHPJasperXML->connect($server,$user,$pass,$db);
		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("I");
?>
