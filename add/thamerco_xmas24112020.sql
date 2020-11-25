-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2020 at 03:30 PM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thamerco_xmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `calendarId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `wodId` int(11) DEFAULT NULL,
  `dayId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calendarId`, `userId`, `wodId`, `dayId`) VALUES
(1, 3, 4, 1),
(2, 3, 3, 2),
(3, 2, NULL, 1),
(49, 2, NULL, 4),
(50, 2, NULL, 21),
(53, 2, NULL, 3),
(54, 2, NULL, 5),
(55, 2, NULL, 6),
(56, 2, NULL, 7),
(57, 2, NULL, 8),
(58, 2, NULL, 9),
(59, 2, NULL, 10),
(60, 2, NULL, 11),
(61, 2, NULL, 12),
(62, 2, NULL, 13),
(64, 2, NULL, 15),
(65, 2, NULL, 16),
(66, 2, NULL, 17),
(68, 2, NULL, 19),
(69, 2, NULL, 20),
(70, 2, NULL, 22),
(71, 2, NULL, 23),
(72, 2, NULL, 24),
(73, 2, 2, 18),
(74, 2, 2, 14),
(75, 2, 1, 2),
(76, 3, NULL, 3),
(77, 3, NULL, 4),
(78, 3, NULL, 5),
(79, 3, NULL, 6),
(80, 3, NULL, 7),
(81, 3, NULL, 8),
(82, 3, NULL, 9),
(83, 3, NULL, 10),
(84, 3, NULL, 11),
(85, 3, NULL, 13),
(86, 3, NULL, 13),
(87, 3, NULL, 14),
(88, 3, NULL, 15),
(89, 3, NULL, 16),
(90, 3, NULL, 17),
(91, 3, NULL, 18),
(92, 3, NULL, 19),
(93, 3, NULL, 20),
(94, 3, NULL, 21),
(95, 3, NULL, 22),
(96, 3, NULL, 23),
(97, 3, NULL, 24),
(98, 9, NULL, 1),
(99, 9, NULL, 2),
(100, 9, NULL, 3),
(101, 9, NULL, 4),
(102, 9, NULL, 5),
(103, 9, NULL, 6),
(104, 9, NULL, 7),
(105, 9, NULL, 8),
(106, 9, NULL, 9),
(107, 9, NULL, 10),
(108, 9, NULL, 11),
(109, 9, NULL, 12),
(110, 9, NULL, 13),
(111, 9, NULL, 14),
(112, 9, NULL, 15),
(113, 9, NULL, 16),
(114, 9, NULL, 17),
(115, 9, NULL, 18),
(116, 9, NULL, 19),
(117, 9, NULL, 20),
(118, 9, NULL, 21),
(119, 9, NULL, 22),
(120, 9, NULL, 23),
(121, 9, NULL, 24),
(122, 10, NULL, 1),
(123, 10, NULL, 2),
(124, 10, NULL, 3),
(125, 10, NULL, 4),
(126, 10, NULL, 5),
(127, 10, NULL, 6),
(128, 10, NULL, 7),
(129, 10, NULL, 8),
(130, 10, NULL, 9),
(131, 10, NULL, 10),
(132, 10, NULL, 11),
(133, 10, NULL, 12),
(134, 10, NULL, 13),
(135, 10, NULL, 14),
(136, 10, NULL, 15),
(137, 10, NULL, 16),
(138, 10, NULL, 17),
(139, 10, NULL, 18),
(140, 10, NULL, 19),
(141, 10, NULL, 20),
(142, 10, NULL, 21),
(143, 10, NULL, 22),
(144, 10, NULL, 23),
(145, 10, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `dayId` int(2) NOT NULL,
  `text` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`dayId`, `text`) VALUES
(1, 'Willkommen im Advent! Wir freuen uns, dass du dabei bist :-)'),
(2, 'Schön, du bist auch heute noch dabei! Viel Spaß beim fitten Start!'),
(3, 'Servus lieber Mensch! Packen wirs - auf in den Tag Numero 3!\r\n'),
(4, 'Hallo Barbara - und all jene, die nicht heute Namenstag feiern! Hast du schon Barbarazweige eingefrischt!\r\nals Alternative (oder Draufgabe): viel Spaß mit Fenster 4!'),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL),
(20, NULL),
(21, 'Grüss dich du sportliches Prachtexemplar! Bald hast du es geschafft! nur mehr 3 Tage bis Weihnachten!! \r\n\r\ngenieß dein AdventWod!'),
(22, 'Grüss dich!\r\nclick and enjoy!'),
(23, NULL),
(24, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user',
  `foto` varchar(20) NOT NULL DEFAULT 'pig.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`, `foto`) VALUES
