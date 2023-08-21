<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['staffid']) || ($_SESSION['staffid'] == '')) {
    header("location: ../login.php");
    exit();
}

$session_id=$_SESSION['staffid'];
?>