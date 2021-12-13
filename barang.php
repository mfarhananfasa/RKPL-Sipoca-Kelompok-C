<?php
session_start();

require "koneksi.php";

if ($_SESSION['login'] != "true") {
    header('location: login.php');
}

if ($_SESSION['hak_akses'] == 'user') {
    header("location: dashboard.php");
}


$id_user = $_GET['id'];

$sql = "SELECT * FROM konfirmasi JOIN barang ON konfirmasi.id_barang=barang.id_barang WHERE konfirmasi.id_user = $id_user ORDER BY konfirmasi.status_kembali ASC";
$query = mysqli_query($koneksi, $sql);

// $sql_card_info = "SELECT (SELECT count(*) FROM barang) as jumlah_barang, (SELECT count(*) FROM user) as jumlah_user, (SELECT count(DISTINCT id_user) FROM konfirmasi) as jumlah_peminjam";
// $query_info = mysqli_query($koneksi, $sql_card_info);
// $result_info = mysqli_fetch_assoc($query_info);

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

    <div class="container py-5">
        <h3>Konfirmasi Pengembalian</h3>
        <hr>
        <ul class="list-unstyled">
            <?php while ($result = mysqli_fetch_assoc($query)) : ?>
            <div class="media">
                <img class="align-self-start mr-3" src="img/<?= $result['gambar'] ?>" height="60"
                    alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0"><?= $result['nama_barang'] ?></h5>
                    <p>Durasi : <strong><i><?= date("d F Y  ", $result['tgl_pinjem']) ?></i></strong> sampai <strong><i
                                class="text-danger">
                                <?= date("d F Y  ", $result['tgl_kembali']) ?> </i></strong>
                    </p>
                </div>
                <?php if ($result['status_kembali'] == 0): ?>
                <a href="konfir.php?konfirmasi=<?= $result['id_konfirmasi'] ?>&user=<?= $id_user ?>"
                    class="btn mt-3 btn-warning">Confirm
                    Item <i class="far fa-fw fa-square"></i></a>
                <?php else : ?>
                <button class="btn mt-3 btn-success disabled">Confirmed
                    <i class="fas fa-fw fa-check-square"></i></button>
                <?php endif; ?>
            </div>
            <hr>
            <?php endwhile; ?>
        </ul>
        <a href="admin.php"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    </div>

    <?php include 'footer.php'; ?>