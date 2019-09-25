<?php 
namespace app;
session_start();
use PDO;
use app\Auth;
use app\AuthInterface;
    


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
                        "id"        => $user['id'],
                        "username"  => $user['username'],
                        "email"     => $user['email'],
                        "password"  => $user['password'],
                      );
                    array_push($data["body"], $p);
                }
                if($logged && password_verify($newPassword, $p['password'])){
                    $_SESSION['data'] = $data;
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "You are now logged in";
                    $this->redirect('../dashboard.php',200);
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
   


    public function signup($email,$username,$password) {
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
                $stmt = $db->prepare('INSERT INTO users (email, username, password) VALUES (:email, :username, :newPassword)');
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
                $results = $stmt->execute();
                $_SESSION['success'] = "Registration successful";
                $this->redirect('../index.php',200);
                // echo json_encode($results);
            }
            else{
                header('HTTP/1.1 401 Unauthorized');
                $this->redirect('../login.php',401);
                // echo json_encode(['error' => 'User already exist, try a different email and username']);
                
            }
        }
        catch(PDOException $e)
        {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function netWorth(){
        if (isset($_POST['get_networth'])) {
            /**
             * Get data from the variosu fields
             * @param $investmensts
             * @param $cash
             * @param $bank_account
             * @param $real_estate
             * @param $loans
             * @param $mortgages
             * @param $utility_bills
             * @param $other_debts
             */
            $investments    =  $_POST['investments'];
            $cash           =  $_POST['cash'];
            $bank_account   =  $_POST['bank_account'];
            $real_estate    =  $_POST['real_estate'];
            $loans          =  $_POST['loans'];
            $mortgages      =  $_POST['mortgages'];
            $utility_bills  =  $_POST['utility_bills'];
            $other_debts    =  $_POST['other_debts'];
          
          
              /**
               * Check the incoming fields to ensure they are filled with data. If filled this block excutes
               */
            if (!empty($loans) || !empty($mortgages) || !empty($real_estate) || !empty($investments)
             || !empty($cash) || !empty($bank_account) || !empty($utility_bills) || !empty($other_debts) ) {
          
              $assets     = $investments + $cash + $bank_account + $real_estate; //calculates the assets
              $liability  = $loans + $mortgages + $utility_bills + $other_debts; //calculate the liabilities
              $netWorth   = $assets - $liability;                                //calculates the networth
          
              // place networth in session
              $_SESSION['net_worth'] = $netWorth;
              header('location: dashboard.php'); //redirect to dasboard.php
          
            } 
            else //if the fields are empty  this block executes
            {
              array_push($errors, "All fields are required");
              header('HTTP/1.1 401 Unauthorized');
              $this->redirect('../dashboard.php',400);
            }
            
          }
          
          
          
    }

    public function logout()
    {
            /**
           * Performs Logout by destroying and unsetting the sessions
           */
          if (isset($_GET['logout'])){
            session_destroy();
            unset($_SESSION['username']);
            unset($_SESSION['success']);
            unset($_SESSION['error']);
            unset($_SESSION['reg_error']);
            unset($_SESSION['net_worth']);
            header('location: index.php'); //redirects to index.php
      }
            $this->redirect('../index.php',200);
            // header('Location: ../index.php',200);
    }

    
    

}