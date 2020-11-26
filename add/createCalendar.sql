INSERT INTO `calendar` (`calendarId`, `userId`, `wodId`, `dayId`) 
VALUES  
(NULL, '3', NULL, '3'),
(NULL, '3', NULL, '4'),
(NULL, '3', NULL, '5'),
(NULL, '3', NULL, '6'),
(NULL, '3', NULL, '7'),
(NULL, '3', NULL, '8'),
(NULL, '3', NULL, '9'),
(NULL, '3', NULL, '10'),
(NULL, '3', NULL, '11'),
(NULL, '3', NULL, '13'),
(NULL, '3', NULL, '13'),
(NULL, '3', NULL, '14'),
(NULL, '3', NULL, '15'),
(NULL, '3', NULL, '16'),
(NULL, '3', NULL, '17'),
(NULL, '3', NULL, '18'),
(NULL, '3', NULL, '19'),
(NULL, '3', NULL, '20'),
(NULL, '3', NULL, '21'),
(NULL, '3', NULL, '22'),
(NULL, '3', NULL, '23'),
(NULL, '3', NULL, '24')
;

INSERT INTO `calendar` (`calendarId`, `userId`, `wodId`, `dayId`) VALUES (NULL, '2', NULL, '4'), (NULL, '2', NULL, '21');

INSERT INTO `day` (`dayId`, `text`) VALUES 
('5', NULL), 
('7', NULL),
('8', NULL), 
('9', NULL),
('10', NULL), 
('11', NULL),
('12', NULL), 
('13', NULL),
('14', NULL), 
('15', NULL),
('16', NULL), 
('17', NULL),
('18', NULL), 
('19', NULL),
('20', NULL), 
('21', NULL),
('22', NULL), 
('23', NULL),
('24', NULL), 

;


select * 
from calendar, day
where calendar.dayId = day.dayId
and calendar.userId = 3
and EXISTS (select * 
              from wod w
              where w.wodId = calendar.wodId)


select * 
from calendar, day
where calendar.userId = 2
and calendar.dayId = day.dayId
    order by calendar.dayId

select * 
from calendar, day, wod
where calendar.userId = 2
and calendar.dayId = day.dayId
and wod.wodId = calendar.wodId


--> statt FUlljoin  left and right:
SELECT * FROM calendar
LEFT JOIN wod ON calendar.wodId = wod.wodId
where calendar.userId = 2
UNION
SELECT * FROM calendar
RIGHT JOIN wod ON calendar.wodId = wod.wodId
where calendar.userId = 2

SELECT * FROM calendar
Full JOIN wod ON calendar.wodId = wod.wodId


SELECT calendar.dayId, wod.wodName, wod.points, wod.difficulty FROM calendar
LEFT JOIN wod ON calendar.wodId = wod.wodId
where calendar.userId = 2
UNION
SELECT calendar.dayId, wod.wodName, wod.points, wod.difficulty FROM calendar
RIGHT JOIN wod ON calendar.wodId = wod.wodId
where calendar.userId = 2

--> YESSS! UNION + INNERJOIN
SELECT * FROM
(SELECT calendar.dayId, wod.wodName, wod.points, wod.difficulty FROM calendar
LEFT JOIN wod ON calendar.wodId = wod.wodId
where calendar.userId = 2
UNION
SELECT calendar.dayId, wod.wodName, wod.points, wod.difficulty FROM calendar
RIGHT JOIN wod ON calendar.wodId = wod.wodId
where calendar.userId = 2) a 
INNER JOIN day d ON d.dayId = a.dayId




--> ABFRAGE WOD AUS DATABASE

select * from wod 
where wod.difficulty = 2
and wod.equipment like '%bodyweight'
and wod.durationInMinutes <= 10

--> über calendar mit userId
--> Alle results außer jene, die user bereits gemacht hat: SUBSELECT 
select * from wod
where wod.difficulty = 2
and wod.equipment like '%bodyweight'
and wod.durationInMinutes <= 10
and not exists(select *
              from calendar c
              where c.wodId = wod.wodId
              and c.userId = 3)


