-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 10:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iiita`
--

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `researcher_id` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `authors` text NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `researcher_id`, `title`, `authors`, `file_name`, `file_path`, `uploaded_at`) VALUES
(33, '2', 'rgergrgtr rreqqer', 'dsa fa', '2yoon.pdf', 'publications/2_2023_05_20_09_46_07_2yoon.pdf', '2023-05-20 07:46:07'),
(34, '1', 'vvfadvs', 'vvevevef', '160144834-675404-128499.pdf', 'publications/1_2023_05_20_09_46_35_160144834-675404-128499.pdf', '2023-05-20 07:46:35'),
(35, '1', 'ffrfr', 'er', '160144834-675404-128499.pdf', 'publications/1_2023_05_20_09_46_46_160144834-675404-128499.pdf', '2023-05-20 07:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

CREATE TABLE `researchers` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mentor` varchar(255) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `researchers`
--

INSERT INTO `researchers` (`id`, `code`, `name`, `mentor`, `photo_path`, `about`, `mobile_number`, `email`, `password`, `created_at`) VALUES
(1, 'PKM561', 'Basava', 'Nataraj', 'photos/1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', '8978367853', 'a', 'a', '2023-05-19 17:48:54'),
(2, 'RS151', 'Bakshi Rohit Prasad', 'Dr. Sonali Agarwal', 'photos/2.jpg', 'He is a Senior Research Scholar in the Department of Information Technology at Indian Institute of Information Technology Allahabad (IIITA), India. He completed his Bachelor of Technology from Uttar Pradesh Technical University with Honors in Computer Science and Engineering. He received his Master of Technology in Information Technology with specialization in Intelligent Systems from Indian Institute of Information Technology Allahabad in the year 2013. His primary research interests are Data mining, Machine learning, Big Data computing and mining techniques, High speed streaming data processing and analytics along with their applications in several domains. Focus of his research is towards the development of large scale machine learning algorithms. He has authored multiple research articles listed in different refereed journals and conference proceedings of national and international repute.', '8115573733', 'rs151@iiita.ac.in', 'a', '2023-05-19 13:52:36'),
(3, 'PSE2016001', 'Bagesh kumar', 'Dr. Sonali Agarwal', 'photos/3.jpg', 'He is currently pursuing my Integrated M.TECH-PhD from Indian Institute of Information Technology, Allahabad, specializing in the Department of Information Technology (Software Engineering). He is working as a Teaching Assistant in the subject of Software Engineering under the supervision of Dr. Sonali Agarwal. He has completed my Bachelor of Technology degree in Information Technology(2016) from Rustamjhe Institute of Technology (RJIT) (An Institute of Border Security Force, Military Force). My current research focus is in Machine Learning and Big Data domain. He is currently pursuing my M.TECH-PhD thesis under the guidance of Dr. Sonali Agarwal, titled \"Smart Feedback using Machine Learning and Natural Language Processing paradigm\".', '9431645778', 'pse2016001@iiita.ac.in', 'a', '2023-05-19 13:51:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `researchers`
--
ALTER TABLE `researchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
