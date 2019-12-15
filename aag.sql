-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 10:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aag`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_ca` int(200) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_ca`, `nama_cabang`) VALUES
(1, 'Jakarta'),
(2, 'Bandung'),
(3, 'Tanggerang'),
(4, 'Bogor'),
(5, 'Karawang'),
(6, 'Semarang'),
(7, 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pe` int(200) NOT NULL,
  `id_user` int(200) NOT NULL,
  `id_kerjasama` int(200) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `no_kontrak` varchar(100) NOT NULL,
  `nama_pic` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_pt` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_cabang` int(200) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `alamat_npwp` text NOT NULL,
  `nama_npwp` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `alamat_penagihan` text NOT NULL,
  `id_pekerjaan` int(200) NOT NULL,
  `jenis_kunjungan` enum('visit','standby','','') NOT NULL,
  `ket_kunjungan` varchar(30) NOT NULL,
  `periode_kontrak` varchar(300) NOT NULL,
  `awal_kontrak` date NOT NULL,
  `akhir_kontrak` date NOT NULL,
  `nilai_kontrak` varchar(200) NOT NULL,
  `id_sumber` int(200) NOT NULL,
  `terminate` int(1) NOT NULL,
  `increase` varchar(200) DEFAULT NULL,
  `decrease` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_pe`, `id_user`, `id_kerjasama`, `id_pelanggan`, `no_kontrak`, `nama_pic`, `name`, `name_pt`, `phone`, `email`, `id_cabang`, `npwp`, `alamat_npwp`, `nama_npwp`, `alamat`, `alamat_penagihan`, `id_pekerjaan`, `jenis_kunjungan`, `ket_kunjungan`, `periode_kontrak`, `awal_kontrak`, `akhir_kontrak`, `nilai_kontrak`, `id_sumber`, `terminate`, `increase`, `decrease`) VALUES
(1, 1, 1, 'AAG/01', 'AAG/01/2019', 'Alex', 'hotel pancoran', 'PT.pancoran abadi', '023232244', 'aaaa@gmail.com', 5, '778933112341', '', '', 'jl.tebet raya', 'jl.tebet raya', 1, 'visit', '2 man power', '6', '2019-07-01', '2019-12-30', '2500000', 1, 0, '', ''),
(2, 1, 1, '12324334', 'aag/022', 'alex', 'kfc', 'pt.ayam enak', '034234324', 'nutech@admin.com', 2, '73538393', 'jl.kramat jati', 'alex', 'jl.tebet raya', 'jl.jatinegara', 3, 'visit', '5', '6', '2019-07-01', '2019-12-30', '3000000', 2, 1, '2000000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kerjasama`
--

CREATE TABLE `jenis_kerjasama` (
  `id_ks` int(200) NOT NULL,
  `nama_kerja` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kerjasama`
--

INSERT INTO `jenis_kerjasama` (`id_ks`, `nama_kerja`) VALUES
(1, 'kontrak'),
(2, 'job');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id_peker` int(200) NOT NULL,
  `nama_pekerjaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id_peker`, `nama_pekerjaan`) VALUES
(1, 'PC'),
(2, 'RC'),
(3, 'PCRC'),
(4, 'TC'),
(5, 'FC'),
(6, 'FC Rent'),
(7, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `id_kontrak` int(200) NOT NULL,
  `id_pelanggan` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price_decrease`
--

CREATE TABLE `price_decrease` (
  `id_decrease` int(200) NOT NULL,
  `id_pelanggan` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price_increase`
--

CREATE TABLE `price_increase` (
  `id_increase` int(200) NOT NULL,
  `id_pelanggan` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id_sum` int(200) NOT NULL,
  `nama_sumber` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`id_sum`, `nama_sumber`) VALUES
(1, 'Inquiries'),
(2, 'Organic'),
(3, 'Corporate');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `id_cabang` int(200) NOT NULL COMMENT '1:jkt, 2:bdg, 3:tngr, 4:bgr,5:krwng, 6:smg, 7:sby',
  `name_user` varchar(200) NOT NULL,
  `gender` enum('male','female','','') DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `p_type` varchar(6) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int(1) DEFAULT NULL COMMENT '0:Admin, 1:Sales, 2:Service, 3:Hr, 4:Qa, 5:FA',
  `date_created` date NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_cabang`, `name_user`, `gender`, `email`, `phone`, `photo`, `p_type`, `password`, `level`, `date_created`, `status`) VALUES
(1, 1, 'Super Admin', 'male', 'super@admin.com', '083815634560', 'default', '.jpg', '$2y$10$UN4vuMldLT80BWNbXJIbOu9v8JuiOyosJYoRvPJT2bwAFcyYxVBlm', 0, '2019-12-09', 'aktif'),
(2, 1, 'Sales1', 'male', 'sales@gmail.com', '02177889', 'default', '.jpg', '$2y$10$qmE79YNlPyxoYJVVlik1auwCp0FwotyMvWzMEDPsBDC8/2BCRr4me', 1, '2019-12-10', 'aktif'),
(3, 1, 'sales2', 'female', 'sales2@gmail.com', '0127721', 'default', '.jpg', 'ed2b1f468c5f915f3f1cf75d7068baae', 1, '2019-12-10', 'aktif'),
(5, 7, 'aaaaaaa', 'female', 'fasdj55shj@gmail.com', '3434343', 'default', '.jpg', '12341234', 1, '2019-12-11', 'nonaktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_ca`);

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_pe`);

--
-- Indexes for table `jenis_kerjasama`
--
ALTER TABLE `jenis_kerjasama`
  ADD PRIMARY KEY (`id_ks`);

--
-- Indexes for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id_peker`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indexes for table `price_decrease`
--
ALTER TABLE `price_decrease`
  ADD PRIMARY KEY (`id_decrease`);

--
-- Indexes for table `price_increase`
--
ALTER TABLE `price_increase`
  ADD PRIMARY KEY (`id_increase`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sum`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_ca` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id_pe` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_kerjasama`
--
ALTER TABLE `jenis_kerjasama`
  MODIFY `id_ks` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id_peker` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_decrease`
--
ALTER TABLE `price_decrease`
  MODIFY `id_decrease` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_increase`
--
ALTER TABLE `price_increase`
  MODIFY `id_increase` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sum` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
