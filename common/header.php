<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= title;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  
  <style>
	.dropdown-menu li{
		border-bottom:1px solid #eee;;
		border-top:1px solid #eee;;
	}.navbar{
		background-color: #3c8dbc;
		border-radius: 0px !importaint; 
	}.navbar a{
		color:white;
	}.navbar li a:hover,.active{
		background-color:#367faa;
	}.navbar li a:after{
		background-color:#367faa;
	}
  </style>
</head>
<body>

<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?= Bussines;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="home"><a href="./"><i class="glyphicon glyphicon-home"></i> Home</a></li>
        <li class="dropdown business">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bussines <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Orders</a></li>
            <li><a href="#">Invoices</a></li>
            <li><a href="#">Shipments</a></li>
            <li><a href="#">Term & Conditions</a></li>
            <li><a href="#">Taxes</a></li>
          </ul>
        </li>
        <li class="dropdown store">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Store <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="cat1"><a href="category">Manage Category</a></li>
            <li class="cat2"><a href="product">Manage Product</a></li>
            <li class="cat3"><a href="inventory">Manage Inventory</a></li>
            <li class="cat4"><a href="filter">Manage Filters</a></li>
          </ul>
        </li>
        <li class="dropdown costumer">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Costumers <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Manage Costumers</a></li>
            <li><a href="#">Recent Visitors</a></li>
            <li><a href="#">Costumer's History</a></li>
          </ul>
        </li>
        <li class="dropdown marketing">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Markerting <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Promo codes</a></li>
            <li><a href="#">Restricted Areas</a></li>
            <!--li><a href="#">Page 1-3</a></li-->
          </ul>
        </li>
        <li class="dropdown report">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="rpt1"><a href="exportOrders">Orders</a></li>
            <li class="rpt2"><a href="exportStock">Low Stock</a></li>
            <li class="rpt3"><a href="exportCostumers">Costumers</a></li>
          </ul>
        </li>
        <li class="dropdown cms">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">CMS <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  
            <li><a href="#">Manage Banner</a></li>
			<li class="location"><a href="locations">Manage Locations</a></li>
			
            <li><a href="#">About</a></li>
            <li><a href="#">Contacts</a></li>
			
            <li><a href="#">Blogs</a></li>
            
          </ul>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
		<li class="dropdown admin">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin</a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-user"></i> Vendors</a></li>
            <li class="devider"><hr/></li>
            <li><a href="#"><i class="glyphicon glyphicon-logouts"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>