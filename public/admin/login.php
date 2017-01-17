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

        <h1>
            LOGIN PAGE
        </h1>
        <a href="../../Index.php"><li> خانه </li></a>
        <a href="login.php"><li> ورود </li></a>
        <a href="../../about.php"><li> در مورد ما </li></a>
        <br />

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
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Login" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

