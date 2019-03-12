<?php
@ob_start ();
@session_start ();
error_reporting ( 0 );

$LoggedEmail = $_SESSION ['LoggedEmail'];
include_once "baseurl.php";
$loginUrl = $siteUrl.'login.php';

if (! isset ( $_SESSION ['LoggedEmail'] )) {
	header ( "location:$loginUrl" );
}
?>