<?php
    if(isset($_SESSION['is_login'])){
        header('location:index.php?page=login');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <a href="index.php?page=home">balik</a>
<form action="users/proses/login_proses.php" method="POST">
    <h2>SIlahkan isi Form Berikut</h2>
    <?php
        if(isset($_SESSION['error_global'])){
            echo "<p style= 'color:red'>" . $_SESSION['error_global'] . "</p>";
            unset($_SESSION['error_global']);
        }
        if(isset($_SESSION['error_username'])){
            echo "<p style= 'color:red'>" . $_SESSION['error_username'] . "</p>";
            unset($_SESSION['error_username']);
        }

        if(isset($_SESSION['error_password'])){
            echo "<p style= 'color:red'>" . $_SESSION['error_password'] . "</p>";
            unset($_SESSION['error_password']);
        }
        if(isset($_SESSION['error_db'])){
            echo "<p style= 'color:red'>" . $_SESSION['error_db'] . "</p>";
            unset($_SESSION['error_db']);
        }
        if(isset($_SESSION['succes_register'])){
            echo "<p style= 'color:green'>" . $_SESSION['succes_register'] . "</p>";
            unset($_SESSION['succes_register']);
        }
    ?>



    <label for="username">Username</label>
    <input type="text" name="username"><br>
    <label for="password">Password</label>
    <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>

</body>
</html>