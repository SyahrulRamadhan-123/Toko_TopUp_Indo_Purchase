<?php
    if(isset($_SESSION['is_login'])){
        header('location:../index.php?page=view');
    }

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
    }

    .login-container {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      background-color: #fff;
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <div class="login-card">
    <h3 class="text-center mb-4">Register</h3>
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
    <form action="users/proses/register_proses.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control">
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>

      <div class="mb-3">
        <label for="konfirmasi_password" class="form-label">Confirm Password</label>
        <input type="password" name="konfirmasi_password" id="confirmasi-password" class="form-control">
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Daftar</button>
      </div>
    </form>
    <p class="mt-3 text-center text-muted">Belum punya akun? <a href="index.php?page=login">Login</a></p>
    <a href="index.php?page=home">Kembali</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
