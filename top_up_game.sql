-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 01:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `top_up_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `id` int(5) NOT NULL,
  `username` varchar(40) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`id`, `username`, `psw`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `email`, `psw`) VALUES
(4, 'test', 'test', 'test@gmail.com', '$2y$10$sRxzgPeTH1POhSjejez5auhk.9tIoS2cIXYkLH5qyOv90exovcTYO');

-- --------------------------------------------------------

--
-- Table structure for table `boxcomment`
--

CREATE TABLE `boxcomment` (
  `id_comment` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `komentar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxcomment`
--

INSERT INTO `boxcomment` (`id_comment`, `nama`, `email`, `tanggal`, `komentar`) VALUES
(1, 'test', 'test@gmail.com', '2022-11-08', 'abcd'),
(2, 'coba', 'coba@gmail.com', '2022-11-07', 'efgh');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_pilihan` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id_game`, `nama`, `jenis_pilihan`, `gambar`) VALUES
(16, 'APEX Legends Mobile', 'Syndicate Gold Pack 4 (500 Gold) Rp 65.000, Syndicate Gold Pack 33 (800 Gold) Rp 99.000,\r\nSyndicate ', 'Apex.png'),
(17, 'Call of Duty Mobile', '31 CP Rp 5.000, 127 CP Rp 20.000, 320 CP Rp 50.000', 'cod.jpg'),
(18, 'Higgs Domino', '30M Koin Emas Rp 5.000, 100M Koin Emas Rp 15.000, 200M Koin Emas Rp 30.000', 'domino.jpg'),
(19, 'Free Fire', '70 Diamonds Rp 10.000, 140 Diamonds Rp 20.000, 355 Diamonds Rp 50.000', 'ff.jpg'),
(20, 'Growtopia', 'Builder Lock Rp 2.600, Bunny Lock Rp 3.600, Diamond Lock Rp 6.000,  ', 'gt.webp'),
(21, 'League of Legends', '125 Wild Cores Rp 15.000, 417 Wild Cores +7 Bonus Rp 50.000, 667 Wild Cores +67 Bonus Rp 80.000', 'lol.png'),
(22, 'Mobile Legend', '42 Diamonds Rp 12.000, 257 Diamonds Rp 65.000, 514 Diamonds Rp 140.000 ', 'ml.png'),
(23, 'PUBG Mobile', '60 UC Rp 15.000, 325 UC Rp 75.000, 660 UC Rp 150.000 ', 'pubg.jpg'),
(24, 'Sausage Man', '60 CANDIES Rp 16.000, 180 CANDIES Rp 49.000, 316 CANDIES Rp 79.000', 'sausage.jpg'),
(25, 'Valorant', '300 Points Rp 34.000, 625 Points Rp 67.000, 1125 Points Rp 167.000', 'Valorant.png');

-- --------------------------------------------------------

--
-- Table structure for table `meme`
--

CREATE TABLE `meme` (
  `id` int(11) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meme`
--

INSERT INTO `meme` (`id`, `waktu`, `nama`) VALUES
(3, '28-10-2022', 'kiki.jpg'),
(4, '28-10-2022', 'rusni.jpg'),
(5, '28-10-2022', 'leka.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(5) NOT NULL,
  `id_game` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_game` varchar(30) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `server_id` varchar(30) NOT NULL,
  `pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boxcomment`
--
ALTER TABLE `boxcomment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `meme`
--
ALTER TABLE `meme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_game` (`id_game`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin1`
--
ALTER TABLE `admin1`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boxcomment`
--
ALTER TABLE `boxcomment`
  MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `meme`
--
ALTER TABLE `meme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
