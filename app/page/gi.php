<?php
    include "db/db_koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Genshin Impact</title>
</head>
<body>
<?php
    include "app/component-app/header.php";
?>
<div class="container-fluid text-start" style="margin-top: 100px;">
<a class="btn btn-warning btn-lg" href="index.php?page=view" role="button">Kembali</a>
</div>
<?php
    if(isset($_SESSION['succes_itk'])){
    echo "<div class='text-bg-success p-3'>" . $_SESSION['succes_itk']. "</div>";
    unset($_SESSION['succes_itk']);
    }
    if(isset($_SESSION['error_itk'])){
    echo "<div class='text-bg-danger p-3'>" . $_SESSION['error_itk']. "</div>";
    unset($_SESSION['error_itk']);
    }

?>

<div class="container-sm overflow-hidden text-center mt-5">
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
        <?php
        $query = "  SELECT * FROM harga WHERE id_game= 1";
            $result = mysqli_query($db_koneksi, $query);
            if(mysqli_fetch_assoc($result)){
                foreach($result as $row){
                    $id_harga = $row['id_harga'];
                    $nominal_topup = $row['nominal_topup'];
                    $harga = $row['harga'];
        ?>
        <div class="col">
            <div class="p-3">
                <button type="submit" class="bg-genshin border rounded card hover-effect hover-rise">
                    <a href="app/transaksi/gi-transaksi.php?nominal_topup=<?= $nominal_topup ?>" class="color-text-genshin">
                    <p><?= $nominal_topup ?></p>
                    <h5><?= $harga ?></h5>
                    </a>
                </button>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>