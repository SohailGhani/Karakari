-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 11:39 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `karakari`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `acId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `nic` varchar(255) NOT NULL,
  `entryDate` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  PRIMARY KEY (`acId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acId`, `name`, `address`, `nic`, `entryDate`, `phone`, `email`, `fax`, `balance`) VALUES
(147, 'al badar ', 'gelama das das dasd asd asd as dasdas dasdasd', '0', '2016-11-19', '', '', '', 27056),
(148, 'test', 'sdf km  k', '0', '2016-11-01', '3434', 'bil_haz@yahoo.com', '090', 500),
(1000, 'shah wazir', 'sdf km  k', '0', '2016-11-01', '3434', 'bil_haz@yahoo.com', '090', 50);

-- --------------------------------------------------------

--
-- Table structure for table `banks_total`
--

CREATE TABLE IF NOT EXISTS `banks_total` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(155) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `banks_total`
--

INSERT INTO `banks_total` (`id`, `bank_name`, `total`) VALUES
(1, 'faysal_faisal', 488),
(2, 'faysal_shah_wazir', 600000),
(3, 'alfalah_faisal', 500000),
(4, 'alfalah_shah_wazir', 500000),
(5, 'meezan_shah_wazir', 500200),
(6, 'meezan_faisal', 6500),
(7, 'cash', 11944);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transactions`
--

CREATE TABLE IF NOT EXISTS `bank_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(155) NOT NULL,
  `deposite` double NOT NULL DEFAULT '0',
  `withdraw` double NOT NULL DEFAULT '0',
  `doneBy` varchar(155) NOT NULL,
  `date` date NOT NULL,
  `balance` double NOT NULL,
  `transId` int(25) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `bank_transactions`
--

INSERT INTO `bank_transactions` (`id`, `bank_name`, `deposite`, `withdraw`, `doneBy`, `date`, `balance`, `transId`, `comment`) VALUES
(1, 'cash', 6, 0, '148', '2017-07-25', 12036, 91, ''),
(2, 'cash', 6, 0, '148', '2017-07-25', 12042, 92, ''),
(4, '7', 0, 7, '', '2017-08-16', 0, 6, 'checking'),
(5, '7', 0, 12, '', '2017-08-16', 0, 7, 'checking 2'),
(6, '1', 0, 12, '', '2017-08-16', 0, 8, 'checking 3'),
(7, '7', 0, 13, '', '2017-08-16', 0, 9, 'dcsjlfjs'),
(8, '7', 0, 7, '', '2017-08-16', 0, 15, 'check 5'),
(15, '7', 0, 12, '', '2017-08-17', 0, 22, 'check 9');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(255) NOT NULL,
  `itemQuantity` double NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=161 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `itemName`, `itemQuantity`, `date`) VALUES
(159, '61 pieces bone GP dinner', 65, '2016-11-07'),
(160, 'Dinner SET 73 pieces bone square', -19, '2016-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `payeesaccounts`
--

CREATE TABLE IF NOT EXISTS `payeesaccounts` (
  `acId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `nic` varchar(255) NOT NULL,
  `entryDate` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  PRIMARY KEY (`acId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payeesaccounts`
--

INSERT INTO `payeesaccounts` (`acId`, `name`, `address`, `nic`, `entryDate`, `phone`, `email`, `fax`, `balance`) VALUES
(1, 'Sohail', 'Pakistan', '93274972394', '2017-08-15', '323525', 'sohail@gmai.com', 'fcee', -111);

-- --------------------------------------------------------

--
-- Table structure for table `payeestransection`
--

CREATE TABLE IF NOT EXISTS `payeestransection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paidAmount` int(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `paidby` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `balance` int(100) NOT NULL,
  `acId` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `payeestransection`
--

INSERT INTO `payeestransection` (`id`, `paidAmount`, `description`, `paidby`, `date`, `balance`, `acId`) VALUES
(22, 12, 'check 9', '7', '2017-08-17', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE IF NOT EXISTS `stockin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemId` int(11) NOT NULL,
  `inDate` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `lastStockin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`id`, `itemId`, `inDate`, `quantity`, `lastStockin`) VALUES
(1, 159, '2016-11-24', 90, 0),
(2, 159, '2016-11-24', 90, 0),
(3, 159, '2016-11-24', 90, 0),
(4, 159, '2016-11-18', 85, 0),
(5, 159, '2017-08-15', 6, 0),
(6, 159, '2017-08-30', 5, 0),
(7, 159, '2017-08-15', 5, 0),
(8, 159, '2017-08-15', 5, 0),
(9, 159, '2017-08-15', 5, 0),
(10, 159, '2017-08-15', 5, 60),
(11, 160, '2017-08-15', 5, 65);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `transId` int(55) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(155) NOT NULL,
  `acId` int(11) NOT NULL,
  `transactionDate` date NOT NULL,
  `total` double NOT NULL,
  `paid` double NOT NULL,
  `depositMethod` varchar(55) NOT NULL,
  `balance` double NOT NULL,
  `depositAmount` double NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `lastBalance` double NOT NULL,
  `transactionForm` tinyint(4) NOT NULL,
  PRIMARY KEY (`transId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transId`, `invoice`, `acId`, `transactionDate`, `total`, `paid`, `depositMethod`, `balance`, `depositAmount`, `discount`, `lastBalance`, `transactionForm`) VALUES
(91, '456', 148, '2017-07-25', 6, 6, 'cash', 0, 0, 2, 500, 1),
(92, '459', 148, '2017-07-25', 6, 6, 'cash', 0, 0, 2, 500, 1),
(90, '456', 148, '2017-07-25', 6, 6, 'cash', 0, 0, 2, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_metas`
--

CREATE TABLE IF NOT EXISTS `transaction_metas` (
  `metaId` int(55) NOT NULL AUTO_INCREMENT,
  `items` int(55) NOT NULL,
  `tquantity` int(55) NOT NULL,
  `price` double NOT NULL,
  `per_price` double NOT NULL,
  `transId` int(55) NOT NULL,
  `lastStock` int(11) NOT NULL,
  PRIMARY KEY (`metaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `transaction_metas`
--

INSERT INTO `transaction_metas` (`metaId`, `items`, `tquantity`, `price`, `per_price`, `transId`, `lastStock`) VALUES
(61, 159, 8, 32, 4, 93, -34),
(60, 159, 1, 6, 6, 90, -26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `user_name`, `email`, `password`, `contact_no`) VALUES
(11, 'bil', 'bil_haz@yahoo.com', '040b7cf4a55014e185813e0644502ea9#ptc&mardan', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
