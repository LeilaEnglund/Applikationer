<?php
session_start();

// Include config file
require_once 'config.php';

// redan inloggad? skicka användaren till startsidan
if (isset($_SESSION['username'])) {
  header('Location: sem1.php');
  exit;
}
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM user WHERE username = ? AND password = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
          
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
        
            $param_username = $username;
            $param_password = $password;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
              
                if(mysqli_stmt_num_rows($stmt) == 1){ 
          $_SESSION['username'] = $username;      
          header("location: sem1.php");              
                } else{
                    
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="sem1.css">
</head>
<body>
    
      <div class="bg">

        <!--this code represent the navigationbar sorce:xhttps://www.w3schools.com/css/css_navbar.asp -->
       
        <ul class="navbar"> <!--the ul tag represents an unordered list-->
        <li><a class="active" href="sem1.php">Home</a></li><!--the li tag represents a list-->
          <li><a href="recepies.php">Recipes</a></li><!--the a tag represents a link to another page-->
          <li><a href="calendar.php">Calendar</a></li>
          
<li>


<?php

if (isset($_SESSION['username'])){

echo '<a href="session.php">Sign Out</a>';
}

else
{
  echo '<li><a href="process.php">Sign In</a></li>'; 
}
?>
</li>
</ul>
<br>
<br>
<br>
<p class="intro"><br></p>
<p class='intro' style="font-size: 30px">Sign in</p>
		    <p class="intro"><br></p> 
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
      <p class="intro"><label><b>Username:</b><sup>*</sup></label>
      <input type="text" name="username" value="<?php echo $username; ?>">
      <span><?php echo $username_err; ?></span>
    </p></div>   
    <p class="intro"><br></p>
<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <p class="intro"><label><b>Password:</b><sup>*</sup></label>
      <input type="password" name="password" class="form-control">
      <span ><?php echo $password_err; ?></span>
    </p></div>
    <p class="intro"><br></p>
    <div class="form-group">
      <p class="intro"><input type="submit" value="Submit"></p>
          <p class="intro"><br></p>
    </div>
  <p class="intro"> 
    OR 
<br>
<br>
<a href="register.php">Register</a>
<br>
<br>
</p>
    
  </form>

	</div>	
</body>
</html>