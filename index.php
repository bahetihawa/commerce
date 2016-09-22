<?php
        require "libs/config.php";
        require "libs/dbs.php";
        null !== filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) ? $page = "pages/".filter_input(INPUT_GET, 'page',FILTER_SANITIZE_STRING).".php" : $page="pages/home.php";
	function prd($x){
		echo "<pre>";print_r($x);echo "</pre>";die;
	}
	function pr($x){
		echo "<pre>";print_r($x);echo "</pre>";
	}
	require "common/header.php";
	file_exists($page) ? require $page : include "pages/404.php";
	require "common/footer.php";
        