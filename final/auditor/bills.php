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
	 <script src="cendor/perfect-scrollbar/perfect-scrollbar.min.js></script>
	 <style>
	 html,body{overflow-y: scroll; }</style>
    
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="css/ab.css" rel="stylesheet">
	
<?php include_once 'admin-lib.php';?>
</head>
<script>
  function clickAlert1() {
    alert("Reimbursement Request Disapproved");
}
</script>
<script>
  function clickAlert() {
    alert("Reimbursement Request Approved");
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
				$phone = $trip->Id;
		        $yo = $adminDao->PendingByphone($phone);
			   
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
	
		<div >
		
	<div >
		<div class="row">
			
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color:black"><strong>ALL DETAILS</strong></h1>
				
	</div>
  </div>
    <table cellpadding="0" cellspacing="0" border="0" style="position: absolute; top: 180%; bottom: 0%; left: 27%; right: 10%;">
	 <tbody>
<tr>
          <td style=" color:black"><strong>Name </strong></td>
          <td><?php echo $details->name; ?></td>
	  </tr>

	  <tr>
          <td style=" color:black"><strong>EMPLOYEE ID </strong></td>
          <td><?php echo $trip->user_id;?></td>
       </tr>
       <tr>
          <td style=" color:black"><strong>Trip ID</strong> </td>
          <td><?php echo $trip->Id;?></td>
       </tr>
	   <tr>
          <td style="color:black"><strong>DATE OF JOURNEY</strong></td>
          <td><?php echo $trip->DOJ;?></td>
        </tr>

        <tr>
          <td style=" color:black"><strong>DATE OF RETURN</strong></td>
          <td><?php echo $trip->DOR;?></td>
       </tr>

	   <tr>
          <td style="color:black"><strong>TOTAL ALLOWANCE</strong></td>
          <td><?php echo $yo->allowance; ?></td>
      </tr>
	  <tr>
          <td style="color:black"><strong>TOTAL SPENT</strong></td>
          <td style="font-size:15px"><?php echo $yo->amount; ?></td>
      </tr>
	  
	  <tr>
          <td style="color:black"><strong>Bills</strong></td>
          <td><?php echo $yo->bills; ?> <a href="<?php echo "http://localhost/final/bills/$yo->bills";?>" style="color:#000066">&nbsp;&nbsp;View</td>
		  <td></td>
      </tr>
	  <tr>
	  <br>
          <td></td>
		  <td>
		  <a href="<?php echo $siteUrl;?>controller/AdminController.php?action_type=trip-status&id=<?php echo $trip->Id;?>&status=1" onclick="clickAlert()">
		<i class="fa fa-check" aria-hidden="true" style="color: green;">Approve</i></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <a href="<?php echo $siteUrl;?>controller/AdminController.php?action_type=trip-status&id=<?php echo $trip->Id;?>&status=0" onclick="clickAlert1()">
		<i class="fa fa-times" aria-hidden="true" style="color: red;">Dispprove</i></a>
		  </td>
      </tr>
 </tbody>
    </table>
	</div>
<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
	
		

  </body>
<?php include_once'files.php';?>
</html>