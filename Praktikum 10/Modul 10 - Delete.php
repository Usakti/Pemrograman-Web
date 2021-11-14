<?php

if(!isset($_SESSION)) {
    session_start();
}

require_once("fungsi.php");

if(!isset($_SESSION['login'])) {
    header('location: login.php');
}

$id = intval($_GET['id']);
if(hapus($id) != 0){
    $_SESSION['berhasil-hapus'] = true;
    header('location: main.php');
}

?>
