<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Data Rekapan</title>
</head>
<body>
        <?php
        include "db/db_koneksi.php"; 
        include "app/layout-dashboard.php/header-dashboard.php";
    ?>


    <div class="d-flex" style="margin-top: 58px;">
        <div class="nav bg-dark bs-light border-end" style="width: 200px; min-height: 100vh;">
            <?php
                include "app/layout-dashboard.php/sidebar-dashboard.php";
                ?>
        </div>
                <div class="flex-grow-1 p-4 bg-light">
                    <?php
            $tipeRekapan = $_GET['rekapan'] ?? 'minguan';

// Tentukan filter berdasarkan tipe rekapan
if ($tipeRekapan == 'bulanan') {
    $filterWaktu = "WHERE t.waktu_transaksi >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
} elseif ($tipeRekapan == 'harian') {
    $filterWaktu = "WHERE DATE(t.waktu_transaksi) = CURDATE()";
} else {
    $filterWaktu = "WHERE t.waktu_transaksi >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
}

// Query rekap berdasarkan filter waktu
$query = "
    SELECT 
        g.nama_game,
        DATE(t.waktu_transaksi) AS tanggal,
        COUNT(*) AS total_transaksi,
        SUM(h.harga) AS total_pendapatan
    FROM transaksi t
    JOIN harga h ON t.id_harga = h.id_harga
    JOIN game g ON h.id_game = g.id_game
    $filterWaktu
    GROUP BY g.nama_game, DATE(t.waktu_transaksi)
    ORDER BY tanggal DESC
";

$result = mysqli_query($db_koneksi, $query);
?>

<!-- Dropdown pilih jenis rekapan -->
<form method="get" class="mb-3">
        <input type="hidden" name="page" value="data_rekapan">
    <label for="rekapan">Tampilkan Rekapan:</label>
    <select name="rekapan" id="rekapan" onchange="this.form.submit()">
        <option value="harian" <?= $tipeRekapan == 'harian' ? 'selected' : '' ?>>Rekapan Harian</option>
        <option value="mingguan" <?= $tipeRekapan == 'mingguan' ? 'selected' : '' ?>>Rekapan Mingguan</option>
        <option value="bulanan" <?= $tipeRekapan == 'bulanan' ? 'selected' : '' ?>>Rekapan Bulanan</option>
    </select>
</form>

<!-- Tabel hasil rekap -->
<table class="table table-success table-striped-columns">
    <thead class="text-center">
        <tr>
            <th>Nama Game</th>
            <th>Tanggal</th>
            <th>Total Transaksi</th>
            <th>Total Pendapatan</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr class="text-center">
                    <td><?= htmlspecialchars($row['nama_game']) ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td><?= $row['total_transaksi'] ?></td>
                    <td>Rp <?= number_format($row['total_pendapatan'], 0, ',', '.') ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4" class="text-center">Tidak ada data transaksi pada periode ini.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>

</body>
</html>