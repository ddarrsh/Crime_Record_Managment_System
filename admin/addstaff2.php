<?php 

include('header.php');
include('dbconnect2.php');

 ?>


<div class="container-fluid">

      <?php include('menubar.php')?> 
	<?php // include('menubar1.php');

	

	?>

	

<div class="container-fluid">

	<div class="col-md-2"></div>
	<div class="col-md-8">
		<ul class="list-group" id="myinfo" >

			<li class="list-group-item" id="mylist"></li>

		</ul>
			<div class="panel panel-success">
					  	<div class="panel-heading">
					  		      <?php 
					  		     
					  		      ?> 
		
					  		<h3 class="panel-title">Enter Staff Details</h3>
					  	</div>
			<div class="panel-body">

			 
				


				<div class="container-fluid">
					<form class="form-horizontal" method="post" action="savestaff.php" id="addstaff"  role="form">
						<div class="form-row">
                        <div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Staff ID:</label>
					    		<input type="text" name="staffid" class="form-control" id="staffid" placeholder="Enter StaffID" >
					  		</div>
					  	</div>
				</div>

						<div class="form-row">
                        	<div class="col-md-6">
					       		<div class="form-group">
					       		 <label for="">Surname:</label>
					       	
					        		<input type="text" name="surname" class="form-control" id="sname" placeholder="Enter Name"
					    		autofocus=""  >
					       		</div>
					   		</div>

					   		<div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Othernames:</label>
					    		<input type="text" name="othernames" class="form-control" id="Othernames"  placeholder="Enter Othernames" >
					  			</div>
					  		</div>
					  	</div>



						<div class="form-row">
                        	<div class="col-md-6">
					       		<div class="form-group">
					       		 <label for="">National ID NO:</label>
					       		 
					        	<input type="text" name="nid" class="form-control" id="nid" placeholder="Enter Name"
					    		autofocus=""  >
					       		</div>
					       	</div>

					       		<div class="col-md-6">
					       		<div class="form-group">
									    <label for="">Select ID Type:</label>
									    <select class="form-control" name="id_type" id ="idcrime">
									    <option selected="selected" value="">Select</option>

											<option value="Voters ID"> Voters ID </option>
											<option value="National Idenfication Card"> National Idenfication Card </option>
											<option value="Passport"> Passport </option>
											<option value="Drivers License"> Drivers License </option>
										

										 </select>
								</div>
							</div>
                          
					   	</div>
					
					   		
					  

					  	<div class="form-row">
                        	<div class="col-md-6">
					  				<div class="form-group">
					   				 <label for="">Postal Address:</label>
					   				 <input type="text" name="posaddrs" class="form-control" id="addrs" placeholder="Enter  Address"  >
					  				</div>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
					    		<label for="">Digital Address:</label>
					    		<input type="text" name="digaddrs" class="form-control py-4" id="digaddrs"  placeholder="BS-1802-9203" >
					  			</div>
					  		</div>
					  	</div>
						<div class="form-row">
                        		<div class="col-md-6">
					  				<div class="form-group">
					   				 <label for="">Station Region:</label>
					    				<script type="text/javascript" src="../js/regions.js"></script>
        							<select class="form-control" required="" onchange="print_state('state',this.selectedIndex);" id="country" name ="region">
        						
        							</select>
					  				</div>
					  			</div>
					  			<div class="col-md-6">
					  				<div class="form-group">
					    				<label for="">Sation District/Municipal:</label>
					    				<select required="" class="form-control" name ="district" id ="state"></select>
		    						<script language="javascript">print_country("country");</script>
					  				</div>
					  			</div>
					  		</div>
					<div class="form-row">
                        <div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">City/Town:</label>
					    		<input type="text" name="loc" class="form-control" id="loc" placeholder="Enter Location" >
					  		</div>
					  	</div>
					  		
					  
					  </div>
					  <div class="form-group">
					  <button  type="submit" name="save_case" class="btn btn-success form-control">Save and Continue
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

	$(document).on('submit', '#addstaff', function(event) {
		
		event.preventDefault();
		// This removes the error messages from the page
		 $(".list-group-item").remove();
		
		var formData = $(this).serialize();

			$.ajax({
					url: 'savestaff.php',
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

							window.location=response.url;

						}

					}
					
					
				});
		


	});

</script>

</body>
</html>