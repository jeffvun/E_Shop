<?php
require_once "db_connect.php";
    if(isset($_POST['submitImage'])){
        $file=$_FILES['foodimage']; 
        $file_path = "../Assets/";

        $original_file_name= $_FILES['foodimage']['name'];
        $file_tmp_location = $_FILES['foodimage']['tmp_name'];
    
        $itemname = $_POST['fooditem'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        //$file_type = substr($original_file_name, strpos($ $original_file_name,'.'), strlen($original_file_name));//$new_file_name = time().$file_type;//move_uploaded_file($file_tmp_location, $file_path.$original_file_name);
        if(move_uploaded_file($file_tmp_location, $file_path.$original_file_name)){
            $sql= "INSERT INTO products(ProductName, Price, Image, Description, Category) VALUES('$itemname', '$price', '$original_file_name', '$description', '$category')";
            if (setData($sql)) {
                //echo "Food Inserted Successfully";
            }
            else{
                echo "Failed to insert into database";
            }
        }
    }
?>