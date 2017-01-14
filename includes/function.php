<?php

function __autoload($classname) {
    $filename = "./models/" . $classname . ".php" ;
    $file = "../../models/" . $classname . ".php" ;

    if (file_exists($filename)) {
        include_once($filename) ;
    } elseif (file_exists($file)) {
        include_once($file) ;
    } else {
        echo 'Cant Find Class' ;
    }
}
