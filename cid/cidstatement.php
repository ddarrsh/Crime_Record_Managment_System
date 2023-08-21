<?php 

include('header.php');
include('dbconnect.php');

 ?>


<div class="container-fluid">
	

      <?php include('menubar.php')?> 
	<?php // include('menubar1.php');

	//$trans_id= uniqid();
	  
	 
	$caseid=$_GET['edit'];
	$casetype='';

$statement='';
$status='';

	
	?>

	

<div class="container-fluid">

	<div class="col-md-2"></div>
	<div class="col-md-8">
		<ul class="list-group" id="myinfo" >

			<li class="list-group-item" id="mylist"></li>

		</ul>
			<div class="panel panel-success">
					  	<div class="panel-heading">
		
					  		<h3 class="panel-title">Stattement</h3>
					  	</div>
			<div class="panel-body">

			 <div class="container-fluid">
					<form class="form-horizontal" action="savecidstatement.php" method="post" role="form">
				
					  	
					  	<div class="form-row">
					  <?php
			 		$query=mysqli_query($dbcon,"select * from complaint where case_id='$caseid'");
		while($row = mysqli_fetch_array($query)){
			?>
			 			 <table class="table">
			 			 	<tr>
			 			 		<td width="160px">Case Number:</td><td> <input type="text" value="<?php echo $caseid?>" readonly="" name="caseid"> </td>
			 			 	</tr>
			 			 	<tr>
			 			 		<td>Name:</td><td><?php echo $row['comp_name']?></td>
			 			 	</tr>
			 			 	<tr>
			 			 		<td>Gender:</td><td><?php echo $row['gender']?></td>
			 			 	</tr>
			 			 	<tr>
			 			 		<td>Age:</td><td><?php echo $row['age']?></td>
			 			 	</tr>
			 			 	
			 			 	<tr>
			 			 		<td>Occupation:</td><td><?php echo $row['occupation']?></td>
			 			 	</tr>
			 			 	
			 			 	<tr>
			 			 		<td>Native of </td><td><?php echo $row['loc']?></td>
			 			 	</tr>
			 			 	
			 			 	
			 			 <?php
			 			 }
			 			


			 			 $query=mysqli_query($dbcon,"select * from case_table where case_id='$caseid'");
		while($row = mysqli_fetch_array($query)){
			
			 			 		$statement= $row['statement'];
			 			 		$status= $row['status'];
			 			 	
			 			 	
			 			 	
			 			 	
			 			 
			 			 }
			 			 ?>
			 			 	
			 			 </table>

					  	 </div>
					  	
					  	<div class="form-row">
					  	<div class="col-md-6">
					  	<div class="form-group">
									     <textarea class="ckeditor"  name="statement" id="ckeditor" rows="60" cols="100">
                 <?php echo $statement; ?>
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
							 </div>
						</div>

<div class="col-md-6">
					  	<div class="form-group">
									    <label for="">Select Status:</label>
									    <select class="form-control" name="status" id ="crime" required="">
									    	 <option  value="<?php echo $status; ?>"><?php if($status==''){echo 'Select';}else{echo $status;}  ?></option>
									    <option value="Ongoing">Ongoing</option>
									    <option  value="Completed">Completed</option>



									    	</select>
							 </div>
						</div>





					  	 </div>

					  <div class="form-group">
					  <button  type="submit" name="savecidstatement" class="btn btn-success form-control">Save
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

<?php include('scripts.php'); ?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">

	$(document).on('submit', '#addaction', function(event) {
		event.preventDefault();
		// This removes the error messages from the page
		 $(".list-group-item").remove();
		 
		var formData = $(this).serialize();

			$.ajax({
					url: 'saveassigncase.php',
					type: 'post',
					data: formData,
					dataType: 'JSON',

					success: function(response){

						if(response.error){

							var len = response[0].length;

							for(var i=0; i<len; i++){


								$('#myinfo').append('<li class="list-group-item alert alert-danger"> ' + response[0][i] + '</li>');
													}
										}
					

						else{
							
							Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Your Case Saved',
							  showConfirmButton: false,
							  timer: 3000
							});
							
							$('input[name=statement]').val('');
							setTimeout( function(){
								window.location='caseview.php';
							}, 900);
							

						}

					}
					
					
				});
		


	});

</script>

</body>
</html>