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
--> Alle results außer jene, die user bereits gemacht hat: SUBSELECT --> Ein record
select * from wod
where wod.difficulty = 2
and wod.equipment like '%bodyweight'
and wod.durationInMinutes <= 10
and not exists(select *
              from calendar c
              where c.wodId = wod.wodId
              and c.userId = 3)



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