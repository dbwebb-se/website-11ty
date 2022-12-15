---
author: mos

views:
    block-about: null

revision:
    "2018-01-11": (A, mos) Kursen ersätts med kursen databas.
...
Kmom05: Procedur, trigger, funktion
==================================

I samband med utvecklingen av version 2 av dbjs bestämdes att istället sammanfoga kursen med "[kursen databas](kurser/databas-v1)".

<!--stop-->

[WARNING]
**Kursutveckling pågår inför vt18.**
[/WARNING]

Kursmomenten handlar dels om att programmera en databas med transaktioner, lagrade procedurer, triggers och inbyggda funktioner.

I kursmomentet introduceras också en webbserver för Node.js i form av Express. Du kommer igång med Express och ser hur du kan bygga upp en webb/RESTFul server och hur du kan skriva din applikationskod för att till exempel komma åt en databas och visa och uppdatera dess innehåll.

<!--more-->

[FIGURE src=image/snapvt17/sqlite-transaction.png?w=w2 caption="Transaktioner för att utföra många saker i en sekvens utan avbrott och störmoment."]

[FIGURE src=image/snapvt17/express-loaded-resources.png?w=w2 caption="Node.js med webb- och applikationsservern Express."]

[FIGURE src=image/snapvt17/express-mysql-view-all.png?w=w2 caption="Via Express använder vi oss av MySQL och HTML formulär för att visa och uppdatera databasens innehåll."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 12. Integritetsvillkor
    * Kap 14: Lagrade procedurer
    * Kap 15: Aktiva databaser och triggers
    * Kap 23: Transaktioner

Vissa av kapitlen finns i [bokens webbkurs](http://www.databasteknik.se/webbkursen/), del 2.



###Artiklar {#artiklar}

Läs följande:

1. Läs översiktligt om vad [Express](http://expressjs.com/) klarar av som webb- och applikationsserver. Kolla runt i dokumentationen och bekanta dig med begrepp och exempelkod.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*



###Övningar {#ovningar}

Utför följande övningar för att träna inför uppgifter och projektet.



###Programmera i MySQL {#progmysql}

1. Jobba igenom "[Transaktioner i databas](kunskap/transaktioner-i-databas)" för att lära dig grunderna i hur du använder transaktioner i databaser. Spara dina exempelprogram i `me/kmom05/prog-sql`.

1. Jobba igenom "[Lagrade procedurer i databas](kunskap/lagrade-procedurer-i-databas)" för att lära dig om lagrade procedurer och vad du kan göra med dem. Spara dina exempelprogram i `me/kmom05/prog-sql`.

1. Jobba igenom "[Triggers i databas](kunskap/triggers-i-databas)" för att lära dig om vad du kan göra med triggers och hur de fungerar. Spara dina exempelprogram i `me/kmom05/prog-sql`.

1. Jobba igenom "[Egendefinierade funktioner i databas](kunskap/egen-definierade-funktioner-i-databas)" för att lära dig hur konceptet kan användas i en databas. Spara dina exempelprogram i `me/kmom05/prog-sql`.



####Node.js, Express och MySQL {#express}

1. Jobba igenom artikeln "[Node.js webbserver med Express](kunskap/nodejs-webbserver-med-express)" för att komma igång med webb- och applikationsservern Express i Node.js. Spara dina exempelprogram i `me/kmom05/express`.

1. Jobba igenom artikeln "[Databas appserver med Express och MySQL](kunskap/databas-appserver-med-express-och-mysql)" som visar hur du kan jobba med MySQL tillsammans med Express. Spara dina exempelprogram i `me/kmom05/express-mysql`.



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Utför uppgiften "[Skapa en appserver mot MySQL](uppgift/skapa-en-appserver-mot-mysql)". I uppgiften får du jobba med både Express, MySQL och programmera i databasen. Spara koden i `me/kmom05/express-sql`.



###Extra {#extra}

Det finns inga extra uppgifter.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/dbjs/redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Gick det bra att komma igång med det vi kallar programmering av databas, med transaktioner, lagrade procedurer, triggers, funktioner?
* Hur är din syn på att programmera på detta viset i databasen?
* Gick det bra att komma igång med Express?
* Gick det bra att använda MySQL tillsammans med Express?
* Nu börjar saker knytas samman, HTML, CSS, JavaScript i klient och JavaScript på servern i både CLI och RESTFul server samt databas. Känns det som du har koll på teknikerna och hur de samverkar?
