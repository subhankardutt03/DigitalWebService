<?php


session_start();
include_once 'others/config.php';

$msg ="";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $f_name=$_REQUEST['firstName'];
    $l_name=$_REQUEST['lastName'];
        $email=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $mobile_no = $_REQUEST['phone'];
        $description =$_REQUEST['description'];
        $address=$_REQUEST['address'];
        /*$accept =$_REQUEST['accept'];*/
        $query = "SELECT * from SST WHERE username = '$email'";
        $select_query=mysqli_query($con,$query);

        if(mysqli_num_rows($select_query)>0){
            echo  "username already exists";
        }
        else{
            $sql="insert into SST values (NULL,'".$f_name."','".$l_name."','".$email."','".$password."','".$mobile_no."','".$description."','".$address."')";

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
    <title>Bootstrap project </title>

    <style>

    .bgimg img{
        height:100vh;
    }
    .slide-caption {
  
  position: absolute;
  display: block;
  background: rgba(0, 0, 0, 0.6);
  max-width: 600px;
  max-height: 150px;
  margin-left:23%;
  margin-bottom:15%;
  border-radius:20px;
  
}

.slide-caption p{
    font-size:20px;
}

.courses{
    margin-top:35px;
}

.courseArea{
    margin-top:70px;
}

.slider-area {
            background: #262626;
            padding: 50px 0;
            position: relative;
            margin: 120px 0;


        }

        .carousel-control.left,
        .carousel-control.right {
            background: transparent;
        }

        .img-area {
            width: 100px;
            height: 100px;
            margin: auto;
            border: 2px solid #fff;
            border-radius: 50%;
            overflow: hidden;
        }

        .img-area img {
            width: 100%;
        }

        .client-caption {
            position: static;
            padding-bottom: 15px;
            padding-top: 0;
        }

        .text-area {
            margin-bottom: -50px;
        }

        .client-caption h3 {
            font-size: 26px;
            margin-bottom: 15px;
            margin-top: 25px;
        }

        .client-caption p {
            font-size: 18px;
            margin: auto;
            width: 70%;
            margin-bottom: 10px;
        }
        .c1:hover,.c1.active{
            background-color:#dd4dda;
            height:50px;
            border-radius:5px;
        }

        .c2:hover,.c2.active{
            background-color: #52dd4d;
            height:50px;
            border-radius:5px;
        }

        .c3:hover,.c3.active{
            background-color:#f0d122 ;
            height:50px;
            border-radius:5px;
        }

        .c4:hover,.c4.active{
            background-color: #e96b22;
            height:50px;
            border-radius:5px;
        }

        /*.carousel-indicators {
          bottom:-35px;  
        }*/

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
    

    <section>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <div class="container head">
                <a href="" class="navbar-brand text-warning font-weight-bold" style="font-size:40px;"> COREWEB</a>

                <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">

                    <span class="navbar-toggler-icon"> </span>
                </button>-->

                <div class="collapse navbar-collapse text-center" id="collapsenavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item c1 active">
                            <a href="index.php " class="nav-link text-white">
                                HOME
                            </a>
                        </li>

                        <li class="nav-item c2">
                            <a href="services-nav.html" class="nav-link text-white">
                                SERVICES
                            </a>
                        </li>


                        <li class="nav-item c3">
                            <a href="about.html" class="nav-link text-white">
                                ABOUT US
                            </a>
                        </li>


                        <!--<li class="nav-item">
                            <a href=" " class="nav-link text-white">
                                TEAM
                            </a>
                        </li>-->

                        <li class="nav-item c4">
                            <a href="contact.html" class="nav-link text-white">
                                CONTACT US
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="login.php" class="nav-link text-white">
                                <button type="submit" name="login" class="btn btn-primary login-btn">Login</button>
                            </a>
                        </li>


                        <!--<li class="nav-item">
                            <a href="admin.php" class="nav-link text-white">
                                <button type="submit" name="userDetails" class="btn btn-danger login-btn"
                                style="width:150px;">users detail</button>
                            </a>
                        </li>-->



                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section>
    <div class="bgimg">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/graphic2.jpg" class="d-block w-100" alt="first_img">
                    <div class="carousel-caption slide-caption animated rotateInUpRight delay-1.7s">
                        <h2>Graphic Designing</h2>
                        <p>"Design is the intermediary between information and understanding".</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/Web Development2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption slide-caption d-none d-md-block animated backInUp delay-1.7s">
                        <h2>Web Development</h2>
                        <p>"Getting a quality website is not an expenses but rather an investment".</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/web-security1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption slide-caption d-none d-md-block animated bounceInDown delay-1.7s">
                        <h2>Web Security</h2>
                        <p>"You are an essential ingredient in our ongoing effort to reduce Security Risk".</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="images/animation6.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption slide-caption d-none d-md-block animated flip delay-1.7s ">
                        <h1>Animation</h1>
                        <p style="font-size:30px;">"Animation is imagination".</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="images/web-designing1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption  slide-caption d-none d-md-block animated rotateInUpLeft delay-1.7s">
                        <h2>Digital Marketing</h2>
                        <p>"Inspiration is the most important part of our digital strategy".</p>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>



        
    </div>
        </section>
        
        <section class="text-center our_services ">
        <div class="container">
            <h1> SERVICES </h1>
            <p> Our Team always ready to give best services </p>

            <div class="row row_setting">
                <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                    <div class="img_setting d-block m-auto text-white"><i class="fa fa-shopping-cart fa-3x"></i></div>

                    <h2> Digital marketing </h2>
                    <p style="text-align:justify;">If you are wondering what digital marketing is… it’s is advertising delivered through digital channels. Channels such as social media, mobile applications, email, web applications, search engines, websites, or any new digital channel.
                     </p>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                    <div class="img_setting d-block m-auto text-white"><i class="fa fa-desktop fa-3x"></i></div>

                    <h2> Responsive Design </h2>
                    <p style="text-align:justify;">Almost every new client these days wants a mobile version of their website. It’s practically essential after all: one design for the BlackBerry, another for the iPhone, the iPad, netbook, Kindle — and all screen resolutions must be compatible, too.
                    </p>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                    <div class="img_setting d-block m-auto text-white"><i class="fa fa-unlock-alt fa-3x"></i></div>

                    <h2> Web security </h2>
                    <p style="text-align:justify;">Web security is also known as “Cybersecurity”. It basically means protecting a website or web application by detecting, preventing and responding to cyber threats.
                    Websites and web applications are just as prone to security breaches as physical homes. 
                    </p>
                </div>
                
            </div>
            
        </div>
           
        </section>
        <br>
        

        <!----------portfolio--------->

        <section class="portfolio bg-light">

            <div class="container text-center">
                <h1> PORTFOLIO </h1>
                <p> Design creates culture and culture shapes values </p>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                        <div class="card">
                            <img src="images/animation1.jpg" class="card-img img-fluid">

                            <div class="card-body">
                                <h4 class="card-title"> Animation </h4>
                                <p class="card-text"> Animation is Imagination </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                        <div class="card">
                            <img src="images/web-security1.png" class="card-img img-fluid">

                            <div class="card-body">
                                <h4 class="card-title"> website Security </h4>
                                <p class="card-text"> security play Important role </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                        <div class="card">
                            <img src="images/graphic3.jpg" class="card-img img-fluid">

                            <div class="card-body">
                                <h4 class="card-title"> Graphics </h4>
                                <p class="card-text">  Pixels with purpose</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                        <div class="card">
                            <img src="images/web1.jpg" class="card-img img-fluid">

                            <div class="card-body">
                                <h4 class="card-title"> Web Development </h4>
                                <p class="card-text"> Advancing beyond </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                        <div class="card">
                            <img src="images/web-designing1.jpg" class="card-img img-fluid">

                            <div class="card-body">
                                <h4 class="card-title"> Digital Marketing </h4>
                                <p class="card-text">Be where the world is going </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto">
                        <div class="card">
                            <img src="images/web-designing3.jpg" class="card-img img-fluid">

                            <div class="card-body">
                                <h4 class="card-title"> Web Application </h4>
                                <p class="card-text"> Enhance Your Business Image </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </section>

        <section>
        <br><br>
            <div class="container text-center">
                <br>
                <h1 style="font-weight:bold;"> RECENTLY DONE PROJECT </h1>
                <P> Quality Product </P>
                <br><br>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/recent-project/Screenshot (102).png" class="img-fluid img-thumbnail">
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/recent-project/Screenshot (103).png" class="img-fluid img-thumbnail">
                    </div>


                    <div class=" col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/recent-project/Screenshot (104).png" class="img-fluid img-thumbnail">
                    </div>


                    
                </div>
                <br>

                <div class="row">

                    <div class=" col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/recent-project/Screenshot (94).png" class="img-fluid img-thumbnail">
                    </div>

                    <div class=" col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/recent-project/Screenshot (95).png" class="img-fluid img-thumbnail">
                    </div>

                    <div class=" col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/recent-project/Screenshot (98).png" class="img-fluid img-thumbnail">
                    </div>

                    
                </div>
            </div>
        <br><br>
        </section>
<section class="our_team" style="background-color: #FFFdec;">

            <div class="container-fluid text-center">
                <h1> OUR AMAZING TEAM </h1>
                <P> Reliable and Trustworthy </P>



                <div class="row team_setting">
                    <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto">
                        <figure class="figure">
                            <img src="images/user.png" class="figure-img img-fluid rounded-circle" height="200px"
                                width="200px">
                            <figcaption>
                                <h4>Sujay Kanti Paul</h4>
                                <p class="figure-caption">Graphics Designer </p>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto">
                        <figure class="figure">
                            <img src="images/user.png" class="figure-img img-fluid rounded-circle" height="200px"
                                width="200px">
                            <figcaption>
                                <h4>Subhankar Dutta</h4>
                                <p class="figure-caption">Web Developer </p>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto">
                        <figure class="figure">
                            <img src="images/user.png" class="figure-img img-fluid rounded-circle" height="200px"
                                width="200px">
                            <figcaption>
                                <h4> Tarak Dutta </h4>
                                <p class="figure-caption"> Manager </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <br><br><br>

        <section>

            <div class="text-area text-center">
                <h1 style="font-weight:bold;"> REVIEWS </h1>
                <P> Check Clients Reviews </P>
            </div>
            <div class="slider-area">
                <div class="container">



                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="img-area">
                                    <img src="images/client1.jpeg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-caption client-caption d-none d-md-block">
                                    <h3>Jason Doe</h3>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="img-area">
                                    <img src="images/client2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-caption client-caption d-none d-md-block">
                                    <h3>Second slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="img-area">
                                    <img src="images/client3.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-caption client-caption d-none d-md-block">
                                    <h3>Third slide label</h3>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="img-area">
                                    <img src="images/client4.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-caption client-caption d-none d-md-block">
                                    <h3>Third slide label</h3>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="img-area">
                                    <img src="images/client5.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-caption client-caption d-none d-md-block">
                                    <h3>Third slide label</h3>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                </div>
            </div>
        </section>

       

            

        <section style="margin-top:-120px;background-color: rgb(216, 208, 208);" id="target">

            <br>
            <div class="container">
                <div class="footer-text">
                    <h1> Follow our team </h1>
                    <p> Our team is always available for you </p>
                </div>

                <div class="footer-logo">
                    <div class="center_div">

                        <a href="https://www.facebook.com/" target="_blank"><img src="images/footer-logo/facebook1.png"
                                width="60px" height="60px" style="margin-left: 10px;"></a>

                        <a href="https://www.facebook.com/" target="_blank"><img src="images/footer-logo/twitter.png"
                                width="60px" height="60px" style="margin-left: 15px;"></a>

                        <a href="https://www.facebook.com/" target="_blank"><img src="images/footer-logo/instragram.png"
                                width="70px" height="60px" style="margin-left: 10px;"></a>

                        <a href="https://www.facebook.com/" target="_blank"><img src="images/footer-logo/youtube.png"
                                width="50px" height="50px" style="margin-left: 20px;"></a>

                        <a href="https://www.facebook.com/" target="_blank"><img src="images/footer-logo/linkedin.png"
                                width="65px" height="65px" style="margin-left: 15px;"></a>

                        <a href="signup.php"><button type="submit" style="margin-left:80%; margin-top: -170px;
                        width:150px; height:50px;" class="btn btn-danger">signup</button></a>


                    </div>

                </div>





                <br><br>
        </section>
        <br>


       



        
</body>

</html>