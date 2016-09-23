<?php
	$off=0; $limit=20;
     $result = $dbs->queryAll($tbl="costumers",$off,$limit,$order="DESC",$by="id") ;
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
          <span>Costumers</span>
          <span class="pull-right">
              <a href="#new_product" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add New</a>
          </span>
	  </div>
    <div class="panel-body">
		<div class="col-md-9">
			<table class="table table-condensed">
					<thead>
						<tr>
							<th class="col-md-3">Costumer</th>
							<th class="col-md-3">Email</th>
							<th class="col-md-2">Registerd</th>
							<th class="col-md-2">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($result as $k=>$v):
								$v->status == 1 ? $sts = "Active" : $sts = "Idle";
								$v->status == 0 ? $sts1 = "Active" : $sts1 = "Idle";
								echo "<tr>
								<td><a href='costumers&costumer=".$v->costumerId."'>".$v->name."
								</a></.td>
								<td><a href='mailto:".$v->email."'>".$v->email."</a></.td>
								<td>".$v->date."</.td>";
								?>
								<td class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown"><?= $sts;?><span class="caret"></span></span>
									<ul class="dropdown-menu">
										 <li><a href="#"><?= $sts1;?></a></li>
									</ul>
								</td>
								</tr>
						<?php	endforeach;
						?>
					</tbody>
				</table>
		</div>
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
   