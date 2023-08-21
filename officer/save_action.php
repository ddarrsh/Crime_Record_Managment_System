

<?php
require_once('database/Database.php');
$db = new Database(); 

if(session_status() == PHP_SESSION_NONE)
{
  include('session.php');
   include('dbconnect.php');
   date_default_timezone_set("Africa/Accra"); 


    $date = date("Y-m-d H:i:s");
}



//array created to handle the error msgs
$errors = array();

// array to hold the json econded data
$output = array('error' => false);


  //Variables to hold the form data
 $statement=''; $case_id=''; $staffid=$session_id; $crime='';


              if(empty($_POST['statement'])){
               array_push($errors, "The field cannot be empty, ensure is entered");
              }
              else{ 
              $statement = $_POST['statement'];
            }

        if(empty($_POST['caseid'])){
               array_push($errors, "You need to enter complainant details before you are allow to enter the action diary");
              }
              else{ 
              $case_id = $_POST['caseid'];
            }

 if(empty($_POST['crime'])){
               array_push($errors, "You need to go back and select crime type details before you are allow to enter the action diary");
              }
              else{ 
              $crime = $_POST['crime'];
            }

             
             
            

                if($errors){

                      $output = array('error' => true, $errors);

                    }

                 else{  

                         $sql = "INSERT INTO case_table (case_id, diary_of_action, staffid,case_type, date_added) VALUES(?,?,?,?,?); ";

                   $success = $db->insertRow($sql, [$case_id, $statement,$staffid,$crime,$date]);

                         if( $success )

                         {
                             
                            // header( 'Location: union_thank.php?message=success' );
                             $output['url'] = 'd_action.php';
                      }
               }



        echo json_encode($output);

        $db->Disconnect();
        ?>
