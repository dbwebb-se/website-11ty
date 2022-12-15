---
author:
    - mos
category:
    - php
    - kurs oophp
    - anax-lite
revision:
    "2017-04-07": "(A, mos) Första utgåvan."
...
Admin gränssnitt för hantering av användare och konton
==================================

När en webbplats erbjuder konton och inloggning så måste det finnas ett administrativt gränssnitt så att webbplatsens administratörer kan se/söka vilka konton som finns, lägga till nya, ta bort, redigera dem som finns och kanske spärra vissa från att logga in.

Ett sådant gränssnitt kan byggas upp via ett klassiskt CRUD upplägg och det är tanken med denna övning.
 
<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kom igång med PHP PDO och MySQL (v2)](kunskap/kom-igang-med-php-pdo-och-mysql-v2)".

Tanken är att du redan löst uppgiften "[Inloggning till Anax Lite](uppgift/inloggning-till-anax-lite)" som gör att du kan logga in på webbplatsen.



Introduktion {#intro}
-----------------------

Detta handlar om den administrativa backend där webbplatsens administratör kan administrera de konton som finns på webbplatsen. Det handlar inte om att användaren av webbplatsen själv kan lägga till konton och redigera sin kontoprofil. Det är en annan sak, ett annat gränssnitt, iallafall så som vi väljer att se på det i denna övningen.

Tanken är att webbplatsens administratör, eller den som har administratörsbehörigheter, kan logga in och få tillgång till ett antal routes, ett eget gränssnitt, där den kan söka ut och visa upp de användarkonton som finns på webbplatsen. Administratören kan redigera detaljer om varje konto och kan lägga till nya och ta bort de som finns.

Du skall bygga funktionaliteten in i ditt Anax Lite.

Om du inte har olika rättigheter på dina användare så får alla användare, som kan logga in på din webbplats, bli administratörer.

Försök hitta ett bra flöde mellan de olika routerna, det finns säkert möjlighet att återanvända vissa delar om du länkar på ett väl genomtänkt sätt.



Krav {#krav}
-----------------------

1. Spara din SQL-kod som sätter upp tabell och initialt innehåll i `anax-lite/sql/setup-user-admin.sql`.

1. Se till att din databas innehåller en användare doe med lösenord doe och en användare admin med lösenord admin (om du har en admin-behörighet).

1. Skapa funktionalitet så att en administratör kan visa samliga konton i en HTML-tabell. Tabellen skall kunna sortera per kolumn och paginering skall fungera. 

1. Man skall kunna söka efter en användare. De användare som matchar sökningen skall visas.

1. Det skall gå att lägga till en ny användare, redigera detaljer om användaren, inklusive sätta nytt lösenord för användaren, samt radera användaren.

1. Bygg allt så man får en sammanhållen känsla av att detta är ett väl fungerande gränssnitt för administratören.

1. Validera och publicera din kod.



Extrauppgift {#extra}
-----------------------

1. Lägg till så att man kan spärra en användare från att logga in.

1. Lägg till så att varje användare har en viss behörighet, eller roll som i sin tur kan ha behörigheter. Håll det enkelt. KISS.



Tips från coachen {#tips}
-----------------------

Börja med att göra det enkelt, enklast möjliga. En sådan här uppgift kan snabbt växa. Avvakta med den höga ambitionen tills du löst grunden för uppgiften.

Försök skapa kod (klasser, vyer, mm) som du kan återanvända. Det är inte helt orimligt att du kommer skriva liknande kod längre fram i kursen, men mot andra databastabeller.

Men, väg tiden du har till förfogande, mot snabba lösningar kontra återanvändbar kod.

Lycka till och hojta till i forumet om du behöver hjälp!
