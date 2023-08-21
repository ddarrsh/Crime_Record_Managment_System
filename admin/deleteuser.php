<?php
include('dbconnect.php');
if (isset($_POST['delete'])){
	$delete = mysqli_real_escape_string($dbcon,trim($_POST['deleted']));

mysqli_query($dbcon,"DELETE FROM userlogin where staffid='$delete'");


header("location: user.php");
}
?>