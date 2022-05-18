<?php
include('db/db.php');



   $id = $_POST['id'];   

   $opic = $_POST['opic'];

   $deletePath="img/".$opic;

   $npic = $_FILES['npic']['name'];
       
        
       
            $pic = $npic;
            $picArr = explode('.',$pic);
            $rand = rand(11111,9999);
            $pic = $picArr[0].$rand.'.'.$picArr[1];
            $pic_tmp = $_FILES['npic']['tmp_name'];
            $uploadPath="img/".$pic;
            move_uploaded_file($pic_tmp,$uploadPath);
            unlink($deletePath);
        
        


        $sqlii = "UPDATE `username` SET `img` = '$pic'  WHERE `username`.`id` = $id";
               if (mysqli_query($con, $sqlii)) {
               
                
                echo json_encode(['status' => 'success', 'message' => 'successfully Edit', 'src' => $uploadPath , 'value' => $pic]);
        
                } else {
                 
                  echo json_encode(['status' => 'success', 'message' => mysqli_error($con)]);
                }
    
          
   


?>