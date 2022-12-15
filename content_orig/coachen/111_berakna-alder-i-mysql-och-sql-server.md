---
author: mos
category: sql
updated: "2013-08-15 12:06:37"
created: "2013-08-15 12:06:24"
...
Beräkna ålder i MySQL och SQL Server
==================================

Att beräkna någons ålder är lite klurigt i SQL. Använd följande exempel för MS SQL Server och MySQL, så går det enklare.

<!--more-->

```sql
--
-- Create the table
--
-- DROP TABLE Pet;
CREATE TABLE Pet
(
name CHAR(5),
birth DATETIME
);

INSERT INTO Pet(name, birth) VALUES ('Pilot', '1984-04-27');
INSERT INTO Pet(name, birth) VALUES ('Kaiba', '2001-03-09');
INSERT INTO Pet(name, birth) VALUES ('Ludde', '2004-10-15');

SELECT * FROM Pet;


-- 
-- SQL to calculate age in Microsoft SQL Server
-- http://stackoverflow.com/questions/57599/how-to-calculate-age-in-t-sql-with-years-months-and-days
--
SELECT 
  name, 
  birth, 
  GETDATE(),
  (DATEDIFF(YY, birth, GETDATE()) - CASE WHEN (MONTH(birth) > MONTH(GETDATE())) OR ( MONTH(birth) = MONTH( GETDATE() ) AND DAY(birth) > DAY(GETDATE())) THEN 1 ELSE 0 END) AS age
FROM Pet;

--
-- SQL to calculate age in MySQL
-- also available in the manual
-- http://dev.mysql.com/doc/refman/5.6/en/date-calculations.html
--
SELECT
  name, 
  birth, 
  CURDATE(),
  TIMESTAMPDIFF(YEAR, birth, CURDATE()) AS age
FROM Pet;

```

Använd forumet om du funderar över något.
