---
author: mos
category: sql
updated: "2013-08-16 07:23:05"
created: "2013-08-16 07:23:03"
...
Reverse engineering av databasen MySQL med WorkBench
==================================

Reverse engineering av en databas kan vara en bra möjlighet att ge en grafisk översikt av en databas. När du jobbar med databasen MySQL så kan verktyget WorkBench hjälpa dig med att baklänges skapa en grafisk databasmodell över din databas, ett ER-diagram.

<!--more-->

Det ligger i sakens natur att designdokument och dokumentation av databaser snabbt blir utgångna och  inte alltid uppdateras. Då är det bra att kunna gå direkt till källan, databasen, och få en vy över hur den ser ut. 

För att visa ett exempel så använder jag [WorkBench](http://www.mysql.com/products/workbench/) för att göra reverse engineering på en [SQL-uppgift som används i kurserna](uppgift/kom-igang-med-sql).

Via menyvalet **"Database -> Reverse Engineer"** så kan du stegvis koppla upp dig mot en befintlig databas och välja vilka objekt som skall synas i den grafiska modellen. Resultatet kan se ut så här.

[FIGURE src=/image/snapshot/sql-ovning-reverse-engineering.jpg?w=w1&q=70 caption=""Reverse engineering" av databasen Skolan, komplett med tabeller och vyer."]

Det är bra att ha en ritning till hands, ett ER-diagram över databasen. Speciellt om man är flera som jobbar mot databasen. Att göra "reverse engeneering" kan dessutom ge en liten test på att man inte glömt några onödiga objekt i databasen.

Läs gärna mer om grunderna i databasmodellering i "[Kokbok om databasmodellering](kunskap/kokbok-for-databasmodellering)".
