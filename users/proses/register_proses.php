<?php
session_start();

include "../../db/db_koneksi.php";
//tangkap inputan user
$username = $_POST['username'];
$password = $_POST['password'];
$konfirmasi_password = $_POST['konfirmasi_password'];

//validasi
if(empty($username) && (empty($password)) && (empty($konfirmasi_password))){
    $_SESSION['error_global'] = 'Saat Melakukan Registrasi Tidak Boleh Kosong Semua';
    header('location: ../../index.php?page=register');
    exit();
}

$errors = [];
if($username ==''){
    $errors[] = 'Username Tidak Boleh Kosong';
}
if($password ==''){
    $errors[] = 'password Tidak Boleh Kosong';
}
if($konfirmasi_password==''){
    $errors[] = 'konfirmasi Password Tidak Boleh Kosong';
}

if(!empty($password) && (!empty($konfirmasi_password))){
    if($password != $konfirmasi_password){
        $errors[] = 'Password Dan Konfirmasi Password Tidak Sama';
    }
}
if(!$errors==''){
        $_SESSION['msg'] = $errors;
        header('location: ../../index.php?page=register');
        exit();
    }

//sql
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($db_koneksi, $query);
if(mysqli_num_rows($result)>0){
    $_SESSION['duplikat'] = 'Nama Yang Kamu Gunakan Sudah Ada';
    header('location: ../../index.php?page=register');
    exit();
}else{
    $query = "INSERT INTO users (username , password) VALUES ('$username', '$password')";
    $result = mysqli_query($db_koneksi, $query);
    $_SESSION['succes_register'] = 'Silahkan Login Ya :)';
    header('location: ../../index.php?page=view');
    exit();
}




?>