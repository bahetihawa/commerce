<?php
	include "../libs/dbs.php";
	extract($_POST);
	$label == "State" ? $p = "panel-info" : $p = "panel-danger"
?>
			<div class="pnl panel <?= $p;?>">
				<div class="panel-heading">
					<span id="<?= explode(" ",$prt)[0];?>"><?= $prt;?></span>
					  <span class="pull-right">
						  <a href="#" data-toggle="modal" data-target="#<?= $label;?>"><i class="glyphicon glyphicon-plus"></i> Add New</a>
					  </span>
				</div>
				<div class="panel-body">
					<table class="table">
					<?php
						$q = array("parent"=>$parent);
						 $result = $dbs->queryCol($tbl="locations",$q) ;
                      
                        foreach($result as $key => $val):
							$val["status"] == 0 ? $vv = "style='color:gray;'":$vv = "";
							echo <<<eod
								<tr>
									<td><input type='checkbox' name='del[]' value="$val[0]"/></td>
									<td><a $vv href='$val[0]' id="loc_view">$val[1]</a><td/>
									<td><i $vv class="glyphicon glyphicon-cog"></i><i $vv class="caret"></i></td>
								</tr>
eod;
						endforeach;
						?>
					</table>
				
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
	$("body .submit").click(function(e){
		e.preventDefault();
		var x = $(this).parents(".modal-dialog").find("form").serialize();
		$("#<?= $label;?>").modal("hide");
		$("#<?= explode(" ",$prt)[0];?>").html("<i class='fa fa-refresh fa-spin'></i> Refrshing..");
		$.ajax({
			type:	"post",
			url:	"control/form.php",
			data:	x,
			success:function(){		
				$.post("control/locations.php",
				{
					label:"<?= $label;?>",
					parent:"<?= $parent;?>",
					prt: "<?= $prt;?>"
				},function(data){
					$("#<?= strtolower($label);?>").html(data);
				});
			}
		});
	});
	 $(".glyphicon").css({cursor:"pointer"});
 </script>