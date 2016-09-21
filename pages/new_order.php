<?php
if(isset($_POST["orderDate"])):
	$x = Array ( "id" =>"",
		"OrderId" => "string",
		"costumerId" => "string",
		"orderNumber" => "string",
		"orderDate" => "time",
		"status" => "int");
	$xx = $dbs->insert('orders',$x);

endif;
?>

<div class="container-fluid">
  <div class="panel panel-info">
     <div class="panel-heading">
          <span>Products</span>
          <span class="pull-right">
              <a href="#new_cataegoty" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add New</a>
          </span>
	  </div>
    <div class="panel-body">
		<form method="post" class="col-md-5">
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon">OrderId</i></span>
					<input type = "text" name="OrderId" class = "form-control" id="id" required>
					<span class = "input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon">Costumr Id</i></span>
					<input type = "text" name="costumerId" class = "form-control" id="cc" required>
					<span class = "input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon">Odrder NO.</i></span>
					<input type = "text" name="orderNumber" class = "form-control" id="on" required>
					<span class = "input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon">Odrder date</i></span>
					<input type = "text" name="orderDate" class = "form-control" id="date" required>
					<span class = "input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon">Status</i></span>
					<input type = "text" name="status" class = "form-control" id="sts" required>
					<span class = "input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
		</form>
	</div>
    <div class="panel-footer"><a href="#" onclick="$('form').submit()"><i class="glyphicon glyphicon-save"></i> Create</a></div>
  </div>
</div>
<script>
$("#date").datepicker({
	"dateFormat":"dd/mm/yy"
});
</script>