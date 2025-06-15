<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome|| Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }

    .hero {
      background: linear-gradient(135deg,rgb(9, 28, 134),rgb(21, 4, 54));
      color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.2rem;
      margin-top: 1rem;
    }

    .btn-primary {
      margin-top: 2rem;
      padding: 10px 30px;
      font-size: 1rem;
      border-radius: 30px;
    }

    footer {
      background-color: #f8f9fa;
      text-align: center;
      padding: 20px;
      margin-top: 60px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">Mass Gondrong</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php?page=login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php?page=register">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Selamat Datang di Website Top Up Kami</h1>
      <p>Menyediakan solusi terbaik untuk kebutuhan Top-up Anda, Kami banyak menyediakan berbagai macam game dan dijamin aman pokoknya.</p>
      <a href="index.php?page=login" class="btn btn-primary">Lihat Sekarang</a>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Toko-Mas-Gondrong. Semua hak dilindungi.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
