<?php

if(!isset($_SESSION)) {
    session_start();
}

require_once("fungsi.php");

if(!isset($_SESSION['login'])) {
    header('location: login.php');
} else {
    $username=$_SESSION['username'];
    $query = mysqli_query($kon, "SELECT * FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($query);
}

?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="logo-trisakti.png" />
    <title>Main Page - Azhar Rizki Zulma - 065001900001</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Data Mahasiswa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $row['username']?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <a class="dropdown-item" href="#">Another</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">idk</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <?php if(isset($_SESSION['berhasil-login'])) : ?>
    <div class="alert alert-success text-center" role="alert">Berhasil Login</div>
    <?php unset($_SESSION['berhasil-login']) ?>
    <?php endif ?>
    <?php if(isset($_SESSION['berhasil-tambah'])) : ?>
    <div class="alert alert-success text-center" role="alert">Berhasil Menambah Data</div>
    <?php unset($_SESSION['berhasil-tambah']) ?>
    <?php endif ?>
    <?php if(isset($_SESSION['berhasil-update'])) : ?>
    <div class="alert alert-success text-center" role="alert">Berhasil Mengupdate Data</div>
    <?php unset($_SESSION['berhasil-update']) ?>
    <?php endif ?>
    <?php if(isset($_SESSION['berhasil-hapus'])) : ?>
    <div class="alert alert-success text-center" role="alert">Berhasil Menghapus Data</div>
    <?php unset($_SESSION['berhasil-hapus']) ?>
    <?php endif ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col text-left">
                <a class="btn btn-primary" href="create.php"> Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="container mt-1">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-colored table-centered table-inverse m-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Bio</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($kon, "SELECT id as id, nama as nama, email as email, bio as bio FROM mahasiswa;");
                                    $rowcount = mysqli_num_rows($query);
                                    if($rowcount == 0) {
                                ?>
                                <tr>
                                    <td colspan="5" align="center">
                                        <h3 style="color:red">No record found</h3>
                                    </td>
                                </tr>
                                <?php 
                                    } else {
                                        $i = 1;
                                        foreach($query as $row) :
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo htmlentities($row['nama']);?></td>
                                    <td><?php echo htmlentities($row['email']);?></td>
                                    <td><?php echo htmlentities($row['bio']);?></td>
                                    <td><a style="text-decoration: none;" href="update.php?id=<?php echo htmlentities($row['id']);?>"><i
                                                class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                        &nbsp;<a style="text-decoration: none;"
                                            href="delete.php?id=<?php echo htmlentities($row['id']);?>"
                                            onclick="return confirm('Yakin mau dihapus?')"> <i
                                                class="fa fa-trash-o" style="color: #f05050;"></i></a></td>
                                </tr>
                                <?php $i++; endforeach; }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
