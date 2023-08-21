<?php 

include('header.php');
include('dbconnect.php');
$staffid = $_POST['username'];
	$fname =$_POST['fname'];
	$oname =$_POST['oname'];
	$status =$_POST['status'];
	
	if($status==''){
mysqli_query($dbcon,"update userlogin set surname='$fname', othernames='$oname' where staffid='$staffid'")or die(mysqli_error());
}
if(!empty($status)){
mysqli_query($dbcon,"update userlogin set surname='$fname',status='$status', othernames='$oname' where staffid='$staffid'")or die(mysqli_error());
}

	
	 echo "<script type='text/javascript'>alert('Staff Edtted');
	  document.location='user.php'</script>";
	  

 ?>

