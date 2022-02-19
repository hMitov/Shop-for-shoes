-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 01:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_model`
--

CREATE TABLE `brand_model` (
  `Id` int(11) NOT NULL,
  `BrandName` varchar(156) NOT NULL,
  `Model` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_model`
--

INSERT INTO `brand_model` (`Id`, `BrandName`, `Model`) VALUES
(11, 'Adidas', 'Continental 80'),
(12, 'Adidas', 'Questar Flow'),
(13, 'Adidas', 'Stan Smith'),
(14, 'Adidas', 'Superstar'),
(15, 'Adidas', 'Samba OG'),
(16, 'Adidas', 'AlphaEdge 4D'),
(17, 'Adidas', 'Kaptir'),
(21, 'Armani', 'Sneakers'),
(31, 'Boss', 'Sneakers'),
(41, 'Calvin Klein', 'Chunky Trainers'),
(42, 'Calvin Klein', 'Heeled Ankle Boots'),
(43, 'Calvin Klein', 'Rubber Rainboots'),
(44, 'Calvin Klein', 'Recycled Mesh Trainers'),
(45, 'Calvin Klein', 'Chunky Trainers'),
(46, 'Calvin Klein', 'Suede Boots'),
(51, 'Caterpillar', 'Men\'s Safety Toe'),
(52, 'Caterpillar', 'Men\'s Casual'),
(53, 'Caterpillar', 'Men\'s Waterproof'),
(61, 'Converse', 'Chuck Taylor All Star'),
(62, 'Converse', 'Chuck Taylor All Star CX'),
(63, 'Converse', 'Run Star Hike Canvas'),
(64, 'Converse', 'Run Star Hike'),
(65, 'Converse', 'Chuck Taylor All Star Leather'),
(71, 'Fila', 'Expeditioner'),
(72, 'Fila', 'Electrove 2 Stitch'),
(73, 'Fila', 'MB'),
(74, 'Fila', 'Ray'),
(75, 'Fila', 'Disruptor 3'),
(76, 'Fila', 'Provenance'),
(81, 'New Balance', 'Sneakers'),
(82, 'New Balance', 'Shoes'),
(91, 'Nike', 'Air Force 1 Low'),
(92, 'Nike', 'Air Huarache LE'),
(93, 'Nike', 'Revolution 6'),
(94, 'Nike', 'Air Max 270'),
(95, 'Nike', 'Air Max Plus'),
(101, 'Reebok', 'Club C 85'),
(102, 'Reebok', 'Workout Plus'),
(103, 'Reebok', 'NPC II'),
(104, 'Reebok', 'Club C Revenge Legacy'),
(105, 'Reebok', 'Royal Cljog 3.0'),
(111, 'Versace', 'Royal Cljog 3.0'),
(112, 'Versace', 'Greca Labyrinth Trainers'),
(113, 'Versace', 'Greca Sneakers'),
(114, 'Versace', 'Greca High-Top Sneakers');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `Id` int(10) NOT NULL,
  `Color` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`Id`, `Color`) VALUES
(1, 'red'),
(2, 'lightBlue'),
(3, 'blue'),
(4, 'brown'),
(5, 'white'),
(6, 'black'),
(7, 'green'),
(8, 'yellow'),
(9, 'grey');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(5) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Agent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `FirstName`, `LastName`, `Agent`) VALUES
(1, 'Петър ', 'Иванов', '001976'),
(2, 'Йордан', 'Георгиев', '541289'),
(3, 'Надежда', 'Господинова', '994378'),
(4, 'Василена', 'Русланова', '007654'),
(5, 'Росен', 'Невенов', '995412'),
(6, 'Калоян', 'Зарев', '876554'),
(7, 'Златина', 'Методиева', '993561'),
(8, 'Николай', 'Йорданов', '008362'),
(9, 'Лили', 'Ибрахимова', '386721'),
(10, 'Кристиян', 'Иванов', '998765'),
(12, 'Вероника', 'Михайлова', '001432'),
(16, 'Мария', 'Железарова', '428745');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `Id` int(10) NOT NULL,
  `Material` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`Id`, `Material`) VALUES
