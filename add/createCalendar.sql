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

