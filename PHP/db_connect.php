<?php
//a.Connecting to the database
$conn = new mysqli("localhost", "Joseph","mysal2.edu2","food_proj");
if($conn->connect_error){
    die("Not Connected".$conn->connect_error);
}
else{ // echo "Connected Successfully"; 
}

//b.connecting to the database using function
function connect(){
    $conn = mysqli_connect("localhost", "Joseph","mysal2.edu2","food_proj") or die("Not Connected");
    return $conn;
}

//get data
function getData($sql){
    $conn=connect();
    $result = mysqli_query($conn, $query);
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $rows[]=$row;
    }
    return $rows;
}
// setting data
function setData($sql){
    $conn=connect();
    if(mysqli_query($conn,$sql)){
        return true;
    }
    else{
        return false;
    }
}
?>
