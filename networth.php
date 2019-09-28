<?php

session_start();
// variable declaration

$errors   = []; 

// $_SESSION['success'] = "";
/* $_SESSION['error'] = ""; */

// connect to database


if (isset($_POST['get_networth']) && !count($_POST['asset']) > 0 && !count($_POST['liability'] > 0)) {
    /**
     * Get data from the various fields
     * @param $asset
     * @param $liability
     */
    var_dump($_POST['asset']); die();
  
      // if(!empty($_POST['asset']) && !empty($_POST['liability']) ){
        $asset        = $_POST['asset'];
        $liability    = $_POST['liability'];
        $sumAsset     = array_sum($asset);
        $sumLiability = array_sum($liability);
    
        $networthTotal = $sumAsset - $sumLiability;
       
        $_SESSION['net_worth'] = $networthTotal;
        header('location: dashboard.php'); //redirect to dasboard.php
     
      
    } 
    else //if the fields are empty this block executes
    {
      array_push($errors, "All Fields are required to compute your Networth");
      $_SESSION['error'] = $errors;
      header('location: dashboard.php');
    }