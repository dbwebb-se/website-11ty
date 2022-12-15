---
author:
    - mos
    - efo
category:
    - javascript
    - websocket
    - kurs ramverk2
revision:
    "2019-01-30": (B, efo) Anpassad för ramverk2 v2.
    "2017-11-13": (A, mos) Första utgåvan.
...
Bygg en chatt med WebSocket
==================================

Du skall bygga en chatt med WebSocket och lägga till i din me-applikation. När du bygger chatten så bygger du ditt eget applikationsspecifika protokoll.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kom igång med realtidsprogrammering i JavaScript](kunskap/kom-igang-med-realtidsprogrammering-i-javascript)".



Introduktion {#intro}
-----------------------

Du bygger vidare på de kunskaper du fick i artikeln, främst i sammanhanget av broadcast servern.

Tänk på att bygga en kodstruktur som kan vara återanvändbar när du eventuellt bygger andra implementationer ovanpå websockets. Skall du lägga din egen server i en modul, en klass, eller hur bygger du grunden i kodstrukturen?

Organisera koden i egna moduler så den blir enkel att återanvända i andra sammanhang.

Du kan välja godtyckligt teknikval för uppgiften, välj teknik som användes i artikeln eller välj annan modul som bygger på websockets, till exempel socket.io.

Om du tänker återanvända chatten i din applikation så vill du kanske redan nu organisera koden i ett eget repo?

När du driftsätter din chatt server ska den ligga som en del av ditt me-api eller kan den ligga som en egen service vi kan koppla upp oss mot från många olia klienter. Blir detta din första micro-service?



Krav {#krav}
-----------------------

1. Skapa en klient och en server för chatt. Välj en teknik som grundar sig på websockets. Visa att klienten fungerar genom att integrera den i din me-applikation.

1. Bygg ett eget applikationsprotokoll ovanpå websockets. Förslagsvis använder du JSON (eller annat du väljer).

1. Använd subprotokoll i din lösning, på så vis är du förberedd om du behöver göra en ny version av ditt applikationsprotokoll.

1. När man kopplar upp sig så identifierar man sig med ett nick, ett smeknamn.

1. Flera klienter kan koppla sig till chatten. När någon skriver något ser alla andra det. Man ser nicket tillsammans med meddelandet.

1. Committa, tagga och pusha relevanta repon samt driftsätta på din server.



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgift om du har tid och lust.

1. Lös så att din server upptäcker när klienter försvinner utan att höra av sig. Du behöver någon form av teknik för att upptäcka och städa upp när klienten försvinner utan att koppla ned sig på ett korrekt sätt.

1. Dubbelkolla om din chatt är öppen för XSS eller ej.

1. Gör så man kan skicka ett meddelande till en specifik användare.

1. Gör så man kan lista alla användare som är inloggade på servern.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
