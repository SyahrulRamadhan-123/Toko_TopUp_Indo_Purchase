<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/style.css">
    <title>Kelola Data Game</title>
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

    <!-- Content -->
    <div class="flex-grow-1 p-4 bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="border rounded p-4 shadow p-3 bg-white" style="width : 100%; max-width: 400px;">
            <h4 class="text-center">Silahkan Isi Untuk Menginput Data</h4>
            <?php
                if(isset($_SESSION['error_global'])){
                    echo "<div class='text-bg-danger p-3'>" . $_SESSION['error_global']. "</div>";
                    unset($_SESSION['error_global']);
                }

                if(isset($_SESSION['errors'])){
                    foreach ($_SESSION['errors'] as $msg) {
                    echo "<div class='text-bg-danger p-3'>" . $msg . "</div>";
                    unset($_SESSION['errors']);
                    }
                }
            ?>
            <form action="app/service/proses_input.php" method="POST">
                <div class="mb-3 mt-3">
                    <label for="selectGame">Nama Game</label><br>
                    <select name="game_id" id="game_id">
                        <option value="">Belum Memilih</option>
            <?php
                    $result = mysqli_query($db_koneksi, "SELECT * FROM game");
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id_game']}'>{$row['nama_game']}</option>";
                    }
            ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputNominal_topup">Input Nominal Top-up</label><br>
                    <input type="text" class="form-control" id="inputNominal_topup" placeholder="Contoh : 10 Genesis Crystal" name="input_nominal_topup">
                </div>
                <div class="mb-3">
                    <label for="harga">Harga Nya</label><br>
                    <input txype="text" class="form-control" id="harga" placeholder="Contoh: 10.000" name="harga">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>

    </div>
</div>
<?php
    include "app/layout-dashboard.php/footer-dashboard.php";

?>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
</body>
</html>