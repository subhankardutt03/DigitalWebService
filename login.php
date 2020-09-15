<?php 
session_start();
include_once "others/config.php";

$msg ='';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $captcha_code=$_REQUEST['captcha_code'];

        $query = "SELECT * from SST WHERE username = '".$email."' and password='".$password."'";
        $select_query=mysqli_query($con,$query);
        $result =mysqli_fetch_array($select_query);

        if($_SESSION['captcha_code']!=strtolower($captcha_code)){
            echo '<script>alert("Invalid captcha")</script>';
        }
        elseif($result>0){
            
            $_SESSION['uid']=$result['Id'];
            $_SESSION['user_type']=$result['user_type'];
            header('location:./others/dashboard.php');
            echo "login successfully";
        }
        
        else{
         echo'<script>.alert("Invalid Login")</script>';
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
            color:#c12f66;
        }

        input {
            box-shadow: 1px 2px 1.5px blueviolet;
        }

        img {
            font-size: 60px;
            font-weight: bold;
            text-transform: capitalize;
            letter-spacing: 2px;
            color: chocolate;
            margin-top:20px;

        }
        .bg-img{
            background-image:url('images/loginpage3.jpg');
            width:100%;
            /*height:100vh;*/
            background-size:100% 100%; 
            /*margin-bottom:50px;*/
        }
        #profile_id{
            margin-top:-80px;
        }
        #login_id{
            margin-top:-30px;
        }
       #login_img{
           animation: login 5s infinite;  
       }
       @keyframes login{
           0%{
               transform:rotateY(0);
           }
           25%{
               transform:rotateY(360deg);
           }
           50%{
               transform:scale(0.75);
           }
           75%{
               transform:scale(1);
           }
           100%{
               transform:rotateY(360deg);
           }
       }
    </style>

    <script>

        var formData = function () {
            var email = document.forms['myForm']['username'];
            var password = document.forms['myForm']['password'];
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
    <?php
    include_once 'others/navigation.php';
    ?>

    <div class="container-fluid pt-5 pb-5 bg-img" id="login_id">
        <div class="section_header text-center mb-5 mt-4">
         <img src="images/login3.png" width="220px" height="200px" id="login_img">
        </div>
        <div class="container" id="profile_id">
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
            <br>

            <div class="form-group">
            <img src="captcha.php" alt="captcha" class="captcha-image" style="margin-top:-5px;letter-spacing:2px;">
            <input type="text" id="captcha_code" name="captcha_code" accept=".jpeg" style="width:340px; height:40px; margin-bottom:-5px;border-radius:8px;border:none;" >
        </div>



            <div class="form-check">
                <input type="checkbox" id="accept-terms" class="form-check-input">
                <label for="accept-terms" class="form-check-label">Accept Terms & Condition</label>
            </div>

            <br>
            <div class="button_menu">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <button type="" class="btn btn-danger" style="margin-left:50px;"><a href="signup.php" >SIGNUP</a></button>
           
            </div>
            <br><br>
            
        </form>
        </div>
    </div>


</body>

</html>