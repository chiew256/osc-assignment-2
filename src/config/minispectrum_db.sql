-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 01:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minispectrum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choice_id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `choice` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `homework_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `homework_question` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marks_srms`
--

CREATE TABLE `marks_srms` (
  `marks_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marks_srms`
--

INSERT INTO `marks_srms` (`marks_id`, `result_id`, `subject_id`, `marks`) VALUES
(99, 28, 33, 50),
(100, 28, 34, 30),
(101, 29, 33, 10),
(102, 29, 34, 20);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_list`
--

CREATE TABLE `quiz_list` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` text NOT NULL,
  `total_question` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_marks`
--

CREATE TABLE `quiz_marks` (
  `quiz_mark_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_mark` decimal(10,0) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result_srms`
--

CREATE TABLE `result_srms` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `result_percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `result_srms`
--

INSERT INTO `result_srms` (`result_id`, `student_id`, `result_percentage`) VALUES
(28, 2, '80.00'),
(29, 3, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `gender`, `dob`, `email`) VALUES
(1, 'Chai', 'Male', '2022-06-01', 'chai@gmail.com'),
(2, 'abc', 'Male', '2022-06-02', 'abc@gmail.com'),
(3, 'ali', 'Male', '2022-06-01', 'ali@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subject_srms`
--

CREATE TABLE `subject_srms` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_srms`
--

INSERT INTO `subject_srms` (`subject_id`, `subject_name`) VALUES
(33, 'Database'),
(34, 'OSP');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `homework_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_obj` varchar(255) DEFAULT NULL,
  `date_uploaded` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(150) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `type`) VALUES
('abc@gmail.com', '$2y$10$XJ5Ctb4zc6uoh8lmBTyTKOHUwvH0eLwAzEnYweNeNsNiF3BfPKrRK', 'student'),
('abu@gmail.com', '$2y$10$jcI3/Qj5JbIGkpMUlzrMk.BtnR.S1xDNPdIC.2lhQ7JWlzgzb3iwe', 'lecturer'),
('ali@gmail.com', '$2y$10$ucY/JlNSiooKfoUGWchuX.QDAiyJuRF/L7u2kobOAgyUvdi7bnyMe', 'student'),
('chai@gmail.com', '123456', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `question_number` (`question_number`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`student_id`,`subject_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`homework_id`,`subject_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `marks_srms`
--
ALTER TABLE `marks_srms`
  ADD PRIMARY KEY (`marks_id`),
  ADD KEY `result_id` (`result_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz_list`
--
ALTER TABLE `quiz_list`
  ADD PRIMARY KEY (`quiz_id`,`subject_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `quiz_marks`
--
ALTER TABLE `quiz_marks`
  ADD PRIMARY KEY (`quiz_mark_id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `result_srms`
--
ALTER TABLE `result_srms`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `subject_srms`
--
ALTER TABLE `subject_srms`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`homework_id`,`subject_id`,`student_id`),
  ADD KEY `homework_id` (`homework_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lecturer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks_srms`
--
ALTER TABLE `marks_srms`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `result_srms`
--
ALTER TABLE `result_srms`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_srms`
--
ALTER TABLE `subject_srms`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject_srms` (`subject_id`);

--
-- Constraints for table `homework`
--
ALTER TABLE `homework`
  ADD CONSTRAINT `homework_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject_srms` (`subject_id`);

--
-- Constraints for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `marks_srms`
--
ALTER TABLE `marks_srms`
  ADD CONSTRAINT `marks_srms_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject_srms` (`subject_id`),
  ADD CONSTRAINT `marks_srms_ibfk_2` FOREIGN KEY (`result_id`) REFERENCES `result_srms` (`result_id`);

--
-- Constraints for table `result_srms`
--
ALTER TABLE `result_srms`
  ADD CONSTRAINT `result_srms_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`homework_id`) REFERENCES `homework` (`homework_id`),
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject_srms` (`subject_id`),
  ADD CONSTRAINT `submission_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
