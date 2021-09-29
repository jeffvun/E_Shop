<?php
    require_once "db_connect.php";
    $id=$_GET['upuser'];
    if (isset($_POST['submit'])){
        $username=$_POST['username'];
        $mail=$_POST['mail'];
        $password=$_POST['password'];
        $gender=$_POST['gender'];
        $photo=$POST['photo'];

        $sql ="UPDATE worker_user SET Username='$username', mail='$mail', password='$password',  gender='$gender', photo='$photo' WHERE userid=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            //echo "Updated Success";
           header("location:../admin_waccount.php");
        }
        else{
            die(mysqli_error($conn));
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../CSS/register.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Sign Up E_Shop</title>
</head>
<body>
<br><br>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<h1>Edit</h1>
				<input type="txt"name="username" placeholder="Username" >
                <input type="email" name="mail" placeholder="Email" >
				<input type="password" name="password" placeholder="Password" >
                <div class="radiogroup">
                    <input type="radio" name="gender"value="male">
                    <label for="male">Male</label><br>
                    <input type="radio" name="gender" value="female">
                    <label for="female">Female</label><br>
                </div><br>
				<button type="submit" name ="submit" style="color:blanchedalmond; cursor:pointer;">Update</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1 class="title2">Profile</h1>
                    <p style="width: 200px; height: 200px">
                        <img src="image/*">
                    </p>
                    <label>Profile Picture</label>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input name="photo"
                            style="background-color: rgb(216, 204, 135); color:rgb(37, 21, 2);
                                    width: 300px; height: 200px"
                            type="file" accept="image/*"><br><br> 
                            <button type="submit" name ="submit" style="color:blanchedalmond; cursor:pointer;">Update</button>
                    </form>            
			</div>
		</div>
	</div>
</body>
</html>