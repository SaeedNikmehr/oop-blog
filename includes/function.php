<?php

function __autoload($classname) {
    $filename = "./models/" . $classname . ".php" ;
    $file = "../../models/" . $classname . ".php" ;
    $anotherFile = "../../../models/" . $classname . ".php" ;
    if (file_exists($filename)) {
        include_once($filename) ;
    } elseif (file_exists($file)) {
        include_once($file) ;
    } elseif (file_exists($anotherFile)) {
        include_once($anotherFile) ;
    } else {
        echo 'Cant Find Class' ;
    }
}
