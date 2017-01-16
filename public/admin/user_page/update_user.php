<?php
require_once ("../../../includes/function.php") ;
$session = new Session() ;
if ($session -> is_logged_in() == FALSE) {
    header("location:login.php") ;
}


if (isset($_GET['id'])) {
    $id = $_GET['id'] ;
    $find = User::findUserByID($id) ;
}

if (isset($_POST['submit'])) {
    $post = new User() ;
    $user_id = $_POST['id'] ;
    $username = $_POST['username'] ;
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;

    if ($post -> userUpdate($user_id , $username , $email , $password) == TRUE) {
        header('location:user_index.php') ;
    } else {
        header('location:update_user.php') ;
        echo 'user nof found' ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update User</title>
    </head>

    <body>
        <div>
            <form action="update_user.php" method="post" role="form">
                <input type="hidden" name="id" value="<?php echo $find['user_id'] ?>">
                <table>
                    <tr>
                        <td>
                            <label for="username"> یوزرنیم </label>
                        </td>
                        <td>
                            <input type="text" name="username" id="username" value="<?php echo $find['username'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email"> ایمیل: </label>
                        </td>
                        <td>
                            <input type="text" name="email" id="email" value="<?php echo $find['email'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password"> پسوورد: </label>
                        </td>
                        <td>
                            <input name="password" id="password" rows="15" value="<?php echo $find['password'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label></label>
                        </td>
                        <td>
                            <input type="submit" name="submit" value="Update user"> 
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
