<?php
	$off=4; $limit=2;
     $result = $dbs->queryAll($tbl="category",$off,$limit,$order="DESC",$by="id") ;
	$count = count($dbs->fetchSngle($tbl="category","id,status",1));
	$count%$limit > 0 ? $looplimit = ($count/$limit)+1 : $looplimit = ($count/$limit);
	(($off/$limit) -2) > 1 ? $start = round(($off/$limit) -2) : $start = 1 ;
	$start + 3 < $looplimit ? $end = $start + 3 : $end = $looplimit;
	$current = ($off+$limit)/$limit;
	$end."  ".$start."  ".$current;	
	$prev = ($limit - 2)*$current;
	$next = $limit*$current;
	
?>
<div class="container-fluid">
  <div class="panel panel-info">
     <div class="panel-heading">
          <span>Products</span>
          <span class="pull-right">
              <a href="#new_product" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add New</a>
          </span>
	  </div>
    <div class="panel-body">
		<table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1"><input type="checkbox" name="all"  /></th>
                        <th  class="col-md-1">Pos.</th>
                        <th class="col-md-3">Category</th>
                        <th class="col-md-3">Discription</th>
                        <th class="col-md-2">Action</th>
                        <th class="col-md-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						foreach($result as $k=>$v):
							echo "<tr><td>".$v->id;echo "</.td></tr>";
						endforeach;
                    ?>
                </tbody>
            </table>
	</div>
    <div class="panel-footer">
	<?php if($current != 1):
	 ?>
		<button id='prev' x='<?= $prev;?>'>Prv</button>
	<?php 
	endif;
	for($i = $start; $i <= $end; $i++) : 
		echo "<button id='pagination".$i."' x='".$i."'>".$i."</button>";
	 endfor;
	 if($end != $looplimit):
	 ?>
		<button id='next' x='<?= $next;?>'>Next</button>
	<?php endif; ?>
	</div>
  </div>
</div>
<script>
	$("#pagination<?= $current;?>").css("color","gray");
	$("button").on("click",function(){
		if($(this).attr("id") != "pagination<?= $current;?>" ){
			var off = parseInt("<?=$limit;?>");
			var offset = off*(parseInt($(this).attr("x"))-1);
			alert(offset);
		}
	});
	
</script>
   