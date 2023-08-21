n<?php 

include('header.php');
include('dbconnect.php');

 ?>


<div class="container-fluid">
	

      <?php include('menubar.php')?> 
	<?php // include('menubar1.php');

	//$trans_id= uniqid();
	  
	 
	$caseid=$_GET['caseid'];
	$casetype='';



	$query=mysqli_query($dbcon,"select * from case_table where case_id='$caseid'");
		while($row = mysqli_fetch_array($query)){
			
		
						    	$casetype=$row['case_type'];
						    		 $casetype2=$row['statement'];
						    		 $casetype3=$row['date_added'];
						    		 $casetype4=$row['status'];
						    		 $casetype2=$row['staffid'];
						    		
						    
}
	?>

	

<div class="container-fluid">

	<div class="col-md-2"></div>
	<div class="col-md-8">
		<ul class="list-group" id="myinfo" >

			<li class="list-group-item" id="mylist"></li>

		</ul>
			<div class="panel panel-success">
					  	<div class="panel-heading">
		
					  		<h3 class="panel-title">Details of Action</h3>
					  	</div>
			<div class="panel-body">

			 <div class="container-fluid">
					<form class="form-horizontal" action="saveassigncase.php" method="post" role="form">
				
					  	
					  	<div class="form-row">
					  	<div class="col-md-6">
					  		<div class="form-group">

					    		<label for="">Case Number:</label>

					    		
					    		
					    		  <input type="text" readonly="" class="form-control" name="caseid" value="<?php echo $caseid?>">
					    		
					  		</div>
					  	</div>

					  	<div class="col-md-6">
					  		<div class="form-group">

					    		<label for="">Crime Type:</label>

					    		  <input type="text" class="form-control" readonly="" name="crime" value="<?php echo $casetype?>">
					    		
					  		</div>
					  	</div>




					  	 </div>
					  	
					  	<div class="form-row">
					  	<div class="col-md-6">
					  	<div class="form-group">
									    <label for="">Select Investigator:</label>
									    <select class="form-control" name="investigator" id ="crime">
									    <option selected="selected" value="">Select</option>

									    	<?php
			
										//Get all unions from database
										$sql = mysqli_query($dbcon,"select * from userlogin where status='CID'");
										while($row = mysqli_fetch_assoc($sql)){ ?>

											<option value="<?php echo $row['staffid'] ?>"> <?php echo $row['staffid']?> </option>
										<?php
										}

										?> </select>
							 </div>
						</div>
					  	 </div>

					  <div class="form-group">
					  <button  type="submit" name="saveassign" class="btn btn-success form-control">Save
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