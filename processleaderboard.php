<?php 
session_start();
$errors   = []; 
$data = [];
$username = [];
// connect to database
$db = mysqli_connect('localhost', 'root', '','registration');
if(isset($_POST['leaderboard'])) {
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    
    $leaderboard = "SELECT * FROM networth WHERE created_at BETWEEN '$startdate' AND '$enddate' ORDER BY networth DESC";
    $result = mysqli_query($db, $leaderboard);
    // var_dump($result); die();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            
            $db_data = [
                'id' => $row['id'],
                'username' => $row['username'],
                'networth' => $row['networth'],
                'created_at' => $row['created_at'],
            ];

            array_push($data, $db_data);
            $_SESSION['data'] = $data;
            header("Location: leaderboard.php");
        }
        
    }
    else {
        // array_push($errors, "");
        $_SESSION['lb'] = "No records found";
        unset($_SESSION['data_default']); 
        // var_dump($_SESSION['data_default']); die();
        header("Location: leaderboard.php");
    }
   
    
}
