<script>$(".store,.cat2").addClass("active")</script>

<div class="container-fluid">
  <div class="panel panel-info">
     <div class="panel-heading">
          <span>Products</span>
          <span class="pull-right">
              <a href="#new_product" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add New</a>
          </span>
	  </div>
    <div class="panel-body">
		<form class="form-horizontal col-md-12">
			<fieldset class="col-md-6">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Product Name:</i>
						</div>
						<input type="text" name="productName" class="form-control" tabindex="1" id="productName" placeholder="Enter Product Name"/>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Category:</i>
						</div>
						<select name="category[]" class="form-control" class="form-control" tabindex="2" multiple="true">
							<option>Chose Categoty</option>
							<?php $dbs->tree($tbl="category",$pid=0);?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Brand:</i>
						</div>
						<input type="text" name="brand" tabindex="3" class="form-control" id="brand" placeholder="Enter Product Brand"/>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Model</i>
						</div>
						<input type="text" name="model" tabindex="4" class="form-control" Placeholder="Model No...." Required />
					</div>
				</div>
			</fieldset>
			<fieldset class="col-md-6">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Price:</i>
						</div>
						<input type="text" name="price" class="form-control" tabindex="5" id="Price" placeholder="Enter Product price"/>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Offer Price:</i>
						</div>
						<input type="text" name="offerPrice" class="form-control" tabindex="5" id="Price" placeholder="Enter Offer Price"/>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Shipping Charge:</i>
						</div>
						<input type="text" name="shipping" tabindex="3" class="form-control" id="shipping" placeholder="Enter Shipping Charge"/>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i>Stock</i>
						</div>
						<input type="text" name="stock" id="stock" tabindex="4" class="form-control" Placeholder="Available Stock" Required />
					</div>
				</div>
			</fieldset>
		  </form>
	</div>
    <div class="panel-footer"><button href="#" onclick="$('#form1').submit()"><i class="glyphicon glyphicon-hand-up"></i> Submit</button></div>
  </div>
</div>