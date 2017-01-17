

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <h1>
            INDEX PAGE
        </h1>
        <a href="Index.php"><li> خانه </li></a>
        <a href="public/admin/login.php"><li> ورود </li></a>
        <a href="about.php"><li> در مورد ما </li></a>

    </body>
</html>
<?php
require_once 'includes/function.php' ;
$posts = new DatabaseObject() ;
$posts -> tableName = "post" ;
if ($result = $posts -> findAll()) {
    foreach ($result as $post) {
        $id = $post["post_id"] ;
        $link = '<a href=fullpost.php?id=' . $id . '>' ;
        $link .= $post['title'] ;
        $link .= "</a>" ;
        echo $link ;
        echo '<br />' ;
        echo $post["body"] ;
        echo '<br />' ;
        echo '<hr />' ;
    }
} else {
    echo 'no post found' ;
} ;
?>