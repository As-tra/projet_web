-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2025 at 10:58 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vortex`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `state_id` int DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `postal_code`) VALUES
(1, 'Tunis Centre', 1, '1000'),
(2, 'Bab Bhar', 1, '1006'),
(3, 'Carthage', 1, '2016'),
(4, 'Ariana Ville', 2, '2080'),
(5, 'Raoued', 2, '2081'),
(6, 'La Soukra', 2, '2036'),
(7, 'Ben Arous', 3, '2013'),
(8, 'El Mourouj', 3, '2074'),
(9, 'Hammam Lif', 3, '2050'),
(10, 'Manouba', 4, '2010'),
(11, 'Douar Hicher', 4, '2012'),
(12, 'Mornaguia', 4, '2014'),
(13, 'Nabeul', 5, '8000'),
(14, 'Hammamet', 5, '8050'),
(15, 'Kélibia', 5, '8090'),
(16, 'Zaghouan', 6, '1100'),
(17, 'Bir Mcherga', 6, '1121'),
(18, 'Zriba', 6, '1131'),
(19, 'Bizerte', 7, '7000'),
(20, 'Mateur', 7, '7030'),
(21, 'Sejnane', 7, '7011'),
(22, 'Béja', 8, '9000'),
(23, 'Nefza', 8, '9021'),
(24, 'Testour', 8, '9050'),
(25, 'Jendouba', 9, '8100'),
(26, 'Bou Salem', 9, '8121'),
(27, 'Tabarka', 9, '8110'),
(28, 'Le Kef', 10, '7100'),
(29, 'Nebeur', 10, '7121'),
(30, 'Tajerouine', 10, '7131'),
(31, 'Siliana', 11, '6100'),
(32, 'Bou Arada', 11, '6121'),
(33, 'Gaafour', 11, '6131'),
(34, 'Sousse Médina', 12, '4000'),
(35, 'Sousse Riadh', 12, '4021'),
(36, 'Kalaa Kebira', 12, '4031'),
(37, 'Monastir', 13, '5000'),
(38, 'Sahline', 13, '5021'),
(39, 'Bekalta', 13, '5031'),
(40, 'Mahdia', 14, '5100'),
(41, 'Bou Merdes', 14, '5121'),
(42, 'Chebba', 14, '5131'),
(43, 'Sfax Ville', 15, '3000'),
(44, 'Sakiet Ezzit', 15, '3021'),
(45, 'Gremda', 15, '3013'),
(46, 'Kairouan', 16, '3100'),
(47, 'Haffouz', 16, '3121'),
(48, 'Sbikha', 16, '3131'),
(49, 'Kasserine', 17, '1200'),
(50, 'Sbeitla', 17, '1221'),
(51, 'Fériana', 17, '1231'),
(52, 'Sidi Bouzid', 18, '9100'),
(53, 'Menzel Bouzaiane', 18, '9121'),
(54, 'Regueb', 18, '9131'),
(55, 'Gabès Ville', 19, '6000'),
(56, 'Ghannouch', 19, '6011'),
(57, 'Métouia', 19, '6021'),
(58, 'Medenine', 20, '4100'),
(59, 'Ben Gardane', 20, '4121'),
(60, 'Zarzis', 20, '4131'),
(61, 'Tataouine', 21, '3200'),
(62, 'Remada', 21, '3221'),
(63, 'Ghomrassen', 21, '3231'),
(64, 'Gafsa', 22, '2100'),
(65, 'El Ksar', 22, '2121'),
(66, 'Métlaoui', 22, '2131'),
(67, 'Tozeur', 23, '2200'),
(68, 'Degache', 23, '2221'),
(69, 'Hazoua', 23, '2231'),
(70, 'Kebili', 24, '4200'),
(71, 'Douz', 24, '4221'),
(72, 'Souk Lahad', 24, '4231');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `city_id` int DEFAULT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `exp_date` varchar(10) DEFAULT NULL,
  `cvc` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `address`, `city_id`, `card_number`, `exp_date`, `cvc`, `created_at`) VALUES
(1, '30 rue baghded', 2, 'skancrub123', 'azerazer', 'azra', '2025-04-29 09:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `sneakers`
--

DROP TABLE IF EXISTS `sneakers`;
CREATE TABLE IF NOT EXISTS `sneakers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sneakers`
--

INSERT INTO `sneakers` (`id`, `brand`, `name`, `price`, `old_price`, `discount`, `image_url`, `description`, `category`) VALUES
(1, 'Adidas', 'Galaxy Runner', 99.00, 120.00, 17, 'image/p1.png', 'The Galaxy Runner is designed for runners who crave speed and agility. Featuring ultra-lightweight materials, responsive cushioning, and a breathable mesh upper, it provides superior comfort and support during every run.', 'Men'),
(2, 'Adidas', 'Urban Explorer', 78.00, 99.00, 21, 'image/p2.png', 'Urban Explorer brings a fresh streetwear vibe to your footwear collection. Crafted with premium leather and flexible soles, these sneakers ensure maximum comfort whether you are walking downtown or heading to a casual event.', 'Men'),
(3, 'Adidas', 'Trail Blazer', 45.00, 59.00, 24, 'image/p3.png', 'Built for adventure seekers, the Trail Blazer features rugged outsoles for enhanced grip and stability on uneven terrains. Its reinforced design and waterproof upper make it your ideal companion for hiking and trail running.', 'Men'),
(4, 'Adidas', 'Street Hustler', 78.00, 99.00, 21, 'image/p4.png', 'Street Hustler sneakers combine style and durability with a retro twist. The cushioned midsole and reinforced toe area are perfect for daily use, offering both protection and unmatched urban flair.', 'Men'),
(5, 'Adidas', 'Cloud Walker', 83.00, 110.00, 25, 'image/p5.png', 'Experience a walk among the clouds with the Cloud Walker. These sneakers offer a memory foam insole, breathable knit fabric, and shock-absorbing outsole to keep you moving effortlessly throughout your day.', 'Men'),
(6, 'Adidas', 'Peak Performer', 147.00, 179.00, 18, 'image/p6.png', 'Peak Performer sneakers are engineered for athletes pushing their limits. With adaptive fit technology, multi-surface traction, and high-performance cushioning, they are ideal for intense training sessions and competition.', 'Men'),
(7, 'Adidas', 'Velocity Boost', 77.00, 95.00, 19, 'image/p7.png', 'Velocity Boost gives you the energy return you need to outpace the competition. These running shoes feature a springy midsole and strategic ventilation zones to maximize performance without sacrificing comfort.', 'Men'),
(8, 'Adidas', 'Night Strider', 94.00, 110.00, 15, 'image/p8.png', 'Built for night runners, Night Strider sneakers include reflective detailing for increased visibility after dark. Combined with responsive cushioning and breathable materials, they offer safety and performance in one sleek package.', 'Men'),
(9, 'Adidas', 'Starlight Runner', 99.00, 115.00, 14, 'image/w1.png', 'Reach for the stars with the Starlight Runner sneakers. Featuring cutting-edge sole technology and a stylish design, they deliver the perfect blend of speed, support, and cosmic style.', 'Women'),
(10, 'Adidas', 'City Sprinter', 78.00, 99.00, 21, 'image/w2.png', 'City Sprinter sneakers are the ultimate choice for women on the go. Lightweight, flexible, and stylish, they are perfect for quick commutes, casual jogs, or simply navigating the city streets with confidence.', 'Women'),
(11, 'Adidas', 'Trail Seeker', 45.00, 59.00, 24, 'image/w3.png', 'Trail Seeker is built for adventurous women who love the outdoors. These sneakers combine a rugged sole with soft inner cushioning to provide comfort and grip during hikes, trail runs, and weekend escapades.', 'Women'),
(12, 'Adidas', 'Urban Glow', 78.00, 99.00, 21, 'image/w4.png', 'Step into the spotlight with Urban Glow sneakers. Their modern design, cushioned midsole, and breathable mesh upper ensure you stay comfortable and stylish from morning meetings to evening hangouts.', 'Women'),
(13, 'Adidas', 'Cloud Breeze', 83.00, 110.00, 25, 'image/w5.png', 'Feel the breeze with every step wearing Cloud Breeze sneakers. Engineered with lightweight, airy fabrics and a responsive footbed, they offer a perfect blend of freshness, comfort, and effortless style.', 'Women'),
(14, 'Adidas', 'Summit Racer', 147.00, 179.00, 18, 'image/w6.png', 'Summit Racer is for the ambitious women aiming for the top. With reinforced support systems, grippy outsoles, and water-resistant materials, these sneakers are ready to tackle any challenge, from mountains to marathons.', 'Women'),
(15, 'Adidas', 'Momentum Flow', 77.00, 95.00, 19, 'image/w7.png', 'Momentum Flow sneakers offer seamless movement and all-day comfort. Designed with lightweight fabrics and responsive cushioning, they are perfect for fitness enthusiasts and busy lifestyles alike.', 'Women'),
(16, 'Adidas', 'Twilight Runner', 94.00, 110.00, 15, 'image/w8.png', 'Twilight Runner blends elegance and performance for women who love to stay active. With shock-absorbing midsoles and night-reflective accents, they deliver comfort, safety, and style from dawn to dusk.', 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Tunis'),
(2, 'Ariana'),
(3, 'Ben Arous'),
(4, 'Manouba'),
(5, 'Nabeul'),
(6, 'Zaghouan'),
(7, 'Bizerte'),
(8, 'Béja'),
(9, 'Jendouba'),
(10, 'Kef'),
(11, 'Siliana'),
(12, 'Sousse'),
(13, 'Monastir'),
(14, 'Mahdia'),
(15, 'Sfax'),
(16, 'Kairouan'),
(17, 'Kasserine'),
(18, 'Sidi Bouzid'),
(19, 'Gabès'),
(20, 'Medenine'),
(21, 'Tataouine'),
(22, 'Gafsa'),
(23, 'Tozeur'),
(24, 'Kebili');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `dob`, `email`, `password`, `phone`, `city`, `address`, `created_at`) VALUES
(1, 'Skander Jenhani', 'root', '2025-05-01', 'skandern0000@gmail.com', '$2y$10$rgaGM8jsmkC4NU6grCMgDuSZrXx8.X.L0m23QaoAGRvK7Q767k32K', '94415320', 'Choose', '30 rue baghded', '2025-04-29 09:56:10'),
(4, 'Hidaya', 'lhodd', '2025-04-03', 'root@gmail.com', '$2y$10$CyUrxcdnOBd7BAuRCNaMUelaAl0BJ2K4/0Ev6Zg4cKlhKCj2YpaNe', '94415320', 'Choose', '30 rue baghded', '2025-04-29 09:58:57'),
(5, 'assil', 'assilou', '2025-04-03', 'assil@gmail.com', '$2y$10$a1JpHmWzUn6airTL2O2qQ.xHIkMmFDpr9WjJoww.vrOqo3wUZG.L2', '12345678', 'Choose', 'zan9et jerbi', '2025-04-29 10:14:06');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
