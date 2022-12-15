---
views:
    flash:
        region: flash
        template: default/image
        data:
            src: "img/snapvt19/oophp-kmom05-flash.svg"
author:
    - mos
category:
    - kurs oophp
revision:
    "2019-03-13": "(C, mos) Uppdaterad med läsanvisningar till v5."
    "2018-04-24": "(B, mos) Publicerat oophp v4."
    "2017-04-21": "(A, mos) Släppt i första utgåvan."
...
Kmom05: PHP PDO och MySQL
==================================

Detta kursmoment hanterar PHP och databaser via PHP Data Objekts, PHP PDO. Du kan använda databasen MySQL/MariaDB alternativt SQLite, du bestämmer själv.

Via en inledande övning visas via ett exempelprogram hur du jobbar med PHP PDO och hur koden kan skrivas när man jobbar mot en databas med CRUD (Create, Update, Read, Delete), rent generellt sett. Du ser hur databaskoden fungerar tillsammans med utkast till kontroller routes och vyer.

Därefter får du via en uppgift koda in motsvarande kod in i ramverkets klasser och du kommer använda en ramverksmodul för att accessa databasen, det blir som ett lager ovanpå PHP PDO.

Du får en utmaning som innebär att tänka igenom koden som serveras i övningen och hur den kan struktureras när den skall in i ramverket. Går det att göra en klasstruktur av hela, eller delar av koden? Hur passar koden in i ett kontroller objekt? Det blir en övning i refactoring och att läsa koden.

Vill man förenkla så handlar det om att lösa CRUD (Create, Read, Update, Read) i ramverket mot en databas, närmare specifikt en filmdatabas.

Det blir dessutom träning i hur man kan hantera ett gränssnitt i sin webbplats. Här kan man behöva tänka till hur man vill att det skall se ut för slutanvändaren och de valen kan påverka vilken kod man behöver bygga för att implementera gränssnitten. Blir din lösning tillräckligt smidig för slutanvändaren?

<!-- more -->

[FIGURE src=image/snapvt17/movie-paginate-1.png?w=w3 caption="Första sidan visas med två träffar."]

[FIGURE src=image/snapvt17/movie-paginate-sort.png?w=w3 caption="Nu kan man även sortera, samtidigt med paginering och antal träffar."]

