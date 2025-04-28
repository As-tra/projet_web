-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2025 at 07:28 PM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
