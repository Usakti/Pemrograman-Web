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
        $_SESSION['cek']=true;
        return false;
    } else {
        if ($password != $re_password) {
            $_SESSION['pass']=true;
            return false;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = mysqli_query($kon, "INSERT INTO user (username, password) VALUES ('$username','$password')");
            $_SESSION['berhasil']=true;
            return mysqli_affected_rows($kon);
        }
    }
}

function login($login) {
    
    global $kon;

    $username = strtolower(stripslashes(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
    $password = mysqli_real_escape_string($kon, $login['password']);

    $query = mysqli_query($kon, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($query) === 1) {

        $row = mysqli_fetch_assoc($query);

        if(password_verify($password, $row["password"])) {
            $_SESSION['login']=true;
            $_SESSION['username']=$row["username"];
            $_SESSION['berhasil-login']=true;
        } else {
            $_SESSION['salahpas']=true;
        }
    } else {
        $_SESSION['salahuser']=true;
    }
}

?>
