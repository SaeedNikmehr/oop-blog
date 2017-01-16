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
        <title>Users List</title>

    </head>
    <body>
        <div>
            <h3>Users Grid</h3>
            <div>
                <h3><a href="create_user.php">Create New User</a></h3>
                <h3> <a href="../index.php">Admin Dashboard</a></h3>
            </div>
            <br>
            <?php
            $alluser = new DatabaseObject() ;
            $alluser -> tableName = "user" ;
            $finduser = $alluser -> findAll() ;
            $table = '<table border=1>' ;
            $table .= '
        <tr>
            <th> آی دی </th>
            <th> یوزرنیم </th>
            <th> ایمیل </th>
            <th>پسوورد</th>
            <th>گرید </th>
        </tr>' ;

            foreach ($finduser as $user) {
                $table .= "
          <tr>
            <td>{$user["user_id"]}</td>
            <td>{$user["username"]}</td>
            <td>{$user["email"]}</td>
            <td>{$user["password"]}</td>
            <td><a href='update_user.php?id={$user["user_id"]}'>Update</a> "
                    . "<a href='delete_user.php?id={$user["user_id"]}'>Delete</a></td>
         </tr>" ;
            }
            $table .= '</table>' ;
            echo $table ;
            ?>
        </div>
    </body>
</html>
