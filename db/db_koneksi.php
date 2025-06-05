<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "apps_topup";

$db_koneksi = mysqli_connect($hostname, $username, $password, $db_name);
if($db_koneksi -> connect_error){
    die("db gagal terkoneksi");
}

