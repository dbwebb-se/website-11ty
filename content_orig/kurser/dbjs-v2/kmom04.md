---
author: mos

views:
    block-about: null

revision:
    "2018-01-11": (A, mos) Kursen ersätts med kursen databas.
...
Kmom04: MySQL
==================================

I samband med utvecklingen av version 2 av dbjs bestämdes att istället sammanfoga kursen med "[kursen databas](kurser/databas-v1)".

<!--stop-->

[WARNING]
**Kursutveckling pågår inför vt18.**
[/WARNING]

Då går vi vidare till databasen MySQL och dess olika klienter samt prövar att använda SQL tillsammans med MySQL. Du får jobba igenom en övning i SQL som tar dig från de enklare konstruktionerna till mer utmanande saker som subqueries och `RIGHT/LEFT OUTER JOIN`. När övningen är slut så har du både kommit in i MySQL och bekantat dig med ytterligare varianter av SQL.

Du får pröva att använda tre olika klienter till MySQL, alla tre har sin plats och som webbprogrammerare behöver du kunna använda alla klienterna, vid olika tillfällen.

[FIGURE src=/image/snapshot/mamp-mysql-clu-test.jpg?w=w1&q=60 caption="SQL i en textbaserad klient."]

[FIGURE src=/image/snapshot/wamp-phpmyadmin.png?w=w1&sa=jpg&q=60 caption="SQL i en webbaserad klient."]

[FIGURE src=/image/snapshot/sql-ovning-alter-table.jpg?w=w1&q=60 caption="SQL som det ser ut i desktop-klienten MySQL WorkBench."]

Du kommer även jobba vidare med JavaScript, Node.js och se hur du kan koppla dig till en MySQL databas.



<!--more-->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Databasteknik](kunskap/boken-databasteknik) om MySQL.
    * Kap 28: Introduktion till MySQL

    Viss information finns i [bokens webbkurs](http://www.databasteknik.se/webbkursen/), del 3.

1. [Databasteknik](kunskap/boken-databasteknik) om mer SQL.
    * Kap 8: Mer om SQL: Aggregatfunktioner, null-värden, yttre join

    Vissa av kapitlen finns i [bokens webbkurs](http://www.databasteknik.se/webbkursen/), del 2.



###Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Kika igenom manualen för MySQL, bara kort och översiktligt, men se till att du kan hitta till den delen som visar hur SQL skall skrivas i MySQL.
    * [Ch14 SQL Statement Syntax](https://dev.mysql.com/doc/refman/5.7/en/sql-syntax.html)



###Lästips {#lastips}

Kika på följande lästips om du finner dem intressanta.

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 24: Hur transaktioner hanteras inuti databashanteraren

1. [Exploring ES6](kunskap/boken-exploring-es6) om Promise.
    * Ch 24: Asynchronous programming (background)
    * Ch 25: Promises for asynchronous programming



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Genomför följande övningar.



####MySQL {ovn-mysql}

1. Jobba igenom guiden "[Kom igång med databasen MySQL och dess klienter](kunskap/kom-igang-med-databasen-mysql-och-dess-klienter)". Som webbutvecklare behöver du ha koll på olika varianter av klienter, testa allihop och se till att din lokala utvecklingsmiljö fungerar.

1. Bekanta dig med "[BTH's labbmiljö för databasen MySQL](kunskap/bth-s-labbmiljo-for-databasen-mysql)". Se till att du kan använda BTH's databasserver för MySQL. Använd de olika klienterna för att koppla upp dig. Spara dina eventuella testfiler i `me/kmom04/mysql`.



####MySQL och Node.js {ovn-node}

1. Jobba igenom övningen "[Gör en kommandoradsklient i Node.js](kunskap/gor-en-kommandoradsklient-i-node-js)". Spara dina eventuella exempelprogram under `me/kmom04/client`.

1. Jobba igenom övningen "[MySQL och Node.js](kunskap/mysql-och-nodejs)". Spara dina eventuella exempelprogram under `me/kmom04/npm-mysql`.

1. I artikeln "[Node.js, MySQL och Promise](kunskap/nodejs-mysql-och-promise)" kan du få hjälp att lösa ett problem med asykron/sekventiell programmering som du troligen kommer att upptäcka senare i uppgiften `terminal`.



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Jobba igenom uppgiften "[Kom igång med SQL](uppgift/kom-igang-med-sql)" genom att utföra den i MySQL Workbench. Spara all SQL-kod i `me/kmom04/skolan/skolan.sql` och utför minst 2/3 av uppgifterna. Dokumentera vilka uppgifter du hoppar över. Jobba gärna i grupp och hjälp varandra, men se alltid till att skriva dina egna SQL-satser. Se till att du förstår begreppen HAVING, subqueries och OUTER JOIN.

1. Gör laborationen "[Node.js och inbyggda moduler (node2)](uppgift/nodejs-inbyggda-moduler)" för att träna på inbyggda moduler i Node.js. Spara koden i `me/kmom04/node2`.

1. Gör uppgiften "[Node.js terminalprogram mot MySQL](uppgift/nodejs-terminalprogram-mot-mysql)". Spara koden i `me/kmom04/terminal`.




###Extra {#extra}

Lös följande extrauppgifter om du så väljer.

1. Skapa en ER-modell för din databas Skolan via [reverse engineering med MySQL Workbench](coachen/reverse-engineering-av-databasen-mysql-med-workbench).


<!--
Fortsätt träna på JavaScript i webbläsaren.

1. Gör uppgiften "[Memory - rita flaggor med JavaScript vid DOM](uppgift/memory-rita-flaggor-med-javascript-och-dom)".
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/dbjs/redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur känns det att komma igång med MySQL och dess klienter?
* Har du jobbat med liknande tidigare?
* Du har nu repeterat SQL ett par gånger, börjar det sätta sig?
* Hur känns det med Node.js, har du till exempel känt av den asynkrona programmeringsmodellen?
* Förstod du hur Promise fungerar?
