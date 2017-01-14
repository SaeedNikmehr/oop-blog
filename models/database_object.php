<?php

//require_once 'database.php' ;

class DatabaseObject {

    public $tableName ;

    public function selectBySQL($sql) {
        $database = new Database ;
        $result = $database -> query($sql) ;

        while ($row = $result -> fetch_assoc()) {
            $selected[] = $row ;
        }
        return $selected ;
        $database -> close_connection() ;
    }

    public function findAll() {
        return $this -> selectBySQL("SELECT * FROM " . $this -> tableName) ;
    }

    public function countAll() {
        $database = new Database ;

        $sql = "SELECT COUNT(*) FROM " . $this -> tableName ;

        $result = $database -> query($sql) ;
        $row = $result -> fetch_assoc() ;
        return array_shift($row) ;
        $database -> close_connection() ;
    }

}
