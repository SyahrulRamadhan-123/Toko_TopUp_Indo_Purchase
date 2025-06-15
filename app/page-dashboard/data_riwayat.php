<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
    <title>Riwayat Transaksi</title>
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
            <table class="table table-success table-striped-columns">
                <h2 class="text-center mb-3">Data Riwayat Transaksi</h2>
                <?php

                if(isset($_SESSION['insert_succes'])){
                echo "<div class='text-bg-success p-3'>" . $_SESSION['insert_succes']. "</div>";
                unset($_SESSION['insert_succes']);
                }

                if(isset($_SESSION['succes'])){
                echo "<div class='text-bg-success p-3'>" . $_SESSION['succes']. "</div>";
                unset($_SESSION['succes']);
                }
                if(isset($_SESSION['delete_succes'])){
                echo "<div class='text-bg-success p-3'>" . $_SESSION['delete_succes']. "</div>";
                unset($_SESSION['delete_succes']);
                }
                if(isset($_SESSION['delete_failed'])){
                echo "<div class='text-bg-success p-3'>" . $_SESSION['delete_failed']. "</div>";
                unset($_SESSION['delete_failed']);
                }
                ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Nama Game</th>
                        <th>Nominal Topup Yang Tersedia</th>
                        <th>Harga</th>
                        <th>Waktu Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT
                                transaksi.id_transaksi,
                                game.nama_game,
                                harga.nominal_topup,
                                harga.harga,
                                transaksi.nama AS nama_pembeli,
                                transaksi.metode_pembayaran,
                                transaksi.waktu_transaksi
                            FROM transaksi
                            JOIN harga ON transaksi.id_harga = harga.id_harga
                            JOIN game ON transaksi.id_game = game.id_game
                            ORDER BY transaksi.waktu_transaksi DESC
                            ";
                    
                    $result = mysqli_query($db_koneksi, $query);
                    if(mysqli_fetch_assoc($result)){
                        $no = '1';
                        foreach ($result as $row ) {
                    echo "<tr>";
                        echo "<td>".  $no++ .  "</td>";
                        echo "<td>".  $row['nama_pembeli'] .  "</td>";
                        echo "<td>".  $row['nama_game'] .  "</td>";
                        echo "<td>".  $row['nominal_topup'] .  "</td>";
                        echo "<td> Rp "  .  $row['harga'] .  "</td>";
                        echo "<td>"  .  $row['waktu_transaksi'] .  "</td>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
</body>
</html>