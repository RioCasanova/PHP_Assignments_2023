-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2023 at 12:14 PM
-- Server version: 10.4.31-MariaDB
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `philr_dmit2025ao2`
--

-- --------------------------------------------------------

--
-- Table structure for table `lab04_attractions`
--

CREATE TABLE `lab04_attractions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cost` enum('free','$','$$','$$$','varies') NOT NULL,
  `address` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `area_of_town` varchar(255) DEFAULT NULL,
  `family_friendly` tinyint(1) DEFAULT NULL,
  `season` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lab04_attractions`
--

INSERT INTO `lab04_attractions` (`id`, `name`, `category`, `cost`, `address`, `url`, `description`, `rating`, `area_of_town`, `family_friendly`, `season`) VALUES
(1, 'West Edmonton Mall', 'Shopping', '$$', '8882 170 St NW', 'https://www.wem.ca/', 'North America\'s largest shopping mall with entertainment attractions.', 5, 'West Edmonton', 1, 'Year-round'),
(2, 'Fort Edmonton Park', 'Historical Buildings & Monuments', '$$', '7000 143 St NW', 'https://www.fortedmontonpark.ca/', 'Living history museum showcasing early Edmonton.', 4, 'Southwest Edmonton', 1, 'Summer'),
(3, 'Alberta Legislature Building', 'Historical Buildings & Monuments', 'free', '10800 97 Ave NW', 'https://www.assembly.ab.ca/', 'Iconic building housing the Legislative Assembly of Alberta.', 4, 'Downtown', 1, 'Year-round'),
(4, 'Elk Island National Park', 'Parks & Natural Attractions', 'free', '54401 Range Rd 203', 'https://www.pc.gc.ca/en/pn-np/ab/elkisland', 'National park known for its wildlife, hiking trails, and stargazing.', 5, 'Northeast Edmonton', 1, 'Year-round'),
(5, 'Art Gallery of Alberta', 'Fine Arts', '$', '2 Sir Winston Churchill Sq', 'https://www.youraga.ca/', 'Contemporary and historical art exhibits in a beautiful building.', 4, 'Downtown', 1, 'Year-round'),
(6, 'Muttart Conservatory', 'Parks & Natural Attractions', '$$', '9626 96A St NW', 'https://www.edmonton.ca/attractions_events/muttart-conservatory.aspx', 'Botanical gardens with four unique pyramids showcasing various plant collections.', 4, 'Central Edmonton', 1, 'Year-round'),
(7, 'Edmonton River Valley', 'Parks & Natural Attractions', 'free', 'Various locations', 'https://www.edmonton.ca/activities_parks_recreation/parks_rivervalley/edmonton-river-valley.aspx', 'North America\'s largest urban parkland with trails and recreational opportunities.', 5, 'Various', 1, 'Year-round'),
(8, 'Royal Alberta Museum', 'Fine Arts', '$', '9810 103a Ave NW', 'https://royalalbertamuseum.ca/', 'Museum showcasing Alberta\'s natural and cultural history.', 4, 'Downtown', 1, 'Year-round'),
(9, 'Ukrainian Cultural Heritage Village', 'Historical Buildings & Monuments', '$$', 'East of Elk Island National Park', 'https://www.history.alberta.ca/ukrainianvillage/', 'Living history museum highlighting Ukrainian immigrant experiences.', 5, 'East Edmonton', 1, 'Summer'),
(10, 'Old Strathcona', 'Shopping', '$$', '82 Ave NW', 'https://www.oldstrathcona.ca/', 'Vibrant neighborhood with boutique shops, restaurants, and entertainment.', 4, 'South Central Edmonton', 1, 'Year-round'),
(11, 'Telus World of Science', 'Science & Technology', '$$', '11211 142 St NW', 'https://telusworldofscienceedmonton.ca/', 'Interactive science exhibits, planetarium shows, and educational programs.', 4, 'Northwest Edmonton', 1, 'Year-round'),
(12, 'High Level Bridge Streetcar', 'Historical Buildings & Monuments', '$', '109 Street & 100 Avenue', 'https://www.edmonton-radial-railway.ab.ca/', 'Historic streetcar ride offering panoramic views of the city.', 4, 'Downtown', 1, 'Year-round'),
(13, 'Rogers Place', 'Live Music & Theatre', 'varies', '10220 104 Ave NW', 'https://www.rogersplace.com/', 'Multi-purpose arena hosting hockey games, concerts, and events.', 5, 'Downtown', 1, 'Year-round'),
(14, 'Edmonton Valley Zoo', 'Parks & Natural Attractions', '$$', '13315 Buena Vista Rd NW', 'https://www.edmonton.ca/attractions_events/edmonton-valley-zoo.aspx', 'Zoo featuring a variety of animals and educational programs.', 4, 'West Edmonton', 1, 'Year-round'),
(15, 'Winspear Centre', 'Live Music & Theatre', '$$', '4 Sir Winston Churchill Sq', 'https://www.winspearcentre.com/', 'Concert hall hosting performances by the Edmonton Symphony Orchestra.', 4, 'Downtown', 1, 'Year-round'),
(16, 'Edmonton Corn Maze', 'Recreational Facilities', '$$', '26171 Garden Valley Rd', 'https://www.edmontoncornmaze.ca/', 'Family-friendly corn maze and outdoor activities.', 4, 'South Edmonton', 1, 'Summer'),
(17, 'Alberta Aviation Museum', 'Historical Buildings & Monuments', '$$', '11410 Kingsway NW', 'https://albertaaviationmuseum.com/', 'Museum dedicated to preserving and showcasing aviation history.', 4, 'North Central Edmonton', 1, 'Year-round'),
(18, 'Rutherford House Provincial Historic Site', 'Historical Buildings & Monuments', '$', '11153 Saskatchewan Dr', 'https://rutherfordhouse.ca/', 'Historic house museum showcasing the early days of Edmonton.', 4, 'University Area', 1, 'Year-round'),
(19, 'Ice Castles', 'Year-Round Attractions', '$$', '9330 Groat Rd NW', 'https://icecastles.com/edmonton/', 'Spectacular ice structures open during the winter season.', 4, 'Central Edmonton', 1, 'Winter'),
(20, 'John Janzen Nature Centre', 'Parks & Natural Attractions', '$', '7000 143 St NW', 'https://www.edmonton.ca/attractions_events/john-janzen-nature-centre.aspx', 'Nature center with exhibits, trails, and educational programs.', 4, 'Southwest Edmonton', 1, 'Year-round'),
(21, 'Corso 32', 'Restaurants & Food Vendors', '$$$', '10345 Jasper Ave', 'https://www.corso32.com/', 'Intimate Italian eatery serving handmade pasta and seasonal dishes.', 5, 'Downtown', 0, 'Year-round'),
(22, 'RGE RD', 'Restaurants & Food Vendors', '$$$', '10643 123 St NW', 'https://www.rgerd.ca/', 'Farm-to-table restaurant focusing on locally sourced ingredients.', 5, 'Westmount', 0, 'Year-round'),
(23, 'Sabor Restaurant', 'Restaurants & Food Vendors', '$$', '10220 103 St NW', 'https://www.sabor.ca/', 'Vibrant Portuguese and Spanish cuisine with live music.', 5, 'Downtown', 1, 'Year-round'),
(24, 'Duchess Bake Shop', 'Restaurants & Food Vendors', '$$', '10718 124 St NW', 'https://www.duchessbakeshop.com/', 'Charming bakery known for its French pastries and macarons.', 4, 'Westmount', 1, 'Year-round'),
(25, 'Flying Canoe Volant', 'Festivals', 'free', 'Various locations', 'https://flyingcanoevolant.ca/', 'Winter festival with interactive installations, music, and storytelling.', 5, 'Various', 1, 'Winter'),
(26, 'K-Days', 'Festivals', '$$', '7515 118 Ave NW', 'https://k-days.com/', 'Annual summer exhibition featuring rides, concerts, food, and entertainment.', 5, 'North Central Edmonton', 1, 'Summer'),
(27, 'Edmonton Folk Music Festival', 'Festivals', '$$$', 'Gallagher Park', 'https://edmontonfolkfest.org/', 'Annual folk music festival showcasing local and international artists.', 5, 'Southeast Edmonton', 1, 'Summer'),
(28, 'Ice On Whyte Festival', 'Festivals', '$$', 'Dr. Wilbert McIntyre Park', 'https://www.iceonwhyte.ca/', 'Winter festival featuring ice carving competitions and family activities.', 4, 'Old Strathcona', 1, 'Winter'),
(29, 'Edmonton International Fringe Theatre Festival', 'Festivals', '$$', 'Various locations', 'https://www.fringetheatre.ca/', 'Largest and oldest fringe theatre festival in North America.', 5, 'Various', 1, 'Summer'),
(30, 'Heritage Festival', 'Festivals', 'free', 'William Hawrelak Park', 'https://www.heritagefest.ca/', 'Annual multicultural festival celebrating diverse cultures and traditions.', 5, 'Southwest Edmonton', 1, 'Summer'),
(31, 'Symphony Under the Sky Festival', 'Festivals', '$$', 'William Hawrelak Park', 'https://www.winspearcentre.com/', 'Outdoor music festival featuring performances by the Edmonton Symphony Orchestra.', 4, 'Southwest Edmonton', 1, 'Summer'),
(32, 'Edmonton International Jazz Festival', 'Festivals', '$$', 'Various locations', 'https://www.edmontonjazz.com/', 'Annual jazz festival showcasing local and international jazz artists.', 4, 'Various', 1, 'Summer'),
(33, 'Silver Skate Festival', 'Festivals', 'free', 'Hawrelak Park', 'https://www.silverskatefestival.org/', 'Winter festival celebrating culture, recreation, and the outdoors.', 4, 'Southwest Edmonton', 1, 'Winter'),
(34, 'Edmonton Pride Festival', 'Festivals', 'free', 'Various locations', 'https://www.edmontonpride.ca/', 'Annual LGBTQ+ pride festival promoting inclusivity and diversity.', 5, 'Various', 1, 'Summer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab04_attractions`
--
ALTER TABLE `lab04_attractions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab04_attractions`
--
ALTER TABLE `lab04_attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