(1, 'Leather'),
(2, 'Eco leather'),
(3, 'Textile');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `Id` int(11) NOT NULL,
  `BrandName` varchar(20) NOT NULL,
  `ModelName` varchar(20) NOT NULL,
  `Barcode` varchar(20) NOT NULL,
  `Size` double(5,2) NOT NULL,
  `Material` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` double(5,2) NOT NULL,
  `Sex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shoes_in_stock`
--

CREATE TABLE `shoes_in_stock` (
  `Id` int(11) NOT NULL,
  `BrandNameModel` int(11) NOT NULL,
  `Barcode` varchar(20) NOT NULL,
  `Size` double(10,1) DEFAULT NULL,
  `Material` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoes_in_stock`
--

INSERT INTO `shoes_in_stock` (`Id`, `BrandNameModel`, `Barcode`, `Size`, `Material`, `Color`, `Quantity`, `Price`, `Sex`) VALUES
(10, 12, '4401242465', 46.5, 2, 4, 29, 124, 'men'),
(11, 12, '4301221360', 36.0, 1, 2, 9, 126, 'women'),
(13, 61, '4406191475', 47.5, 1, 9, 83, 311, 'men'),
(14, 93, '4409331436', 43.6, 1, 3, 98, 214, 'men'),
(15, 103, '4310352380', 38.0, 2, 5, 36, 198, 'women'),
(16, 114, '4311442425', 42.5, 2, 4, 57, 411, 'women'),
(17, 94, '4309462445', 44.5, 2, 6, 8, 211, 'women'),
(18, 73, '4307393355', 35.5, 3, 9, 10, 129, 'women'),
(19, 44, '4304452385', 38.5, 2, 5, 63, 366, 'women'),
(20, 61, '4406171445', 44.5, 1, 7, 49, 345, 'men');

-- --------------------------------------------------------

--
-- Table structure for table `shop_password`
--

