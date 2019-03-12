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
<?php $aboutDataList[]= $adminDao->allAboutById($_REQUEST['id']);
	   
	    if ($aboutDataList) {
			$count=1;
		foreach ($aboutDataList as $trip){
		$eg = $trip->user_id;	
		$details = $adminDao->EmployeeByEg($eg);
		
		?>
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
			<li><a href="dashboard-<?php echo $details->eg;?>"><em class="fa fa-dashboard">&nbsp;</em> My Profile</a></li>
			<li class="active"><a href="pending-<?php echo $details->eg;?>"><em class="fa fa-calendar">&nbsp;</em> Pending Requests</a></li>
			<li ><a href="approve-<?php echo $details->eg;?>"><em class="fa fa-bar-chart">&nbsp;</em>Approved</a></li>

			<li><a href="http://localhost/final/login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
    
	
	<h1 style="font-size:25px;color:black"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS OF THE EMPLOYEE</strong></h1><br>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
	<div class="tbl-header">
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
	 <tbody>

       
		<tr>
          <td style="font-size:18px;color:#1f2e2e">Name </td>
          <td style="font-size:15px"><?php echo $details->name; ?></td>
	  </tr>

	  <tr>
          <td style="font-size:18px;color:#1f2e2e">Employee ID </td>
          <td style="font-size:15px"><?php echo $trip->user_id;?></td>
       </tr>

	   <tr>
          <td style="font-size:18px;color:#1f2e2e">Date of Journey</td>
          <td style="font-size:15px"><?php echo $trip->DOJ;?></td>
        </tr>

        <tr>
          <td style="font-size:18px;color:#1f2e2e">Date of Return</td>
          <td style="font-size:15px"><?php echo $trip->DOR;?></td>
       </tr>

	   <tr>
          <td style="font-size:18px;color:#1f2e2e">Account No.</td>
          <td style="font-size:15px"><?php echo $details->account; ?></td>

        </tr>
 </tbody>
    </table>
	</div>

	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size:25px;color:#1f2e2e"><strong>TRIP DETAILS</strong></h1><br>
			</div>
		</div>
     <form id="frm" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php echo $siteUrl;?>controller/AdminController.php">
     <input type="hidden"  name="action_type" value="create-trip">
	<input type="hidden" name="id" value="<?php echo $trip->Id;?>">
	<div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td style="font-size:18px;color:#1f2e2e">Travel  </td>
          <td style="font-size:15px">
		  <input name="travel" type="file" id="travel" style="width:300px">
		  <div class="form-group col-md-4">
          Current: <?php echo $trip->travel;?> 
         
		   <span class="message" id="msgpic"></span>                                                
           </div>
		   </td>
   </tr>
    <tr>
          <td style="font-size:18px;color:#1f2e2e">Accomodation </td>
          <td style="font-size:15px">
		  <input name="lodging" type="file" id="lodging" style="width:300px">
		  <div class="form-group col-md-4">
          Current: <?php echo $trip->lodging;?> 
		   <span class="message" id="msgpic"></span> 
           </div>
		   </td>
   </tr>
        <tr>
          <td style="font-size:18px;color:#1f2e2e">Total Allowance</td>
    	<td style="font-size:15px">Rs.<input  type="text" placeholder="Enter amount" name="allowance" value="<?php echo $trip->allowance;?>" style="color:black"></td>
    </tr>
	<tr>
	<td style="font-size:15px"></td>
	<td style="font-size:15px"><button type="submit" id="submit" style="color:black">Submit</button></td>
	</tr>
	</tbody>
    </table>
 </div>
</form>
<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>

	
<?php include_once 'files.php'?>
    <script  src="js/index.js"></script>
	

</html>
