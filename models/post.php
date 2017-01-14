<?php

class Post extends Database {

    protected $tableName ;
    protected $post_id ;
    protected $title ;
    protected $body ;

    function __construct() {
        parent::__construct() ;
    }

    public function postInsert($title , $body) {


        $sql = "INSERT INTO post"
            . "(`title` , `body`) "
            . "VALUES ('$title', $body')" ;

        if ($stmt = parent::query($sql)) {
            return TRUE ;
        } else {
            return FALSE ;
        }
    }

    public function postUpdate($id , $title , $body) {

        $id = (int) $id ;

        $sql = "UPDATE post SET "
            . "title = '$title' "
            . ", body = '$body'"
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

}
