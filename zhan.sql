-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2022 at 11:51 AM
-- Server version: 10.3.31-MariaDB-0+deb10u1
-- PHP Version: 7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(4) NOT NULL,
  `category` varchar(36) NOT NULL,
  `categoryENG` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `categoryENG`) VALUES
(1, '---เลือก---', 'choose'),
(2, 'อุปกรณ์ใช้ในออฟฟิส', 'office'),
(3, 'กระดาษ', 'paper'),
(4, 'เครื่องเขียน', 'write'),
(5, 'เชือก', 'rope'),
(6, 'สี', 'color'),
(7, 'อุปกรณ์ใช้ในห้องเรียน', 'classroom');

-- --------------------------------------------------------

--
-- Table structure for table `customeror`
--

CREATE TABLE `customeror` (
  `OrderID` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customeror`
--

INSERT INTO `customeror` (`OrderID`, `Status`) VALUES
(35, 'กำลังดำเนินการ'),
(38, 'กำลังดำเนินการ'),
(40, 'กำลังดำเนินการ'),
(41, 'กำลังดำเนินการ'),
(42, 'กำลังดำเนินการ'),
(43, 'กำลังดำเนินการ'),
(44, 'กำลังดำเนินการ'),
(45, 'กำลังดำเนินการ'),
(46, 'กำลังดำเนินการ'),
(47, 'กำลังดำเนินการ'),
(48, 'กำลังดำเนินการ'),
(49, 'กำลังดำเนินการ'),
(50, 'กำลังดำเนินการ'),
(51, 'กำลังดำเนินการ'),
(52, 'กำลังดำเนินการ'),
(53, 'กำลังดำเนินการ'),
(54, 'กำลังดำเนินการ'),
(55, 'กำลังดำเนินการ'),
(56, 'กำลังดำเนินการ'),
(57, 'กำลังดำเนินการ'),
(58, 'กำลังดำเนินการ'),
(59, 'กำลังดำเนินการ'),
(60, 'กำลังดำเนินการ'),
(61, 'กำลังดำเนินการ'),
(62, 'กำลังดำเนินการ'),
(63, 'กำลังดำเนินการ'),
(64, 'กำลังดำเนินการ'),
(65, 'กำลังดำเนินการ'),
(66, 'กำลังดำเนินการ'),
(67, 'กำลังดำเนินการ'),
(68, 'กำลังดำเนินการ');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `ID` int(10) NOT NULL,
  `BILL` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `Status` varchar(5) NOT NULL,
  `upic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`ID`, `BILL`, `Password`, `Name`, `uname`, `Status`, `upic`) VALUES
(1, 'A001', 'user', 'พิสิษฐ์ งามเลืศพัฒนสิริ', 'user', 'user', ''),
(2, 'A000', 'admin', 'ครูใหญ่', 'admin', 'Admin', ''),
(3, 'A002', 'pasin', 'pasin', 'pasin', 'user', 'pasin.png'),
(5, 'AU14I', 'user', 'สนทยา', 'ahhh', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nameENG` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `unitENG` varchar(255) NOT NULL,
  `picture` varchar(2550) NOT NULL,
  `category` varchar(255) NOT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `mess` text NOT NULL,
  `sendtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`ID`, `name`, `nameENG`, `price`, `number`, `amount`, `unit`, `unitENG`, `picture`, `category`, `Status`, `mess`, `sendtime`) VALUES
