<div class="modal fade" id="<?php echo $row['case_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Case</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="editcase.php" method="post">
     
    <?php

$caseid=$row['case_id'];
  
  $query2=mysqli_query($dbcon,"SELECT * FROM case_table where case_id='$caseid'");
  $row1 = mysqli_fetch_array($query2);
  $statement=$row1['diaryofaction'];
  $casetype=$row1['case_type'];

  

  ?>

        
              
              <div class="row">
               <div class="col-md-6">
                <div class="form-group">

                  <label for="">Case Number:</label>

                  
                   <input type="hidden" name="staffid" value="<?php echo $staffid?>">
                    <input type="text" readonly="" class="form-control" name="caseid" value="<?php echo $caseid?>">
                  
                </div>
              </div>
              </div>

               <div class="row">
                <div class="col-md-6">
                <div class="form-group">

                  <label for="">Crime Type:</label>
                  <br>

                  <select class="form-control" required="" name="crime_type" id ="crime">
                      <option selected="selected" value="<?php echo $casetype?>"><?php echo $casetype?></option>

                        <?php
      
          
                    $sql = mysqli_query($dbcon,"select * from crime_type");
                    while($row = mysqli_fetch_assoc($sql)){ ?>

                      <option value="<?php echo $row['des'] ?>"> <?php echo $row['des']?> </option>
                    <?php
                    }

                    ?> </select>

                </div>
                </div>
               </div>

              <div class="row">
                <div class="col-md-6">
                <div class="form-group">

                  <label for="">Diary of Action:</label>
                  <textarea name="statement" class="form-control"> <?php echo $statement?> </textarea>
                   <input type="hidden" name="staffid" value="<?php echo $staffid?>">
                    <input type="hidden" name="caseid" value="<?php echo $caseid?>">
                  
                </div>
                  </div>
               </div>

					</div>
        
       
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="icon-remove icon-large"></i>Close</button>
        <button type="submit" name="editcase" class="btn btn-success"> <i class="icon-check icon-large"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
