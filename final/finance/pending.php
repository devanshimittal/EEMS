<!DOCTYPE html>
<html>
<head>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Charts</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	
	 <link rel="stylesheet" href="css/dev.css">
    
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="css/ab.css" rel="stylesheet">
	

</head>
<?php include_once 'admin-lib.php';?>


    
</head>
<body>
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
			<li><a href="dashboard-<?php echo $list->id;?>"><em class="fa fa-dashboard">&nbsp;</em> My Profile</a></li>
			<li class="active"><a href="pending-<?php echo $list->id;?>"><em class="fa fa-calendar">&nbsp;</em> Pending Requests</a></li>
			<li ><a href="approve-<?php echo $list->id;?>"><em class="fa fa-bar-chart">&nbsp;</em>Approved</a></li>
			
			<li><a href="http://localhost/final/login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
                   	
	<h1 style="color:black"><strong>REQUESTED TRIPS</strong></h1><br>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

   <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0" >
      <thead style="background-color:silver">
        <tr>
         
		  <th style="font-size:20px; color:black"> <strong>Trip ID<strong></th>
		  <th style="font-size:20px; color:black"><strong> Date of Journey</strong></th>
		  <th style="font-size:20px; color:black">&nbsp;</th>
          
        </tr>
      </thead>
      <tbody>
	  <?php 
        $tripList = $adminDao->allTripList();
        if ($tripList) {
			$count=1;
		foreach ($tripList as $trip){ ?>
		<tr>
	
	   <td style="font-size:15px"><?php echo $trip->Trip_ID;?></td>
	  <td style="font-size:15px"><?php echo $trip->DOJ;?></td>
	  
	  <td style="font-size:15px">
	  <a href="<?php echo $siteUrl;?>detail-<?php echo $trip->Trip_ID;?>"style="color:darkcyan"><b><em>Details</em></b></a>
	  </td>
</tr>
	<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
	  </tbody>
	      </table>
   <div>

   </section>
		
	<?php include_once 'files.php';?>			


</html>
