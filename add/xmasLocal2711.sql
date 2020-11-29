-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 07:31 PM
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
(1, 3, 22, 1),
(2, 3, 3, 2),
(3, 2, 17, 1),
(49, 2, 11, 4),
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
(76, 3, 2, 3),
(77, 3, 25, 4),
(78, 3, 17, 5),
(79, 3, 16, 6),
(80, 3, NULL, 7),
(81, 3, 19, 8),
(82, 3, 22, 9),
(83, 3, NULL, 10),
(84, 3, NULL, 11),
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
(99, 2, NULL, 21),
(100, 6, 3, 1),
(101, 6, 17, 2),
(102, 6, NULL, 3),
(103, 6, NULL, 4),
(104, 6, NULL, 5),
(105, 6, 2, 6),
(106, 6, NULL, 7),
(107, 6, NULL, 8),
(108, 6, NULL, 9),
(109, 6, NULL, 10),
(110, 6, NULL, 11),
(111, 6, NULL, 12),
(112, 6, NULL, 13),
(113, 6, NULL, 14),
(114, 6, NULL, 15),
(115, 6, NULL, 16),
(116, 6, NULL, 17),
(117, 6, NULL, 18),
(118, 6, NULL, 19),
(119, 6, NULL, 20),
(120, 6, NULL, 21),
(121, 6, NULL, 22),
(122, 6, NULL, 23),
(123, 6, NULL, 24),
(124, 3, 23, 12),
(125, 7, NULL, 1),
(126, 7, 11, 2),
(127, 7, NULL, 3),
(128, 7, NULL, 4),
(129, 7, NULL, 5),
(130, 7, NULL, 6),
(131, 7, NULL, 7),
(132, 7, NULL, 8),
(133, 7, NULL, 9),
(134, 7, NULL, 10),
(135, 7, NULL, 11),
(136, 7, NULL, 12),
(137, 7, NULL, 13),
(138, 7, NULL, 14),
(139, 7, NULL, 15),
(140, 7, NULL, 16),
(141, 7, NULL, 17),
(142, 7, NULL, 18),
(143, 7, NULL, 19),
(144, 7, NULL, 20),
(145, 7, NULL, 21),
(146, 7, NULL, 22),
(147, 7, NULL, 23),
(148, 7, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `dayId` int(2) NOT NULL,
  `text` varchar(500) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `elfPic` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`dayId`, `text`, `icon`, `elfPic`) VALUES
