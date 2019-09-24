<?php 
session_start();
if(isset($_SESSION['success'])){
    $success = $_SESSION['success'];
    
}



?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <?php if(isset($success)): ?>
        <h3>Regsitration successful</h3>
    <?php endif; ?>

    <h1>Register</h1>
    <form action="php_server/Register.php" method="POST">
        <input type="text" name="email" placeholder="enter email">
        <input type="password" name="password" placeholder="enter email">
        <button type="submit">Submit</button>
    </form>
<h1>Login</h1>
    <form action="php_server/Login.php" method="POST">
        <input type="text" name="email" placeholder="enter email">
        <input type="password" name="password" placeholder="enter email">
        <button type="submit">Submit</button>
    </form>
</body>

</html>