-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 12:11 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kcador`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel_pics`
--

CREATE TABLE `carousel_pics` (
  `id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `pic_title` varchar(255) NOT NULL,
  `pic_caption` varchar(255) DEFAULT NULL,
  `show` int(11) NOT NULL,
  `upload_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `content` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `content`, `status`) VALUES
(42, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://127.0.0.1/abdc1fda-aa32-40d7-bcbd-c713c2291348\" width=\"120\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(43, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://127.0.0.1/abdc1fda-aa32-40d7-bcbd-c713c2291348\" width=\"120\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(44, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://127.0.0.1/abdc1fda-aa32-40d7-bcbd-c713c2291348\" width=\"120\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(45, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://127.0.0.1/d011aeb1-0b6f-4315-891d-022a4313c5fd\" width=\"128\" />\r\n<figcaption>hello from huawei</figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(46, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://127.0.0.1/d011aeb1-0b6f-4315-891d-022a4313c5fd\" width=\"128\" />\r\n<figcaption>hello from huawei</figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(47, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://127.0.0.1/d011aeb1-0b6f-4315-891d-022a4313c5fd\" width=\"128\" />\r\n<figcaption>hello from huawei</figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(48, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://127.0.0.1/5960c943-2463-4141-b2ae-50cfb9a7ba84\" width=\"848\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(49, '                    <figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://127.0.0.1/abdc1fda-aa32-40d7-bcbd-c713c2291348\" width=\"120\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Â </p>\r\n\r\n                    ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `accountType` varchar(10) NOT NULL DEFAULT 'client',
  `firstName` varchar(20) NOT NULL,
  `middleName` varchar(20) NOT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `signupDate` int(11) NOT NULL,
  `reset_token` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobile_number`, `accountType`, `firstName`, `middleName`, `surname`, `gender`, `signupDate`, `reset_token`) VALUES
(1140, NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'MORISMUTEA@GMAIL.COM', 25, 'client', 'MORIS', 'MUTEA', 'KIREMA', 'other', 1547935478, NULL),
(1141, NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'CRYWANNA914@GMAIL.COM', 78908, 'client', 'MORIS', '', 'MITEA', 'other', 1548176428, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `video_name` varchar(255) DEFAULT NULL,
  `video_caption` varchar(255) DEFAULT NULL,
  `upload_date` int(11) NOT NULL,
  `show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel_pics`
--
ALTER TABLE `carousel_pics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel_pics`
--
ALTER TABLE `carousel_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1142;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
