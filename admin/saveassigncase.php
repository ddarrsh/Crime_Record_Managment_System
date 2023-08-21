

<?php
require_once('database/Database.php');
$db = new Database(); 

include('dbconnect.php');
if(session_status() == PHP_SESSION_NONE)
{
  include('session.php');
}



//array created to handle the error msgs
$errors = array();

  //Variables to hold the form data
 $investigator=''; $caseid='';  $crime=''; $assign='Assigned';


              if(empty($_POST['investigator'])){
               array_push($errors, "The field cannot be empty, ensure is entered");
              }
              else{ 
              $investigator = $_POST['investigator'];
            }

        if(empty($_POST['caseid'])){
               array_push($errors, "You need to enter complainant details before you are allow to enter the action diary");
              }
              else{ 
              $caseid = $_POST['caseid'];
            }

 if(empty($_POST['crime'])){
               array_push($errors, "You need to go back and select crime type details before you are allow to enter the action diary");
              }
              else{ 
              $crime = $_POST['crime'];
            }

             

                if($errors){

                     // $output = array('error' => true, $errors);
                       foreach($errors as $value){

                    echo '<span>'. $value.' </span> </br>'; 


                    }

                    }

                 else{  
                    $sql = "UPDATE case_table SET cid=? WHERE case_id=?";


                            $q = $conn->prepare($sql);
                            $q -> execute(array($investigator,$caseid));
                           
                         if($q)

                         {
                              $output['url'] = 'caseview.php';

                             echo "<script>alert('The case successfully assigned a CID')</script>";
                            echo "<script>window.open('caseview.php','_self')</script>";
    

                                //echo "<script>alert('You have voted already')</script>";
                             // header( 'Location: caseview.php?message=success' );
                      }
               }



      

        $db->Disconnect();
        ?>