CREATE TABLE `shop_password` (
  `Id` int(1) NOT NULL,
  `Password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_password`
--

INSERT INTO `shop_password` (`Id`, `Password`) VALUES
(1, 'mixFoot');

-- --------------------------------------------------------

--
-- Table structure for table `x_report`
--

CREATE TABLE `x_report` (
  `Id` int(11) NOT NULL,
  `BrandName` varchar(30) NOT NULL,
  `ModelName` varchar(30) NOT NULL,
  `Barcode` varchar(30) NOT NULL,
  `Size` double(5,2) NOT NULL,
  `Material` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Price` double(5,2) NOT NULL,
  `Paid` varchar(20) NOT NULL,
  `Sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `x_report`
--

INSERT INTO `x_report` (`Id`, `BrandName`, `ModelName`, `Barcode`, `Size`, `Material`, `Color`, `Quantity`, `Price`, `Paid`, `Sex`) VALUES
(36, 'Converse', 'Chuck Taylor All Sta', '4406171445', 44.50, 'Leather', 'green', 1, 345.00, 'cash', 'men'),
(37, 'Adidas', 'Questar Flow', '4401242465', 46.50, 'Eco leather', 'brown', 1, 124.00, 'cash', 'men'),
(38, 'Reebok', 'NPC II', '4310352380', 38.00, 'Eco leather', 'white', 2, 198.00, 'cash', 'women'),
(39, 'Fila', 'MB', '4307393355', 35.50, 'Textile', 'grey', 18, 129.00, 'card', 'women'),
(40, 'Calvin Klein', 'Recycled Mesh Traine', '4304452385', 38.50, 'Eco leather', 'white', 2, 366.00, 'card', 'women'),
(41, 'Nike', 'Revolution 6', '4409331436', 43.60, 'Leather', 'blue', 2, 214.00, 'cash', 'men'),
(42, 'Adidas', 'Questar Flow', '4401242465', 46.50, 'Eco leather', 'brown', 1, 124.00, 'cash', 'men'),
(43, 'Adidas', 'Questar Flow', '4301221360', 36.00, 'Leather', 'lightBlue', 1, 126.00, 'card', 'women'),
(44, 'Converse', 'Chuck Taylor All Sta', '4406191475', 47.50, 'Leather', 'grey', 1, 311.00, 'card', 'men'),
(45, 'Nike', 'Revolution 6', '4409331436', 43.60, 'Leather', 'blue', 1, 214.00, 'card', 'men'),
(46, 'Reebok', 'NPC II', '4310352380', 38.00, 'Eco leather', 'white', 1, 198.00, 'cash', 'women'),
(47, 'Versace', 'Greca High-Top Sneak', '4311442425', 42.50, 'Eco leather', 'brown', 1, 411.00, 'cash', 'women'),
(48, 'Nike', 'Air Max 270', '4309462445', 44.50, 'Eco leather', 'black', 1, 211.00, 'cash', 'women'),
(49, 'Fila', 'MB', '4307393355', 35.50, 'Textile', 'grey', 1, 129.00, 'card', 'women'),
(50, 'Calvin Klein', 'Recycled Mesh Traine', '4304452385', 38.50, 'Eco leather', 'white', 1, 366.00, 'card', 'women'),
(51, 'Converse', 'Chuck Taylor All Sta', '4406171445', 44.50, 'Leather', 'green', 1, 345.00, 'card', 'men'),
(52, 'Converse', 'Chuck Taylor All Sta', '4406191475', 47.50, 'Leather', 'grey', 1, 311.00, 'cash', 'men'),
(53, 'Nike', 'Revolution 6', '4409331436', 43.60, 'Leather', 'blue', 1, 214.00, 'card', 'men'),
(54, 'Adidas', 'Questar Flow', '4401242465', 46.50, 'Eco leather', 'brown', 1, 124.00, 'cash', 'men');

-- --------------------------------------------------------

--
-- Table structure for table `z_report`
--

CREATE TABLE `z_report` (
  `Id` int(11) NOT NULL,
  `BrandName` varchar(30) NOT NULL,
  `ModelName` varchar(30) NOT NULL,
  `Barcode` varchar(30) NOT NULL,
  `Size` double(5,2) NOT NULL,
  `Material` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Price` double(5,2) NOT NULL,
  `Paid` varchar(20) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `z_report`
--

INSERT INTO `z_report` (`Id`, `BrandName`, `ModelName`, `Barcode`, `Size`, `Material`, `Color`, `Quantity`, `Price`, `Paid`, `Sex`, `Date_time`) VALUES
(21, 'Converse', 'Chuck Taylor All Star', '4406171445', 44.50, 'Leather', 'green', 1, 345.00, 'cash', 'men', '2022-01-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_model`
--
ALTER TABLE `brand_model`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shoes_in_stock`
--
ALTER TABLE `shoes_in_stock`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `BrandNameModel` (`BrandNameModel`),
  ADD KEY `Material` (`Material`),
  ADD KEY `Color` (`Color`);

--
-- Indexes for table `shop_password`
--
ALTER TABLE `shop_password`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `x_report`
--
ALTER TABLE `x_report`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `z_report`
--
ALTER TABLE `z_report`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `shoes_in_stock`
--
ALTER TABLE `shoes_in_stock`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shop_password`
--
ALTER TABLE `shop_password`
  MODIFY `Id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `x_report`
--
ALTER TABLE `x_report`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `z_report`
--
ALTER TABLE `z_report`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shoes_in_stock`
--
ALTER TABLE `shoes_in_stock`
  ADD CONSTRAINT `shoes_in_stock_ibfk_1` FOREIGN KEY (`BrandNameModel`) REFERENCES `brand_model` (`Id`),
  ADD CONSTRAINT `shoes_in_stock_ibfk_2` FOREIGN KEY (`Material`) REFERENCES `material` (`Id`),
  ADD CONSTRAINT `shoes_in_stock_ibfk_3` FOREIGN KEY (`Color`) REFERENCES `colors` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
