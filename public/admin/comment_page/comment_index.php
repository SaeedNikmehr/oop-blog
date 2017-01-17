<?php
require_once ("../../../includes/function.php") ;
$session = new Session() ;
if ($session -> is_logged_in() == FALSE) {
    header("location:login.php") ;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Comments List</title>

    </head>
    <body>
        <div>
            <h3>Comments Grid</h3>
            <div>
                <h3> <a href="../index.php">Admin Dashboard</a></h3>
            </div>
            <br>
            <?php
            $allcomment = new DatabaseObject() ;
            $allcomment -> tableName = "comment" ;
            $findcomment = $allcomment -> findAll() ;
            $table = '<table border=1>' ;
            $table .= '
        <tr>
            <th> آی دی </th>
            <th> آی دی پست </th>
            <th>نویسنده </th>
            <th>متن </th>
            <th>گرید </th>
        </tr>' ;

            foreach ($findcomment as $comment) {
                $table .= "
          <tr>
            <td>{$comment["comment_id"]}</td>
            <td>{$comment["post_id"]}</td>
            <td>{$comment["author"]}</td>
            <td>{$comment["body"]}</td>
            <td><a href='delete_comment.php?id={$comment["comment_id"]}'>delete</a> " . "
         </tr>" ;
            }
            $table .= '</table>' ;
            echo $table ;
            ?>
        </div>
    </body>
</html>


