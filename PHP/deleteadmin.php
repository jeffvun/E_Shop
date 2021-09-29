<?php
    require_once "db_connect.php";
    if (isset($_GET['duser'])){
        $id=$_GET['duser'];

        $sql ="DELETE FROM worker_user WHERE userid=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location:../admin_waccount.php");
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>