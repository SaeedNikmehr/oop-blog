<?php

class Post extends Database {

    protected $tableName = "post" ;
    protected $post_id ;
    protected $title ;
    protected $body ;

    function __construct() {
        parent::__construct() ;
    }

    public function postInsert($title , $body) {

        $sql = "INSERT INTO post (title, body) "
            . "VALUES ('$title', '$body')" ;

        if ($result = parent::query($sql)) {
            return TRUE ;
        } else {
            return FALSE ;
        }
    }

    public function postUpdate($id , $title , $body) {

        $id = (int) $id ;

        $sql = "UPDATE post SET "
            . "title = '$title' "
            . " , body = '$body'"
            . " WHERE post_id = '$id' " ;

        if ($result = parent::query($sql)) {
            return true ;
        } else {
            return false ;
        }
    }

    public function postDelete($id) {

        $id = (int) $id ;

        $sql = "DELETE FROM post "
            . "WHERE post_id = '$id' " ;

        if ($result = parent::query($sql)) {
            return true ;
        } else {
            return false ;
        }
    }

    public static function findPostByID($id) {
        $id = (int) $id ;
        $database = new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME) ;
        $sql = "SELECT `post_id` , `title` ,`body` FROM post WHERE post_id = {$id}" ;
        $result = $database -> query($sql) ;
        if ($row = $result -> fetch_assoc()) {
            return $row ;
        } else {
            return FALSE ;
        }
    }

}
