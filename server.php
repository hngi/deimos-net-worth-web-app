<?php 
	session_start();
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		if ($password != $confirm_password) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: dashboard.php');
			}else {
				array_push($errors, "Wrong username/password combination");
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
  else //if the fields are empty this block executes
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