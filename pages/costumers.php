<?php
	if(isset($_GET["costumer"])):
		$cid =  strip_tags($_GET["costumer"]);
		$cid =  str_replace('"', "", $cid);
		$cid =  str_replace("'", "", $cid);
		$col = ["costumerId"=>$cid];
		$result = $dbs->queryCol("costumers",$col,"AND") ;
		$data = (array)$result[0] ;
		extract($data);
	endif;
	
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
			<form method="post" action="control/form2.php" name="costumer">
				<h4>Bacic Information</h4>
				<input type="hidden" name="costumerId" value="<?= $costumerId ;?>" />
			  <fieldset class="col-md-6">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Name</i>
						</div>
						<input type="text" name="name" class="form-control col-md-6" Placeholder="Product Name...." value="<?= $name;?>" Required />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Email</i>
						</div>
						<input type="email" name="email" class="form-control col-md-6" Placeholder="Email" Required />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Password</i>
						</div>
						<input type="password" name="password" class="form-control col-md-6" Placeholder="*********"  />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Confirm Password</i>
						</div>
						<input type="password" name="password1" class="form-control col-md-6" Placeholder="*********"  />
					</div>
				</div>
				
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Phone</i>
						</div>
						<input type="text" name="phone" class="form-control col-md-6" Placeholder="Phone...." Required />
					</div>
				</div><hr>
			  </fieldset>
			  <fieldset class="col-md-6">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Line-1</i>
						</div>
						<input type="text" name="add1" class="form-control col-md-6" Placeholder="Address Line 1" Required />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Line-2</i>
						</div>
						<input type="text" name="add2" class="form-control col-md-6" Placeholder="Address line 2"  />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>City</i>
						</div>
						<select name="city" class="form-control">
							  
								<option value="0">Choose City</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>State</i>
						</div>
						<select name="state" class="form-control">
							  
								<option value="0">Choose State</option>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group">
						<div class="input-group-addon">
							<i></i>
						</div>
						<select name="country" class="form-control">
							  
								<option value="0">Choose Country</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>ZIP</i>
						</div>
						<input type="text" name="zip" class="form-control col-md-6" Placeholder="ZIP Code"  />
					</div>
				</div><hr>
			  </fieldset>
			  
			  <fieldset class="col-md-6">
				<h4>Billing Address</h4>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Line-1</i>
						</div>
						<input type="text" name="billAdd1" class="form-control col-md-6" Placeholder="Address Line 1" Required />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Line-2</i>
						</div>
						<input type="text" name="billAdd2" class="form-control col-md-6" Placeholder="Address line 2"  />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>City</i>
						</div>
						<select name="billCity" class="form-control">
							  
								<option value="0">Choose City</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>State</i>
						</div>
						<select name="billState" class="form-control">
							  
								<option value="0">Choose State</option>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group">
						<div class="input-group-addon">
							<i></i>
						</div>
						<select name="billCountry" class="form-control">
							  
								<option value="0">Choose Country</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>ZIP</i>
						</div>
						<input type="text" name="billZip" class="form-control col-md-6" Placeholder="ZIP Code"  />
					</div>
				</div>
			  </fieldset>
			  <fieldset class="col-md-6" id="addressPair1">
				<h4><input type="checkbox" name="addressPair" id="addressPair">&nbsp;&nbsp;&nbsp; Shipping Address Same As Billing Address</h4>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Line-1</i>
						</div>
						<input type="text" name="shipAdd1" class="form-control col-md-6" Placeholder="Address Line 1" Required />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Line-2</i>
						</div>
						<input type="text" name="shipAdd2" class="form-control col-md-6" Placeholder="Address line 2"  />
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group">
						<div class="input-group-addon">
							<i></i>
						</div>
						<select name="shipCity" class="form-control">
							  
								<option value="0">Choose City</option>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group">
						<div class="input-group-addon">
							<i></i>
						</div>
						<select name="shipState" class="form-control">
							  
								<option value="0">Choose State</option>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group">
						<div class="input-group-addon">
							<i></i>
						</div>
						<select name="shipCountry" class="form-control">
							  
								<option value="0">Choose Country</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>ZIP</i>
						</div>
						<input type="text" name="shipZip" class="form-control col-md-6" Placeholder="ZIP Code"  />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Phone</i>
						</div>
						<input type="text" name="shipPhone" class="form-control col-md-6" Placeholder="Phone"  />
					</div>
				</div>
			  </fieldset>
			</form>
		</div>
	</div>
    <div class="panel-footer">
		<button onclick="forms.costumer.submit()">Submit</button>
	</div>
  </div>
</div>
<script>

	$("#addressPair").click(function(){
		if($(this).prop("checked") ==true){
			$("#addressPair1 :text").prop("disabled",true);
			$("#addressPair1 select").prop("disabled",true);
		}else{
			$("#addressPair1 :text").prop("disabled",false);
			$("#addressPair1 select").prop("disabled",false);
		}
	});
	$('input:not[password]').each(function () {
        var id = $(this).attr('name');
		$(this).val(id);
    });
	function getFormElelemets(formName){
	  var elements = document.forms[formName].elements;
	  for (i=0; i<elements.length; i++){
		alert(elements[i])
	  }
	}
</script>
   