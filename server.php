<?php 
	session_start();
	// variable declaration
	$username = "";
	$email    = "";
	$errors   = []; 
	$regError = [];
	// $_SESSION['success'] = "";
	/* $_SESSION['error'] = ""; */

	// connect to database
  $db = mysqli_connect('localhost', 'root', '12345678','registration');
  
    
	// REGISTER USER
	if ( isset($_POST['reg_user']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['confirm_password']) ) {

    $username         = mysqli_real_escape_string($db, $_POST['username']);
		$email            = mysqli_real_escape_string($db, $_POST['email']);
		$password         = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
    // ifempty($username) && empty($email) && empty($password) && empty($confirm_password)
    if( !empty($username) && !empty($email) && !empty($password) && !empty($confirm_password) ) // form validation: ensure that the form is correctly filled
      { 
        // checks user email
        $checkEmail   = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $checkResult  = mysqli_query($db, $checkEmail);

        // checks user username
        $checkUsername   = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $checkUsernameResult  = mysqli_query($db, $checkUsername);

        if(mysqli_num_rows($checkResult) == 1) 
        {
            array_push($errors, "Registration unsuccessful, email already exist, Please click the sign up link and try a different email");
            $_SESSION['error'] = $errors;
            header('location: login.php');
        }
        elseif( ((mysqli_num_rows($checkUsernameResult) == 1) && mysqli_num_rows($checkResult) == 0) )
        {
            array_push($errors, "Registration unsuccessful, Username taken, Please click the sign up link and try a different username");
            $_SESSION['error'] = $errors;
            header('location: login.php');
        }elseif( (mysqli_num_rows($checkUsernameResult) == 0) && (mysqli_num_rows($checkResult) == 0)){
              // register user if there are no errors in the form
              $password = md5($password);//encrypt the password before saving in the database
              $query = "INSERT INTO users (username, email, password) 
                        VALUES('$username', '$email', '$password')";
              mysqli_query($db, $query);
        
              // $_SESSION['success'] = "Registration successful, Login Now!";
              $_SESSION['username'] = $username;
              unset($_SESSION['error']);
              header('location: dashboard.php');     
        }else{
        array_push($errors, "Registration unsuccessful, Username or email, already exist. Click the sign up link and try again");
        $_SESSION['error'] = $errors; 
        unset($_SESSION['success']); 
        header('location: login.php');
      }
    
    }else{
          array_push($errors, "Registration unsuccessful! All fields are required. Click the sign up link and try again");
          $_SESSION['error'] = $errors; 
          unset($_SESSION['success']); 
          header('location: login.php');
    }
    mysqli_close($db);
  }






    
/**
 * Performs Logout by destroying and unsetting the sessions
 */
if (isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['success']);
  unset($_SESSION['error']);
  unset($_SESSION['reg_error']);
  unset($_SESSION['net_worth']);
  header('location: index.php'); //redirects to index.php
}
    
  
?>
