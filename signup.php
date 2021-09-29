<?php
// Include config file
require_once "PHP/db_connect.php";
 
// Define variables and initialize with empty values
$username = $mail = $password = $confirm_password = $gender = $usertype = "";
$username_err = $mail_err = $password_err = $confirm_password_err = $gender_err = $usertype_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
     // Validate Usertype selection
	if(isset($_POST['User'])){
		if(isset($_POST['User'])) { 
			$usertype=$_POST['User'];
		} else {
			$usertype_err= 'Please select your user type.';
		}
	} 
   
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } 
    else{
        // Prepare a select statement for client/worker user to check if they already exist in the database

        if ($usertype == "Client"){
            $sql1 = "SELECT password FROM client_user WHERE Username = ? ";
            if($stmt1 = mysqli_prepare($conn, $sql1)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt1, "s", $param_username);
                
                // Set parameters
                $param_username = trim($_POST["username"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt1)){
                    /* store result */
                    mysqli_stmt_store_result($stmt1);
                    
                    if(mysqli_stmt_num_rows($stmt1) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong during verification. Please try again later.<br>";
                }

                // Close statement
                //mysqli_stmt_close($stmt1);
            }
        }
        if ($usertype == "Worker"){
            $sql2 = " SELECT password FROM worker_user WHERE Username = ? ";
            if($stmt2 = mysqli_prepare($conn, $sql2)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt2, "s", $param_username);
                
                // Set parameters
                $param_username = trim($_POST["username"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt2)){
                    /* store result */
                    mysqli_stmt_store_result($stmt2);
                    
                    if(mysqli_stmt_num_rows($stmt2) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Worker, something went wrong during verification. Please try again later.<br>";
                }

                // Close statement
                //mysqli_stmt_close($stmt2);
            }
        }
        //end of else statement after ensuring the username is unique
    }
	// Validate mail
	function valid_email($str) {
		return (!preg_match
				("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)
			) ? FALSE : TRUE;
		}
    if(empty(trim($_POST["mail"]))){
        $mail_err = "Please enter your mail.";     
    } elseif(!valid_email($_POST["mail"])){
        $mail_err = "Invalid email address.";
    } else{
        $mail = trim($_POST["mail"]);
    }
	
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have at least 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
	// Validate gender selection
	if(isset($_POST['gender'])){
		if(isset($_POST['gender'])) { 
			$gender=$_POST['gender'];
		} else {
			$gender_err= 'Please select your gender.';
		}
	}    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($mail_err) && empty($gender_err) && empty($usertype_err)){
           
        if ($usertype == "Client"){
        // Prepare insert statement for the client user.
            $sql1 = "INSERT INTO client_user (Username, mail, password, gender) VALUES (?, ?, ?, ?)";
            if($stmt1 = mysqli_prepare($conn, $sql1)){
                // Bind variables to the prepared statement as parameters
                
                    mysqli_stmt_bind_param($stmt1, "ssss", $param_username, $param_mail, $param_password, $param_gender);
                    // Set parameters
                    $param_username = $username;
                    $param_mail = $mail;
                    $param_password = $password; 
                    $param_gender = $gender;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt1)){
                    // Redirect to login page for Client
                        header("location: Client.php");
                }
                else{
                        echo "Oops! Something went wrong. Please try again later.<br>";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt1);
        }

        if ($usertype == "Worker"){
        // Prepare  insert statement for the worker user.
            $sql2 = "INSERT INTO worker_user (Username, mail, password, gender) VALUES (?, ?, ?, ?)";
            if($stmt2 = mysqli_prepare($conn, $sql2)){
                // Bind variables to the prepared statement as parameters
                
                    mysqli_stmt_bind_param($stmt2, "ssss", $param_username2, $param_mail2, $param_password2, $param_gender2);
                    // Set parameters
                    $param_username2 = $username;
                    $param_mail2 = $mail;
                    $param_password2 = $password; 
                    $param_gender2 = $gender;
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt2)){
                    // Redirect to login page for Worker
                    header("location: Worker.php");
                }
                else{
                    echo "Oops! Worker, something went wrong. Please try again later.<br>";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt2);
        }
    }
    // Close connection
    mysqli_close($conn);
}

?>
 
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="CSS/register.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
	<title>Sign Up E_Shop</title>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<h1>Sign Up</h1>
				<input name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" 
						value="<?php echo $username; ?>"
						type="txt" placeholder="Username" >
				<span class="invalid-feedback"><?php echo $username_err; ?></span>

                <input name="mail" type="email" placeholder="Email" >
                <span class="invalid-feedback"><?php echo $mail_err; ?></span>
               
				<input name="password" type="password" placeholder="Password" 
						class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" 
						value="<?php echo $password; ?>">
				<span class="invalid-feedback"><?php echo $password_err; ?></span>

				<input name="confirm_password" type="password" placeholder="Confirm Password"
					class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" 
					value="<?php echo $confirm_password; ?>" >
				<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                <div class="radiogroup">
                    <input type="radio" name="User" value="Client"
                    <?php if (isset($_POST['User']) && $_POST['User'] == 'Client'): ?>checked='checked'<?php endif; ?> >
                    <label for="User" id="Client">Client</label>
                    <input type="radio" name="User" value="Worker"
                    <?php if (isset($_POST['User']) && $_POST['User'] == 'Worker'): ?>checked='checked'<?php endif; ?> >
                    <label for="User" id="Worker">Worker</label>
                </div>
                <div class="radiogroup" >
                    <input type="radio" name="gender" value="Male"
                    <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Male'): ?>checked='checked'<?php endif; ?> >
                    <label for="gender">Male</label>
                    <input type="radio" name="gender" value="Female"
                    <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Female'): ?>checked='checked'<?php endif; ?> >
                    <label for="gender">Female</label>
                </div>
                <!---
                <span class="invalid-feedback"><//?php echo $usertype_err; ?></span>
                <span class="invalid-feedback"><//?php echo $gender_err; ?></span>
                --->
				<h5>Already have an account? <a href="login.php">Login here</a>.</h5>
				<!---<input type="submit" name="button" class="button" value="Submit">--->
                <button type="submit" name="button" style="cursor: pointer;"><a style="color:blanchedalmond">Sign Up</a></button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1 class="title2">E_Shop</h1>
					<p>Welcome to E_Shop plateform. 
                        Join the incredible experience with one of the biggest foodie plateform online.
                        Providing 100% bio food and ressources with easy access to the needs of our client,
                    As a restaurant, we provide the majority of African meals in quality and quantity
                    </p>
                    <button name="submit"> <a href="Begin.php" style="color:blanchedalmond">Home Page</a></button>
				</div>
                
			</div>
		</div>
	</div>
</body>
</html>