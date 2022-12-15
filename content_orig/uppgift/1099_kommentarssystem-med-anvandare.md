---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2017-09-11": "(C, mos) Uppdaterade introduktion för att passa uppgift i kmom03."
    "2017-09-05": "(B, mos) Flyttad till kmom04 och tydligare CRUD samt databas."
    "2017-06-28": "(A, mos) Första utgåvan."
...
Kommentarssystem med användare
===================================

Bygg ut ditt kommentarssystem så att endast inloggade användare kan göra kommenterar.

Bygg även en administrationsdel där du kan hantera kommentarer och användare.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Anax med databasdrivna modeller enligt Active Record, ett exempel](kunskap/anax-med-databasdrivna-modeller-enligt-active-record-ett-exempel)" och de artiklar som föregår den.



Introduktion {#intro}
-----------------------

Ditt kommentarssystem kräver inloggade användare, det är en begränsning cvi väljer. Det är alltså inte ett kommentarssystem för anonyma användare som vi skall skapa.

Du behöver stöd för att användare kan registrera sig och logga in i ditt system och att de enbart kan påverka sina egna kommentarer.

Nu är det dags att implementera en databasmodell och hantera både kommentarer och användare i databasen.

Fundera på hur mycket tid du har och se till att få en fungerade prototyp inom den tiden du har och prioritera bort det som inte är nödvändigt. Du kan välja att spara saker och göra dem i projektet istället.

Att ha en väl fungerande prototyp, innan du lämnar kursmomentet, är av yttersta vikt. Annars får du problem i nästa kmom. Det är viktigare att det fungerar än att det innehåller en massa features.



Krav {#krav}
-----------------------

1. Skapa hantering så att användaren kan skapa ett konto, logga in och redigera sin profil.

1. Man kan ange sin emailadress när man registrerar sig. Emailadressen används som gravatar. Man kan uppdatera sin emailadress via en profilsida.

1. En registrerad användare kan lägga till en kommentar, redigera den och ta bort den.

1. En administratör kan redigera och ta bort kommentarer oavsett användare.

1. En administratör kan hantera användarna, uppdatera, lägga till och ta bort dem.

1. Kör `make test` för att kolla att du inte har några valideringsfel.

1. Gör en `dbwebb publish anax` för att kolla att allt validerar och fungerar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
