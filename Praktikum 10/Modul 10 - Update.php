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

$id = intval($_GET['id']);

if (isset($_POST['update'])) {
    if(update($_POST, $id) != 0){
        $_SESSION['berhasil-update'] = true;
        header('location: main.php');
    } else {
        echo mysqli_error($kon);
    }
}

?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="logo-trisakti.png" />
    <title>Update Data - Azhar Rizki Zulma - 065001900001</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Update Data Mahasiswa</a>
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
    <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <h1> Form Update Data</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5 px-5">
        <div class="row mx-5 px-5">
            <div class="col">
                <form method="POST" action="">
                    <?php 
                        $query = mysqli_query($kon,"SELECT id as id, nama as nama, email as email, bio as bio FROM mahasiswa WHERE id='$id'");
                        while($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" placeholder="Enter Name" id="nama" name="nama" value="<?php echo htmlentities($row['nama']);?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?php echo htmlentities($row['email']);?>" required>
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea class="form-control" placeholder="Enter Bio" name="bio" required><?php echo htmlentities($row['bio']);?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update" style="width: 100%;">Update Data</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
