<?php


include('dbconnect.php');
include('session.php');
$logintime=$_SESSION['$staffid'];
unset($_SESSION['$staffid']);
session_destroy();
header('location:../login.php'); 
?>