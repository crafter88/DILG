-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 04:18 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dilg`
--
CREATE DATABASE IF NOT EXISTS `dilg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dilg`;

-- --------------------------------------------------------

--
-- Table structure for table `asset_inventory`
--

CREATE TABLE `asset_inventory` (
  `asset_no` varchar(45) NOT NULL,
  `asset_name` varchar(45) NOT NULL,
  `asset_description` varchar(45) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `distinction_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_inventory`
--

INSERT INTO `asset_inventory` (`asset_no`, `asset_name`, `asset_description`, `emp_id`, `distinction_no`) VALUES
('1', 'Laptop', 'Dell Inspiron', NULL, '23456789asd');

-- --------------------------------------------------------

--
-- Table structure for table `asset_part`
--

CREATE TABLE `asset_part` (
  `asset_part_no` varchar(45) NOT NULL,
  `asset_part_name` varchar(45) DEFAULT NULL,
  `asset_part_description` varchar(45) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `asset_no` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'GSS'),
(2, 'Accounting'),
(3, 'IT'),
(4, 'Department 1'),
(5, 'Department 2');

-- --------------------------------------------------------

--
-- Table structure for table `disposed`
--

CREATE TABLE `disposed` (
  `wmr_no` varchar(45) NOT NULL,
  `employee` int(11) NOT NULL,
  `asset_no` varchar(45) NOT NULL,
  `date_disposed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disposed_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iar`
--

CREATE TABLE `iar` (
  `id` int(11) NOT NULL,
  `iar_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  `po_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` varchar(45) NOT NULL,
  `employee_a` varchar(45) NOT NULL,
  `employee_b` varchar(45) NOT NULL,
  `emp_no` varchar(45) NOT NULL,
  `asset_no` varchar(45) NOT NULL,
  `asset_name` varchar(45) NOT NULL,
  `asset_description` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modifed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_cost` float NOT NULL,
  `total_cost` float NOT NULL,
  `form_type` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `form_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `qty`, `unit_cost`, `total_cost`, `form_type`, `source`, `item_type`, `form_id`, `filename`) VALUES
