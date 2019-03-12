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
    alert("Request Submitted");
}
</script>

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
			<li><a href="<?php echo $siteUrl;?>recent-<?php echo $list->id;?>"><em class="fa fa-calendar">&nbsp;</em> Recent Trips</a></li>
			<li class="active"><a href="<?php echo $siteUrl;?>request-<?php echo $list->id;?>"><em class="fa fa-bar-chart">&nbsp;</em> Request Trips</a></li>
            <li><a href="<?php echo $siteUrl;?>login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			
		</div><!--/.row-->
		<div class="col-md-1"></div>
		
		<div class="row">
			<div class="col-md-7">
				<h1 class="page-header" style="color:black"><strong>Request Trips</strong></h1>
				<div class="col-md-4"></div>
				
<form id="frm" method="post" enctype="multipart/form-data" action="<?php echo $siteUrl;?>controller/AdminController.php">
 <input type="hidden" name="action_type" value="create-request">
 <input type="hidden" name="id" value="<?php echo $list->id;?>">
 
<table align="center">
<tbody class="table-hover">

<tr>
<td class="text-left" class="hi" style=" font-size:20px;color:black">City</td>
<td class="text-left" class="hi"><input type="text" color="black" name="place" placeholder="Enter place"></td>
</tr>
<tr>
<td style="color:black;font-size:20px;">From Date</td>
<td style="color:black;"><input type="date" name="date_of_journey"/>
 </td>
</tr>
<tr>
	<td style="color:black;font-size:20px;">To Date</td>
	<td style="color:black;"><input type="date" name="date_of_return"/></td>
</tr>
<tr>
<td style="color:black;">
<button type="submit" onclick="clickAlert()">Submit</button>
</td>
</tr>
</tbody>
</table>
  </form>
  <?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>

  </body>

</html>
