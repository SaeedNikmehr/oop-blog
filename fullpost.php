<?php
require_once 'includes/function.php' ;

if (isset($_GET['id'])) {
    $id = $_GET['id'] ;
    $find = Post::findPostByID($id) ;
    $comments = Comment::findPostComments($id) ;
}

if (isset($_POST['submit'])) {

    $comment = new Comment() ;
    $post_id = $_POST['id'] ;
    $author = $_POST['author'] ;
    $body = $_POST['body'] ;
    if ($comment -> commentInsert($post_id , $author , $body)) {
        header("location:fullpost.php?id={$find['post_id']}") ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>full post page</title>
    </head>
    <body>

        <?php
        if ($find) {
            echo "<h3>" . $find['title'] . "</h3>" ;
            echo "<br />" ;
            echo $find['body'] ;
            echo "<br />" ;
            echo "<br />" ;
            echo "<hr />" ;
        }
        echo '<h3> comments : </h3>' ;
        echo '<br />' ;
        $commentlist = "" ;
        foreach ($comments as $row) {
            $commentlist .= "author : " . $row['author'] ;
            $commentlist .= '<br />' ;
            $commentlist .= "comment : " . $row['body'] ;
            $commentlist .= '<br />' ;
            $commentlist .= '<hr />' ;
        }
        echo $commentlist ;
        ?>
        <form action="fullpost.php?id=<?php echo $find['post_id'] ; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $find['post_id'] ?>">
            <table>
                <tr>
                    <td>
                        <label for="author"> نویسنده: </label>
                    </td>
                    <td>
                        <input type="text" name="author" id="author" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="body"> متن: </label>
                    </td>
                    <td>
                        <textarea name="body" id="body" rows="15"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label></label>
                    </td>
                    <td>
                        <input type="submit" name="submit" value="insert comment"> 
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
