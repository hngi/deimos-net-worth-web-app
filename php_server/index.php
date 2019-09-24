<?php
namespace php_server;

use php_server\User;


// use php_server\User;
// required headers for Api Call
header("Access-Control-Allow-Origin: *");
header("Access-Control-Request-Headers: origin, x-requested-with");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");

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

/**
 * Register Code
 */
$user = new User();
$result = $user->openConnection();
if($result)
{
    $user->getUsers();
    $user->closeConnection();
}
