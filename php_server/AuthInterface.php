<?php 

namespace php_server;

interface AuthInterface {
    public function signup($email, $password);
    public function login($email, $password);
   /*  public function reg($username);
    public function getUsers(); */
}