(1, 'Willkommen im Advent! Wir freuen uns, dass du dabei bist :-)\r\n<br>\r\nDas ist die Geschichte von Elf Hanno, der sehr gerne stärker wäre. Er möchte nämlich gerne Santa helfen, die Geschenke auszutragen. Allerdings ist bis dahin noch ein weiter Weg! <br>Du kannst ihn mit deinem Training dazu motivieren - vielleicht kann er dann heuer zum ersten Mal mit dabei sein. \r\n', './img/icon/1.png', './img/rope-climb.png'),
(2, 'Schön, du bist auch heute noch dabei! Das freut Hanno sehr. Dadurch fällt es ihm sehr viel leichter, fleißig für sein großes Vorhaben zu trainieren Viel Spaß und einen schönen Tag dir!', './img/icon/2.png', './img/handstand.png'),
(3, 'Hallo Mensch!\r\n\r\nna- kannst du die neugewonnene Kraft bereits fühlen? Hanno tut es - genauer gesagt spürt er vor allem seinen Muskelkater. Da er aber weiß, dass dies nur ein Zeichen dafür ist, dass seine Muskeln wachsen, ist er auch heute wildentschlossen, sein Training durchzuhalten..\r\nund - sind nicht alle guten Dinge drei?\r\nHab einen schönen Tag!\r\n', './img/icon/3.png', './img/hollow-hold.png'),
(4, 'Hallo Barbara - und all jene, die nicht heute Namenstag feiern! Hast du schon Barbarazweige eingefrischt!\r\nals Alternative (oder als Draufgabe): Lass es krachen: genieß dein viertes Workout - du hast es dir verdient!', './img/icon/4.png', './img/pistolsquat.png'),
(5, 'Hallo Krampus!\r\n<br> und natürlich du, lieber Mensch, der heute hoffentlich keine Angst hat! Bist du bereit, auch am Tag des furchterregenden Begleiters des Nikolaus dein Training zu absolvieren? Hanno ist es - auch wenn er sich vorsichtshalber Rudi als Trainingspartner gesichert hat.. es gibt ihm ein gutes Gefühl, heute nicht alleine zu trainieren.', './img/icon/5.png', './img/Rudolf.png'),
(6, 'Freue dich, Mensch,\r\nheute ist Nikolaustag! Bist du auch so aufgeregt wie die vielen Kinder, die er besuchen wird? Aber auch für dich gibt es ein Geschenk - egal ob du auch wirklich braaaav gewesen bist, oder nicht! Viel Spaß mit Workout Nummer 6!', './img/icon/6.png', './img/backsquat.png'),
(7, NULL, './img/icon/7.png', './img/boxjump.png'),
(8, NULL, './img/icon/8.png', './img/DU.png'),
(9, NULL, './img/icon/9.png', './img/handstand.png'),
(10, NULL, './img/icon/10.png', './img/plank.png'),
(11, NULL, './img/icon/11.png', './img/snatch.png'),
(12, NULL, './img/icon/12.png', './img/bent-ober-rows.png'),
(13, NULL, './img/icon/13.png', '/.img/deadlift.png'),
(14, NULL, './img/icon/14.png', './img/dip.png'),
(15, NULL, './img/icon/15.png', './img/flutterkicks.png'),
(16, NULL, './img/icon/16.png', './img/jumping-jacks.png'),
(17, NULL, './img/icon/17.png', './img/glute-bridge.png'),
(18, NULL, './img/icon/18.png', './img/kb_clean.png'),
(19, NULL, './img/icon/19.png', './img/lunges.png'),
(20, NULL, './img/icon/20.png', './img/ringrows.png'),
(21, 'Grüss dich du sportliches Prachtexemplar! Bald hast du es geschafft! nur mehr 3 Tage bis Weihnachten!! \r\n\r\ngenieß dein AdventWod!', './img/icon/21.png', './img/pull-up.png'),
(22, 'Grüss dich!\r\nclick and enjoy!', './img/icon/22.png', './img/single.png'),
(23, NULL, './img/icon/23.png', './img/wallsit.png'),
(24, NULL, './img/icon/24.png', './img/wallballshot.png');

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
  `foto` varchar(20) NOT NULL DEFAULT 'pig.jpg',
  `insta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`, `foto`, `insta`) VALUES
