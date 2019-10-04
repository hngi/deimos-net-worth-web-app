<?php

session_start();
// variable declaration

$errors   = []; 


// connect to database
$db = mysqli_connect('localhost', 'root', '12345678','registration');


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
          $username = $_SESSION['username'];

          $id = [];
          $findUser = "SELECT id FROM users WHERE username = '$username'";
          $results = mysqli_query($db, $findUser);
          if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
              $id[] = $row['id'];
              
            }
          }

          $user_id = (int)$id[0];
          
          // $current_timestamp = time();
          
          // $date=date($_POST['current_date']);
          // 
          $dateSave = date("Y-m-d H:i:s",strtotime($_POST['current_date']));
          // var_dump($dateSave); die();

         
          $query = "INSERT INTO networth (user_id,username, networth,created_at) VALUES ('$user_id', '$username','$networthTotal','$dateSave')";
          // $query = "UPDATE networth SET networth = '$networthTotal'  WHERE user_id = '$user_id'";
          mysqli_query($db, $query);

          // var_dump($date_from_timestamp); die();

          // if($insertStatement){
            header('location: dashboard.php'); //redirect to dasboard.php
          // }
        //   var_dump($_SESSION['net_worth']); die();
          
    }
   
     
      
    } 
    