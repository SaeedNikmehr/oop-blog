<?php

require_once ("config.php") ;

class Database extends mysqli {

    public $connect ;

    function __construct() {
        $this -> open_connection() ;
//      $this -> connect = parent::__construct(DB_HOST , DB_USER , DB_PASS , DB_NAME) ;
    }

    protected function open_connection() {
        $this -> connect = new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME) ;
        if ($this -> connect -> connect_error) {
            die("cannot Connect to Database :" . $this -> connect -> connect_error) ;
        }
//        else {
//            echo 'connection successfull' ;
//        }
    }

    public function close_connection() {
        if (isset($this -> connect)) {
            $this -> connect -> close() ;
            unset($this -> connect) ;
        }
    }

    public function query($sql) {
        return $this -> connect -> query($sql) ;
    }

//    public function prepare($sql) {
//        $stmt = $this -> connect -> stmt_init() ;
//        $prep = $stmt -> prepare($sql) ;
//        return $prep ;
//    }

    public function escape_value($value) {
        return $this -> connect -> real_escape_string($value) ;
    }

}

//$databse = new DataBase ;
