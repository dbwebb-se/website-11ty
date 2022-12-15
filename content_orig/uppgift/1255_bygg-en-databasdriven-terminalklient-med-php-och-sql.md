---
author: mos
category:
    - kurs webtec
revision:
    "2021-06-15": "(A, mos) Första utgåvan."
...
Bygg en databasdriven terminalklient med PHP med SQL
===================================

Du skall träna dig på grunderna i PHP PDO och SQL genom att utföra ett antal mindre programmeringsövningar.

Du skall bygga ett klientprogram i terminalen som kopplar sig till databasen och utför operationer och skriver ut rapporter.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har grundläggande kunskap om att programmera med PHP PDO.

Du har grundläggande kunskap om att jobba med SQL och SQLite.



<!--
Genomgång {#genom}
------------------------

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

Uppgifterna löser du genom att skriva kod i filer som du exekverar via terminalen.

Spara alla filerna under `me/pdoclient`.

Databasen (eller databaserna) placerar du under katalogen `db/`

Du skall ha ett main-program och den koden sparar du i filen `main.php`. Main-programmet skriver ut menyn och läser input från användaren och utför sedan en uppgift.

Lösningen på varje uppgift skall kodas som en funktion med ett bestämt namn. Samtliga funktioner placeras i filen `src/functions.php` som inkluderas i `main.php`.

Använd strikta typer.

Använd en `config.php` som sätter på felutskrifterna.

Använd DockBlock kommenterar för att dokumentera dina funktioner.

Din kod skall validera enligt `composer phpcs` och `composer phpmd`.

Så här kan det se ut när de första menyvalen är implementerade.

[ASCIINEMA src="422647" caption="De första menyvalen är implementerade."]



Kodstruktur {#struktur}
-----------------------

Skapa en fil `src/database.php` där du placerar kod för att koppla dig mot databasen och där du skriver alla databasfrågorna. Dina funktioner kan ta inparametrar och returnera resultat.

Detta är en god struktur och separation av din kod. Du kommer märka att denna strukturen gör det enklare att återanvända kod från denna uppgiften till nästkommande uppgift där du skall bygga en webbklient mot databasen.

I din `config.php` sparar du dina DSN som berättar hur man kopplar sig till databasen. Du kan ha flera DSN och du kan koppla dig till flera databaser.

En DSN är en sträng och den kan definieras som en konstant och se ut så här.

```php
define("DSN_TODO", "sqlite:" . __DIR__ . "/../sqlite/db.sqlite");
```



Uppgift 1: Ett menydrivet program i terminalen {#u1}
-----------------------

Skapa grunden för ditt menydrivna program. Följande menyval skall finnas.

```
1. Skriv ut detaljer om PDO
9. Avsluta
```

Om användaren skriver in `1` så skall programmet via funktionen `checkPdoInstallation()` kontrollera och skriva ut detaljer om PHP installationen har PDO installerat.

Om användaren skriver in `9` så skall programmet avslutas via funktionen `exitProgram()` samt skriva ut ett avslutningsmeddelande.

När programmet startar skall du skriva ut en välkomsttext och en ascii-bild (välj själv motiv på bilden).

Om användaren skriver in ett val som inte finns så anropas en funktion `notValidChoice()` som skriver ut ett meddelande att det var ett felaktigt menyval.

När det valda menyvalet är utfört så visas menyn och ascii-bilden igen.



Uppgift 2: ToDo databasen {#u2}
-----------------------

Lägg till menyvalet "2. ToDo utskrift" som via PHP PDO kopplar sig till din ToDo-databas och gör enligt följande.

* Skriv ut hur många rader tabellen innehåller.
* Skriv ut titel, start, slut och längden för samtliga aktiviteter, sorterade per längden i sjunkande ordning.

Döp funktionen till `toDoPrint()`. Den funktionen skall i sin tur använda sig av ett flöde av databasfunktioner som du själv bygger för att koppla sig mot databasen, ställa frågor och returnera ett resultset som du kan skriva ut.



Uppgift 3: ToDo sök {#u3}
-----------------------

Lägg till menyvalet "3. ToDo sök" som låter dig mata in en söksträng och sedan söker du ut i databasen de rader som matchar delar av söksträngen (LIKE).

Man skall kunna söka bland titel, description och prio i tabellen.



Uppgift 4: ToDo skapa {#u4}
-----------------------

Lägg till menyvalet "4. ToDo skapa" som låter dig skapa en ny ToDo.

Låt användaren skriva in de värden som skall gälla och spara sedan en ny ToDo till databasen.



Uppgift 5: ToDo radera {#u5}
-----------------------

Lägg till menyvalet "5. ToDo radera" som låter dig radera en ToDo.

Låt användaren först se vilka ToDo som finns och sedan välja ett id (rowid) på den som skall raderas. Ta sedan bort den valda ToDo från databasen.



Uppgift 6: ToDo uppdatera {#u6}
-----------------------

Lägg till menyvalet "6. ToDo ändra" som låter dig ändra prioritet på en ToDo.

Låt användaren först se vilka ToDo som finns och sedan välja ett id (rowid) på den som skall ändras. Sedan skriver användaren in en ny prioritet och du sparar denna prioritet i databasen till den ToDo som är vald.



Uppgift 7: Dagens namn {#u7}
-----------------------

Använd "namn-databasen" i `example/database/db.sqlite` för att utföra följande.

Fråga efter ett datum (default är dagens datum) och visa upp vem som har namnsdag den dagen och om det är en helgdag eller ej samt vilken veckodag det är.

Visa även annan information om namnet om du kan hitta det i databasen.



Uppgift 8: Sök namn {#u8}
-----------------------

Sök efter namn i "namn-databasen" och visa information och betydelse av namnet samt hur många som har detta namnet i Sverige och när namnet har namnsdag.

Använd så mycket information du kan från de tabeller som ligger i databasen.



Redovisning {#redovisa}
-----------------------

Besvara följande frågor i din redovisningstext.

* Berätta hur det gick att lösa uppgiften, var något extra svårt, lurigt, krångligt eller flöt det på smidigt?
* Är det något som du är extra nöjd med i ditt resultat från uppgifterna?



Publicera {#publicera}
-----------------------

Avsluta uppgiften så här.

1. Testa att din kod validerar genom att ställa dig i katalogen `me/` och köra dem via `composer test`.

1. Testa ditt resultat så att det passera de automatiska testerna med `dbwebb test pdoclient`.

1. När du är klar kan du publicera resultatet med `dbwebb publish pdoclient`.
