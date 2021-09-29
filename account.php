<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="CSS/register.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Sign Up E_Shop</title>
</head>
<body>
<br><br>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="#">
				<h1>Edit</h1>
				<input type="txt" placeholder="Your Username" >
                <input type="email" placeholder="Email" >
				<input type="password" placeholder="Password" >
                <div class="radiogroup">
                    <input type="radio" name="gender"value="male">
                    <label for="male">Male</label><br>
                    <input type="radio" name="gender" value="female">
                    <label for="female">Female</label><br>
                </div>
				<button><a href="home.php" style="color:blanchedalmond">Submit</a></button>
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
                    <input 
                        style="background-color: rgb(216, 204, 135); color:rgb(37, 21, 2);
                                width: 300px; height: 200px"
                        type="file" accept="image/*"><br><br> 
                                   
			</div>
		</div>
	</div>
</body>
</html>