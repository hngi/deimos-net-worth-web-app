<?php
require_once "User.php";

// spl_autoload_register(function ($class) {
//     $root = dirname(__DIR__);   // get the parent directory
//     $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
//     if (is_readable($file)) {
//         require $root . '/' . str_replace('\\', '/', $class) . '.php';
//     }
// });
/**
 * Login code
 */
$user   = new User();
$result = $user->openConnection();
if($result)
{
    if( isset($_POST['email']) && isset($_POST['password'] )){
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $response   = $user->login($email,$password);
    }
    
}
?>


