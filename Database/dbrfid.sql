-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 08:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Admin 1', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `datakartu`
--

CREATE TABLE `datakartu` (
  `id` int(5) NOT NULL,
  `idkartu` varchar(20) NOT NULL,
  `waktu` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `loker` int(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datakartu`
--

INSERT INTO `datakartu` (`id`, `idkartu`, `waktu`, `loker`, `status`) VALUES
(671, '0582C6FB2CA100', '2021-02-19 15:49:48', 1, 'DIGUNAKAN'),
(672, '0582C6FB2CA100', '2021-02-19 15:50:00', 1, 'SELESAI'),
(673, '0582C6FB2CA100', '2021-02-19 15:51:06', 1, 'DIGUNAKAN'),
(674, '0582C6FB2CA100', '2021-02-19 15:51:34', 1, 'SELESAI'),
(675, '0582C6FB2CA100', '2021-02-19 15:59:01', 1, 'DIGUNAKAN'),
(676, '0582C6FB2CA100', '2021-02-19 16:03:39', 1, 'DIGUNAKAN'),
(677, '0582C6FB2CA100', '2021-02-19 16:09:49', 1, 'DIGUNAKAN'),
(678, '0582C6FB2CA100', '2021-02-19 16:13:24', 1, 'DIGUNAKAN'),
(679, '0582C6FB2CA100', '2021-02-19 16:13:39', 1, 'DIGUNAKAN'),
(680, '0582C6FB2CA100', '2021-02-19 16:22:21', 1, 'DIGUNAKAN'),
(681, '0582C6FB2CA100', '2021-02-19 16:23:08', 1, 'SELESAI'),
(682, '0582C6FB2CA100', '2021-02-19 16:24:58', 1, 'DIGUNAKAN'),
(683, '0582C6FB2CA100', '2021-02-19 16:26:06', 1, 'SELESAI'),
(684, '0582C6FB2CA100', '2021-02-19 16:28:28', 1, 'DIGUNAKAN'),
(685, '0582C6FB2CA100', '2021-02-19 17:55:23', 1, 'SELESAI'),
(686, '0582C6FB2CA100', '2021-02-19 19:26:32', 1, 'DIGUNAKAN'),
(687, '0582C6FB2CA100', '2021-02-19 19:31:46', 1, 'DIGUNAKAN'),
(688, '0582C6FB2CA100', '2021-02-19 19:41:30', 1, 'DIGUNAKAN'),
(689, '0582C6FB2CA100', '2021-02-19 19:41:53', 1, 'SELESAI'),
(690, '0582C6FB2CA100', '2021-02-19 19:42:16', 1, 'DIGUNAKAN'),
(691, '0582C6FB2CA100', '2021-02-19 19:42:38', 1, 'DIGUNAKAN'),
(692, '0582C6FB2CA100', '2021-02-19 19:43:50', 1, 'SELESAI'),
(693, '0582C6FB2CA100', '2021-02-19 19:47:04', 1, 'DIGUNAKAN'),
(694, '0582C6FB2CA100', '2021-02-19 19:53:13', 1, 'DIGUNAKAN'),
(695, '0582C6FB2CA100', '2021-02-19 19:54:01', 1, 'SELESAI'),
(696, '0582C6FB2CA100', '2021-02-19 20:11:14', 1, 'DIGUNAKAN'),
(697, '0582C6FB2CA100', '2021-02-19 20:11:32', 1, 'SELESAI'),
(698, '0582C6FB2CA100', '2021-02-19 20:17:34', 1, 'DIGUNAKAN'),
(699, '0582C6FB2CA100', '2021-02-19 20:18:37', 1, 'SELESAI'),
(700, '0582C6FB2CA100', '2021-02-19 20:19:52', 1, 'DIGUNAKAN'),
(701, '047257FA1F6A80', '2021-02-21 08:10:33', 1, 'DIGUNAKAN'),
(702, '047257FA1F6A80', '2021-02-21 08:11:23', 1, 'SELESAI'),
(703, '0582C6FB2CA100', '2021-02-21 08:12:10', 1, 'DIGUNAKAN'),
(704, '047257FA1F6A80', '2021-02-21 08:22:34', 1, 'DIGUNAKAN'),
(705, '047257FA1F6A80', '2021-02-21 08:23:12', 1, 'SELESAI'),
(706, '047257FA1F6A80', '2021-02-21 08:25:40', 1, 'DIGUNAKAN'),
(707, '047257FA1F6A80', '2021-02-21 09:22:08', 1, 'SELESAI'),
(708, '0582C6FB2CA100', '2021-02-21 09:27:33', 1, 'DIGUNAKAN'),
(709, '0582C6FB2CA100', '2021-02-21 09:46:25', 1, 'DIGUNAKAN'),
(710, '0582C6FB2CA100', '2021-02-21 09:46:34', 1, 'SELESAI'),
(711, '0582C6FB2CA100', '2021-02-21 09:57:16', 1, 'DIGUNAKAN'),
(712, '047257FA1F6A80', '2021-02-21 13:10:30', 1, 'DIGUNAKAN'),
(713, '047257FA1F6A80', '2021-02-21 16:42:26', 1, 'DIGUNAKAN'),
(714, '047257FA1F6A80', '2021-02-21 16:43:11', 1, 'SELESAI'),
(715, '0582C6FB2CA100', '2021-02-21 16:44:24', 1, 'DIGUNAKAN'),
(716, '0582C6FB2CA100', '2021-02-21 16:48:14', 1, 'DIGUNAKAN'),
(717, '0582C6FB2CA100', '2021-02-21 16:48:25', 1, 'SELESAI'),
(718, '898F0AB3', '2021-02-23 03:41:56', 1, 'DIGUNAKAN'),
(719, '047257FA1F6A80', '2021-02-26 04:20:02', 2, 'DIGUNAKAN'),
(720, '047257FA1F6A80', '2021-02-26 04:20:42', 2, 'SELESAI'),
(721, '0582C6FB2CA100', '2021-02-26 04:30:29', 1, 'DIGUNAKAN'),
(722, '0582C6FB2CA100', '2021-02-26 04:33:38', 1, 'SELESAI'),
(723, '047257FA1F6A80', '2021-02-26 04:33:55', 1, 'DIGUNAKAN'),
(724, '047257FA1F6A80', '2021-02-26 04:35:10', 1, 'SELESAI'),
(725, '047257FA1F6A80', '2021-02-26 04:42:37', 1, 'DIGUNAKAN'),
(726, '047257FA1F6A80', '2021-02-26 04:43:06', 1, 'SELESAI'),
(727, '047257FA1F6A80', '2021-02-26 04:48:23', 1, 'DIGUNAKAN'),
(728, '047257FA1F6A80', '2021-02-26 04:48:37', 1, 'SELESAI'),
(729, '047257FA1F6A80', '2021-02-26 04:50:53', 1, 'DIGUNAKAN'),
(730, '047257FA1F6A80', '2021-02-26 04:50:55', 1, 'DIGUNAKAN'),
(731, '0582C6FB2CA100', '2021-02-26 04:51:49', 2, 'DIGUNAKAN'),
(732, '047257FA1F6A80', '2021-02-26 04:52:04', 1, 'SELESAI'),
(733, '0582C6FB2CA100', '2021-02-26 04:53:11', 2, 'SELESAI'),
(734, '047257FA1F6A80', '2021-02-26 04:53:17', 1, 'DIGUNAKAN'),
(735, '047257FA1F6A80', '2021-02-26 04:53:50', 1, 'SELESAI'),
(736, '047257FA1F6A80', '2021-02-26 04:54:04', 1, 'DIGUNAKAN'),
(737, '047257FA1F6A80', '2021-02-26 04:54:15', 1, 'SELESAI'),
(738, '047257FA1F6A80', '2021-02-26 04:54:21', 1, 'SELESAI'),
(739, '047257FA1F6A80', '2021-02-26 04:54:37', 1, 'SELESAI'),
(740, '047257FA1F6A80', '2021-02-26 04:55:42', 2, 'DIGUNAKAN'),
(741, '047257FA1F6A80', '2021-02-26 04:56:17', 2, 'SELESAI'),
(742, '0582C6FB2CA100', '2021-02-26 08:07:52', 1, 'DIGUNAKAN'),
(743, '0582C6FB2CA100', '2021-02-26 08:08:12', 1, 'SELESAI'),
(744, '047257FA1F6A80', '2021-02-26 08:13:50', 1, 'DIGUNAKAN'),
(745, '047257FA1F6A80', '2021-02-26 08:14:55', 1, 'SELESAI'),
(746, '0582C6FB2CA100', '2021-02-26 08:15:16', 1, 'DIGUNAKAN');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `loker` int(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`loker`, `status`) VALUES
(1, 'TERTUTUP'),
(2, 'TERBUKA'),
(3, '-'),
(4, '-'),
(5, '-');

-- --------------------------------------------------------

--
-- Table structure for table `loker1`
--

CREATE TABLE `loker1` (
  `chip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loker1`
--

INSERT INTO `loker1` (`chip`) VALUES
('0582C6FB2CA100');

-- --------------------------------------------------------

--
-- Table structure for table `loker2`
--

CREATE TABLE `loker2` (
  `chip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(150) NOT NULL,
  `u_gender` varchar(10) NOT NULL,
  `id_tag` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_gender`, `id_tag`, `no_hp`) VALUES
(22, 'Asril Rinaldi', 'asrilrinaldi@gmail.com', 'Laki-laki', '0582C6FB2CA100', '082230631756'),
(23, 'Kartu Perpus 1', 'perpus1@gmail.com', 'Laki-laki', 'E3184003', '123'),
(24, 'Muhammad', 'muhammad@gmail.com', 'Laki-laki', '898F0AB3', '123'),
(25, 'Putri', 'putri@gmail.com', 'Perempuan', '5ACC6F81', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datakartu`
--
ALTER TABLE `datakartu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loker1`
--
ALTER TABLE `loker1`
  ADD PRIMARY KEY (`chip`);

--
-- Indexes for table `loker2`
--
ALTER TABLE `loker2`
  ADD PRIMARY KEY (`chip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datakartu`
--
ALTER TABLE `datakartu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=747;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
