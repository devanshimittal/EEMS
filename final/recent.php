<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Charts</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	
	 <link rel="stylesheet" href="../final/css/new.css">
	 <style>
	 .tb1{
		 height:100%;
	 }
	 .abc{
	 	color: darkcyan;
	 }
	 </style>
    
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="css/ab.css" rel="stylesheet">
	

</head>
<?php include_once 'admin-lib.php';?>
<body>
		
 <?php
 $aboutDataList[]= $adminDao->TripById($_REQUEST['id']);
		 if ($aboutDataList) {
			$count=1;
			foreach ($aboutDataList as $trip){ 
		        $eg = $trip->id;	
		        $details = $adminDao->EmployeeByEg($eg); ?>		

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
 <li><a href="<?php echo $siteUrl;?>dashboard-<?php echo $details->eg;;?>"><em class="fa fa-dashboard">&nbsp;</em> My Profile</a></li>
			<li class="active"><a href="<?php echo $siteUrl;?>recent-<?php echo $details->eg;;?>"><em class="fa fa-calendar">&nbsp;</em> Recent Trips</a></li>
			<li ><a href="<?php echo $siteUrl;?>request-<?php echo $details->eg;;?>"><em class="fa fa-bar-chart">&nbsp;</em> Request Trips</a></li>
            <li><a href="<?php echo $siteUrl;?>login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
	
			<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
<div class="colour">
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size:30px; color:black"><b>Recent Trips</b></h1>
			</div>
		</div><!--/.row-->
		
  <div class="tbl-header">
   
    <table cellpadding="0" cellspacing="0" border="0" >
      <thead style="background-color:silver">
        <tr>
         <th style="font-size:18px; color:black"><b>Trip ID </b></th>
		  <th style="font-size:18px; color:black"><b>Date of Journey</b></th>
		  <th style="font-size:18px; color:black"><b>Place</b></th>
          <th style="font-size:18px; color:black">&nbsp;</th>
        </tr>
		</thead>
		</div>
      <tbody>
	  <?php 
        $tripList = $adminDao->TripByAll($_REQUEST['id']);
        if ($tripList) {
			$count=1;
		foreach ($tripList as $trip){ ?>
		<tr>
	   <td style="font-size:15px"><?php echo $trip->Trip_ID;?></td>
	  <td style="font-size:15px"><?php echo $trip->DOJ;?></td>
	  <td style="font-size:15px"><?php echo $trip->place;?></td>
	  
	  <td style="font-size:15px">
	 <a href="<?php echo $siteUrl;?>elements-<?php echo $trip->Trip_ID;?>" class="abc"><em><b>Details</b></em></a>
	  <a href="<?php echo $siteUrl;?>upload-<?php echo $trip->Trip_ID;?>" class="abc"><em><b>&nbsp;&nbsp;&nbsp;Upload</b></em></a>
     <a href="<?php echo $siteUrl;?>more-<?php echo $trip->Trip_ID;?>" class="abc"><em><b>&nbsp;&nbsp;&nbsp;Check</b></em></a>
	  </td>
	  
</tr>
	<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
	  </tbody>
    </table >
  


</section>
<?php include_once 'files.php';?>

    <script  src="js/index.js"></script>
	</html>
