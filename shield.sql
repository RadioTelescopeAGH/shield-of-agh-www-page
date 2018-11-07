-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2018 at 12:00 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shield`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `login`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'krzychu2956@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `active` int(11) NOT NULL,
  `name` text NOT NULL,
  `template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `title`, `content`, `active`, `name`, `template`) VALUES
(1, '/', '', '', 1, 'homepage', 'index'),
(2, '/template', 'Podstrona testowa', 'Tekst dla danej podstrony', 1, 'tmp', 'subpage'),
(3, '/przyjaciele-projektu', 'Przyjaciele projektu', '    <section id=\"aboutProject\" class=\"section\">\r\n        <div class=\"container\">\r\n          <div class=\"section-header\">          \r\n            <h2 class=\"section-title wow fadeIn\" data-wow-duration=\"1000ms\" data-wow-delay=\"0.3s\">Przyjaciele <span>projektu</span></h2>\r\n            <hr class=\"lines wow zoomIn\" data-wow-delay=\"0.3s\">\r\n            <p class=\"section-subtitle wow fadeIn\" data-wow-duration=\"1000ms\" data-wow-delay=\"0.3s\">Podziękowania dla:</p>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"wow fadeIn\" data-wow-duration=\"1000ms\" data-wow-delay=\"0.3s\">\r\n                  <ul class=\"defList\">\r\n                    <li>dr inż. Paweł Janowski - opiekun projektu</li>\r\n                    <li>Michał Kud</li>\r\n                    <li>Krótkofalowcy z Niepołomic</li>\r\n                    <li>CREDO - Cosmic-Ray Extremely Distributed Observatory</li>\r\n                  </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </section>', 1, 'tmp', 'subpage');

-- --------------------------------------------------------

--
-- Table structure for table `www_counter`
--

CREATE TABLE `www_counter` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `add_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `www_counter`
--

INSERT INTO `www_counter` (`id`, `ip`, `add_at`) VALUES
(1, '::1', '2018-10-31 02:06:45'),
(2, '::1', '2018-10-31 02:07:15'),
(3, '::1', '2018-11-02 23:51:58'),
(4, '::1', '2018-11-03 00:10:12'),
(5, '::1', '2018-11-07 11:12:27'),
(6, '::1', '2018-11-07 11:16:34'),
(7, '::1', '2018-11-07 11:19:58'),
(8, '::1', '2018-11-07 11:21:06'),
(9, '::1', '2018-11-07 11:36:32'),
(10, '::1', '2018-11-07 11:38:39'),
(11, '::1', '2018-11-07 11:41:32'),
(12, '::1', '2018-11-07 11:43:12'),
(13, '::1', '2018-11-07 11:49:30'),
(14, '::1', '2018-11-07 11:52:37'),
(15, '::1', '2018-11-07 11:53:49'),
(16, '::1', '2018-11-07 11:55:20'),
(17, '::1', '2018-11-07 11:56:32'),
(18, '::1', '2018-11-07 11:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `www_counter`
--
ALTER TABLE `www_counter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `www_counter`
--
ALTER TABLE `www_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
