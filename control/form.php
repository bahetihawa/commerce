<?php
	include "../libs/dbs.php";
	//inset into location
	if(isset($_POST["locations"]) && !empty($_POST["locations"]) && $_POST["locations"] != NULL):
	$x = Array ( "id" =>"",
		"locations" => "string",
		"parent" => "int",
		"status" => "int");
	$xx = $dbs->insert('locations',$x);
	echo $_POST["locations"];
	header("location:../".$_POST["reffer"]);
	endif;
	// deleting location
	
	if(isset($_POST["del"]) && !empty($_POST["del"])):
	print_r($_POST);
	$xx = $dbs->eraseId('locations',$_POST["del"]);
	
	header("location:../locations");
	endif;
	
	// adding category
	if($_POST["reffer"] =="category" && !empty($_POST["category"]) && NULL !==$_POST["category"] ):
	$x = Array ( "id" =>"",
		"parent" => "int",
		"category" => "string",
		"description"=>"string",
		"status" => "int",
		"position" => "int");
	$xx = $dbs->insert('category',$x);
	header("location:../".$_POST["reffer"]);
	endif;
	
	header("location:../".$_POST["reffer"]);
?>