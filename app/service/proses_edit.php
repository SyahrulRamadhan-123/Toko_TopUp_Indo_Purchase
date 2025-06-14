<?php
session_start();



include "../../db/db_koneksi.php";

$id = $_POST['id'];
$input_nominal_topup = $_POST['input_nominal_topup'];
$harga = $_POST['harga'];


$query = "SELECT * FROM harga WHERE harga='$harga'";
$result = mysqli_query($db_koneksi, $query);
if(mysqli_num_rows($result) < 1){
    $query = "UPDATE harga SET nominal_topup='$input_nominal_topup', harga= '$harga'  WHERE id_harga = $id";
    $result = mysqli_query($db_koneksi, $query);

    if(!$result){
        die("query upddate gagal:".  mysqli_error($db_koneksi));
    }

    $_SESSION['insert_succes'] = 'Berhasil, Menerapkan perubahan';
    header('location: ../../index.php?page=kelola_data_game');
    exit();
}else{
    $_SESSION['error_insert'] = 'Gagal, Harga Sudah Diterapkan';
    header('location: ../page-dashboard/edit.php?id='. $id);
    exit();
}