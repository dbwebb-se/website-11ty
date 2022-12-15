---
author: mos
category: php
updated: "2013-04-04 10:32:25"
created: "2013-04-04 10:11:52"
...
Ha koll på klockslag och tidzoner i PHP, SQLite och MySQL
==================================

Här får du ett <b>testprogram</b> som visar vad <b>klockan</b> är enligt PHP, SQLite, MySQL och enligt olika <b>tidzoner</b>. Ett sådant litet program kan ibland vara en nödvändighet för att få ett grepp om hur tiden hanteras av de olika systemen.

<!--more-->

Här har jag ett test som visar [klockan för min server utifrån PHP, SQLite och MySQL](kod-exempel/time_and_timezone/). Du kan köra exemplet och studera källkoden för att se hur de olika tiderna räknas ut.

För att få full koll på sin klockan så bör man ställa in servern så att den går mot en [NNTP-server](http://www.pool.ntp.org/en/). Sedan gäller det att testa de olika teknikerna så att man får koll på om det är lokal tid eller UTC som visas. 

Det kan också vara bra att ha en <b>taktik för hur man hanterar klockslag</b> i sin applikation. Användaren vill alltid se klockslaget enligt sin egen tidzon, i webbsammanhang brukar vi ställa in det via webbapplikationens inställningar per användare. Så gör vi till exempel i forumet här på dbwebb. 

Men, som utvecklare behöver du också ha en taktik för vilken typ av klockslag som du sparar i databasen. Där har jag själv valt att vanligtvis spara <b>klockslag enligt UTC</b>. Då vet jag vad jag har och kan konvertera vid behov.

Men, som sagt, för att ha riktig koll så kan ett [testprogram om klockslag och tidzoner](kod-exempel/time_and_timezone/) hjälpa dig på vägen.