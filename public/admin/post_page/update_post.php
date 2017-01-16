<?php
require_once ("../../../includes/function.php") ;
$session = new Session() ;
if ($session -> is_logged_in() == FALSE) {
    header("location:login.php") ;
}


if (isset($_GET['id'])) {
    $id = $_GET['id'] ;
    $find = Post::findPostByID($id) ;
}

if (isset($_POST['submit'])) {
    $post = new Post() ;
    $post_id = $_POST['id'] ;
    $title = $_POST['title'] ;
    $body = $_POST['body'] ;

    if ($post -> postUpdate($post_id , $title , $body) == TRUE) {
        header('location:post_index.php') ;
    } else {
        header('location:update_post.php') ;
        echo 'post nof found' ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update Post</title>
    </head>

    <body>
        <div>
            <form action="update_post.php" method="post" role="form">
                <input type="hidden" name="id" value="<?php echo $find['post_id'] ?>">
                <table>
                    <tr>
                        <td>
                            <label for="title"> عنوان: </label>
                        </td>
                        <td>
                            <input type="text" name="title" id="title" value="<?php echo $find['title'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="body"> متن: </label>
                        </td>
                        <td>
                            <textarea name="body" id="body" rows="15"><?php echo $find['body'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label></label>
                        </td>
                        <td>
                            <input type="submit" name="submit" value="Update Post"> 
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
