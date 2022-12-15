---
author: mos
category:
    - kurs webtec
revision:
    "2021-09-22": "(B, mos) Första delen är nu Uppgift och andra delen är en optionell Utmaning."
    "2021-09-17": "(A, mos) Första utgåvan."
...
Bygg en webbplats med PHP
===================================

Du kommer få en befintlig struktur till en webbplats som är byggd med PHP, sidkontroller och vyer enligt en bestämd katalogstruktur, inklusive ett antal testverktyg och någon extern modul som du installerar med composer.

Utmaningen är att förstå strukturen, inse hur den är uppbyggd och förändra samt bygga vidare på webbplatsens innehåll. Fokus är på hur PHP-koden används för att skapa en struktur där webbplatser kan byggas på ett mer effektivt sätt, där delar återanvänds på ett effektivt sätt.

Du kommer jobba med koncept såsom HTML formulär, GET, POST, SESSION och COOKIE.

<!--more-->

[FIGURE src=img/webtec/session/sample.png caption="Så är ser webbplatsen ut du skall jobba med, men det är den bakomliggande strukturen som är det intressanta."]



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "Skapa en responsiv webbplats med HTML och CSS".

Du har grundläggande kunskap om PHP, arrayer och funktioner.

Du har installerat PHP och composer i din path.

Du är medveten om begreppen sidkontroller och vyer och hur det används för att bygga en webbplats.

Du har grundläggande kunskap om begreppen HTML formulär, GET, POST, SESSION och COOKIE.



