 <?php
		require "../libs/config.php";
        require "../libs/dbs.php";
        null !== filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) ? $page = "pages/".filter_input(INPUT_GET, 'page',FILTER_SANITIZE_STRING).".php" : $page="pages/home.php";
	echo "Root";
	$dbs->tree($tbl="category",$pid="0");
 ?>
  <script src="../assets/js/jquery.min.js"></script>
 <script>
	$("option").css({
            "color": "blue",
            "cursor": "pointer",
            "font-family": "Arial",
            "font-size": "15px",
            "padding": "2px"
        });
 </script>