-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2022 at 04:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `question_number`, `is_correct`, `text`) VALUES
(1, 1, 0, 'PHP: Hypertext Preprocessor'),
(2, 1, 0, 'Private Home Page'),
(3, 1, 1, 'Personal Homepage'),
(4, 1, 0, 'Personal Hypertext Preprocessor'),
(5, 2, 1, 'echo \"Hello World\";'),
(6, 2, 0, '\"Hello World\";'),
(7, 2, 0, 'Document.Write(\"Hello World\");'),
(8, 3, 0, 'ASP'),
(9, 3, 0, 'Ruby'),
(10, 3, 1, 'PHP'),
(11, 4, 0, 'All variables in PHP are denoted with a leading dollar sign ($).'),
(12, 4, 0, 'The value of a variable is the value of its most recent assignment.'),
(13, 4, 0, 'Variables are assigned with the = operator, with the variable on the left-hand side and the expression to be evaluated on the right.'),
(14, 4, 1, 'All of the above.'),
(15, 5, 0, 'If the value is a number, it is false if exactly equal to zero and true otherwise.'),
(16, 5, 0, 'If the value is a string, it is false if the string is empty (has zero characters) or is the string \"0\", and is true otherwise.'),
(17, 5, 0, 'Values of type NULL are always false.'),
(18, 5, 1, 'All of the above.'),
(19, 6, 1, 'mysql_connect()'),
(20, 6, 0, 'mysql_query()'),
(21, 6, 0, 'mysql_close()'),
(22, 6, 0, 'None of the above'),
(23, 7, 0, '$GLOBALS'),
(24, 7, 0, '$_SERVER'),
(25, 7, 1, '$_COOKIE'),
(26, 7, 0, '$_SESSION'),
(27, 8, 1, '$_PHP_SELF'),
(28, 8, 0, '$php_errormsg'),
(29, 8, 0, '$_COOKIE'),
(30, 8, 0, '$_SESSION'),
(96, 8, 0, 'const'),
(97, 8, 1, 'define'),
(98, 8, 0, 'var'),
(99, 8, 0, 'let'),
(100, 9, 1, '.php'),
(101, 9, 0, '.css'),
(102, 9, 0, '.js');

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
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marks_srms`
--

INSERT INTO `marks_srms` (`marks_id`, `result_id`, `subject_id`, `marks`) VALUES
(29, 8, 6, 70),
(30, 8, 7, 90),
(31, 8, 9, 95),
(32, 8, 8, 80),
(33, 9, 6, 47),
(34, 9, 7, 48),
(35, 9, 9, 49),
(36, 9, 8, 44),
(37, 10, 6, 85),
(38, 10, 7, 74),
(39, 10, 9, 96),
(40, 10, 8, 52),
(41, 11, 6, 50),
(42, 11, 7, 60),
(43, 11, 9, 80),
(44, 11, 8, 90),
(45, 12, 6, 35),
(46, 12, 7, 86),
(47, 12, 9, 98),
(50, 13, 10, 50),
(51, 13, 12, 70),
(68, 18, 13, 60),
(69, 18, 11, 80),
(70, 18, 10, 90),
(71, 18, 12, 95),
(76, 20, 13, 50),
(77, 20, 11, 50),
(78, 20, 10, 50),
(79, 20, 12, 50);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `text`, `quiz_id`) VALUES
(1, 'What does PHP stand for??', 1),
(2, 'How do you write \"Hello World\" in PHP?', 1),
(3, 'What is the best server side language?', 1),
(4, 'Which of the following is true about php variables?', 2),
(5, 'Which of the following is correct about determine the \"truth\" of any value not already of the Boolean type?', 2),
(6, 'Which of the following method connect a MySql database using PHP?', 2),
(7, 'Which of the following is an associative array of variables passed to the current script via HTTP cookies?', 3),
(8, 'Which of the following is the correct way to declare the constant in PHP?', 4),
(9, 'The default file extension in PHP are ____', 4);

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

--
-- Dumping data for table `quiz_list`
--

INSERT INTO `quiz_list` (`quiz_id`, `quiz_name`, `total_question`, `subject_id`) VALUES
(1, 'WIE2002 Quiz 1', 3, 0),
(2, 'WIE2002 Quiz 2', 3, 0),
(3, 'WIE2002 Quiz 3', 1, 0),
(4, 'WIE2002 Quiz 4', 2, 0);

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

--
-- Dumping data for table `quiz_marks`
--

INSERT INTO `quiz_marks` (`quiz_mark_id`, `quiz_id`, `quiz_mark`, `student_id`) VALUES
(1, 2, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result_srms`
--

CREATE TABLE `result_srms` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `result_percentage` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `result_srms`
--

INSERT INTO `result_srms` (`result_id`, `student_id`, `result_percentage`) VALUES
(8, 6, '83.75'),
(9, 12, '47.00'),
(10, 9, '76.75'),
(11, 4, '70.00'),
(18, 71, '81.25'),
(20, 72, '50.00');

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
(6, 'Chemistry'),
(7, 'English'),
(8, 'Programming for Problem Solving'),
(9, 'Mathematics'),
(10, 'Engineering Graphics And Design'),
(11, 'Basic Electronics'),
(12, 'Physics'),
(13, 'Advance Mathematics');

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
  ADD PRIMARY KEY (`student_id`);

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
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `result_srms`
--
ALTER TABLE `result_srms`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_srms`
--
ALTER TABLE `subject_srms`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