(1, 'Pencil', 'Mongol, No. 2', 10, 5, 50, 'po', 'csv', 'supply', 1, ''),
(2, 'Bond Paper', 'Multipurpose legal, 70gsm.', 300, 1, 300, 'po', 'csv', 'supply', 1, ''),
(3, 'Printer', 'Inkjet Laser Printer, black', 2, 3000, 6000, 'po', 'csv', 'supply', 1, ''),
(4, 'Tape', 'Double-Sided Tape, 2inches', 10, 20, 200, 'po', 'csv', 'supply', 1, ''),
(5, 'Paper Clip', 'Multicolored Paper, 500pcs', 50, 25, 1250, 'po', 'csv', 'supply', 1, ''),
(6, 'Stapler', 'Swingline Heavy Duty, black', 10, 100, 1000, 'po', 'csv', 'supply', 1, ''),
(7, 'Stapler Remover', 'Office Depot Stapler, black', 3, 25, 75, 'po', 'csv', 'supply', 1, ''),
(8, 'Table', '2072 Office Table Wenge, black', 5, 3000, 15000, 'po', 'csv', 'supply', 1, ''),
(9, 'Table', 'Table 2072 Office Table, gray', 5, 3000, 15000, 'po', 'csv', 'supply', 1, ''),
(10, 'Chair', 'Q6A Mesh Chair, white', 5, 3000, 15000, 'po', 'csv', 'supply', 1, ''),
(11, 'Pencil', 'Mongol, No. 2', 10, 5, 50, 'ppmp', 'csv', 'supply', 2, ''),
(12, 'Bond Paper', 'Multipurpose legal, 70gsm.', 300, 1, 300, 'ppmp', 'csv', 'supply', 2, ''),
(13, 'Printer', 'Inkjet Laser Printer, black', 2, 3000, 6000, 'ppmp', 'csv', 'supply', 2, ''),
(14, 'Tape', 'Double-Sided Tape, 2inches', 10, 20, 200, 'ppmp', 'csv', 'supply', 2, ''),
(15, 'Paper Clip', 'Multicolored Paper, 500pcs', 50, 25, 1250, 'ppmp', 'csv', 'supply', 2, ''),
(16, 'Stapler', 'Swingline Heavy Duty, black', 10, 100, 1000, 'ppmp', 'csv', 'supply', 2, ''),
(17, 'Stapler Remover', 'Office Depot Stapler, black', 3, 25, 75, 'ppmp', 'csv', 'supply', 2, ''),
(18, 'Table', '2072 Office Table Wenge, black', 5, 3000, 15000, 'ppmp', 'csv', 'supply', 2, ''),
(19, 'Table', 'Table 2072 Office Table, gray', 5, 3000, 15000, 'ppmp', 'csv', 'supply', 2, ''),
(20, 'Chair', 'Q6A Mesh Chair, white', 5, 3000, 15000, 'ppmp', 'csv', 'supply', 2, ''),
(41, 'Pencil', 'Mongol, No. 2', 10, 5, 50, 'ppmp', 'csv', 'supply', 5, ''),
(42, 'Bond Paper', 'Multipurpose legal, 70gsm.', 300, 1, 300, 'ppmp', 'csv', 'supply', 5, ''),
(43, 'Printer', 'Inkjet Laser Printer, black', 2, 3000, 6000, 'ppmp', 'csv', 'supply', 5, ''),
(44, 'Tape', 'Double-Sided Tape, 2inches', 10, 20, 200, 'ppmp', 'csv', 'supply', 5, ''),
(45, 'Paper Clip', 'Multicolored Paper, 500pcs', 50, 25, 1250, 'ppmp', 'csv', 'supply', 5, ''),
(46, 'Stapler', 'Swingline Heavy Duty, black', 10, 100, 1000, 'ppmp', 'csv', 'supply', 5, ''),
(47, 'Stapler Remover', 'Office Depot Stapler, black', 3, 25, 75, 'ppmp', 'csv', 'supply', 5, ''),
(48, 'Table', '2072 Office Table Wenge, black', 5, 3000, 15000, 'ppmp', 'csv', 'supply', 5, ''),
(49, 'Table', 'Table 2072 Office Table, gray', 5, 3000, 15000, 'ppmp', 'csv', 'supply', 5, ''),
(50, 'Chair', 'Q6A Mesh Chair, white', 5, 3000, 15000, 'ppmp', 'csv', 'supply', 5, ''),
(51, 'Planner', 'Cagie Brand Business Planner, black', 3, 200, 600, 'ppmp', 'csv', 'supply', 6, ''),
(52, 'Envelope', 'Expanding envelope with handle, legal', 10, 5, 50, 'ppmp', 'csv', 'supply', 6, ''),
(53, 'Marker', 'Whiteboard Marker, black', 10, 29, 290, 'ppmp', 'csv', 'supply', 6, ''),
(54, 'Ballpen', 'HBW, black', 5, 5, 25, 'ppmp', 'csv', 'supply', 6, ''),
(55, 'Ballpen', 'HBW, red', 5, 5, 25, 'ppmp', 'csv', 'supply', 6, ''),
(56, 'Sticky Note', '2x3 inches, colored', 1, 5, 5, 'ppmp', 'csv', 'supply', 6, ''),
(57, 'Chalk', 'Blackboard Chalk, white', 10, 100, 1000, 'ppmp', 'csv', 'supply', 6, ''),
(58, 'Correction Fluid', 'Papermate Correction Fluid, white', 10, 50, 1500, 'ppmp', 'csv', 'supply', 6, ''),
(59, 'Correction Tape', 'Plus Correction Tape, 5mm', 5, 80, 400, 'ppmp', 'csv', 'supply', 6, ''),
(60, 'Eraser', 'Mongol Eraser, small', 5, 20, 100, 'ppmp', 'csv', 'supply', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `oejwo`
--

CREATE TABLE `oejwo` (
  `oejwo_no` varchar(45) NOT NULL,
  `employee` varchar(45) NOT NULL,
  `emp_no` varchar(45) NOT NULL,
  `asset_no` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) NOT NULL,
  `wmr_no` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `par`
--

CREATE TABLE `par` (
  `id` int(11) NOT NULL,
  `par_no` varchar(45) NOT NULL,
  `asset_no` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date DEFAULT NULL,
  `emp_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` int(11) NOT NULL,
  `pc_no` varchar(45) NOT NULL,
  `asset_no` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  `iar_status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `po_no`, `status`, `date_created`, `date_modified`, `iar_status`, `user_id`, `modified_by`, `supplier`, `source`, `purpose`) VALUES
(1, '16-06-1', 'pending', '2016-06-12', '0000-00-00', '', 3, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ppe`
--

CREATE TABLE `ppe` (
  `ppe_no` varchar(45) NOT NULL,
  `employee` varchar(45) NOT NULL,
  `asset_no` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppmp`
--

CREATE TABLE `ppmp` (
  `ppmp_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppmp`
--

INSERT INTO `ppmp` (`ppmp_id`, `year`, `quarter`, `dept_id`, `flag`, `filename`) VALUES
(1, '2016', 4, 1, 0, ''),
(2, '2016', 4, 1, 0, ''),
(5, '2016', 1, 1, 0, 'Abstract.csv'),
(6, '2016', 2, 1, 1, 'Abstract2.csv');

-- --------------------------------------------------------

--
-- Table structure for table `ris`
--

CREATE TABLE `ris` (
  `id` int(11) NOT NULL,
  `ris_no` varchar(255) DEFAULT NULL,
  `sai_no` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sai`
--

CREATE TABLE `sai` (
  `id` int(11) NOT NULL,
  `sai_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `ris_status` varchar(45) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supply_inventory`
--

CREATE TABLE `supply_inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_cost` float NOT NULL,
  `total_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply_inventory`
--

INSERT INTO `supply_inventory` (`id`, `name`, `description`, `qty`, `unit_cost`, `total_cost`) VALUES
(1, 'Coupon', 'Long', 300, 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` int(11) NOT NULL,
  `access_level` varchar(255) NOT NULL,
  `position` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `username`, `password`, `department`, `access_level`, `position`) VALUES
(1, 'gsshead', 'b347807626c9f96adc1582e47f5207b3', 1, 'head', 'GSS Head'),
(2, 'ithead', 'c6fcb75a09165d75e74fbabcb0af70b5', 3, 'head', 'GSS Head'),
(3, 'user 2', 'c1a14abfddf5af4cdc6c5a3c04b98149', 5, 'head', 'department user 2');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_account` int(11) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `home_addr` varchar(225) DEFAULT NULL,
  `tel_no` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `firstname`, `middlename`, `lastname`, `user_account`, `user_image`, `home_addr`, `tel_no`, `email`) VALUES
(1, 'Carl', 'Thomas', 'Rivera', 1, '1.png', 'Baguio City', 0, NULL),
(2, 'James', 'Abueva', 'Garcia', 2, '2.png', 'Baguio City', NULL, NULL),
(3, 'firstname 2', 'middlename 2', 'lastname 2', 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wmr`
--

CREATE TABLE `wmr` (
  `wmr_no` varchar(45) NOT NULL,
  `asset_no` varchar(45) NOT NULL,
  `emp_no` varchar(45) NOT NULL,
  `employee` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_inventory`
--
ALTER TABLE `asset_inventory`
  ADD PRIMARY KEY (`asset_no`),
  ADD KEY `emp_id_idx` (`emp_id`);

--
-- Indexes for table `asset_part`
--
ALTER TABLE `asset_part`
  ADD PRIMARY KEY (`asset_part_no`),
  ADD KEY `asset_idx` (`asset_no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposed`
--
ALTER TABLE `disposed`
  ADD PRIMARY KEY (`wmr_no`),
  ADD KEY `wmr_disposed_idx` (`wmr_no`),
  ADD KEY `emp_id_idx` (`employee`),
  ADD KEY `emp_idx` (`employee`);

--
-- Indexes for table `iar`
--
ALTER TABLE `iar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_id_idx` (`po_id`),
  ADD KEY `po_id2_idx` (`po_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD KEY `emp_a_idx` (`employee_a`),
  ADD KEY `asset_no_idx` (`asset_no`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oejwo`
--
ALTER TABLE `oejwo`
  ADD KEY `wmr_no_idx` (`wmr_no`),
  ADD KEY `asset_no_idx` (`asset_no`),
  ADD KEY `asset_no2_idx` (`asset_no`);

--
-- Indexes for table `par`
--
ALTER TABLE `par`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id_idx` (`emp_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppmp`
--
ALTER TABLE `ppmp`
  ADD PRIMARY KEY (`ppmp_id`);

--
-- Indexes for table `ris`
--
ALTER TABLE `ris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sai`
--
ALTER TABLE `sai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_inventory`
--
ALTER TABLE `supply_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_idx` (`id`),
  ADD KEY `dept_idx1` (`department`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`user_account`);

--
-- Indexes for table `wmr`
--
ALTER TABLE `wmr`
  ADD PRIMARY KEY (`wmr_no`),
  ADD KEY `asset_no_idx` (`asset_no`),
  ADD KEY `asset_no2_idx` (`asset_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `iar`
--
ALTER TABLE `iar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `par`
--
ALTER TABLE `par`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ppmp`
--
ALTER TABLE `ppmp`
  MODIFY `ppmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ris`
--
ALTER TABLE `ris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sai`
--
ALTER TABLE `sai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supply_inventory`
--
ALTER TABLE `supply_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset_inventory`
--
ALTER TABLE `asset_inventory`
  ADD CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `user_profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `disposed`
--
ALTER TABLE `disposed`
  ADD CONSTRAINT `emp` FOREIGN KEY (`employee`) REFERENCES `user_profile` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wmr_disposed` FOREIGN KEY (`wmr_no`) REFERENCES `wmr` (`wmr_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `iar`
--
ALTER TABLE `iar`
  ADD CONSTRAINT `po_id` FOREIGN KEY (`po_id`) REFERENCES `po` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `asset_no` FOREIGN KEY (`asset_no`) REFERENCES `asset_inventory` (`asset_no`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
