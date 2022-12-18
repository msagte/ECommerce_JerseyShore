-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 11:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jerseyshoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(12) NOT NULL,
  `Login_ID` varchar(15) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Login_ID`, `Password`) VALUES
(1, 'ADMIN', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Brand_ID` int(11) NOT NULL,
  `Brand_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Brand_ID`, `Brand_Name`) VALUES
(0, 'Select Brand'),
(1, 'Ashley'),
(2, 'Ethan Allen'),
(3, 'Crate & Barrel'),
(4, 'West Elm'),
(5, 'Wayfair');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `Product_Id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cust_id`, `Product_Id`) VALUES
(46, 2, 10),
(47, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`) VALUES
(0, 'Select Category'),
(1, 'Bedroom Furniture'),
(2, 'Dinning Room'),
(3, 'Patio'),
(4, 'Storage'),
(5, 'Family Room');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_ID` int(6) NOT NULL,
  `First_Name` varchar(400) NOT NULL,
  `Last_Name` varchar(400) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `Phone_Number` int(10) DEFAULT NULL,
  `Login_ID` varchar(15) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_ID`, `First_Name`, `Last_Name`, `Email`, `Address`, `Phone_Number`, `Login_ID`, `Password`) VALUES
(1, 'yamini', 'chitikela', 'yaminichitikela@gmail.com', '13frank', 551358542, 'yamini', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Makarand', 'Agte', 'mack@email.com', '333 main str jersey nj 90909', 2147483647, 'mack', 'cfeb114b3fc6c4c1e23af6be9cc183e3'),
(3, 'Lioenl', 'Messi', 'leo@mail.com', 'Right Now I am in Qatar', 2147483647, 'Leo', '657b298b04e033810343842f993c9817'),
(4, 'Leonel', 'Messi', 'Leo@email.com', '123 Main Street City NJ', 234234234, 'Leo', '63d644a2ec245b11d89aea8a9f3e639b');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(12) NOT NULL,
  `First_Name` varchar(200) NOT NULL,
  `Last_Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Login_ID` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Is_Manager` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `First_Name`, `Last_Name`, `Email`, `Login_ID`, `Password`, `Is_Manager`) VALUES
(0, 'Boris', 'Baker', 'boris@email.com', 'boris', '5f9f92b2843ab251a922cc23abf2322c', 1),
(5345, 'Leonelo', 'Messi', 'Leonel@gmail.com', 'Leonelo', '35040ae7b9119a3489875c4b50aefebd', 1),
(12344, 'rajas', 'agte', 'rajas@gmail.com', 'rajas', 'c660c5d6707ab50e5e2474b9d50752de', 1),
(45432, 'Boris', 'Baker', 'boris@email.com', 'boris', '38788705bb36bb9049b407c1a32cb1f9', 1),
(63453, 'Vincent', 'Dcosta', 'vincent@mail.com', 'vincent', '9d8a347763a92d7544b32716916b1fa3', 0),
(66443, 'Makarand', 'Agte', 'Makarand@mail.com', 'Maks', '582be429b30a291e748cb7f7c62b78ac', 1),
(234234, 'Kylon', 'Mbappe', 'kylon@gmail.com', 'kylon', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(346345, 'Ddiar', 'Drogba', 'Ddiar@gmail.com', 'Ddiar', '1ef468100ad4ad900c39d637dda3274b', 1),
(35234523, 'Madhavi', 'Agte', 'madhavi@amil.com', 'madhavi', 'beae889cf4dddd2cbf3d6be36a5f2579', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `Order_Detail_ID` int(12) NOT NULL,
  `Order_ID` int(12) NOT NULL,
  `Product_ID` int(12) NOT NULL,
  `quantity` int(10) NOT NULL,
  `Price` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`Order_Detail_ID`, `Order_ID`, `Product_ID`, `quantity`, `Price`) VALUES
(49, 21, 1, 4, '250'),
(50, 21, 4, 1, '900'),
(51, 21, 8, 1, '234'),
(52, 22, 1, 4, '250'),
(53, 22, 4, 1, '900'),
(54, 22, 8, 1, '234'),
(55, 23, 1, 1, '250'),
(56, 23, 4, 2, '900'),
(57, 24, 1, 1, '250'),
(58, 24, 8, 1, '234'),
(59, 24, 10, 1, '1200'),
(60, 24, 9, 2, '2300'),
(61, 25, 4, 1, '900'),
(62, 25, 8, 1, '234'),
(64, 26, 1, 2, '250'),
(65, 27, 8, 1, '234'),
(66, 27, 10, 1, '1200'),
(67, 28, 9, 1, '2300'),
(68, 29, 8, 5, '234'),
(69, 30, 10, 1, '1200'),
(70, 31, 4, 2, '900'),
(71, 32, 8, 0, '234'),
(72, 33, 10, 1, '1200'),
(74, 34, 1, 1, '250'),
(75, 35, 8, 1, '234');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(12) NOT NULL,
  `Cust_ID` int(12) NOT NULL,
  `orderdate` date NOT NULL,
  `invoicenumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Cust_ID`, `orderdate`, `invoicenumber`) VALUES
(21, 2, '2022-12-14', 81047),
(22, 2, '2022-12-14', 26751),
(23, 2, '2022-12-14', 57947),
(24, 2, '2022-12-14', 53638),
(25, 3, '2022-12-14', 27512),
(26, 2, '2022-12-15', 98012),
(27, 2, '2022-12-15', 46868),
(28, 2, '2022-12-15', 38990),
(29, 2, '2022-12-15', 43328),
(30, 2, '2022-12-15', 71333),
(31, 2, '2022-12-15', 86551),
(32, 2, '2022-12-15', 85354),
(33, 2, '2022-12-15', 54770),
(34, 2, '2022-12-15', 27451),
(35, 2, '2022-12-17', 52056);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(12) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `Price` decimal(15,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `Quantity` int(12) NOT NULL,
  `Images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Name`, `brand_id`, `Price`, `category_id`, `Quantity`, `Images`) VALUES
(1, 'Coffee Table', 4, '250', 2, 161, 'COFFEE TABEL 2.png'),
(4, 'Hammock', 4, '900', 3, 123, 'HAMMOCK 2.png'),
(8, 'mackarand', 1, '234', 1, -2, 'DINNIG CHAIR 2.png'),
(9, 'King Size Bed', 1, '2300', 1, 97, 'BED 1.png'),
(10, 'Dining Table with Chair', 2, '1200', 2, 122, 'DINNIG CHAIR 1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Brand_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cust_id` (`cust_id`),
  ADD KEY `FK_Product_Id` (`Product_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_ID`),
  ADD UNIQUE KEY `Cust_ID` (`Cust_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`Order_Detail_ID`),
  ADD KEY `order_ID_FK` (`Order_ID`),
  ADD KEY `Product_ID_FK` (`Product_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `cust_ID_FK` (`Cust_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Category_constraint` (`category_id`),
  ADD KEY `Brand_constraint` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `Order_Detail_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cust_id` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`Cust_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Product_Id` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `order_ID_FK` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ID_FK` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `cust_ID_FK` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`Cust_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Brand_constraint` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`Brand_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Category_constraint` FOREIGN KEY (`category_id`) REFERENCES `category` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
