-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2016 at 09:27 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_first_name` varchar(255) DEFAULT '----',
  `contact_second_name` varchar(255) DEFAULT '----',
  `contact_number` varchar(255) NOT NULL,
  `contact_email` varchar(255) DEFAULT '[ No Email ]',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_first_name`, `contact_second_name`, `contact_number`, `contact_email`, `user_id`) VALUES
(1, 'Ahmad', 'Halholi', '+962777888812', 'vaq@hotmail.com', 13),
(2, 'ahmad', 'rooter', '+96278654121', 'fellow@gmail.com', 13),
(3, 'Abood', 'aldob', '+962584654654654', 'askdjhsdkf@safklj.com', 13),
(4, 'user', 'user', '+96277777777', 'user@user.com', 17),
(5, 'user', 'user', '+962777777777', 'email@email.com', 17),
(6, 'user', 'user', '+962777777777', 'email@email.com', 17),
(7, 'user', 'user', '+962777777777', 'email@email.com', 17),
(8, 'user', 'user', '+962777777777', 'email@email.com', 17),
(9, 'user', 'user', '+962777777777', 'email@email.com', 17),
(10, 'user', 'user', '+962777777777', 'email@email.com', 17),
(11, 'user', 'user', '+962777777777', 'email@email.com', 17),
(15, 'hacker', 'hacker', '12346546', 'hacker@hacker.com', 13);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `is_admin` varchar(255) DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `pass`, `email`, `is_admin`) VALUES
(13, 'root', '7b24afc8bc80e548d66c4e7ff72171c5', 'root@localhost', 'true'),
(17, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@user.com', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
