<div class="modal fade" id="<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="deleteuser.php" method="post">
      <div class="alert alert-danger">
					<p>Are you sure you want to delete this staff?.</p>
					</div>
        
         
      <input  type="hidden" hidden="true" name="deleted" value="<?php echo $id;?>"/>
      
      <h3>Staff Number: <?php echo $id;?></h3>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="icon-remove icon-large"></i>Close</button>
        <button type="submit" name="delete" class="btn btn-danger"> <i class="icon-check icon-large"></i>Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
