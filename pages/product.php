<script>$(".store,.cat2").addClass("active")</script>
<style>
tr{
	display:none;
}
</style>
<div class="container-fluid">
  <div class="panel panel-info">
     <div class="panel-heading">
          <span>Products</span>
          <span class="pull-right">
              <a href="#new_cataegoty" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add New</a>
          </span>
	  </div>
    <div class="panel-body">
		kjnkn
	</div>
    <div class="panel-footer"><a href="#" onclick="$('#form1').submit()"><i class="glyphicon glyphicon-trash"></i> DELETE</a></div>
  </div>
</div>
<?php
$results = $dbs->queryAll($tbl="category",$off=0,$limit=10,$order="ASC",$by="position") ;//echo "<pre>"; print_r($results);
 function renderTree($arr, $pid){
	 foreach($arr as $k=>$v){
		 if($v["parent"] == $pid){
			 echo "<tr class='p".$v["parent"]."' id='id".$v["id"]."'><td onclick='toggle_visibility(".$v["id"].");'>".$v["category"]."</td></tr>";
			 $pid1 = $v["id"];
			 renderTree($arr, $pid1);
		 }
	 }
 }
 echo "<table>";
  echo renderTree($results,0);
 echo "</table>";
?>
<script>
var x = document .getElementsByClassName("p0");
for(i = 0; i < x.length; i++){
	x[i].style.display = "block";
}

</script>

<a href="#" onclick="toggle_visibility('foo');">Click here to toggle visibility of element #foo</a>
<div id="foo">This is foo</div>

<script type="text/javascript">
<!--
    function toggle_visibility(id) {
      // var e = document.getElementById(id);
       var e = document.getElementsByClassName("p"+id);
	   for(i = 0; i < e.length; i++){
		   if(e[i].style.display == 'block')
			  e[i].style.display = 'none';
		   else
			  e[i].style.display = 'block';
		}
	}
//-->
</script>