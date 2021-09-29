<?php
    require_once "db_connect.php";
    if (isset($_GET['duser'])){
        $id=$_GET['duser'];

        $sql ="DELETE FROM products WHERE Product_ID=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location:../admin_food.php");
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>