--> nur ein record: MYSQL kennt kein Fetchfirst only oder  Select FIRST(wod) from wod..
SELECT * FROM wod 
WHERE difficulty = 2 and equipment like '%Bodyweight' and durationInMinutes <= 10
and not exists (select *
               from calendar c
				where c.wodId = wod.wodId
               	and c.userId = 3)
                ORDER BY wod.wodId ASC LIMIT 1

                
--> noch erweitert um users, für credits wod
SELECT * FROM wod
inner join users on users.userId= wod.userId
WHERE difficulty = 2 and equipment like '%Bodyweight' and durationInMinutes <= 10
and not exists (select *
               from calendar c
				where c.wodId = wod.wodId
               	and c.userId = 3)
                ORDER BY wod.wodId ASC LIMIT 1

-->update icons

UPDATE `day` SET `icon` = './img/icon/1.png' WHERE `day`.`dayId` = 1;
UPDATE `day` SET `icon` = './img/icon/2.png' WHERE `day`.`dayId` = 2;
UPDATE `day` SET `icon` = './img/icon/3.png' WHERE `day`.`dayId` = 3;
UPDATE `day` SET `icon` = './img/icon/4.png' WHERE `day`.`dayId` = 4;
UPDATE `day` SET `icon` = './img/icon/5.png' WHERE `day`.`dayId` = 5;
UPDATE `day` SET `icon` = './img/icon/6.png' WHERE `day`.`dayId` = 6;
UPDATE `day` SET `icon` = './img/icon/7.png' WHERE `day`.`dayId` = 7;
UPDATE `day` SET `icon` = './img/icon/8.png' WHERE `day`.`dayId` = 8;
UPDATE `day` SET `icon` = './img/icon/9.png' WHERE `day`.`dayId` = 9;
UPDATE `day` SET `icon` = './img/icon/10.png' WHERE `day`.`dayId` = 10;

UPDATE `day` SET `icon` = './img/icon/11.png' WHERE `day`.`dayId` = 11;
UPDATE `day` SET `icon` = './img/icon/12.png' WHERE `day`.`dayId` = 12;
UPDATE `day` SET `icon` = './img/icon/13.png' WHERE `day`.`dayId` = 13;
UPDATE `day` SET `icon` = './img/icon/14.png' WHERE `day`.`dayId` = 14;
UPDATE `day` SET `icon` = './img/icon/15.png' WHERE `day`.`dayId` = 15;
UPDATE `day` SET `icon` = './img/icon/16.png' WHERE `day`.`dayId` = 16;
UPDATE `day` SET `icon` = './img/icon/17.png' WHERE `day`.`dayId` = 17;
UPDATE `day` SET `icon` = './img/icon/18.png' WHERE `day`.`dayId` = 18;
UPDATE `day` SET `icon` = './img/icon/19.png' WHERE `day`.`dayId` = 19;
UPDATE `day` SET `icon` = './img/icon/20.png' WHERE `day`.`dayId` = 20;
UPDATE `day` SET `icon` = './img/icon/21.png' WHERE `day`.`dayId` = 21;
UPDATE `day` SET `icon` = './img/icon/22.png' WHERE `day`.`dayId` = 22;
UPDATE `day` SET `icon` = './img/icon/23.png' WHERE `day`.`dayId` = 23;
UPDATE `day` SET `icon` = './img/icon/24.png' WHERE `day`.`dayId` = 24;



UPDATE `day` SET `text` = 'Willkommen im Advent! Wir freuen uns, dass du dabei bist :-)\r\n\r\nDas ist die Geschichte von Elf Hanno, der sehr gerne soooo stark wäre wie auf dem Bild, das er täglich vor Augen hat. Er möchte nämlich gerne Santa helfen, die Geschenke auszutragen. Wenn er es bis dahin schaffen sollte, dieses schwere Paket hochzuheben, darf er zum ersten Mal dabei sein. \r\n', `elfPic` = './img/strong_elf.png' WHERE `day`.`dayId` = 1;


SELECT * FROM wod WHERE difficulty = 1 and equipment like '%Bodyweight' and durationInMinutes <= 10

$sql = "UPDATE wod SET wodName = '$wodName', trainedParts = '$trainedParts', equipment = '$equipment', description = '$description', durationInMinutes = '$durationInMinutes', difficulty = '$difficulty', points = '$points', link = '$link' WHERE wodId = $wodId";


