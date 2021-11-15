-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2021 pada 16.02
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_lab`
--

CREATE TABLE `biaya_lab` (
  `id_biaya_lab` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_lab`
--

INSERT INTO `biaya_lab` (`id_biaya_lab`, `id_pasien`, `id_lab`, `harga`) VALUES
(4, 6, 4, '500000'),
(5, 9, 1, '800000'),
(6, 8, 1, '800000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_lainnya`
--

CREATE TABLE `biaya_lainnya` (
  `id_biaya_lainnya` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `biaya_lainnya` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total_lainnya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_lainnya`
--

INSERT INTO `biaya_lainnya` (`id_biaya_lainnya`, `id_pasien`, `biaya_lainnya`, `harga`, `jumlah`, `total_lainnya`) VALUES
(6, 1, 'ambulance', '20000', '1', '20000'),
(7, 2, 'ambulance', '20000', '20', '400000'),
(8, 3, 'ambulance', '800000', '2', '1600000'),
(12, 6, 'suntikan', '20000', '1', '20000'),
(13, 9, 'ambulance', '20000', '1', '20000'),
(14, 8, 'ambulance', '20000', '1', '20000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_layanan`
--

CREATE TABLE `biaya_layanan` (
  `id_biaya_layanan` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `jumlah_layanan` varchar(100) NOT NULL,
  `total_harga_layanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_layanan`
--

INSERT INTO `biaya_layanan` (`id_biaya_layanan`, `id_pasien`, `id_layanan`, `jumlah_layanan`, `total_harga_layanan`) VALUES
(53, 1, 1, '1', '20000'),
(54, 1, 2, '4', '80000'),
(55, 2, 2, '7', '140000'),
(59, 6, 1, '1', '20000'),
(60, 6, 3, '3', '2400000'),
(61, 9, 2, '3', '60000'),
(63, 8, 1, '1', '20000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_pavilium`
--

CREATE TABLE `biaya_pavilium` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah_hari` varchar(100) NOT NULL,
  `total_harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_pavilium`
--

INSERT INTO `biaya_pavilium` (`id`, `id_pasien`, `tgl_keluar`, `jumlah_hari`, `total_harga`) VALUES
(10, 1, '2021-05-30', '3', '1500000'),
(17, 2, '2021-06-01', '3', '2400000'),
(18, 3, '2021-05-31', '3', '2400000'),
(20, 6, '2021-09-18', '2', '1600000'),
(21, 9, '2021-09-20', '3', '2400000'),
(22, 8, '2021-09-18', '2', '1000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pelayanan`
--

CREATE TABLE `jenis_pelayanan` (
  `id` int(11) NOT NULL,
  `jenis_layanan` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pelayanan`
--

INSERT INTO `jenis_pelayanan` (`id`, `jenis_layanan`, `harga`) VALUES
(1, 'Vacuum Extrasi', '20000'),
(2, 'Konsul Dokter', '20000'),
(3, 'Oksigen', '800000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id` int(11) NOT NULL,
  `nama_lab` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laboratorium`
--

INSERT INTO `laboratorium` (`id`, `nama_lab`, `harga`) VALUES
(1, 'Laboratorium DBD', '800000'),
(2, 'Laboratorium hepatits', '30000'),
(4, 'Laboratorium tives', '500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `umur` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_pavilium` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `tgl_masuk`, `nama_pasien`, `umur`, `jenis_kelamin`, `alamat`, `id_pavilium`, `kelas`, `diagnosa`, `status`) VALUES
(7, '2021-08-19', 'valkriiiiii', '', '', '', 1, '', 'maag', 'selesai'),
(9, '2021-09-17', 'amat', '45', 'pria', 'jl.undatammm', 6, 'satu', 'maag', 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pavilium`
--

CREATE TABLE `pavilium` (
  `id` int(11) NOT NULL,
  `jenis_pavilium` varchar(100) NOT NULL,
  `nama_pavilium` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pavilium`
--

INSERT INTO `pavilium` (`id`, `jenis_pavilium`, `nama_pavilium`, `harga`) VALUES
(1, 'VIP', 'melati', '500000'),
(6, 'Satu', 'mawar', '800000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nip`, `nama`, `jabatan`, `password`, `gambar`, `level`) VALUES
(4, '5520117062', 'valkri', 'Dokter Jantung', '202cb962ac59075b964b07152d234b70', 'images_(4).jpg', 'petugas'),
(11, '5520117062', 'eiger', 'Guru Biologi', '202cb962ac59075b964b07152d234b70', '00b2361390622c652d880d3808d04cc51.jpg', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya_lab`
--
ALTER TABLE `biaya_lab`
  ADD PRIMARY KEY (`id_biaya_lab`);

--
-- Indeks untuk tabel `biaya_lainnya`
--
ALTER TABLE `biaya_lainnya`
  ADD PRIMARY KEY (`id_biaya_lainnya`);

--
-- Indeks untuk tabel `biaya_layanan`
--
ALTER TABLE `biaya_layanan`
  ADD PRIMARY KEY (`id_biaya_layanan`);

--
-- Indeks untuk tabel `biaya_pavilium`
--
ALTER TABLE `biaya_pavilium`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pelayanan`
--
ALTER TABLE `jenis_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pavilium`
--
ALTER TABLE `pavilium`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya_lab`
--
ALTER TABLE `biaya_lab`
  MODIFY `id_biaya_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `biaya_lainnya`
--
ALTER TABLE `biaya_lainnya`
  MODIFY `id_biaya_lainnya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `biaya_layanan`
--
ALTER TABLE `biaya_layanan`
  MODIFY `id_biaya_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `biaya_pavilium`
--
ALTER TABLE `biaya_pavilium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `jenis_pelayanan`
--
ALTER TABLE `jenis_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pavilium`
--
ALTER TABLE `pavilium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
