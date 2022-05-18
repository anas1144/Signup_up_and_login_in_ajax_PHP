<?php
include('db/db.php');
session_start();

if(!isset($_SESSION['email'])){
    header('Location: index.php');
    exit;
} 
   $email=$_SESSION['email'];
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up And Login in ajax PHP</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery/jquery.js"></script>
</head>

<body>


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



    <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input type="hidden" name="opic" id="opic" value="<?php echo $pic; ?>">
        <div class="container">
            <span class=""><a href="wel.php">back</a></span>
        </div>
        <div class="container">
            <img src="img/<?php echo $pic;?>" id="profileimg" style=" width: 120px;height: 120px;border-radius: 50%;"
                name="opic" alt="">
            <input type="file" name="npic" id="file">
        </div>
        <div>
            <span id="message" style="color: red;"></span>
        </div>
        <div class="container">
            <label for="fname">
                <b>First Name</b>
            </label>
            <input type="text" placeholder="Enter First Name" id="fname" name="fname" value="<?php echo $fname; ?>">
            <div>
                <span id="fmessage" style="color: red;"></span>
            </div>

            <label for="lname">
                <b>Last Name</b>
            </label>
            <input type="text" placeholder="Enter Last Name" id="lname" name="lname" value="<?php echo $lname; ?>">
            <div>
                <span id="lmessage" style="color: red;"></span>
            </div>



            <label for="qualification">
                <b>Qualification</b>
            </label>
            <input type="text" placeholder="Enter Qualification" name="qualification" id="qualification"
                value="<?php echo $qualification; ?>">

            <label for="cno">
                <b>Contact number</b>
            </label>
            <input type="text" placeholder="Enter Contact number" maxlength="11" name="cno" id="cno"
                value="<?php echo $cno; ?>">

            <label for="address">
                <b>Address</b>
            </label>
            <input type="text" placeholder="Enter Address" name="address" id="address" value="<?php echo $address; ?>">

            <label for="country">
                <b>Country</b>
            </label>
            <select id="select1" name="country">
                <option value="" disabled>Select The Country</option>
                <option value="Pakistan" <?php if($city == 'Pakistan'){ echo 'selected';}?>>Pakistan</option>
            </select>

            <label for="city">
                <b>city</b>
            </label>
            <select name="city" id="select2">
                <option value="" disabled>Select The City</option>
                <option value="Islamabad" <?php if($city == 'Islamabad'){ echo 'selected';}?>>Islamabad</option>
                <option value="" disabled>Punjab Cities</option>
                <option value="Ahmed Nager Chatha" <?php if($city == 'Ahmed Nager Chatha'){ echo 'selected';}?>>Ahmed
                    Nager Chatha</option>
                <option value="Ahmadpur East" <?php if($city == 'Ahmadpur East'){ echo 'selected';}?>>Ahmadpur East
                </option>
            </select>

            <label for="dob">
                <b>DOB</b>
            </label>
            <input type="date" placeholder="Enter DOB" name="dob" id="dob" value="<?php echo $dob; ?>">

            <label for="gander">
                <b>Gander</b>
            </label>
            <br>
            <input type="radio" id="male" name="gander" value="Male" <?php if($gander == 'Male'){ echo 'checked';}?>>
            <label for="html">Male</label>
            <input type="radio" id="female" name="gander" value="Female"
                <?php if($gander == 'Female'){ echo 'checked';}?>>
            <label for="css">Female</label>
            <br>
            <div>
                <span id="gmessage" style="color: red;"></span>
            </div>

            <label for="ms">
                <b>Martial Status</b>
            </label>
            <select name="ms" id="select3">
                <option value="" disabled>Marital Status</option>
                <option value="Single" <?php if($ms == 'Single'){ echo 'selected';}?>>Single</option>
                <option value="Married" <?php if($ms == 'Married'){ echo 'selected';}?>>Married</option>
                <option value="Widowed" <?php if($ms == 'Widowed'){ echo 'selected';}?>>Widowed</option>
                <option value="Separated" <?php if($ms == 'Separated'){ echo 'selected';}?>>Separated</option>
                <option value="Divorced" <?php if($ms == 'Divorced'){ echo 'selected';}?>>Divorced</option>
            </select>
            <button type="button" name="save" id="form">Save</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span class="pass"><a href="wel.php">back</a></span>
        </div>
    </form>
    <!-- // password change -->

    <form action="" method="POST">
        <input type="hidden" name="idpass" id="idpass" value="<?php echo $id; ?>">
        <div class="container">
            <h1 style="text-align: center;">Change Password</h1>
        </div>
        <div>
            <span id="passmessage" style="color: red;"></span>
        </div>
        <div class="container">
            <label for="opass">
                <b>Old Password*</b>
            </label>
            <input type="password" placeholder="Enter Old Password" id="opass" name="opass">
            <div>
                <span id="opmessage" style="color: red;"></span>
            </div>

            <label for="npass">
                <b>New Password*</b>
            </label>
            <input type="password" id="npass" placeholder="Enter Password" name="npass">
            <div>
                <span id="npmessage" style="color: red;"></span>
            </div>
            <label for="cnpass">
                <b>Change New Password*</b>
            </label>
            <input type="password" id="cnpass" placeholder="Enter Password" name="cnpass" onkeyup="return check();">
            <div>
                <span id="cnpmessage" style="color: red;"></span>
            </div>

            <button type="button" name="password" id="changePassword">Change</button>
        </div>
    </form>
    <script>
    var check = function() {
        if (document.getElementById('npass').value == document.getElementById('cnpass').value) {
            document.getElementById('cnpmessage').style.color = '#046b2f';
            document.getElementById('cnpmessage').innerHTML = 'matching';
        } else {
            document.getElementById('cnpmessage').style.color = 'red';
            document.getElementById('cnpmessage').innerHTML = 'not matching';
        }
    }

    function required() {


        var fmessage = lmessage = gmessage = '';
        var isRequired = false;

        if (document.getElementById('fname').value == '') {

            fmessage = 'required';


        } else {
            fmessage = '';
        }
        if (document.getElementById('lname').value == '') {

            lmessage = 'required';

        } else {
            lmessage = '';
        }
        var male = document.getElementById('male');
        var female = document.getElementById('female');
        if (male.checked == false && female.checked == false) {

            gmessage = 'required';


        } else {
            gmessage = '';
        }


        if (fmessage == '' && lmessage == '' && gmessage == '') {

            isRequired = true;

        } else {

            document.getElementById('fmessage').innerHTML = fmessage;
            document.getElementById('lmessage').innerHTML = lmessage;
            document.getElementById('gmessage').innerHTML = gmessage;
            return isRequired;
        }

    }

    function requiredpass() {


        var opmessage = npmessage = cnpmessage = '';
        var isRequired = false;

        if (document.getElementById('opass').value == '') {

            opmessage = 'required';


        } else if (document.getElementById('opass').value.length < 8) {


            opmessage = 'length must be greater then 7';


        } else {
            opmessage = '';
        }

        if (document.getElementById('npass').value == '') {

            npmessage = 'required';


        } else if (document.getElementById('npass').value.length < 8) {

            npmessage = 'length must be greater then 7';

        } else {
            npmessage = '';
        }

        if (document.getElementById('cnpass').value == '') {

            cnpmessage = 'required';


        } else if (document.getElementById('cnpass').value.length < 8) {

            cnpmessage = 'length must be greater then 7';


        } else {
            cnpmessage = '';
        }

        if (npmessage == '' && npmessage == '' && cnpmessage == '') {

            isRequired = true;

        } else {

            document.getElementById('opmessage').innerHTML = opmessage;
            document.getElementById('npmessage').innerHTML = npmessage;
            document.getElementById('cnpmessage').innerHTML = cnpmessage;
            return isRequired;
        }

    }
    </script>

    <script>
    $(document).ready(function() {


        // update profile
        $('#form').click(function() {

            if (required() == undefined) {
                $('#message').html('');
                $('#fmessage').html('');
                $('#lmessage').html('');
                $('#gmessage').html('');

                var data = new FormData();
                data.append('id', $("#id").val());
                data.append('fname', $("#fname").val());
                data.append('lname', $("#lname").val());
                data.append('qualification', $("#qualification").val());
                data.append('cno', $("#cno").val());
                data.append('address', $("#address").val());
                data.append('country', $("#select1").val());
                data.append('city', $("#select2").val());
                data.append('dob', $("#dob").val());
                var gander = $("input[name='gander']:checked").val();
                if (gander == 'Male' || gander == 'Female') {

                    data.append('gander', gander);
                } else {
                    data.append('gander', '');
                }
                data.append('ms', $("#select3").val());
               

                $.ajax({
                    url: 'edituser.php',
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === 'success') {

                            $('#message').html(response.message);
                            
                        } else if (response.status === 'error') {

                            $('#message').html(response.message);

                        }else if(response.status === 'Required'){
                            
                            $('#fmessage').html(response.fnameErr);
                            $('#lmessage').html(response.lnameErr);
                            $('#umessage').html(response.unameErr);
                            $('#gmessage').html(response.ganderErr);
                           
                        }
                    }
                })

            } else {


                $('#message').html('');
            }


        });




        // update profile image
        $('#file').change(function() {

          

                var data = new FormData();
                data.append('id', $("#id").val());
                data.append('opic', $("#opic").val());
                data.append('npic', $("#file")[0].files[0]);
          
                $.ajax({
                    url: 'editpic.php',
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            console.log(response.message);
                            console.log(response.src);
                            $('#message').html(response.message);
                            $('#profileimg').attr('src',response.src);
                            $('#opic').attr('value',response.value);
                            $("#file").val('');


                        } else if (response.status === 'error') {
                            $('#message').html(response.message);
                        }
                    }
                })

           

        })


        // change password
        $('#changePassword').click(function() {

           if (requiredpass() == undefined) {

                $('#passmessage').html('');
                $('#opmessage').html('');
                $('#npmessage').html('');
                $('#cnpmessage').html('');

                const id = $("#idpass").val();
                const opass = $("#opass").val();
                const npass = $("#npass").val();
                const cnpass = $("#cnpass").val();

                $.ajax({
                    type: 'POST',
                    url: 'editpass.php',
                    data: {
                        'id': id,
                        'opass': opass,
                        'npass': npass,
                        'cnpass': cnpass,
                    },
                    dataType: 'JSON',
                    success: function(response) {

                        if (response.status === 'success') {
                            $('#passmessage').html(response.message);

                        } else if (response.status === 'error') {

                            $('#passmessage').html(response.message);

                        } else if (response.status === 'passerror') {

                            $('#cnpmessage').html(response.message);
                        }else if(response.status === 'Required'){
                            
                            $('#opmessage').html(response.opassErr);
                            $('#npmessage').html(response.npassErr);
                            $('#cnpmessage').html(response.cnpassErr);
                            
                           
                        }
                    }
                })

            } else {
                console.log(requiredpass());
                $('#passmessage').html('');
            }


        });
    });
    </script>
</body>

</html>