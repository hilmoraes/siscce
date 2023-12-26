<?php

include_once ("inc/config.php");


//--->get all clientescontatos > start
if(isset($_GET['call_type']) && $_GET['call_type'] =="get")
{
	$q1 = app_db()->select('select * from clientescontatos');
	echo json_encode($cont);
}
//--->get all clientescontatos > end




//--->update single entry > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="single_entry")
{	

	$cmpCodCon 	= app_db()->CleanDBData($_POST['cmpCodCon']);
	$col_name  	= app_db()->CleanDBData($_POST['col_name']); 
	$col_val  	= app_db()->CleanDBData($_POST['col_val']);
	
	$tbl_col_name = array("cmpNomeCon", "cmpFoneCon", "cmpEmailCon", "cmpCodCon");

	if (!in_array($col_name, $tbl_col_name))
	{
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'invalid col_name', 
		));
		die();
	}

	$q1 = app_db()->select("select * from clientescontatos where cmpCodCon='$cmpCodCon'");
	if($q1 < 1) 
	{
		//no record found in the database
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'no entries were found', 
		));
		die();
	}
	else if($q1 > 0) 
	{
		//found record in the database
		 
		$strTableName = "clientescontatos";

		$array_fields = array(
			$col_name => $col_val,
		);
		$array_where = array(    
		  'cmpCodCon' => $cmpCodCon,
		);
		//Call it like this:  
		app_db()->Update($strTableName, $array_fields, $array_where);


		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'updated entry', 
		));
		die();
	}
}
//--->update single entry > end




//--->update a whole row  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="row_entry")
{	

	$cmpCodCon 	= app_db()->CleanDBData($_POST['cmpCodCon']);
	$cmpNomeCon  	= app_db()->CleanDBData($_POST['cmpNomeCon']); 
	$cmpFoneCon  	= app_db()->CleanDBData($_POST['cmpFoneCon']); 
	$cmpEmailCon  	= app_db()->CleanDBData($_POST['cmpEmailCon']); 	
	
	$q1 = app_db()->select("select * from clientescontatos where cmpCodCon='$cmpCodCon'");
	if($q1 < 1) 
	{
		//no record found in the database
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'no entries were found', 
		));
		die();
	}
	else if($q1 > 0) 
	{
		//found record in the database
		 
		$strTableName = "clientescontatos";

		$array_fields = array(
			'cmpNomeCon' => $cmpNomeCon,
			'cmpFoneCon' => $cmpFoneCon,
			'cmpEmailCon' => $cmpEmailCon,
		);
		$array_where = array(    
		  'cmpCodCon' => $cmpCodCon,
		);
		//Call it like this:  
		app_db()->Update($strTableName, $array_fields, $array_where);


		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'updated row entry', 
		));
		die();
	}
}
//--->update a whole row > end




//--->new row entry  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="new_row_entry")
{	

	$cmpCodCon 	= app_db()->CleanDBData($_POST['cmpCodCon']);
	$cmpNomeCon  	= app_db()->CleanDBData($_POST['cmpNomeCon']); 
	$cmpFoneCon  	= app_db()->CleanDBData($_POST['cmpFoneCon']); 
	$cmpEmailCon  	= app_db()->CleanDBData($_POST['cmpEmailCon']); 	
	
	$q1 = app_db()->select("select * from clientescontatos where cmpCodCon='$cmpCodCon'");
	if($q1 < 1) 
	{
		//add new row
		$strTableName = "clientescontatos";

		$insert_arrays = array
		(
			'cmpCodCon' => $cmpCodCon,
			'cmpNomeCon' => $cmpNomeCon,
			'cmpFoneCon' => $cmpFoneCon,
			'cmpEmailCon' => $cmpEmailCon,
		);

		//Call it like this:
		app_db()->Insert($strTableName, $insert_arrays);

		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'added new entry', 
		));
		die();
	}	 
}
//--->new row entry  > end



//--->new row entry  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="delete_row_entry")
{	

	$cmpCodCon 	= app_db()->CleanDBData($_POST['cmpCodCon']);	 
	
	$q1 = app_db()->select("select * from clientescontatos where cmpCodCon='$cmpCodCon'");
	if($q1 > 0) 
	{
		//found a row to be deleted
		$strTableName = "clientescontatos";

		$array_where = array('cmpCodCon' => $cmpCodCon);

		//Call it like this:
		app_db()->Delete($strTableName,$array_where);

		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'deleted entry', 
		));
		die();
	}	 
}
//--->new row entry  > end