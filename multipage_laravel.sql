-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 07:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multipage_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `img` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `category_id`, `title`, `img`) VALUES
(1, 2, 'Best Deals For New Products', '16.jpg'),
(2, 3, 'SHOP NOW', '27.jpg'),
(3, 4, 'Best Deals For New Products', '17.jpg'),
(4, 5, 'Best Deals For New Products', '25.jpg'),
(5, 6, 'Best Deals For New Products', '28.jpg'),
(6, 7, 'Best Deals For New Products', '26.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `uuid` varchar(36) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `uuid`, `name`) VALUES
(2, 'Households', 'c5b81bba-0372-11eb-b6ca-5891cf296611', 'households'),
(3, 'Pet Food', 'ca69b15e-0372-11eb-b6ca-5891cf296611', 'petfood'),
(4, 'Fruits and Vegetables', 'e66d7af1-0372-11eb-b6ca-5891cf296611', 'fregetables'),
(5, 'Beverages', 'fafea1e9-0372-11eb-b6ca-5891cf296611', 'beverages'),
(6, 'Frozen Foods', '29c5e7cd-0373-11eb-b6ca-5891cf296611', 'frozen'),
(7, 'Bakery', '32b0593c-0373-11eb-b6ca-5891cf296611', 'bakery');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `message_id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `telephone` varchar(225) DEFAULT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `message` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`message_id`, `name`, `email`, `telephone`, `subject`, `message`) VALUES
(1, 'dffgfsf', 'dsfsdf@fgff', 'dffgdsf', 'ffgsdf', 'ffhghretewwd'),
(2, 'hjjghj', 'hrttyer@rtye', 'ryertr', 'thrter', 'ergrefwf'),
(3, 'ghrtrfwr', 'ytretewr@eyerfwqd', 'uyjtyyut', 'yretwer', 'tyhrtwrrw');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_emails`
--

CREATE TABLE `newsletter_emails` (
  `email_id` int(11) NOT NULL,
  `email` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter_emails`
--

INSERT INTO `newsletter_emails` (`email_id`, `email`) VALUES
(1, 'abdovibration2010@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `offer` tinyint(1) DEFAULT NULL,
  `gift` tinyint(1) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price_before` float DEFAULT NULL,
  `price_after` float DEFAULT NULL,
  `uuid` varchar(36) DEFAULT NULL,
  `hotoffer` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `offer`, `gift`, `title`, `img`, `price_before`, `price_after`, `uuid`, `hotoffer`) VALUES
(3, 4, 1, 0, 'fresh cauliflower (2 no\'s)', '30.png', 8, 5, '70e55d1b-080e-11eb-a4e2-5891cf296611', 0),
(4, 4, 1, 0, 'fresh brinjal bharta (1 kg)', '31.png', 3, 2, '70e55fa8-080e-11eb-a4e2-5891cf296611', 0),
(5, 4, 1, 0, 'fresh sweet lime (500 gm)', '32.png', 7, 6, '70e561e6-080e-11eb-a4e2-5891cf296611', 0),
(6, 4, 1, 0, 'fresh spinach (palak)', '9.png', 3, 2, '70e564b4-080e-11eb-a4e2-5891cf296611', 0),
(7, 4, 1, 0, 'fresh mango dasheri (1 kg)', '10.png', 8, 5, '70e566e9-080e-11eb-a4e2-5891cf296611', 0),
(8, 4, 0, 1, 'fresh apple red (1 kg)', '11.png', 8, 6, '70e567c1-080e-11eb-a4e2-5891cf296611', 0),
(9, 4, 1, 0, 'fresh broccoli (500 gm)', '12.png', 6, 4, '70e5687f-080e-11eb-a4e2-5891cf296611', 0),
(10, 4, 1, 0, 'fresh basket onion (1 kg)', '33.png', 7, 5, '70e56978-080e-11eb-a4e2-5891cf296611', 1),
(11, 4, 1, 0, 'fresh muskmelon (1 kg)', '34.png', 5, 4, '70e56ae3-080e-11eb-a4e2-5891cf296611', 0),
(12, 4, 0, 1, 'fresh mushroom (500 ml)', '35.png', 15, 11, '70e56bf6-080e-11eb-a4e2-5891cf296611', 0),
(13, 4, 1, 0, 'fresh strawberry (1 pc)', '36.png', 9, 7, '70e56cf9-080e-11eb-a4e2-5891cf296611', 0),
(14, 3, 1, 0, 'can - tuna for cats (400 gm)', '57.png', 10, 8, '70e56d7e-080e-11eb-a4e2-5891cf296611', 0),
(15, 3, 1, 0, 'junior pet food (90 gm)', '58.png', 6, 5, '70e56e07-080e-11eb-a4e2-5891cf296611', 0),
(16, 3, 1, 0, 'dogs food - junior (4 Kg)', '4.png', 11, 9, '70e56eb1-080e-11eb-a4e2-5891cf296611', 0),
(17, 3, 1, 0, 'gravy food for dogs (20 kg)', '59.png', 18, 15, '70e56fbe-080e-11eb-a4e2-5891cf296611', 0),
(18, 3, 1, 0, 'meat for dogs (100 gm)', '60.png', 10, 8, '70e57078-080e-11eb-a4e2-5891cf296611', 0),
(19, 3, 1, 0, 'weekly pack (200 gm)', '61.png', 8, 5, '70e57102-080e-11eb-a4e2-5891cf296611', 0),
(20, 3, 0, 1, 'dog munchies (500 gm)', '62.png', 8, 6, '70e57186-080e-11eb-a4e2-5891cf296611', 0),
(21, 3, 1, 0, 'nutrition for cats (90 gm)', '63.png', 8, 6, '70e57207-080e-11eb-a4e2-5891cf296611', 0),
(22, 3, 1, 0, 'food for adult dogs (80 gms)', '25.png', 4, 3, '70e572ab-080e-11eb-a4e2-5891cf296611', 0),
(23, 3, 1, 0, 'young adult dogs (1.2 kg)', '26.png', 10, 6, '70e573b0-080e-11eb-a4e2-5891cf296611', 0),
(24, 3, 0, 1, 'cat food ocean fish (1.4 kg)', '27.png', 7, 6, '70e5746a-080e-11eb-a4e2-5891cf296611', 0),
(25, 3, 1, 0, 'chicken in jelly can (400 gm)', '28.png', 9, 7, '70e574f4-080e-11eb-a4e2-5891cf296611', 0),
(26, 5, 1, 0, 'orange soft drink (250 ml)', '49.png', 7, 5, '70e57574-080e-11eb-a4e2-5891cf296611', 0),
(27, 5, 1, 0, 'prune juice - sunsweet (1 ltr)', '14.png', 5, 4, '70e575f7-080e-11eb-a4e2-5891cf296611', 0),
(28, 5, 0, 1, 'coco cola zero can (330 ml)', '15.png', 5, 3, '70e57688-080e-11eb-a4e2-5891cf296611', 0),
(29, 5, 1, 0, 'sprite bottle (2 ltr)', '16.png', 4, 3, '70e5778e-080e-11eb-a4e2-5891cf296611', 0),
(30, 5, 1, 0, 'mixed fruit juice (1 ltr)', '13.png', 4, 3, '70e5785f-080e-11eb-a4e2-5891cf296611', 0),
(31, 5, 1, 0, 'aamras juice (250 ml)', '50.png', 5, 4, '70e578ea-080e-11eb-a4e2-5891cf296611', 1),
(32, 5, 0, 1, 'coconut water (1000 ml)', '51.png', 8, 6, '70e5796f-080e-11eb-a4e2-5891cf296611', 0),
(33, 5, 1, 0, 'ceres orange juice (1 ltr)', '52.png', 8, 6, '70e57a24-080e-11eb-a4e2-5891cf296611', 0),
(34, 5, 1, 0, 'dabur glucose D (250 gm)', '53.png', 12, 10, '70e57b28-080e-11eb-a4e2-5891cf296611', 0),
(35, 5, 1, 0, 'mix lemon flavour (50 gm)', '54.png', 10, 8, '70e57bd1-080e-11eb-a4e2-5891cf296611', 0),
(36, 5, 0, 1, 'schweppes water (250 ltr)', '55.png', 7, 6, '70e57c57-080e-11eb-a4e2-5891cf296611', 0),
(37, 5, 1, 0, 'red bull energy drink (250 ml)', '56.png', 9, 7, '70e57cdd-080e-11eb-a4e2-5891cf296611', 0),
(38, 6, 0, 1, 'pepper salami (250 gm)', '64.png', 12, 10, '70e57dc5-080e-11eb-a4e2-5891cf296611', 0),
(39, 6, 1, 0, 'sumeru green pees (500 gm)', '65.png', 11, 9, '70e57eb1-080e-11eb-a4e2-5891cf296611', 0),
(40, 6, 1, 0, 'tikka chicken (300 gm)', '66.png', 8, 6, '70e57f40-080e-11eb-a4e2-5891cf296611', 0),
(41, 6, 1, 0, 'mixed vegetables (500 gm)', '67.png', 7, 6, '70e57fc3-080e-11eb-a4e2-5891cf296611', 0),
(42, 6, 1, 0, 'mango pulp (800 gm)', '68.png', 11, 9, '70e58041-080e-11eb-a4e2-5891cf296611', 0),
(43, 6, 1, 0, 'kesar mango pulp (800 gm)', '69.png', 8, 5, '70e580c4-080e-11eb-a4e2-5891cf296611', 0),
(44, 6, 0, 1, 'frozen sweet corn (250 gm)', '70.png', 8, 6, '70e58142-080e-11eb-a4e2-5891cf296611', 0),
(45, 6, 1, 0, 'chicken nuggets (1 kg)', '71.png', 6, 4, '70e581c2-080e-11eb-a4e2-5891cf296611', 0),
(46, 6, 1, 0, 'garlic fingers (400 gm)', '72.png', 7, 5, '70e58241-080e-11eb-a4e2-5891cf296611', 0),
(47, 6, 1, 0, 'catch fish finger (200 gm)', '73.png', 10, 8, '70e582c0-080e-11eb-a4e2-5891cf296611', 0),
(48, 6, 0, 1, 'sumeru chicken (500 ml)', '74.png', 15, 11, '70e58342-080e-11eb-a4e2-5891cf296611', 0),
(49, 6, 1, 0, 'veggie fingers (400 gm)', '75.png', 9, 7, '70e583c2-080e-11eb-a4e2-5891cf296611', 0),
(50, 7, 1, 0, 'raisin rolls (2 in 1 pack)', '37.png', 5, 4, '70e58474-080e-11eb-a4e2-5891cf296611', 0),
(51, 7, 1, 0, 'butter croissants (50 gm)', '38.png', 4, 2, '70e58529-080e-11eb-a4e2-5891cf296611', 0),
(52, 7, 1, 0, 'bread wheat pita (250 gm)', '39.png', 5, 3, '70e585af-080e-11eb-a4e2-5891cf296611', 0),
(53, 7, 1, 0, 'hot dog roll (150 gm)', '40.png', 5, 4, '70e58633-080e-11eb-a4e2-5891cf296611', 0),
(54, 7, 1, 0, 'masala bread (500 gm)', '41.png', 5, 3, '70e586b3-080e-11eb-a4e2-5891cf296611', 0),
(55, 7, 1, 0, 'rolls chocolate (3 pcs)', '42.png', 8, 5, '70e58735-080e-11eb-a4e2-5891cf296611', 0),
(56, 7, 0, 1, 'wheat masala pav (500 gm)', '43.png', 8, 6, '70e587b7-080e-11eb-a4e2-5891cf296611', 1),
(57, 7, 1, 0, 'baked - garlic bread (200 gm)', '44.png', 8, 6, '70e588cf-080e-11eb-a4e2-5891cf296611', 0),
(58, 7, 1, 0, 'eggless walnut (250 gm)', '45.png', 8, 6, '70e58957-080e-11eb-a4e2-5891cf296611', 0),
(59, 7, 1, 0, 'assorted muffins (200 gm)', '46.png', 5, 4, '70e589dd-080e-11eb-a4e2-5891cf296611', 0),
(60, 7, 0, 1, 'bagels - sesame (200 gm)', '47.png', 7, 6, '70e58a5e-080e-11eb-a4e2-5891cf296611', 0),
(61, 7, 1, 0, 'flax & walnut loaf (400 gm)', '48.png', 9, 7, '70e58ae0-080e-11eb-a4e2-5891cf296611', 0),
(62, 2, 1, 0, 'dishwash gel, lemon (1.5 ltr)', '17.png', 10, 8, '70e58c25-080e-11eb-a4e2-5891cf296611', 0),
(63, 2, 1, 0, 'dish wash bar (500 gm)', '18.png', 4, 2, '70e58cb7-080e-11eb-a4e2-5891cf296611', 0),
(64, 2, 1, 0, 'air freshener (50 gm)', '19.png', 5, 3, '70e58d94-080e-11eb-a4e2-5891cf296611', 0),
(65, 2, 1, 0, 'toilet cleaner expert (1 ltr)', '20.png', 7, 6, '70e58e97-080e-11eb-a4e2-5891cf296611', 0),
(66, 2, 1, 0, 'princeware packaging container pack (6 no\'s)', '21.png', 10, 8, '70e58f52-080e-11eb-a4e2-5891cf296611', 0),
(67, 2, 1, 0, 'signoraware container center press (900 ml)', '22.png', 8, 5, '70e58fdd-080e-11eb-a4e2-5891cf296611', 0),
(68, 2, 0, 1, 'ship stainless steel sauce pan single (1 pc)', '23.png', 8, 6, '70e59063-080e-11eb-a4e2-5891cf296611', 0),
(69, 2, 1, 0, 'omega stainless steel puri dabba (1 pc)', '24.png', 8, 6, '70e59108-080e-11eb-a4e2-5891cf296611', 0),
(70, 2, 1, 0, 'food for adult dogs (80 gms)', '25.png', 4, 3, '70e59216-080e-11eb-a4e2-5891cf296611', 0),
(71, 2, 1, 0, 'young adult dogs (1.2 kg)', '26.png', 10, 6, '70e592d9-080e-11eb-a4e2-5891cf296611', 0),
(72, 2, 0, 1, 'cat food ocean fish (1.4 kg)', '27.png', 7, 6, '70e59365-080e-11eb-a4e2-5891cf296611', 1),
(73, 2, 1, 0, 'chicken in jelly can (400 gm)', '28.png', 9, 7, '70e593e9-080e-11eb-a4e2-5891cf296611', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subsections`
--

CREATE TABLE `subsections` (
  `subsection_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `img` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subsections`
--

INSERT INTO `subsections` (`subsection_id`, `category_id`, `title`, `img`) VALUES
(1, 4, 'Fruits & Vegetables', '18.jpg'),
(2, 4, 'Dry Fruits', '19.jpg'),
(3, 4, 'Vegetables', '20.jpg'),
(4, 6, 'Frozen Meat', '24.jpg'),
(5, 6, 'Frozen Chocolate Chips', '29.jpg'),
(6, 6, 'Frozen Soy Bean', '30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `hash` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT NULL,
  `verification_token` varchar(36) DEFAULT NULL,
  `password_reset_token` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `hash`, `email`, `phone`, `email_verified`, `verification_token`, `password_reset_token`) VALUES
(3, 'abdullahezzat3', '$2y$10$Mq.UtBOqLmF7qZX1GPHbCOXr5PjsfIUkKD7qVfRIZ.znn8n.a1teK', 'abdullahnoureddine137@gmail.com', NULL, 1, 'a145b987-f613-4457-b728-e250c3a5398b', 'f0f1a77b-af1f-4b1a-a2f8-26e4b5b06457'),
(5, 'abdosaytara', '$2y$10$JXyuQjjdug32y8.Pft6afe7b4JMnO/KpdACfrdESrRU9Kd8fLLxjK', 'abdullahezzat3@gmail.com', NULL, 1, 'afdbd892-9e11-4035-bdb1-c2457fa7a6de', NULL),
(11, 'abdovibration10', '$2y$10$hJqMnJdkhhlklpLNyYf8..qBk91Er5y0e7JuRvc/IPDMy126bryMu', 'abdovibration2010@yahoo.com', NULL, 1, '9aea04b1-710d-4e57-9d35-1d677f0ad47b', 'ef3cf9fe-a8c3-47b9-84c6-53f15ccd6b92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `newsletter_emails`
--
ALTER TABLE `newsletter_emails`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `uuid` (`uuid`);

--
-- Indexes for table `subsections`
--
ALTER TABLE `subsections`
  ADD PRIMARY KEY (`subsection_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter_emails`
--
ALTER TABLE `newsletter_emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `subsections`
--
ALTER TABLE `subsections`
  MODIFY `subsection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subsections`
--
ALTER TABLE `subsections`
  ADD CONSTRAINT `subsections_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
