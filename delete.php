<?php

include 'connection.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "delete from `user` where id= $id";
    $result = mysqli_query($conn,$sql);

    if($result){
        // echo 'Delete successful...';
        header('location: display.php');
    }else{
        echo 'Delete failed...';
    }
}

?>