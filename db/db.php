<?php
    // Create connection
    $con = mysqli_connect("localhost", "root", "", "signup_and_login_in_core_php");
    // Check connection
    if ($con->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>