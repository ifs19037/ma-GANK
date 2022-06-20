-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 06:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_prama`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nik_akun` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nik_karyawan` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nik_akun`, `password`, `nik_karyawan`, `level`, `created_at`, `updated_at`) VALUES
(11111, 'admin', 0, 1, '2022-06-20 01:28:57', '2022-06-20 01:28:57'),
(930034, '930034', 930034, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26'),
(950123, '950123', 950123, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26'),
(950369, '950369', 950369, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26'),
(950370, '950370', 950370, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26'),
(950387, '950387', 950387, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26'),
(950417, '950417', 950417, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26'),
(950487, '950487', 950487, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26'),
(950521, '950521', 950521, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26'),
(950540, '950540', 950540, 2, '2022-06-19 18:39:26', '2022-06-19 18:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `nama_karyawan` varchar(50) NOT NULL,
  `nik_karyawan` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` bigint(20) NOT NULL,
  `alamat_ktp` varchar(150) NOT NULL,
  `foto_karyawan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`nama_karyawan`, `nik_karyawan`, `jenis_kelamin`, `jabatan`, `divisi`, `lokasi`, `tanggal_lahir`, `tanggal_masuk`, `email`, `no_telepon`, `alamat_ktp`, `foto_karyawan`, `created_at`, `updated_at`) VALUES
('AI YULIA', 930034, 'PEREMPUAN', 'BUYER', 'PEMASARAN', 'BORMA GEMPOL', '1993-03-04', '1993-03-04', 'yuliahafidzulhaq@gmail.com ', 85721206662, 'JL.SOEKARNO HATTA GG.H KOSIM NO. 80/83', 'user.png', '2022-06-19 18:39:14', '2022-06-20 02:18:31'),
('ADI SURYADI', 950123, 'LAKI LAKI', 'TEKNISI', 'SUPPROTING', 'BORMA GEMPOL', '1998-10-18', '2018-02-18', 'adisur1997@gmail.com', 89695310921, 'PERUM BUMI SIMPANG ASRI BLOK R 20 RT 03 RW 07 KEC BAYONGBONG GARUT', 'user.png', '2022-06-19 18:39:14', '2022-06-19 18:39:14'),
('ADE LUFI', 950369, 'LAKI LAKI', 'ADMIN RETUR', 'GUDANG', 'PRAMA GEMPOL', '1996-12-19', '2020-07-01', 'lufiade115@gmail.com', 81223251778, 'KP MELONG NYONTROL RT 04 RW 03 KEL MELONG KEC CIMAHI SELATAN', 'user.png', '2022-06-19 18:39:14', '2022-06-19 18:39:14'),
('AMANDA SULISTIANI', 950370, 'PEREMPUAN', 'KASIR', 'FRONT END', 'PRAMA GEMPOL', '2002-11-05', '2020-07-01', 'amandasulistiani711@gmail.com', 8382128456, 'KOMP PERMANA INDAH RT 05 RW 13 KEL CITEUREUP KEC CIMAHI UTARA', 'user.png', '2022-06-19 18:39:14', '2022-06-19 18:39:14'),
('ADRIAN ERLANGGA SAPUTRA', 950387, 'LAKI LAKI', 'LABELLING', 'GUDANG', 'BORMA GEMPOL', '2002-08-24', '2020-10-16', 'adryanerlangga19@gmail.com', 85798643091, 'KP JATI RT 05 RW 01 KEL NANJUNG KEC MARGAASIH', 'user.png', '2022-06-19 18:39:14', '2022-06-19 18:39:14'),
('ADITIA NURDIANA', 950417, 'PEREMPUAN', 'PRAMUNIAGA', 'FOOD', 'PRAMA GEMPOL', '2000-06-23', '2021-04-25', 'aditanurdiana106@gmail.com', 85603002039, 'KP CIJENGKOL RT 05 RW 03 KEL MUKAPAYUNG KEC CILILIN', 'user.png', '2022-06-19 18:39:14', '2022-06-19 18:39:14'),
('AGUS MUJIANTO', 950487, 'LAKI LAKI', 'PRAMUNIAGA', 'FRONT END', 'PRAMA GEMPOL', '1993-05-04', '2021-09-20', 'agusmujin@gmail.com', 85717422910, 'KP PASIRWARINGIN RT 01 RW 01 KEL WANASARI KEC AGRABINTA', 'user.png', '2022-06-19 18:39:14', '2022-06-19 18:39:14'),
('AFIANI SAFITRI', 950521, 'PEREMPUAN', 'KASIR', 'FRONT END', 'PRAMA GEMPOL', '2000-03-17', '2021-12-27', 'afianisafitri78@gmail.com', 83804237009, 'JL. TERUSAN PASIRKOJA  RT 005 RW 010 KEC. BOJONGLOA KALER', 'user.png', '2022-06-19 18:39:14', '2022-06-19 18:39:14'),
('AAN RIANO', 950540, 'LAKI LAKI', 'PRAMUNIAGA', 'BAZAAR', 'BORMA GEMPOL', '1999-09-20', '2022-03-10', 'jrjjj@gmail.com', 8216342297, 'JL PASANTREN RT 01 RW 07 CIBABAT', 'user.png', '2022-06-19 18:39:14', '2022-06-19 18:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Kasir'),
(2, 'Pemasaran'),
(3, 'Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` int(11) NOT NULL,
  `judu_kuis` varchar(150) NOT NULL,
  `keterangan_singkat` varchar(250) NOT NULL,
  `foto_kuis` varchar(100) NOT NULL,
  `tanggal_kuis` date NOT NULL,
  `durasi_pengerjaan` int(11) NOT NULL,
  `divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul_materi` varchar(150) NOT NULL,
  `keterangan_singkat` varchar(250) NOT NULL,
  `foto_materi` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `kode_link_video` varchar(100) NOT NULL,
  `isi_materi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul_materi`, `keterangan_singkat`, `foto_materi`, `divisi`, `kode_link_video`, `isi_materi`) VALUES
(1, 'Pemasaran', 'Penjelasan engenai materi pemasaran', 'empty.png', 'Pemasaran', 'UJNQQ3XKszU', 'Pengertian Pemasaran. Definisi marketing atau pemasaran adalah kegiatan yang dilakukan oleh perusahaan untuk mempromosikan suatu produk atau layanan yang mereka punya. Pemasaran ini mencakup pengiklanan, penjualan, dan pengiriman produk ke konsumen atau perusahaan lain.\r\n\r\nDalam melakukan promosi, mereka akan menargetkan orang-orang yang sesuai dengan produk yang dipasarkan. Biasanya mereka juga melibatkan selebriti, selebgram atau siapapun yang memiliki kepopuleran untuk mendongkrak produk tersebut. Tak hanya itu, dalam pemasaran, bagian yang memiliki tugas ini akan membuat kemasan atau desain yang menarik pada iklan sehingga akan banyak orang yang tertarik.\r\n\r\nSelain itu, dengan adanya pemasaran juga sangat membantu para konsumen. Jadi mereka akan lebih mudah menemukan produk yang sesuai dengan apa yang mereka butuhkan. Ketika pemasaran sesuai dengan targetnya, perusahaan akan mendapatkan banyak pembeli dan kefuntungan bisa didapatkan.\r\n\r\nFungsi Pemasaran\r\n1. Pengenalan Produk\r\nPengenalan menjadi fungsi utama dari sebuah pemasaran yang dilakukan oleh perusahaan. Dengan adanya pemasaran, produk akan lebih mudah dikenal oleh pelanggan. Pemasar harus menonjolkan keunggulan dari produk yang di pasarkan. Sehingga bisa lebih menarik perhatian dibanding produk pesaing.\r\n\r\n2. Riset\r\nRiset memungkinkan pemasaruntuk mendapatkan informasi yang tepat mengenai pasar target sebuah produk. Beberapa hal yang biasanya harus diriset adalah kepopuleran, usia, jenis kelamin kebutuhan hingga keinginan dan lain sebagainya. Nantinya produk yang diproduksi bisa disesuaikan dengan apa yang sesuai dengan target pasarnya.\r\n\r\n3. Distribusi\r\nDengan distribusi yang baik, akan memastikan bahwa produk dapat mudah dipindahkan dari lokasi produksi ke pasar luas menggunakan jalur darat, air dan laut. Selain itu juga memastikan bahwa produk dapat dengan mudah didapatkan oleh pelanggan. Sebagai pemasar juga harus merencanakan segala sesuatunya seperti armada, keuangan dalam proses distribusi.\r\n\r\n4. Layanan Purnajual\r\nDalam sebuah penjualan, layanan setelah penjualan memang sangat dibutuhkan. Pemasar harus membantu pelanggan setelah mereka membeli produk. Misalnya seperti produk mesin, pelanggan mungkin akan merasa kesulitan ketika menemukan masalah pada mesin yang telah mereka beli. Tugas pemasar, memastikan dan membantu agar mesin itu berjalan dengan semestinya.\r\n\r\nJenis-Jenis Pemasaran\r\nBranding\r\nProduk dan layanan harus memiliki target pasar, dan nama atau “merek,” untuk dikenal. Branding adalah bentuk pemasaran yang memiliki fungsi sebagai iklan jangka panjang. Ini sangat membantu untuk membuat produk atau layanan menjadi lebih menarik dan terkenal. Branding sering kali menyertakan nama, slogan, dan logo.\r\n\r\nIklan Siaran\r\nMenggunakan radio sebagai media pemasaran adalah salah satu bentuk iklan berbayar yang paling umum. Pemasaran ke pelanggan sangat potensial ketika menggunakan radio karena pendengar radio benar-benar mendengarkan apa yang diucapkan oleh penyiarnya. Selain itu, juga bisa menggunakan media TV untuk menjangkau pelanggan secara luas.\r\n\r\nMulti-Level Marketing\r\nPemasaran dengan menggunakan multi-level marketing adalah bentuk penjualan langsung yang melibatkan banyak orang di mana perusahaan merekrut dan menjual produk-produknya. Multi-level marketing juga disebut network marketing karena tenaga penjualan mendapatkan komisi dari produk yang mereka jual serta komisi penjualan dari jaringannya.\r\n\r\nInternet Atau Online\r\nInternet menjadi salah satu media pemasaran yang paling diminati. Hampir semua orang pasti menggunakan internet, sehingga pasarnya sangat luas. Pemasaran dapat dilakukan dalam berbagai cara seperti menggunaan email, website atau iklan. Target pasarnya juga bisa ditentukan karena banyak penyedia jasa iklan yang memiliki fitur ini.\r\nAnda bisa juga membaca perbedaan antara penjualan dan pemasaran secara lengkap dengan membacanya melalui artikel ini.\r\n\r\nKesimpulan\r\nPemasaran merupakan hal yang penting dalam sebiah bisnis, semakin baik strategi marketing pada bisnis Anda, semakin cepat bisnis Anda berkembang. Namun jangan lupakan tentang pembukuan, karena pembukuan adalah salah satu komponen penting dalam berjalannya sebuah bisnis.\r\nJika strategi marketing Anda bagus tanpa dibarengi pembukuan yang terstruktur maka bisnis Anda akan berantakan. Untuk melakukan proses pembukuan yang baik dibutuhkan pencatatan transaksi yang teratur agar menghasilkan laporan keuangan yang bisa dipertanggungjawabkan.');

-- --------------------------------------------------------

--
-- Table structure for table `sop`
--

CREATE TABLE `sop` (
  `id_sop` int(11) NOT NULL,
  `judul_sop` varchar(150) NOT NULL,
  `keterangan_singkat` varchar(250) NOT NULL,
  `foto_sop` varchar(100) NOT NULL,
  `file_sop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`nik_akun`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`nik_karyawan`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `sop`
--
ALTER TABLE `sop`
  ADD PRIMARY KEY (`id_sop`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sop`
--
ALTER TABLE `sop`
  MODIFY `id_sop` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
