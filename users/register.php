<?php
    session_start();
    if(isset($_SESSION['is_login'])){
        header('location:../app/dashboard.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>  
    
<form action="proses/register_proses.php" method="POST">
    <h2>SIlahkan Melakukan Registrasi Akun</h2>
    <?php
    if(isset($_SESSION['error_global'])){
        echo "<p style= 'color: red;'>" . $_SESSION['error_global'] . "</p>";
        unset($_SESSION['error_global']);
    }
    if(isset($_SESSION['duplikat'])){
        echo "<p style= 'color: red;'>" . $_SESSION['duplikat'] . "</p>";
        unset($_SESSION['duplikat']);
    }
    if(isset($_SESSION['msg']) && is_array($_SESSION['msg'])){
        echo "<ul>";
        foreach($_SESSION['msg'] as $msg){
            echo "<li style= 'color:red'>$msg</li>"; 
        }
        echo "</ul>";
        unset($_SESSION['msg']);
    }
    ?>



    <label for="username">Username</label>
    <input type="text" name="username"><br>
    <label for="password">Password</label>
    <input type="password" name="password"><br>
    <label for="konfirmasi_password">Confirm Password</label>
    <input type="password" name="konfirmasi_password"><br>
    <button type="submit">Login</button>
</form>

</body>
</html>