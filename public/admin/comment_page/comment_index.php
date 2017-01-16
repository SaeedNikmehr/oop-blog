<?php

require_once ("../../../includes/function.php") ;
$session = new Session() ;
if ($session -> is_logged_in() == FALSE) {
    header("location:login.php") ;
}
