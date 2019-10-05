<?php
// namespace app;
use app\User;

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});
/**
 * Register Code
 */
$user   = new User();
$result = $user->openConnection();

if($result)
{   
    $email      = $_POST['email'];
    $username      = $_POST['username'];
    $password_1   = $_POST['password_1'];
    $password_2   = $_POST['password_2'];
    if($password_1 === $password_2){
        $user->signup($email,$username,$password_1);
        $user->closeConnection();
    }
    
    
}
