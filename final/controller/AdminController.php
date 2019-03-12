<?php
@ob_start ();
@session_start ();
//error_reporting(0);
include_once 'Connection.php';
$Connection = new Connection ();
$db = $Connection->getConnection ();
require_once ('../dao/AdminDao.php');
$adminDao = new AdminDao ( $db );
date_default_timezone_set ( "Asia/Kolkata" );
$action_type = $_REQUEST ['action_type'];

if($action_type=="create-request"){
	    $id=$_REQUEST['id'];
		$place=$_REQUEST['place'];
		$date_of_journey=$_REQUEST['date_of_journey'];
	    $date_of_return = $_REQUEST['date_of_return'];
		$saveAboutUs =$adminDao->saveRequest($id,$place,$date_of_journey, $date_of_return);
		$isValidUser = $adminDao->isEmployeeUser ( $id );
		$ID = $id;
		
		header("location:http://localhost/final/recent-$ID");
        exit;
}

if ($action_type == "update-bill") {
	 $id=$_REQUEST['id'];
	 $place=$_REQUEST['place'];
	 $user_id=$_REQUEST['user_id'];
	 $allowance=$_REQUEST['allowance'];
	 $total=$_REQUEST['total'];
	 
	$saveBill = $adminDao->saveBill( $id , $user_id , $total);
 
	if ($_FILES ['bill'] ['tmp_name'] != '') {
		$file_name = $_FILES ['bill'] ['name'];
		$temp_name = $_FILES ['bill'] ['tmp_name'];
		$file_parts = pathinfo ( $file_name );
		$new_filename = trim ( $file_parts ['filename'] ) . "." . $file_parts ['extension'];
		if ((strtolower ( $file_parts ['extension'] ) == 'jpg') || (strtolower ( $file_parts ['extension'] ) == 'jpeg') || (strtolower ( $file_parts ['extension'] ) == 'png') || (strtolower ( $file_parts ['extension'] ) == 'pdf')  || (strtolower ( $file_parts ['extension'] ) == 'docx')) {
			move_uploaded_file ( $temp_name, "../../final/bills/$new_filename" );
			$adminDao->Bill( $new_filename, $id);
		}
	}
	if($total>$allowance)
	{
		$another = $id;
	header ( "location:http://localhost/final/more-$another" );
	}
    else if($total<$allowance)
	{ 
	$ID = $user_id;
	header ( "location:http://localhost/final/recent-$ID" );
} 
}

if ($action_type == "update-audit") {
	 $id=$_REQUEST['id'];
	 $place=$_REQUEST['place'];
	 $user_id=$_REQUEST['user_id'];
	 $allowance=$_REQUEST['allowance'];
	 $total=$_REQUEST['amount'];
	 $bills=$_REQUEST['bills'];
	 $saveAudit = $adminDao->saveAudit( $id ,$place, $user_id,$allowance, $total,$bills);
	 
	if ($_FILES ['bills'] ['tmp_name'] != '') {
		$file_name = $_FILES ['bills'] ['name'];
		$temp_name = $_FILES ['bills'] ['tmp_name'];
		$file_parts = pathinfo ( $file_name );
		$new_filename = trim ( $file_parts ['filename'] ) . "." . $file_parts ['extension'];
		if ((strtolower ( $file_parts ['extension'] ) == 'jpg') || (strtolower ( $file_parts ['extension'] ) == 'jpeg') || (strtolower ( $file_parts ['extension'] ) == 'png') || (strtolower ( $file_parts ['extension'] ) == 'pdf')  || (strtolower ( $file_parts ['extension'] ) == 'docx')) {
			move_uploaded_file ( $temp_name, "../../final/auditor/bills/$new_filename" );
			$adminDao->saveAudit( $new_filename, $id);
		}
	}
	$ID = $user_id;
	header ( "location:http://localhost/final/recent-$ID" );
} 

if ($action_type == "update-Password") {
	 $id = $_REQUEST ['id'];
	 $opassword = $_REQUEST ['opassword'];
	 $npassword = $_REQUEST ['npassword'];
	 $rpassword = $_REQUEST ['rpassword'];
	 
	 $updatPasswordBy = $adminDao->updatPasswordBy($id,$opassword,$npassword,$rpassword);
	
}

		
if ($action_type == "upload-photo") {
	
	$id = $_REQUEST['id'];
	if ($_FILES ['pic'] ['tmp_name'] != '') {
		$file_name = $_FILES ['pic'] ['name'];
		$temp_name = $_FILES ['pic'] ['tmp_name'];
		$file_parts = pathinfo ( $file_name );
		$new_filename = trim ( $file_parts ['filename'] ) . "." . $file_parts ['extension'];
		if ((strtolower ( $file_parts ['extension'] ) == 'jpg') || (strtolower ( $file_parts ['extension'] ) == 'jpeg') || (strtolower ( $file_parts ['extension'] ) == 'png')) {
			move_uploaded_file ( $temp_name, "../../profile/$new_filename" );
			$adminDao->updateImage( $new_filename, $id);
		}
	}
	
}
?>
