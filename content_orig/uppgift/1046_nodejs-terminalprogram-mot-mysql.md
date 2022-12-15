---
author: mos
category:
    - javascript
    - nodejs
    - mysql
revision:
    "2017-02-27": (A, mos) Första utgåvan.
...
Node.js terminalprogram mot MySQL
==================================

Du skall bygga ett terminalprogram i Node.js som använder sig av MySQL för att utföra databasrelaterade händelser.


<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Gör en kommandoradsklient i Node.js](kunskap/gor-en-kommandoradsklient-i-node-js)" samt artikeln "[MySQL och Node.js](kunskap/mysql-och-nodejs)".

Du har även kunskaper i SQL och MySQL motsvarande artikeln ["Kom igång med SQL"](uppgift/kom-igang-med-sql).



Introduktion {#intro}
-----------------------

Det stora internationella företaget "Allans Mopeder" har hört talas om dig och vill ha ett Node.js baserat terminalprogram som frontend till sin säljdatabas.

Du har fått en kopia av hela deras säljdatabas och du skall nu bygga ett terminalprogram mot säljdatabasen som är byggd i MySQL.

Du hittar grunden till databasen i `example/nodejs/allans-mopeder/allan.sql`. Du kan använda den SQL-koden för att återskapa databasen som består av följande tabeller.

Så här kan du läsa in SQL-kommandon till terminalen MySQL.

```bash
$ mysql -uuser -ppass mydb < allan.sql
```

De SQL-relaterade uppgifterna är en övning i INNER och OUTER JOIN.

När du får problem med att prompten skrivs ut på "fel" ställe i förhållande till texten från databasfrågan så finner du svaret i form av Promise i artikeln "[Node.js, MySQL och Promise](kunskap/nodejs-mysql-och-promise)".



Krav {#krav}
-----------------------


1. Kopiera in filen `allan.sql` till katalogen du arbetar i. Använd filen för att skapa de tabeller som behövs med det innehåll som förväntas.

1. Skapa ett terminalkommando som heter allan och startas via `./allan`. Programmet skall fungera med option `--version` och `--help`.

1. När du startar `./allan` så skall du kunna skicka med options som säger till vilken databas programmet skall koppla upp sig och med vilken användare och lösenord. Det kan se ut ut så här `./allan --host localhost --user mos --password XXX --database mos`.

1. I ditt program, skapa ett menyval "products" som visar vilka produkter Allan säljer. Sortera dem i bokstavsordning.

1. Skapa ett menyval "inventory1" som visar namnet på produkten och hur många som finns i det lokala lagret (inventory). Sortera på den produkt som finns flest av. Om produkten inte finns i lager så skall den inte visas.

1. Skapa ett menyval "inventory2" som gör som "inventory1" men visar alla produkter, även om de inte finns i det lokala lagret.

1. Skapa ett menyval "supplier1" som visar namnet på produkten och hur många som finns i det centrala lagret (supplier). Sortera på den produkt som finns flest av. Om produkten inte finns i lager så skall den inte visas.

1. Skapa ett menyval "supplier2" som gör som "supplier1" men visar alla produkter, även om de inte finns i det centrala lagret.

1. Skapa ett menyval "all" som visar de produkter som antingen finns i det lokala lagret, eller hos leverantörens centrala lagret. Visa hur många som finns i respektive lager. Visa produkten även om den inte finns i något av lagren. Sortera per bokstavsordning.

1. Skapa ett menyval "only" som fungerar som "all" men visar de produkter som finns både i det lokala lagret och i leverantörens centrala lagret.

1. Skapa ett menyval "menu" som visar information om samtliga menyval.

1. Använd Promise så att din prompt skrivs ut på rätt ställe.

1. Validera din kod.

```bash
# Flytta till kurskatalogen
dbwebb validate terminal
#dbwebb publish terminal
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns ingen extra uppgift.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
