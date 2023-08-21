<?php 

include('header.php');
include('dbconnect.php');
$casetype = $_POST['crime_type'];
	$statement =$_POST['statement'];
	$caseid =$_POST['caseid'];
	
	
mysqli_query($dbcon,"update case_table set diary_of_action='$statement', case_type='$casetype' where case_id='$caseid'")or die(mysqli_error());
	
	 echo "<script type='text/javascript'>alert('Case Edtted');
	  document.location='caseview.php'</script>";
	  

 ?>

