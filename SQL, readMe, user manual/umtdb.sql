-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2015 at 04:39 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `umtdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ebill`
--

CREATE TABLE IF NOT EXISTS `ebill` (
`eBillID` int(11) NOT NULL,
  `serviceID` int(10) NOT NULL,
  `submeterID` int(10) NOT NULL,
  `userID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `totalKwh` float NOT NULL,
  `totalCost` float NOT NULL,
  `genCharge` float NOT NULL,
  `transCharge` float NOT NULL,
  `distCharge` float NOT NULL,
  `imgDest` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `ebill`
--

INSERT INTO `ebill` (`eBillID`, `serviceID`, `submeterID`, `userID`, `startDate`, `endDate`, `totalKwh`, `totalCost`, `genCharge`, `transCharge`, `distCharge`, `imgDest`) VALUES
(7, 0, 1, 23, '2013-03-01', '2013-04-01', 124, 13900, 2367.54, 2387.98, 1284.34, '1.jpg'),
(10, 0, 1, 23, '2014-06-01', '2014-07-01', 633, 234543, 12345.9, 45797.5, 29.76, '1.jpg'),
(12, 0, 1, 23, '2013-01-01', '2013-02-01', 100, 15500, 5000.5, 1234.65, 987.9, '1.jpg'),
(15, 0, 1, 23, '2013-04-01', '2013-05-01', 245, 83535, 1485.7, 124765, 234.5, '1.jpg'),
(20, 0, 1, 23, '2013-02-01', '2013-03-01', 150, 20532, 9000, 234.56, 345.67, '1.jpg'),
(23, 0, 1, 23, '2014-05-01', '2014-06-01', 277, 23000, 8976, 890.87, 5670.98, '1.jpg'),
(25, 0, 1, 23, '2014-07-01', '2014-08-01', 375, 90000, 67864, 786.9, 5689.09, '1.jpg'),
(29, 0, 1, 23, '2015-02-01', '2015-03-01', 366, 25467, 10999, 129, 2345, '1.jpg'),
(30, 0, 1, 23, '2015-02-01', '2015-02-02', 244, 231, 678, 45, 34, '1.jpg'),
(31, 0, 2, 23, '2015-02-24', '2015-02-11', 12, 89, 567, 56, 45, '1.jpg'),
(32, 0, 4, 23, '2015-02-02', '2015-02-04', 56, 78, 56, 89, 56, '1.jpg'),
(33, 0, 4, 23, '2015-02-04', '2015-02-04', 6786, 6757, 5675, 5675, 768, '1.jpg'),
(34, 0, 21, 16, '2015-02-17', '2015-02-24', 789, 678, 678, 789, 789, '1.jpg'),
(35, 0, 22, 17, '2015-02-01', '2015-03-01', 9000, 67887, 4569, 56797, 56797, '1.jpg'),
(36, 0, 2, 23, '2015-02-01', '2015-03-01', 789, 56789, 6543, 9867, 4567, 'sample.jpg'),
(37, 0, 5, 23, '2015-02-14', '2015-03-14', 6785, 56787, 5678, 5678, 9863, 'sample.jpg'),
(38, 0, 1, 23, '2015-02-02', '2015-03-02', 789, 6786, 6786, 6576, 53452, 'sample.jpg'),
(39, 0, 44, 19, '2015-03-29', '2015-03-30', 89, 7896, 87687, 676578, 6876, 'why PC freezes.jpg'),
(40, 0, 44, 19, '2015-03-01', '2015-03-02', 78789, 789678, 678678, 89789, 67867, 'why PC freezes.jpg'),
(47, 0, 27, 21, '2015-03-29', '2015-03-16', 789, 789, 678, 564, 564, 'why PC freezes.jpg'),
(53, 0, 54, 53, '2015-03-01', '2015-03-29', 1, 2, 3, 4, 5, 'why PC freezes.jpg'),
(56, 0, 55, 53, '2015-03-30', '2015-03-31', 9, 9, 9, 9, 9, 'why PC freezes.jpg'),
(59, 0, 59, 58, '2015-03-23', '2015-03-24', 7, 7, 7, 7, 789, 'wealthandpow.jpg'),
(60, 23012312, 1, 23, '2015-04-01', '2015-04-30', 300, 100, 50, 10, 40, 'psychology-of-color-560x4510.jpg'),
(61, 8078675, 2, 23, '2015-04-01', '2015-04-30', 400, 100, 20, 40, 40, 'phase1.jpg'),
(62, 55555, 1, 23, '2015-05-01', '2015-05-31', 55555, 55555, 55555, 55555, 55555, '09-Children-Inforgraphic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ebillsubmeters`
--

CREATE TABLE IF NOT EXISTS `ebillsubmeters` (
`submeterID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `submeterName` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `ebillsubmeters`
--

INSERT INTO `ebillsubmeters` (`submeterID`, `userID`, `submeterName`) VALUES
(1, 23, 'photox3'),
(2, 23, 'engglib2'),
(9, 33, 'photox4'),
(10, 33, 'LBP atm'),
(11, 33, 'ATM2'),
(12, 33, 'Blessings'),
(13, 33, 'food court'),
(14, 40, 'chef''s grill'),
(15, 40, 'imam'),
(16, 40, 'shop1'),
(17, 40, 'shop2'),
(18, 40, 'shop3'),
(19, 40, 'shop4'),
(20, 40, 'shop5'),
(22, 17, 'mainlib_1'),
(23, 17, 'mainlib_computer room'),
(24, 18, 'maskom'),
(26, 20, 'up theater'),
(27, 21, 'carillon'),
(28, 22, 'film institute'),
(29, 24, 'transpo stud'),
(30, 25, 'nat engg inst'),
(31, 26, 'computer center'),
(32, 28, 'law'),
(33, 29, 'bacobo'),
(34, 30, 'romulo'),
(35, 31, 'econ'),
(36, 32, 'issi'),
(37, 36, 'narra'),
(38, 37, 'educ'),
(39, 38, 'upis'),
(40, 39, 'benton'),
(41, 100, 'yey'),
(42, 4, 'photox'),
(48, 19, 'b'),
(54, 53, 'mus'),
(55, 53, 'yah'),
(59, 58, 'yahooo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `buildingName` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `userType` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `buildingName`, `address`, `userType`) VALUES
(16, 'quezon hall', '$2y$10$E0m2KXwl4ewrzwfsj0/cROqA0Y1OIZ06dmOzJwZ2xEQ5stv35Z2eO', 'qh@upd.edu.ph', 'Quezon Hall', 'University Avenue, University of the Philipines, Diliman', 'user'),
(17, 'mainlib', '$2y$10$PIwzNCxyaRRFkUeRFoH.BOwoiiOx4Phy7zCANDpKbH/027iFiR53.', 'mainlib@upd.edu.ph1', 'Gonzales Hall', 'address here', 'user'),
(18, 'plaridel', '$2y$10$yWc9x0vlPQ/YnM66bTSC0.vW9Q91pnyGJhbM1Kb9wKgf30lVpxM3m', 'maskom@upd.edu.ph', 'Plaridel Hall', 'address here', 'user'),
(20, 'up theater', '$2y$10$JZz.QsoXD75B82EUh055kOP5fZBzc1a7bbsz7C30ozzeFE3Hnskv2', 'uptheater@upd.edu.ph', 'Villamor Hall', 'address here', 'user'),
(21, 'carillon', '$2y$10$Ni1shmwGQrJbNslTb4VXx.1aNwEnKGNOuu9VsufE3U44lXAkCUmzK', 'carillon@upd.edu.ph', 'Andres Bonifacio Centennial Hall', 'address here', 'user'),
(22, 'up film inst', '$2y$10$1beVN60Hrb1ZmJaFU0V6CeQrdCQ.oKpGZHUlh6mPkThAgMQ7n.sde', 'filminst@upd.edu.ph', 'UP Film Institute', 'address here', 'user'),
(23, 'melchor', '$2y$10$PvV8GsKJY1Uae7TJZ3x5QOydY6JrvFQJiPZ/aSjzK47JukOG0ZSUa', 'coe@upd.edu.ph', 'Melchor Hall', 'address here', 'user'),
(24, 'transpo stud', '$2y$10$a.9DX1yYMqFh2.bVM5ZnDO6D4GumG40CjW6kelt.mNVlJChLOiN/y', 'ncts@upd.edu.ph', 'National Center for Transportational Studies', 'address here', 'user'),
(25, 'nat engg', '$2y$10$DTkw6C3Mh6TH4YcWE/tb2uJPCb7/NEObhcF2zudqW4z8/3RMH1iyG', 'nec@upd.edu.ph', 'National Engineering Center', 'address here', 'user'),
(26, 'comp center', '$2y$10$f/KrPgdlu25P3Y74TDHAoOG07Dyoxx71J03mSYb5ezYH3bhRfxqai', 'cc@upd.edu.ph', 'UP Computer Center', 'address here', 'user'),
(27, 'german yia', '$2y$10$or.zZJZdAg6cywU.1SlbrOhgjaX0vx4vRf1M0EMkKgkeAyf4pd1nK', 'gyb@upd.edu.ph', 'German Yia Building', 'address here', 'user'),
(28, 'law', '$2y$10$Vp4SBICXnfFTMGeJmoohse/rC5kPYkDbSJOe4GBKktPqHnGQwcHSu', 'law@upd.edu.ph', 'Malcolm Hall', 'address here', 'user'),
(29, 'bacobo', '$2y$10$82aOgDGFidppxjM041aNg.NbuR8z00wIhBrQc.ZKElBN6.e5dvOCO', 'bacobo@upd.edu.ph', 'Bacobo Hall', 'address here', 'user'),
(30, 'romulo', '$2y$10$0YZtWxiVHMc.AueXPQD8lup5EMUqnz9pBWcADyEeLp8lWg2zzw8G6', 'karisuma1010@gmail.com', 'Romulo Hall', 'address here', 'user'),
(31, 'econ', '$2y$10$ureZsD14SUfvQhxXy7a.hueo9wNlohSQCeAK/DwJbSxRWRRg54uU.', 'econ@upd.edu.ph', 'School of Economics', 'address here', 'user'),
(32, 'virata', '$2y$10$Ldns5TPRyNunSRwVht4B4u/ZDnwKUFWHKzW1WA5CY3lUsGkCpoBHm', 'virata@upd.edu.ph', 'Virata School of Business', 'address here', 'user'),
(33, 'vinzons', '$2y$10$qnnrRLj5TNqiGT3CJWFtv.UNHabKJW7nsmV1AoG/6nmWFpbQ3QN5K', 'vinzons@upd.edu.ph', 'Vinzons Hall', 'address here', 'user'),
(34, 'univ book ', '$2y$10$.aPK64RsynRp3cPeb5upluwnmRxeKesD28jvIAcoU6l3H8Woa9MYy', 'ubc@upd.edu.ph', 'University Book Center', 'address here', 'user'),
(35, 'lorena barros', '$2y$10$DDyAsqGb9aFYI10XhjSOK.thScaTYDp87KejbASMAfkjDR.lVNph6', 'lbh@upd.edu.ph', 'Lorena Barros Hall', 'address here', 'user'),
(36, 'narra', '$2y$10$ygvMx6ieBQl7w0COo/6G6uXjsb9Sq77BA4ARN7jtZ5PT2uCeYeTc2', 'narra@upd.edu.ph', 'Narra Residence Hall', 'address here', 'user'),
(37, 'educ', '$2y$10$r0.GQjJkW07PfEmjukr5aOexhnwvwz88N6Tvx6GOI3BGt3PB2/4ue', 'educ@upd.edu.ph', 'Benitez Hall', 'address here', 'user'),
(38, 'upis', '$2y$10$.RvuSdxrnJSz.XqkIi709OOkfRyr4NSEfeMzpIfMVydgdtofcrL4y', 'upis@upd.edu.ph', 'UPIS', 'address here', 'user'),
(39, 'benton', '$2y$10$Xy7ce6G3ZaEEAGEqFcfUoeslQcATQZMs1GlP3R6.0/Au4yLGM6U0y', 'benton@upd.edu.ph', 'Benton Hall', 'address here', 'user'),
(40, 'casaa', '$2y$10$y7A/3.AhK5brOuQJpbj6bOikC6pLiKv3.qTuxyUIPWN3RhtG86ozq', 'casaa@upd.edu.ph', 'Casaa Food Center', 'address here', 'user'),
(41, 'solidor', '$2y$10$dWuA4cWHIljyKp87fQgqaObqm12QkhLGAP2hLjikyBA0N/VOGTaPW', 'solidor@upd.edu.ph', 'Solidor Hall', 'address here', 'user'),
(42, 'zoology', '$2y$10$gp9v4LCq1.NrDoni0LYYgeEPtGuHy744MpEyzVOf4HF44xlPe775O', 'zoology@upd.edu.ph', 'Zoology Building', 'address here', 'user'),
(43, 'palma', '$2y$10$/8FuN0HGrnSXTkxisqGdcOK0aqe3SvY13GuuWR56IqTtAmgyr1QkG', 'ph@upd.edu.ph', 'Palma Hall', 'address here', 'user'),
(44, 'faculty', '$2y$10$yZRw.3aq4EQkYep3KH84kOU3Kycpw2Pxc.mQ6zOVNhXlnM7gKWlBW', 'fc@upd.edu.ph', 'Faculty Center', 'address here', 'user'),
(45, 'vargas', '$2y$10$QaIrHliUSdC19w75AS2Jt.RLW7tRWqJi2L31qRsfpg2Bu/sFWVxCG', 'vargas@upd.edu.ph', 'Vargas Museum', 'address here', 'user'),
(46, 'surp', '$2y$10$faBDktBLPacrjv5sv4RDu.vZOD1nQNIJVaBluIv.QnVTDFJe3ZtkO', 'surp@upd.edu.ph', 'School of Urban and Regional Planning', 'address here', 'user'),
(47, 'dmst', '$2y$10$pc7wprsYzkG2TSBCHmYyq.1eojugbxCVvY.7xlLhgjCUHRTPMA9tq', 'dmst@upd.edu.ph', 'DMST Complex', 'address here', 'user'),
(48, 'vanguard', '$2y$10$nc.lJ5ye3PiGXPjAoC8Y2uVcWTNZmz.btsV8iDFUxZxYDoyqp3qrG', 'vanguard@upd.edu.ph', 'UP Vanguard Building', 'address here', 'user'),
(49, 'post office', '$2y$10$tZA3/wf6RuYKOiovlACq0.rEVf0tiNaxYSUa6Q4rEdkJxnODq3F4W', 'post@upd.edu.ph', 'UP Post Office', 'address here', 'user'),
(50, 'admin', '$2y$10$DT5EKJO.1Ri9Z/Hyg.7pd.RjCooAYhy7oiVqgC9zKhoD5HHEMblxS', 'admin@upd.edu.ph', 'admin', 'admin', 'admin'),
(53, 'abelardo', '$2y$10$o.5oQPXa5/NwvI3uTWSXFefTcBa9RPeCARCVGMNqVFDJUaVyrR772', '', 'Abelardo Hall', '', 'user'),
(58, 'userA', '$2y$10$e7LjMcyRvmtdtzqJotKr6uJzd3tLzBB4Lnq4nzaJ4CXOGjUWzhloy', '', 'A', '', 'user'),
(59, 'jolina', '$2y$10$KIZcn5AUUP4IzjBcg.34BueD07PYdC5F.Td1uadK1NoztHrEMkwi.', 'jolinagaspar@yahoo.com', 'jolina', 'jolina st', 'user'),
(60, 'b', '$2y$10$xrfvc5f/RPdr8cRc5JrrzO9SJsWnJ.AxARq2QjFnPB/4nTYxRxjuy', 'b@example.com', 'b', 'b st', 'user'),
(61, 'ab', '$2y$10$.j4FVlldy3kFKcVKzD1IZuyEcbB1e3sDHEjnjpmhQvh4YOX8u4oei', 'ab@ab.com', 'ab', 'ab', 'user'),
(62, 'apple', '$2y$10$zt6NYFGwB2o7OtTQjgOvO./FkabJdOa.CzYKZMvRpdzhVoIlAzo9C', 'apple.com', 'apple', 'apple', 'user'),
(63, 'ab', '$2y$10$dHA0dUE2He9wnykiQ8/vAuJeti5V8ONat4zQOjZbYtTgCF6ORgziK', 'ab@yahoo.com', 'ab', 'ab st.', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wbill`
--

CREATE TABLE IF NOT EXISTS `wbill` (
`wBillID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `totalCc` float NOT NULL,
  `totalCost` float NOT NULL,
  `imgDest` varchar(400) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `wbill`
--

INSERT INTO `wbill` (`wBillID`, `serviceID`, `userID`, `startDate`, `endDate`, `totalCc`, `totalCost`, `imgDest`) VALUES
(4, 897234, 23, '2013-01-01', '2013-02-01', 500, 12345, '2.jpg'),
(5, 123213, 23, '2013-02-01', '2013-03-01', 365, 78986, '2.jpg'),
(6, 12312, 23, '2015-02-16', '2015-02-03', 678, 567, '2.jpg'),
(7, 0, 16, '2015-02-09', '2015-02-09', 6787, 56756, '2.jpg'),
(8, 0, 17, '2015-02-01', '2015-02-02', 6875, 56787, '2.jpg'),
(9, 0, 19, '2015-02-01', '2015-02-06', 675, 567, '2.jpg'),
(10, 0, 20, '2015-02-05', '2015-02-19', 6788, 56787, '2.jpg'),
(11, 2342340, 23, '2015-02-23', '2015-03-23', 678, 567, 'sample.jpg'),
(12, 0, 53, '2015-03-01', '2015-03-02', 789, 678, 'why PC freezes.jpg'),
(13, 0, 53, '2015-03-15', '2015-03-16', 9087, 896, 'why PC freezes.jpg'),
(14, 55555, 23, '2015-05-01', '2015-05-31', 55555, 55555, '55645a90d44ad9d99233e7e58aec9d1b.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ebill`
--
ALTER TABLE `ebill`
 ADD PRIMARY KEY (`eBillID`);

--
-- Indexes for table `ebillsubmeters`
--
ALTER TABLE `ebillsubmeters`
 ADD PRIMARY KEY (`submeterID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `wbill`
--
ALTER TABLE `wbill`
 ADD PRIMARY KEY (`wBillID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ebill`
--
ALTER TABLE `ebill`
MODIFY `eBillID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `ebillsubmeters`
--
ALTER TABLE `ebillsubmeters`
MODIFY `submeterID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `wbill`
--
ALTER TABLE `wbill`
MODIFY `wBillID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
