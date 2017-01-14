<?php
require_once ("../../includes/function.php") ;
$session = new Session() ;
if ($session -> is_logged_in() == FALSE) {
    header("location:login.php") ;
}
?>

<!DOCTYPE>
<html>
    <head>
        <meta charset="utf8">
        <title>ADMIN _ INDEX</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    

    </head>
    <body>
        <h3>
            ADMIN INDEX
        </h3>
        <h4><a href="logout.php">logout</a><h4/>
    </body>
</html>




