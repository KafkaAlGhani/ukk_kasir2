-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2024 pada 04.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(20) NOT NULL,
  `id_penjualan` int(20) DEFAULT NULL,
  `id_produk` int(20) DEFAULT NULL,
  `jumlah_produk` int(20) DEFAULT NULL,
  `subtotal` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_penjualan`, `id_produk`, `jumlah_produk`, `subtotal`) VALUES
(46, 27, 8, 4, 260000),
(47, 27, 9, 5, 25000),
(48, 27, 13, 12, 204000),
(49, 28, 8, 3, 195000),
(50, 28, 9, 5, 25000),
(51, 28, 13, 1, 17000),
(52, 28, 28, 2, 100000),
(53, 28, 29, 7, 1400000),
(54, 28, 30, 2, 120000),
(55, 29, 8, 8, 520000),
(56, 29, 9, 5, 25000),
(57, 29, 13, 4, 68000),
(58, 29, 28, 2, 100000),
(59, 29, 29, 1, 200000),
(60, 29, 30, 11, 660000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telepon`) VALUES
(23, 'mako', 'jl. makan', 628567513),
(25, 'aya', 'bandung', 62897669),
(30, 'Lori', 'ggg', 2147483647),
(31, 'tin', 'jln ajaa', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tanggal_penjualan` date DEFAULT NULL,
  `total_harga` int(20) NOT NULL,
  `id_pelanggan` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal_penjualan`, `total_harga`, `id_pelanggan`) VALUES
(27, '2024-11-06', 489000, 30),
(28, '2024-11-06', 1857000, 23),
(29, '2024-11-06', 1573000, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `stok` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`) VALUES
(8, 'ayam goreng ', 65000, 452),
(9, 'indomie', 5000, 713),
(13, 'rendang', 17000, 2),
(28, 'sapi', 50000, 94),
(29, 'laptop', 200000, 51),
(30, 'kambing', 60000, 74);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(21, 'kafka', 'kaf', 'b17bed215ec78110cf4853871b8a8507', 'admin'),
(24, 'petugas', 'petugas', '827ccb0eea8a706c4c34a16891f84e7b', 'petugas'),
(25, 'agus', 'agnus', 'b706835de79a2b4e80506f582af3676a', 'admin'),
(26, 'ujang', 'ujang', '698d51a19d8a121ce581499d7b701668', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_3` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  ADD CONSTRAINT `detail_penjualan_ibfk_4` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
