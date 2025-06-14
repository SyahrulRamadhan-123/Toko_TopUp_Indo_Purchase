<?php
session_start();
include "../../db/db_koneksi.php";

// Ambil data dari form
$input_nominal_topup = intval($_POST['input_nominal_topup']);
$harga = $_POST['harga'];
$name = $_POST['name'];
$metod_pay = $_POST['metod_pay'];


// Cari id_harga dan id_game berdasarkan nominal_topup
$query = "SELECT id_harga, id_game FROM harga WHERE nominal_topup = $input_nominal_topup";
$result = mysqli_query($db_koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Validasi jika data ditemukan
if ($row) {
    $id_harga = $row['id_harga'];
    $id_game = $row['id_game'];

    // Insert ke transaksi
    $query = "INSERT INTO transaksi (id_harga, id_game, nama, metode_pembayaran) 
              VALUES ('$id_harga', '$id_game', '$name', '$metod_pay')";
    $result = mysqli_query($db_koneksi, $query);

    if ($result) {
        $_SESSION['succes_itk'] = 'Transaksi Berhasil, Terimakasih';
    } else {
        $_SESSION['error_itk'] = 'Transaksi Gagal :(';
    }
} else {
    $_SESSION['error_itk'] = 'Gagal menemukan data harga.';
}

header('location: ../../index.php?page=gi');
exit();
