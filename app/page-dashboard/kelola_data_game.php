<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Kelola Data</title>
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
                <h2 class="text-center mb-3">Ini Adalah seluruh data Game Yang Sudah Di Input</h2>
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
                        <th>Nama Game</th>
                        <th>Nominal Topup Yang Tersedia</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT harga.*, game.nama_game
                    FROM harga
                    JOIN game ON harga.id_game = game.id_game
                    ";
                    $result = mysqli_query($db_koneksi, $query);
                    if(mysqli_fetch_assoc($result)){
                        $no = '1';
                        foreach ($result as $row ) {
                    echo "<tr>";
                        echo "<td>".  $no++ .  "</td>";
                        echo "<td>".  $row['nama_game'] .  "</td>";
                        echo "<td>".  $row['nominal_topup'] .  "</td>";
                        echo "<td> Rp "  .  $row['harga'] .  "</td>";
                        echo "<td>
                            <a href='app/page-dashboard/edit.php?id={$row['id_harga']}'>Edit</a>
                            <a href='app/service/delete.php?id={$row['id_harga']}' onclick=\"return confirm('Yakin Ingin Menghapus ini?')\">Delete</a>
                            </td>";
                    echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    include "app/layout-dashboard.php/footer-dashboard.php";
    ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
</body>
</html>