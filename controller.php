<?php 

$newNetWorth = $_POST['newNetWorth'];
$_SESSION['net_worth'] = $newNetWorth;
echo $_SESSION['net_worth'];
// header('location: certificate.php');