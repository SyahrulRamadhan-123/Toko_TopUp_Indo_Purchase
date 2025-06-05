<?php
session_start();
include "../../db/db_koneksi.php";

//tangkap Inputan User
$username = $_POST['username'];
$password = $_POST['password'];

//validasi
if($username=='' && $password ==''){
    $_SESSION['error_global'] = 'Saat Mengisi Form Login, Harap Isi Semuanya';
    header('location:../login.php');
    exit();
}

if($username ==''){
    $_SESSION['error_username'] = 'Username Tidak Boleh Kosong';
    header('location:../login.php');
    exit();
}
if($password ==''){
    $_SESSION['error_password'] = 'password Tidak Boleh Kosong';
    header('location:../login.php');
    exit();
}

//sql
$query  = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
$result = mysqli_query($db_koneksi , $query);
if(mysqli_num_rows($result) === 1){
    $data = mysqli_fetch_assoc($result);
    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['succes_db'] =  $username . ' Berhasil Login';
    header('location: ../../app/dashboard.php');
    exit();
}else{
    $_SESSION['error_db'] = 'username & password kamu salah';
    header('location: ../login.php');
    exit();
}

?>