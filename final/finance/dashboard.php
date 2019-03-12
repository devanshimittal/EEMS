<!DOCTYPE html>
<html>
<body>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Charts</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="css/ab.css" rel="stylesheet">
	

</head>
<?php include_once 'admin-lib.php';?>

<?php $EmployeeList[]= $adminDao->EmployeeById($_REQUEST['id']);
		
        if ($EmployeeList) {
			$count=1;
			
		foreach ($EmployeeList as $list){ ?>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>EMPLOYEE</span>EXPENSE<span>MANAGEMENT</span>SYSTEM</span></a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<div class="divider"></div>

		<ul class="nav menu">
			<li class="active"><a href="dashboard-<?php echo $list->id;?>"><em class="fa fa-dashboard">&nbsp;</em> My Profile</a></li>
			<li><a href="pending-<?php echo $list->id;?>"><em class="fa fa-calendar">&nbsp;</em> Pending Requests</a></li>
			<li ><a href="approve-<?php echo $list->id;?>"><em class="fa fa-bar-chart">&nbsp;</em>Approved</a></li>
</li>
			<li><a href="http://localhost/final/login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-6">
				<h1 class="page-header" align="right" height:300><b>DASHBOARD</b></h1>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-2">
				<a href="<?php echo $siteUrl;?>settings-<?php echo $list->id;?>"><div class="span">
				<span class="glyphicon glyphicon-cog"></span><strong>&nbsp;Settings</strong></div></a></div>
		
		</div>
		<div class="col-lg-2"></div>
		
		<div class="jumbotron vertical-center">
			<div class="container">
	<div class="row">
		<div class="col-lg-3 col-sm-6">

          
                <div class="cardheader">

                </div>
                <div class="avatar">
                   <img alt="" style="width:100px;height:150px;" src="<?php echo $imageUrl2.$list->pic;?>"><br>
                </div>
                <div class="info">
                    <div class="title">
                       <h5><b>ID:</b> <?php echo $_REQUEST['id']?></h5>
					
					
		<b>Name:</b> <?php echo $list->name;?><br>
		<b>Department:</b> <?php echo $list->department;?><br>
		<b>Designation:</b> <?php echo $list->designation;?><br>
		
		
		<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
                    </div>
                    <br>
					<br>
                  <b> <div class="desc"><i>Tech geek</div>
                </div>
               
        </div>
    </div>

	</div>
</div>
		
	<?php include_once 'files.php';?>	
</body>
</html>
