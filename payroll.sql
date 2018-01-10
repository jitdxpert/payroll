-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2018 at 11:26 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wisely`
--

-- --------------------------------------------------------

--
-- Table structure for table `wy_admin`
--

CREATE TABLE `wy_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_code` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_admin`
--

INSERT INTO `wy_admin` (`admin_id`, `admin_code`, `admin_name`, `admin_email`, `admin_password`, `admin_time`) VALUES
(1, 'WY00', 'Admin', 'jitdxpert@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-03-16 02:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `wy_attendance`
--

CREATE TABLE `wy_attendance` (
  `attendance_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL,
  `action_name` enum('punchin','punchout') NOT NULL,
  `action_time` time NOT NULL,
  `emp_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_employees`
--

CREATE TABLE `wy_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `merital_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `identity_doc` varchar(255) NOT NULL,
  `identity_no` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `pf_account` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_holidays`
--

CREATE TABLE `wy_holidays` (
  `holiday_id` int(11) NOT NULL,
  `holiday_title` varchar(255) NOT NULL,
  `holiday_desc` varchar(255) NOT NULL,
  `holiday_date` varchar(50) NOT NULL,
  `holiday_type` enum('compulsory','restricted') NOT NULL DEFAULT 'compulsory'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_holidays`
--

INSERT INTO `wy_holidays` (`holiday_id`, `holiday_title`, `holiday_desc`, `holiday_date`, `holiday_type`) VALUES
(1, 'Republic Day', 'Republic Day 2017', '01/26/2017', 'compulsory'),
(2, 'Mahashivratri', 'Mahashivratri 2017', '02/24/2017', 'restricted'),
(3, 'Holi', 'Holi 2017', '03/13/2017', 'restricted'),
(4, 'Ugadi', 'Ugadi 2017', '03/28/2017', 'restricted'),
(5, 'Ugadi', 'Ugadi 2017', '03/29/2017', 'restricted'),
(6, 'Bihu', 'Bihu 2017', '04/14/2017', 'restricted'),
(7, 'Labour Day', 'Labour Day 2017', '05/01/2017', 'compulsory'),
(8, 'Rakshabandha', 'Rakshabandha 2017', '08/07/2017', 'restricted'),
(9, 'Independence Day', 'Independence Day 2017', '08/15/2017', 'compulsory'),
(10, 'Ganesh Chathurthi', 'Ganesh Chathurthi 2017', '08/25/2017', 'restricted'),
(11, 'Saptami', 'Durga Puja (Saptami) 2017', '09/27/2017', 'restricted'),
(12, 'Ashtami', 'Durga Puja (Ashtami) 2017', '09/28/2017', 'restricted'),
(13, 'Navami', 'Durga Puja (Navami) 2017', '09/29/2017', 'restricted'),
(14, 'Dashami', 'Durga Puja (Dashami) 2017', '09/30/2017', 'restricted'),
(15, 'Gandhi Jayanti', 'Gandhi Jayanti 2017', '10/02/2017', 'compulsory'),
(16, 'Naraka Chaturdasi', 'Naraka Chaturdasi 2017', '10/18/2017', 'restricted'),
(17, 'Kali Puja', 'Kali Puja 2017', '10/19/2017', 'restricted'),
(18, 'Diwali', 'Diwali 2017', '10/20/2017', 'restricted'),
(19, 'Kannada Rajotsav', 'Kannada Rajotsav 2017', '11/01/2017', 'compulsory'),
(20, 'Christmas', 'Christmas', '12/25/2017', 'restricted');

-- --------------------------------------------------------

--
-- Table structure for table `wy_leaves`
--

CREATE TABLE `wy_leaves` (
  `leave_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `leave_subject` varchar(255) NOT NULL,
  `leave_dates` varchar(255) NOT NULL,
  `leave_message` longtext NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `leave_status` enum('pending','approve','reject') NOT NULL DEFAULT 'pending',
  `apply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_payheads`
--

CREATE TABLE `wy_payheads` (
  `payhead_id` int(11) NOT NULL,
  `payhead_name` varchar(255) NOT NULL,
  `payhead_desc` varchar(255) NOT NULL,
  `payhead_type` enum('earnings','deductions') NOT NULL DEFAULT 'earnings'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_payheads`
--

INSERT INTO `wy_payheads` (`payhead_id`, `payhead_name`, `payhead_desc`, `payhead_type`) VALUES
(1, 'Basic Salary', 'Basic Salary', 'earnings'),
(2, 'Dearness Allowance', 'Dearness Allowance', 'earnings'),
(3, 'House Rent Allowance', 'House Rent Allowance', 'earnings'),
(4, 'Conveyance Allowance', 'Conveyance Allowance', 'earnings'),
(5, 'Medical Allowance', 'Medical Allowance', 'earnings'),
(6, 'Computer & Internet Allowance', 'Computer & Internet Allowance', 'earnings'),
(7, 'Overtime', 'Overtime', 'earnings'),
(8, 'Traveling Expenses', 'Traveling Expenses', 'earnings'),
(9, 'Loans & Advance', 'Loans & Advance', 'earnings'),
(10, 'Other Allowance', 'Other Allowance', 'earnings'),
(11, 'Professional Tax', 'Professional Tax', 'deductions'),
(12, 'Income Tax', 'Income Tax', 'deductions'),
(13, 'Employee Provident Fund', 'Employee Provident Fund', 'deductions'),
(14, 'Loans & Advance', 'Loans & Advance', 'deductions'),
(15, 'Other Deductions', 'Other Deductions', 'deductions');

-- --------------------------------------------------------

--
-- Table structure for table `wy_pay_structure`
--

CREATE TABLE `wy_pay_structure` (
  `salary_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `payhead_id` int(11) NOT NULL,
  `default_salary` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_salaries`
--

CREATE TABLE `wy_salaries` (
  `salary_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `payhead_name` varchar(255) NOT NULL,
  `pay_amount` float(11,2) NOT NULL,
  `earning_total` float(11,2) NOT NULL,
  `deduction_total` float(11,2) NOT NULL,
  `net_salary` float(11,2) NOT NULL,
  `pay_type` enum('earnings','deductions') NOT NULL,
  `pay_month` varchar(255) NOT NULL,
  `generate_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wy_admin`
--
ALTER TABLE `wy_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_code` (`admin_code`);

--
-- Indexes for table `wy_attendance`
--
ALTER TABLE `wy_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_employees`
--
ALTER TABLE `wy_employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_holidays`
--
ALTER TABLE `wy_holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `wy_leaves`
--
ALTER TABLE `wy_leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `wy_payheads`
--
ALTER TABLE `wy_payheads`
  ADD PRIMARY KEY (`payhead_id`);

--
-- Indexes for table `wy_pay_structure`
--
ALTER TABLE `wy_pay_structure`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_code` (`emp_code`),
  ADD KEY `payhead_id` (`payhead_id`);

--
-- Indexes for table `wy_salaries`
--
ALTER TABLE `wy_salaries`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wy_admin`
--
ALTER TABLE `wy_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wy_attendance`
--
ALTER TABLE `wy_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wy_employees`
--
ALTER TABLE `wy_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wy_holidays`
--
ALTER TABLE `wy_holidays`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `wy_leaves`
--
ALTER TABLE `wy_leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wy_payheads`
--
ALTER TABLE `wy_payheads`
  MODIFY `payhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `wy_pay_structure`
--
ALTER TABLE `wy_pay_structure`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `wy_salaries`
--
ALTER TABLE `wy_salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;