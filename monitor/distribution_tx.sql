-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 07:52 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distribution_tx`
--

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id_no` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `service_area` varchar(35) NOT NULL,
  `psw` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id_no`, `name`, `contact`, `service_area`, `psw`) VALUES
('mwangi', 'Mwangi Charles Nganga', '', 'bwaise-kawempe', '12345678'),
('simon', 'Kimbugwe Simon Peter', '0752332136', 'makerere', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `Tx_id` varchar(45) NOT NULL,
  `Voltage` float NOT NULL,
  `Current1` float NOT NULL,
  `Current2` float NOT NULL,
  `Temperature` float NOT NULL,
  `Time_received` datetime NOT NULL,
  `record_id` mediumint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`Tx_id`, `Voltage`, `Current1`, `Current2`, `Temperature`, `Time_received`, `record_id`) VALUES
('TX1', 12, 0.27, 0, 59.08, '2018-05-01 05:38:08', 4),
('TX1', 12, 0.27, 0, 59.08, '2018-05-02 05:38:38', 5),
('TX1', 12, 0.27, 0, 59.08, '2018-05-02 05:39:08', 6),
('TX1', 12, 0.27, 0, 58.59, '2018-05-02 05:39:39', 7),
('TX1', 12, 0.26, 0, 59.08, '2018-05-02 05:40:11', 8),
('TX1', 12, 0.27, 0, 58.59, '2018-05-02 05:40:39', 9),
('TX1', 12, 0.84, 0.84, 59.08, '2018-05-02 05:40:53', 10),
('TX1', 12, 2.05, 2.05, 59.08, '2018-05-02 05:40:59', 11),
('TX1', 12, 2.07, 2.07, 58.59, '2018-05-02 05:41:06', 12),
('TX1', 12, 2.06, 2.06, 59.08, '2018-05-01 05:43:58', 13),
('TX1', 12, 2.35, 2.35, 59.08, '2018-05-02 05:44:04', 14),
('TX1', 12, 2.36, 2.36, 58.59, '2018-05-02 05:44:11', 15),
('TX1', 12, 0.27, 0, 40.67, '2018-05-03 11:01:31', 16),
('TX1', 12, 2.07, 2.07, 40.67, '2018-05-03 11:01:49', 17),
('TX1', 12, 0.28, 0, 40.33, '2018-05-03 11:02:31', 18),
('TX1', 12, 7.71, 7.71, 48.88, '2018-05-03 11:02:49', 19),
('TX1', 12, 0.24, 0, 48.88, '2018-05-03 11:03:49', 20),
('TX1', 12, 2.15, 2.15, 54.35, '2018-05-03 11:05:01', 21),
('TX1', 12, 0.21, 0, 48.88, '2018-05-03 11:04:51', 22),
('TX1', 12, 0.26, 0, 48.54, '2018-05-03 11:05:49', 23),
('TX1', 12, 0.21, 0, 48.54, '2018-05-03 11:06:49', 24),
('TX1', 12, 0.26, 0, 48.88, '2018-05-03 11:07:49', 25),
('TX1', 12, 4.22, 4.22, 48.54, '2018-05-03 11:08:06', 26),
('TX1', 12, 0.22, 0, 48.54, '2018-05-03 11:08:50', 27),
('TX1', 12, 0.2, 0, 48.54, '2018-05-03 11:09:50', 28),
('TX1', 12, 2.24, 2.24, 48.54, '2018-05-03 11:09:57', 29),
('TX1', 12, 5.47, 5.47, 48.54, '2018-05-03 11:10:24', 30),
('TX1', 12, 2.12, 2.12, 48.54, '2018-05-03 11:10:36', 31),
('TX1', 12, 7.7, 7.7, 48.54, '2018-05-03 11:11:15', 32),
('TX1', 12, 2.08, 2.08, 48.54, '2018-05-03 11:11:29', 33),
('TX1', 12, 2.1, 2.1, 48.54, '2018-05-03 11:12:00', 34),
('TX1', 12, 7.76, 7.76, 49.22, '2018-05-03 12:13:13', 35),
('TX1', 12, 0.22, 0, 48.54, '2018-05-03 12:16:04', 36),
('TX1', 12, 0.69, 0, 39.65, '2018-05-03 12:24:44', 37),
('TX1', 12, 0.69, 0, 39.65, '2018-05-03 12:25:24', 38),
('TX1', 12, 0.69, 0, 39.99, '2018-05-03 12:28:48', 39),
('TX1', 12, 0.7, 0, 39.65, '2018-05-03 12:29:26', 40),
('TX1', 12, 0.26, 0, 39.65, '2018-05-03 12:30:05', 41),
('TX1', 12, 1.5, 0, 28, '2018-05-11 03:06:23', 42),
('TX1', 12, 1.5, 0, 28, '2018-05-11 03:06:23', 43),
('TX1', 12, 1.5, 0, 28, '2018-05-11 03:06:23', 44),
('TX2', 12, 3, 4, 23, '2018-05-12 07:38:20', 45),
('TX2', 12, 3, 4, 23, '2018-05-12 07:38:20', 46),
('TX2', 12, 3, 78, 23, '2018-05-12 07:38:20', 47),
('TX2', 12, 76, 8, 23, '2018-05-12 07:38:20', 48);

-- --------------------------------------------------------

--
-- Table structure for table `transformer`
--

CREATE TABLE `transformer` (
  `Tx_id` varchar(30) NOT NULL,
  `power_rating` varchar(25) NOT NULL,
  `current_rating` float NOT NULL,
  `tx_type` varchar(15) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `location` varchar(26) NOT NULL,
  `service_area` varchar(30) NOT NULL,
  `id_no` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transformer`
