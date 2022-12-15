---
author: mos
category:
    - kurs webtec
revision:
    "2021-10-04": "(B, mos) Uppdatera hur kodbasen kopieras så att dolda filer följer med."
    "2021-10-03": "(A, mos) Första utgåvan i samband med webtec-v1 ht21."
...
Bygg en databasdriven webbplats med PHP med SQL
===================================

Du skall bygga en databasdriven webbplats och använda CRUD (Create, Read, Update, Delete) för att jobba mot databasen.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har grundläggande kunskap om databasen SQLite och SQL.

Du har grundläggande kunskap om PHP PDO.

Du vet vad begreppet CRUD innebär i sammanhanget.

Du kan bygga webbsidor med PHP och begreppet sidkontroller och vyer.

Du kan HTML formulär med GET och POST samt du vet vad "self submitting form" och en processingsida med redirect innebär.

Du har utfört uppgiften `me/session`.

Du har utfört uppgiften `me/sqlite`.

Du har jobbat igenom övningen "[Kom igång med SQLite och PHP PDO (v2)](kunskap/kom-igang-med-sqlite-och-php-pdo-v2)" eller har motsvarande kunskaper.



<!--
Genomgång {#genom}
------------------------

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

I denna uppgiften skall du spara alla filerna i katalogen `me/pdoweb`.

Använd din ToDo databas som grund för uppgiften. Spara databasfilen i `me/pdoweb/db/todo.sqlite`.

Du har sedan tidigare utvecklat en webbplats i `me/session`. Du kan utgå från den och dess innehåll för att nu tillföra sidkontroller som kopplas till databasen.

Det finns också en tom kodbas som du kan utgå ifrån. Välj själv hur du vill starta uppgiften.

Det är bara de databasrelaterade sidkontrollerna som är viktiga i uppgiften. Du kan själv välja om din webbplats innehåller fler sidkontroller, till exempel genom att låta dina sidkontrollers från uppgiften `me/session` vara kvar. Eller så låter du uppgiften enbart innehålla databasrelaterade sidkontrollers.



Kopiera {#kopiera}
-----------------------

Du kan välja om du vill utgå från en tom kodbas eller om du vill kopiera din kodbas från `me/session`

Så här börjar du genom att kopiera din kodbas från `me/session`.

```text
# Gå till roten av ditt kursrepo
cp -ri me/session/. me/pdoweb
cd me/pdoweb
```

Så här börjar du med en tom kodbas.

```text
# Gå till roten av ditt kursrepo
cp -ri example/php/pagecontroller-setup/. me/pdoweb
cd me/pdoweb
```



Installera med composer {#composer}
-----------------------

Börja med att uppdatera din installation med composer.

```text
composer update
```



Krav {#krav}
-----------------------

Utför följande krav.

De krav som är markerade med [OPTIONELL] är valbara och du väljer själv om du vill utföra dem.

1. Du skall skapa ett antal sidkontroller med önskvärd funktion enligt nedan. Varje sidkontroller skall placeras i navbaren.

1. Du skall använda din databas ToDo, som du gjorde i uppgiften `me/sqlite`.

1. Spara databasen i `db/todo.sqlite`.

1. Sidkontroller "Status" som visar om du har extension för PDO och SQLite installerad i din installation av PHP.

1. Sidkontroller "Connect" som visar att du kan koppla upp dig mot databasen. Koden som kopplar dig mot databasen skall sparas i en funktion.

1. Sidkontroller "Select" som visar att du kan koppla upp dig mot din databas och ställa en SELECT fråga och visa upp resultsetet med en var_dump/print_r. Håll det enkelt.

1. Sidkontroller "Search" som låter dig söka i databasen, via ett "self submitting" GET formulär. Det går bra att skriva ut resultsetet med var_dump/print_r.

1. Sidkontroller "Show" som låter dig visa flera rader i en tabell genom att söka efter något. Använd GET och ett self submitting form. Här lägger du extra kraft på att visa upp sökresultatet på ett snyggt sätt i en HTML tabell.

1. Sidkontroller "Single" som låter dig visa en rad genom att skicka in ett id i querysträngen. Du kan visa värdena i ett formulär där alla fälten är readonly men du kan också visa informationen på något annat sätt - välj väg.

1. Uppdatera sidkontrollern "Show" och länka samman den med "Single". Du skall i "Show" kunna klicka på radens id och komma till sidan som heter "Single" som visar en rad med samma id.

1. Sidkontroller "Insert" som låter dig stoppa in en ny rad i databasen via ett POST formulär och en processingsida. När raden är tillagd skall det göras en redirect till "Single" och visa den nya raden.

1. [OPTIONELL] Sidkontroller "Update" som låter dig uppdatera en rad i databasen. Man kan först leta reda på den raden man vill uppdatera i "Show", sedan kan man klicka på en länk i den raden som heter "Edit". Man kommer då till ett (post) formulär där man kan redigera innehållet i raden och sedan spara det (via en processingsida). Välj vilken sida som är lämpligast att göra redirect till från processingsidan.

1. [OPTIONELL] Sidkontroller "Delete" som låter dig radera en rad i databasen. Man kan först leta reda på den raden man vill radera i "Show", sedan kan man klicka på en länk i den raden som heter "Delete". Man kommer då till ett (post) formulär där man får en fråga om man verkligen vill radera raden, klickar man "Yes" raderas raden (via en processingsida). Välj vilken sida som är lämpligast att göra redirect till från processingsidan.

1. Besvara följande frågor i din redovisningstext.

    * Berätta hur det gick att lösa uppgiften, var något extra svårt, lurigt, krångligt eller flöt det på smidigt?
    * Är det något som du är extra nöjd med i ditt resultat från uppgiften?



Publicera {#publicera}
-----------------------

Avsluta uppgiften så här.

1. Validera och publicera ditt resultat på studentservern `dbwebb publish pdoweb`.

1. Testa ditt resultat så att det passera de automatiska testerna med `dbwebb test pdoweb`.

1. När du är klar kan du publicera resultatet med `dbwebb publish pdoweb`.
