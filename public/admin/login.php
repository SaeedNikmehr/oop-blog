<?php
require_once ("../../includes/function.php") ;
//require_once ("../../includes/config.php") ;



if (isset($_POST['submit'])) {
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;
    $session = new Session() ;
    if ($session -> login($username , $password)) {
        header("location:index.php") ;
    } else {
        header("location:login.php") ;
    }
}
?>

<!DOCTYPE>
<html>
    <head>
        <meta charset="utf8">
        <title>login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    

    </head>
    <body>
        <form action="login.php" method="post">
            <table>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" maxlength="30" value="<?php /* echo htmlentities($username) ; */ ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" maxlength="30" value="<?php /* echo htmlentities($password) ; */ ?>" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Login" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

