<?php
@session_start ();
include_once 'Connection.php';
include_once '../dao/LoginDao.php';

$Connection = new Connection ();
$db = $Connection->getConnection ();
$loginDao = new LoginDao ( $db );

$actionType = $_REQUEST ['actionType'];
if (isset ( $actionType ) && $actionType == "sitelogin") {
	$email_id = $_REQUEST ['email_id'];
	$password = $_REQUEST ['password'];				$isValidUser = $loginDao->isEmployeeUser ( $email_id, $password );	$isValidUser1 = $loginDao->isFinanceUser ( $email_id, $password );	$isValidUser2 = $loginDao->isAuditUser ( $email_id, $password );	if ($isValidUser) {
		$_SESSION ['LoggedId'] = $isValidUser->id;		$_SESSION ['LoggedName'] = $isValidUser->Name;		$_SESSION ['LoggedEmail'] = $isValidUser->Email;		header ( "location:http://localhost/final/dashboard-$isValidUser->id");	}    else if ($isValidUser1) {		$_SESSION ['LoggedId'] = $isValidUser1->UserId;		$_SESSION ['LoggedName'] = $isValidUser1->Name;		$_SESSION ['LoggedEmail'] = $isValidUser1->Email;		header ( "location:http://localhost/final/finance/dashboard-$isValidUser1->UserId" );	}    else if ($isValidUser2) {		$_SESSION ['LoggedId'] = $isValidUser->UserId;		$_SESSION ['LoggedName'] = $isValidUser->Name;		$_SESSION ['LoggedEmail'] = $isValidUser->Email;		header ( "location:http://localhost/final/auditor/dashboard-$isValidUser2->UserId" );	}			else {		header ( "location:http://localhost/final/login.php" );	}
}
?>