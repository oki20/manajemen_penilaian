-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 02 Apr 2023 pada 04.57
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`id_kategori`, `kategori_kelas`) VALUES
(1, 'TITL-1'),
(2, 'TITL-2'),
(3, 'TITL-3'),
(6, 'TKJ-1'),
(7, 'TPL-1'),
(8, 'TKJ-2'),
(9, 'TKR-1'),
(10, 'TEM-1'),
(11, 'TEL-1'),
(12, 'TEL-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkatan_kelas` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `tingkatan_kelas`) VALUES
(1, 10),
(2, 11),
(3, 12),
(4, 8),
(7, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_mapel`
--

CREATE TABLE `tabel_mapel` (
  `id_mapel` int(13) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `tingkatan_kelas` int(10) NOT NULL,
  `kategori_kelas` varchar(25) NOT NULL,
  `pengajar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_mapel`
--

INSERT INTO `tabel_mapel` (`id_mapel`, `mata_pelajaran`, `tingkatan_kelas`, `kategori_kelas`, `pengajar`) VALUES
(2, 'PENJASKES', 12, 'TEM-1', 'kunto aji'),
(4, 'FISIKA', 11, 'TITL-3', 'ELTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis_siswa` int(15) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tingkatan_kelas` int(13) NOT NULL,
  `kategori_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`id_siswa`, `nis_siswa`, `nama_siswa`, `jenis_kelamin`, `tingkatan_kelas`, `kategori_kelas`) VALUES
(56, 1702059, 'Yudi', 'laki-laki', 12, 'TKJ-1'),
(57, 1702060, 'Latifah Rahma', 'laki-laki', 12, 'TKJ-1'),
(58, 123456, 'Jono', 'laki-laki', 10, 'TITL-1'),
(59, 8765432, 'Jojon', 'laki-laki', 11, 'TPL-1'),
(61, 2332332, 'JONGKKO', 'laki-laki', 12, 'TPL-1'),
(62, 2344321, 'MARIKA', 'perempuan', 12, 'TEL-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kelamin_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelas_jabatan_user` varchar(20) NOT NULL,
  `nis_nip_user` int(10) NOT NULL,
  `nomor_wa_user` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role_user`, `nama_user`, `jenis_kelamin_user`, `kelas_jabatan_user`, `nis_nip_user`, `nomor_wa_user`) VALUES
(1, 'admin', '12345', 'admin', 'admin', 'Laki-Laki', 'TU', 1702392, 912345678),
(10, 'guru', '12345', 'guru', 'kunto aji', 'Laki-Laki', 'PENJASKES', 220423, 121221),
(11, 'yudimld', '12345', 'siswa', 'yudi', 'Laki-Laki', '12', 1702059, 2147483647),
(13, 'ELTA JANUARI', '12345', 'guru', 'ELTA', 'perempuan', 'FISIKA', 1293826, 835263232),
(15, 'marinus', '12345', 'guru', 'marinus manewar', 'laki-laki', 'PENJASKES', 1702332, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  MODIFY `id_mapel` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
