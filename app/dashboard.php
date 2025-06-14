<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
        <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<?php
    include "app/layout-dashboard.php/header-dashboard.php";
?>

<body class="bg-light">

<!-- Navbar -->


<!-- Main layout -->
<div class="d-flex" style="margin-top: 58px;">
    <div class="nav bg-dark bs-light border-end" style="width: 200px; min-height: 100vh;">
<?php
    include "app/layout-dashboard.php/sidebar-dashboard.php";

?>


    
    </div>

    <!-- Content -->
    <div class="flex-grow-1 p-4">
        <!-- Konten dinamis di sini -->
        <h4 class="h4-desu">Selamat datang di Dashboard Admin</h4>
        <p>Silakan pilih menu di samping.</p>
    </div>

</div>

<!-- Footer -->
<?php
    include "app/layout-dashboard.php/footer-dashboard.php";

?>
<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
