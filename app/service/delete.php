<?php
session_start();

include "../../db/db_koneksi.php"; 
$id_harga = $_GET['id'];



$query = "DELETE FROM harga WHERE id_harga=$id_harga ";
$result = mysqli_query($db_koneksi, $query);
if($result){
    $_SESSION['delete_succes'] = 'Berhasil Menghapus Data Game';
    header('location: ../../index.php?page=kelola_data_game');
    exit();
}else{
    $_SESSION['delete_failed'] = 'Delete Tidak Berhasil Dilakukan Silahkan Periksa Kembali';
    header('location: ../../index.php?page=kelola_data_game');
    exit();
}