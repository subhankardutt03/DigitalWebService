<?php

session_start();
include_once 'config.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    <title>Dashboard</title>

    <style>

        .dash-bg{
            background-image:url('../images/loginpage3.jpg');
            background-size:100% 100%;
           
        }
        #image{
            animation:course 5s linear infinite;
        }
        @keyframes course{
            0%{
                transform: rotate(0);
            }
            25%{
                transform:rotate(45deg);
            }
            50%{
                transform:rotate(0);

            }
            75%{
                transform:rotate(-45deg)
            }
            100%{
                transform:rotate(0);
            }
        }
    </style>
</head>

<body>
    <?php
        include_once 'nav.php';
    ?>
   
   

    
        <?php
$query = "SELECT * from product";
$sql = mysqli_query($con,$query);


               


                
                            

    if ($_SESSION['user_type']=="admin") {?>




            
                                <?php
                            }
                            ?>
                            <div class="container-fluid ml-auto dash-bg text-center">
                                <br>
                                <div class="container text-center">
                                    
                                <h1 style="font-size:60px; color:#990099;text-shadow:1px 1px 1px white;font-weight:bold;"> OUR COURSES&nbsp;
                                <span><img src="../images/unnamed2.png" id="image" width="100px" height="100px" >
                                </span></h1>
                                
                                
</div>
<br>
<br>
                            <div class="row">
                            <?php

                                 while($result = mysqli_fetch_array($sql)){?>
                                <div class="col-4">

                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $result['target_file']?>" class="card-img-top" alt="...">
                        <div class="card-body" style="background-color:#FFFDEC">
                            <h5 class="card-title"><?php echo $result['p_name']?></h5>
                            <p class="card-text"><?php echo $result['description']?></p>

                            <?php

                                    if ($_SESSION['user_type']=="admin") {?>
                                        <a href="../admin/edit_services.php?id=<?php echo $result['Id'];?>"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true" style=""><span
                                            style="font-size:30px;">Edit</span></i></a>

                                        <a href="../admin/delete_services.php?id=<?php echo $result['Id'];?>"><i
                                        class="fa fa-trash-o" aria-hidden="true" style="margin-left:35%;color:red;"><span
                                            style="font-size:30px; color:red;">Delete</span></i></a>

                                    <?php
                                }else{
                            ?>


                            <a href="../users/course_details.php?id=<?php echo $result['Id'];?>"><button
                                        style="margin-right:190px;" class="btn btn-primary">Details</button></a>


                                <form method="POST"
                                    action="../users/cart.php?action=add&id=<?php echo $result["Id"]; ?>">
                                    <input type="hidden" name="quantity" class="form-control" value="1"
                                        style="width: 35px;">
                                    <input type="hidden" name="item_photo" value="<?php echo $result["target_file"];?>"/>
                                    <input type="hidden" name="hidden_name" value="<?php echo $result["p_name"]; ?>" />
                                    <input type="hidden" name="hidden_price"
                                        value="<?php echo $result["p_price"]; ?>" />
                                    <input type="submit" name="add_to_cart" style="margin-top:-80px;margin-left:170px;"
                                        class="btn btn-success" value="Add to Cart" />
                                </form>

                                <?php
                                }
                                ?>

                            </div>
                            </div>
                                
                                
                            </div>
                            
                            <?php

                                }
                            ?>
                            
                    </div>

                </div>


</body>

</html>