-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 04:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
  `movies_title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `movies_year` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `movies_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movies_id`, `movies_cast`, `movies_category`, `movies_rating`, `movies_restriction`, `movies_sypnosis`, `movies_thumbnail`, `movies_title`, `movies_year`, `movies_file`) VALUES
(1, 'Jennie Kim, Jisoo Kim, Lalisa Manoban, Rosé', 'Documentary', '5.0', 'PG-13', 'Exclusive interviews and concert footage highlihgting the career of Korean pop group Blackpink, as the quartet celebrate five years in the business.', 'assets/images/thumb/MOV 1.jpg', 'Black Pink: The Movie', '2021', 'assets/movies/1 - Black Pink - The Movie.mp4'),
(2, 'Simu Liu, Awkwafina, Meng\'er Zhang', 'Action Adventure', '5.0', 'PG-13', 'Martial-arts master Shang-Chi confronts the past he thought he left behind when he\'s drawn into the web of the mysterious Ten Rings organization.', 'assets/images/thumb/MOV 2.jpg', 'Shang-Chi', '2021', 'assets/movies/2 - Shang Chi.mp4'),
(3, 'Ryan Reynolds, Jodie Comer, Joe Keery', 'Action Comedy Adventure', '5.0', 'PG-13', 'When a bank teller discovers he\'s actually a background player in an open-world video game, he decides to become the hero of his own story -- one that he can rewrite himself. In a world where there\'s no limits, he\'s determined to save the day his way before it\'s too late, and maybe find a little romance with the coder who conceived him.', 'assets/images/thumb/MOV 3.jpg', 'Free Guy', '2021', 'assets/movies/3 - Free Guy.mp4'),
(4, 'Dave Bautista, Ella Purnell, Omari Hardwick', 'Action Horror Adventure Crime', '5.0', 'PG-18', 'After a zombie outbreak in Las Vegas, a group of mercenaries take the ultimate gamble and venture into the quarantine zone in hopes of pulling off an impossible heist.', 'assets/images/thumb/MOV 4.jpg', 'Army of the Dead', '2021', 'assets/movies/4 - Army of the Dead.mp4'),
(5, 'Scarlett Johansson, Florence Pugh, David Harbour', 'Action Adventure', '5.0', 'PG-13', 'Black Widow confronts the darker parts of her ledger when a dangerous conspiracy with ties to her past arises. Pursued by a force that will stop at nothing to bring her down, Natasha must deal with her history as a spy, and the broken relationships left in her wake long before she became an Avenger.', 'assets/images/thumb/MOV 5.jpg', 'Black Widow', '2021', 'assets/movies/5 - Black Widow.mp4'),
(6, 'LeBron James, Don Cheadle, Cedric Joe, Khris Davis', 'Science-Fiction Comedy Action', '5.0', 'PG', 'Superstar LeBron James and his young son, Dom, get trapped in digital space by a rogue AI. To get home safely, LeBron teams up with Bugs Bunny, Daffy Duck and the rest of the Looney Tunes gang for a high-stakes basketball game against the AI\'s digitized champions of the court -- a powered-up roster called the Goon Squad.', 'assets/images/thumb/MOV 6.png', 'Space Jam', '2021', 'assets/movies/6 - Space Jam.mp4'),
(7, 'Gang Dong-won, Lee Jung-hyun, Re Lee', 'Action Horror', '5.0', 'PG', 'A soldier and his team battle hordes of post-apocalyptic zombies in the wastelands of the Korean Peninsula.', 'assets/images/thumb/MOV 7.png', 'Peninsula', '2020', 'assets/movies/7 - Peninsula.mp4'),
(8, 'Bob Odenkirk, Connie Nielsen, Alexey Serebryakov', 'Action Thriller', '4.6', 'PG', 'Hutch Mansell fails to defend himself or his family when two thieves break into his suburban home one night. The aftermath of the incident soon strikes a match to his long-simmering rage. In a barrage of fists, gunfire and squealing tires, Hutch must now save his wife and son from a dangerous adversary -- and ensure that he will never be underestimated again.', 'assets/images/thumb/MOV 8.png', 'Nobody', '2021', 'assets/movies/8 - Nobody.mp4'),
(9, 'Gerard Butler, Morgan Freeman, Frederick Schmidt', 'Action Thriller', '4.7', 'PG', 'Authorities take Secret Service agent Mike Banning into custody for the failed assassination attempt of U.S. President Allan Trumbull. After escaping from his captors, Banning must evade the FBI and his own agency to find the real threat to the president. Desperate to uncover the truth, he soon turns to unlikely allies to help clear his name and save the country from imminent danger.', 'assets/images/thumb/MOV 9.png', 'Angel Has Fallen', '2019', 'assets/movies/9 - Angel Has Fallen.mp4'),
(10, 'Bella Thorne, Patrick Schwarzenegger, Rob Riggle', 'Romance', '4.8', 'PG', 'Sheltered since childhood, 17-year-old Katie Price lives with a life-threatening sensitivity to sunlight. Her world opens up after dark when she ventures out to play her guitar for random travelers. One night, Katie encounters Charlie, a young man she is secretly admired for years. As fate leads to a budding romance, Katie desperately tries to hide her condition from her unsuspecting new beau.', 'assets/images/thumb/MOV 10.png', 'Midnight Sun', '2018', 'assets/movies/10 - Midnight Sun.mp4'),
(11, 'Daniel Craig, Christoph Waltz, Léa Seydoux', 'Action Thriller', '4.5', 'PG', 'A cryptic message from the past leads James Bond to Mexico City and Rome, where he meets the beautiful widow of an infamous criminal. After infiltrating a secret meeting, 007 uncovers the existence of the sinister organization SPECTRE. Needing the help of the daughter of an old nemesis, he embarks on a mission to find her. As Bond ventures toward the heart of SPECTRE, he discovers a chilling connection between himself and the enemy he seeks.', 'assets/images/thumb/MOV 11.png', 'Spectre', '2015', 'assets/movies/11 - Spectre.mp4'),
(12, 'Emily Blunt, Cillian Murphy, Millicent Simmonds', 'Science-Fiction Horror', '5.0', 'PG', 'Following the deadly events at home, the Abbott family must now face the terrors of the outside world as they continue their fight for survival in silence. Forced to venture into the unknown, they quickly realize that the creatures that hunt by sound are not the only threats that lurk beyond the sand path.', 'assets/images/thumb/MOV 12.png', ' A Quiet Place II', '2020', 'assets/movies/12 - A Quiet Place 2.mp4'),
(13, 'Kim Villacer and Family', 'Horror', '100.0', 'SPG', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat provident dolor aliquam accusamus labore eos, error mollitia sapiente enim dignissimos reprehenderit quis sunt, quos deleniti dolores eaque! Odit, excepturi voluptatem?', 'assets/images/thumb/MOV 13.png', 'Kim: Lost Programmer', '2020', 'assets/movies/13 - Kim - Lost Programmer.mp4'),
(14, 'Alexander Skarsgård, Millie Bobby Brown, Rebecca Hall', 'Action Science-Fiction Thriller', '5.0', 'PG', 'Kong and his protectors undertake a perilous journey to find his true home. Along for the ride is Jia, an orphaned girl who has a unique and powerful bond with the mighty beast. However, they soon find themselves in the path of an enraged Godzilla as he cuts a swath of destruction across the globe. The initial confrontation between the two titans -- instigated by unseen forces -- is only the beginning of the mystery that lies deep within the core of the planet.', 'assets/images/thumb/MOV 14.png', 'Godzilla vs Kong', '2021', 'assets/movies/14 - Godzilla vs. Kong.mp4'),
(15, 'Rosa Salazar, Christoph Waltz, Keean Johnson', 'Action Science-Fiction', '5.0', 'PG', 'Set several centuries in the future, the abandoned Alita is found in the scrapyard of Iron City by Ido, a compassionate cyber-doctor who takes the unconscious cyborg Alita to his clinic. When Alita awakens, she has no memory of who she is, nor does she have any recognition of the world she finds herself in. As Alita learns to navigate her new life and the treacherous streets of Iron City, Ido tries to shield her from her mysterious past.', 'assets/images/thumb/MOV 15.png', 'Alita: Battle Angel', '2019', 'assets/movies/15 - Alita Battle Angel.mp4'),
(16, 'Tom Cruise, Henry Cavill, Ving Rhames', 'Action Thriller', '4.5', 'PG', 'Ethan Hunt and the IMF team join forces with CIA assassin August Walker to prevent a disaster of epic proportions. Arms dealer John Lark and a group of terrorists known as the Apostles plan to use three plutonium cores for a simultaneous nuclear attack on the Vatican, Jerusalem and Mecca, Saudi Arabia. When the weapons go missing, Ethan and his crew find themselves in a desperate race against time to prevent them from falling into the wrong hands.', 'assets/images/thumb/MOV 16.png', 'MI: Fallout', '2018', 'assets/movies/16 - MI Fallout.mp4'),
(17, 'Brad Pitt, Mireille Enos, James Badge Dale', 'Horror Adventure', '4.9', 'PG-13', 'When former U.N. investigator Gerry Lane (Brad Pitt) and his family get stuck in urban gridlock, he senses that it\'s no ordinary traffic jam. His suspicions are confirmed when, suddenly, the city erupts into chaos. A lethal virus, spread through a single bite, is turning healthy people into something vicious, unthinking and feral. As the pandemic threatens to consume humanity, Gerry leads a worldwide search to find the source of the infection and, with luck, a way to halt its spread.', 'assets/images/thumb/MOV 17.png', 'World War Z', '2013', 'assets/movies/17 - World War Z.mp4'),
(18, 'Leonardo DiCaprio, Kate Winslet, Billy Zane', 'Romance', '4.9', 'PG-13', 'James Cameron\'s \"Titanic\" is an epic, action-packed romance set against the ill-fated maiden voyage of the R.M.S. Titanic; the pride and joy of the White Star Line and, at the time, the largest moving object ever built. She was the most luxurious liner of her era -- the \"ship of dreams\" -- which ultimately carried over 1,500 people to their death in the ice cold waters of the North Atlantic in the early hours of April 15, 1912.', 'assets/images/thumb/MOV 18.png', 'Titanic', '1997', 'assets/movies/18 - Titanic.mp4'),
(19, 'Mark Wahlberg, Kurt Russell, Douglas M. Griffin', 'Thriller', '4.5', 'PG', 'On April 20, 2010, the Deepwater Horizon drilling rig explodes in the Gulf of Mexico, igniting a massive fireball that kills several crew members. Chief electronics technician Mike Williams (Mark Wahlberg) and his colleagues find themselves fighting for survival as the heat and the flames become stifling and overwhelming. Banding together, the co-workers must use their wits to make it out alive amid all the chaos.', 'assets/images/thumb/MOV 19.png', 'Deep Water Horizon', '2016', 'assets/movies/19 - Deepwater Horizon.mp4'),
(20, 'Mario Casas, José Coronado, Bárbara Lennie', 'Thriller', '4.9', 'PG', 'A young businessman wakes up in a locked hotel room next to the body of his dead lover. He hires a prestigious lawyer to defend him, and over the course of one night, they work together to find out what happened.', 'assets/images/thumb/MOV 20.png', 'Invisible Guest', '2016', 'assets/movies/20 - Invisible Guest.mp4'),
(21, 'Jessica Chastain, James McAvoy, Bill Hader', 'Horror Thriller', '4.0', 'PG', 'Defeated by members of the Losers\' Club, the evil clown Pennywise returns 27 years later to terrorize the town of Derry, Maine, once again. Now adults, the childhood friends have long since gone their separate ways. But when people start disappearing, Mike Hanlon calls the others home for one final stand. Damaged by scars from the past, the united Losers must conquer their deepest fears to destroy the shape-shifting Pennywise -- now more powerful than ever.', 'assets/images/thumb/MOV 21.png', 'IT: Chapter II', '2-19', 'assets/movies/21 - IT Chapter 2.mp4'),
(22, 'Vin Diesel, Michelle Rodriguez, Jordana Brewster', 'Adventure Action', '5.0', 'PG', 'Dom Toretto is living the quiet life off the grid with Letty and his son, but they know that danger always lurks just over the peaceful horizon. This time, that threat forces Dom to confront the sins of his past to save those he loves most. His crew soon comes together to stop a world-shattering plot by the most skilled assassin and high-performance driver they\'ve ever encountered -- Dom\'s forsaken brother.', 'assets/images/thumb/MOV 22.png', 'F9: The Fast Saga', '2021', 'assets/movies/22 - F9 Fast Saga.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `series_cast` varchar(53) CHARACTER SET utf8 DEFAULT NULL,
  `series_category` varchar(31) CHARACTER SET utf8 DEFAULT NULL,
  `series_rating` decimal(4,1) DEFAULT NULL,
  `series_restriction` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `series_sypnosis` varchar(488) CHARACTER SET utf8 DEFAULT NULL,
  `series_thumbnail` varchar(148) CHARACTER SET utf8 DEFAULT NULL,
  `series_title` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `series_year` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `series_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`series_id`, `series_cast`, `series_category`, `series_rating`, `series_restriction`, `series_sypnosis`, `series_thumbnail`, `series_title`, `series_year`, `series_file`) VALUES
