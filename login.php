<?php
session_start();

require 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $query = mysqli_query($koneksi, $sql);
    $result = mysqli_fetch_assoc($query);
    if ($result) {
        if (password_verify($password, $result['pass'])) {

            $_SESSION["nama"] = $result['nama'];
            $_SESSION["id_user"] = $result['id_user'];
            $_SESSION["hak_akses"] = $result['hak_akses'];
            $_SESSION["login"] = "true";

            if ($result['hak_akses'] == "admin") {
                header('location: admin.php');
            } else {
                header('location: home.php');
            }
        } else {
            echo "<script>alert('Password Salah')</script>";
        }
    } else {
        echo "<script>alert('Tidak ada user dengan username tersebut')</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign In SIPOCA</title>
    <!-- <link rel="icon" href="img/SD.png"> -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f9069f9455.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex align-items-center" >
    <div class="container d-flex" id="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <h3 class="text-center text-green mb-0">SIPOCA</h3>
                    <p class="text-green text-center mb-3"><small>Sistem Informasi Peminjaman Barang Pondok Cemara</small></p>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success col-12 mx-auto mb-3">Sign In</button>
                    <p class="text-center">Don't have an account? Register <a href="regis.php" class="text-green">here</a></p>
                </form>
                <p class="text-green text-center"><small>Kelompok C &copy; 2021. All rights reserved</small></p>
            </div>
            <div class="col-md-6">
                <img src="img/cemara.png" alt="cemara.png" class="img-fluid">
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>