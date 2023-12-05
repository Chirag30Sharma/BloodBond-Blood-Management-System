-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql12.freemysqlhosting.net
-- Generation Time: Aug 27, 2023 at 05:14 PM
-- Server version: 8.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql12647690`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_registration`
--

CREATE TABLE `admin_registration` (
  `org_name` varchar(200) NOT NULL,
  `org_add` varchar(200) NOT NULL,
  `org_no` varchar(200) NOT NULL,
  `website_url` varchar(200) NOT NULL,
  `org_email` varchar(200) NOT NULL,
  `org_pass` varchar(200) NOT NULL,
  `org_type` varchar(200) NOT NULL,
  `org_license_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- Dumping data for table `admin_registration`
--

INSERT INTO `admin_registration` (`org_name`, `org_add`, `org_no`, `website_url`, `org_email`, `org_pass`, `org_type`, `org_license_no`) VALUES
('KJ Somaiya', 'Sion, Mumbai', '221901', 'sion.somaiya.edu', 'admin.kjsh@somaiya.edu', 'somaiya123', 'Hospital', 'H1023L');

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp`
--

CREATE TABLE `bloodcamp` (
  `org_email` varchar(200) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `iframe` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `contact_info` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- Dumping data for table `bloodcamp`
--

INSERT INTO `bloodcamp` (`org_email`, `org_name`, `date`, `address`, `location`, `iframe`, `contact_info`, `content`) VALUES
('admin.kjsh@somaiya.edu', 'KJ Somaiya', '2023-07-21', 'Vidyanagar, Vidya Vihar East, Vidyavihar, Mumbai, Maharashtra 400077', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15083.171062356223!2d72.8999262!3d19.072847!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c627a20bcaa9%3A0xb2fd3bcfeac0052a!2sK.%20J.%20Somaiya%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1689782563008!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '02266449191', '0'),
('admin.kjsh@somaiya.edu', 'KJ Somaiya', '2023-07-19', 'Vidyavihar, Mumbai', 'Vidyavihar', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15083.171062356223!2d72.8999262!3d19.072847!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c627a20bcaa9%3A0xb2fd3bcfeac0052a!2sK.%20J.%20Somaiya%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1689782563008!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '9876543210', '0'),
('admin.kjsh@somaiya.edu', 'KJ Somaiya', '2023-07-17', 'Mumbai', 'Ghatkopar', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15083.171062356223!2d72.8999262!3d19.072847!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c627a20bcaa9%3A0xb2fd3bcfeac0052a!2sK.%20J.%20Somaiya%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1689782563008!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '7390172901', 'Starts at 9 am');

-- --------------------------------------------------------

--
-- Table structure for table `Blood_Stock`
--

CREATE TABLE `Blood_Stock` (
  `org_email` varchar(200) NOT NULL,
  `a_pos` varchar(200) NOT NULL,
  `a_neg` varchar(200) NOT NULL,
  `b_pos` varchar(200) NOT NULL,
  `b_neg` varchar(200) NOT NULL,
  `o_pos` varchar(200) NOT NULL,
  `o_neg` varchar(200) NOT NULL,
  `ab_pos` varchar(200) NOT NULL,
  `ab_neg` varchar(200) NOT NULL,
  `reqbg` varchar(200) NOT NULL,
  `sufsup` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- Dumping data for table `Blood_Stock`
--

INSERT INTO `Blood_Stock` (`org_email`, `a_pos`, `a_neg`, `b_pos`, `b_neg`, `o_pos`, `o_neg`, `ab_pos`, `ab_neg`, `reqbg`, `sufsup`) VALUES
('admin.kjsh@somaiya.edu', '20', '10', '30', '40', '60', '20', '45', '32', '', 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `org_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `donate_platelets` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`org_name`, `date`, `address`, `user_email`, `user_name`, `donate_platelets`) VALUES
('KJ Somaiya', '2023-07-19', 'Vidyavihar, Mumbai</span>', 'sharmachirag393@gmail.com', 'xyz', '0'),
('KJ Somaiya', '2023-07-17', 'Mumbai</span>', 'vidhivk18@gmail.com', 'Vidhi', '0');

-- --------------------------------------------------------

--
-- Table structure for table `donor_registration`
--

CREATE TABLE `donor_registration` (
  `email` varchar(200) NOT NULL,
  `chronic` varchar(200) NOT NULL,
  `vices` varchar(200) NOT NULL,
  `covid_vaccine` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `last_donated` date NOT NULL,
  `cur_med` varchar(200) NOT NULL,
  `allergies` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `height` varchar(200) NOT NULL,
  `last_travel` varchar(200) NOT NULL,
  `emerg_name` varchar(200) NOT NULL,
  `emerg_cont` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- Dumping data for table `donor_registration`
--

INSERT INTO `donor_registration` (`email`, `chronic`, `vices`, `covid_vaccine`, `last_donated`, `cur_med`, `allergies`, `weight`, `height`, `last_travel`, `emerg_name`, `emerg_cont`) VALUES
('sharmachirag393@gmail.com', 'none', 'No', 'Yes', '2023-07-02', 'none', 'yes', '70', '200', '2023-07-16', 'Me', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobileno` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `bloodgroup` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `isdonor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `dob`, `email`, `mobileno`, `gender`, `bloodgroup`, `locality`, `pincode`, `password`, `isdonor`) VALUES
('sdfh', '2001-02-12', 'abc@gmail.com', '7016309073', 'Male', 'B+', 'Mumbai', '400077', 'Ch@300703', '1'),
('xyz', '2003-02-10', 'sharmachirag393@gmail.com', '7016309073', 'Male', 'B+', 'Mumbai', '400086', 'Chirag@2023', '0'),
('Vidhi', '2003-03-05', 'vidhivk18@gmail.com', '9879470266', 'Female', 'O+', 'Ghatkopar', '400077', 'Qazplm18@', '1');

-- --------------------------------------------------------

--
-- Table structure for table `platelet_donors`
--

CREATE TABLE `platelet_donors` (
  `email` varchar(200) NOT NULL,
  `answer1` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `answer2` varchar(200) NOT NULL,
  `answer3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `org_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `blood_group` varchar(200) NOT NULL,
  `government_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`org_name`, `user_email`, `blood_group`, `government_id`) VALUES
('KJ Somaiya', 'sharmachirag393@gmail.com', 'ab_pos', 'AKIOE5033H');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`email`) VALUES
('ady.ved@gmail.com'),
('keval10@somaiya.edu'),
('rugved.palodkar@gmail.com'),
('sharmachirag393@gmail.com'),
('vedantikasingh74@gmail.com'),
('vidhi05@somaiya.edu'),
('vidhivk@gmail.com'),
('vidhivk18@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_registration`
--
ALTER TABLE `admin_registration`
  ADD PRIMARY KEY (`org_email`),
  ADD UNIQUE KEY `org_license_no` (`org_license_no`);

--
-- Indexes for table `Blood_Stock`
--
ALTER TABLE `Blood_Stock`
  ADD PRIMARY KEY (`org_email`);

--
-- Indexes for table `donor_registration`
--
ALTER TABLE `donor_registration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
