<?php
session_start();

$page = $_GET['page'] ?? 'home';

$protect_page = ['dashboard', 'view'];

if(in_array($page, $protect_page)){
    if(!isset($_SESSION['is_login'])){
        header('location: index.php?page=login');
        exit();
    }
}

switch($page){
    case 'gi' : include 'app/page/gi.php'; break;
    case 'mlbb' : include 'app/page/mlbb.php'; break;
    case 'pubg' : include 'app/page/pubg.php'; break;
    case 'dashboard' : include 'app/dashboard.php'; break;
    case 'view' : include 'app/view.php'; break;
    
    case 'login' : include 'users/login.php'; break;
    case 'register' : include 'users/register.php'; break;
    case 'logout' : include 'logout.php'; break;

    case 'home': include 'start/home.php'; break;

}

?>