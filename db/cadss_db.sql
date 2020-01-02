-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 09:39 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cadss_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `fname` varchar(128) CHARACTER SET latin1 NOT NULL,
  `lname` varchar(128) CHARACTER SET latin1 NOT NULL,
  `username` varchar(128) CHARACTER SET latin1 NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `role` varchar(50) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `password`, `email`, `role`, `date`) VALUES
(1, 'gabela', 'musodza', 'admin', 'admin', 'admin@admin.com', 'admin', '2018-08-21 23:14:32'),
(2, 'tinashe', 'musodza', 'tintin', 'admin', 'tinashe@gmaill.com', 'admin', '2018-08-21 23:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `assignment_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_year` date DEFAULT NULL,
  `course_id` int(11) unsigned DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  `assignment_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_assignments_course` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `assignment_title`, `copyright_year`, `course_id`, `date_upload`, `assignment_path`) VALUES
(1, 'prac_1', '2018-08-29', 1, '2018-08-17 04:01:48', 'assignments/1534471308chapter 1.docx'),
(2, 'theory_1', '2018-08-21', 1, '2018-08-17 04:04:59', 'assignments/1534471499chapter3.docx');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(11) unsigned DEFAULT NULL,
  `coursename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(23) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_course_department` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `department_id`, `coursename`, `course_code`, `level`) VALUES
(1, 1, 'VB.Net', '123/15h', 'nd1'),
(2, 1, 'Software Design', '', 'nd1'),
(3, 1, 'Web', '', 'nd3'),
(4, 1, 'Software Project', '', 'nd3'),
(5, 1, 'System Analysis And Design', '', 'nd1'),
(6, 1, 'Research Project', '', 'hnd'),
(7, 1, 'Operations Research', '', 'hnd'),
(8, 1, 'Object Oriented Using Java', '', 'hnd'),
(9, 1, 'Advanced Networking and Security', '', 'hnd'),
(10, 1, 'Business Information Systems', '', 'nc'),
(11, 1, 'Computer Operations and Packages', '', 'nc'),
(12, 1, 'Information Technology Concepts', '', 'nc');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `hod` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`department_id`),
  UNIQUE KEY `departmentname` (`departmentname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `departmentname`, `course_code`, `hod`) VALUES
(1, 'InformationTechnology', '78/2018', 'Musodza');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admission_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) unsigned DEFAULT NULL,
  `course_id` int(11) unsigned DEFAULT NULL,
  `exam_mark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_marks_course` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `admission_number`, `year`, `course_id`, `exam_mark`, `date`) VALUES
(1, '000GM210852', 2018, 1, '66', '2018-08-21 22:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) unsigned DEFAULT NULL,
  `department_id` int(11) unsigned DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_staff_department` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `firstname`, `lastname`, `password`, `idno`, `dateofbirth`, `gender`, `mobile`, `email`, `address`, `zipcode`, `department_id`, `roles`, `date`, `role`) VALUES
