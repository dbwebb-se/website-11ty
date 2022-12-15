---
author:
    - mos
category:
    - kurs oophp-v3
    - kurs oophp
revision:
    "2018-04-24": "(B, mos) Publicerat oophp v4."
    "2017-04-21": "(A, mos) Släppt i första utgåvan."
...
Kmom05: PHP PDO och MySQL
==================================

Detta kursmoment fokuserar på PHP PDO och databasen MySQL. Du får en inledande artikel som visar hur det fungerar i ett sammanhang och därefter får du på egen hand koda motsvarande funktionalitet in i din redovisa sida och in i ramverkets struktur.

Du får en utmaning som innebär att tänka igenom koden som serveras i övningen och hur den kan struktureras när den skall in i ramverket. Går det att göra objekt av allt eller har funktioner fortfarande en plats i kodstrukturen? Du väljer väg. Det blir en övning i refactoring.

Vill man förenkla så handlar det om att lösa CRUD (Create, Read, Update, Read) för en webbapplikation mot en databas, närmare specifikt en filmdatabas.

Det blir dessutom träning i hur man kan hantera ett gränssnitt i sin webbplats. Här kan man behöva tänka till hur man vill att det skall se ut för slutanvändaren och de valen kan påverka vilken kod man behöver bygga för att implementera gränssnitten.

<!-- more -->

[FIGURE src=image/snapvt17/movie-paginate-1.png?w=w3 caption="Första sidan visas med två träffar."]

[FIGURE src=image/snapvt17/movie-paginate-sort.png?w=w3 caption="Nu kan man även sortera, samtidigt med paginering och antal träffar."]

[FIGURE src=image/snapvt18/movie-i-redovisa.png?w=w3 caption="Integrera filmdatabasen för att visas inuti din redovisa-sida."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>


<!--sto p-->



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Du vill ha en lokal utvecklingsmiljö för databasen MySQL samt att du kan använda BTH's databasserver.

1. Du behöver ha tillgång till BTH's labbmiljö för MySQL. Du skapar själv ett konto på BTHs server för MySQL.
    * [MySQL / MariaDB i BTH’s labbmiljö](labbmiljo/mysql-bth-labbmiljo)

1. Du vill även ha en lokal utvecklingsmiljö så att du kan köra mot databasen MySQL på din hemmadator.
    * [MySQL / MariaDB med XAMPP](labbmiljo/mysql-med-xampp)

Det finns alternativa sätt att uppnå en bra utvecklingsmiljö för kursen. Har du en egen alternativ väg så funkar det säkert.



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 1-2 studietimmar)*



###Videor {#videor}

Kika på följande videos.

1. Det finns en [YouTube spellista kopplad till kursen](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_jh6fAj1iwiJSj70DXA2Vn), kika på de videos som börjar med 5. De ger dig en introduktion och översikt till kursmomentet.



###Artiklar {#artiklar}

Läs följande.

1. I övningen får du jobba med PHP PDO så bekanta dig gärna med [PHP PDO i PHP manualen](http://php.net/manual/en/book.pdo.php). Studera vilka metoder som erbjuds av klasserna PDO och PDOStatement samt kika kort på vilka PDO drivers som finns till olika databaser. 



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 10-16 studietimmar)*


###Övningar {#ovningar}

Gör följande övning, den förbereder dig inför uppgifterna.

1. Jobba igenom guiden "[Kom igång med PHP PDO och MySQL (v2)](kunskap/kom-igang-med-php-pdo-och-mysql-v2)" för att få insyn i ett exempel som gör CRUD med PHP PDO och MySQL. Spara eventuella exempelprogram i `me/kmom05/pdo`.

<!-- login? -->

<!--
Tips om projektet som en eshop?

Lägga till esc() till vyer.

Hur enhetstesta database-kod?
-->


###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgift "[Bygg CRUD filmdatabas med MySQL](uppgift/bygg-crud-filmdatabas-med-mysql)" och spara filerna i `me/redovisa`.

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (5.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make doc` och en `make test` som en sista avstämning, innan du sätter sista taggen.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Några reflektioner kring koden i övningen för PHP PDO och MySQL?
* Hur gick det att överföra koden in i ramverket, stötte du på några utmaningar?
* Berätta om din slutprodukt för filmdatabasen, gjorde du endast basfunktionaliteten eller lade du till extra features och hur tänkte du till kring användarvänligheten och din kodstruktur?
* Vilken är din TIL för detta kmom?
