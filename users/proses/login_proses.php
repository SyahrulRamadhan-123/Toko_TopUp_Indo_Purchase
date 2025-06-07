<?php
session_start();
include "../../db/db_koneksi.php";

//tangkap Inputan User
$username = $_POST['username'];
$password = $_POST['password'];

//validasi
if($username=='' && $password ==''){
    $_SESSION['error_global'] = 'Saat Mengisi Form Login, Harap Isi Semuanya';
    header('location: ../../index.php?page=login');
    exit();
}

if($username ==''){
    $_SESSION['error_username'] = 'Username Tidak Boleh Kosong';
    header('location: ../../index.php?page=login');
    exit();
}
if($password ==''){
    $_SESSION['error_password'] = 'password Tidak Boleh Kosong';
    header('location: ../../index.php?page=login');
    exit();
}

//sql
$query  = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
$result = mysqli_query($db_koneksi , $query);
if(mysqli_num_rows($result) === 1){
    $data = mysqli_fetch_assoc($result);
    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $data['username'];
    $role = $data['role'];
    if($role==='admin'){
        $_SESSION['succes_db'] =  $username . ' Berhasil Login';
        header('location: ../../index.php?page=dashboard');
        exit();
    }else{
        $_SESSION['succes_db'] =  $username . ' Berhasil Login';
        header('location: ../../index.php?page=view');
        exit();
    };
}else{
    $_SESSION['error_db'] = 'username & password kamu salah';
    header('location: ../../index.php?page=login');
    exit();
}

?>