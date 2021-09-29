<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" 
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" >
	<link rel="stylesheet" type="text/css" href="CSS/Len.css">
    <title>E_Shop</title>
</head>
<body>
    <div class=container1>
        <div class="topcontainer">
            <nav class="nav1">
                <div class="line1">
                    <ul  class="icons">
                        <li>
                            <span class="facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="telgram"><i class="fa fa-telegram" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="mail"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="share"><i class="fa fa-share-square-o" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="location"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="line2">
                    <ul>
                        <li>
                            <span class="text"><a class="text2" href="Home.php" style="text-decoration:none; color:chocolate">Home</a></span>
                            <span class="text"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="text">Story</span>
                            <span class="text"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="text"><a class="text2" href="products.php" style="text-decoration:none; color:chocolate">Products</a></span>
                            <span class="text"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="text">About</span>
                            <span class="text"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="text">Bonus Points</span>
                            <span class="text"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </li>
                    </ul>
                <div>
            </nav>
            <nav class="nav2">
                <div class= logo>
                    <img src="IMG/logo.png">
                </div>
                <div class="nav3">
                    <div class=box>
                        <ul>
                            <li>
                                <span class="text2"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span>
                                <span class="text2"><a class="text2" href="https://glovoapp.com/" style="text-decoration:none">Explore</a></span>   
                            </li>
                            <li>
                                <span class="text2"><i class="fa fa-truck fa-2x" aria-hidden="true"></i></span>
                                <span class="text2">Delivery</span>  
                            </li>
                            <li>
                                <span class="text2"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></span>
                                <span class="text2">Wishlist</span>    
                            </li>
                            <li>
                                <span class="text2"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></span>
                                <span class="text2"><a class="text2" style="text-decoration:none">Cart</a></span>  
                            </li>
                            
                            <li>
                                <span class="text2"><i class="fa fa-pencil-square-o " aria-hidden="true"></i></i></span>
                                <span class="text2"><a class="text2" href="account.php" style="text-decoration:none">Account</a></span>  
                            </li>
                            <li>                                
                                <span class="text2"><i class="fa fa-sign-in " aria-hidden="true"></i></span>
                                <span class="text2"><a class="text2" href="PHP/logout.php" style="text-decoration:none">Logout</a></span>  
                            </li>
                            <li class="profil">
                                <span class="text22" style="padding-left: 15px;"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></span>
                                <span class="text22"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                            </li>
                        
                        </ul>
                    </div>
                    <hr style="margin-top: -20px; border:solid; color:rgb(255, 255, 255)">
                    <div class="contacts">
                        <br>
                        <span id="header" class="location">
                            <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                            <span class="mytext">Keri road, Nairobi, Republic of Kenya</span>
                        </span>
                        <span id="header" class="myphone">
                            <i class="fa fa-phone fa-lg" aria-hidden="true"></i>
                            <span class="mytext">+254 740019948</span>
                        </span>
                        <span id="header" class="mymail">
                            <i class="fa fa-envelope-open" aria-hidden="true"></i>
                            <span class="mytext">infos@e-shop.com</span>
                        </span>

                    </div>
                </div>
            </nav>
        </div>
        <div class="middlecontainer">
            <!--<img src="bck.png">-->
                <span class="about">
                    <li>
                        <span class="st">
                            <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                            <input id="txt" class="txt" onclick="ChangeStyle()" onkeypress="dict(event)" name="search" placeholder=" Search the web... "> 
                        </span>
                    </li>
                    <h1>E_Shop</h1>
                    <h4>Your Food Supplier in all circumstances<h4>
                    <h4>Ongoing Special Delivery reductions </h4>
                    <h4>Get a <span class="spec">20%</span> reduction for the over<span class="spec"> 1000 KES cost</span></h4><br>
                </span>
                <button>Get Reduction Now !</button>
                <br>  
        </div>
    </div>

    <?php
            require_once('PHP/db_connect.php');
            $num_per_page=4;
            if(isset($_GET["page"])){
                $page=$_GET["page"];
            }
            else{
                $page=1;
            }
            $start_from=($page-1)*4;  
    ?>

    <main class="home" id="main">
    <?php 
    //selecting rows
    $sql_select = "SELECT * FROM products LIMIT $start_from,$num_per_page";
	if($result = $conn->query($sql_select)){
		if($result->num_rows > 0){
            while($row = $result->fetch_array()){
				$id=$row['Product_ID'];
                $name=$row['ProductName'];
                $image=$row['Image'];
                $price=$row['Price'];
                $description=$row['Description'];
    ?>
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
            <div class="action">
                <ul>
                    <li id="buy"><i id="i" class="fa fa-shopping-cart" aria-hidden="true"></i> 
                        <?php 
					        echo '<a id="buy" style="text-decoration:none;" href="product.php?duser='.$id.'">
                             Add to Cart</a>'; ?>
                    </li>
                    <li id="like"><i id="i" class="fa fa-heart" aria-hidden="true"></i> Add to Wishlist</li>
                </ul>
            </div>
        </div>
    <?php  
            }
        }
    }
    ?>

        <div class="pagination" method="POST">
            <a href="#">&laquo;</a>
            <?php 
                $sql="SELECT * FROM products";
                $rs_result = $conn->query($sql);
                $total_records=mysqli_num_rows($rs_result);
                $total_pages=ceil($total_records/$num_per_page);
                for($i=1;$i<=$total_pages;$i++){
                    echo "<a class='active' href='Client.php?page=".$i."'>".$i."</a>" ;
                }
                // Close connection
                $conn->close();
            ?>
            <a href="#">&raquo;</a>
        </div>

    </main>

<script src="JS/script.js"></script>
</body>
</html>