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
    include "db/db_koneksi.php";
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
        <p>Silakan pilih menu di samping, Dibawah ini adalah sebuah rekapan</p>
        <?php

// Ambil data transaksi hari ini
$query = "
    SELECT 
        g.nama_game,
        DATE(t.waktu_transaksi) AS tanggal,
        COUNT(*) AS total_transaksi,
        SUM(h.harga) AS total_pendapatan
    FROM transaksi t
    JOIN harga h ON t.id_harga = h.id_harga
    JOIN game g ON h.id_game = g.id_game
    WHERE DATE(t.waktu_transaksi) = CURDATE()
    GROUP BY g.nama_game, tanggal
    ORDER BY tanggal DESC
";

$result = mysqli_query($db_koneksi, $query);
?>

<h3 class="mb-3">Rekapan Transaksi Hari Ini</h3>

<table class="table table-bordered table-striped">
    <thead class="table-success text-center">
        <tr>
            <th>No</th>
            <th>Nama Game</th>
            <th>Tanggal</th>
            <th>Total Transaksi</th>
            <th>Total Pendapatan</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php $no = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama_game']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal']) ?></td>
                    <td><?= htmlspecialchars($row['total_transaksi']) ?> transaksi</td>
                    <td>Rp <?= number_format($row['total_pendapatan'], 0, ',', '.') ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center text-danger">Belum ada transaksi hari ini.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

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