(1, 'manolf', 'admin@gmail.com', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'admin', 'pig.jpg'),
(2, 'emina', 'emina@elf.at', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'admin', 'monkey.jpg'),
(3, 'Manu', 'yanceen@yahoo.com', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'user', 'pig.jpg'),
(4, 'Claudia', 'claudia@elf.at', '37f3deb18246c7bbf9348b7e74fe94eca111f8801a625cad4665d7a335f68676', 'admin', 'penguin.jpg'),
(5, 'Orsi', 'orsi@elf.at', 'ef95a084e8d8ee842873ca3fd71731a93b6efb59078b3f6a9ecb22274937d477', 'admin', 'monkey.jpg'),
(6, 'SIO', 'zerotee15@gmail.com', 'a247146cd45645d7d61289c2dcded4e8c32a32059f2689b139767e0b687bfdca', 'user', 'pig.jpg'),
(7, 'orsi', 'orsolya.veres1@gmail.com', 'd684d0cc9ce54542b5fc1208af05d477e1d4eed2d427d9a4f6a9cb00c49f468f', 'user', 'pig.jpg'),
(8, 'Babsi', 'lehner.ba@gmx.net', 'ecb5de544351531896f891a55cbcb9088bf7d4deb325cbe11f93d38718577880', 'user', 'pig.jpg'),
(9, 'Claudia', 'c.a.l@gmx.at', '7fd63ec6aaf5b66472418ad1210f8de0cfb4685662b20e29a75e71a7164609a3', 'user', 'pig.jpg'),
(10, 'moritz', 'moritz@gmail.com', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'user', 'pig.jpg'),
(11, 'carmen', 'carmen@elf.at', '944796c29c04068ad2c742982cf7944e83b6c0b4759c40226c84eddfc1ff4b34', 'admin', 'monkey.jpg'),
(12, 'babsi', 'babsi@elf.at', 'ef95a084e8d8ee842873ca3fd71731a93b6efb59078b3f6a9ecb22274937d477', 'admin', 'pig.jpg'),
(13, 'Marie Louise', 'marie@elf.at', '6ef67bc1f7664cbe0f3d62f02e0fd13fda323f6882238336ff790d9f793f2ebf', 'admin', 'monkey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wod`
--

CREATE TABLE `wod` (
  `wodId` int(11) NOT NULL,
  `wodName` varchar(35) DEFAULT NULL,
  `equipment` varchar(45) DEFAULT NULL,
  `trainedParts` varchar(100) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `points` int(5) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `durationInMinutes` varchar(10) DEFAULT NULL,
  `difficulty` enum('easy','intermediate','hard','crossfit','hanni') NOT NULL DEFAULT 'intermediate',
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wod`
--

INSERT INTO `wod` (`wodId`, `wodName`, `equipment`, `trainedParts`, `userId`, `points`, `description`, `durationInMinutes`, `difficulty`, `link`) VALUES
(1, 'plank fun', 'bodyweight', 'Bauchmuskel, RÃ¼cken, Schulter, Brust, Arme, GesÃ¤ÃŸ, Oberschenkelmuskulatur', 1, 20, ' <p><strong>\"Nur\" 5 Minuten:</strong> <br />1 minute front leaning rest, <br />1 minute plank hold, <br />30 Sekunden left side plank hold, <br />30 seconds right side plank hold, <br />1 minute plank hold, <br />1 minute front leaning rest</p> \r\nNach jeder Minute Halten je nach Bedarf zwischen 5 und 20 Sekunden Pause machen ', '5', 'hanni', 'front leaning rest: https://www.youtube.com/watch '),
(2, 'Knie beuget euch!', 'bodyweight', 'Oberschenkel, GesÃ¤ÃŸ', 1, 7, ' 15 langsame und schÃ¶ne Kniebeugen :-)\r\n ', '3', 'easy', 'https://www.youtube.com/watch?v=u-G8nn6crRA&t=9s '),
(3, 'Push it up!', 'bodyweight', 'Brust, Arme, Schulter, Bauch, RÃ¼cken, GesÃ¤ÃŸ', 1, 10, ' <p>2x 8 Pushups <br />AnfÃ¤ngerInnen: vom Knie erlaubt :-)</p>\r\n<p>Â </p> ', '4', 'intermediate', 'https://www.youtube.com/watch?v=H6Pq6i7xAv4 '),
(4, 'jump 4 joy', 'Springschnur', 'Beinmuskulatur sowie Bauch, Arme, Brust und Schultern', 2, 10, 'Kannst du 50 mal hintereinander springen?\r\n\r\nBeweise es! Ideal, um in Schwung zu kommen :-)\r\nviel SpaÃŸ!  ', '2', 'intermediate', ''),
(11, 'Barbara', 'Pull-Up Stange', 'alles', 1, 30, '<p>5 Rounds For Time 20 Pull-Ups 30 Push-Ups 40 Sit-Ups 50 Air Squats 3 minutes Rest Complete 5 rounds of the repetitions in the order written. After each set of 50 Air Squats, you must take a 3 minute Rest. Time each round for reference and pacing purposes.</p>', '30-60+', 'crossfit', 'https://wodwell.com/wod/barbara/'),
(12, 'Tabata 1', 'Bodyworkout', 'Brust, Arme, Schulter, Bauch, RÃ¼cken, GesÃ¤ÃŸ, Oberschenkel', 1, 15, ' Los gehts!\r\nStelle eine Uhr fÃ¼r 4 Minuten und mach abwechselnd Tabata LiegestÃ¼tze und Ausfallschritte:\r\n\r\n20sec LiegestÃ¼tze  - 10sec Pause\r\n20sec Ausfallsschritte - 10sec Pause ', '4', 'intermediate', 'https://www.youtube.com/watch?v=fnV-xLvKID8'),
(16, 'handstand heaven', 'bodyweight', 'schulter, arme, bauchmuskel, rÃ¼cken', 5, 10, '5 sets of 30 seconds handstand hold, 30 seconds rest', '4:30', 'intermediate', ''),
(17, 'love burpees', 'bodyweight', 'all, mostly conditioning', 5, 12, '20 burpees as fast as you can ', '2:00', 'easy', ''),
(18, 'step up, table/ring row', 'box/steady chair, table/rings', '', 5, 15, '3 set of\r\n5/5 slow and controlled step downs\r\n8 table/ring rows', '5', 'intermediate', ''),
(19, 'angels', 'bodyweight', 'shoulders', 5, 15, '10 reps of TWL (each)\r\n10 angels and devils', '5', 'hard', ''),
(22, 'Heavens Peak I', 'Bodyweight', 'Bauchmuskel', 12, 20, ' 5 Ãœbungen: 1. Front Jumping Jacks, 2. Knee Plank, 3. Floor Hyperextensions, 4. Russian Twists, 5. Sit Ups. Absolviere alle 5 Ãœbungen nacheinander je 30 Sekunden mit jeweils 30 Sekunden Pause dazwischen. Danach kannst du dich bis zu 2 Minuten erholen. Trainiere 3-4 Runden. Sollte die Plank auf den Knien zu leicht sein, kannst du sie gegen eine Plank auf den Ellenbogen oder HÃ¤nden austauschen. ', '30', 'intermediate', 'https://youtu.be/j7tVOB1WmA0'),
(23, 'Mount Nirvana I', 'Bodyweight', 'GanzkÃ¶rper', 12, 10, '20min AMRAP: 1. Sumo Air Squats, 2. Knee Push Ups, 3. Sit Ups\r\nAbsolviere alle 3 Ãœbungen nacheinander. Ob du dabei eine Pause brauchst, entscheidest du und dein KÃ¶rper alleine. Merke oder notiere dir auf einer Strichliste, wie viele Runden du geschafft hast. So kannst du immer wieder vergleichen, ob du dich verbessert hast und mehr Runden geschafft hast.', '20', 'easy', 'https://youtu.be/rfHoE3Wj5J0'),
(24, 'Pico das Torres I', 'Bodyweight', 'Bauchmuskel', 12, 20, ' Die 5 Ãœbungen: 1. Sit Ups, 2. Beginner Burpees, 3. Crunches, 4. V Hold, 5. Foot Tap Crunches\r\nAbsolviere alle 5 Ãœbungen nacheinander je 30 Sekunden mit jeweils 30 Sekunden Pause dazwischen. Danach kannst du dich bis zu 2 Minuten erholen. Trainiere 3-4 Runden. Sollten die Beginner Burpees etwas zu leicht fÃ¼r dich sein, kannst du sie gerne durch Basic Burpees ersetzen.\r\n ', '30', 'intermediate', 'https://youtu.be/Dh4SuGreDIY'),
(25, 'Challenger Point I', 'Bodyweight', 'GanzkÃ¶rper', 12, 20, 'Die Ãœbungen: 1. Front Jumping Jacks, 2. Butterfly Reverses, 3. Close Grip Push Ups, 4. Alternating Lunges, 5. Knee Plank\r\nHochintensive Belastungsphasen (30 Sekunden) wechseln sich mit Erholungsphasen (30 Sekunden) ab. Nach jeder Runde kannst du dich bis zu 2 Minuten erholen. Trainiere 3-4 Runden. Sollten dir die Plank oder LiegestÃ¼tze auf den Knien zu leicht sein, kannst du sie gerne gegen eine Elbow Plank und normale LiegestÃ¼tze austauschen.', '30', 'hard', 'https://youtu.be/lTVCTB93ypc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`calendarId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `wodId` (`wodId`),
  ADD KEY `dayId` (`dayId`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`dayId`),
  ADD UNIQUE KEY `dayId` (`dayId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `wod`
--
ALTER TABLE `wod`
  ADD PRIMARY KEY (`wodId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `calendarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wod`
--
ALTER TABLE `wod`
  MODIFY `wodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `calendar_ibfk_2` FOREIGN KEY (`wodId`) REFERENCES `wod` (`wodId`),
  ADD CONSTRAINT `calendar_ibfk_3` FOREIGN KEY (`dayId`) REFERENCES `day` (`dayId`);

--
-- Constraints for table `wod`
--
ALTER TABLE `wod`
  ADD CONSTRAINT `wod_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
