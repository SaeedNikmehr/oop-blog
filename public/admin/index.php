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

        <h4><a href="post_page/post_index.php">post_index</a><h4/>
            <h4><a href="user_page/user_index.php">user_index</a><h4/>
                <h4><a href="comment_page/comment_index.php">comment_indexed</a><h4/>
                    <h4><a href="logout.php">logout</a><h4/>
                        </body>

                        </html>




