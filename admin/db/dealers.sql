-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2018 at 05:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `gender` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `pass`, `date`, `gender`) VALUES
(1, 'Hasan', '123456', '2017-07-31', 'Male'),
(2, 'Demo', '123456', '2017-08-20', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `gander` varchar(200) NOT NULL,
  `join_date` date NOT NULL,
  `type` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL,
  `division_id` int(200) NOT NULL,
  `district_id` int(200) NOT NULL,
  `thana_id` int(200) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `name`, `pass`, `address`, `email`, `phone`, `gander`, `join_date`, `type`, `addedby`, `division_id`, `district_id`, `thana_id`, `status`) VALUES
(1, 'admin', '123456', 'uttara', '', '', '', '2017-07-13', '0', 'admin', 0, 0, 0, 2),
(2, 'siyam', '123456', 'mirpur', '', '', '', '2017-07-16', 'dealer', 'admin', 0, 0, 0, 1),
(3, 'shoper', '123456', '', '', '', '', '2017-07-16', 'shoper', 'siyam', 0, 0, 0, 1),
(4, 'shoper1', '123456', '', '', '', '', '2017-07-28', 'shoper', 'siyam', 0, 0, 0, 1),
(9, 'Hasan', '12345', '', '', '', '', '2017-07-30', 'shoper', '', 0, 0, 0, 2),
(10, 'Jhone', '123456', 'mirpur', '', '', '', '2017-08-21', 'dealer', 'admin', 0, 0, 0, 2),
(11, 'testdealer', '123456', 'ghlshan', 'testdealer@gmail.com', '01735623513', 'on', '0000-00-00', '1', '', 1, 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(200) NOT NULL,
  `division_id` int(255) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Gazipur', 1, '2018-02-11', ''),
(2, 'NarayanGong', 1, '2018-02-11', ''),
(3, 'Dhaka', 1, '2018-02-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `d_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`d_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2018-02-11', ''),
(2, 'Rajshahi', '2018-02-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `users` varchar(200) NOT NULL,
  `totall_amount` int(200) NOT NULL,
  `payment` int(200) NOT NULL,
  `due` int(200) NOT NULL,
  `recievedby` varchar(200) NOT NULL,
  `payment_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `users`, `totall_amount`, `payment`, `due`, `recievedby`, `payment_date`) VALUES
(1, 'siyam', 57500, 20, 57480, 'admin', '2017-07-30'),
(2, 'shoper', 1040, 1000, 40, 'siyam', '2017-07-30'),
(3, 'siyam', 2538230, 20000, 2518230, 'admin', '2017-08-19'),
(7, 'Hasan', 35027, 20000, 15027, 'siyam', '2017-08-19'),
(8, 'Hasan', 35027, 35027, 0, 'siyam', '2017-08-19'),
(9, 'shoper', 8156, 8156, 0, 'siyam', '2017-08-20'),
(10, 'Hasan', 35027, 35027, 0, 'siyam', '2017-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `product_category` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `price` int(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  `imgpath` varchar(200) NOT NULL,
  `imagefile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `product_category`, `date`, `price`, `quantity`, `imgpath`, `imagefile`) VALUES
(9, 'chair', 'visitor chair', '2017-07-07', 500, 50, '../img/products/shirin30-07-2017-1501392484.jpg', '30-07-2017-1501392484.jpg'),
(10, 'table box', '', '2017-07-13', 50, 50, '../img/products/shirin30-07-2017-1501392756.jpg', '30-07-2017-1501392756.jpg'),
(12, 'mango', 'director table', '2017-07-13', 555, 50, '../img/products/shirin30-07-2017-1501392912.jpg', '30-07-2017-1501392912.jpg'),
(13, 'ShowCase', 'computer table', '2017-08-06', 6500, 50, '../img/products/shirin06-08-2017-1501991530.jpg', '06-08-2017-1501991530.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `p_distribution`
--

CREATE TABLE `p_distribution` (
  `id` int(11) NOT NULL,
  `p_id` varchar(200) NOT NULL,
  `dealer_id` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `profitepercen` varchar(200) NOT NULL,
  `distributedate` date NOT NULL,
  `distributedby` varchar(200) NOT NULL,
  `comission` int(200) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_distribution`
--

INSERT INTO `p_distribution` (`id`, `p_id`, `dealer_id`, `quantity`, `price`, `profitepercen`, `distributedate`, `distributedby`, `comission`, `start_date`, `end_date`) VALUES
(1, '10,13', '3', '2,2', '50,6500', '3,2', '2018-02-13', 'tota', 23, '2018-02-13', '2018-02-23'),
(2, '12,10,13', '11', '2,2,2', '555,50,6500', '2,3,2', '2018-02-13', 'tota', 25, '2018-02-13', '2018-02-20'),
(3, '10,13', '11', '3,2', '50,6500', '2,3', '2018-02-13', 'tota', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_sell`
--

CREATE TABLE `p_sell` (
  `id` int(11) NOT NULL,
  `p_id` varchar(200) NOT NULL,
  `p_prize` varchar(200) NOT NULL,
  `p_quantity` varchar(200) NOT NULL,
  `totall_prize` varchar(200) NOT NULL,
  `users` varchar(200) NOT NULL,
  `sel_date_time` date NOT NULL,
  `activation` int(10) NOT NULL DEFAULT '0',
  `dealer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_sell`
--

INSERT INTO `p_sell` (`id`, `p_id`, `p_prize`, `p_quantity`, `totall_prize`, `users`, `sel_date_time`, `activation`, `dealer`) VALUES
(1, 'Chaitali', '573.3', '2', '1146.6', 'shoper', '2017-07-24', 0, ''),
(2, 'Lolli pop', '701.064', '4', '2804.256', 'shoper', '2017-07-24', 0, ''),
(3, 'Lolli pop', '701.064', '6', '4206.384', 'shoper', '2017-07-25', 0, ''),
(4, 'Chaitali', '562.38', '23', '12934.74', 'shoper1', '2017-07-28', 0, ''),
(5, 'chair', '551.616', '34', '18754.944', 'Hasan', '2017-07-30', 1, ''),
(6, 'table', '53.04', '23', '1219.92', 'Hasan', '2017-07-30', 1, ''),
(7, 'table', '53.04', '3', '159.12', 'Hasan', '2017-07-30', 1, ''),
(8, 'chair', '551.616', '2', '1103.232', 'Hasan', '2017-08-08', 1, ''),
(9, 'ShowCase', '6895.2', '2', '13790.4', 'Hasan', '2017-08-08', 1, ''),
(10, 'ShowCase', '6895.2', '1', '6895.2', 'Hasan', '2017-08-22', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `date`, `gender`, `addedby`) VALUES
(1, 'MR jhon', '2017-07-14', 'Male', 'hasan'),
(2, 'Mr kali', '2017-07-14', 'Male', 'dealer'),
(3, 'Siyam', '2017-08-06', 'Male', 'siyam');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `thana_id` int(11) NOT NULL,
  `thana_name` varchar(200) NOT NULL,
  `district_id` int(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`thana_id`, `thana_name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Uttara', 3, '2018-02-11', ''),
(2, 'Dhanmondi', 3, '2018-02-11', ''),
(3, 'Ghulshan-1', 3, '2018-02-11', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_distribution`
--
ALTER TABLE `p_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_sell`
--
ALTER TABLE `p_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`thana_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `p_distribution`
--
ALTER TABLE `p_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p_sell`
--
ALTER TABLE `p_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `thana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
