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
        <ul>
            <a href="Index.php"><li> خانه </li></a>
            <a href="public/admin/login.php"><li> ورود </li></a>
            <a href="about.php"><li> در مورد ما </li></a>

    </body>
</html>
<?php
require_once 'includes/function.php' ;

//require_once './models/database_object.php' ;
//require_once './models/database.php' ;
//require_once './includes/config.php' ;
//$database = new DatabaseObject() ;
//
//$database -> tableName = "user" ;
//$users = $database -> countAll() ;
//
//echo $users ;
//foreach ($users as $user) {
//    echo '<hr />' ;
//    echo $user['user_id'] ;
//    echo '<br />' ;
//    echo $user['username'] ;
//    echo '<br />' ;
//    echo $user['email'] ;
//}
//////////////////////////////////////////
//require_once "models/user.php" ;
//$select = new User ;
//$id = 3 ;
//$username = "mamad" ;
//$email = "mamad@gmail.com" ;
//$pass = 1234 ;
//$select -> findUserByUser_Pass($username , $pass) ;
///////////////////////////////////////////
//require_once "models/user.php" ;
//$insert = new User() ;
//$id = 1 ;
//$username = "mammad" ;
//$email = "mammad@gmail.com" ;
//$pass = 1234567 ;
//$insert -> userInsert($username , $email , $pass) ;
/////////////////////////////////////////////////////////////
$posts = new Post() ;
$id = 1 ;
$post = Post::findPostByID($id) ;
echo $post['post_id'] ;
echo $post['title'] ;
echo $post['body'] ;

$title = "the second title" ;
$body = "the second body" ;
if ($insert = $posts -> postUpdate($id , $title , $body)) {
    echo "post inserted" ;
} else {
    echo "insert failed" ;
}
//echo $insert ;
?>