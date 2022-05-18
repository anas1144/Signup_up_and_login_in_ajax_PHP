    <?php

session_start();

session_destroy(); 

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
    <form>
        <div class="container">
            <h1 style="text-align: center;">Login</h1>
        </div>
        <div>
            <span id="message" style="color: red;"></span>
        </div>
        <div class="container">
            <label for="uname">
                <b>Email*</b>
            </label>
            <input type="email" placeholder="Enter Email" id="email" name="email">
            <div>
                <span id="emessage" style="color:red"></span>
            </div>

            <label for="pass">
                <b>Password*</b>
            </label>
            <input type="password" placeholder="Enter Password" id="pass" name="pass">
            <div>
                <span id="pmessage" style="color: red;"></span>
            </div>

            <button type="button" name="save" id="form">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span class="pass">
                <a href="signup.php">Sign Up</a>
            </span>
        </div>
    </form>

    <script>
    function required() {

        var emessage = '';
        var pmessage = '';
        var isRequired = false;


        if (document.getElementById('email').value == '') {

            emessage = 'required';


        } else if (validateEmail(document.getElementById('email').value) == false) {

            emessage = 'Enter ture email';


        } else {
            emessage = '';
        }

        if (document.getElementById('pass').value == '') {

            pmessage = 'required';


        } else if (document.getElementById('pass').value.length < 8) {

            pmessage = 'length must be greater then 7';


        } else {

            pmessage = '';

        }



        if (emessage == '' && pmessage == '') {

            isRequired = true;

        } else {

            document.getElementById('emessage').innerHTML = emessage;
            document.getElementById('pmessage').innerHTML = pmessage;
            return isRequired;
        }

    }

    function validateEmail(emailAdress) {
        var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (emailAdress.match(format)) {
            return true;
        } else {
            return false;
        }
    }
    </script>
    <script>
    $(document).ready(function() {
        $('#form').click(function() {

            if (required() == undefined) {
                $('#message').html('');
                $('#emessage').html('');
                $('#pmessage').html('');

                const email = $("#email").val();
                const password = $("#pass").val();

                $.ajax({
                    type: 'POST',
                    url: 'login.php',
                    data: {
                        'email': email,
                        'password': password,
                    },
                    dataType: 'JSON',
                    success: function(response) {

                        if (response.status === 'success') {
                            window.location = "wel.php";

                        } else if(response.status === 'error'){

                            $('#message').html(response.message);
                            
                        }else if(response.status === 'Required'){
                            
                            $('#emessage').html(response.emailErr);
                            $('#pmessage').html(response.passErr);
                        }

                    }
                })
            } else {
                $('#message').html('');
            }

        })
    })
    </script>

</body>

</html>