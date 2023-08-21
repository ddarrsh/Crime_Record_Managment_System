<?php
include('dbconnect.php');
if (isset($_POST['delete'])){
	$delete = mysqli_real_escape_string($dbcon,trim($_POST['deleted']));
mysqli_query($dbcon,"DELETE FROM case_table where case_id='$delete'");
mysqli_query($dbcon,"DELETE FROM investigaion where case_id='$delete'");
mysqli_query($dbcon,"DELETE FROM complainant where case_id='$delete'");


header("location: caseview.php");
}
?>