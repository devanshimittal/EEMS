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
	
<?php include_once 'admin-lib.php';?>
</head>
<script>
  function clickAlert() {
    alert("Reimbursement Request Submitted");
}
</script>
<body>
<?php 
        $aboutDataList[]= $adminDao->allAboutById($_REQUEST['id']);
		
        if ($aboutDataList) {
			$count=1;
			foreach ($aboutDataList as $trip){ 
		        $eg = $trip->user_id;	
		        $details = $adminDao->EmployeeByEg($eg);
			    $pen = $trip->Id;
				$paper = $adminDao->BillbyPen($pen);
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
 <li class="active"><a href="<?php echo $siteUrl;?>dashboard-<?php echo $details->eg;?>"><em class="fa fa-dashboard">&nbsp;</em> My Profile</a></li>
			<li><a href="<?php echo $siteUrl;?>recent-<?php echo $details->eg;?>"><em class="fa fa-calendar">&nbsp;</em> Recent Trips</a></li>
			<li ><a href="<?php echo $siteUrl;?>request-<?php echo $details->eg;?>"><em class="fa fa-bar-chart">&nbsp;</em> Request Trips</a></li>
            <li><a href="<?php echo $siteUrl;?>login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
	
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color:black;"><b>Check your details</h1>
				
<form id="frm" method="post" enctype="multipart/form-data" action="<?php echo $siteUrl;?>controller/AdminController.php">
 <input type="hidden" name="action_type" value="update-audit"><br>
<input type="hidden" name="place" value="<?php echo $trip->place;?>">
<table align="center">
<tbody class="table-hover">

<input type="hidden" name="user_id" value="<?php echo $trip->user_id;?>">
<input type="hidden" name="allowance" value="<?php echo $trip->allowance;?>">
<tr>
<td class="text-left" class="hi" style=" font-size:18px;color:#2a333c"><b>ID</td>
<td class="text-left" class="hi" style="color:black;font-size:15px;">
<?php echo $trip->Id;?><br>    <input type="hidden" name="id" value="<?php echo $trip->Id;?>"
<div class="form-group col-md-4">
<span class="message" id="msgpic"></span>                                                
</div>
</td>
</tr>
<tr>
<td style="color:#2a333c;font-size:18px;"><b>User_ID</td>
<td  style="color:black;font-size:15px;"><?php echo $trip->user_id;?><br>  <input type="hidden" name="user_id" value="<?php echo $trip->user_id;?>">
</td>
</tr>
<tr>
<td style="color:#2a333c;font-size:18px;"><b>Allowance
</td>
<td style="color:black;font-size:15px;">
	<?php echo $trip->allowance;?><br>  <input type="hidden" name="allowance" value="<?php echo $trip->allowance;?>">
</td>	
</tr>
<tr>
	<td style="color:#2a333c;font-size:18px;"><b>Place
	</td>
	<td style="color:black;font-size:15px;">
	    <?php echo $trip->place;?><br>  <input type="hidden" name="place" value="<?php echo $trip->place;?>">
	</td>
<tr>
    <td style="color:#2a333c;font-size:18px;"><b>Amount Spent
    </td>
    <td style="color:black;font-size:15px;">
       	<?php echo $paper->amount;?><br>  <input type="hidden" name="amount" value="<?php echo $paper->amount;?>">
    </td>
</tr>
<tr>
    <td style="color:#2a333c;font-size:18px;"><b>Bills
    </td>
    <td style="color:black;font-size:15px;">
	Current: <?php echo $paper->bills;?><br>
    	<a href="<?php echo $imageUrl1.$paper->bills;?>" style="color:#000066">
		<em>View</em><br>  <input type="hidden" name="bills" value="<?php echo $paper->bills;?>">
    </td>
</tr>
</tbody>
</table>
					


 <input type="submit" onclick="clickAlert()">
  
</form>
  </body>
<?php include_once'files.php';?>
</html>