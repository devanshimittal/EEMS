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
<style>
body{
	color:black;
}
	</style>

</head>
<?php include_once 'admin-lib.php';?>
<script>
  function clickAlert() {
    alert("Bills Uploaded");
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
 <li><a href="<?php echo $siteUrl;?>dashboard-<?php echo $details->eg;?>"><em class="fa fa-dashboard">&nbsp;</em> My Profile</a></li>
			<li class="active"><a href="<?php echo $siteUrl;?>recent-<?php echo $details->eg;?>"><em class="fa fa-calendar">&nbsp;</em> Recent Trips</a></li>
			<li ><a href="<?php echo $siteUrl;?>request-<?php echo $details->eg;?>"><em class="fa fa-bar-chart">&nbsp;</em> Request Trips</a></li>
            <li><a href="<?php echo $siteUrl;?>login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color:black" align="left"><strong>Upload Bills</strong></h1>
				
<form id="frm" method="post" enctype="multipart/form-data" action="<?php echo $siteUrl;?>controller/AdminController.php">
 <input type="hidden" name="action_type" value="update-bill">
 <input type="hidden" name="id" value="<?php echo $trip->Id;?>">
 <input type="hidden" name="place" value="<?php echo $trip->place;?>">
<table align="center" >
<tbody class="table-hover">
<tr>
<td>
<input type="hidden" name="user_id" value="<?php echo $trip->user_id;?>">
<td>
<input type="hidden" name="allowance" value="<?php echo $trip->allowance;?>">
</tr>
<tr>
<td class="text-left" class="hi" style=" font-size:20px;color:#2a333c">Upload bill</td>
<td class="text-left" class="hi">
<input name="bill" type="file" id="bill" style="width:300px" style="color:black">
<div class="form-group col-md-4">

<span class="message" id="msgpic"></span>                                                
</div>
</td>
</tr>
<tr>
<td style="color:#2a333c;font-size:20px;">Enter total amount spent</td>
<td><input type="text" style="color:black" name="total" placeholder="Enter amount" autocomplete="off">
</td>
</tr>
<tr>
<td>
<input type="submit" style="color:black" onclick="clickAlert()">
</td>
</tr>
</tbody>
</table>
  </form>
  <?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>

  </body>

</html>
