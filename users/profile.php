<?php

session_start();
include_once "../others/config.php";
$msg ="";
if((strlen($_SESSION['uid']==0)))
{
    header('location:login.php');
}
else{
    




if($_SERVER['REQUEST_METHOD']=='POST')
{   $id =$_SESSION['uid'];
    $f_name=$_REQUEST['firstName'];
    $l_name=$_REQUEST['lastName'];
        $email=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $mobile_no = $_REQUEST['phone'];
        $description =$_REQUEST['description'];
        $address=$_REQUEST['address'];
        /*$img_name =$_FILES['image']['name'];
    $img_size=$_FILES['image']['size'];
    $img_temp_location=$_FILES['image']['tmp_name'];

    $directory ='../uploaded_img/';
    $target_file = $directory.$img_name;

    if($img_size>2097152){
        echo 'image size larger than 2mb';
    }
    else{
        move_uploaded_file($img_temp_location,$target_file);
        $query = "insert into product(p_name,description,target_file,p_price)value('$p_name','$description','$target_file','$p_price')"; 

        $sql=mysqli_query($con,$query);
    }
}*/
        $query = "update SST set First_Name='".$f_name."',Last_Name='".$l_name."',username= '".$email."',password='".$password."',mobile_number='".$mobile_no."',
        description='".$description."',address='".$address."' where 
        Id='".$id."'";

        mysqli_query($con,$query);
        header("location:../others/dashboard.php");
        echo 'Data Inserted Successfully';
        $msg="<div style='background:orange;width:200px;height:30px;border:1px solid black;'>Data Inserted.</div>";

}
$id =$_SESSION['uid'];
$query1="select * from SST where Id='".$id."'";
	$result=mysqli_query($con,$query1);
    $d=mysqli_fetch_array($result);


    
    
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
    <title>Edit</title>

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


    if(accept.value==""){
        window.alert('Are you ready to submit, then put tik on this check box');
        accept.focus();
        return false;
    }





    return true;
}

</script>

<style>

    .profile-bg{
        background-image:url('../images/loginpage3.jpg');
             background-size:100% 100%;
             width:100%;
             
             
    }
    #image{
        animation:profile 5s linear infinite;
    }

    @keyframes profile{
        0%{
            transform: rotate(0);
        }
        50%{
            transform:rotate(360deg);
        }
        75%{
            transform:scale(0.75);
        }
        100%{
            transform:scale(1);
        }
    }
    #profile_id{
        margin-top:-80px;
    }
    label{
        color:#c12f66;
    }
</style>

</head>
<body>
    <?php
    include_once '../others/nav.php';

    ?>
<footer>

<div class="container-fluid pt-5 pb-5 profile-bg" id="profile_id">
    <div class="section_header text-center mb-5 mt-4">
        <h1 style="color:#6600ff;text-shadow:1px 1px 1px white;font-weight:bold;"><span><img src="../images/login3.png" width="140px" height="120px" id="image"></span> Profile Details </h1>
    </div>
    <div class="container" id="profile_id">
    <br>
    <form name="myForm" action="" method="POST" class="main-form needs-validation" style="width: 500px ; margin:auto"
        onsubmit="return formData()">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="firstname">First Name </label>
                    <input type="text" id="firstname" name="firstName" class="form-control" 
                    value="<?php echo $d['First_Name'];?>">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="lastname">Last Name </label>
                    <input type="text" id="lastname" name="lastName" class="form-control"
                    value="<?php echo $d['Last_Name'];?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="username">username </label>
            <input type="text" name="username" id="username" class="form-control"
            value="<?php echo $d['username'];?>">
        </div>
        <div class="form-group">
            <label for="password"> password </label>
            <input type="password" name="password" id="password" class="form-control"
            value="<?php echo $d['password'];?>">
        </div>


        <div class="form-group">
            <label for="age">Mobile Number </label>
            <input type="text" name="phone" id="phone" class="form-control"
            value="<?php echo $d['mobile_number'];?>">
        </div>

        <div class="form-group">
            <label for="description">Description </label>
            <textarea type="text" name="description" id="description" class="form-control">
            <?php echo $d['description'];?>
            </textarea>
        </div>
        

        <div class="form-group">
            <label for="address">ADDRESS </label>
            <textarea type="text" name="address" id="address" class="form-control">
            <?php echo $d['address'];?>
            </textarea>
        </div>

        <!--<div class="form-group">
                        <label for="image">image </label>
                        <input type="file" accept =".jpg,.jpeg,.png" name="image" id="profile_img" class="form-control">
                    </div>-->

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
</div>


</footer>

</body>
</html>