[FIGURE src=image/snapvt18/movie-i-redovisa.png?w=w3 caption="Integrera filmdatabasen för att visas inuti din redovisa-sida."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>


<!--sto p-->



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Instruktionen nedan visar hur du använder databasen MySQL/MariaDB dels på studentservern och dels i din lokala utvecklingsmiljö.

1. Du behöver ha tillgång till BTH's labbmiljö för MySQL. Du skapar själv ett konto på BTHs server för MySQL.
    * [MySQL / MariaDB i BTH’s labbmiljö](labbmiljo/mysql-bth-labbmiljo)

1. Du behöver även ha en lokal utvecklingsmiljö så att du kan köra mot databasen MySQL på din hemmadator.
    * [MySQL / MariaDB med XAMPP](labbmiljo/mysql-med-xampp)

Det finns alternativa sätt att uppnå en bra utvecklingsmiljö för kursen. Har du en alternativ variant så funkar det säkert. Du behöver till exempel inte köra MySQL/MariaDB inom XAMPP, du kan använda en annan lokal databasserver som du kanske redan har tillgång till från databas-kursen.

Det är tillåtet att använda databasen SQLite som ett alternativ till MySQL/MariaDB.



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*




### Artiklar {#artiklar}

Läs följande.

1. Vi skall använda PHP PDO för att koppla oss till databasen MySQL/MariaDB (SQLite). Börja därför att översiktligt bekanta dig med manualen för att se hur klasserna i PHP PDO är strukturerade och fungerar. Du kommer troligen vilja slå upp detta i manualen senare, när du jobbar i övningen. Du använda samma interface i kursen htmlphp så delvis är det repetition.
    * [PHP Data Objects](https://www.php.net/manual/en/book.pdo.php)

PDO erbjuder ett _data access lager (DAL)_ som är lika oavsett databas. De metoder man använder för att koppla sig mot databasen och ställa frågor är lika oavsett vilken databas som används.

PDO är inte ett _database access lager (DBAL)_ som erbjuder möjligheten att skriva samma SQL-frågor, oavsett databas. Ett DBAL interface är _databas agnostiskt_ och kommunicerar på exakt samma sätt, oavsett vilken databas som ligger bakom. Ett sådant gränssnitt översätter normalt SQL-frågorna så att de blir lika och fungerar oavsett underliggande databas.

Lär mer på Wikipedia om "[Data access layer (DAL)](https://en.wikipedia.org/wiki/Data_access_layer)" och "[Database abstraction layer (DBAL)](https://en.wikipedia.org/wiki/Database_abstraction_layer)".



### Databaser i ramverk {#db}

Läs som referensmaterial och fördjupning, ämnet återkommer i [kursen ramverk1](kurser/ramverk1).

När det gäller databasmoduler i ramverk så finns de ofta förpackade i egna moduler. Som referensmaterial vill jag här visa hur tre populära ramverk (Symfony, Laravel, Yii) förhåller sig till "sina" databasmoduler samt Propel som är en fristående databasmodul. Läs efter intresse.

* [Symfony med Doctrine ORM](https://symfony.com/doc/current/doctrine.html)
* [Laravel med fluent query builder alternativt Eloquent ORM](https://laravel.com/docs/database)
* [Yii med Database Access Object och Active Record](https://www.yiiframework.com/doc/guide/2.0/en/start-databases)
* [Propel ORM](http://propelorm.org/)

Här är ett par korta förklaringar till vad de databasrelaterade benämningarna innebär, i sammanhanget PHP och ramverk.

| Benämning | Förklaring |
|-----------|------------|
| Data(base)&nbsp;Access Object (DAO) | Ett generellt gränssnitt för att accessa persistent lagrad data, utan att man specifikt behöver veta hur datan är lagrad. I PHP bygger vanligen en implementation av DAO på PDO. |
| Query builder | Ett objektorienterat sätt att ställa frågor mot databasen som ett alternativ till SQL-frågor. Man använder metoder för att bygga SQL-frågorna och den verkliga SQL-koden byggs upp i bakgrunden. Kan även lösa DBAL. |
| Active Record | Ett designmönster där man bygger en klass för att mappa en tabell i databasen.  Klassen erbjuder metoder som find, save och delete samt har publika medlemsvariabler där innehållet kan läsas och skrivas. |
| Object-relational mapping (ORM) | En programmeringsteknik för att konvertera data i tabeller från relationsdatabaser till objekt i objektorienterade strukturer. Vanligt när man vill jobba på ett objektorienterat sätt mot en databas men vill undvika SQL. |

Läs mer på Wikipedia om [Data access object (DAO)](https://en.wikipedia.org/wiki/Data_access_object), [Active Record pattern](https://en.wikipedia.org/wiki/Active_record_pattern),  [Object-relational mapping (ORM)](https://en.wikipedia.org/wiki/Object-relational_mapping)

För den som än mer vill fördjupa sig i ämnet så kan man se en del av de klassiska designmönster som ligger bakom ovan resonemang via "[Catalog of Patterns of Enterprise Application Architecture (P of EAA)](https://www.martinfowler.com/eaaCatalog/)". Studera till exempel strukturen av följande designmönster [Active Record](https://www.martinfowler.com/eaaCatalog/activeRecord.html), [Data Mapper](https://www.martinfowler.com/eaaCatalog/dataMapper.html), [Query Object](https://www.martinfowler.com/eaaCatalog/queryObject.html) och [Repository](https://www.martinfowler.com/eaaCatalog/repository.html).



### Ramverk Anax {#anax}

Vi fortsätter att jobba med modulerna i ramverket Anax, i detta kursmomentet tillkommer modulen `anax/database`. Använd modulens README som referensdokumentation.

* [anax/database](https://github.com/canax/database)

Modulen erbjuder en Data Access Object ovan PDO med syftet att förenkla och spara kodrader jämfört med att använda PDO direkt.

Modulen kan även användas tillsammans med en query builder ([anax/database-query-builder](https://github.com/canax/database-query-builder)) och en implementation av active record ([anax/database-active-record](https://github.com/canax/database-active-record)), men det är inget vi berör i denna kurs.

Du har sedan tidigare kännedom om följande moduler.

* [anax/commons](https://github.com/canax/commons)
* [anax/controller](https://github.com/canax/controller)
* [anax/request](https://github.com/canax/request)
* [anax/response](https://github.com/canax/response)
* [anax/router](https://github.com/canax/router)
* [anax/session](https://github.com/canax/session)
* [anax/view](https://github.com/canax/view)



### Video {#video}

Det finns generellt kursmaterial i video form.

1. Kursen innehåller genomgångar och föreläsningar som spelas in (streamas) och därefter läggs i en spellista. Du kan nå spellistan på "[oophp streams vt19](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-igucRSQ6tFYg9x8to5HiE)".

1. Uppgifter och övningar kan innehålla extra videomaterial i form av spellistor kopplade till respektive artikel. Ofta syns dessa videor i inledningen av artikeln.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 10-16 studietimmar)*


### Övningar {#ovningar}

Gör följande övning, den förbereder dig inför uppgifterna.

1. Jobba igenom guiden "[Kom igång med PHP PDO och MySQL (v2)](kunskap/kom-igang-med-php-pdo-och-mysql-v2)" för att få insyn i ett exempel som gör CRUD med PHP PDO och MySQL. Spara eventuella exempelprogram i `me/kmom05/pdo`.

<!--
Lägga till esc() till vyer.

Hur enhetstesta database-kod?

login-registrera flöde?
-->



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgift "[Bygg CRUD filmdatabas med MySQL](uppgift/bygg-crud-filmdatabas-med-mysql)" och spara filerna i `me/redovisa`.

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (5.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make test` som en sista avstämning, innan du sätter sista taggen.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Några reflektioner kring koden i övningen för PHP PDO och MySQL?
* Hur gick det att överföra koden in i ramverket, stötte du på några utmaningar eller svårigheter?
* Hur gick det att använda databasmodulen anax/database, några funderingar kring denna typen av moduler?
* Berätta om din slutprodukt för filmdatabasen, gjorde du endast basfunktionaliteten eller lade du till extra features och hur tänkte du till kring användarvänligheten och din kodstruktur?
* Vilken är din TIL för detta kmom?
