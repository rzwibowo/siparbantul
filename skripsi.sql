-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jan 2018 pada 14.55
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_admin`, `username`, `password`) VALUES
(1, 'huda', 'skripsiku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_wisata`
--

CREATE TABLE `detail_wisata` (
  `id_wisata` int(5) NOT NULL,
  `id_foto` int(5) NOT NULL,
  `id_ulasan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(5) NOT NULL,
  `id_wisata` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `id_wisata`, `nama`) VALUES
(1, 37, 'gunung2.jpg'),
(2, 38, '01/03/201803:31:29pm66715.jpg'),
(3, 39, '01/03/201803:32:39pm43336.jpg'),
(4, 40, '01.03.201803:33:35pm97174.jpg'),
(5, 41, '01.03.201803:34:05pm97975.jpg'),
(6, 42, '01.03.201803:35:09pm72806.jpg'),
(7, 43, '01.03.201803:35:49pm47000.jpg'),
(8, 44, '01.03.201803:37:26pm70357.jpg'),
(9, 60, '01032018035034pm64108.jpg'),
(10, 61, '01052018091507am29040.png'),
(11, 61, '01052018091508am93338.png'),
(12, 61, '01052018091508am35618.png'),
(13, 62, '01052018091817am80205.png'),
(14, 62, '01052018091817am25802.png'),
(15, 62, '01052018091817am31965.png'),
(16, 66, '01052018092050am58923.jpg'),
(17, 66, '01052018092050am73479.png'),
(18, 66, '01052018092051am68389.png'),
(21, 4, '01052018054153pm52650.png'),
(22, 4, '01052018054154pm26864.png'),
(23, 68, '01062018025125pm16395.jpg'),
(24, 68, '01062018025126pm12059.jpg'),
(25, 69, '01062018025210pm97828.png'),
(26, 69, '01062018025210pm69572.jpg'),
(27, 70, '01062018025251pm17673.png'),
(28, 70, '01062018025251pm68734.jpg'),
(29, 70, '01062018025251pm49768.jpg'),
(30, 71, '01062018025310pm62282.jpg'),
(31, 71, '01062018025310pm58571.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(1) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Wisata Alam Tes'),
(2, 'Wisata Pantai'),
(10, 'Desa Wisata'),
(13, 'Wisata Santai'),
(14, 'kategori 1'),
(15, 'Kategori 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_penilaian`
--

CREATE TABLE `ulasan_penilaian` (
  `id_ulasan` int(5) NOT NULL,
  `id_wisata` int(5) NOT NULL,
  `nama_pengunjung` varchar(15) NOT NULL,
  `jml_penilaian` int(2) NOT NULL,
  `ulasan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ulasan_penilaian`
--

INSERT INTO `ulasan_penilaian` (`id_ulasan`, `id_wisata`, `nama_pengunjung`, `jml_penilaian`, `ulasan`) VALUES
(1, 1, 'huda', 5, 'wah ini recomended'),
(2, 1, 'said', 2, 'kurang bersih'),
(3, 2, 'faisol', 8, 'keren');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(5) NOT NULL,
  `nama_wisata` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `deskripsi` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `alamat`, `id_kategori`, `deskripsi`, `latitude`, `longitude`) VALUES
(70, 'Test Latitude', 'Jalan R.A.Kartini No. 9, RT. 10 / RW. 4, Cilandak Barat, Cilandak, RT.10/RW.4, Cilandak Bar., Ciland', 1, '', '-6.297603', '106.767275'),
(71, 'Test Latitude', 'Jalan R.A.Kartini No. 9, RT. 10 / RW. 4, Cilandak Barat, Cilandak, RT.10/RW.4, Cilandak Bar., Ciland', 1, '', '-6.297603', '106.767275');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ulasan_penilaian`
--
ALTER TABLE `ulasan_penilaian`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ulasan_penilaian`
--
ALTER TABLE `ulasan_penilaian`
  MODIFY `id_ulasan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
