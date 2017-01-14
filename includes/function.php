<?php

function __autoload($classname) {
    $filename = "./models/" . $classname . ".php" ;
    if (file_exists($filename)) {
        include_once($filename) ;
    } else {
        echo 'Cant Find Class' ;
    }
}