INSERT INTO `day` (`dayId`, `text`, `icon`, `elfPic`) VALUES
(1, 'Willkommen im Advent! Wir freuen uns, dass du dabei bist :-)\r\n\r\nDas ist die Geschichte von Elf Hanno, der sehr gerne soooo stark wäre wie auf dem Bild, das er täglich vor Augen hat. Er möchte nämlich gerne Santa helfen, die Geschenke auszutragen. Wenn er es bis dahin schaffen sollte, dieses schwere Paket hochzuheben, darf er zum ersten Mal dabei sein. \r\n', './img/icon/1.png', './img/strong_elf.png'),
(2, 'Schön, du bist auch heute noch dabei! Das freut Hanno sehr. Dadurch fällt es ihm sehr viel leichter, fleißig für sein großes Vorhaben zu trainieren Viel Spaß und einen schönen Tag dir!', './img/icon/2.png', './img/handstand.png'),
(3, 'Hallo Mensch!\r\n\r\nna- kannst du die neugewonnene Kraft bereits fühlen? Hanno tut es - genauer gesagt spürt er vor allem seinen Muskelkater. Da er aber weiß, dass dies nur ein Zeichen dafür ist, dass seine Muskeln wachsen, ist er auch heute wildentschlossen, sein Training durchzuhalten..\r\nund - sind nicht alle guten Dinge drei?\r\nHab einen schönen Tag!\r\n', './img/icon/3.png', './img/hollow-hold.png'),
(4, 'Hallo Barbara - und all jene, die nicht heute Namenstag feiern! Hast du schon Barbarazweige eingefrischt!\r\nals Alternative (oder als Draufgabe): Lass es krachen: genieß dein viertes Workout - du hast es dir verdient!', './img/icon/4.png', './img/pistolsquat.png'),
(5, 'Hallo Krampus!\r\n<br> und natürlich du, lieber Mensch, der heute hoffentlich keine Angst hat! Bist du bereit, auch am Tag des furchterregenden Begleiters des Nikolaus dein Training zu absolvieren? Hanno ist es - auch wenn er sich vorsichtshalber Rudi als Trainingspartner gesichert hat.. Obwohl er hier im hohen Norden nicht unmittelbar im Einzugsgebiet der Konkurrenz ist, gibt es ihm ein gutes Gefühl, das Rentier an seiner Seite zu haben.', './img/icon/5.png', './img/Rudolf.png'),
(6, 'Freue dich, Mensch,\r\nheute ist Nikolaustag! Bist du auch so aufgeregt wie die vielen Kinder, die er besuchen wird? Aber auch für dich gibt es ein Geschenk - egal ob du auch wirklich braaaav gewesen bist, oder nicht! Viel Spaß mit Workout Nummer 6!', './img/icon/6.png', './img./backsquat.png'),
(7, NULL, './img/icon/7.png', './img/boxjump.png'),
(8, NULL, './img/icon/8.png', './img/DU.png'),
(9, NULL, './img/icon/9.png', './img/handstand.png'),
(10, NULL, './img/icon/10.png', './img/plank.png'),
(11, NULL, './img/icon/11.png', './img/snatch.png'),
(12, NULL, './img/icon/12.png', NULL),
(13, NULL, './img/icon/13.png', NULL),
(14, NULL, './img/icon/14.png', NULL),
(15, NULL, './img/icon/15.png', NULL),
(16, NULL, './img/icon/16.png', NULL),
(17, NULL, './img/icon/17.png', NULL),
(18, NULL, './img/icon/18.png', NULL),
(19, NULL, './img/icon/19.png', NULL),
(20, NULL, './img/icon/20.png', NULL),
(21, 'Grüss dich du sportliches Prachtexemplar! Bald hast du es geschafft! nur mehr 3 Tage bis Weihnachten!! \r\n\r\ngenieß dein AdventWod!', './img/icon/21.png', NULL),
(22, 'Grüss dich!\r\nclick and enjoy!', './img/icon/22.png', NULL),
(23, NULL, './img/icon/23.png', NULL),
(24, NULL, './img/icon/24.png', NULL);