<?php
 include_once 'admin-lib.php';

session_start();
$id=$_REQUEST['id'];

if (count($_POST) > 0) {
	$query= "SELECT * from firm WHERE user_id='" . $id . "'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
	
	$query1="UPDATE firm set password='" . $_POST["newPassword"] . "' WHERE user_id='" . $id . "'";
	
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($db,$query1 );
        echo "Password Changed";
    } else
        echo "Current Password is not correct";
}
?>
<html>
<head>
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>
<body>
<?php $EmployeeList[]= $adminDao->EmployeeById($_REQUEST['id']);
		
        if ($EmployeeList) {
			$count=1;
			
		foreach ($EmployeeList as $list){ ?>
		
<form name="frmChange" method="post" action=""  onSubmit="return validatePassword()">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="jumbotron">
   <div class="form-group">
    <label for="exampleInputPassword">Enter Current Password</label>
    <input type="password" class="form-control" id="currentPassword" name="currentPassword"  placeholder="Enter password" required>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Enter Password</label>
    <input type="password" class="form-control" id="newPassword" name="newPassword"  placeholder="Enter New password" required>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Re-Enter Password</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
  </div>
   <a href="">
  <input type="submit" name="Submit" value="submit" class="btn btn-primary"></a>
</form>
</div></div>
<div class="col-md-3"></div>
</body>
<?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
  
</html>