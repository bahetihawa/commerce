<script>$(".store,.cat2").addClass("active")</script>
<div class="container-fluid">
  <div class="panel panel-info">
     <div class="panel-heading">
          <span>Export</span>
          <span class="pull-right">
              <a href="#new_cataegoty" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plums"></i> Oders</a>
          </span>
	  </div>
    <div class="panel-body">
		<form class="col-md-4 well" method ="post" action="control/export.php">
			<h3>Export Orders</h3><hr/>
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon">Status</i></span>
					<select type = "text" name="status" class = "form-control" id="status">
						<option value="">All</option>
						 <?php 
							$x = $dbs->fetchSngle("orders","DISTINCT",["status"]);
							foreach($x as $k=>$v):
								echo "<option value='$v->status'>".$v->status."</option>";
							endforeach;
						?>
					</select>
					
				</div>
			</div>
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon">From</i></span>
					<input type = "text" name="from" class = "form-control" id="from" required>
					<span class = "input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon">To</i></span>
					<input type = "text" name="to" class = "form-control" id="to">
					<span class = "input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			<div class = "form-group">
				<div class = "input-group">
					
					<input type = "submit" class = "btn btn-info form-control" id="push" value ="Export">
					
				</div>
			</div>
			<input type = "hidden" name="table" class = "form-control" value="orders" required>
			<input type = "hidden" name="refer" class = "form-control" value="exportOrders" required>
		</form>
	</div>
    <div class="panel-footer"><a href="./"><i class="glyphicon glyphicon-home"></i> Home</a></div>
  </div>
</div>
<script>
$("#from, #to").datepicker({
	"dateFormat":"dd/mm/yy"
});
</script>