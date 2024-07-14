-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2024 at 05:06 AM
-- Server version: 8.0.36
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_survey_jpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `IdCustomer` int UNSIGNED NOT NULL,
  `NamaCustomer` varchar(50) NOT NULL,
  `NamaPerusahaan` varchar(150) NOT NULL,
  `NoHpCustomer` varchar(14) NOT NULL,
  `LastTransaction` datetime DEFAULT NULL,
  `KategoriTransaction` enum('jasa','produk') NOT NULL,
  `Saran` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `hasilkuisioners`
--

CREATE TABLE `hasilkuisioners` (
  `IdKuesionerHasil` int UNSIGNED NOT NULL,
  `customer_IdCustomer` int UNSIGNED NOT NULL,
  `pertanyaan_IdPertanyaan` varchar(5) NOT NULL,
  `Kepentingan` varchar(1) NOT NULL,
  `Kepuasan` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `IdHomePage` int UNSIGNED NOT NULL,
  `Head` varchar(150) NOT NULL,
  `SubHead` text NOT NULL,
  `ImageHead` varchar(150) NOT NULL,
  `About` text NOT NULL,
  `AboutImage` varchar(150) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Instagram` varchar(50) NOT NULL,
  `Katalog` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`IdHomePage`, `Head`, `SubHead`, `ImageHead`, `About`, `AboutImage`, `Email`, `Instagram`, `Katalog`) VALUES
(1, 'SBU Jasa <br /> Pelayanan Pabrik', '<p class=\"text-gray-600\"><strong>SBU Jasa Pelayanan Pabrik</strong> merupakan Unit Pelayanan Pabrik yang melayani kebutuhan baik Internal maupun External <strong>PT. Pupuk Kalimantan Timur</strong>.</p>', '1705953761_cb83e308221719c0e303.svg', '<p><span style=\"font-weight: 700;\">SBU Jasa Pelayanan Pabrik&nbsp;</span>atau yang lebih dikenal dengan nama Strategic Business Unit \r\n            Jasa Pelayanan Pabrik merupakan Unit Pelayanan Pabrik yang melayani \r\n            kebutuhan baik Internal maupun External <strong>PT.Pupuk Kalimantan Timur</strong>.</p><p><br></p><p>\r\n            </p><p>Fungsi bisnis dari SBU JPP sendiri antara lain:</p><p></p><ul><li>Manufacturing \r\n            Spare Part dengan fasilitas lengkap pada Unit Engineering, Unit \r\n            Laboraturium Pengukuran dan Pengujian Logam, Unit Fabrikasi, Unit Suku \r\n            Cadang (CNC &amp; Konvensional), serta Unit Pengecoran Logam.</li><li>Jasa \r\n            Perbaikan dan Perawatan Pabrik berupa Overhaul &amp; Technical Services,\r\n             Jasa Keahlian, serta Jasa Training Operasional &amp; Commisioning \r\n            Pabrik.</li></ul><p><br></p><p></p>', '1705953761_ebc10603d1abff406589.jpg', 'marketingjpp@pupukkaltim.com', 'sbujpp_pkt', '1705953761_20dd9de00487c0126143.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(14, '2024-01-19-024056', 'App\\Database\\Migrations\\AddHomePage', 'default', 'App', 1705942462, 1),
(15, '2024-01-20-210627', 'App\\Database\\Migrations\\AddCustomer', 'default', 'App', 1705942462, 1),
(16, '2024-01-20-221418', 'App\\Database\\Migrations\\AddPertanyaan', 'default', 'App', 1705942462, 1),
(17, '2024-01-21-005509', 'App\\Database\\Migrations\\AddHasilKuisioner', 'default', 'App', 1705942462, 1),
(18, '2024-01-29-163048', 'App\\Database\\Migrations\\AddUser', 'default', 'App', 1706546064, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaans`
--

CREATE TABLE `pertanyaans` (
  `IdPertanyaan` varchar(5) NOT NULL,
  `NamaPertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pertanyaans`
--

INSERT INTO `pertanyaans` (`IdPertanyaan`, `NamaPertanyaan`) VALUES
('KDP1', 'Mutu Atau Kualitas Produk / Jasa SBU JPP'),
('KDP2', 'Jadwal Penyelesaian Produk / Jasa Sbu Jpp'),
('KDP3', 'Kecepatan Menanggapi Keluhan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUser` int UNSIGNED NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Role` enum('admin','pimpinan') NOT NULL,
  `FullName` varchar(70) NOT NULL,
  `LastLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `Username`, `Password`, `Role`, `FullName`, `LastLogin`) VALUES
(1, 'admin', '$2y$10$m6GXdFjIWiQ1p.enXOlYwOT.QiQt2jIp01V0gmKXM.Vl.He2s3TV.', 'admin', 'super admin', '2024-06-06 05:05:57'),
(4, 'pimpinan', '$2y$10$ln9z9i7JfVeBbTxS9WR2uu6aaw/FniJsjViuNGCgB28Pqt8Gne4Re', 'pimpinan', 'pimpinan', '2024-01-29 08:14:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`IdCustomer`);

--
-- Indexes for table `hasilkuisioners`
--
ALTER TABLE `hasilkuisioners`
  ADD PRIMARY KEY (`IdKuesionerHasil`),
  ADD KEY `hasilkuisioners_pertanyaan_IdPertanyaan_foreign` (`pertanyaan_IdPertanyaan`),
  ADD KEY `hasilkuisioners_customer_IdCustomer_foreign` (`customer_IdCustomer`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`IdHomePage`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD PRIMARY KEY (`IdPertanyaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `IdCustomer` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hasilkuisioners`
--
ALTER TABLE `hasilkuisioners`
  MODIFY `IdKuesionerHasil` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `IdHomePage` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasilkuisioners`
--
ALTER TABLE `hasilkuisioners`
  ADD CONSTRAINT `hasilkuisioners_customer_IdCustomer_foreign` FOREIGN KEY (`customer_IdCustomer`) REFERENCES `customers` (`IdCustomer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasilkuisioners_pertanyaan_IdPertanyaan_foreign` FOREIGN KEY (`pertanyaan_IdPertanyaan`) REFERENCES `pertanyaans` (`IdPertanyaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;