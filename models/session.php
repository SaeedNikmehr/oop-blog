<?php

class Session {

    private $logged_in = false ;

    function __construct() {
        session_start() ;
    }

    public function is_logged_in() {
        return $this -> logged_in ;
    }

}
