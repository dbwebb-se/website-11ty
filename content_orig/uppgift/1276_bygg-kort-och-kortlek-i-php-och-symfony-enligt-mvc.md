---
author: mos
category:
    - kurs mvc
revision:
    "2021-04-10": "(B, mos) Problemlösning blir optionell."
    "2021-04-03": "(A, mos) Första utgåvan i mvc-v1."
...
Bygg kort och kortlek i PHP och Symfony enligt MVC
===================================

Du skall skapa ett antal klasser i PHP. Dessa klasser skall du sedan använda i ett par webbsidor och visa upp att de fungerar. Tanken är att du bygger grunden till någon form av enklare kortspel med objektorienterade tekniker i ramverket Symfony.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har grundläggande kunskap i hur man skapar en klass i PHP och hur arv och komposition fungerar.

Du kan bygga webbsidor via kontroller och templatefiler i Symfony.

Du vet hur man använder GET, POST och SESSION i en webbapplikation.



Introduktion och förberedelse {#intro}
-----------------------

Läs och förbered dig.

Om du är osäker på hur en kortlek ser ut så kan du kontrollera med [Wikipedia Kortlek](https://sv.wikipedia.org/wiki/Kortlek). Eftersom vi skall spela kort så kan det vara bra att välja en klassisk Fransk-engelsk kortlek.

Försök göra många små commits. När du är klar med en "feature" i din kod så kan det vara lämpligt att också göra en commit. Detta skapar dig en bra historik över ändringarna i din kod. Läs gärna igenom artikeln "[How to Write a Git Commit Message](https://cbea.ms/git-commit/)" för att få tips om hur du kan skriva bra commit-meddelanden.

<!-- Eentuellt flytta stycket ovan till läsanvisningar i kmom02 istället. -->



Krav {#krav}
-----------------------

Kraven är uppdelade i sektioner.



### Skapa klasser och använd dem i webbsidor {#webb}

Börja med att utveckla dina klasser och testa dem i webbsidor enligt följande.

1. Skapa en kontroller i Symfony där du kan skapa webbsidor för denna delen av uppgiften.

1. Gör en förstasida `card` som länkar till samtliga undersidor för denna uppgiften. Detta är din "landningssida" för denna uppgiften. Placera länken till sidan i din navbar så den är lätt att nå.

1. Skapa klasser för att hantera kort (card) och kortlek (deck). Skapa en sida `card/deck` som visar samtliga kort i kortleken sorterade per färg och värde. Ess kan vara antingen 1 eller 14 beroende av vilket kortspel man spelar.

1. Skapa en sida `card/deck/shuffle` som visar samtliga kort i kortleken när den har blandats.

1. Skapa en sida `card/deck/draw` som drar ett kort från kortleken och visar upp det. Visa även antalet kort som är kvar i kortleken.

1. Skapa en sida `card/deck/draw/:number` som drar `:number` kort från kortleken och visar upp dem. Visa även antalet kort som är kvar i kortleken.

1. Kortleken skall sparas i sessionen så om man anropar sidorna `draw` och `draw/:number` så skall hela tiden antalet kort från korleken minskas tills kortleken är slut. När man gör `card/deck/shuffle` så kan kortleken återställas.

1. Skapa en sida `card/deck/deal/:players/:cards` som delar ut ett antal  `:cards` från kortleken till ett antal `:players` och visar upp de korten som respektive spelare har fått. Visa även antalet kort som är kvar i kortleken. Här kan det vara bra att skapa klasser för player och cardHand eller liknande.

1. Skapa en sida `card/deck2` som är en kortlek inklusive 2 jokrar. Visa kortleken på samma sätt som sidan `card/deck`. Här kan det troligen vara lämpligt med någon form av arv när du bygger koden. Försök återanvända `Deck` och bygg förslagsvis `DeckWith2Jokers extends Deck`.

Optionellt krav.

1. Fundera på om du kan använda konstruktionen "interface" för att bygga din kod förberedd för återanvändning. Tänk att din kod jobbar mot ett interface `DeckInterface` istället för en hård implementation av `Deck` alternativt `DeckWith2Jokers`. Se om du kan uppdatera din kod och dina sidor så applikationen blir mer flexibel för implementationen av själva kortleken. Spelaren, korthanden, och utdelningen av korten samt blandningen bör ju inte behöva bry sig om vilka kort som ligger i kortleken.



### Bygg JSON API {#json}

Börja med att utveckla dina klasser och testa dem i webbsidor enligt följande.

1. Skapa en kontroller i Symfony där du kan skapa ett JSON API för denna delen av uppgiften.

1. I din landningssida för `card/` fortsätter du att länka till alla JSON routes som finns i denna delen av uppgiften.

1. Skapa en route `GET card/api/deck` som returnerar en JSON struktur med hela kortleken sorterad per färg och värde.

Följande 3 krav är optionella. Gör dem om du känner att du har tid. Det är bra övning och träning.

1. Skapa en route `POST card/api/deck/shuffle` som blandar kortleken och därefter returnerar en JSON struktur med kortleken.

1. Skapa route `POST card/api/deck/draw` och `card/api/deck/draw/:number` som drar 1 eller `:number` kort från kortleken och visar upp dem i en JSON struktur samt antalet kort som är kvar i kortleken. Kortleken sparas i sessionen så om man anropar dem flera gånger så minskas antalet kort i kortleken.

1. Skapa en sida `card/api/deck/deal/:players/:cards` som delar ut ett antal  `:cards` från kortleken till ett antal `:players` och visar upp de korten som respektive spelare har fått i en JSON struktur. Visa även antalet kort som är kvar i kortleken.



### Problemlösning {#problemlos}

[INFO]

Denna delen av uppgiften kan med fördel göras i nästa kmom. Du kan alltså se den som optionell i detta kmom.

Välj om du vill göra den i detta kmom eller avvakta och gör den i nästa kmom.

Rekommendationen är att avvakta och göra denna delen i kmom03.

[/INFO]

Du skall försöka problemlösa ett spel med flödesschema och pseudokod.

1. Välj ett kortspel som du vill problemlösa (och implementera i nästa kmom). Är du osäker så väljer du [kortspelet 21](https://sv.wikipedia.org/wiki/Tjugoett_(kortspel)) eller [kortspelet Black Jack](https://en.wikipedia.org/wiki/Blackjack) där en spelare kan spela mot datorn som är bank. Du kan även välja olika spelvarianter på dessa kortspel eller ett annat kortspel eller en [patiens](https://sv.wikipedia.org/wiki/Patiens) (se [exempel på olika kort patienser](https://www.123patiens.se/)).

1. Samla all din dokumentation i en webbsida under routen `game/card` och länka till dokumentationssidan från din landningssida `card/`.

1. Inled med en kort beskrivning av ditt kortspel och hur du valt att det skall fungera.

1. Skapa ett flödesschema som representerar hur du tänker lösa grunderna i spelet. Resultatet kan du placera som en bild i webbsidan. Det behöver inte vara en komplett lösning, en dellösning räcker bra.

1. Skapa psuedokod som visar hur du tänker lösa delar av spelet. Du kan spara resultatet som text eller bild men visa upp det i webbsidan. Det behöver inte vara en komplett lösning, en dellösning räcker bra.

1. Fundera igenom vilka klasser du behöver för att implementera spelet. Beskriv klasserna i text med klassens namn och en mening som beskriver vad klassens syfte är. Håll det kort och enkelt.

1. Om du vill kan du komplettera med att rita ett UML klass diagram (optionellt).



<!--
### Kodvalidering {#validera}

1. Fixa till din kod enligt den kodstil du kör genom att köra `composer csfix`.
-->



### Publicera {#publicera}

1. Committa alla filer och lägg till en tagg 2.0.0. Om du gör uppdateringar så ökar du taggen till 2.0.1, 2.0.2, 2.1.0 eller liknande.

1. Kör `dbwebb test kmom02` för att kolla att du inte har några fel.

1. Pusha upp repot till GitHub, inklusive taggarna.

1. Gör en `dbwebb publishpure report` och kontrollera att att det fungerar på studentservern.



<!--
Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

-->



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i chatt och forum om du behöver hjälp!
