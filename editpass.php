<?php
include('db/db.php');

session_start();
if(!isset($_SESSION['email'])){
    header('Location: login.php');
    exit;
}

    $opassErr = $npassErr = $cnpassErr = '';

     $id = $_POST['id'];

     $opass =$_POST['opass'];
     if($opass == ''){

        $opassErr = 'Required';

    }else if(strlen($opass) < 8){

            $opassErr = 'Password must be greater then 8 ';
    }


     $npass =$_POST['npass'];
     if($npass == ''){
        $npassErr = 'Required';
    }else if(strlen($npass) < 8){
            $npassErr = 'Password must be greater then 8 ';
    }

     $cnpass =$_POST['cnpass'];
     if($cnpass == ''){
        $cnpassErr = 'Required';
    }else if(strlen($cnpass) < 8){
            $cnpassErr = 'Password must be greater then 8 ';
    }

    if($npass != $cnpass){
            $cnpassErr = "New password not match";
    }


       
    if($opassErr == '' && $npassErr == '' && $cnpassErr == ''){
     
        if($npass != $cnpass){
            
            echo json_encode(['status' => 'passerror', 'message' => 'New password not match']);
         }else{

                $opass =md5($opass);
                $npass =md5($npass);

            $sql ="SELECT * FROM username WHERE id='$id' AND pass= '$opass'";
            $row = mysqli_query($con,$sql);
                    if(mysqli_num_rows($row) > 0){

                        if($opass == $npass){
                                                          
                            echo json_encode(['status' => 'error', 'message' => 'Use defferent password']);
                        }else{

                            $sqlii = "UPDATE `username` SET `pass` = '$npass' WHERE `username`.`id` = $id";
                            if (mysqli_query($con, $sqlii)) {
                                
                                
                                echo json_encode(['status' => 'success', 'message' => 'successfully Edit Password']);
                        
                            } else {
                                
                                echo json_encode(['status' => 'error', 'message' => ' mysqli_error($con)']);
                            }

                        }


                    }else{
                        
                        echo json_encode(['status' => 'error', 'message' => 'Old password not match']);
                    }
        }
    }else{
        echo json_encode(['status' => 'Required', 'opassErr' => $opassErr , 'npassErr' => $npassErr , 'cnpassErr' => $cnpassErr ]);
    }

?>