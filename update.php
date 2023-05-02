<?php
include 'connection.php';

$id = $_GET['updateid'];
$sql = "Select * from `user` where id = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];

    $sql = "update `user` set id = $id, name = '$name', email = '$email', password = '$password' where id = $id";

    $result  = mysqli_query($conn,$sql);

    if($result){
        // echo 'Update successfully...';
        header("location: display.php");
    }
    else{
        echo 'Error: '.$sql.'<br>'.$conn->error;
    }
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Crud Operations</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value= <?php echo $name;?>>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value= <?php echo $email;?>>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" value= <?php echo $password;?>>
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
    </div>
  </body>
</html>