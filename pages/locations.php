<script>$(".location,.cms").addClass("active")</script>
<div class="container-fluid">
  <div class="panel panel-info">
    <!--div class="panel-heading">Locations</div-->
    <div class="panel-body">
		<form method="post" id="form1" action="control/form.php">
		<div class="col-md-4" id="country">
			 <div class="panel panel-warning">
				<div class="panel-heading">
					<span>Countries</span>
					  <span class="pull-right">
						  <a href="#new_cataegoty" data-toggle="modal" data-target="#myModal" id="addcnt"><i class="glyphicon glyphicon-plus"></i> Add New</a>
					  </span>
				</div>
				<div class="panel-body">
					<table class="table">
					<?php
						$q = array("parent"=>0);
						 $result = $dbs->queryCol($tbl="locations",$q) ;
						foreach($result as $key => $val):
						$val["status"] == 0 ? $vv = "style='color:gray;'":$vv = "";
							echo <<<eod
								<tr>
									<td><input type='checkbox' name='del[]' value="$val[0]"/></td>
									<td><a href='$val[0]' id="loc_view" $vv>$val[1]</a><td/>
									<td><i $vv class="glyphicon glyphicon-cog"></i><i $vv class="caret"></i></td>
								</tr>
eod;
						endforeach;
						?>
					</table>
				
				</div>
			</div>
		</div>
		<div class="col-md-4" id="state">
			 
		</div>
		<div class="col-md-4" id="city">
			
		</div>
		<input class="form-control" id="refferer" name="reffer" value="locations" type="hidden" >
		</form>
	</div>
    <div class="panel-footer"><a href="#" onclick="$('#form1').submit()"><i class="glyphicon glyphicon-trash"></i> DELETE</a></div>
  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Country</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="control/form.php">
            <div class="form-group">
              <label class="col-sm-1 control-label"></label>
              <div class="col-sm-10">
                <input class="form-control" id="name" name="locations" type="text" Placeholder="Country Name...">
              </div>
            </div>
			<div class="form-group">
                <label for="stat" class="col-sm-2 control-label">Status</label>
                <label class="radio-inline">
					  <input type="radio" name="status" value="1" checked>Active
					</label>
					<label class="radio-inline">
					  <input type="radio" name="status" value="0">In Active
					</label>
              </div>
			 <input class="form-control" id="parent" name="parent" value="0" type="hidden" >
			 <input class="form-control" id="refferer" name="reffer" value="locations" type="hidden" >
		</form>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-default" onclick="$('form').submit()">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
							<div id="contextMenu" class="dropdown clearfix">
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
								  <li><a tabindex="-1" href="#" id="1">Enable</a></li>
								  <li><a tabindex="-1" href="#" id="2">Disable</a></li>
								  <!--<li><a tabindex="-1" href="#" id="ed">Edit</a></li>-->
								  <li><a tabindex="-1" href="#" id="3">Delete</a></li>
								  <li class="divider"></li>
								  <li><a tabindex="-1" href="#" id="lev">Level Transfer</a></li>
								  <li><a tabindex="-1" href="#" id="bil">Rename</a></li>
								</ul>
							  </div>
							    <style>
									#contextMenu {
									  position: absolute;
									  display:none;
									}
									
								</style>
<div id="load" class="modal fade " role="dialog">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h1><i class="fa fa-refresh fa-spin"></i> Loading....</h1>
      </div>
    </div>
  </div>
</div>
<div id="<?= $label;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New <?= $label;?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="control/form.php" onsubmit="return false">
            <div class="form-group">
              <label class="col-sm-1 control-label"></label>
              <div class="col-sm-10">
                <input class="form-control" id="name" name="locations" type="text" Placeholder="<?= $label;?> Name...">
              </div>
            </div>
			<div class="form-group">
                <label for="stat" class="col-sm-2 control-label">Status</label>
                <label class="radio-inline">
					  <input type="radio" name="status" value="1" checked>Active
					</label>
					<label class="radio-inline">
					  <input type="radio" name="status" value="0">In Active
					</label>
              </div>
			 <input class="form-control" id="parent" name="parent" value="<?= $parent;?>" type="hidden" >
			 <input class="form-control" id="refferer" name="reffer" value="locations" type="hidden" >
		</form>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-default submit">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </div>
 <script>
	$("form #country").on("click","#loc_view",function(e){
		e.preventDefault();
		$("#state").html($("#load").html());
		$("#city").html("");
		var x = $(this).attr("href");
		 $.post("control/locations.php",
		{
			label:"State",
			parent:x,
			prt: $(this).text()
		},function(data){
			$("#state").html(data);
		});
	});
	$("form #state").on("click","#loc_view",function(e){
		e.preventDefault();
		$("#city").html($("#load").html());
		var x = $(this).attr("href");
		 $.post("control/locations.php",
		{
			label:"City",
			parent:x,
			prt: $(this).text()
		},function(data){
			$("#city").html(data);
		});
	});
	$("form #city").on("click","#loc_view",function(e){
		e.preventDefault();
	});
	$(".container-fluid").on("click",".glyphicon-cog,.caret",function(e){
			$("#contextMenu").css({
			display: "block",
			left: e.pageX,
			top: e.pageY
			});
			return false;
		});
	$('body:not(#contextMenu)').click(function(){
			$("#contextMenu").hide();
		});
	$(".glyphicon").css({cursor:"pointer"});
</script>
