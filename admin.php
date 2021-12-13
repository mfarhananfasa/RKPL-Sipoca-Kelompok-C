<?php
session_start();

require "koneksi.php";

if ($_SESSION['login'] != "true") {
    header('location: index.php');
}

if ($_SESSION['hak_akses'] == 'user') {
    header("location: home.php");
}



$sql = "SELECT DISTINCT konfirmasi.id_user, user.* FROM konfirmasi JOIN user ON konfirmasi.id_user=user.id_user ORDER BY konfirmasi.id_user ASC";
$query = mysqli_query($koneksi, $sql);

$sql_card_info = "SELECT (SELECT count(*) FROM barang) as jumlah_barang, (SELECT count(*) FROM user) as jumlah_user, (SELECT count(DISTINCT id_user) FROM konfirmasi) as jumlah_peminjam";
$query_info = mysqli_query($koneksi, $sql_card_info);
$result_info = mysqli_fetch_assoc($query_info);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <script src="https://kit.fontawesome.com/f9069f9455.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
</head>

<body >

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:  #20bead;">
        <div class="container">
            <a class="navbar-brand" href="home.php">SIPOCA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-info text-center text-white" style="height:100%">
                    <div class=" card-header">
                        Welcome,
                        <strong><?= $_SESSION['nama'] ?></strong>
                    </div>
                    <div class="card-body text-center d-flex align-items-center justify-content-center">
                        <h6 id="jam">

                        </h6>
                        <script>
                            setInterval(() => {
                                $.ajax({
                                    url: 'jam.php',
                                    success: function(data) {
                                        $("#jam").html(data);
                                    }
                                });
                            }, 1000);
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-center text-white">
                    <div class="card-header">
                        Jenis Barang
                    </div>
                    <div class="card-body text-center">
                        <h1>
                            <?= $result_info['jumlah_barang']; ?>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-center text-white">
                    <div class="card-header">
                        Jumlah User
                    </div>
                    <div class="card-body text-center">
                        <h1><?= $result_info['jumlah_user']; ?></h1>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-center text-white">
                    <div class="card-header">
                        Jumlah Peminjam
                    </div>
                    <div class="card-body text-center">
                        <h1><?= $result_info['jumlah_peminjam']; ?></h1>

                    </div>
                </div>
            </div>

        </div>
        <section class="py-5 mb-4 ">
            <h3>List Peminjam Barang</h3>
            <hr>
            <ul class="list-unstyled">
                <li class="">
                    <div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <script>
                                $(document).ready(function() {
                                    $('#example').DataTable();
                                });
                            </script>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                while ($result = mysqli_fetch_assoc($query)) : ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>)
                                        </td>
                                        <td>
                                            <?= $result['nama'] ?>
                                        </td>
                                        <td><?= $result['nohp'] ?></td>
                                        <td><a href="barang.php?id=<?= $result['id_user'] ?>" class="badge badge-info badge-pill"><i class="fas fa-fw fa-info"></i>
                                                detail</a></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </li>
            </ul>
            <hr>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $('#tableAdmin').DataTable();
        });
    </script>

    <?php include 'footer.php'; ?>