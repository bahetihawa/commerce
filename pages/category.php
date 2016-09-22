<?php
function renderTree($arr, $pid,$l=0){
	//echo "<pre>";print_r($arr);echo "</pre>";die;
	foreach($arr as $key => $val):
          $val[4] = 1 ? $sts = "Enabled" : $sts = "Disabled";
          $val[4] = 0 ? $sts1 = "Enabled" : $sts1 = "Disabled";
		  if($val["parent"] == $pid){
            ?>
                <tr  class='p<?= $val["parent"];?>' id="p<?= $val["id"];?>" style="display:none;">
					<td><input type="checkbox" name="mark[]" /></td>
                    <td><input type="number" name="pos[]" value="<?= $val[5];?>" class="form-control"/></td>
                    <td onclick="toggle_visibility('p<?= $val["id"]?>');" id="x">
						<?php
							for($i = 1; $i <= $l;$i++){
								echo "&nbsp;&nbsp;&nbsp;";
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
						<span class="caret"></span>  <?= $val[2];?>
					</td>
                    <td><?= $val[3];?></td>
                    <td class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i>
                         <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                    </td>
                    <td class="dropdown"><span dropdown-toggle" data-toggle="dropdown"><?= $sts;?><span class="caret"></span></button></span>
						<ul class="dropdown-menu" style='margin-top:-20px;'>
                             <li><a href="#"><?= $sts1;?></a></li>
                        </ul>
					</td>
                </tr>
                            
			<?php
			  if(isset($val["id"])){
				  $pid1 = $val["id"];
				  $l++;
				  renderTree($arr, $pid1,$l);
				  $l--;
			  }
		  }
                        endforeach;
}					
?>
<script>$(".store,.cat1").addClass("active")</script>
<script>
	function resize(obj){
		obj.style.height = obj.contentWindow.document.body.scrollHeight+"px";
	}
</script>
<div class="container-fluid">
  <div class="panel panel-info">
      <div class="panel-heading">
          <span>Category</span>
          <span class="pull-right">
              <a href="#new_cataegoty" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add New</a>
          </span>
	  </div>
    <div class="panel-body">
        <div class="col-sm-9">
		<?php 
			/*  $result = $dbs->queryAll($tbl="category",$off=0,$limit=10,$order="ASC",$by="position") ;
			 foreach($result as $key => $val):
				$array[$val["id"]] = $val;
			 endforeach;
		
		dbs::createTreeView($array,0); */
		
		?>
		
		
		
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
                        $result = $dbs->queryAll($tbl="category",$off=0,$limit=1000,$order="ASC",$by="position") ;
                     
					   echo renderTree($result,0);
				
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-3">
			<iframe src="view/index.php" onload="resize(this)"></iframe>
		</div>
	
	</div>
    <div class="panel-footer"><a href="#"><i class="glyphicon glyphicon-save"></i> Save</a></div>
  </div>
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Category</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" name="addcat" method="post" action="control/form.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">Category Name</label>
              <div class="col-sm-10">
                <input class="form-control" name="category" id="name" type="text" placeholder="Category Name...">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Parent Label</label>
              <div class="col-sm-10">
                <Select class="form-control" name="parent" id="parent">
					<option>Root</option>
					<?php $dbs->tree($tbl="category",$pid=0);?>
				</select>
              </div>
            </div>
            <fieldset>
              <div class="form-group">
                <label for="desc" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea type="text" id="desc" name="description" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="stat" class="col-sm-2 control-label">Status</label>
                <label class="radio-inline">
					  <input type="radio" name="status" value="1" checked>Enabled
					</label>
					<label class="radio-inline">
					  <input type="radio" name="status" value="0">Disabled
					</label>
              </div>
            
            <div class="form-group">
              <label class="col-sm-2 col-xs-6 control-label" for="inputSuccess">Position</label>
              <div class="col-sm-3 col-xs-6">
                <input type="number" name='position' class="form-control col-sm-4" id="pos">
              </div>
            </div>
			</fieldset>
			<input class="form-control" id="refferer" name="reffer" value="category" type="hidden" >
          </form>
      </div>
      <div class="modal-footer">
		 <button type="button" class="btn btn-default" onclick="$('form').submit()">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<script>
var x = document .getElementsByClassName("p0");
for(i = 0; i < x.length; i++){
	x[i].style.display = "";
}

</script>
<script type="text/javascript">
<!--
    
	 function hideRow(id){
		 $("table ."+id).each(function(){
			 $(this).hide();
			 var x = $("."+id).attr('id');
			 if(x != null){
				 alert(x);
				  hideRow(x);
			 }
		 });
	 }
	 function toggle_visibility(id) {
		
		var objid = "."+id;
		var objid2 = id;
		var objid1 = "#"+id;
		if($(objid).css('display') != 'none'){
			
					hideChild(objid2);
			 
		}
		else
			{
				 showChild(id);
			}
				
		  }
	
	function hideChild(objid)
	{
		$('.table-condensed tbody tr').each(function () { 
		  if($(this).hasClass(objid))
		  {
			  var currentid = $(this).attr('id');
			  $(this).hide();
			  hideChild(currentid);
		  }
		});
	}
	function showChild(objid)
	{
		$('.table-condensed tbody tr').each(function () { 
		  if($(this).hasClass(objid))
		  {
			  $(this).show();
		  }
		});
	}
	extendCaret()
	function extendCaret(){
		
		$('.table-condensed tbody tr').each(function (index, value) { 
		  var x = $(this).attr("id");
		  var e = document.getElementsByClassName(x);
		  if(e.length > 0)
			  $(this).find("#x span").css('color','black');
		  else
			   $(this).find("#x span").css('color','rgb(200, 200, 200)');
		});
	} 
	
//-->
</script>