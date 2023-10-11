-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 07:10 PM
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
-- Database: `tpc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `redressal_form`
--

CREATE TABLE `redressal_form` (
  `id` int(11) NOT NULL,
  `message_type` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `program_name` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `cgpa` varchar(10) DEFAULT NULL,
  `section` varchar(10) NOT NULL,
  `problem_type` varchar(255) DEFAULT NULL,
  `residency` varchar(255) DEFAULT NULL,
  `hostel_number` int(11) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `redressal_form`
--

INSERT INTO `redressal_form` (`id`, `message_type`, `student_name`, `country`, `program_name`, `contact_number`, `registration_number`, `attendance`, `cgpa`, `section`, `problem_type`, `residency`, `hostel_number`, `block`, `room_number`, `subject`, `description`, `submission_date`) VALUES
(6, 'Pep classes are too long.', 'Yogesh Sharma', 'India', 'MCA', '6280169306', '12216851', 93, '8.19', 'D2233', 'on', 'on', 0, '', '', 'Regading PEP classes', 'Pep classes are too long.', '2023-10-03 14:31:51'),
(7, 'just remove it', 'tulsi', 'india', 'MCA', '1234567899', '12215209', 85, '8.5', 'D2233', 'on', 'on', 0, '', '', 'pep input by tulsi', 'just remove it', '2023-10-03 15:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `u_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `enrollment_date` date DEFAULT NULL,
  `program` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`u_id`, `name`, `photo`, `date_of_birth`, `address`, `email`, `phone_number`, `enrollment_date`, `program`) VALUES
(12215209, 'Tulsi Tetyal', './Resourse/students/tulsi.jpeg', '2001-11-18', 'Jalandhar, Punjab', 'tulsi@gmail.com', '0123456789', '2022-09-05', 'M.C.A.'),
(12216851, 'Yogesh', './Resourse/students/yogesh.png', '1999-12-22', 'Jalandhar, Punjab', 'yogesh.sharma3850@gmail.com', '6280169306', '2022-09-05', 'M.C.A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `dob`, `password`) VALUES
(1, 'Yogesh', 'yogesh.sharma3850@gmail.com', '2000-12-27', '$2y$10$i7.Pa9n0tQ7jq4EDR/c1Q.BTVph09gXfAOvkHunuuzo2J823Ht2D6'),
(4, 'Tulsi', 'tulsi@gmail.com', '2001-11-18', '$2y$10$/mlaRxjqU1lbCyl0/zRJ1.CZ7Bht0GkjXEuEtilM0tN/UMyP23iYy'),
(5, 'aman', 'aman@gmail.com', '2022-11-15', '$2y$10$07sS/IMgX.snq1hJwam84.omlpMP.i13QJbIXU7g4l.aoV8WxWYtC'),
(6, 'aditya raj', 'adi@gmail.com', '2021-02-02', '$2y$10$pGGYRfIw0RCakRsKELBaWONszd83GPdzMQXDqETGL4.d237pHPEmu');

-- --------------------------------------------------------

--
-- Table structure for table `walk_in_queries`
--

CREATE TABLE `walk_in_queries` (
  `u_id` int(16) NOT NULL,
  `date_time` date NOT NULL,
  `query` varchar(250) NOT NULL,
  `addressed by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walk_in_queries`
--

INSERT INTO `walk_in_queries` (`u_id`, `date_time`, `query`, `addressed by`) VALUES
(12216851, '2023-09-27', 'chai nhi mili', ''),
(12216851, '2023-09-27', 'fir se', ''),
(12216851, '2023-10-01', 'chai nhi milli.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `redressal_form`
--
ALTER TABLE `redressal_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `redressal_form`
--
ALTER TABLE `redressal_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
