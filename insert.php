<?php
if(isset($_POST["liability_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=net_worth_db", "root", "");

 $user_id = uniqid();
 $date_added = date("Y-m-d");
 for($count = 0; $count < count($_POST["liability_name"]); $count++)
 {  
  $query = "INSERT INTO tbl_networth_items 
  (user_id, networth_result, calt_date) 
  VALUES (:user_id, :net_result, :calt_date)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':net_result' => "200",
    ':user_id' => $user_id,
    ':calt_date' => $date_added
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>
