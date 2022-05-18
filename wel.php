<?php
include('db/db.php');
session_start();

if(!isset($_SESSION['email'])){
    header('Location: index.php');
    exit;
} 
   $email=$_SESSION['email'];
   if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo $message;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up And Login in ajax PHP</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="download.png">
</head>

<body>
    <div id="pro">
        <div class="container">
            <span class="pass"><a href="logout.php">logout</a></span>
        </div>

        <?php
              $sql ="SELECT * FROM username WHERE email = '$email'";
              $row = mysqli_query($con,$sql);
              $row = mysqli_fetch_assoc($row);

              $id = $row['id'];
              $fname = $row['fname'];
              $lname = $row['lname'];
              $uname = $row['username'];
              $email = $row['email'];
            
              $qualification = $row['qualification'];
              $cno = $row['cno'];
              $address = $row['address'];
              $country = $row['country'];
              $city = $row['city'];
              $dob = $row['dob'];
              $gander = $row['gander'];
              $ms = $row['ms'];
              $pic = $row['img'];

      ?>


        <div class="container">
            <img src="img/<?php echo $pic;?>" style=" width: 120px;height: 120px;border-radius: 50%;" name="pic" alt="">
        </div>

        <div class="container">
            <p style="text-align: center;"><b>First Name</b> : <?php echo $fname;?> </p>
            <p style="text-align: center;"><b>Last Name</b> : <?php echo $lname;?> </p>
            <p style="text-align: center;"><b>username</b> : <?php echo $uname;?> </p>
            <p style="text-align: center;"><b>Email</b> : <?php echo $email;?> </p>
            <p style="text-align: center;"><b>Gender</b> : <?php echo $gander;?> </p>
            <p style="text-align: center;"><b>DOB </b> : <?php echo $dob;?> </p>
            <p style="text-align: center;"><b>Martial Status</b> : <?php echo $ms;?> </p>
            <p style="text-align: center;"><b>Qualification</b> : <?php echo $qualification;?> </p>
            <p style="text-align: center;"><b>Contact number </b> : <?php echo $cno;?> </p>
            <p style="text-align: center;"><b>Address</b> : <?php echo $address;?> </p>
            <p style="text-align: center;"><b>city</b> : <?php echo $city;?> </p>
            <p style="text-align: center;"><b>Country</b> : <?php echo $country;?> </p>
        </div>

        <div class="container">
            <span class="pass">
                <a href="edit.php?id='$id'">Edit</a>
            </span>
        </div>

    </div>
</body>

</html>