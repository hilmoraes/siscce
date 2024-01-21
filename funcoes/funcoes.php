<?php 
	ini_set('default_charset', 'UTF-8');
 ?>

 	<head>
 		<meta charset= "UTF-8"/>
 	</head>

<?php 
	function converte_data($data){
		if (strstr($data, "/")){
			$A = explode ("/", $data);
			$V_data = $A[2] . "-". $A[1] . "-" . $A[0];
		}else{
			$A = explode ("-", $data);
			$V_data = $A[2] . "/". $A[1] . "/" . $A[0];	
		}
		return $V_data;
	}
?>


<?php 
function FormataDatasRel(){
	//Tratar Data 1
		$dt01 = $dt1;
		$d1 = explode(" ", $dt01);
		$dat1 = $d1[0]; // DATA (xxxx-xx-xx)
		$dat1 = explode("-", $dat1);
		$dia = $dat1[2]; // Retorna o dia
		$mes = $dat1[1]; // Retorna o mês
		$ano = $dat1[0]; // Retorna o ano
		$_SESSION['data1'] = $ano . $mes . $dia;
		$_SESSION['DtForm1']= $dia ."/" . $mes ."/" . $ano;

	//Tratar Data 2
		$dt02 = $dt1;
		$d2 = explode(" ", $dt02);
		$dat2 = $d2[0]; // DATA (xxxx-xx-xx)
		$dat2 = explode("-", $dat2);
		$dia2 = $dat2[2]; // Retorna o dia
		$mes2 = $dat2[1]; // Retorna o mês
		$ano2 = $dat2[0]; // Retorna o ano
		$_SESSION['data2'] = $ano2 . $mes2 . $dia2;
		$_SESSION['DtForm2']= $dia2 ."/" . $mes2 ."/" . $ano2;
}
?>

<?php 
function FormataDatasCons(){
	//Tratar Data 1
		$dt01 = $_SESSION['dtc1'];
		$d1 = explode(" ", $dt01);
		$dat1 = $d1[0]; // DATA (xxxx-xx-xx)
		$dat1 = explode("-", $dat1);
		$dia = @$dat1[2]; // Retorna o dia
		$mes = @$dat1[1]; // Retorna o mês
		$ano = $dat1[0]; // Retorna o ano
		$_SESSION['dataC1'] = $ano . '-' . $mes . '-' . $dia;
}
?>

<script>
	function fecha(){
	window.opener.location.reload()
	window.close()}
</script>


<?php
function validaCPF($cpf = null) {

    // Verifica se um número foi informado
    if(empty($cpf)) {
        return false;
    }
 
    // Elimina possivel mascara
    //$cpf = ereg_replace('[^0-9]', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
 
        return true;
    }
}
?>


<?php

function valCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}
?>


<?php
function HoraEmMinuto($time) {
	$_SESSION['h'] = substr($time, 0, 2);
	$_SESSION['m'] = substr($time, 3, 2);
	$_SESSION['hm'] =  $_SESSION['h'] * 60 + $_SESSION['m'];
}

function MinutoEmHora($minutos)	{
	$_SESSION['ho'] = floor($minutos/60);
	$_SESSION['mi'] = abs(($_SESSION['ho']*60)-$minutos);
}
?>


<?php
	function extensos($valor = 0, $maiusculas = false) {
	    if(!$maiusculas){
	        $singular = ["centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão"];
	        $plural = ["centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões"];
	        $u = ["", "um", "dois", "três", "quatro", "cinco", "seis",  "sete", "oito", "nove"];
	    }else{
	        $singular = ["CENTAVO", "REAL", "MIL", "MILHÃO", "BILHÃO", "TRILHÃO", "QUADRILHÃO"];
	        $plural = ["CENTAVOS", "REAIS", "MIL", "MILHÕES", "BILHÕES", "TRILHÕES", "QUADRILHÕES"];
	        $u = ["", "um", "dois", "TRÊS", "quatro", "cinco", "seis",  "sete", "oito", "nove"];
	    }

	    $c = ["", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos"];
	    $d = ["", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa"];
	    $d10 = ["dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove"];

	    $z = 0;
	    $rt = "";

	    $valor = number_format($valor, 2, ".", ".");
	    $inteiro = explode(".", $valor);
	    for($i=0;$i<count($inteiro);$i++)
	    for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
	    $inteiro[$i] = "0".$inteiro[$i];

	    $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
	    for ($i=0;$i<count($inteiro);$i++) {
	        $valor = $inteiro[$i];
	        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
	        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
	        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

	        $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
	        $ru) ? " e " : "").$ru;
	        $t = count($inteiro)-1-$i;
	        $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
	        if ($valor == "000")$z++; elseif ($z > 0) $z--;
	        if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
	        if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
	    }

	    if(!$maiusculas){
	        $return = $rt ? $rt : "zero";
	    } else {
	        if ($rt) $rt = preg_replace("/ E /","/ e /",ucwords($rt));
	            $return = ($rt) ? ($rt) : "Zero" ;
	    }

	    if(!$maiusculas){
	        return preg_replace("/ E /","/ e /",ucwords($return));
	    }else{
	        return strtoupper($return);
	    }
	}
?>
