<?php
session_start();

// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: sem1.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="sem1.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>

  <div class="bg">  
<br>
<br>
<br>

         <p class="intro" style="font-size: 40px" >Sign Up</p>
            <br>
            <br>
<p class="intro"><br></p>
       <p class="intro" style="font-size: 20px"> Please fill this form to create an account.</p>
       <p class="intro"><br></p>
       <p class="intro"><br></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
             <p class="intro" ><div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"></p>
                <p class="intro" ><label>Username:<sup>*</sup></label></p>
                <p class="intro" > <input type="text" name="username"class="form-control" value="<?php echo $username; ?>"></p>
                 <p class="intro" ><span class="help-block"><?php echo $username_err; ?></span></p>
            </div>    
            <p class="intro" ><div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"></p>
                 <p class="intro" ><label>Password:<sup>*</sup></label></p>
                 <p class="intro" ><input type="password" name="password" class="form-control" value="<?php echo $password; ?>"></p>
                 <p class="intro" ><span class="help-block"><?php echo $password_err; ?></span></p>
            </div>
            <p class="intro" > <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>"></p>
                 <p class="intro" ><label>Confirm Password:<sup>*</sup></label></p>
                 <p class="intro" ><input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"></p>
                <p class="intro" > <span class="help-block"><?php echo $confirm_password_err; ?></span></p>
            </div>
            <p class="intro"><br></p>
            <p class="intro" > <input style="font-size: 30px" type="reset" class="btn btn-default" value="Reset"></p>
             <p class="intro"><br></p>
                <div class="form-group">
                <p class="intro"> <input style="font-size: 30px" type="submit" class="btn btn-primary" value="Submit"></p>
                <p class="intro"><br></p>
                
            </div>
            <p class="intro"><br></p>
            <p class="intro"><br></p>
             <p class="intro" style="font-size: 20px">Already have an account? <a href="process.php">Login here</a>.</p>
        </form>
    </div>    
</div>

</body>
</html>