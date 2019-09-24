<?php 
namespace php_server;
use PDO;



class Auth {
    const DB_HOST = 'localhost';
    const DB_NAME = 'deimos';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const SHOW_ERRORS = false;

    /**
     * Procted variable
     * @param $con
     * @param $config
     */
    protected $con;
    protected $config;

    /**
     * Private varaibles
     *@param $dsn
     *@param $user
     *@param $password
     *@param $options
     */
    private $dsn = 'mysql:host=' . self::DB_HOST . ';dbname=' .
            self::DB_NAME . ';charset=utf8';
    private $user       = self::DB_USER;
    private $password   = self::DB_PASSWORD;

    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
    ];


    /**
     * Open Connection to Database
     * @return Object $con
     */
    public function openConnection()
    {
        try{
            $this->con = new PDO($this->dsn, $this->user, $this->password, $this->options);
            return $this->con;
        }catch(PDOException $e){
            echo "There is a problem with connection:". $e->getMessage();
        }
    }


    public static function getDB(){
        static $db = null;

        if ($db === null) 
        {
            $dsn = 'mysql:host=' . self::DB_HOST . ';dbname=' .
            self::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
    }

    /**
     * Close Connection to Database
     * 
     */
    public function closeConnection()
    {
        $this->con = null;
    }


    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }
    
    public function redirect($url)
    {
        header("Location: $url");
    }
    
    public function logout()
    {
            session_destroy();
            unset($_SESSION['user_session']);
            return true;
    }

}