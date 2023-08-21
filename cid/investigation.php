<?php 

include('header.php');
include('dbconnect.php');

 ?>


<div class="container-fluid">
	

      <?php include('menubar.php')?> 
	<?php // include('menubar1.php');

	
	  
	 
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

		</ul><a href="#" onClick="window_print()" class="btn btn-info" style="margin-bottom:20px"><i class="icon-print icon-large"></i> Print</a>
			<div class="panel panel-success" id="outprint">
				
					  	<div class="panel-heading">
		
					  		<h3 class="panel-title">Statement</h3>
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
			 			


			 			 $query2=mysqli_query($dbcon,"select * from case_table where case_id='$caseid'");
		while($row2 = mysqli_fetch_array($query2)){

								

			 			 		$statement= $row2['statement'];
			 			 		$status= $row2['status'];
			 			 	
			 			 	
			 			 	
			 			 	
			 			 
			 			 }
			 			 ?>
			 			 	
			 			 </table>

					  	 </div>
					  	
					  	<div class="form-row">
					  	<div class="col-md-12">
					  		 <p style=""> 

					  		 	<?php

					  		 		
					  		 	  if($statement==''){
					  		 	  	echo'<h2> No Investigation Statement Yet</h2>';
					  		 	  }
					  		 	  else{
					  		 	  	echo $statement; 
					  		 	  }
					  		 	
					  		 	?> 
					  		</p>
					  	
						</div>

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
<script type="text/javascript">

    function window_print(){
		var _head = $('head').clone();
		var _p = $('#outprint').clone();
		var _html = $('<div>')
		_html.append("<head>"+_head.html()+"</head>")
		_html.append("<h3 class='text-center'>CRIME RECORDS MANAGEMENT SYSTEM</h3>")
		_html.append(_p)
		console.log(_html.html())
		var nw = window.open("","_blank","width:900;height:800")
			nw.document.write(_html.html())
			nw.document.close()
			nw.print()
			setTimeout(() => {
				nw.close()
			}, 500);
	}
	</script>

</body>
</html>