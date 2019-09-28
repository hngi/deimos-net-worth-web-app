<?php

session_start();
// variable declaration

$errors   = []; 

// $_SESSION['success'] = "";
/* $_SESSION['error'] = ""; */

// connect to database


if (isset($_POST['get_networth']) ) {
    /**
     * Get data from the various fields
     * @param $asset
     * @param $liability
     */
    

    if( !array_filter($_POST['asset'])  ||! array_filter($_POST['liability'])  ) {
        array_push($errors, "All Fields are required to compute your Networth");
        $_SESSION['error'] = $errors;
        header('location: dashboard.php');
    }else{
        // var_dump(isset($_POST['asset'])); die();
  
        // if(!empty($_POST['asset']) && !empty($_POST['liability']) ){
          $asset        = $_POST['asset'];
          $liability    = $_POST['liability'];
          $sumAsset     = array_sum($asset);
          $sumLiability = array_sum($liability);
      
          $networthTotal = $sumAsset - $sumLiability;
         
          $_SESSION['net_worth'] = $networthTotal;
        //   var_dump($_SESSION['net_worth']); die();
          header('location: dashboard.php'); //redirect to dasboard.php
    }
   
     
      
    } 
    