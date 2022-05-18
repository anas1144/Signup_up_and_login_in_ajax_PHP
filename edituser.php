<?php
include('db/db.php');




          $fnameErr = $lnameErr  = $ganderErr = '' ;

          $id = $_POST['id'];
          
          $fname = $_POST['fname'];
          if($fname == ''){
            $fnameErr = 'Required';
          }

          $lname = $_POST['lname'];
          if($lname == ''){
            $lnameErr = 'Required';
          }
          
          $qualification = $_POST['qualification'];

          $cno = $_POST['cno'];

          $address = $_POST['address'];

          $country = $_POST['country'];

          $city = $_POST['city'];

          $dob = $_POST['dob'];

          $gander = $_POST['gander'];
          if($gander == ''){
            $ganderErr = 'Required';
          }
              
          $ms = $_POST['ms'];

          if($fnameErr == '' && $lnameErr == '' &&  $ganderErr == ''  ){

        $sqlii = "UPDATE `username` SET `fname` = '$fname', `lname` = '$lname',   `qualification` = '$qualification', `cno` = '$cno', 
         `address` = '$address', `country` = '$country', `city` = '$city', `dob` = '$dob', 
         `gander` = '$gander', `ms` = '$ms'  WHERE `username`.`id` = $id";
               if (mysqli_query($con, $sqlii)) {
               
                
                echo json_encode(['status' => 'success', 'message' => 'successfully Edit']);
        
                } else {
                 
                  echo json_encode(['status' => 'success', 'message' => mysqli_error($con)]);
                }
    
            }else{
                echo json_encode(['status' => 'Required', 'fnameErr' => $fnameErr , 'lnameErr' => $lnameErr , 'ganderErr' => $ganderErr]);
            }
   


?>