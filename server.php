<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

// this connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {

  // user input is received here

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

  // validating form credentials, username, email and password
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $confirm_password) {
  array_push($errors, "The two passwords do not match");
      
      header('location: login.php');
  }

  // check database for user, username and email check

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      
      header('location: login.php');
    }

    if ($user['email'] === $email) {
       
      array_push($errors, "email already exists");
      
      header('location: login.php');
    }
  }

  // Register user if correctly filled and not on database
  if (count($errors) == 0) {
    $password = md5($password);//Password encryption

    $query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
  
    // $_SESSION['username'] = $username;
    // $_SESSION['success'] = "You are now logged in";
    
    
    
    
    header('location: index.php');
  }
}

// Login in registered users
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    
    array_push($errors, "Username is required");
    
   
    header('location: login.php');
  }
  if (empty($password)) {
    
    array_push($errors, "Password is required");
    header('location: login.php');
  }

  if (count($errors) == 0) {
    $password = md5($password); // password encrytion
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      
      header('location: dashboard.php');
    }else {
      array_push($errors, "Wrong username/password combination");
      $_SESSION['error'] = $errors;
      unset($_SESSION['reg_error']);
      header('location: login.php');
    }
  }
}




if (isset($_POST['get_networth'])) {
  /**
   * Get data from the variosu fields
   * @param $investmensts
   * @param $cash
   * @param $bank_account
   * @param $real_estate
   * @param $loans
   * @param $mortgages
   * @param $utility_bills
   * @param $other_debts
   */
  $investments    = mysqli_real_escape_string($db, $_POST['investments']);
  $cash           = mysqli_real_escape_string($db, $_POST['cash']);
  $bank_account   = mysqli_real_escape_string($db, $_POST['bank_account']);
  $real_estate    = mysqli_real_escape_string($db, $_POST['real_estate']);
  $loans          = mysqli_real_escape_string($db, $_POST['loans']);
  $mortgages      = mysqli_real_escape_string($db, $_POST['mortgages']);
  $utility_bills  = mysqli_real_escape_string($db, $_POST['utility_bills']);
  $other_debts    = mysqli_real_escape_string($db, $_POST['other_debts']);


    /**
     * Check the incoming fields to ensure they are filled with data. If filled this block excutes
     */
  if (!empty($loans) || !empty($mortgages) || !empty($real_estate) || !empty($investments)
   || !empty($cash) || !empty($bank_account) || !empty($utility_bills) || !empty($other_debts) ) {

    $assets     = $investments + $cash + $bank_account + $real_estate; //calculates the assets
    $liability  = $loans + $mortgages + $utility_bills + $other_debts; //calculate the liabilities
    $netWorth   = $assets - $liability;                                //calculates the networth

    // place networth in session
    $_SESSION['net_worth'] = $netWorth;
    header('location: dashboard.php'); //redirect to dasboard.php

  } 
  else //if the fields are empty  this block executes
  {
    array_push($errors, "All fields are required");
    $_SESSION['error'] = $errors;
    header('location: login.php');
  }
  
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