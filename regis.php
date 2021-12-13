<?php
session_start();

require 'koneksi.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $password2 = $_POST['ulangi_password'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];

    //cek apa ada data dengan nik yang sama di database
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $query = mysqli_query($koneksi, $sql);
    $result = mysqli_fetch_assoc($query);
    if (!$result) {
        if ($password == $password2) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO user (username, nama, pass, nohp, alamat, hak_akses) VALUES ('$username', '$nama', '$password', $nohp, $alamat, 'user')";
            $query2 = mysqli_query($koneksi, $sql_insert);
            if (!$query2) {
                echo ("Error description: " . mysqli_error($koneksi));
            } else {
                header('location: login.php?status=registered');
            }
        } else {
            echo "<script>alert('password tidak sama!')</script>";
        }
    } else {
        echo "<script>alert('Akun sudah terdaftar!')</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="icon" type="image/png" href="img/SD.png"> -->
    <title>Sign Up SIPOCA</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f9069f9455.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex align-items-center">

    <div class="container d-flex" id="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <h3 class="text-center text-green mb-0">SIPOCA</h3>
                    <p class="text-green text-center mb-3"><small>Sistem Informasi Peminjaman Barang Pondok Cemara</small></p>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="ulangipassword" placeholder="Confirm Password" name="ulangi_password" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No HP" onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <script>
                        function hanyaAngka(event) {
                        var angka = (event.which) ? event.which : event.keyCode
                        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)) {
                            return false;
                        }
                        return true;
                        }
                    </script>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success col-12 mx-auto mb-3">Sign Up</button>
                    <p class="text-center">Already have an account? Sign In <a href="login.php" class="text-green">here</a></p>
                </form>
                <p class="text-green text-center"><small>Kelompok C &copy; 2021. All rights reserved</small></p>
            </div>
            <div class="col-md-6">
                <img src="img/cemara.png" alt="cemara.png" class="img-fluid">
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
</body>

</html>