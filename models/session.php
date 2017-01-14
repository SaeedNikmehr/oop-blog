<?php

class Session extends User {

    private $logged_in = false ;

    function __construct() {
        session_start() ;
        $this -> checkLogin() ;
    }

    public function is_logged_in() {
        return $this -> logged_in ;
    }

    public function login($username , $password) {

        $user = parent::findUserByUser_Pass($username , $password) ;
        if ($user) {
            $_SESSION['username'] = sha1($username) ;
            $this -> logged_in = true ;
            return TRUE ;
        } else {
            return FALSE ;
        }
    }

    public function logout($url = "login.php") {
        unset($_SESSION['username']) ;
        $this -> logged_in = false ;
        header("location:$url") ;
    }

    private function checkLogin() {
        if (isset($_SESSION['username'])) {
            $this -> logged_in = true ;
        } else {
            $this -> logged_in = false ;
        }
    }

}
