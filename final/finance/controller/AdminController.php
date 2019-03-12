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

if ($action_type == "create-trip") {
	 $id=$_REQUEST['id'];
	 $allowance = $_REQUEST ['allowance'];
	 $saveTrip = $adminDao->saveTrip($id,$allowance);
	 
	if ($_FILES ['travel'] ['tmp_name'] != '') {
		$file_name = $_FILES ['travel'] ['name'];
		$temp_name = $_FILES ['travel'] ['tmp_name'];
		$file_parts = pathinfo ( $file_name );
		$new_filename = trim ( $file_parts ['filename'] ) . "." . $file_parts ['extension'];
		if ((strtolower ( $file_parts ['extension'] ) == 'jpg') || (strtolower ( $file_parts ['extension'] ) == 'jpeg') || (strtolower ( $file_parts ['extension'] ) == 'png') || (strtolower ( $file_parts ['extension'] ) == 'pdf')  || (strtolower ( $file_parts ['extension'] ) == 'docx')) {
			move_uploaded_file ( $temp_name, "../../productImage/$new_filename" );
			$adminDao->Travel( $new_filename, $id);
		}
	}
	if ($_FILES ['lodging'] ['tmp_name'] != '') {
		$file_name = $_FILES ['lodging'] ['name'];
		$temp_name = $_FILES ['lodging'] ['tmp_name'];
		$file_parts = pathinfo ( $file_name );
		$new_filename = trim ( $file_parts ['filename'] ) . "." . $file_parts ['extension'];
		if ((strtolower ( $file_parts ['extension'] ) == 'jpg') || (strtolower ( $file_parts ['extension'] ) == 'jpeg') || (strtolower ( $file_parts ['extension'] ) == 'png') || (strtolower ( $file_parts ['extension'] ) == 'pdf')  || (strtolower ( $file_parts ['extension'] ) == 'docx')) {
			move_uploaded_file ( $temp_name, "../../productImage/$new_filename" );
			$adminDao->Lodging( $new_filename, $id);
		}
	}
	$ID = $id;
	header ( "location:http://localhost/final/finance/detail-$ID" );
}

if ($action_type == "pay-status") {
	$id = $_REQUEST ['id'];
	$user_id = $_REQUEST ['user_id'];
	$status = $_REQUEST ['status'];
	$adminDao->updatePayStatus ( $status, $id);
$ID = $user_id;
	header ( "location:http://localhost/final/finance/approve-$ID" );
}


?>