(1, 'manolf', 'admin@gmail.com', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'admin', 'pig.jpg', 'https://www.instagram.com/manoviews/'),
(2, 'emina', 'emina1000@yahoo.de', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'user', 'pig.jpg', ''),
(3, 'Manuela Thamer', 'yanceen@yahoo.com', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'user', 'pig.jpg', ''),
(4, 'Claudia', 'claudia@elf.at', '37f3deb18246c7bbf9348b7e74fe94eca111f8801a625cad4665d7a335f68676', 'admin', 'penguin.jpg', 'https://www.instagram.com/claudia.zazz/'),
(5, 'Orsi', 'orsi@elf.at', 'ef95a084e8d8ee842873ca3fd71731a93b6efb59078b3f6a9ecb22274937d477', 'admin', 'monkey.jpg', 'https://www.instagram.com/orsi_ov/'),
(6, 'max', 'max@gmail.com', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'user', 'pig.jpg', ''),
(7, 'moritz', 'moritz@gmail.com', 'a76546061fb1ed2a5fbc6f05df4e0ad6d5dbc2d7e52c6f1090cc709d0f55ada4', 'user', 'pig.jpg', ''),
(11, 'carmen', 'carmen@elf.at', '944796c29c04068ad2c742982cf7944e83b6c0b4759c40226c84eddfc1ff4b34', 'admin', 'monkey.jpg', 'https://www.instagram.com/carmenkulterer/'),
(12, 'babsi', 'babsi@elf.at', 'ef95a084e8d8ee842873ca3fd71731a93b6efb59078b3f6a9ecb22274937d477', 'admin', 'pig.jpg', 'https://www.instagram.com/babra_ann/'),
(13, 'Marie Louise', 'marie@elf.at', '6ef67bc1f7664cbe0f3d62f02e0fd13fda323f6882238336ff790d9f793f2ebf', 'admin', 'monkey.jpg', 'https://www.instagram.com/todaywelift/');

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
  `description` varchar(500) DEFAULT NULL,
  `durationInMinutes` varchar(10) DEFAULT NULL,
  `difficulty` enum('easy','intermediate','hard','crossfit','hanni') NOT NULL DEFAULT 'intermediate',
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wod`
--

INSERT INTO `wod` (`wodId`, `wodName`, `equipment`, `trainedParts`, `userId`, `description`, `durationInMinutes`, `difficulty`, `link`) VALUES
(1, 'plank fun', 'bodyweight', 'Bauchmuskel, Rücken, Schulter, Brust, Arme, Gesäß, Oberschenkelmuskulatur', 1, '<p><strong>just 5 Minutes:</strong> <br />1 minute front leaning rest, <br />1 minute plank hold, <br />30 seconds left side plank hold, <br />30 seconds right side plank hold, <br />1 minute plank hold, <br />1 minute front leaning rest</p>', '5', 'hard', 'front leaning rest: https://www.youtube.com/watch '),
(2, 'Knie beuget euch!', 'bodyweight', 'Oberschenkel, Gesäß', 1, '15 langsame und schöne Kniebeugen :-)\r\n', '3', 'easy', 'https://www.youtube.com/watch?v=u-G8nn6crRA&t=9s '),
(3, 'Push it up!', 'bodyweight', 'Brust, Arme, Schulter, Bauch, Rücken, Gesäß', 1, '<p>2x 8 Pushups <br />Anf&auml;ngerInnen: vom Knie erlaubt :-)</p>\r\n<p>&nbsp;</p>', '4', 'intermediate', 'https://www.youtube.com/watch?v=H6Pq6i7xAv4 '),
(4, 'jump 4 joy', 'Springschnur', 'Beinmuskulatur sowie Bauch, Arme, Brust und Schultern', 2, 'Kannst du 50 mal hintereinander springen?\r\nviel Spaß!', '2', 'intermediate', ''),
(11, 'Barbara', 'Pull-Up Stange', 'alles', 1, '<p>5 Rounds For Time 20 Pull-Ups 30 Push-Ups 40 Sit-Ups 50 Air Squats 3 minutes Rest Complete 5 rounds of the repetitions in the order written. After each set of 50 Air Squats, you must take a 3 minute Rest. Time each round for reference and pacing purposes.</p>', '30-60+', 'crossfit', 'https://wodwell.com/wod/barbara/'),
(12, 'Tabata 1', 'Bodyworkout', 'Brust, Arme, Schulter, Bauch, Rücken, Gesäß, Oberschenkel', 1, 'Los gehts!\r\nStelle eine Uhr für 4 Minuten und mach abwechselnd Tabata Liegestütze und Ausfallschritte:\r\n\r\n20sec Liegestütze  - 10sec Pause\r\n20sec Ausfallsschritte - 10sec Pause', '4', 'intermediate', 'https://www.youtube.com/watch?v=fnV-xLvKID8'),
(14, 'teste weste', 'teste', 'Brust, Arme, Schulter, Bauch, Rücken, Gesäß', 1, 'asdfasdf\r\nasfsdf\r\nasfsdf', '33', 'crossfit', 'sdfasdfdsadfdsf'),
(16, 'handstand heaven', 'bodyweight', 'schulter, arme, bauchmuskel, rÃ¼cken', 5, '5 sets of 30 seconds handstand hold, 30 seconds rest', '4:30', 'intermediate', ''),
(17, 'love burpees', 'bodyweight', 'all, mostly conditioning', 5, '20 burpees as fast as you can ', '2:00', 'easy', ''),
(18, 'step up, table/ring row', 'box/steady chair, table/rings', '', 5, '3 set of\r\n5/5 slow and controlled step downs\r\n8 table/ring rows', '5', 'intermediate', ''),
(19, 'angels', 'bodyweight', 'shoulders', 5, '10 reps of TWL (each)\r\n10 angels and devils', '5', 'hard', ''),
(22, 'Heavens Peak I', 'Bodyweight', 'Bauchmuskel', 12, ' 5 Ãœbungen: 1. Front Jumping Jacks, 2. Knee Plank, 3. Floor Hyperextensions, 4. Russian Twists, 5. Sit Ups. Absolviere alle 5 Ãœbungen nacheinander je 30 Sekunden mit jeweils 30 Sekunden Pause dazwischen. Danach kannst du dich bis zu 2 Minuten erholen. Trainiere 3-4 Runden. Sollte die Plank auf den Knien zu leicht sein, kannst du sie gegen eine Plank auf den Ellenbogen oder HÃ¤nden austauschen. ', '30', 'intermediate', 'https://youtu.be/j7tVOB1WmA0'),
(23, 'Mount Nirvana I', 'Bodyweight', 'GanzkÃ¶rper', 12, '20min AMRAP: 1. Sumo Air Squats, 2. Knee Push Ups, 3. Sit Ups\r\nAbsolviere alle 3 Ãœbungen nacheinander. Ob du dabei eine Pause brauchst, entscheidest du und dein KÃ¶rper alleine. Merke oder notiere dir auf einer Strichliste, wie viele Runden du geschafft hast. So kannst du immer wieder vergleichen, ob du dich verbessert hast und mehr Runden geschafft hast.', '20', 'easy', 'https://youtu.be/rfHoE3Wj5J0'),
(24, 'Pico das Torres I', 'Bodyweight', 'Bauchmuskel', 12, ' Die 5 Ãœbungen: 1. Sit Ups, 2. Beginner Burpees, 3. Crunches, 4. V Hold, 5. Foot Tap Crunches\r\nAbsolviere alle 5 Ãœbungen nacheinander je 30 Sekunden mit jeweils 30 Sekunden Pause dazwischen. Danach kannst du dich bis zu 2 Minuten erholen. Trainiere 3-4 Runden. Sollten die Beginner Burpees etwas zu leicht fÃ¼r dich sein, kannst du sie gerne durch Basic Burpees ersetzen.\r\n ', '30', 'intermediate', 'https://youtu.be/Dh4SuGreDIY'),
(25, 'Challenger Point I', 'Bodyweight', 'GanzkÃ¶rper', 12, 'Die Ãœbungen: 1. Front Jumping Jacks, 2. Butterfly Reverses, 3. Close Grip Push Ups, 4. Alternating Lunges, 5. Knee Plank\r\nHochintensive Belastungsphasen (30 Sekunden) wechseln sich mit Erholungsphasen (30 Sekunden) ab. Nach jeder Runde kannst du dich bis zu 2 Minuten erholen. Trainiere 3-4 Runden. Sollten dir die Plank oder LiegestÃ¼tze auf den Knien zu leicht sein, kannst du sie gerne gegen eine Elbow Plank und normale LiegestÃ¼tze austauschen.', '30', 'hard', 'https://youtu.be/lTVCTB93ypc'),
(26, 'Tabata 2', 'bodyweight', 'Beine, Gesäß', 1, 'und wieder eine Tabata Runde :-) 20sec Kniebeugen 10sec Pause 20sec Squatjumps (eine tiefe Kniebeuge und dann so hoch wie möglich springen) 10sec Pause 20sec aus dem Kniestand in die tiefe Hocke und zurück 10sec Pause 20sec Ausfallschritte rückwärts 10sec Pause 20sec Hüftheben aus der Rückenlage 10sec Pause 20sec in Schifahrerhockeposition von engem in weiten Stand springen und zurück 10sec Pause 20sec Halten in tiefer Hocke 10sec Pause 20sec up and downs (oder Burpees) ', '4', 'intermediate', 'https://www.youtube.com/watch?v=ov91YQWlSFg');

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
  MODIFY `calendarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wod`
--
ALTER TABLE `wod`
  MODIFY `wodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
