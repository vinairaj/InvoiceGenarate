-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 08:29 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--
CREATE DATABASE IF NOT EXISTS `estore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estore`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_mst_id` int(11) NOT NULL,
  `c_name` varchar(225) NOT NULL,
  `n_quantity` int(11) NOT NULL,
  `n_price` decimal(10,2) NOT NULL,
  `n_tax_amount` decimal(10,2) NOT NULL,
  `d_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_invoice_generate`
--

DROP TABLE IF EXISTS `product_invoice_generate`;
CREATE TABLE IF NOT EXISTS `product_invoice_generate` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_sub_total_exc_tax` decimal(10,2) NOT NULL,
  `n_sub_total_inc_tax` decimal(10,2) NOT NULL,
  `n_discount` decimal(10,2) NOT NULL,
  `n_discount_type` int(11) NOT NULL,
  `n_total` decimal(10,2) NOT NULL,
  `n_invoice_generate_flag` int(11) NOT NULL,
  `d_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
