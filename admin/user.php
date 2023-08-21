<?php 
//require_once('session_login.php');
include('dbconnect.php');
include('header.php');

 ?>

 
<br></br>
<div class="container-fluid">
	<?php include('menubar.php');?>
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<div class="panel panel-success">
			<div class="panel panel-success">
			 	<div class="panel-heading">
			 		<h3 class="panel-title">
			 			Case List
			 		</h3>
			 	</div>
<div id="trans-table">
<table id="myTable-trans" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>S/N</th>
	        
	        <th ><center>Surname</center></th>
	        <th><center>Othernames</center></th>
	        <th><center>Status</center></th>
	    
	        <th><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
    	<?php
		// The serial number variable
		$sn=0;
		$query=mysqli_query($dbcon,"select * from userlogin");
		while($row = mysqli_fetch_array($query)){
		$id = $row['staffid'];
		$status=$row['status'];
		$sn++;
		?>
		<tr>
       
        <td><?php echo $sn;?></td>
       
       
		<td><?php echo $row['surname'];?></td>
		<td><?php echo $row['othernames']; ?></td>
		 
		<td><?php echo $row['status']; ?></td>
		
		<td class="empty" width="">
			<button type="button" data-toggle="modal" data-target="#edit<?php echo $row['staffid'];?>" data-placement="left" title="Click to edit"   class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
           
		<button type="button" data-toggle="modal" data-target="#<?php echo $id;?>" data-placement="left"  class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
            
            <?php include('modal_delete_user.php');?> 
             <?php include('modal_edit_user.php'); ?> 
			
			
		</td>
		</tr>
	<?php } ?>    
    </tbody>
</table>
</div>
</div>

	</div>
	<div class="col-md-1"></div>
</div>


<?php include('scripts.php'); ?>


	

<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-trans').DataTable();
	});
</script>
</body>
</html>