-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.byetcluster.com
-- Generation Time: Aug 07, 2023 at 04:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32608600_movier`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(25) NOT NULL,
  `release_date` varchar(30) NOT NULL,
  `language` varchar(25) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `category`, `release_date`, `language`, `description`) VALUES
(1, 'Avatar, the way of water (2022)', 'Sci-fi', 'Dec 2022', 'English', 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.'),
(3, 'Evil Dead Rise (2023)', 'Horror', 'April 2023', 'English', 'A twisted tale of two estranged sisters whose reunion is cut short by the rise of flesh-possessing demons, thrusting them into a primal battle for survival as they face the most nightmarish version of family imaginable.'),
(5, 'Bhediya (2022)', 'Horror', 'Nov 2022', 'Hindi', 'Set in the forests of Arunachal, Bhediya is a story of Bhaskar, a man who gets bitten by a wolf, and begins to transform into the creature. As Bhaskar and his buddies try to find answers, a bunch of twists, turns, and laughs ensue.'),
(6, 'Vikram Vedha (2022)', 'Action', 'Sept 2022', 'Hindi', 'A tough police officer sets out to track down and kill an equally tough gangster.'),
(7, 'Fast X (2023)', 'Action', 'May 2023', 'English', 'Over many missions and against impossible odds, Dom Toretto and his family have outsmarted and outdriven every foe in their path. Now, they must confront the most lethal opponent they\'ve ever faced. Fueled by revenge, a terrifying threat emerges from the shadows of the past to shatter Dom\'s world and destroy everything -- and everyone -- he loves.'),
(8, 'Bloody Daddy (2023)', 'Action', 'June 2023', 'Hindi', 'A messed up, tenacious man faces off against cops and crime lords to save the one relationship that matters to him. father.'),
(9, 'Flash (2023)', 'Sci-fi', 'June 2023', 'English', 'Worlds collide when the Flash uses his superpowers to travel back in time to change the events of the past. However, when his attempt to save his family inadvertently alters the future, he becomes trapped in a reality in which General Zod has returned, threatening annihilation. With no other superheroes to turn to, the Flash looks to coax a very different Batman out of retirement and rescue an imprisoned Kryptonian -- albeit not the one he\'s looking for.'),
(10, 'Extraction 2 (2023)', 'Action', 'June 2023', 'English', 'Back from the brink of death, commando Tyler Rake embarks on a dangerous mission to save a ruthless gangster\'s imprisoned family.'),
(12, 'Adipurush (2023)', 'Mythology', 'June 2023', 'Hindi', 'Adipurush is a 2023 Indian epic mythological action film based on the Hindu epic Ramayana. The film is written and directed by Om Raut and produced by T-Series and Retrophiles. Shot simultaneously in Hindi and Telugu, the film stars Prabhas, Saif Ali Khan, Kriti Sanon, Sunny Singh and Devdatta Nage.'),
(13, 'Elementals (2023)', 'Animation', 'June 2023', 'English', 'In a city where fire, water, land, and air residents live together, a fiery young woman and a go-with-the-flow guy discover something elemental: how much they actually have in common.'),
(14, 'Mission: Impossible - Dead Reckoning Part One (2023)', 'action', '12/07/2023', 'English', 'Ethan Hunt and the IMF team must track down a terrifying new weapon that threatens all of humanity if it falls into the wrong hands. With control of the future and the fate of the world at stake, a deadly race around the globe begins. Confronted by a mysterious, all-powerful enemy, Ethan is forced to consider that nothing can matter more than the mission -- not even the lives of those he cares about most.'),
(15, 'Oppenheimer (2023)', 'action', '21/07/2023', 'English', 'During World War II, Lt. Gen. Leslie Groves Jr. appoints physicist J. Robert Oppenheimer to work on the top-secret Manhattan Project. Oppenheimer and a team of scientists spend years developing and designing the atomic bomb. Their work comes to fruition on July 16, 1945, as they witness the world\'s first nuclear explosion, forever changing the course of history.'),
(16, 'Barbie (2023)', 'drama', '12/07/2023', 'English', 'Barbie and Ken are having the time of their lives in the colorful and seemingly perfect world of Barbie Land. However, when they get a chance to go to the real world, they soon discover the joys and perils of living among humans.'),
(17, 'Meg 2: The Trench (2023)', 'adventure', '04/08/2023', 'English', 'Jonas Taylor leads a research team on an exploratory dive into the deepest depths of the ocean. Their voyage spirals into chaos when a malevolent mining operation threatens their mission and forces them into a high-stakes battle for survival. Pitted against colossal, prehistoric sharks and relentless environmental plunderers, they must outrun, outsmart and outswim their merciless predators.'),
(18, 'Blue Beetle (2023)', 'sci-fi', '18/08/2023', 'English', 'Jaime Reyes suddenly finds himself in possession of an ancient relic of alien biotechnology called the Scarab. When the Scarab chooses Jaime to be its symbiotic host, he\'s bestowed with an incredible suit of armor that\'s capable of extraordinary and unpredictable powers, forever changing his destiny as he becomes the superhero Blue Beetle.'),
(19, 'Satyaprem Ki Katha (2023)', 'romance', '29/06/2023', 'Hindi', 'Satyaprem aka Sattu is a goofy, good-hearted, good for nothing boy in his early to mid-thirties who is eager to marry Katha but is also aware that the girl is way out of his league. She is the daughter of a well-known businessman. Sattu\'s dreams unexpectedly come true when Katha\'s parents come over to his house and ask for Sattu\'s hand in marriage! From here on starts Sattu\'s tryst to get Katha to fall in love with him and how in order to keep his marriage, he ends up discovering himself and proves to be a worthy husband.'),
(20, 'Rocky Aur Rani Ki Prem Kahani (2023)', 'romance', '28/07/2023', 'Hindi', 'Flamboyant Punjabi Rocky and intellectual Bengali journalist Rani fall in love despite their differences. After facing family opposition, they decide to live with each other\'s families for three months before getting married.'),
(21, 'Bawaal (2023)', 'romance', '21/07/2023', 'Hindi', 'Bawaal is a 2023 Indian Hindi-language romantic drama film directed by Nitesh Tiwari, and produced by Sajid Nadiadwala and Ashwiny Iyer Tiwari under Nadiadwala Grandson Entertainment and Earthsky Pictures. It stars Varun Dhawan and Janhvi Kapoor as a troubled married couple.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `movie_id`, `user_id`, `rating`, `review`) VALUES
(1, 3, 1, 3, 'Very Good'),
(2, 5, 1, 4, 'This movie VFX are awesome as an Indian film its good. Story is good.'),
(3, 3, 1, 4, 'Very Bloody Horror scene'),
(4, 6, 1, 3, 'very complex story, acting are decent'),
(5, 6, 1, 2, 'Pretty Average'),
(6, 3, 1, 3, 'Scary'),
(7, 10, 1, 4, 'That 21 minute non-stop action scenes gives goosebumps. Simple story. But many dialogues have any other language.'),
(8, 10, 1, 4, 'Action Packed movie.'),
(9, 14, 1, 5, 'Awesome action scenes.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateofjoin` varchar(55) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`, `dateofjoin`) VALUES
(1, 'Suman Mondal', '20ksmsbca31@keical.edu.in', 'SM7620', 'bachaoo', '2023-06-19 03:55:32'),
(14, 'Nasim Islam', '20ksmsbca28@keical.edu.in', 'NI27', 'afterbca', 'current_timestamp()'),
(15, 'SHRABANTI MONDAL ', 'sm@kk.com', 'SM11', '12345678', '2023-08-07 04:01:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
