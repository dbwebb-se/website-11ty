---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2017-09-11": "(A, mos) Första utgåvan."
...
Databasmodell för kommentarssystem
===================================

Förbered för att bygga ditt kommentarssystem i en databas och så att endast inloggade användare kan göra kommentarar.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har sedan tidigare varit i kontakt med modulen [`anax/database`](https://packagist.org/packages/anax/database).



Introduktion {#intro}
-----------------------

Vi kan anta att ditt kommentarssystem kommer att kräva inloggade användare, det är alltså inte ett kommentarssystem för anonyma användare som vi skall skapa.

Du behöver stöd för att användare kan registrera sig och logga in i ditt system och att de enbart kan påverka sina egna kommentarer.

Du kan nu börja spara kommentarerna i databasen, men du kan också avvakta till kommande kursmoment. Gör ett val beroende av hur mycket tid du har till ditt förfogande inom detta kursmoment.

Du kan alltså välja att spara saker och göra dem i nästa kursmoment istället. Du kan i princip välja att spara hela uppgiften till nästa kmom. Skriv en notis i redovisningstexten om hur du gör.



Krav {#krav}
-----------------------

1. Fundera igenom och kom fram till en tabellstruktur i databasen som fungerar för ditt kommentarsssytem.

1. Skapa DDL SQL-kod till databastabeller som ligger till grund för användare och kommentarer. Du kan använda SQLite och/eller MySQL.

1. Du kan göra en prototyp och använda modulen `anax/database` för att jobba mot databasen.

1. Kör `make test` för att kolla att du inte har några valideringsfel.

1. Gör en `dbwebb publish anax` för att kolla att allt validerar och fungerar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
