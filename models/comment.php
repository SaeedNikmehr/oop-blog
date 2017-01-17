<?php

class Comment extends Database {

    function __construct() {
        parent::__construct() ;
    }

    public function deleteComment($id) {
        $id = (int) $id ;

        $sql = "DELETE FROM comment "
            . "WHERE comment_id = '$id' " ;

        if ($result = parent::query($sql)) {
            return true ;
        } else {
            return false ;
        }
    }

    public function commentInsert($post_id , $author , $body) {
        if ( ! empty($post_id) && ! empty($author) && ! empty($body)) {
            $sql = "INSERT INTO comment (post_id ,author, body) "
                . "VALUES ('$post_id', '$author' , '$body')" ;

            if ($result = parent::query($sql)) {
                return TRUE ;
            } else {
                return FALSE ;
            }
        }
    }

    public static function findPostComments($post_id) {
        $selected[] = "" ;
        $post_id = (int) $post_id ;
        $database = new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME) ;
        $sql = "SELECT * "
            . "FROM comment "
            . "WHERE post_id"
            . " = {$post_id}" ;

        $result = $database -> query($sql) ;
        while ($row = $result -> fetch_assoc()) {
            $selected[] = $row ;
        }
        return $selected ;
    }

}
