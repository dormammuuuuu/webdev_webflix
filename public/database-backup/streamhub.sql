-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 12:36 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streamhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movies_id` int(11) NOT NULL,
  `movies_cast` varchar(53) CHARACTER SET utf8 DEFAULT NULL,
  `movies_category` varchar(31) CHARACTER SET utf8 DEFAULT NULL,
  `movies_rating` decimal(4,1) DEFAULT NULL,
  `movies_restriction` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `movies_sypnosis` varchar(488) CHARACTER SET utf8 DEFAULT NULL,
  `movies_thumbnail` varchar(148) CHARACTER SET utf8 DEFAULT NULL,
  `movies_title` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `movies_year` varchar(4) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movies_id`, `movies_cast`, `movies_category`, `movies_rating`, `movies_restriction`, `movies_sypnosis`, `movies_thumbnail`, `movies_title`, `movies_year`) VALUES
(1, 'LeBron James, Don Cheadle, Cedric Joe, Khris Davis', 'Science-Fiction Comedy Action', '5.0', 'PG', 'Superstar LeBron James and his young son, Dom, get trapped in digital space by a rogue AI. To get home safely, LeBron teams up with Bugs Bunny, Daffy Duck and the rest of the Looney Tunes gang for a high-stakes basketball game against the AI\'s digitized champions of the court -- a powered-up roster called the Goon Squad.', 'assets/images/thumb/MOV 1.png', 'Space Jam', '2021'),
(2, 'Gang Dong-won, Lee Jung-hyun, Re Lee', 'Action Horror', '5.0', 'PG', 'A soldier and his team battle hordes of post-apocalyptic zombies in the wastelands of the Korean Peninsula.', 'assets/images/thumb/MOV 2.png', 'Peninsula', '2020'),
(3, 'Bob Odenkirk, Connie Nielsen, Alexey Serebryakov', 'Action Thriller', '4.6', 'PG', 'Hutch Mansell fails to defend himself or his family when two thieves break into his suburban home one night. The aftermath of the incident soon strikes a match to his long-simmering rage. In a barrage of fists, gunfire and squealing tires, Hutch must now save his wife and son from a dangerous adversary -- and ensure that he will never be underestimated again.', 'assets/images/thumb/MOV 3.png', 'Nobody', '2021'),
(4, 'Gerard Butler, Morgan Freeman, Frederick Schmidt', 'Action Thriller', '4.7', 'PG', 'Authorities take Secret Service agent Mike Banning into custody for the failed assassination attempt of U.S. President Allan Trumbull. After escaping from his captors, Banning must evade the FBI and his own agency to find the real threat to the president. Desperate to uncover the truth, he soon turns to unlikely allies to help clear his name and save the country from imminent danger.', 'assets/images/thumb/MOV 4.png', 'Angel Has Fallen', '2019'),
(5, 'Bella Thorne, Patrick Schwarzenegger, Rob Riggle', 'Romance', '4.8', 'PG', 'Sheltered since childhood, 17-year-old Katie Price lives with a life-threatening sensitivity to sunlight. Her world opens up after dark when she ventures out to play her guitar for random travelers. One night, Katie encounters Charlie, a young man she\'s secretly admired for years. As fate leads to a budding romance, Katie desperately tries to hide her condition from her unsuspecting new beau.', 'assets/images/thumb/MOV 5.png', 'Midnight Sun', '2018'),
(6, 'Daniel Craig, Christoph Waltz, Léa Seydoux', 'Action Thriller', '4.5', 'PG', 'A cryptic message from the past leads James Bond to Mexico City and Rome, where he meets the beautiful widow of an infamous criminal. After infiltrating a secret meeting, 007 uncovers the existence of the sinister organization SPECTRE. Needing the help of the daughter of an old nemesis, he embarks on a mission to find her. As Bond ventures toward the heart of SPECTRE, he discovers a chilling connection between himself and the enemy he seeks.', 'assets/images/thumb/MOV 6.png', 'Spectre', '2015'),
(7, 'Emily Blunt, Cillian Murphy, Millicent Simmonds', 'Science-Fiction Horror', '5.0', 'PG', 'Following the deadly events at home, the Abbott family must now face the terrors of the outside world as they continue their fight for survival in silence. Forced to venture into the unknown, they quickly realize that the creatures that hunt by sound are not the only threats that lurk beyond the sand path.', 'assets/images/thumb/MOV 7.png', ' A Quiet Place II', '2020'),
(8, 'Kim Villacer and Family', 'Horror', '100.0', 'SPG', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat provident dolor aliquam accusamus labore eos, error mollitia sapiente enim dignissimos reprehenderit quis sunt, quos deleniti dolores eaque! Odit, excepturi voluptatem?', 'assets/images/thumb/MOV 8.png', 'Kim: Lost Programmer', '2020'),
(9, 'Alexander Skarsgård, Millie Bobby Brown, Rebecca Hall', 'Action Science-Fiction Thriller', '5.0', 'PG', 'Kong and his protectors undertake a perilous journey to find his true home. Along for the ride is Jia, an orphaned girl who has a unique and powerful bond with the mighty beast. However, they soon find themselves in the path of an enraged Godzilla as he cuts a swath of destruction across the globe. The initial confrontation between the two titans -- instigated by unseen forces -- is only the beginning of the mystery that lies deep within the core of the planet.', 'assets/images/thumb/MOV 9.png', 'Godzilla vs Kong', '2021'),
(10, 'Rosa Salazar, Christoph Waltz, Keean Johnson', 'Action Science-Fiction', '5.0', 'PG', 'Set several centuries in the future, the abandoned Alita is found in the scrapyard of Iron City by Ido, a compassionate cyber-doctor who takes the unconscious cyborg Alita to his clinic. When Alita awakens, she has no memory of who she is, nor does she have any recognition of the world she finds herself in. As Alita learns to navigate her new life and the treacherous streets of Iron City, Ido tries to shield her from her mysterious past.', 'assets/images/thumb/MOV 10.png', 'Alita: Battle Angel', '2019'),
(11, 'Tom Cruise, Henry Cavill, Ving Rhames', 'Action Thriller', '4.5', 'PG', 'Ethan Hunt and the IMF team join forces with CIA assassin August Walker to prevent a disaster of epic proportions. Arms dealer John Lark and a group of terrorists known as the Apostles plan to use three plutonium cores for a simultaneous nuclear attack on the Vatican, Jerusalem and Mecca, Saudi Arabia. When the weapons go missing, Ethan and his crew find themselves in a desperate race against time to prevent them from falling into the wrong hands.', 'assets/images/thumb/MOV 11.png', 'MI: Fallout', '2018'),
(12, 'Brad Pitt, Mireille Enos, James Badge Dale', 'Horror Adventure', '4.9', 'PG-13', 'When former U.N. investigator Gerry Lane (Brad Pitt) and his family get stuck in urban gridlock, he senses that it\'s no ordinary traffic jam. His suspicions are confirmed when, suddenly, the city erupts into chaos. A lethal virus, spread through a single bite, is turning healthy people into something vicious, unthinking and feral. As the pandemic threatens to consume humanity, Gerry leads a worldwide search to find the source of the infection and, with luck, a way to halt its spread.', 'assets/images/thumb/MOV 12.png', 'World War Z', '2013'),
(13, 'Leonardo DiCaprio, Kate Winslet, Billy Zane', 'Romance', '4.9', 'PG-13', 'James Cameron\'s \"Titanic\" is an epic, action-packed romance set against the ill-fated maiden voyage of the R.M.S. Titanic; the pride and joy of the White Star Line and, at the time, the largest moving object ever built. She was the most luxurious liner of her era -- the \"ship of dreams\" -- which ultimately carried over 1,500 people to their death in the ice cold waters of the North Atlantic in the early hours of April 15, 1912.', 'assets/images/thumb/MOV 13.png', 'Titanic', '1997'),
(14, 'Mark Wahlberg, Kurt Russell, Douglas M. Griffin', 'Thriller', '4.5', 'PG', 'On April 20, 2010, the Deepwater Horizon drilling rig explodes in the Gulf of Mexico, igniting a massive fireball that kills several crew members. Chief electronics technician Mike Williams (Mark Wahlberg) and his colleagues find themselves fighting for survival as the heat and the flames become stifling and overwhelming. Banding together, the co-workers must use their wits to make it out alive amid all the chaos.', 'assets/images/thumb/MOV 14.png', 'Deep Water Horizon', '2016'),
(15, 'Mario Casas, José Coronado, Bárbara Lennie', 'Thriller', '4.9', 'PG', 'A young businessman wakes up in a locked hotel room next to the body of his dead lover. He hires a prestigious lawyer to defend him, and over the course of one night, they work together to find out what happened.', 'assets/images/thumb/MOV 15.png', 'Invisible Guest', '2016'),
(16, 'Jessica Chastain, James McAvoy, Bill Hader', 'Horror Thriller', '4.0', 'PG', 'Defeated by members of the Losers\' Club, the evil clown Pennywise returns 27 years later to terrorize the town of Derry, Maine, once again. Now adults, the childhood friends have long since gone their separate ways. But when people start disappearing, Mike Hanlon calls the others home for one final stand. Damaged by scars from the past, the united Losers must conquer their deepest fears to destroy the shape-shifting Pennywise -- now more powerful than ever.', 'assets/images/thumb/MOV 16.png', 'IT: Chapter II', '2-19'),
(17, 'Vin Diesel, Michelle Rodriguez, Jordana Brewster', 'Adventure Action', '5.0', 'PG', 'Dom Toretto is living the quiet life off the grid with Letty and his son, but they know that danger always lurks just over the peaceful horizon. This time, that threat forces Dom to confront the sins of his past to save those he loves most. His crew soon comes together to stop a world-shattering plot by the most skilled assassin and high-performance driver they\'ve ever encountered -- Dom\'s forsaken brother.', 'assets/images/thumb/MOV 17.png', 'F9: The Fast Saga', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `userName`, `email`, `avatar`, `password`) VALUES
(1, 'Jerico', 'Victoria', 'dorms', 'jericovic65@gmail.com', 'null', '12345'),
(2, 'Anjo', 'Victoria', 'dormammu', 'jericovic60@gmail.com', 'NONE', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movies_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
