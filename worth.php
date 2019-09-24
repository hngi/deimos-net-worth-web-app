
<?php
//index.php
$connect = new PDO("mysql:host=localhost;dbname=net_worth_db", "root", "");
function fill_assets_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM tbl_assets ORDER BY assets_id ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["assets_name"].'">'.$row["assets_name"].'</option>';
 }
 return $output;
}

function fill_liability_select_box($connect)
{ 
 $liab_output = '';
 $query = "SELECT * FROM tbl_liability ORDER BY liability_id ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $liab_output .= '<option value="'.$row["liability_name"].'">'.$row["liability_name"].'</option>';
 }
 return $liab_output;
}

?>
