<?php
require_once ("../../../includes/function.php") ;
$session = new Session() ;
if ($session -> is_logged_in() == FALSE) {
    header("location:login.php") ;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {

    $username = $_POST['username'] ;
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;

    $insert = new User() ;
    if ($insert -> userInsert($username , $email , $password)) {
        header('location:user_index.php') ;
    } else {
        echo "user cant saved" ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create User</title>

    </head>

    <body>
        <div>
            <div>
                <form action="create_user.php" method="post" role="form">
                    <table>

                        <tr>
                            <td>
                                <label for="username"> یوزرنیم: </label>
                            </td>
                            <td>
                                <input style="width: 300px" type="text" name="username" id="username"><br />
                            </td>
                        <br />
                        </tr>
                        <tr>
                        <tr>
                            <td>
                                <label for="email"> ایمیل: </label>
                            </td>
                            <td>
                                <input style="width: 300px" type="text" name="email" id="email"><br />
                            </td>
                        <br />
                        </tr>
                        <td>
                            <label for="password"> پسوورد: </label>
                        </td>
                        <td>
                            <input style="width: 300px" name="password" id="password">
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
