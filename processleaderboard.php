<?php 
session_start();
$data = [];
$username = [];
// connect to database
$db = mysqli_connect('localhost', 'root', '12345678','registration');
if(isset($_POST['leaderboard'])) {
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    
    $leaderboard = "SELECT * FROM networth WHERE created_at BETWEEN '$startdate' AND '$enddate' ORDER BY networth DESC";
    $result = mysqli_query($db, $leaderboard);
    // var_dump($result); die();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            
            
            
            /* $userId = $row['id'];
            $userId = (int)$userId; */
            $db_data = [
                'id' => $row['id'],
                'username' => $row['username'],
                'networth' => $row['networth'],
                'created_at' => $row['created_at'],
            ];
           /*  $netw = $row['networth'];
            $created_at = $row['created_at']; */

            array_push($data, $db_data);
            $_SESSION['data'] = $data;
            // var_dump($_SESSION['data']);
            header("Location: leaderboard.php");
        }
        
    }
   
    
}
