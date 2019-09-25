<?php 



interface AuthInterface {
    public function signup($email,$username, $password);
    public function login($email, $password);
}