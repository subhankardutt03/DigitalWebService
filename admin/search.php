<?php
session_start();
  $con=mysqli_connect("localhost","root","","coreweb"); 
 $username = $_POST['search'];
  
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js" integrity="sha256-NP9NujdEzS5m4ZxvNqkcbxyHB0dTRy9hG13RwTVBGwo=" crossorigin="anonymous"></script>
    <title>search table </title>

    </head>
<body>

<?php
    include_once '../others/nav.php';
?>
<br>
<div class="container-fluid">
<table cellspacing="25px"  class="table table-hover">
<thead class="table-dark">
    <tr>
        <th scope="col"><span>Id</span></th>
        <th scope="col"><span >fname</span></th>
        <th scope="col"><span >lname</span></th>
        <th scope="col"><span >username </span></th>
        <th scope="col"><span >mobile number </span></th>
        
    </tr>
    </thead>
    <?php
      $result=  mysqli_query($con, "SELECT * FROM SST WHERE username LIKE '%{$username}%'");
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_array($result))
{?><tbody>
    <tr>
        <td><?php echo $row['Id'];?></td>
        <td><?php echo $row['First_Name'];?></td>
        <td><?php echo $row['Last_Name'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['mobile_number'];?></td>
        
    </tr>
    <?php
    }
}
    ?>
    

      



    </tbody>
</table>
</div>
</body>
</html>