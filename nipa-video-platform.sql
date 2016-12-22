-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2016 at 09:34 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nipa-video-platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `social_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `username`, `password`, `social_id`) VALUES
('8be89e30b8', 'sereepap2029', '12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('578lgekop849ut4u2g8l2egd9nfmgd8o', '127.0.0.1', 1481885463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313838353436333b),
('mes20d8vrgi9i6ndpkqo4iqm8m52k7fg', '127.0.0.1', 1481886042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313838363034323b),
('gj48qr4680q0avtn76ni655646c98g0h', '127.0.0.1', 1481886358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313838363335383b),
('9oq8t54023a72ina3td01j487lut979r', '127.0.0.1', 1481886685, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313838363638353b),
('1d4vtb2k15eifa3sap76oblbl5c2mv9u', '127.0.0.1', 1481887008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313838373030383b),
('2196maslcqmls81ea1kufi03fcr8d21n', '127.0.0.1', 1481887560, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313838373536303b),
('2e5ebil37fbg32ls6p1dlf4dtkuf7mrn', '127.0.0.1', 1481888203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313838383230333b),
('65iqt4njosu5kvr4udodnkqciu392155', '127.0.0.1', 1481888217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313838383230333b),
('9vrqqdd8hm8rn3a614b49o0070iksne0', '127.0.0.1', 1482372584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438323337323538343b),
('j3d9et7qjlth8pdvjkfeavbtdqoidv8k', '127.0.0.1', 1482372979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438323337323937393b6272616e645f69647c733a31303a2238626538396533306238223b),
('b8uqdo8lh92bql4if12v3msdd5s9savt', '127.0.0.1', 1482373723, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438323337333732333b6272616e645f69647c733a31303a2238626538396533306238223b),
('55al7c2fupik88938gcq6v0bhmlnk7ru', '127.0.0.1', 1482373736, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438323337333732333b6272616e645f69647c733a31303a2238626538396533306238223b);

-- --------------------------------------------------------

--
-- Table structure for table `influencer`
--

CREATE TABLE `influencer` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `social_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `sucscribe` int(10) DEFAULT NULL,
  `view` int(10) DEFAULT NULL,
  `rating` int(10) DEFAULT NULL,
  `profile_picture` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `social_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `career` text COLLATE utf8_unicode_ci,
  `rating` int(10) DEFAULT NULL,
  `profile_picture` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `influencer`
--
ALTER TABLE `influencer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