Genomgång {#genom}
------------------------

Det finns en genomgång "[Bygg en webbplats med PHP](kurser/webtec-v1/forelasning/bygg-en-webbplats-med-php)" som hjälper dig att förbereda dig inför uppgiften.

<!--
Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

Uppgiften består av två delar, första delen "Uppgift" är obligatorisk och andra delen "Utmaning" är optionell.

1. Uppgift. Lär dig strukturen och koncepten, träna på att modifiera och bygga ut en existerade webbplats.

1. Utmaning. Bygg en egen applikation som använder sig av sidkontroller, formulär och sessioner.

Du sparar alla dina filer i katalogen `me/session`.

Gör ofta `dbwebb publish` för att validera och testa om din webbplats fungerar på studentservern.

Använd `dbwebb publishpure` för att publicera snabbare och få korrekta felmeddelande som pekar på rätt rader i din kod.



Uppgift {#ova}
-----------------------

Du skall ta en kopia av en befintlig webbplats och undersöka den samt genomföra ett antal uppgifter som hjälper dig att undersöka och förstå kodbasen.



### Kopiera {#kopiera}

Börja med att kopiera kodbasen du skall jobba med.

```
# Gå till roten av ditt kursrepo
cp -ri example/php/pagecontroller-exercise/* me/session/
cd me/session
```



### Installera med composer {#composer}

Installera externa resurser och utvecklingsverktyg med composer.

```
composer update
```

Katalogen `vendor/` skapades tillsammans med filen `composer.lock`.



### Kör testverktygen {#test}

Kör testverktygen för att se om kodbasen är felfri.

[INFO]
**PS**

Nedan fungerar inte felfritt på Windows/Cygwin, pröva därför istället att enbart köra `composer phpcs` som kör ett av valideringsverktygen för att kolla så du följer kodstandarden. I övrigt kan du låta valideringsverktygen med composer vara tills det är löst.

[/INFO]

```
composer test-hard
```

När du nu utvecklar så räcker det om du kör följande testsuite.

```
composer test
```

Öppna filen `composer.json` för att se vilka testverktyg som körs. Du kommer bland annat att hitta phpcs och phpmd.



### Bekanta dig med webbplatsen {#bekant}

Öppna katalogen du står i(`me/session`) i din texteditor och kika igenom vilka filer som finns där. Börja titta på filen `public/home.php`.

Peka sedan din webbläsare på `public/home.php` för att börja bekanta dig med webbplatsen och hur sidan ser ut när den renderas.

Använd navbaren och testa alla sidorna och försök förstå vad de visar.

Använd texteditorn för att försöka finna hur sidornas struktur och innehåll byggs upp.



### Lös kraven {#los}

I filen `README.md` finns de uppgifter som du skall göra. Jobba igenom dem.

Det finns även frågor som du skall fundera på och besvara. Det räcker om du kan besvara dem för dig själv. Lyckas du inte så frågar du i chatten.

Om någon av uppgifterna är för svåra så är det tillåtet att hoppa över en punkt eller två. Mer borde inte hoppas över.

PS. Om du blir nöjd med din kod så kan du ersätta din `me/report` med denna versionen.



Utmaning {#utmaning}
-----------------------

Du skall utveckla ett spel som heter "Guess My Number" till din webbplats som du jobbat med i övningsuppgiften. Du skall använda de teknikerna du lärt dig i övningsuppgiften.



### Läs om spelet {#las}

Du kan provspela en variant av spelet på "[Guess My Number](https://www.mathsisfun.com/games/guess_number.html)".

Du kan läsa om tankarna bakom spelet i artikeln "[Guess My Number 3-5](https://mathsolutions.com/ms_classroom_lessons/guess-my-number-2/)".



### Hur man spelar {#hur}

Man kommer till en sida där man kan påbörja spelet genom att klicka på en knapp.

När man börjar så slumpar datorn fram ett tal mellan 1 till 100.

Därefter kan du gissa på det nummer som datorn slumpade fram. Efter varje gissning berättar datorn om du har "rätt", "för lågt" eller "för högt".

När du gissat rätt avslutas spelet och du får ett "Grattis" meddelande och du kan inte göra fler gissningar.

Det skall finnas en knapp som heter "Tjuvkika" och när man klickar på den får man se numret som datorn slumpat fram.

Det skall finnas en knapp där man kan nollställa ett pågående spel och börja om igen.



### Varianter på spelet {#hur}

Det kan vara hårdkodat att spelet alltid fungerar mellan 1 till 100, eller så bygger du ett formulär där användaren kan ange mellan vilka tal som datorn skall slumpa fram ett.

Du kan lägga till en checkbox som aktiverar en hårdare inställning "max gissningar" på spelet där man tillåter ett visst maxtal på antalet gissningar. Fundera om detta passar bäst i en cookie eller i sessionen.

Håll koll på hur lång tid det tar att spela klart spelet och spara användares bästa tid i en cookie.



### Krav {#krav}

Utför följande krav.

1. Lägg till en sidkontroller `game.php`. Placera den i din navbar under "Guess".

1. Använd POST och processingsidor med redirect.

1. Speldata sparas i sessionen.

1. Välj om du skriver koden i sidkontrollern eller i vyerna, bestäm det som känns lämpligast.

1. Man skall kunna starta spelet.

1. Man skall kunna starta om ett pågående spel.

1. Reglerna enligt "Hur man spelar" skall vara uppfyllda.

Optionella krav.

1. Hitta på egna varianter på spelet och utöka och modifiera efter din egen förmåga, ambitionsnivå och tid som finns att tillgå.



Frågor att besvara {#fragar}
-----------------------

Besvara följande frågor i din redovisningstext.

* Börja med att berätta hur du uppfattade uppgiften och dess upplägg, var något extra svårt, lurigt, krångligt eller flöt det på smidigt?
    * Hur uppfattar du den strukturen som finns för att skapa webbsidorna?
* Fortsätt att berätta om du tog dig an utmaningen. Var något extra svårt, lurigt, krångligt eller flöt det på smidigt?
    * Berätta om ditt spel, hur löste du det rent implementationsmässigt i koden?
* Är det något som du är extra nöjd med i ditt resultat?



Publicera {#publicera}
-----------------------

Avsluta uppgiften så här.

1. Dubbelkolla om din kod går igenom testerna med `composer test` och `composer test-hard`. Välj själv om du vill rätta felen eller ej.

1. Testa ditt resultat så att det passera de automatiska testerna med `dbwebb test session`. Det kollar mest så att dina filer är på plats.

1. När du är klar kan du validera och publicera resultatet med `dbwebb publish session`. Lös eventuella valideringsfel.
