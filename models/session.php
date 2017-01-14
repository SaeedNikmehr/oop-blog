<?php

class Session {

    private $logged_in = false ;

    function __construct() {
        session_start() ;
        $this -> check_login() ;
    }

    public function is_logged_in() {
        return $this -> logged_in ;
    }

    public function login($username , $password) {
        $user = new User() ;

        $user -> findUserByUser_Pass($username , $password) ;
        if ($user) {
            $_SESSION['username'] = sha1($username) ;
            $this -> logged_in = true ;
        }
    }

    public function logout($url = "login.php") {
        unset($_SESSION['username']) ;
        $this -> logged_in = false ;
        header("location:$url") ;
    }

    private function check_login() {
        if (isset($_SESSION['username'])) {
            $this -> logged_in = true ;
        } else {

            $this -> logged_in = false ;
        }
    }

}