(1, ' Charlie Cox, Elodie Yung, Deborah Ann Woll, Elden He', 'Action Fiction', '4.0', 'PG-13', 'A blind lawyer by day, vigilante by night. Matt Murdock fights the crime of New York as Daredevil. As a child Matt Murdock was blinded by a chemical spill in a freak accident. Instead of limiting him it gave him superhuman senses that enabled him to see the world in a unique and powerful way.', 'assets/images/thumb/SER 1.png', 'Daredevil', '2015', 'NULL'),
(2, 'Grant Gustin, Candice Patton, Carlos Valdes', 'Action Fiction', '3.6', 'PG', 'After being struck by lightning, Barry Allen wakes up from his coma to discover he\'s been given the power of super speed, becoming the Flash, fighting crime in Central City.\r\nComing out of coma nine months later, Barry and his new friends at S.T.A.R labs find that he now has the ability to move at superhuman speed.', 'assets/images/thumb/SER 2.png', 'The Flash', '2014', 'NULL'),
(3, 'Benedick Cumberbatch, Mark Gatiss, Martin Freeman, An', 'Crime Comedy Drama', '4.0', 'PG-13', 'Sherlock Holmes lives in 21st century London, a city filled with mystery, crime and deceit. The back streets are alive with robbers, blackmailers, smugglers and serial killers. When the police are desperate they call upon Mr Sherlock Holmes and his unconventional methods of deduction to shed light on the matter. Ably assisted by Doctor John Watson, a recently returned Afghanistan vet, Sherlock attempts to solve some of the countries most intriguing puzzles.', 'assets/images/thumb/SER 3.jpg', 'Sherlock Holmes', '2010', 'NULL'),
(4, 'Bryan Cranston, Aaron Paul, Anna Gunn, Dean Norris, B', 'Drama', '4.5', 'PG-13', 'Mild-mannered high school chemistry teacher Walter White\r\n   thinks his life can\'t get much worse. His salary barely \r\n   makes ends meet, a situation not likely to improve once his\r\n   pregnant wife gives birth, and their teenage son is battling \r\n   cerebral palsy. But Walter is dumbstruck when he learns he has \r\n   terminal cancer. Realizing that his illness probably will ruin \r\n   his family financially, Walter makes a desperate bid to earn as \r\n   much money as he can in the tim', 'assets/images/thumb/SER 4.jpg', 'Breaking Bad', '2008', 'NULL'),
(5, 'Steve Carell, Rainn Wilson, John Krasinski, Jenna Fis', 'Comedy', '4.0', 'PG-13', 'The Office is a mockumentary that documents the exploits of a paper supply company in Scranton, Pennsylvania. \r\n   Made up of head chief Michael Scott, a harmlessly deluded and ignorantly insensitive boss who cares about the\r\n   welfare of his employees while trying to put his own spin on company policy.', 'assets/images/thumb/SER 5.jpg', 'The Office', '2005', 'NULL'),
(6, 'Jennifer Aniston, Courteney Cox Arquette, Lisa Kudrow', 'Comedy', '4.0', 'PG-13', 'Six young men and women live in the same apartment complex and face life\r\n   and love together in Manhattan, New York City. As they\'re constantly sticking \r\n   their noses into each another\'s businesses, as well as sometimes swapping romantic \r\n   partners, the group always get into the kind of comic situations that most other \r\n   people never experience, especially during breakups.', 'assets/images/thumb/SER 6.jpg', 'Friends', '1994', 'NULL'),
(7, 'Amy Poehler, Aubrey Plaza, Nick Offerman, Chris Pratt', 'Comedy', '4.6', 'PG-13', 'Leslie Knope, a midlevel bureaucrat in an Indiana Parks and Recreation Department,\r\n   hopes to beautify her town (and boost her own career) by helping local nurse Ann Perkins \r\n   turn an abandoned construction site into a community park, but what should be a fairly \r\n   simple project is stymied at every turn by oafish bureaucrats, selfish neighbours, governmental \r\n   red tape and a myriad of other challenges.', 'assets/images/thumb/SER 7.jpg', 'Parks and Recreation', '2009', 'NULL'),
(8, 'Finn Jones, Jessica Henwick, Jessica Stroup, Tom Pelp', 'Action Fiction', '4.1', 'PG-13', 'A young man is bestowed with incredible martial arts skills and a mystical force known as the Iron Fist. Danny Rand returns to New York City after being missing for years, trying to reconnect with his past and his family legacy.', 'assets/images/thumb/SER 8.png', 'Iron Fist ', '2017', 'NULL'),
(9, 'Kento Yamazaki, Tao Tsuchiya, Asahina Aya, Ayame Misa', 'Thriller Survival Drama', '5.0', 'TV-MA', 'A group of bored delinquents are transported to a parallel dimension as part of a survival game. A group of bored delinquents are transported to a parallel dimension as part of a survival game. A group of bored delinquents are transported to a parallel dimension as part of a survival game.', 'assets/images/thumb/SER 9.png', 'Alice in borderland', '2020', 'NULL'),
(10, 'Shin Min-a, Kim Seon-ho, Lee Sang-yi', 'Romantic Comedy', '4.6', 'PG-13', 'oon Hye-jin (Shin Min-a), an intelligent and pretty dentist living in the big city, loses her job after she righteously accuses the clinic\'s head doctor of overdoing patients\' treatment for profit. She embarks on a trip to the idyllic seaside village of Gongjin, where she meets jack-of-all-trades Hong Du-sik (Kim Seon-ho). Du-sik is held in high esteem in the village because he takes care of the elders and does not shy away from any odd jobs. By chance, the paths of the two people cr', 'assets/images/thumb/SER 10.png', 'Hometown Cha-Cha', '2021', 'NULL'),
(11, 'Park Seo-joon, Kim Da-mi, Yoo Jae-myung', 'Drama ', '4.2', 'PG-13', 'Due to an accident which killed his father, Park Sae-ro-yi (Park Seo-joon) attempted to kill Jang Geun-won (Ahn Bo-hyun), the son of Jangga Group\'s founder, Jang Dae-hee (Yoo Jae-myung). He was jailed and the woman he loved, Oh Soo-ah (Kwon Na-ra), was offered a university scholarship by Jang Dae-hee and later became the Strategic Planning Head of Jangga Group. After his release from prison, Park Sae-ro-yi opens Danbam in Itaewon. He wants to be successful and seeks revenge towards J', 'assets/images/thumb/SER 11.png', 'Itaewon Class', '2020', 'NULL'),
(12, 'Song Kang, Han So-hee, Chae Jong-hyeop', 'Romance', '3.6', 'PG-18', 'An uncertain romance begins between a heartbroken woman who no longer believes in love and a flirtatious man who does not want to commit to a relationship.\r\nYear Released', 'assets/images/thumb/SER 12.png', 'Nevertheless', '2021', 'NULL'),
(13, 'Bae Doona, Gong Yoo, Lee Joon, Kim Sun-young, Lee Moo', 'Science-Fiction Thriller', '3.9', 'PG-18', 'During a perilous 24-hour mission on the moon, space explorers try to retrieve samples from an abandoned research facility steeped in classified secrets.', 'assets/images/thumb/SER 13.png', 'The Silent Sea', '2021', 'NULL'),
(14, 'Cho Seung-woo, Park Shin-hye, Kim Byong-chul', 'Science-Fiction Drama Action', '3.1', 'PG-18', 'An unfathomable event introduces an engineer (Cho Seung-woo) to dangerous secrets and to a woman (Park Shin-hye) from the future who has come looking for him', 'assets/images/thumb/SER 14.png', 'Sisyphus: The Myth', '2021', 'NULL'),
(15, 'Lee Jung-jae, Park Hae-soo, Wi Ha-jun', 'Survival Thriller Horror Drama', '4.0', 'PG-18', 'Hundreds of cash-strapped contestants accept an invitation to compete in children\'s games for a tempting prize, but the stakes are deadly', 'assets/images/thumb/SER 15.png', 'Squid Game', '2021', 'NULL'),
(16, 'Bae Suzy, Nam Joo-Hyuk, Kim Seon-Ho,  Kang Ha-Na', 'Drama Romance', '5.0', 'PG-13', 'Seo Dal Mi has dreams of becoming Korea\'s own Steve Jobs, and with her genius first love, an investor, and a business insider by her side, her dream may be closer than she thinks.', 'assets/images/thumb/SER 16.png', 'START-UP', '2020', 'NULL'),
(17, 'Song Jeong-ki, Jeon Yeo-been, Ok Taec-yeon', 'Crime Drama Comedy', '4.5', 'PG-18', 'During a visit to his motherland, a Korean-Italian mafia lawyer gives an unrivaled conglomerate a taste of its own medicine with a side of justice.', 'assets/images/thumb/SER 17.png', 'Vincenzo', '2021', 'NULL');

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
(1, 'Jerico', 'Victoria', 'dorms', 'jericovic65@gmail.com', 'assets/images/user_avatar/default.png', '12345'),
(2, 'Anjo', 'Victoria', 'dormammu', 'jericovic60@gmail.com', 'NONE', '123');

-- --------------------------------------------------------

CREATE TABLE `coming_soon` (
  `coming_soon_id` int(11) NOT NULL,
  `coming_soon_title` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `coming_soon_cast` varchar(53) CHARACTER SET utf8 DEFAULT NULL,
  `coming_soon_category` varchar(31) CHARACTER SET utf8 DEFAULT NULL,
  `coming_soon_rating` decimal(4,1) DEFAULT NULL,
  `coming_soon_restriction` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `coming_soon_sypnosis` varchar(488) CHARACTER SET utf8 DEFAULT NULL,
  `coming_soon_thumbnail` varchar(148) CHARACTER SET utf8 DEFAULT NULL,
  `coming_soon_year` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `coming_soon_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Table structure for table `user_favorites`
--

CREATE TABLE `user_favorites` (
  `user_id` int(11) NOT NULL,
  `favorite_id` int(11) NOT NULL,
  `ms_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_favorites`
--

INSERT INTO `user_favorites` (`user_id`, `favorite_id`, `ms_type`) VALUES
(1, 1, 'series');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movies_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`series_id`);

ALTER TABLE `coming_soon`
  ADD PRIMARY KEY (`coming_soon_id`);

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
  MODIFY `movies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `coming_soon`
  MODIFY `coming_soon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
