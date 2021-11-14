<?php

$host="localhost";
$user="root";
$password="";
$db="prakpbw";

$kon = mysqli_connect($host,$user,$password,$db);

if (!$kon) die("Koneksi gagal: ".mysqli_connect_error());

function register($reg) {
    global $kon;

    $username = strtolower(stripslashes(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
    $password = mysqli_real_escape_string($kon, $reg['password']);
    $re_password = mysqli_real_escape_string($kon, $reg['re_password']);

    $cek = mysqli_query($kon, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($cek)) {
        echo "<h3><font color=red><center>Username Sudah Terdaftar!</center></font></h3>";
        return false;
    } else {
        if ($password != $re_password) {
            echo "<h3><font color=red><center>Password dan Konfirmasi Password tidak sama!</center></font></h3>";
            return false;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = mysqli_query($kon, "INSERT INTO user (username, password) VALUES ('$username','$password')");
            return mysqli_affected_rows($kon);
        }
    }
}

?>
