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
    <link rel="stylesheet" type="text/css" href="CSS/admin.css">
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
    <script type='text/javascript' src='JS/admin.js'></script>   
    <script type='text/javascript' src='JS/popup.js'></script>
    <title>E_Shop</title>
</head>
<body>
    <nav class="navbar">
        <div class="logo"></div>
        <div class="l1">
            <span style="color:rgb(175, 164, 9);">E_</span>
            <span>Shop</span>
        </div>
        <div class="elm">
            <li class="list">
                <span style="padding-left: 15px; padding-top: 10px;"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></span>
                <span class="text"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
            </li>
        </div>
    </nav>
    <main>
        <aside>
        <ul><br>
                <li class="alist"><i class="fa fa-university fa-lg" aria-hidden="true"></i><a href="home.php"> Home Page</a></li><br>
                <li class="alist"><i class="fa fa-plus-circle" aria-hidden="true"></i><a href="admin_account.php"> Account ></a></li><br>
                <li class="alist"><i class="fa fa-cutlery" aria-hidden="true"></i><a href="admin_food.php"> Food Management</a></li><br>
                <li class="alist"><i class="fa fa-shopping-basket" aria-hidden="true"></i><a href="admin_order.php"> Orders</a></li><br>
                <li class="alist"><i class="fa fa-money" aria-hidden="true"></i><a href="admin_finance.php"> Finances</a></li><br>  
                <li class="alist"><i class="fa fa-users" aria-hidden="true"></i><a href="admin_Caccount.php"> Clients Management</a></li><br>
                <li class="alist"><i class="fa fa-users" aria-hidden="true"></i><a href="admin_Waccount.php"> Workers Management</a></li><br> 
                <li class="alist"><i class="fa fa-sign-in " aria-hidden="true"></i><a href="PHP/logout.php"> Logout</a></li><br>
            </ul>
        </aside>

        <div class="main">
            <div></div>
            <div class="mininavbar">
                <li class="flist"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <span style="padding-left:5px">View Food</span>
                </li><br>
                <li class="flist"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <span style="padding-left:5px">
                    <a href="javascript:popUpWindow('http://localhost/Eshop/food.php','_blank','700','600')"> Add Food</a>
                    </span>
                </li><br>
                <li class="flist"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span style="padding-left:5px">
                    <a href="javascript:popUpWindow('http://localhost/Eshop/PHP/updatefood.php','_blank','700','600')"> Edit Food</a></span>
                </li><br>
                <li class="flist"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span style="padding-left:5px"><a href="javascript:popUpWindow('http://localhost/Eshop/PHP/deletefood.php','_blank','700','600')"> Edit Food</a></span></span>
                </li><br>
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
            <div class="container">
            <table >
                <thead>
                    <tr class="title">
                        <td class="td_title">ID</td>
                        <td class="td_title">Food </td>
                        <td class="td_title">Image</td>
                        <td class="td_title">Ksh</td>
                        <td class="td_title">Description</td>
                        <td class="td_title">Category</td>
                        <td class="td_title">Select</td>
                    </tr>
                </thead>
                <tbody>
                <?php
        //selecting rows
        $sql_select = "SELECT * FROM products LIMIT $start_from,$num_per_page";
		if($result = $conn->query($sql_select)){
		    if($result->num_rows > 0){
                while($row = $result->fetch_array()){
					$id=$row['Product_ID'];
	?>
                    <tr>
                        <td><label><?php echo $id; ?></label></td>
                        <td><label><?php echo $row['ProductName']; ?></label></td>
			            <td><label><?php echo $row['Image']; ?></label></td>
			            <td><label><?php echo $row['Price']; ?></label></td>
			            <td><label><?php echo $row['Description']; ?></label></td>
			            <td><label><?php echo $row['Category']; ?></label></td>
                        <td>
				            <button id="button">
					            <?php
					            echo '<a href="PHP/updatefood.php?upuser='.$id. '" class="edit">Update </a>'; ?>
				            </button>
				            <button id="button" style="color:red;">
					            <?php 
					                echo '<a href="PHP/deletefood.php?duser='.$id.'">Delete</a>'; ?>
				            </button>
			            </td> 
                    </tr>
                    <?php 
                }$result->free();
            } 
            else{
                echo "No records matching your query were found.";
            }
        }
        else{
            echo "ERROR: Could not able to execute $sql_select. " . $conn->error;
        }
        ?>
                </tbody>
            </table>
            <div class="pagination" method="POST">
                    <a href="#">&laquo;</a>
            <?php 
                $sql="SELECT * FROM products";
                $rs_result = $conn->query($sql);
                $total_records=mysqli_num_rows($rs_result);
                $total_pages=ceil($total_records/$num_per_page);
                for($i=1;$i<=$total_pages;$i++){
                    echo "<a class='active' href='admin_food.php?page=".$i."'>".$i."</a>" ;
                }
                    // Close connection
                    $conn->close();
            ?>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>