<?php
require_once ("../../../includes/function.php") ;
$session = new Session() ;
if ($session -> is_logged_in() == FALSE) {
    header("location:login.php") ;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {

    $title = $_POST['title'] ;
    $body = $_POST['body'] ;

    $insert = new Post() ;
    if ($insert -> postInsert($title , $body)) {
        header('location:post_index.php') ;
    } else {
        echo "post cant saved" ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Post</title>

    </head>

    <body>
        <div>
            <div>
                <form action="create_post.php" method="post" role="form">
                    <table>

                        <tr>
                            <td>
                                <label for="title"> عنوان: </label>
                            </td>
                            <td>
                                <input style="width: 200px" type="text" name="title" id="title"><br />
                            </td>
                        <br />
                        </tr>
                        <tr>
                            <td>
                                <label for="body"> متن: </label>
                            </td>
                            <td>
                                <textarea style="width: 400px" name="body" id="body" rows="15"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label></label>
                            </td>
                            <td>
                                <input type="submit" name ="submit" value="Save Post">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
