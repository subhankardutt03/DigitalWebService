<?php


session_start();
include_once 'others/config.php';

$msg ="";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $user_type="user";
    $First_Name=$_REQUEST['firstName'];
    $Last_Name=$_REQUEST['lastName'];
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $mobile_number = $_REQUEST['phone'];
        $description =$_REQUEST['description'];
        $address=$_REQUEST['address'];
        /*$accept =$_REQUEST['accept'];*/
        $query = "SELECT * from SST WHERE username = '$email'";
        $select_query=mysqli_query($con,$query);

        if(mysqli_num_rows($select_query)>0){
            echo  "username already exists";
        }
        else{
            $sql="insert into SST values (NULL,'".$user_type."','".$First_Name."','".$Last_Name."','".$username."','".$password."','".$mobile_number."','".$description."','".$address."')";

        mysqli_query($con,$sql);

        $msg="<div style='background:orange;width:200px;height:30px;border:1px solid black;'>Data Inserted.</div>";
        }
        
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" />
    <title>sign up</title>

    <style>

        #signup{
            background-image:url('images/loginpage3.jpg');
            background-size:100% 100%;
        }
        label{
            color:#ff10a3 !important;
        }
        #sign{
            animation:sign 5s infinite;
        }
        @keyframes sign{
            0%{
                transform:scale(0.75);
            }
            25%{
                transform:scale(1);
            }
            50%{
                transform:scale(0.75);
            }
            75%{
                transform:scale(1);
            }
            100%{
                transform:scale(0.75);
            }
        }
    </style>

    <script>



        var formData = function () {
            var firstName = document.forms['myForm']['firstName'];
            var lastName = document.forms['myForm']['lastName'];
            var email = document.forms['myForm']['username'];
            var password = document.forms['myForm']['password'];
            var mobileNo = document.forms['myForm']['phone'];
            var description = document.forms['myForm']['description'];
            var address = document.forms['myForm']['address'];
            var accept = document.forms['myForm']['accept'];
            var pass1 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            var email1 = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

            if (firstName.value == "") {
                window.alert('Enter your First Name');
                firstName.focus();
                return false;
            }

            if ((firstName.length < 3) || (firstName.length > 15)) {
                window.alert('FirstName must be between 3 and 15 character');
                firstName.focus();
                return false;
            }

            if (!isNaN(firstName.value)) {
                window.alert('Number is not allowed');
                firstName.focus();
                return false;
            }

            if (lastName.value == "") {
                window.alert('Enter your Last Name');
                lastName.focus();
                return false;
            }

            if ((lastName.length < 3) || (lastName.length > 15)) {
                window.alert('lastName must be between 3 and 15 character');
                lastName.focus();
                return false;
            }

            if (!isNaN(lastName.value)) {
                window.alert('Number is not allowed');
                lastName.focus();
                return false;
            }

            if (email.value == "") {
                window.alert('Enter your valid Email Id');
                email.focus();
                return false;
            }

            /*if (email.value.indexOf('@') <= 0) {
                window.alert('Enter your valid Email ID');
                email.focus();
                return false;
            }*/

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

            /*if ((password.value.length < 8) || (password.value.length > 16)) {
                window.alert('Length of password is must be between 8 and 16 character ');
                password.focus();
                return false;
        
            }*/

            if (!pass1.test(password.value)) {
                window.alert("Please enter a valid password.");
                password.focus();
                return false;

            }



            /*if ((password.value.indexOf('_') < 0) || (password.value.indexOf('-') < 0) ||
                (password.value.indexOf('&') < 0) || (password.value.indexOf('^') < 0) ||
                (password.value.indexOf('%') < 0) || (password.value.indexOf('*') < 0) ||
                (password.value.indexOf('$') < 0) || (password.value.indexOf('#') < 0) ||
                (password.value.indexOf('@') < 0) || (password.value.indexOf('!') < 0)) {
                window.alert('Any special character must be present in your password');
                password.focus();
                return false;
            }*/



            

            if (mobileNo.value == "") {
                window.alert('Enter your valid mobile number');
                mobileNo.focus();
                return false;
            }

            if (isNaN(mobileNo.value)) {
                window.alert('user must write digits only not character');
                mobileNo.focus();
                return false;
            }

            if (mobileNo.value.length != 10) {
                window.alert('mobile number must be 10 digits');
                mobileNo.focus();
                return false;
            }

            if(description.value==""){
                window.alert('Please describe your work in brief');
                description.focus();
                return false;
            }

            if(address.value==""){
                window.alert('Write your address in details');
                address.focus();
                return false;
            } 


            if(!accept.checked){
                window.alert('Are you ready to submit, then put tik on this check box');
                return false;
            }





            return true;
        }

    </script>
</head>
<body>

<?php
        include_once 'others/navigation.php';
    ?>
    
    <section>


    <footer>

<div class="container-fluid pt-5 pb-5 " id="signup">
    <div class="section_header text-center mb-5 mt-4">
    <br>
    <link rel="stylesheet" href="style.css">
        <h1 style="color:#cc3300;text-shadow:1px 1px 1px white;font-weight:bold;"><span> <img src="images/sign2.png" width="100px" height="100px" style="margin-right:20px;" id="sign"></span> SIGN UP </h1>
    </div>
    <div class="container" style="margin-top:-20px;">
    <form name="myForm" action="" method="POST" class="main-form needs-validation" style="width: 500px ; margin:auto;"
        onsubmit="return formData()">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="firstname">First Name </label>
                    <input type="text" id="firstname" name="firstName" class="form-control">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="lastname">Last Name </label>
                    <input type="text" id="lastname" name="lastName" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="username">username </label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password"> password </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>


        <div class="form-group">
            <label for="age">Mobile Number </label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description </label>
            <textarea type="text" name="description" id="description" class="form-control">
            </textarea>
        </div>


        <div class="form-group">
            <label for="address">ADDRESS </label>
            <textarea type="text" name="address" id="address" class="form-control">
            </textarea>
        </div>
        <br>

        <div class="form-group">
            <img src="captcha.php" alt="captcha" class="captcha-image">
            <input type="text" id="captcha_code" name="captcha_code" accept=".jpeg" style="width:340px; height:40px;border-radius:8px;border:none;" >
        </div>

        

        <div class="form-check">
            <input type="checkbox" id="accept-terms" class="form-check-input" name="accept">
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
</div>


</footer>


    </section>
    

</body>
</html>