<?php
include "../libs/dbs.php";
if(isset($_POST["costumerId"]) && null != $_POST["costumerId"]):echo "";
	if(!isset($_POST["password"]) || null == $_POST["password"]){
		unset($_POST["password"]);
		unset($_POST["password1"]);
	}elseif($_POST["password"] !== $_POST["password1"]){
		
		header("location: ../costumers&costumer=".$_POST["costumerId"]."#err");
		exit;
	}else{
		unset($_POST["password1"]);
		$dbs->update("costumers",$_POST,"costumerId");
		header("location: ../costumers");
		exit;
	}
elseif(!isset($_POST["costumerId"]) || null == $_POST["costumerId"]):echo "2";
	if($_POST["password"] !== $_POST["password1"]){
		@header("location: ../costumers&costumer=".$_POST["costumerId"]."#err");
		exit;
	}else{
		unset($_POST["password1"]);
		$_POST["costumerId"] = DATE("ymdhis");
		$validate = array_map( function (){ return "string";}, $_POST);
		$dbs->insert("costumers",$validate);
		header("location: ../costumers");
		exit;
	}
	
endif;
//header("location: ../costumers");