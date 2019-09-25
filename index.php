<?php 
session_start();
// require_once 'vendor/autoload.php';
/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});
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
        <h3>Registered..When you logout i disappear.</h3>
    <?php endif; ?>

    <h1>Register</h1>
    <form action="app/register.php" method="POST">
        <input type="text" name="email" placeholder="enter email">
        <input type="password" name="password" placeholder="enter email">
        <button type="submit">Submit</button>
    </form>
<h1>Login</h1>
    <form action="app/login.php" method="POST">
        <input type="text" name="email" placeholder="enter email">
        <input type="password" name="password" placeholder="enter email">
        <button type="submit">Submit</button>
    </form>
</body>

</html>