(1, 'musodza', 'Musodza', 'Musodza', 'admin', '48-134787-v48', '2005-08-02', 'male', '772629299', 'geestylz@cooltoad.com', '7974 fairview crescent  winston park marondera', 3232, 1, '        HOD ICT                                            ', '2018-08-17 04:59:43', 'teacher'),
(2, 'tino', 'Tinotenda', 'Musodza', 'admin', '48-134787-v56', '1999-07-26', 'male', '0772727272', 'tino@gmail.com', '797 fairview crescent  winston park marondera', 5454, 2, 'Lecturer', '2018-08-21 23:17:19', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `studentmarks`
--

CREATE TABLE IF NOT EXISTS `studentmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_number` varchar(45) NOT NULL,
  `theory1` int(23) NOT NULL,
  `practical1` int(32) NOT NULL,
  `ittd1` int(32) NOT NULL,
  `test1` int(32) NOT NULL,
  `theory2` int(32) NOT NULL,
  `practical2` int(32) NOT NULL,
  `ittd2` int(23) NOT NULL,
  `test2` int(32) NOT NULL,
  `practical3` int(32) NOT NULL,
  `ittd3` int(23) NOT NULL,
  `exam_mark` int(11) NOT NULL,
  `course` int(11) unsigned DEFAULT NULL,
  `year` int(11) unsigned DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_studentmarks_course` (`course`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `studentmarks`
--

INSERT INTO `studentmarks` (`id`, `admission_number`, `theory1`, `practical1`, `ittd1`, `test1`, `theory2`, `practical2`, `ittd2`, `test2`, `practical3`, `ittd3`, `exam_mark`, `course`, `year`, `date`) VALUES
(1, '000PM141642', 45, 66, 55, 55, 66, 64, 51, 44, 66, 88, 67, 1, 2018, '2018-08-18 16:50:56'),
(2, '000GM210852', 66, 77, 99, 32, 77, 45, 23, 55, 78, 78, 83, 1, 2018, '2018-08-18 16:54:48'),
(3, '000GM210852', 67, 47, 99, 32, 43, 87, 71, 49, 65, 61, 0, 2, 2018, '2018-08-18 16:59:11'),
(4, '000PM141642', 64, 81, 56, 88, 66, 75, 51, 49, 55, 77, 0, 2, 2018, '2018-08-18 17:01:39'),
(5, '000TT084101', 65, 50, 85, 41, 61, 45, 66, 62, 61, 71, 43, 1, 2018, '2018-08-20 11:12:51'),
(6, '000EG085208', 48, 69, 65, 35, 56, 48, 78, 54, 78, 48, 0, 1, 2018, '2018-08-20 14:57:28'),
(7, '000EG085208', 32, 66, 54, 54, 47, 84, 42, 67, 75, 45, 0, 2, 2018, '2018-08-21 21:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `department_id` int(11) unsigned DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) unsigned DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_students_department` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `admission_number`, `idno`, `dateofbirth`, `department_id`, `gender`, `mobile`, `email`, `address`, `zipcode`, `date`, `username`, `role`, `password`) VALUES
(1, 'Gabriel', 'Musodza', '000GM210852', NULL, '2006-07-21', 1, 'male', '0772629229', 'gabela.musodza33@gmail.com', '797 fairview crescent  winston park marondera', 263, '2018-08-15 21:08:52', 'gabela', 'student', 'admin'),
(2, 'Pamela', 'Munava', '000PM141642', '85448448843', '2000-03-28', 1, 'female', '0779225856', 'pamela@gmail.com', '7974 fairview crescent  winston park marondera', 344, '2018-08-18 14:16:42', 'pam', 'student', 'admin'),
(3, 'Tinashe', 'Tinashe', '000TT084101', '3224444', '2001-05-29', 1, 'male', '0848484848', 'tina@gmail.com', '797 fairview crescent  winston park marondera', 212, '2018-08-19 08:41:03', 'tina', 'student', 'admin'),
(5, 'Emy', 'Gurure', '000EG085208', '11212883h5', '1988-08-02', 1, 'female', '073839933', 'eg@gmail.com', '323 fairview crescen wiston park mrondera', 3232, '2018-08-19 08:52:08', 'emy', 'student', 'admin'),
(6, 'Kudzaishe', 'Musodza', '000KM012326', '48-134787-v56', '2018-08-13', 1, 'female', '0775859995', 'kudzi@gmail.com', '797 fairview crescent  winston park marondera', 23323, '2018-08-21 23:50:35', 'kudzai', 'student', 'admin'),
(7, 'Jonathan', 'Nhunzvi', '000JN170916', '48-134787-v48', '1990-05-02', 2, 'male', '0776047309', 'jj@gmail.com', '797 fairview crescent  winston park marondera', 7666, '2018-08-22 16:52:37', 'jona', 'student', 'admin'),
(8, 'Ranga', 'Ndemera', '000RN150658', '48-134787-v48', '2001-06-25', 2, 'male', '078333332', 'rine@gmail.com', '7974 fairview crescent  winston park marondera', 232, '2018-09-07 15:06:58', 'ranga', 'student', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `assignment_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_year` date DEFAULT NULL,
  `course_id` int(11) unsigned DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  `assignment_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_uploads_course` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `assignment_title`, `copyright_year`, `course_id`, `date_upload`, `assignment_path`) VALUES
(1, 'prac_2', '2018-08-16', 1, '2018-08-17 03:54:02', 'students_assignments/15344708422011-0021_53_database_system.pdf'),
(3, 'theory_2', '2018-09-19', 2, '2018-09-07 15:11:44', 'students_assignments/1536325904ED 46 (B1) Secondary Schools.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`, `username`, `date`) VALUES
(1, 'eg@gmail.com', 'student', 'admin', 'emy', '2018-08-19 08:52:08'),
(2, 'admin@admin.com', 'admin', 'admin', 'admin', '2018-08-19 00:00:00'),
(3, 'geestyz@cooltoad.com', 'teacher', 'admin', 'musodza', '2018-08-19 00:00:00'),
(4, 'gabela.musodza33@gmail.com', 'student', 'admin', 'admin', '2018-08-17 00:00:00'),
(5, 'amo@gmail.com', 'teacher', 'admin', 'amola', '2018-08-20 20:57:33'),
(6, 'tinashe@gmaill.com', 'admin', 'admin', 'tintin', '2018-08-21 23:13:45'),
(7, 'tinashe@gmail.com', 'admin', 'admin', 'tintin', '2018-08-21 23:14:31'),
(8, 'tino@gmail.com', 'teacher', 'admin', 'tino', '2018-08-21 23:17:19'),
(9, 'kudzi@gmail.com', 'student', 'admin', 'kudzai', '2018-08-21 23:50:35'),
(10, 'jj@gmail.com', 'student', 'admin', 'jona', '2018-08-22 16:52:37'),
(11, 'rine@gmail.com', 'student', 'admin', 'ranga', '2018-09-07 15:06:59');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `c_fk_marks_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `studentmarks`
--
ALTER TABLE `studentmarks`
  ADD CONSTRAINT `c_fk_studentmarks_course_id` FOREIGN KEY (`course`) REFERENCES `course` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `c_fk_uploads_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
