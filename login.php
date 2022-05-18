<?php
include('db/db.php');
session_start();

     $emailErr = $passErr = '';

    $email =  $_POST['email'];
    if($email == ''){
        $emailErr = 'Email Required';
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }else{
        $emailErr == '';
    }

    $pass = $_POST['password'];
    if($pass == ''){
        $passErr = 'Password Required';
    }else if(strlen($pass) < 8){
        $passErr = 'Password must be greater then 7 ';
    }else{
        $passErr == '';
    }

    
   if($emailErr == '' && $passErr == ''){

        $pass = md5($pass);
     
        $sql ="SELECT * FROM username WHERE email='$email' AND pass= '$pass'";
        $row = mysqli_query($con,$sql);

        if(mysqli_num_rows($row) > 0){

            $_SESSION['email'] = $email; 

            echo json_encode(['status' => 'success']);                 

        }else{
            echo json_encode(['status' => 'error', 'message' => 'Rong Email or Password']);
        }
       
    }else{
        echo json_encode(['status' => 'Required', 'emailErr' => $emailErr , 'passErr' => $passErr]);       
            
    }      
       
?>