---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2017-08-08": "(A, mos) Första utgåvan."
...
Bygg en prototyp till ett kommentarssystem
===================================

Du skall bygga en prototyp, ett utkast, till ett kommentarssystem och du skall bygga det enligt MVC där din kod skrivs i kontroller-klasser och klasser i modell-lager.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[En REM Server som Kontroller och Modell](kunskap/en-rem-server-som-kontroller-och-modell)".



Introduktion {#intro}
-----------------------

Under kursen kommer du att utveckla kod i form av ett kommentarssystem som i slutändan blir en egen fristående modul som du publicerar på Packagist. 

Du kan räkna med att din kommentarsmodul kommer att vara central i projektet i kmom10, vare sig det blir fokus på ett projekt som liknar StackOverflow, Twitter, Facebook, Instagram, Flickr, GitHub issues, ett forum eller Disqus.

Försök skapa kod som är generell för godtyckligt kommentarssystem, iallafall är det ansatsen vi inledningsvis tar.

Du är nu redo att göra en fungerande prototyp som ditt första utkast. Du skall göra grunden så att en användare kan kommentera ditt innehåll. Olika innehåll kan ha olika kommentarsflöden.

Till att börja med så sparar vi kommentarerna i sessionen. Databasen får bli ett senare tillskott men räkna med att vi byter ut sessionen mot en databas inom kort. Om du ändå vill införa en databas så går det bra.

Kom ihåg att det är en prototyp, du vill bara få vissa kodgrunder på plats i en MVC-struktur.

Fundera på hur mycket tid du har och se till att få en fungerade prototyp inom den tiden du har och prioritera bort det som inte är nödvändigt. Det finns inget krav på hur mycket du hinner med i detta kursmomentet, men se till att du kan kalla ditt jobb för en "första prototyp". KISS.



Krav {#krav}
-----------------------

1. Skriv koden i kontrollerklasser och i modell-lagret. Skriv ingen/minimal kod i routerna.

1. Eftersom du har fria händer så är kraven nedan mer förslag till hur man normalt bygger en enklare kommentarsfunktion till en sida/innehåll.

1. Man kan lägga till kommentarer.

1. Kommentaren skrivs i Markdown.

1. Man är anonym när man lägger till en kommentar, man skriver in sin emailadress.

1. Lägg till en bild från gravatar baserat på emailadressen.

1. Man kan redigera en kommentar.

1. Man kan radera en kommentar.

1. Kör `make test` för att kolla att du inte har några valideringsfel.

1. Gör en `dbwebb publish anax` för att kolla att allt validerar och fungerar.



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter om du har tid och lust, eller spara dem till nästa kursmoment.

1. Lägg till så att man måste vara en inloggad användare för att göra kommentarer och att en användare bara kan radera och redigera egna kommentarer. Skapa en användare som heter doe med lösenord doe.

1. Låt en administratör (admin:admin) ha rättigheter att radera och redigera samtliga kommentarer.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
