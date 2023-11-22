-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2023 at 02:04 AM
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
-- Database: `rcasanova2_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `rcasanova2_attractions`
--

CREATE TABLE `rcasanova2_attractions` (
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
-- Dumping data for table `rcasanova2_attractions`
--

INSERT INTO `rcasanova2_attractions` (`id`, `name`, `category`, `cost`, `address`, `url`, `description`, `rating`, `area_of_town`, `family_friendly`, `season`) VALUES
(1, 'Tony&#39;s Pizza', 'Restaurants & Food Vendors', '$$', '9605 - 111 Ave', 'https://www.tonyspizzapalace.com/', 'Tony&#39;s Pizza is some of the best authentic pizza you can get in Edmonton, it also has a very authentic atmosphere. Don&#39;t forget to try the chili olive oil.                                            ', 4, 'North Central Edmonton', 1, 'Year-round'),
(2, 'The Art of Cake', 'Restaurants & Food Vendors', '$$', '11811 105 AVE', 'https://www.google.com/search?client=firefox-b-d&q=the+art+of+cake', '                        The Art of Cake is a very cool back-alley vibe cafe with lots of amazing pastries and cakes. The atmosphere is unlike any other cafe in Edmonton.                                                                ', 3, 'Downtown', 1, 'Year-round'),
(3, 'The Devonian Walking Trails', 'Parks & Natural Attractions', 'free', '29 Township Rd 511', 'https://www.alltrails.com/trail/canada/alberta/devon-river-valley-trail', '                        Not many people know about the extensive trails and infrastructure that was built along the North Saskatchewan River, it is a great place for a hike or a workout.                                                                ', 3, 'South Edmonton', 1, 'Summer'),
(4, 'Terwillegar Recreation Centre', 'Recreational Facilities', '$', '2051 Leger Road', 'https://www.edmonton.ca/activities_parks_recreation/terwillegar', 'This rec centre is arguably the best in Edmonton, it has a large slide, a lazy river, a large hot tub, and a massive diving board. Great for the whole family.                                             ', 3, 'Southwest Edmonton', 1, 'Year-round'),
(5, 'Purple City', 'Historical Buildings & Monuments', 'free', '10800 97 Ave NW', 'https://www.gigcity.ca/2011/09/11/purple-city-an-edmonton-tradition-no-one-tells-you-about/', 'This is more of a tradition but there are few who remain that remember purple city... You have to burn out your retinas to get there.                                        ', 2, 'Downtown', 0, 'Year-round'),
(6, 'The Fringe Festival', 'Festivals', '$$$', '10330 84 Ave NW', 'https://www.fringetheatre.ca/', 'overpriced and full of shows that are too inappropriate for children. It has some redeeming qualities.  an annual theatre Festival produced by Fringe Theatre.                                            ', 1, 'South Central Edmonton', 0, 'Summer'),
(7, 'The Aviation Museum', 'Historical Buildings & Monuments', '$', '11410 Kingsway NW', 'https://albertaaviationmuseum.com/', 'This is where you can see old planes and read stories about how they flew and the people that piloted them.                                            ', 3, 'North Central Edmonton', 1, 'Year-round'),
(8, 'South Edmonton Common', 'Shopping', '$$', '#1748 1732 99 St NW', 'https://www.southedmontoncommon.com/', 'A great place to do your outlet mall shopping - this used to be the biggest outlet centre in North America                                            ', 2, 'South Edmonton', 1, 'Year-round'),
(9, 'Amii Edmonton', 'Science & Technology', 'free', '10065 Jasper Ave #1101', 'https://www.amii.ca/', 'Every Wednesday between 9 and 11am you can go to the Machine Learning HQ of Edmonton and enjoy a coffee with other like-minded individuals.                                            ', 3, 'Downtown', 0, 'Year-round'),
(10, 'Urban Art', 'Fine Arts', 'free', 'Edmonton', 'https://oldstrathcona.ca/muralmap/', 'Edmonton is home to a bouquet of urban arts and murals - one can see most of it in the more urban areas                                            ', 3, 'Various', 1, 'Year-round'),
(11, 'Tzin', 'Restaurants & Food Vendors', '$$$', '10115-104st', 'https://www.tzin.ca/', 'Looks cool as hell can&#39;t wait to try it - looks like tapas and wine, very Spanish.                                             ', 4, 'Downtown', 0, 'Year-round'),
(12, 'The Buckingham', 'Live Music & Theatre', '$$', '10439 82 Ave NW', 'https://thebuckingham.ca/', 'The Buckingham is a Whyte Ave classic - it has an all vegan menu and it constantly playing excellent live music.                                           ', 3, 'South Central Edmonton', 0, 'Year-round'),
(13, 'Taste of Edmonton', 'Festivals', '$$$', 'Sir Winston Churchill Square', 'https://tasteofedm.ca/', 'This Festival lets people travel the globe through their taste-buds. You can try cuisine from all over the world at this event!                                            ', 4, 'Downtown', 1, 'Summer'),
(14, 'City Centre', 'Shopping', '$$', '10025 102A Ave NW', 'https://edmontoncitycentre.com/', 'No one goes here. Don&#39;t go here unless you&#39;re going to Obyrne&#39;s. It&#39;s also dangerous.                                            ', 1, 'Downtown', 0, 'Year-round'),
(15, 'Whyte Ave', 'Year-Round Attractions', '$$$', '82 Ave NW', 'https://exploreedmonton.com/attractions-and-experiences/old-strathcona-whyte-avenue', 'There is tons to see on this street and lots to do. Restaurants and nick-nacks.                                            ', 5, 'South Central Edmonton', 1, 'Year-round'),
(16, 'Fu&#39;s Repair Shop', 'Restaurants & Food Vendors', '$$', '10524 Jasper Avenue', 'https://www.yelp.ca/biz/fus-repair-shop-edmonton', 'Dumplings, Dim sum Brunch, Cocktails and DJs every Fri+Sat.\\\\\\\\r\\\\\\\\n18+ No Minors - solid atmosphere.', 4, 'Downtown', 0, 'Year-round'),
(19, 'El Cortez', 'Restaurants & Food Vendors', '$$$', '8320 Gateway Boulevard', 'https://exploreedmonton.com/food-and-drink/el-cortez', 'Mexican Bar that make amazing Tequila drinks and Tacos                                            ', 5, 'South Central Edmonton', 0, 'Year-round'),
(20, 'Vertically Inclined', 'Recreational Facilities', '$$', '8523 Argyll Rd NW', 'https://www.verticallyinclined.com/', 'This is a rock-climbing gym - there is an area for bouldering and lots of wall room.                                            ', 3, 'Southeast Edmonton', 1, 'Year-round'),
(21, 'Strathcona Farmers Market', 'Year-Round Attractions', '$$', '10310 83 Ave NW', 'https://osfm.ca/', 'This market runs throughout the year and is Edmonton&#39;s main farmers market.                                             ', 3, 'South Central Edmonton', 1, 'Year-round'),
(22, 'The End of The World', 'Parks & Natural Attractions', 'free', '7433 Saskatchewan Dr NW', 'https://www.familyfuncanada.com/edmonton/the-end-of-the-world/', 'Before they put the safety rails up, this is where edgy teens came to watch the sunset and throw things off the cliff. Its just a cliff where the sidewalk ends. Very Edmontonian.                                            ', 3, 'South Central Edmonton', 1, 'Summer'),
(23, 'Alchemy', 'Restaurants & Food Vendors', '$$$', '10344 102 St NW', 'https://www.alchemybar.ca/', 'This is a high-end speakeasy inside the JW Marriot which is the nicest hotel in downtown Edmonton. They serve high quality cocktails in a high quality setting.                                            ', 4, 'Downtown', 0, 'Year-round');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rcasanova2_attractions`
--
ALTER TABLE `rcasanova2_attractions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rcasanova2_attractions`
--
ALTER TABLE `rcasanova2_attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
