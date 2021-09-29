<?php
// Include config files
require_once "PHP/db_connect.php";

 // Validate Usertype selection
 $usertype = $usertype_err = "";
 if(isset($_POST['User'])){
    if(isset($_POST['User'])) { 
        $usertype=$_POST['User'];
    } else {
        $usertype_err= 'Please select your user type.';
    }
} 

// Check if the user is already logged in, if yes then redirect him to Client or Worker page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if($usertype=="Client"){
        header("location: Client.php");
    }
    else if($worker=="Worker"){
        header("location: admin_account.php");
    }
    
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err) && empty($usertype_err)){
        if ($usertype =="Client"){
        // Prepare a select statement
        $sql = "SELECT Username, password FROM client_user WHERE Username = ?";
        
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); //hasing the password for security
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $username, $hased_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                //$_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            
                                
                                // Redirect user to Client page
                                header("location: Client.php");
                            } else{
                                // Password is not valid, display a generic error message
                                $login_err = "Invalid username or password.";
                            }
                        }
                    } 
                    else{
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid username or password.";
                    }
                } 
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        if($usertype=="Worker"){
            // Prepare a select statement
            $sql2 = "SELECT Username, password FROM worker_user WHERE Username = ?";
            if($stmt = mysqli_prepare($conn, $sql2)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); //hasing the password for security
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $username, $hased_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                //$_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            
                                
                                // Redirect user to Management page
                                header("location: admin_account.php");
                            } else{
                                // Password is not valid, display a generic error message
                                $login_err = "Invalid username or password.";
                            }
                        }
                    } 
                    else{
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid username or password.";
                    }
                } 
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    }
    //Terminate the validation of inputs
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="CSS/register.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login E_Shop</title>
</head>
<body>
<br><br>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" 
				method="POST">
				<h1>Login</h1>
				<?php 
        if(!empty($login_err)){
            echo '<div style="color:red">' . $login_err . '</div>';
        }        
        ?>
				<div class="social-container">
					<a href="#" class="social"><i class="fa fa-facebook fa-2x"></i></a>
					<a href="#" class="social"><i class="fab fa fa-twitter fa-2x"></i></a>
				</div>
				<span style="margin-top:-10px;">or use your account</span>

				<input class="form-control<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" 
						value="<?php echo $username; ?>"
						type="txt" name="username" placeholder="Username" >
				<span class="invalid-feedback"><?php echo $username_err; ?></span>

				<input class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
						type="password" name="password" placeholder="Password" />
				<span class="invalid-feedback"><?php echo $password_err; ?></span>
                <div class="radiogroup">
                    <input type="radio" name="User" value="Client"
                    <?php if (isset($_POST['User']) && $_POST['User'] == 'Client'): ?>checked='checked'<?php endif; ?> >
                    <label for="User" id="Client">Client</label>
                    <input type="radio" name="User" value="Worker"
                    <?php if (isset($_POST['User']) && $_POST['User'] == 'Worker'): ?>checked='checked'<?php endif; ?> >
                    <label for="User" id="Worker">Worker</label>
                </div>
				<a href="#">Forgot your password?</a>
				<a href="signup.php">Don't have an account? Sign Up</a>
				<button type="submit" name="Login" style="cursor: pointer;"><a style="color:blanchedalmond">Log In</a></button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1 class="title2">E_Shop</h1>
					<p>Welcome to E_Shop plateform. 
                        Join the incredible experience with one of the biggest plateform online.</p>
						<button> <a href="Begin.php" style="color:blanchedalmond">Home Page</a></button>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>