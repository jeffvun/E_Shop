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
    <title>E_Shop</title>
</head>
<body>
    <nav class="navbar">
        <div class="logo">   </div>
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
            <div class="mininavbar">
                <li class="flist"><i class="fa fa-database" aria-hidden="true"></i> Data Analysis</li><br>
                <li class="flist" style="width:140px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Total Revenue</li><br>
                <li class="flist"style="width: 140px;"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>  Expenses</li><br>
            </div>
        </div>
    </main>

</body>
</html>

