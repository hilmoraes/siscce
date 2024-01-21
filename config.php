<?php

global $config;
global $db;

$config = array();

	 define("BASE_URL", "http://localhost/siscce/");
	 $config['dbname'] = 'banco_siscce';
	 $config['host'] = 'localhost';
	 $config['dbuser'] = 'root';
	 $config['dbpass'] = 'vertrigo';

  // define("BASE_URL", "http://saagronegocios.com.br/sicoc/");
  // $config['dbname'] = 'saagronegocios';
  // $config['host'] = 'mysql.saagronegocios.com.br';
  // $config['dbuser'] = 'saagronegocios';
  // $config['dbpass'] = 'saagronegocios1';

try{
	// $db = new PDO("mysql:dbname=".$config['dbname'].";host".$config['host'], $config['dbuser'],$config['dbpass']);
	$db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['dbuser'],$config['dbpass']);
// print "Conexão Efetuada com sucesso!";
}catch(PDOException $e){
	echo "Erro: ".$e->getMessage();
}

?>




<?php
//--->get the app url > start
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $PROTO = 'https';
}
else {
  $PROTO = 'http';
} 

$app_url = ($PROTO  )
          . "://".$_SERVER['HTTP_HOST']
          //. $_SERVER["SERVER_NAME"]
          . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
          . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");

//app url
define("APPURL", $app_url);

//--->get the app url > end


function app_db ()
{
	//get the php class from : https://github.com/codewithmark/PHP-Simple-Database-Class
	include_once ("inc/simple-database-class.php");

    $db_conn = array(
        'host' => 'localhost', 
        'database' => 'banco_siscce', 
        'user' => 'root',
        'pass' => 'vertrigo',        
    );

    // $db_conn = array(
    //     'host' => 'mysql.saagronegocios.com.br', 
    //     'database' => 'saagronegocios', 
    //     'user' => 'saagronegocios',
    //     'pass' => 'saagronegocios1',        
    // );

    $db = new SimpleDBClass($db_conn);
    return $db;     
}