<?php 
namespace php_server;
session_start();
use PDO;
// use php_server\Auth;
use php_server\Auth;
use php_server\AuthInterface;
    


class User extends Auth implements AuthInterface {

    public function login($input_email,$input_password) {
        $newEmail       = trim($input_email);
        $newPassword    = trim($input_password);
        $data = array();
        $data["body"] = array();
        
 
     
        try
        {
            $db     = static::getDB();
            $stmt   = $db->prepare('SELECT * FROM users WHERE email = :newEmail');
                    $stmt->bindParam(":newEmail", $newEmail,PDO::PARAM_STR) ;
            $logged = $stmt->execute();
            
                while ($user = $stmt->fetch(PDO::FETCH_ASSOC)){

                    extract($user);
            
                    $p = array(
                        "id" => $user['id'],
                        "email" => $user['email'],
                        "password" => $user['password'],
                      );
                    array_push($data["body"], $p);
                }
                if($logged && password_verify($newPassword, $p['password'])){
                    $_SESSION['data'] = $data;
                    header('Location: ../login.php',200);
                    // echo json_encode($data);
                }else{
                    header('HTTP/1.1 401 Unauthorized');
                    echo json_encode(['error' => "email or password error"]);
                    // throw new Exception(json_encode('Username or Password incorrect!'),500);
                }
        }
        catch(PDOException $e)
        {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
   


    public function signup($email,$password) {
        $newPassword = password_hash($password, PASSWORD_DEFAULT);
     
        try
        {
            $db = static::getDB();
            $sql= "SELECT * FROM users WHERE email=:email LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $check = $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_OBJ);
            
            
            if ( !$stmt->rowCount() > 0 ) {
                $stmt = $db->prepare('INSERT INTO users (email, password) VALUES (:email, :newPassword)');
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
                $results = $stmt->execute();
                $_SESSION['success'] = "Registration successful";
                header('Location: ../index.php',200);
                // echo json_encode($results);
            }
            else{
                header('HTTP/1.1 401 Unauthorized');
                echo json_encode(['error' => 'User already exist, try a different email and username']);
                
            }
        }
        catch(PDOException $e)
        {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    /* public function reg($username){
        try
        {
            $db = static::getDB();
            $sql= "SELECT * FROM Users WHERE username = :username LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $check = $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_OBJ);
            
            
            if ( !$stmt->rowCount() > 0 ) {
                $stmt = $db->prepare('INSERT INTO users (username) VALUES (:username)');
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $results = $stmt->execute();
                return json_encode($results);
            }
            else{
                throw new Exception(json_encode('User already exist, try a different username'),500);
            }
        }
        catch(PDOException $e)
        {
            echo json_encode($e->getMessage());
        }
    }
    public function getUsers(){
        try
        {
            $db = static::getDB();
            $sql= "SELECT * FROM Users";
            $stmt = $db->prepare($sql);
            $results = $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            
            
            if ( $stmt->rowCount() > 0 ) {
                
                echo json_encode($data);
            }
            else{
                throw new Exception(json_encode('User already exist, try a different username'),500);
            }
        }
        catch(PDOException $e)
        {
            echo json_encode($e->getMessage());
        }
    } */

    
    

}