(1, 'ปากกาไวท์บอรด์', 'White board pen', 20, 9464, 0, 'แท่ง', 'piece', 'uploads/Upload2022040526229.jpeg', 'write', '', '', '0000-00-00 00:00:00'),
(2, 'หนังสือ', 'Books', 70, 3, 0, 'เล่ม', '', 'uploads/Upload2022040517952.jpg', 'office', '', '', '0000-00-00 00:00:00'),
(3, 'กระดาษ', 'Paper', 1, 78, 0, 'แผ่น', '', 'uploads/Upload2022040563360.jpg', 'paper', '', '', '0000-00-00 00:00:00'),
(4, 'ปากกาลูกลื่น', 'ballpointpen', 5, 115, 0, 'กล่อง(12 แท่ง)', '', 'uploads/Upload2022040576334.jpg', 'write', '', '', '0000-00-00 00:00:00'),
(27, 'ทดสอบ', 'Test', 21, 312, 0, 'คันคิด', 'Car123', 'uploads/Upload2022032225443.png', 'write', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messagead`
--

CREATE TABLE `messagead` (
  `ID` int(11) NOT NULL,
  `BILL` varchar(255) NOT NULL,
  `mess` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messagead`
--

INSERT INTO `messagead` (`ID`, `BILL`, `mess`) VALUES
(43, ' A001', 'รับได้เลย');

-- --------------------------------------------------------

--
-- Table structure for table `messageu`
--

CREATE TABLE `messageu` (
  `ID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `BILL` varchar(255) NOT NULL,
  `mess` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messageu`
--

INSERT INTO `messageu` (`ID`, `OrderID`, `BILL`, `mess`) VALUES
(106, 43, 'A001', 'ช่วยด้วย'),
(107, 44, 'A002', '555'),
(108, 45, 'A002', 'ก้อง'),
(109, 46, 'A001', 'PASIN'),
(110, 47, 'A001', 'kkk'),
(111, 48, 'A001', 'a'),
(112, 50, 'A001', 'dddsss');

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `ID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `BILL` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` text DEFAULT NULL,
  `mess` text NOT NULL,
  `sendtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send`
--

INSERT INTO `send` (`ID`, `OrderID`, `BILL`, `name`, `price`, `number`, `amount`, `unit`, `picture`, `time`, `Status`, `mess`, `sendtime`) VALUES
(57, 43, 'A001', 'ปากกาไวท์บอรด์', 20, 9820, 8, '', 'img/pene.jpg', '2022-02-01 04:14:15', 'รับของแล้ว', '', '2022-02-01 14:21:05'),
(59, 45, 'A002', 'ปากกาไวท์บอรด์', 20, 9815, 4, '', 'img/pene.jpg', '2022-02-03 02:55:54', 'ยินยอม', 'รับได้เลย', '2022-02-03 09:55:54'),
(60, 45, 'A002', 'หนังสือ', 70, 6, 1, '', 'img/books.jpg', '2022-02-03 02:56:04', 'ปฎิเสธแล้ว', '', '2022-02-03 09:56:04'),
(61, 48, 'A001', 'หนังสือ', 70, 5, 1, '', 'img/books.jpg', '2022-02-03 03:24:36', 'ปฎิเสธแล้ว', 'sdkla', '2022-02-03 10:24:36'),
(62, 49, 'A001', 'ปากกาไวท์บอรด์', 20, 9807, 3, 'แท่ง', 'img/pene.jpg', '2022-02-03 03:24:49', 'ปฎิเสธแล้ว', 'กหฟ', '2022-02-03 10:24:49'),
(63, 50, 'A001', 'ปากกาไวท์บอรด์', 20, 9804, 3, 'แท่ง', 'img/pene.jpg', '2022-02-03 03:25:18', 'รับของแล้ว', 'รับได้เลย', '2022-02-03 10:44:02'),
(64, 54, 'A001', 'ปากกาไวท์บอรด์', 20, 9800, 4, 'แท่ง', 'img/pene.jpg', '2022-02-01 06:36:49', 'ถูกยกเลิก', '', '2022-02-01 14:21:05'),
(69, 66, 'A001', 'ปากกาไวท์บอรด์', 20, 9469, 12, 'แท่ง', 'img/pene.jpg', '2022-03-01 07:07:15', 'ปฎิเสธแล้ว', 'efsb', '2022-03-01 14:12:27'),
(70, 67, 'A001', 'ปากกาไวท์บอรด์', 20, 9465, 4, 'แท่ง', 'img/pene.jpg', '2022-03-01 07:09:14', 'รับของแล้ว', 'AMOGUSBNDDSJKFNLWFNFIFEJonifsijfepefefpjodefd', '2022-03-01 14:12:24'),
(71, 68, 'A001', 'ปากกาไวท์บอรด์', 20, 9464, 1, 'แท่ง', 'uploads/Upload2022040526229.jpeg', '2022-05-24 02:56:57', 'กำลังดำเนินการ', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop2`
--

CREATE TABLE `shop2` (
  `ID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `BILL` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `nameENG` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `unit` varchar(255) NOT NULL,
  `unitENG` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `sendtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop2`
--

INSERT INTO `shop2` (`ID`, `OrderID`, `BILL`, `name`, `nameENG`, `price`, `number`, `amount`, `unit`, `unitENG`, `picture`, `Status`, `mess`, `sendtime`) VALUES
(229, NULL, 'A002', 'ปากกาไวท์บอรด์', 'White board pen', 20, 9464, 1, 'แท่ง', 'piece', 'img/pene.jpg', 'กำลังดำเนินการ', '', '2022-02-01 14:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customeror`
--
ALTER TABLE `customeror`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messagead`
--
ALTER TABLE `messagead`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messageu`
--
ALTER TABLE `messageu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shop2`
--
ALTER TABLE `shop2`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customeror`
--
ALTER TABLE `customeror`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `messagead`
--
ALTER TABLE `messagead`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `messageu`
--
ALTER TABLE `messageu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `send`
--
ALTER TABLE `send`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `shop2`
--
ALTER TABLE `shop2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
