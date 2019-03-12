<?php 
include_once "baseurl.php";
require_once 'controller/Connection.php';
require_once 'dao/AdminDao.php';
$Connection = new Connection ();
$db = $Connection->getConnection ();
$adminDao = new AdminDao($db);
?>