-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 06:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `full_name`, `username`, `password`) VALUES
(38, 'Morjina', 'marjana123', '21232f297a57a5a743894a0e4a801fc3'),
(39, 'Shipon Ahmed', 'shipon', '21232f297a57a5a743894a0e4a801fc3'),
(40, 'Shipon', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(41, 'Shipon Ahmed', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(42, 'Marjana Akther', 'marjana', 'e00cf25ad42683b3df678c61f42c6bda'),
(48, 'Marjana Akther', 'morjina', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `canteen_table`
--

CREATE TABLE `canteen_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `canteen_table`
--

INSERT INTO `canteen_table` (`id`, `title`, `location`, `image_name`, `featured`, `active`) VALUES
(62, 'Shipon Ahmed', 'sylhet,subid bazar', 'Food_Canteen_827.jpg', 'Yes', 'Yes'),
(63, 'Neub Canteen', 'Jithu Miah Point,Sylhet', 'Food_Canteen_597.jpg', 'Yes', 'Yes'),
(64, 'Marjana Canteen', 'Tukorbazar, Sylhet', 'Food_Canteen_493.jpg', 'Yes', 'Yes'),
(65, 'Food House', 'Amberkhana, Sylhet', 'Food_Canteen_89.jpg', 'Yes', 'Yes'),
(66, 'Pizza Hut', 'Zindabazar, Sylhet', 'Food_Canteen_0.jpg', 'Yes', 'Yes'),
(67, 'Chick Chicken', 'Subid Bazar, Sylhet', 'Food_Canteen_860.jpg', 'Yes', 'Yes'),
(68, 'Food House', 'sylhet,subid bazar', 'Food_Canteen_728.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `your_name` varchar(30) NOT NULL,
  `your_no` int(15) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `msg` varchar(30) NOT NULL,
  `msg_time` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `your_name`, `your_no`, `email_address`, `msg`, `msg_time`) VALUES
(10, 'test', 1877, 'time@yahoo.com', 'time checked', '2021-01-03 00:09:35'),
(11, 'shipon', 1977795966, 'abc@gmail.com', 'I need 1 bag Ab- blood.', '2021-08-07 16:55:09'),
(14, 'shipon', 1234, 'abc@gmail.com', 'hello', '2021-08-10 00:24:40'),
(15, 'shipon', 1234, 'abc@gmail.com', 'hello', '2021-08-10 00:29:44'),
(16, 'shipon', 12334566, 'abc@gmail.com', 'hi', '2021-08-10 00:37:15'),
(17, 'marjan', 12344, 'ma@gmail.com', 'hi', '2021-08-10 00:56:45'),
(18, 'shipon', 176545665, 'abc@gmail.com', 'hi', '2021-08-20 20:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `rate` float NOT NULL,
  `mssge` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `canteen_id` int(11) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`id`, `title`, `rate`, `mssge`, `description`, `price`, `image_name`, `canteen_id`, `featured`, `active`) VALUES
(11, 'Burger', 4.5, 'Yummy burger', 'Assuming it is a really good burger, it is juicy, meaty, greasily satisfying. The bun should be slightly crunchy on the outside and soft inside. The cheese should be happily melting over the meat. Ideally, the burger is charcoal grilled and the bun is lightly toasted.', 180, 'Food-Name-5443.jpg', 63, 'Yes', 'Yes'),
(12, 'MoMo', 4, 'Delicious', 'Momo (dumplings) is one of Nepals most popular dishes which can be eaten as an entree or as mains. It is a dumpling filled with meat or vegetables as well. it is plain flour based dumplings steamed with cabbage, carrot and spring onion stuffing', 200, 'Food-Name-9546.jpg', 62, 'Yes', 'Yes'),
(13, 'Pizza', 3, 'Good', 'Pizza is an Italian dish consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients (such as anchovies, mushrooms, onions, olives, pineapple, meat', 260, 'Food-Name-4607.jpg', 64, 'Yes', 'Yes'),
(14, 'Burger', 4, 'Good', 'Assuming it is a really good burger, it is juicy, meaty, greasily satisfying. The bun should be slightly crunchy on the outside and soft inside. The cheese should be happily melting over the meat. Ideally, the burger is charcoal grilled and the bun is lightly toasted', 147, 'Food-Name-1810.jpg', 67, 'Yes', 'Yes'),
(18, 'Burger', 4, 'Good', 'Assuming it is a really good burger, it is juicy, meaty, greasily satisfying. The bun should be slightly crunchy on the outside and soft inside. The cheese should be happily melting over the meat. Ideally, the burger is charcoal grilled and the bun is lightly toasted', 240, 'Food-Name-2497.jpg', 65, 'Yes', 'Yes'),
(19, 'Burger', 3, 'Good burger', 'Assuming it is a really good burger, it is juicy, meaty, greasily satisfying. The bun should be slightly crunchy on the outside and soft inside. The cheese should be happily melting over the meat. Ideally, the burger is charcoal grilled and the bun is lightly toasted', 150, 'Food-Name-6893.jpg', 32, 'Yes', 'Yes'),
(20, 'Pizza', 4.5, 'Very good pizza', 'Pizza, dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil, oregano, tomato, olives', 300, 'Food-Name-3590.jpg', 66, 'Yes', 'Yes'),
(22, 'momo', 3, 'Good', 'momo', 200, 'Food-Name-7890.jpg', 32, 'Yes', 'Yes'),
(23, 'Fuska', 4, 'Good', 'fuska', 50, 'Food-Name-1799.jpg', 65, 'Yes', 'Yes'),
(25, 'Fride rice', 4, 'Good', 'Use medium to long grain rice, not short grain sweet/sushi rice or glutinous rice...', 200, 'Food-Name-8267.jpg', 64, 'Yes', 'Yes'),
(26, 'Chowmin', 2.5, 'Good', 'Boil the noodles as per instructions given on the packet. · In a bowl mix all the sauces, vinegar, pepper, and salt', 150, 'Food-Name-7393.jpg', 63, 'Yes', 'Yes'),
(66, 'Pizza', 4.5, 'Good', 'Pizza, dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil, oregano, tomato, olives, mozzarella or other cheese, and many other ingredients, baked quickly', 500, 'Food-Name-8565.jpg', 66, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(150) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `payment`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(10, 'Burger', '180', 1, 180, '2021-06-23 05:22:44', 'Ordered', '', 'Shipon', '01847685855', 'shp@gmail.com', 'Sylhet'),
(14, 'Burger', '180', 2, 360, '2021-07-29 07:25:38', 'Ordered', '', 'Shipon', '01734855897', 'shp@gmail.com', 'sylhet'),
(28, 'pizza', '300', 1, 300, '2021-08-16 07:23:00', 'Ordered', '', 'Shipon', '01734855897', 'shp@gmail.com', 'syl'),
(29, 'Pizza', '260', 2, 0, '2021-08-20 04:50:26', 'Ordered', '', 'Shipon', '01847685855', 'shipon2696@gmail.com', 'test'),
(30, 'Burger', '180', 1, 180, '2021-08-20 08:27:41', 'Ordered', 'Cash On Delivery', 'Shipon', '01734855897', 'shipon2696@gmail.com', 'test'),
(31, 'Burger', '180', 1, 180, '2021-08-20 08:30:21', 'Ordered', 'Cash On Delivery', 'Shipon', '01734855897', 'shipon2696@gmail.com', 'test'),
(32, 'Burger', '180', 1, 180, '2021-08-20 08:44:29', 'Cancelled', 'Cash On Delivery', 'Shipon', '01734855897', 'abc@gmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `id` int(11) NOT NULL,
  `mssge` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`id`, `mssge`, `rating`) VALUES
(1, 'hi', 3.8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `registerDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `email`, `password`, `profileImage`, `registerDate`) VALUES
(1, 'shipon', 'ahmed', 'shipon34@gmail.com', '$2y$10$VfSe6ACy/PyaygyTeb9uruQhsyOJGqoMiM2AhvCeysBdIZCqFjt0.', './assets/profile/beard.png', '2021-07-16 20:39:20'),
(2, 'Marjana', 'Akther', 'marjana@gmail.com', '$2y$10$vsbMeHuFE4jSYpjSh8rkreN30BQwKnpshgelUW3pjdm9yzKBI56TG', './assets/profile/beard.png', '2021-07-16 20:47:46'),
(3, 'Shipon', 'Ahmed', 'shipon36@gmail.com', '$2y$10$7j/AP2xH5NhSW/PkiyFEgOrfHeyDAOmbIi6ZdbgPnF/1fj7FpXLjm', './assets/profile/face-2.jpg', '2021-07-16 22:49:30'),
(4, 'Marjana', 'Akther', 'marjana12@gmail.com', '$2y$10$ok4na/v3jGliWwvsSJEq3enp8h8ue6/T.Bt.7xA3F2ssXRJ7I2c5y', './assets/profile/beard.png', '2021-07-17 23:21:53'),
(5, 'Marjana', 'Ritu', 'marjana32@gmail.com', '$2y$10$8gEzNe.zSHhZeW7Xz5j/beT8Z4QveJ39Wa.u.N1mqleFl.kf09C2e', './assets/profile/beard.png', '2021-07-17 23:40:14'),
(6, 'Shipon', 'Ahmed', 'shipon034@gmail.com', '$2y$10$zKkOa1A2b7L7FnO5GhSiTu5jYLRO9giSpHN/9Hn.WjWn6Ne/efg2u', './assets/profile/122794812_3398513860256822_3288842664117608913_n.jpg', '2021-07-18 00:49:32'),
(7, 'Shipon', 'ahmed', 'test12@gmail.com', '$2y$10$T1bHggREytcEB51iwpa8Ju7jJ7a3TafKlW8deEe3AZ9JE1rfU6KfS', './assets/profile/beard.png', '2021-07-31 14:14:17'),
(8, 'test', '24', 'test23@gmail.com', '$2y$10$9l9LCVKSvhJrCYN5xjFK.e7wa/9V.5L/ZKJCGESqGsqL9B13a2Wqm', './assets/profile/beard.png', '2021-07-31 20:41:01'),
(9, 'shipon', 'miah', 'shipon341@gmail.com', '$2y$10$JQi36ovQMfYhALk.NRaR6OMbVVA818GIOcq0/cTsZ/DBJsDKJPDVC', './assets/profile/beard.png', '2021-07-31 21:21:05'),
(10, 'Marjana', 'Akther2', 'marjana322@gmail.com', '$2y$10$Z.1sZWATvCrnK8DW1zC64OkkdVzlEsl0K3hY32hDbHx0ZJQT45ka.', './assets/profile/beard.png', '2021-07-31 21:28:21'),
(11, 'Shipon', '2', 'test5@gmail.com', '$2y$10$alzC8Aj.UsKlFjM6V83Nvu.Kb2GHe2mlJYmD.SD7sS/872WDKG7xG', './assets/profile/beard.png', '2021-07-31 21:32:18'),
(12, 'shipon', 'ahmed', 'shipon36@gmail.com', '$2y$10$PzbuKY2R5RTCF6BO5EeSgOh1GCr7FobO5q2gebtuEr0sE/2BpHPui', './assets/profile/beard.png', '2021-08-02 15:27:22'),
(13, 'abc', 'ef', 'abc@gmail.com', '$2y$10$2ASjeAe4x/P5fEaIipC0nONogVwRBR02n9Mzg2xVBHF.0xMA4Ia2u', './assets/profile/beard.png', '2021-08-02 15:30:18'),
(14, 'test', 'Ritu', 'ts@gmail.com', '$2y$10$p06qnKoNo0WIIj.7VG8SD.R9/lVu5XzaZeLfYCuUiXhJAVc9Snvjy', './assets/profile/beard.png', '2021-08-05 01:16:12'),
(15, 'xyz', '1', 'xyz@gmail.com', '$2y$10$EULBcKOfr7sANnXa.cYUk.rhugyPGgRCzFGA220KNiOadX8oE3Eay', './assets/profile/beard.png', '2021-08-05 01:54:26'),
(16, 'fazlu', 'haque', 'fazlu@gmail.com', '$2y$10$42BDacA6r6936xE.2DLa..APJ7VbmoWppHWePlKkFXZBiYoi27px6', './assets/profile/beard.png', '2021-08-07 16:48:48'),
(17, 'XYZ2', 'XX', 'xyz2@gmail.com', '$2y$10$hFpvRMYNB/P/3UOE3pbuRuq6EFgUb9XogLhv8NaYRCiO4FbJmHrDm', './assets/profile/beard.png', '2021-08-07 17:27:13'),
(18, 'xyz', '3', 'xyz3@gmail.com', '$2y$10$7PkmFwgTI6juyRRwMtaYr.snQHZOz5CdTZPZu5W5B1t3.DiqXNBS2', './assets/profile/beard.png', '2021-08-07 22:51:27'),
(19, 'test', '4', 'test4@gmail.com', '$2y$10$SRmuSI6/yOvSnTLtfhSRaOTdD6AWSJ1uKB0cFboKOF/H1dw7XSLU.', './assets/profile/beard.png', '2021-08-08 00:34:39'),
(20, 'xyz', '6', 'xyz6@gmail.com', '$2y$10$QDx5XNHN6SC8HCvAxVAXVuRRg/9k43hgCPT5jzF2T.Vu8ZRK8cxn6', './assets/profile/beard.png', '2021-08-08 02:04:39'),
(21, 'Marjan', '22', 'Marjan@gmail.com', '$2y$10$m4OsNSm3aSqb906vdgFHa.LPtBv3RfoviFE9VCNaatN82HRTcUBZe', './assets/profile/beard.png', '2021-08-10 00:55:54'),
(22, 'shipon', 'ahmed', 'abcd@gmail.com', '$2y$10$vZlqe0zZEKW2mxXc4aD/eecmsGZcxZQlUM2osORq9KOCDCnyuT.QS', './images/profile/122794812_3398513860256822_3288842664117608913_n.jpg', '2021-08-10 21:27:12'),
(23, 'shipon', 'Ahmed', 'test23@gmail.com', '$2y$10$/4opxtsSYIc3QlM.d64Uh.SwVz5eQjeB2YFcraN6MDQ0J.1.mmXT.', './images/profile/beard.png', '2021-08-11 13:09:39'),
(24, 'shipon', 'ahmed', 'shipon2696@gmail.com', '$2y$10$tYMC8jLWug4.uI8NGBRuHO5lU90h/BfSImWd/NCJBYAszufTaoyvW', './images/profile/122794812_3398513860256822_3288842664117608913_n.jpg', '2021-08-15 00:49:29'),
(25, 'abc', '24', 'abc@gmail.com', '$2y$10$sa1pi4UgGGc9OH85o.v/huVsLWvdhQZaJ3yPB06om6KUyRufNsnhC', './images/profile/122794812_3398513860256822_3288842664117608913_n.jpg', '2021-08-16 22:02:04'),
(26, 'Shipon', 'Ahmed', 'shipon@gmail.com', '$2y$10$C/sT455OTV1GdLoZ8EC9iOeU.Fv8Hql/eurT.7dSM5w10EvKSz/1e', './images/profile/122794812_3398513860256822_3288842664117608913_n.jpg', '2021-08-19 11:59:49'),
(27, 'Shipon', 'Ahmed', 'abc@gmail.com', '$2y$10$aikiYqE5kAtxnYQa7L/vV.ixugUkE0wj9/VyA7Y2qc2zNVNDtuw8a', './images/profile/beard.png', '2021-08-20 20:55:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `canteen_table`
--
ALTER TABLE `canteen_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `canteen_table`
--
ALTER TABLE `canteen_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
