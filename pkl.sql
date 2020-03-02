-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2020 pada 16.44
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'super_admin'),
(2, 'user_sm'),
(3, 'user_sk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_admin`
--

CREATE TABLE `super_admin` (
  `NIP` char(50) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `super_admin`
--

INSERT INTO `super_admin` (`NIP`, `nama_pegawai`, `username_admin`, `password_admin`, `id_status`) VALUES
('12345678', 'seli', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `no_regrisKeluar` int(11) NOT NULL,
  `no_suratKeluar` varchar(50) NOT NULL,
  `tgl_suratKeluar` date NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `bidang_mengajukan` varchar(50) NOT NULL,
  `file_suratKeluar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suratkeluar`
--

INSERT INTO `suratkeluar` (`no_regrisKeluar`, `no_suratKeluar`, `tgl_suratKeluar`, `kepada`, `perihal`, `bidang_mengajukan`, `file_suratKeluar`) VALUES
(1, '0000999', '2020-02-06', 'SEKRETARIAT DAERAH', 'yuyu', 'Bidang Pelayanan Perizinan', 'Bab - 13-URL.pdf'),
(5, '123ifhgd', '2020-02-07', 'jygnjhk', 'uuuu krja woy', 'Sekertaris', '029638400_1560922711-surat_edaran_sekolah_viral2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `no_regrisMasuk` int(11) NOT NULL,
  `no_suratMasuk` char(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `alamat_pengirim` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `isi_disposisi` varchar(150) NOT NULL,
  `penerima_surat` varchar(100) NOT NULL,
  `file_surat` varchar(300) NOT NULL,
  `file_disposisi` varchar(300) NOT NULL,
  `diteruskan_kepada` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suratmasuk`
--

INSERT INTO `suratmasuk` (`no_regrisMasuk`, `no_suratMasuk`, `tgl_masuk`, `alamat_pengirim`, `tgl_surat`, `perihal`, `isi_disposisi`, `penerima_surat`, `file_surat`, `file_disposisi`, `diteruskan_kepada`) VALUES
(1, '', '0000-00-00', '', '0000-00-00', '', 'jjolll', 'k', 'suratdinas.png', 'suratdinas.png', 'Choose...'),
(2, '', '0000-00-00', '', '0000-00-00', '', '', '', 'Bab - 13-URL.pdf', 'Bab - 13-URL.pdf', 'Choose...'),
(4, '99', '2020-02-06', 'hhh', '2020-02-07', 'jjj', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sk`
--

CREATE TABLE `user_sk` (
  `NIP` char(50) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `username_usersk` varchar(50) NOT NULL,
  `password_usersk` varchar(50) NOT NULL,
  `id_status` int(11) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sk`
--

INSERT INTO `user_sk` (`NIP`, `nama_pegawai`, `username_usersk`, `password_usersk`, `id_status`, `no_hp`, `alamat`) VALUES
('12345678', 'hanai', 'admin sk', 'adminsk', 3, '099', 'ss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sm`
--

CREATE TABLE `user_sm` (
  `NIP` char(50) NOT NULL,
  `nama_pegawai` char(200) NOT NULL,
  `username_usersm` varchar(50) NOT NULL,
  `password_usersm` varchar(50) NOT NULL,
  `id_status` int(11) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sm`
--

INSERT INTO `user_sm` (`NIP`, `nama_pegawai`, `username_usersm`, `password_usersm`, `id_status`, `no_hp`, `alamat`) VALUES
('12345678', 'hani', 'admin sm', 'adminsm', 2, '6778', 'ss');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`NIP`);

--
-- Indeks untuk tabel `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`no_regrisKeluar`);

--
-- Indeks untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`no_regrisMasuk`);

--
-- Indeks untuk tabel `user_sk`
--
ALTER TABLE `user_sk`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `user_sm`
--
ALTER TABLE `user_sm`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id_status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
