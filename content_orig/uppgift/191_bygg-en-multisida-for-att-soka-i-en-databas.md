---
author: mos
category:
    - webbprogrammering
    - databas
    - sqlite
    - php pdo
revision:
    "2018-10-10": "(C, mos) Strukturerade om kraven, lade till undersida som visar en båt och tog bort undersida för sökning."
    "2018-09-24": "(B, mos) Genomgången i samband med htmlphp v3."
    "2015-06-15": "(A, mos) Första utgåvan i samband med kursen htmlphp v2."
...
Bygg en multisida för att söka i en databas
==================================

Skriv en multisida i PHP för att visa hur kopplingar till databasen SQLite fungerar.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du vet vad en multisida är och du har jobbat igenom "[Bygg en multisida med PHP (v2)](kunskap/bygg-en-multisida-med-php-v2)".

Du har jobbat igenom övningen "[Kom igång med databasen SQLite med DB Browser för SQLite](kunskap/kom-igang-med-databasen-sqlite-med-db-browser-for-sqlite)". 

Du har gått igenom de första stegen i artikeln "[Kom igång med SQLite och PHP PDO](kunskap/kom-igang-med-sqlite-och-php-pdo)", minst till och med stycket "[Gör ett sökformulär med SELECT](kunskap/kom-igang-med-sqlite-och-php-pdo#select-form)".



Introduktion {#intro}
-----------------------

Du skall skapa en multisida som kopplar upp sig mot databasen SQLite samt utför SELECT-frågor mot databasen och visar resultatet.

I kursrepot finns exempelprogram som du kan utgå ifrån. Dels finns det i [`example/sqlite`](https://github.com/mosbth/htmlphp/tree/master/example/sqlite) och dels i [`pdo-sqlite`](https://github.com/mosbth/htmlphp/tree/master/example/pdo-sqlite).

Spara din multisida i ditt kursrepo under katalogen `me/kmom05/jetty`.

Dina databas-filer lägger du i katalogen `me/kmom05/jetty/db`. 

Börja med att kopiera databasfilen `boatclub.sqlite`, så har du en databas som du kan använda i uppgiften.



Krav {#krav}
-----------------------

1. Skapa grunden för en multisida, fristående från din me-sida, döp själva multisidan till `jetty.php`.

1. Lägg koden som kopplar sig till databasen i en funktion `connectToDatabase($dsn)`. Databasens `$dsn` skall skickas som en parameter till funktionen. Funktionen skall returnera databasobjektet `$db`. Funktionen skall ligga i en fil, `src/functions.php`, skapa den filen.

1. Skapa en undersida som kopplar sig till databasen. Om det gick bra så visas ett meddelande som säger "Ok, du är nu uppkopplad till databasen!".

1. Skapa en undersida (A) som skriver ut innehållet i tabellen `jetty` i en HTML tabell.

1. Skapa en funktion `printJettyResultsetToHTMLTable()` i `src/functions.php`. Funktionen skall ta *resultsetet*, `$res`, som en inparameter och skriva ut innehållet i `$res` till en HTML-tabell. Resultatet blir en funktion, som du kan använda för att lösa föregående krav. Strukturera om så att funktionen används.

1. Skapa en undersida (B) som skriver ut detaljer om en båt. Man väljer vilken båt som skall skrivas ut genom att skicka med parametern `?position=2` vilket gör att båten som ligger på positionen 2 skrivs ut.

1. Uppdatera den undersidan (A) som skriver ut alla båtar så att man kan klicka på respektive båt och länken leder till undersidan (B) som skriver detaljer om enbart den båten.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kursrepot
#dbwebb validate jetty
dbwebb publish jetty
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 

<!--

Extrauppgift om söksida som leder till undersida. Extra trixigt med querysträngen.

-->



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
