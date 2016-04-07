-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 06:37 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Appetizers & Beverages'),
(2, 'Soups & Salads'),
(3, 'Vegetables & Side Dishes'),
(4, 'Main Dishes'),
(5, 'Breads & Rolls'),
(6, 'Desserts'),
(7, 'Cookies & Candy');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(50) NOT NULL,
  `ingredients` text NOT NULL,
  `category_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_name`, `ingredients`, `category_id_fk`) VALUES
(1, 'Adobong Manok', '1 lb. pusit (squid) \r\n1/4 cup water \r\n1/2 cup vinegar \r\n1/2 tsp. whole peppercorns \r\nsalt\r\n5 cloves garlic crushed \r\n2 tbsp. oil \r\n1 small onion\r\nsliced 2 tomatoes\r\nsliced sugar', 4),
(2, 'Pineapple Chicken Adobo', '1 whole chicken, cut into serving pieces\r\nsalt and pepper\r\n2 cloves garlic, minced\r\n2 bay leaf\r\n1/2 cup vinegar\r\n1 tbsp. soy sauce\r\n2 tbsp. atsuete (annatto) oil\r\n1 can pineapple tidbits, drained', 4),
(3, 'Grilled Pork Adobo', '2 lb. pork liempo (pork belly), trimmed\r\n1 clove garlic, crushed\r\n1/2 cup vinegar\r\n1 tbsp. soy sauce\r\npeppercorns\r\nwater', 4),
(4, 'Apple Bavarian Torted', '1/2 cup butter \r\n1/3 cup white sugar \r\n1/4 teaspoon vanilla extract \r\n1 cup all-purpose flour \r\nCheese Mixture: 1 (8 ounce) package cream cheese\r\n1/4 cup white sugar 1 egg \r\n1/2 teaspoon vanilla extract \r\nApple Mixture: 6 apples - peeled, cored, and thinly sliced \r\n1/3 cup white sugar \r\n1/2 teaspoon ground cinnamon \r\n1/4 cup sliced almonds', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
