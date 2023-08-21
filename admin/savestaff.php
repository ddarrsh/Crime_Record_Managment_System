

<?php
include('header.php');
require_once('../database/Database.php');
$db = new Database(); 

if(session_status() == PHP_SESSION_NONE)
{
  //include('session.php');
}



//array created to handle the error msgs
$errors = array();

// array to hold the json econded data
$output = array('error' => false);


  //Variables to hold the form data
 $staffid=''; $surname=''; $district=''; $region=''; $loc=''; $othernames=''; $nid='';
$posaddrs=''; $digaddrs='';  $id_type='';


             if(empty($_POST['staffid'])){
               array_push($errors, "The staff id cannot be empty, ensure is entered");
              }
              else{ 
              $staffid = $_POST['staffid'];
            }


             if(empty($_POST['surname'])){
               array_push($errors, "The surname cannot be empty, ensure is entered");
              }
              else{ 
              $surname = $_POST['surname'];
            }

             if(empty($_POST['othernames'])){
               array_push($errors, "The othernames cannot be empty, ensure is entered");
              }
              else{ 
              $othernames = $_POST['othernames'];
            }

             if(empty($_POST['nid'])){
               array_push($errors, "The id cannot be empty, ensure is entered");
              }
              else{ 
              $nid = $_POST['nid'];
            }


            if(empty($_POST['id_type'])){
               array_push($errors, "The id type cannot be empty, ensure is entered");
              }
              else{ 
              $id_type = $_POST['id_type'];
            }
             
              if(empty($_POST['region'])){
                array_push($errors,"The The region field cannot be empty, ensure is entered");
               
              }
              else{ 
              $region=$_POST['region'];
               }
             
              if(empty($_POST['district'])){
               array_push($errors,"The district field cannot be empty, ensure is entered");
                }

              else{ 
              $district=$_POST['district'];
                 }
             
              if(empty($_POST['loc'])){
               array_push($errors,"The  location field cannot be empty, ensure is entered");
                }

              else{ 
              $loc=$_POST['loc'];
               }

               
              if(empty($_POST['posaddrs'])){
                array_push($errors,"The address field cannot be empty, ensure is entered");
               
              }
              else{ 
              $posaddrs=$_POST['posaddrs'];

             }

              if(empty($_POST['digaddrs'])){
                $digaddrs="No digital address";
              
              }
              else{ 
              $digaddrs=$_POST['digaddrs'];
               }
             
              

                if($errors){

                     // $output = array('error' => true, $errors);
                       foreach($errors as $value){

                    echo '<span class="alert alert-danger">'. $value.' </span> </br>'; 

                      echo '</br> </br>';
                    }
                  }

                 else{  

                         $sql = "INSERT INTO staff (staffid, surname, othernames, region, district,loc, posaddrs, digaddrs,nid,id_type)
                                       VALUES(?,?,?,?,?,?,?,?,?,?);";

                   //$success = mysqli_query($dbcon,$sql);
                   
                   $success= $db->insertRow($sql, [$staffid, $surname, $othernames, $region, $district, $loc, $posaddrs,$digaddrs, $nid, $id_type]);

                       
                         if( $success){
                             
                       
                              header( 'Location: userlogindetails.php?id=echo $staffid' );
                      }
                                      
                      
               }




        $db->Disconnect();
        ?>
