-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2021 pada 11.30
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipoca2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar`) VALUES
(1, 'Tenda', 'tenda.png'),
(2, 'Karpet', 'carpet.png'),
(3, 'Tali', 'rope.png'),
(4, 'Kuali/Panci', 'cauldron.png'),
(5, 'Alat Panggang', 'grill.png'),
(6, 'Meja/Kursi (per set)', 'chair.png'),
(7, 'Pisau', 'pisau.png'),
(8, 'Sound System', 'sound-system.png'),
(9, 'Arang', 'arang.png'),
(10, 'Kompor Portable', 'kompor.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_kuantitas` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_pinjem` int(11) NOT NULL,
  `tgl_kembali` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_kuantitas`, `id_barang`, `tgl_pinjem`, `tgl_kembali`, `id_user`, `status_kembali`) VALUES
(43, 0, 1, 1622505600, 1623196800, 1, 1),
(44, 0, 2, 1622505600, 1623196800, 1, 1),
(45, 0, 2, 1622505600, 1623196800, 1, 1),
(46, 0, 3, 1622505600, 1623196800, 1, 1),
(47, 0, 4, 1622505600, 1623196800, 1, 1),
(48, 0, 1, 1622592000, 1622764800, 3, 1),
(49, 0, 3, 1622592000, 1622764800, 3, 1),
(50, 0, 3, 1622592000, 1622764800, 3, 1),
(51, 0, 8, 1622592000, 1622764800, 3, 1),
(52, 0, 1, 1622592000, 1622851200, 4, 1),
(53, 0, 2, 1622592000, 1622851200, 4, 1),
(54, 0, 2, 1622592000, 1622851200, 4, 1),
(55, 0, 6, 1622566800, 1622739600, 6, 1),
(56, 0, 6, 1622566800, 1622739600, 6, 1),
(57, 0, 5, 1625011200, 1625097600, 5, 1),
(58, 0, 5, 1625788800, 1625875200, 1, 1),
(59, 0, 1, 1622678400, 1623974400, 1, 1),
(60, 0, 1, 1637535600, 1637881200, 9, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuantitas`
--

CREATE TABLE `kuantitas` (
  `id_kuantitas` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kuantitas`
--

INSERT INTO `kuantitas` (`id_kuantitas`, `id_barang`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 3),
(5, 2),
(6, 2),
(7, 4),
(8, 6),
(9, 6),
(10, 7),
(11, 7),
(12, 8),
(15, 5),
(16, 5),
(17, 2),
(18, 3),
(19, 2),
(20, 3),
(22, 9),
(23, 9),
(24, 9),
(25, 10),
(26, 9),
(27, 10),
(28, 9),
(29, 9),
(30, 9),
(31, 10),
(32, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `pass`, `nohp`, `alamat`, `hak_akses`) VALUES
(4, '456343222', 'Jessy', '123', '', '', 'admin'),
(5, '6789012391283', 'Farhan', '123', '', '', 'admin'),
(6, '017823701823', 'yasir', '123', '', '', 'admin'),
(7, '123', 'jeeehaan', '$2y$10$BvEKAWqvDJdEtFCguTVtIe/bqOHAbGSodAczXUTp7wYS1YCGNsqse', '', '', 'user'),
(8, 'abc', 'abc', '$2y$10$k0azxtgNk/B1fRrICrEwOeqk44fEQDkt5ND2nRVXuuqcbp0tVD1l6', '123', '123', 'admin'),
(9, 'abcd', '123', '$2y$10$WSbQ6qBToNciJ2gqJSZyAOd4576byHM0VmYn6951G2jbJvvNcXifi', '123', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `kuantitas`
--
ALTER TABLE `kuantitas`
  ADD PRIMARY KEY (`id_kuantitas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `kuantitas`
--
ALTER TABLE `kuantitas`
  MODIFY `id_kuantitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
