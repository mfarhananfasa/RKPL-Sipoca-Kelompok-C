<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'sipoca2');

if (!$koneksi) {
    die('Database error : ' . mysql_error());
}
