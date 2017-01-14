<?php

//require_once "database.php" ;

class User {

    protected $tableNmae ;
    protected $userId ;
    protected $userName ;
    protected $email ;
    protected $password ;

    public function userInsert($userName , $email , $password) {
        $database = new Database ;

        $user = $database -> escape_value($userName) ;
        $e = $database -> escape_value($email) ;
        $pass = $database -> escape_value($password) ;
        $pass = sha1('myblog' . $pass) ;


        $sql = "INSERT INTO user"
            . "(`username` , `email` , `password`) "
            . "VALUES ('$user', '$e' , '$pass')" ;

        if ($stmt = $database -> query($sql)) {
            return true ;
        }
        $database -> close_connection() ;
    }

    public function userUpdate($id , $userName , $email , $password) {
        $database = new Database ;

        $id = (int) $id ;
        $userName = $database -> escape_value($userName) ;
        $email = $database -> escape_value($email) ;
        $password = $database -> escape_value($password) ;
        $password = sha1('myblog' . $password) ;

        $sql = "UPDATE user SET "
            . "username = '$userName' , email = '$email' "
            . ", password = '$password'"
            . " WHERE user_id = '$id' " ;

        if ($result = $database -> query($sql)) {
            return true ;
        } else {
            return false ;
        }
        $database -> close_connection() ;
    }

    public function userDelete($id) {
        $database = new Database ;

        $id = (int) $id ;

        $sql = "DELETE FROM user "
            . "WHERE user_id = '$id' " ;

        if ($result = $database -> query($sql)) {
            return true ;
        } else {
            return false ;
        }
        $database -> close_connection() ;
    }

    public function findUserByUser_Pass($userName , $password) {
        $database = new Database ;
        $userName = $database -> escape_value($userName) ;
        $password = $database -> escape_value($password) ;
        $password = sha1('myblog' . $password) ;

        $sql = "SELECT user_id , username , email , password FROM user " ;
        $sql .= "WHERE username = '{$userName}' " ;
        $sql .= "AND password = '{$password}' " ;
        $sql .= "LIMIT 1" ;

        if ($result = $database -> query($sql)) {
            while ($user = $result -> fetch_assoc()) {
                return $user ;
            }
        } else {
            echo 'UserName Or Password Incorrect.' ;
        }
        $database -> close_connection() ;
    }

}
