<?php
session_start();


$input_nominal_topup = $_POST['input_nominal_topup'];
$harga = $_POST['harga'];
$select = $_POST['game_id'];


if(empty($input_nominal_topup) && (empty($harga)) && ($select === '')){
    $_SESSION['error_global'] = 'Saat Menginput Data Harap Isi Semuanya ya:)';
    header('location:../../index.php?page=input_item_game');
    exit();
}

$errors = [];

if($select === ''){
    $errors[] = 'Anda Belum Memilih Nama Gamenya :)';
}

if($input_nominal_topup === ''){
    $errors[] = 'Tolong Isi Form Input Nominal Topup ya :)';
}
if($harga === ''){
    $errors[] = 'Tolong Isi Form Input Harganya ya :)';
}


include "../../db/db_koneksi.php";

$query = "SELECT * FROM harga WHERE nominal_topup = '$input_nominal_topup'";
$result = mysqli_query($db_koneksi, $query);

if(mysqli_num_rows($result) < 1){
    $query = "INSERT INTO harga (id_game, nominal_topup, harga) VALUES('$select','$input_nominal_topup', '$harga') ";
    $result = mysqli_query($db_koneksi,$query);
    $_SESSION['succes'] = 'Berhsil Menambahkan Data Game';
    header('location: ../../index.php?page=kelola_data_game');
    exit();
}else{
    $errors[] = 'Nominal Topup Sudah Tersedia :)';
}

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header('location: ../../index.php?page=input_item_game');
    exit();
}