-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 09:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xmas`
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
(97, 3, NULL, 24);

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
(2, 'emina', 'emina1000@yahoo.de', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'user', 'pig.jpg'),
(3, 'Manuela Thamer', 'yanceen@yahoo.com', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'user', 'pig.jpg'),
(4, 'Claudia', 'claudia@elf.at', '37f3deb18246c7bbf9348b7e74fe94eca111f8801a625cad4665d7a335f68676', 'admin', 'penguin.jpg'),
(5, 'Orsi', 'orsi@elf.at', 'ef95a084e8d8ee842873ca3fd71731a93b6efb59078b3f6a9ecb22274937d477', 'admin', 'monkey.jpg');

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
  `difficulty` enum('easy','intermediate','hard','crossfit') NOT NULL DEFAULT 'intermediate',
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wod`
--

INSERT INTO `wod` (`wodId`, `wodName`, `equipment`, `trainedParts`, `userId`, `points`, `description`, `durationInMinutes`, `difficulty`, `link`) VALUES
(1, 'plank fun', 'bodyweight', 'Bauchmuskel, Rücken, Schulter, Brust, Arme, Gesäß, Oberschenkelmuskulatur', 1, 20, '<p><strong>just 5 Minutes:</strong> <br />1 minute front leaning rest, <br />1 minute plank hold, <br />30 seconds left side plank hold, <br />30 seconds right side plank hold, <br />1 minute plank hold, <br />1 minute front leaning rest</p>', '5', 'hard', 'front leaning rest: https://www.youtube.com/watch '),
(2, 'Knie beuget euch!', 'bodyweight', 'Oberschenkel, Gesäß', 1, 7, '15 langsame und schöne Kniebeugen :-)\r\n', '3', 'easy', 'https://www.youtube.com/watch?v=u-G8nn6crRA&t=9s '),
(3, 'Push it up!', 'bodyweight', 'Brust, Arme, Schulter, Bauch, Rücken, Gesäß', 1, 10, '<p>2x 8 Pushups <br />Anf&auml;ngerInnen: vom Knie erlaubt :-)</p>\r\n<p>&nbsp;</p>', '4', 'intermediate', 'https://www.youtube.com/watch?v=H6Pq6i7xAv4 '),
(4, 'jump 4 joy', 'Springschnur', 'Beinmuskulatur sowie Bauch, Arme, Brust und Schultern', 2, 10, 'Kannst du 50 mal hintereinander springen?\r\nviel Spaß!', '2', 'intermediate', ''),
(11, 'Barbara', 'Pull-Up Stange', 'alles', 1, 30, '<p>5 Rounds For Time 20 Pull-Ups 30 Push-Ups 40 Sit-Ups 50 Air Squats 3 minutes Rest Complete 5 rounds of the repetitions in the order written. After each set of 50 Air Squats, you must take a 3 minute Rest. Time each round for reference and pacing purposes.</p>', '30-60+', 'crossfit', 'https://wodwell.com/wod/barbara/'),
(12, 'Tabata 1', 'Bodyworkout', 'Brust, Arme, Schulter, Bauch, Rücken, Gesäß, Oberschenkel', 1, 15, 'Los gehts!\r\nStelle eine Uhr für 4 Minuten und mach abwechselnd Tabata Liegestütze und Ausfallschritte:\r\n\r\n20sec Liegestütze  - 10sec Pause\r\n20sec Ausfallsschritte - 10sec Pause', '4', 'intermediate', 'https://www.youtube.com/watch?v=fnV-xLvKID8'),
(14, 'teste weste', 'teste', 'Brust, Arme, Schulter, Bauch, Rücken, Gesäß', 1, 25, 'asdfasdf\r\nasfsdf\r\nasfsdf', '33', 'crossfit', 'sdfasdfdsadfdsf');

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
  MODIFY `calendarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wod`
--
ALTER TABLE `wod`
  MODIFY `wodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
