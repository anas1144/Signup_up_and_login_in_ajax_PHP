<?php
include('db/db.php');


        $fnameErr = $lnameErr = $unameErr = $emailErr = $passErr = $cpassErr = $ganderErr = '' ;

       

        $fname = $_POST['fname'];
        if($fname == ''){
            $fnameErr = 'Required';
        }
       
        $lname = $_POST['lname'];
        if($lname == ''){
            $lnameErr = 'Required';
        }

        $uname = $_POST['uname'];
        if($uname == ''){
            $unameErr = 'Required';
        }

        $email = $_POST['email'];
        if($email == ''){
            $emailErr = 'Required';
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }

        $pass = $_POST['pass'];
        if($pass == ''){
            $passErr = 'Required';
        }else if(strlen($pass) < 8){
            $passErr = 'Password must be greater then 8 ';
        }

        $cpass = $_POST['cpass'];
        if($cpass == ''){
            $cpassErr = 'Required';
        }else if(strlen($cpass) < 8){
            $cpassErr = 'Password must be greater then 8 ';
        }

        if($pass != $cpass){
            $cpassErr = "password not match";
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
        
        if(empty($_FILES['pic']['name'])){
            $pic = 'download.png';
            
        }else if(!file_exists($_FILES['pic']['tmp_name']) || !is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $pic = 'download.png';
           
           
        }else if(!isset($_FILES['pic']) || $_FILES['pic']['error'] == UPLOAD_ERR_NO_FILE) {
            $pic = 'download.png';
          
        }else{
            $pic = $_FILES['pic']['name'];
            $picArr = explode('.',$pic);
            $rand = rand(11111,9999);
            $pic = $picArr[0].$rand.'.'.$picArr[1];
            $pic_tmp = $_FILES['pic']['tmp_name'];
            $uploadPath="img/".$pic;
            move_uploaded_file($pic_tmp,$uploadPath);
        }


        if(isset($_POST['email'])){

            if($fnameErr == '' && $lnameErr == '' && $unameErr == '' && $emailErr == '' && $passErr == '' && $cpassErr == ''&& $ganderErr == ''  ){


                       
                        
                            if($pass != $cpass){
                                echo json_encode(['status' => 'passerror', 'message' => 'password not match']);
                            }else{
                                
                                $sql = "SELECT * FROM `username` where username = '$uname'";
                                $res = mysqli_query($con,$sql);
                                if(mysqli_num_rows($res) > 0){
                                
                                    echo json_encode(['status' => 'error', 'message' => 'User Name Already exsist']);
                                }else{

                                    $sqli = "SELECT * FROM `username` where email = '$email'";
                                    $rowi = mysqli_query($con,$sqli);

                                    if(mysqli_num_rows($rowi) > 0){
                                        $message = "Email Already exsist";
                                        echo json_encode(['status' => 'error', 'message' => 'Email Already exsist']);
                                    }else{

                                        $pass = md5($pass);

                                        
                                        $sqlii = "INSERT INTO `username` (`id`, `fname`, `lname`, `username`, `email`, `pass`, `qualification`,
                                        `cno`, `address`, `country`, `city`, `dob`, `gander`, `ms`, `img`) VALUES (NULL, '$fname', '$lname', 
                                        '$uname', '$email', '$pass', '$qualification', '$cno', '$address','$country', '$city', '$dob',
                                        '$gander', '$ms', '$pic')";

                                        if (mysqli_query($con, $sqlii)) {
                                            $message = "successfully Sign Up";
                                            echo json_encode(['status' => 'success','message' => 'Seccessfully signup']);
                                        } else {
                                            echo json_encode(['status' => 'error', 'message' => mysqli_error($con)]);
                                            
                                        }
                                    }
                                }
                    
                            }   
                }else{
                    echo json_encode(['status' => 'Required', 'fnameErr' => $fnameErr , 'lnameErr' => $lnameErr , 'unameErr' => $unameErr , 'emailErr' => $emailErr , 'passErr' => $passErr , 'cpassErr' => $cpassErr , 'ganderErr' => $ganderErr]);
                }
}

?>