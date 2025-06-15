<?php
    if(isset($_SESSION['is_login'])){
        header('location:index.php?page=login');
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Login</title>
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
    <h3 class="text-center mb-4">Login</h3>
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
    <form action="users/proses/login_proses.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control">
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Masuk</button>
      </div>
    </form>
    <p class="mt-3 text-center text-muted">Belum punya akun? <a href="index.php?page=register">Daftar</a></p>
    <a href="index.php?page=home">Kembali</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
