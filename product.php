<?php
require_once("PHP/db_connect.php");
session_start();

$user = $_SESSION["username"];
if (isset($_GET['duser'])){

    $name = $image = $description = $err = "";
    $price = $qty = $totprice = $userid = 0;
    $id=$_GET['duser'];

    $sql="SELECT * FROM products WHERE Product_ID=$id";
	if($result = $conn->query($sql)){
		if($result->num_rows > 0){
        $row = $result->fetch_array();
            $name=$row['ProductName'];
            $image=$row['Image'];
            $price=$row['Price'];
            $description=$row['Description'];
        }
    }
    if(isset($_POST['Order'])){
        if(empty(trim($_POST["Qty"]))){
            $err = "Please specify the quantity of your meal";
        }
        else{
            $qty =$_POST['Qty'];
            $pricetot = $qty*$price ;
         
            //insert values into the order table (Order_ID, Price, Product_ID, Client_ID, Quantity, Tot)
            $sql2 = "INSERT INTO orders (Price, Product_ID, Client_ID, Quantity, Tot) VALUES (?, ?, ?, ?, ?)";
            if($stmt2 = mysqli_prepare($conn, $sql2)){
                // Bind variables to the prepared statement as parameters
                
                    mysqli_stmt_bind_param($stmt2, "sssss", $param_price, $param_id, $param_user, $param_qty, $param_pricetot);
                    // Set parameters
                    $param_price = $price;
                    $param_id = $name;
                    $param_user = $user; 
                    $param_qty = $qty;
                    $param_pricetot = $pricetot;
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt2)){
                    // Redirect to home page for Client
                    header("location: Client.php");
                }
                else{
                    echo "Oops!, something went wrong. Please try again later.<br>";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt2);
        }
    }
}
else{
    echo "Failed to select your orders";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <title>
        Place Order
    </title>
    <body>
        <div class="container">
            <div class="image">
                <img id="img" src="Assets/<?php echo $image; ?>">
            </div>
            <div class="desc">
                <div class="text-3"><?php echo $name; ?> ...............................................................................................<span style="color:rgb(131, 113, 50)"><?php echo $price; ?> ksh</span></div>
                <p class="text-2">Your 1st Food Provider working with efficiency and effectiveness.<br><br>
                <?php echo $description; ?>
                </p>  
            </div> 
        </div>
    <form method="POST" enctype="multipart/form-data">
        <label>Quantity :</label><br>
        <input type="number" name="Qty" required="true" placeholder="Choose Quantity"><br><br>
        <p style="color:red;"> <?php echo $err ;?> </p>
        <input style="background-color:#0a350d;" type ="submit" name="Order" value="Save">
    </form>
        <style>
            body{
                padding: 20px 40px 20px 100px;
                background-image: url('IMG/src.png') ;
                background-color:rgb(1, 5, 20);
                font-family: monospace;
                font-size: 18px;
                color:white;
            }
            form{
                width: 700px;
                height: 500px;
                padding-left: 100px;
                border-radius: 15px;
                filter:drop-shadow(50);
            }
            label{
                padding-left: 30px;
                padding-bottom:10px;
                color:#efc687;
                font-weight: bold;
                font-family:Arial;
                font-size: 16px;
            }
            input{
                border: none;
                height: 50px;
                width: 400px;
                border-radius: 20px;
                justify-content: center;
                align-items: center;
                font-family: monospace;
                font-size: inherit;
            }
            img{
	            height:200px;
	            width:200px;
	            border-radius:100px;
	            background-color: white;
            }
        </style>
</body>
</html>