<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Kelola Data Game</title>
</head>
<body>
<?php
session_start();

    include "../../db/db_koneksi.php"; 
    $id = $_GET['id'];

?>






    <!-- Content -->


        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="border rounded p-4 shadow p-3 bg-white" style="width : 100%; max-width: 400px;">
            <h4 class="text-center">Silahkan Isi Untuk Mengubah Data</h4>
            <?php
                if(isset($_SESSION['error_global'])){
                    echo "<div class='text-bg-danger p-3'>" . $_SESSION['error_global']. "</div>";
                    unset($_SESSION['error_global']);
                }

                if(isset($_SESSION['error_insert'])){
                    echo "<div class='text-bg-danger p-3'>" . $_SESSION['error_insert']. "</div>";
                    unset($_SESSION['error_insert']);
                }

                $query = "SELECT * FROM harga WHERE id_harga='$id'";
                $result = mysqli_query($db_koneksi, $query);
                mysqli_fetch_assoc($result);
                foreach($result as $row){
                    $id = $row['id_harga'];
                    $nominal = $row['nominal_topup'];
                    $harga = $row['harga'];
                }
            ?>
            <form action="../../app/service/proses_edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="mb-3">
                    <label for="inputNominal_topup">Input Nominal Top-up</label><br>
                    <input type="text" class="form-control" id="inputNominal_topup" value="<?= $nominal ?>"  placeholder="Contoh : 10 Genesis Crystal" name="input_nominal_topup" required>
                </div>
                <div class="mb-3">
                    <label for="harga">Harga Nya</label><br>
                    <input txype="text" class="form-control" id="harga" value="<?= $harga ?>"  placeholder="Contoh: 10.000" name="harga" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Terapkan Perubahan</button>
                </div>
            </form>
        </div>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
</body>
</html>