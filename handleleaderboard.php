<?php
session_start();
$data = [];
// connect to database
$db = mysqli_connect('localhost', 'root', '12345678','registration');
$leaderboard = "SELECT DISTINCT username,networth,created_at FROM networth  ORDER BY networth DESC ";
// $leaderboard = "SELECT DISTINCT user_id,username,networth,created_at FROM networth GROUP BY user_id ORDER BY networth DESC ";
    $result = mysqli_query($db, $leaderboard);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $db_data = [
                'username' => $row['username'],
                'networth' => $row['networth'],
                'created_at' => $row['created_at'],
            ];
            
           

            array_push($data, $db_data);
            $_SESSION['data_default'] = $data;
            header("Location: leaderboard.php");
            
        }
    }
    mysqli_close($db);
    

    

    
    

?>