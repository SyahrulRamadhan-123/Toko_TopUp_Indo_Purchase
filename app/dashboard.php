<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
        <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/navbar/pp.jpeg" alt="logo" width="30" height="30" class="rounded-circle me-2">
            Mas Gondrong
        </a>
        <div class="d-flex align-items-center">
            <span class="navbar-text me-3">
                <?= $_SESSION['username']; ?>
            </span>
            <a href="index.php?page=logout" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<!-- Main layout -->
<div class="d-flex" style="margin-top: 58px;">
    <div class="nav bg-success border-end" style="width: 200px; min-height: 100vh;">


    <div class="accordion" id="induk">
        <div class="accordion-item bg-success">
            <h2 class="accordion-header" id="h2-accordion">
                <button class="accordion-button collapsed bg-success" type="button" arial-expanded="false" data-bs-toggle="collapse" data-bs-target="#target-collapse" aria-controls="target-collapse" id="accordion-color-button">
                    menu utama
                </button>
            </h2>
            <div class="accordion-collapse collapse" id="target-collapse" data-bs-parent="#induk" aria-labelledby="#h2-accordion">
                <div class="accordion-body">
                    <ul class="unstyled-list">
                        <li><a href="#">sub menu 1</a></li>
                        <li><a href="#">sub menu 2</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item bg-success">
            <h2 class="accordion-header" id="h2-accordion-2">
                <button class="accordion-button collapsed bg-success" type="button" arial-expanded="false" data-bs-toggle="collapse" data-bs-target="#target-collapse-2" aria-controls="target-collapse-2" id="accordion-color-button">
                    menu utama
                </button>
            </h2>
            <div class="accordion-collapse collapse" id="target-collapse-2" data-bs-parent="#induk-" aria-labelledby="#h2-accordion-2">
                <div class="accordion-body">
                    <ul class="unstyled-list">
                        <li><a href="#">sub menu 1</a></li>
                        <li><a href="#">sub menu 2</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    </div>

    <!-- Content -->
    <div class="flex-grow-1 p-4">
        <!-- Konten dinamis di sini -->
        <h4 class="h4-desu">Selamat datang di Dashboard Admin</h4>
        <p>Silakan pilih menu di samping.</p>
    </div>

</div>

<!-- Footer -->
<footer class="text-center py-3 bg-light border-top mt-auto">
    <small>&copy; <?= date('Y') ?> - Sistem Dashboard</small>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
