-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 07:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `handphones`
--

CREATE TABLE `handphones` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Produsen` varchar(255) NOT NULL,
  `OS` varchar(255) NOT NULL,
  `Harga` varchar(255) NOT NULL,
  `Gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `handphones`
--

INSERT INTO `handphones` (`ID`, `Nama`, `Produsen`, `OS`, `Harga`, `Gambar`) VALUES
(1, 'Poco X3 Pro', 'Xiaomi', 'Android', 'IDR 4.099.000', 'pocox3pro.jpg'),
(2, 'Esia Hidayah', 'Esia', '-', 'IDR 500.000', 'esiahidayah.jpg'),
(3, 'Xiaomi Redmi Note 5', 'Xiaomi', 'Android', 'IDR 2.500.000', 'redminote5.jpg'),
(4, 'iPhone X', 'Apple', 'iOS', 'IDR 19.999.000', 'iphonex.jpg'),
(5, 'iPhone 12 Pro Max', 'Apple', 'iOS', 'IDR 25.000.000', 'iphone12pro.jpeg'),
(6, 'Samsung Note 10', 'Samsung', 'Android', 'IDR 8.000.000', 'samsungnote10.jpg'),
(7, 'OPPO Reno 5', 'OPPO', 'Android', 'IDR 5.000.000', 'opporeno5.png'),
(8, 'iPhone 8', 'Apple', 'iOS', 'IDR 8.000.000', 'iphone8.jpg'),
(9, 'Xiaomi Redmi Note 3', 'Xiaomi', 'Android', 'IDR 1.999.000', 'redminote3.jpg'),
(10, 'Poco F1', 'Xiaomi', 'Android', 'IDR 5.100.000', 'pocof1.jpg'),
(11, 'Vivo Y5', 'Vivo', 'Android', 'IDR 3.000.000', '61d1ebfda86cd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`) VALUES
(3, 'admin', '$2y$10$N1w8K6f1U41jhEdG4eXMp.5GSJJQ01ICWF33caodeE9zfD5g9gtMq'),
(4, 'rudy', '$2y$10$.n4.CTOP/fDzbC5pTHvbb.xdjVpZdAVX.PPEIyGyuZvNm95971cOq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `handphones`
--
ALTER TABLE `handphones`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `handphones`
--
ALTER TABLE `handphones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
