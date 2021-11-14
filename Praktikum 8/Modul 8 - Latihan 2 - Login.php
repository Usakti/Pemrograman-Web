<?php

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['login'])) {
    header('location: main.php');
}

require_once("fungsi.php");

if (isset($_POST['login'])) {
    login($_POST);
    header('location: main.php');
} else {

?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://tugas.mineversal.com/user/assets/css/index.css" type="text/css" />
<link rel="stylesheet" href="https://tugas.mineversal.com/user/framework/css/bootstrap.min.css" />
<link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<head>
    <link rel="shortcut icon" href="logo-trisakti.png" />
    <title>Login - Azhar Rizky Zulma - 065001900001</title>
    <style>
        body,
        html {
            height: 100%;
            font-family: 'IBM Plex Mono';
            font-size: 17px;
        }

        .reg-bg-image {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            height: 200%;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://tugas.mineversal.com/user/assets/img/bg3.jpg) no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            margin: 0;
            padding: 0;
        }
        .cancelbtn,
        .cancelbtn:hover {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php if(isset($_SESSION['salahpas'])) : ?>
    <div class="alert alert-danger text-center mb-0" role="alert">Password Salah!</div>
    <?php unset($_SESSION['salahpas']) ?>
    <?php endif ?>
    <?php if(isset($_SESSION['salahuser'])) : ?>
    <div class="alert alert-danger text-center mb-0" role="alert">Username Tidak Terdaftar!</div>
    <?php unset($_SESSION['salahuser']) ?>
    <?php endif ?>
    <?php } ?>
    <div id="login" class="reg-bg-image">
        <br><br><br><br>
        <form class="signup-content animate text-left col-md-4 my-auto mx-auto" action="" method="POST">
            <div class="signup-container">
                <div class="text-center">
                    <img src="logo-trisakti.png" height="350" width="350" alt="logo">
                </div>
                <div class="signup-formcontainer">
                    <h1 class="text-center">Login</h1>
                </div>
                <hr>
                <label for="uname"><b>Username</b></label>
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input type="text" placeholder="Enter Username" name="username" required>
                </div>
                <label for="psw"><b>Password</b></label>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input type="password" placeholder="Enter Password" name="password" required>
                </div>
                <p>Belum punya akun? <a href="index.php" style="color:dodgerblue">Register</a></p>
                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('signUp').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn" name="login">Login</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://tugas.mineversal.com/user/user/assets/js/index.js" type="text/javascript"></script>
<script src="https://tugas.mineversal.com/user/user/framework/js/jquery-3.5.1.slim.min.js" type="text/JavaScript"></script>
<script src="https://tugas.mineversal.com/user/user/framework/js/bootstrap.bundle.min.js" type="text/JavaScript"></script>
</html>
