<?php 
session_start();
include_once "../others/config.php";

$msg ="";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $con_password=$_REQUEST['con_password'];

        $query = "SELECT * from admin WHERE username = '".$email."' and password='".$password."' and confirm_password='".$con_password."'";
        $select_query=mysqli_query($con,$query);
        $row =mysqli_num_rows($select_query);
            if($row==1){
                echo "login successful";
                header('location:fetch.php');
            }
            else{
                echo "login failed";
                header('location:index.php');
            }
        }
        
?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>login form</title>
    <style>
        label {
            color: darkorchid;
        }

        input {
            box-shadow: 1px 2px 1.5px blueviolet;
        }

        h1 {
            font-size: 60px;
            font-weight: bold;
            text-transform: capitalize;
            letter-spacing: 2px;
            color: chocolate;

        }
    </style>

    <script>

        var formData = function () {
            var email = document.forms['myForm']['username'];
            var password = document.forms['myForm']['password'];
            var con_password = document.forms['myForm']['con_password'];
            var pass1 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            var email1 = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

            /*if (email.value == "") {
                window.alert('Enter your valid Email Id');
                email.focus();
                return false;
            }

            if (!email1.test(email.value)) {
                window.alert('Enter your valid email ID');
                email.focus();
                return false;
            }

            if (password.value == "") {
                window.alert('Enter your correct password');
                password.focus();
                return false;
            }

            if (!pass1.test(password.value)) {
                window.alert("Please enter a valid password.");
                password.focus();
                return false;

            }
            return true;*/
        }
    </script>

</head>

<body>

    <div class="container-fluid pt-5 pb-5 " id="symptoms_id">
        <div class="section_header text-center mb-5 mt-4">
            <h1> Admin form </h1>
        </div>

        <form name="myForm" action="" method="POST" class="main-form needs-validation"
            style="width: 500px ; margin:auto" onsubmit="return formData()">

            <div class="form-group">
                <label for="username">username </label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password"> password </label>
                <input type="password" name="password" id="password" class="form-control">
            </div>


            <div class="form-group">
                <label for="con_password"> confirm password </label>
                <input type="password" name="con_password" id="con_password" class="form-control">
            </div>




            <div class="form-check">
                <input type="checkbox" id="accept-terms" class="form-check-input">
                <label for="accept-terms" class="form-check-label">Accept Terms & Condition</label>
            </div>

            <br>
            <div class="button_menu">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <button type="reset" class="btn btn-danger"
                    style="margin-left:60px; width: 100px; height: 47px;">RESET</button>
            </div>
            
        </form>
    </div>


</body>

</html>