--

INSERT INTO `transformer` (`Tx_id`, `power_rating`, `current_rating`, `tx_type`, `lat`, `lng`, `location`, `service_area`, `id_no`) VALUES
('canteen', '500MVA', 100, '3 phase', 0.337817, 32.568604, 'kampala north', 'wandegeya', 'mwangi'),
('library', '500MVA', 100, '3 phase', 0.335145, 32.567303, 'kampala north', 'Wandegeya', 'simon'),
('library2', '100MVA', 100, '1 phase', 0.335145, 32.567303, 'kampala north', 'Wandegeya', 'simon'),
('Livingstone', '500MVA', 120, '3 phase', 0.338817, 32.568604, 'kampala north', 'wandegeya', 'mwangi'),
('lumumba', '500MVA', 100, '3 phase', 0.336284, 32.524101, 'Kampala North', 'Wandegeya', 'simon'),
('mitchell', '200MVA', 60, '3 phase', 0.333610, 32.570751, 'Kampala North', 'Wandegeya', 'simon'),
('swimmingpool', '500MVA', 100, '3 phase', 0.335218, 32.569309, 'kampala north', 'wandegeya', 'mwangi'),
('TECH', '500MVA', 100, '3 phase', 0.336244, 32.564102, 'Kampala North', 'Wandegeya', 'mwangi'),
('TX1', '25VA', 2, 'single phase', 0.332920, 32.570999, 'kikoni', 'kikoni', 'simon'),
('TX2', '25VA', 2, 'single phase', 0.343346, 31.342232, 'kikoni', 'kikoni', 'simon'),
('TX3', '200MVA', 20, '3 phase', 0.303828, 30.232100, 'makerere', 'makerere', 'mwangi'),
('TX4', '1000MVA', 200, '3 phase', 0.382830, 33.232101, 'kikonii', 'makerere', 'simon');

-- --------------------------------------------------------

--
-- Table structure for table `userkeys`
--

CREATE TABLE `userkeys` (
  `userkey` varchar(50) NOT NULL,
  `Time_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_no` varchar(20) NOT NULL,
  `stat` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userkeys`
--

INSERT INTO `userkeys` (`userkey`, `Time_received`, `id_no`, `stat`) VALUES
('0abb0eee5a2c9089a1562ed020db5217', '2018-05-16 05:20:53', 'mwangi', '0'),
('1e00e6dbe349fc63260527c0dad7212b', '2018-05-16 05:12:40', 'simon', '0'),
('2fc8f48b2d00eb405e620cb704d736b4', '2018-05-16 05:16:27', 'simon', '0'),
('55e871ac4be025218c6c1923f4bc6ef2', '2018-05-15 13:03:19', 'simon', 'allow'),
('5785924e1dcbc815eab59f6d51e5b011', '2018-05-15 16:18:46', 'simon', '0'),
('57920aabac080fc5278bd995dc9bf354', '2018-05-15 20:33:29', 'mwangi', '0'),
('5fe75101aac15aa65286181c932e78af', '2018-05-14 18:18:47', 'simon', '0'),
('646be5674cab61d8de1e2084b080614b', '2018-05-16 05:32:19', 'simon', '0'),
('6f7537faa82fa46c065b834df54ea11d', '2018-05-14 18:28:57', 'mwangi', '0'),
('7f3fd46a87758beab1ed19d594c49e54', '2018-05-15 20:25:56', 'simon', '0'),
('81d334b7176c965d3443d5875311fe2f', '2018-05-16 05:14:29', 'simon', '0'),
('85631e0731592a5839fe2eaf35f96840', '2018-05-16 05:21:20', 'simon', 'allow'),
('8999c3a0f52a06bcf4d978b3894ea867', '2018-05-15 14:06:47', 'simon', 'allow'),
('9a972721e587e93899e12571cd76d400', '2018-05-15 16:13:43', 'simon', 'allow'),
('a9ebff118f98a8b2b27ca88d38fd7155', '2018-05-14 20:15:28', 'simon', '0'),
('b0d0fc0c0779f6fe920ecfc05dfb5db6', '2018-05-15 16:02:22', 'simon', 'allow'),
('c4dbd8aa76a30d70d643638fb4af0c1c', '2018-05-15 06:15:38', 'simon', '0'),
('c9ade0a22319ae92760248366fd1b149', '2018-05-15 06:15:49', 'mwangi', 'allow'),
('ce36650f2197ea1bd063d1e8986e6b5c', '2018-05-15 20:09:47', 'simon', 'allow'),
('d1bc753ca5bb010079218f4a3db3cbae', '2018-05-16 05:08:13', 'simon', 'allow'),
('d3541b6e506c4f27c71304b0d60d8b30', '2018-05-16 05:07:04', 'simon', 'allow'),
('f465ba3469aa9d804c8271bf7cf3a018', '2018-05-16 05:05:03', 'simon', 'allow'),
('f5cce67a71333e7a502f3c3b08f761bd', '2018-05-15 16:18:14', 'simon', '0'),
('fe47c31fdcf34da57873033fcc075fc6', '2018-05-15 20:33:38', 'simon', 'allow');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD UNIQUE KEY `id_no` (`id_no`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `transformer`
--
ALTER TABLE `transformer`
  ADD PRIMARY KEY (`Tx_id`);

--
-- Indexes for table `userkeys`
--
ALTER TABLE `userkeys`
  ADD PRIMARY KEY (`userkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` mediumint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
