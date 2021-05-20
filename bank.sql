-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 07:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_number` int(15) NOT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `date_of_creation` datetime DEFAULT current_timestamp(),
  `balance` int(10) DEFAULT 0,
  `branch_id` int(10) DEFAULT NULL,
  `application_status` varchar(20) DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_number`, `customer_id`, `type`, `date_of_creation`, `balance`, `branch_id`, `application_status`) VALUES
(1000001, 1001, 'Savings', '2021-05-20 22:50:31', 1008900, 101, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `account_holder`
--

CREATE TABLE `account_holder` (
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(30) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `email_id` varchar(20) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_holder`
--

INSERT INTO `account_holder` (`customer_id`, `customer_name`, `Username`, `date_of_birth`, `pincode`, `gender`, `email_id`, `phone_number`) VALUES
(1001, 'customer', 'customer', '2002-05-01', 12345, 'Female', 'customer@gmail.com', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `account_holder_login`
--

CREATE TABLE `account_holder_login` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_holder_login`
--

INSERT INTO `account_holder_login` (`username`, `password`) VALUES
('customer', '91ec1f9324753048c0096d036a694f86');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(10) NOT NULL,
  `branch_name` varchar(20) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `opening_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `pincode`, `opening_date`) VALUES
(101, 'Chennai', 54321, '2021-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_number` int(15) NOT NULL,
  `card_type` varchar(10) DEFAULT NULL,
  `pin` int(15) DEFAULT NULL,
  `cvv` int(5) DEFAULT NULL,
  `exp_date` date DEFAULT '2030-05-01',
  `account_number` int(15) DEFAULT NULL,
  `application_status` varchar(20) DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_number`, `card_type`, `pin`, `cvv`, `exp_date`, `account_number`, `application_status`) VALUES
(123456, 'Debit', 1234, 123, '2030-05-01', 1000001, 'Approved'),
(654321, 'Debit', 1234, 123, '2030-05-01', 1000001, 'Processing'),
(45612312, 'Debit', 1234, 123, '2030-05-01', 1000001, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_id` int(20) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `deposit_term` int(5) DEFAULT NULL,
  `interest` decimal(5,2) DEFAULT 4.00,
  `deposit_date` date DEFAULT current_timestamp(),
  `account_number` int(15) DEFAULT NULL,
  `application_status` varchar(20) DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`deposit_id`, `amount`, `deposit_term`, `interest`, `deposit_date`, `account_number`, `application_status`) VALUES
(100007, 10000, 2, '4.00', '2021-05-20', 1000001, 'Rejected'),
(100008, 5000, 1, '4.00', '2021-05-20', 1000001, 'Approved'),
(100009, 500000, 6, '4.00', '2021-05-20', 1000001, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(20) NOT NULL,
  `emp_name` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `application_status` varchar(20) DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `username`, `position`, `branch_id`, `application_status`) VALUES
(10001, 'employee', 'employee', 'Manager', 101, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_id` int(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email_id` varchar(20) DEFAULT NULL,
  `phone_number` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `gender`, `email_id`, `phone_number`) VALUES
(10001, 'Male', 'employee@gmail.com', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `employee_login`
--

CREATE TABLE `employee_login` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_login`
--

INSERT INTO `employee_login` (`username`, `password`) VALUES
('employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(10) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `approval_date` date DEFAULT NULL,
  `loan_term` int(5) DEFAULT NULL,
  `interest` decimal(5,2) DEFAULT NULL,
  `installments` int(5) DEFAULT NULL,
  `installment_money` int(10) DEFAULT NULL,
  `account_number` int(15) DEFAULT NULL,
  `application_status` varchar(20) DEFAULT 'Processing',
  `installments_paid` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `amount`, `approval_date`, `loan_term`, `interest`, `installments`, `installment_money`, `account_number`, `application_status`, `installments_paid`) VALUES
(100013, 10000, '2021-05-20', 2, '6.25', 10, 1000, 1000001, 'Approved', 0),
(100014, 50000, '2021-05-20', 5, '3.02', 20, 2500, 1000001, 'Processing', 0),
(100015, 10000, '2021-05-20', 3, '5.00', 6, 1667, 1000001, 'Rejected', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `type` varchar(20) DEFAULT NULL,
  `interest` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_type`
--

INSERT INTO `loan_type` (`type`, `interest`) VALUES
('Gold Loan', '7.25'),
('House Loan', '5.00'),
('Car Loan', '6.25'),
('Education Loan', '3.02');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(10) NOT NULL,
  `trans_type` varchar(15) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `trans_time` datetime DEFAULT current_timestamp(),
  `account_number` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `trans_type`, `amount`, `trans_time`, `account_number`) VALUES
(10009, 'Withdrawal', 100, '2021-05-20 22:55:51', 1000001),
(10010, 'Deposit', 10000, '2021-05-20 22:55:58', 1000001),
(10011, 'Withdrawal-ATM', 1000, '2021-05-20 23:14:10', 1000001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_number`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `account_holder`
--
ALTER TABLE `account_holder`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `account_holder_login`
--
ALTER TABLE `account_holder_login`
  ADD KEY `username` (`username`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD UNIQUE KEY `branch_name` (`branch_name`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_number`),
  ADD KEY `account_number` (`account_number`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_id`),
  ADD KEY `account_number` (`account_number`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee_login`
--
ALTER TABLE `employee_login`
  ADD KEY `username` (`username`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `account_number` (`account_number`);

--
-- Indexes for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD UNIQUE KEY `type` (`type`),
  ADD UNIQUE KEY `type_2` (`type`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `account_number` (`account_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100010;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100016;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10012;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `account_holder` (`customer_id`);

--
-- Constraints for table `account_holder_login`
--
ALTER TABLE `account_holder_login`
  ADD CONSTRAINT `account_holder_login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account_holder` (`Username`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `account` (`account_number`);

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `account` (`account_number`);

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `employee_details_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `employee_login`
--
ALTER TABLE `employee_login`
  ADD CONSTRAINT `employee_login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `employee` (`username`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `account` (`account_number`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `account` (`account_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
