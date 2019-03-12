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
	
	 <link rel="stylesheet" href="css/dev.css">
    
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="css/ab.css" rel="stylesheet">
	

</head>
<?php include_once 'admin-lib.php';?>
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
 <li><a href="<?php echo $siteUrl;?>dashboard-<?php echo $list->id;?>"><em class="fa fa-dashboard">&nbsp;</em> My Profile</a></li>
			<li class="active" style="color:black;size:50px"><a href="<?php echo $siteUrl;?>pending-<?php echo $list->id;?>"><em class="fa fa-calendar">&nbsp;</em> Pending Requests</a></li>
			<li><a href="http://localhost/final/login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li></ul>
	</div><!--/.sidebar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>        
        </div><!--/.row-->
  	
	
		<div class="row">
		
			<div class="col-lg-12">
				<h1 class="page-header" style="color:black;"><strong>Trips</h1><br>
			</div>
			<div class="col-md-4"></div>
		</div><!--/.row-->
	
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0" style="position: absolute; top: 99%; bottom: 10%; left: 0%; right: 0;">
      <thead style="background-color:silver">
        <tr>
         <th style="font-size:18px; color:black"><b>Trip ID </b></th>
		  <th style="font-size:18px; color:black"><b>Place</b></th>
		  <th style="font-size:18px; color:black"><b>DOJ</b></th>
          <th style="font-size:18px; color:black">&nbsp;</th>
        </tr>
      </thead>
	   <tbody>
        <?php $tripList= $adminDao->allPendingList();
        if ($tripList) {
			$count=1;
		foreach ($tripList as $pending){
		       $bottle = $pending->Trip_ID;	
		       $details = $adminDao->allAboutByBottle($bottle);
		?>
		<tr>
	  <td style="font-size:15px"><?php echo $pending->Trip_ID;?></td>
	   <td style="font-size:15px"><?php echo $pending->place;?></td>
	   <td style="font-size:15px"><?php echo $details->DOJ;?></td>
	    
	  <td style="font-size:15px">
	  <a href="<?php echo $siteUrl;?>bills-<?php echo $pending->Trip_ID;?>"style="color:#000066"><i>Bills</i></a>
	  </td>
</tr>
	<?php $count++;}}
	else
	{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
  </tbody>
	  
    </table>
  </div>
</section>
		
<?php include_once 'files.php';?>

</html>
