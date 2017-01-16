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
        <title>Posts List</title>

    </head>
    <body>
        <div>
            <h3>Posts Grid</h3>
            <div class="links">
                <h3><a href="create_post.php">Create New Post</a><h3/>
                    <h3> <a href="../index.php">Admin Dashboard</a><h3/>
                        </div>
                        <br>
                        <?php
                        $allpost = new DatabaseObject() ;
                        $allpost -> tableName = "post" ;
                        $findpost = $allpost -> findAll() ;
                        $table = '<table border=1>' ;
                        $table .= '
        <tr>
            <th> آی دی </th>
            <th> عنوان </th>
            <th>متن </th>
            <th>گرید </th>
        </tr>' ;

                        foreach ($findpost as $post) {
                            $table .= "
          <tr>
            <td>{$post["post_id"]}</td>
            <td>{$post["title"]}</td>
            <td>{$post["body"]}</td>
            <td><a href=\"update_post.php?id={$post["post_id"]}\">Update</a> "
                                . "<a href='delete_post.php?id={$post["post_id"]}'>Delete</a></td>
         </tr>" ;
                        }
                        $table .= '</table>' ;
                        echo $table ;
                        ?>
                        </div>
                        </body>
                        </html>
