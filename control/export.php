<?php
	session_start();
	require "../libs/export.php";
	extract($_POST);
	empty($to) ? $to = date("d/m/Y") : $to = $to; 
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$file = fopen('php://output', 'w');
	$xx = export::between("orders","orderDate",$from,$to,$status);
	$flag = 0;
	foreach($xx as $k => $v):
		unset($v["id"]);
		if($flag == 0){
			fputcsv($file,array_keys($v));
			fputcsv($file,$v);
		}else{
			fputcsv($file,$v);
		} 
		$flag =1;
	endforeach;
?>