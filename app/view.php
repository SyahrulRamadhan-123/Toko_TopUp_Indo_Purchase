<?php
if(!isset($_SESSION['is_login'])){
    header('location: index.php?page=login');
    exit();
}
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
        <title>Dashboard</title>
    </head>
    <body>

    <!-- ini adalah navbar -->
<?php
    include "app/component-app/header.php";
?>
    <!-- penutup navbar -->

    <!-- content -->
    <!-- Slider-images -->
     <aside>
    <div class="img-fluid mb-5" style="padding-top: 70px;">
        <?php
            if(isset($_SESSION['succes_db'])){
                echo "<p style= 'color: green'>" . $_SESSION['succes_db'] . "</p>";
                unset($_SESSION['succes_db']);
                }
        ?>
        <div class="slider rounded mx-auto d-block">
            <div id="sliders">
                <img src="assets/images/image-slider/gi.jpeg" alt="images 1" width="500" height="300">
                <img src="assets/images/image-slider/mlbb.jpeg" alt="images 2" width="500" height="300">
                <img src="assets/images/image-slider/pubg.jpeg" alt="images 2" width="500" height="300">
            </div>
        </div>
    </div>
    </aside>
    <!-- end content slider images -->
<aside>
        <div class="container navbar-expand-md bg-warning">
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#populer">Populer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#About">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Semua-Game">Semua-Game</a>
                            </li>
                        </ul>
                    <form class="d-flex" role="search" onsubmit="return false;">
                        <input class="form-control me-2" id="searchInput" type="search" placeholder="Search" aria-label="Search"/>
                        <button class="btn btn-outline-success"  id="searchButton" type="submit">Search</button>
                    </form>
                </div>
                <div id="resultArea"></div>
            </nav>
        </div>
    </aside>
    
<aside class="m-5 text-center"  style="color: white">
    <h1 class="fs-1 text-center">Selamat Datang Di Toko Top-Up</h1>
    <p>Selamat Datang Di halaman Top-Up Mas Gondrong Disini Tersedia Berbagai macam Game Top-Up</p>
</aside>

<!-- populer  -->
<div class="container">
    <div class="row">
        <div class="populer-item">
            <h2 class="text-warning" id="populer">Populer</h2>
        </div>
            <div class="col-2">
                <div class="card hover-effect hover-rise">
                    <button onclick="location.href='index.php?page=gi'" class="btn btn-warning d-flex align-items-center" >
                        <img src="assets/images/content/gi.jpeg" alt="Ikon" style="width: 80px; height: 50px;" class="object-fit-fill border rounded">
                        <p>Genshin Impact</p>
                    </button>
                </div>
            </div>
            <div class="col-2">
                <div class="card hover-effect hover-rise">
                    <button onclick="location.href='index.php?page=mlbb'" class="btn btn-warning d-flex align-items-center">
                        <img src="assets/images/content/ml.jpeg" alt="Ikon" style="width: 80px; height: 50px;" class="object-fit-fill border rounded">
                        <p>Mobile Legends</p>
                    </button>
                </div>
            </div>
    </div>
</div>


<aside>
  <div class="container-md mt-5 mb-5">
    <div class="text">
        <h2 class="text-warning" id="Semua-Game">Semua Game</h2>
        <p style="color: white">Ini adalah Bagian semua game </p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col" style="max-width: 250px; cursor: pointer;" onclick="location.href='index.php?page=gi'">
        <div class="card" style="height: 280px;">
          <img src="assets/images/content/gi.jpeg" class="card-img-top img-fluid rounded" style="max-height: 200px; object-fit: cover;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Genshin Impact</h5>
          </div>
        </div>
      </div>
      
      <div class="col" style="max-width: 250px;">
        <div class="card" style="height: 280px; cursor: pointer;" onclick="location.href='index.php?page=mlbb'">
          <img src="assets/images/content/ml.jpeg" class="card-img-top img-fluid rounded" style="max-height: 200px; object-fit: cover;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Mobile Legends</h5>
          </div>
        </div>
      </div>
      
      <div class="col" style="max-width: 250px;">
        <div class="card" style="height: 280px; cursor: pointer;" onclick="location.href='index.php?page=pubg'">
          <img src="assets/images/content/pubg.jpeg" class="card-img-top img-fluid rounded" style="max-height: 200px; object-fit: cover;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pubg Mobile</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>

<div class="container mt-5" id="About">
    <div class="row">
        <div class="col-4 col-6 ">
            <div class="content text-white">
                <h2>About Website Top-Up</h2>
                <p class="text-break">ini adalah sebuah halaman Website Yang menyediakan layanan berbagai macam game dengan metode transaksi teraman dan termudah tentunya, dan layanan kami tidak hanya menjual game tentunya kami juga menyediakan mitra layanan kerja sama.
                </p>
            </div>

        </div>
    </div>
</div>




    <!-- end content -->
<?php
    include "app/component-app/footer.php";
?>

<script src="assets/script.js"></script>
<script src="assets/script-search.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>