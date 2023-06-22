-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Mar 2023 pada 04.35
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purnanew`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_brg`
--

CREATE TABLE `is_brg` (
  `kode_brg` varchar(7) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_brg`
--

INSERT INTO `is_brg` (`kode_brg`, `nama_brg`, `harga_beli`, `harga_jual`, `satuan`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('B000001', 'Isolasi', 7000, 10000, 'Pcs', 61, 1, '2023-02-07 01:53:58', 1, '2023-02-27 06:13:31'),
('B000002', 'NYA Eterna 100m', 450000, 490000, 'Pcs', 7, 1, '2023-02-07 01:54:52', 1, '2023-02-27 06:13:06'),
('B000003', 'Pipa', 5000, 7000, 'Pcs', 2, 1, '2023-02-16 15:13:29', 1, '2023-02-27 06:13:16'),
('B000004', 'Climp', 5000, 7000, 'Pcs', 0, 1, '2023-02-27 06:11:26', 1, '2023-02-27 06:11:26'),
('B000005', 'NYM Eterna', 1300000, 1500000, 'Buah', 16, 1, '2023-02-27 06:12:12', 1, '2023-02-27 06:13:50'),
('B000006', 'lem', 4000, 5000, 'Pcs', 10, 1, '2023-03-07 23:58:27', 1, '2023-03-07 23:59:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_brg_keluar`
--

CREATE TABLE `is_brg_keluar` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kode_brg` varchar(7) CHARACTER SET utf8mb4 NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_brg_keluar`
--

INSERT INTO `is_brg_keluar` (`kode_transaksi`, `tanggal_keluar`, `kode_brg`, `jumlah_keluar`, `created_user`, `created_date`) VALUES
('TK-2023-0000001', '2023-02-07', 'B000001', 1, 1, '2023-02-07 03:41:33'),
('TK-2023-0000002', '2023-02-27', 'B000002', 2, 1, '2023-02-27 06:13:06'),
('TK-2023-0000003', '2023-02-27', 'B000003', 3, 1, '2023-02-27 06:13:16'),
('TK-2023-0000004', '2023-02-27', 'B000001', 2, 1, '2023-02-27 06:13:31'),
('TK-2023-0000005', '2023-02-27', 'B000005', 2, 1, '2023-02-27 06:13:39'),
('TK-2023-0000006', '2023-02-27', 'B000005', 1, 1, '2023-02-27 06:13:50'),
('TK-2023-0000007', '2023-03-08', 'B000006', 5, 1, '2023-03-07 23:59:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_brg_masuk`
--

CREATE TABLE `is_brg_masuk` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_brg` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_brg_masuk`
--

INSERT INTO `is_brg_masuk` (`kode_transaksi`, `tanggal_masuk`, `kode_brg`, `jumlah_masuk`, `created_user`, `created_date`) VALUES
('TM-2023-0000001', '2023-02-07', 'B000001', 12, 1, '2023-02-07 01:58:06'),
('TM-2023-0000002', '2023-02-07', 'B000002', 13, 1, '2023-02-07 02:55:05'),
('TM-2023-0000003', '2023-02-07', 'B000001', 27, 1, '2023-02-07 02:55:20'),
('TM-2023-0000004', '2023-02-16', 'B000002', 2, 1, '2023-02-16 07:36:08'),
('TM-2023-0000005', '2023-02-16', 'B000003', 10, 1, '2023-02-16 15:13:47'),
('TM-2023-0000006', '2023-02-27', 'B000005', 19, 1, '2023-02-27 06:12:40'),
('TM-2023-0000007', '2023-02-27', 'B000001', 45, 1, '2023-02-27 06:12:52'),
('TM-2023-0000008', '2023-03-08', 'B000006', 15, 1, '2023-03-07 23:59:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_gaji`
--

CREATE TABLE `is_gaji` (
  `id_gaji` varchar(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `gaji_pokok` int(20) NOT NULL,
  `tunjangan` int(20) NOT NULL,
  `uang_makan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_gaji`
--

INSERT INTO `is_gaji` (`id_gaji`, `id_user`, `gaji_pokok`, `tunjangan`, `uang_makan`) VALUES
('G01', 1, 2500000, 1000000, 500000),
('G02', 2, 2000000, 1000000, 500000),
('G03', 8, 1000000, 1000000, 500000),
('G04', 9, 1000000, 1000000, 500000),
('G05', 3, 1000000, 1000000, 500000),
('G06', 8, 1000000, 1000000, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_pms`
--

CREATE TABLE `is_pms` (
  `kode_pms` varchar(15) CHARACTER SET latin1 NOT NULL,
  `id_teknisi` varchar(7) NOT NULL,
  `nasabah` text NOT NULL,
  `tgl_pms` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `is_pms`
--

INSERT INTO `is_pms` (`kode_pms`, `id_teknisi`, `nasabah`, `tgl_pms`) VALUES
('PMS-2023-001', 'T-01', 'Putri', '2023-02-22'),
('PMS-2023-002', 'T-01', 'Amelia', '2023-02-27'),
('PMS-2023-003', 'T-01', 'Aril', '2023-02-27'),
('PMS-2023-004', 'T-01', 'Andi', '2023-02-27'),
('PMS-2023-005', 'T-01', 'Subhan', '2023-02-27'),
('PMS-2023-006', 'T-01', 'Iwan', '2023-02-27'),
('PMS-2023-007', 'T-04', 'Andi', '2023-03-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_teknisi`
--

CREATE TABLE `is_teknisi` (
  `id_teknisi` varchar(7) NOT NULL,
  `nama_teknisi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `is_teknisi`
--

INSERT INTO `is_teknisi` (`id_teknisi`, `nama_teknisi`, `email`, `telepon`) VALUES
('T-01', 'Feri Darmawansyah', 'feri.darmawansyah01@gmail.com', '081521900956'),
('T-02', 'Iwan Setiawan', 'iwan@gmail.com', '086152651552'),
('T-03', 'Syahlani', 'Syahlani@gmail.com', '081541532454'),
('T-04', 'Subhan', 'subhan@gmail.com', '081425415425'),
('T-05', 'Amat', 'Yani@gmail.com', '086514241424'),
('T-06', 'satria', 'satria@gmail.com', '0827156255');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang','Teknisi') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'purnausahamandiri@gmail.com', '089507891427', 'logo1.png', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2023-02-15 08:25:06'),
(2, 'al', 'A\'isy al ayyubi', '202cb962ac59075b964b07152d234b70', 'alayyubi@gmail.com', '085680892909', 'user.jpg', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2023-02-17 05:48:22'),
(3, 'syahlani', 'Muhammad Syahlani', '202cb962ac59075b964b07152d234b70', 'muhammadsyahlani09@gmail.com', '081521900956', 'PicsArt_05-21-01.09.21.jpg', 'Gudang', 'aktif', '2017-04-01 08:15:15', '2023-02-16 14:53:36'),
(8, 'Feri', 'Feri', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, 'Gudang', 'aktif', '2023-02-27 06:14:25', '2023-02-27 06:14:25'),
(9, 'kadir', 'Kadir', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, 'Gudang', 'aktif', '2023-02-27 06:14:43', '2023-02-27 06:14:43'),
(10, 'andi', 'Andi', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, 'Manajer', 'aktif', '2023-03-08 00:01:57', '2023-03-08 00:01:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `is_brg`
--
ALTER TABLE `is_brg`
  ADD PRIMARY KEY (`kode_brg`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indeks untuk tabel `is_brg_keluar`
--
ALTER TABLE `is_brg_keluar`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_barang` (`kode_brg`),
  ADD KEY `created_user` (`created_user`);

--
-- Indeks untuk tabel `is_brg_masuk`
--
ALTER TABLE `is_brg_masuk`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_barang` (`kode_brg`),
  ADD KEY `created_user` (`created_user`);

--
-- Indeks untuk tabel `is_gaji`
--
ALTER TABLE `is_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `is_pms`
--
ALTER TABLE `is_pms`
  ADD PRIMARY KEY (`kode_pms`),
  ADD KEY `id_teknisi` (`id_teknisi`);

--
-- Indeks untuk tabel `is_teknisi`
--
ALTER TABLE `is_teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indeks untuk tabel `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `is_brg`
--
ALTER TABLE `is_brg`
  ADD CONSTRAINT `is_brg_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_brg_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `is_brg_masuk`
--
ALTER TABLE `is_brg_masuk`
  ADD CONSTRAINT `is_brg_masuk_ibfk_1` FOREIGN KEY (`kode_brg`) REFERENCES `is_brg` (`kode_brg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_brg_masuk_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
