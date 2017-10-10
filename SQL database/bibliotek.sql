-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2017 at 10:01 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliotek`
--

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`bookid`, `title`, `author`, `onloan`) VALUES
(1, 'To Kill Mocking Birds', 'Harper Lee', 0),
(2, 'Harry Potter', 'J.K Rowling', 0),
(3, 'Nalle puh', 'Nolan Ideaos', 0),
(4, 'Welcome to to world', 'Karl Nilsson', 0),
(5, 'How to cook', 'Leif Mannerström', 0),
(6, 'A book about cars', 'Rolf Biggesson', 0),
(7, 'Dont worry, be happy', 'Harper Lee', 0),
(8, 'Livet efter dig', 'Jojo Moyes', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
