<?php 
include('header.php');
include('dbconnect.php');
require_once('header.php');
?>

<div class="container-fluid"></div>
	

<?php include('menubar.php')?> 
<?php // include('menubar1.php');

	//$trans_id= uniqid();
	  
	 
	$caseid=$_GET['caseid'];
	$staffid=$_GET['id'];
	$crime=$_GET['crimetype'];
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
					<form class="form-horizontal" id="addaction"  role="form">
				
					  	
					  	<div class="form-row">
					  	<div class="col-md-6">
					  		<div class="form-group">

					    		<label for="">Case Number:</label>

					    		
					    		 <input type="hidden" name="staffid" value="<?php echo $staffid?>">
					    		  <input type="text" readonly="" class="form-control" name="caseid" value="<?php echo $caseid?>">
					    		
					  		</div>
					  	</div>

					  	<div class="col-md-6">
					  		<div class="form-group">

					    		<label for="">Crime Type:</label>

					    		  <input type="text" class="form-control" readonly="" name="crime" value="<?php echo $crime?>">
					    		
					  		</div>
					  	</div>




					  	 </div>
					  	
					  	<div class="form-row">
					  	<div class="col-md-6">
					  		<div class="form-group">

					    		<label for="">Diary of Action:</label>

					    		<textarea name="statement" class="form-control"></textarea>
					    		 <input type="hidden" name="staffid" value="<?php echo $staffid?>">
					    		  <input type="hidden" name="caseid" value="<?php echo $caseid?>">
					    		
					  		</div>
					  	</div>
					  	 </div>

					  <div class="form-group">
					  <button  type="submit" name="save_union" class="btn btn-success form-control">Save
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
					url: 'save_action.php',
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
								window.location='addcompl.php';
							}, 900);
							

						}

					}
					
					
				});
		


	});

</script>

</body>
</html>