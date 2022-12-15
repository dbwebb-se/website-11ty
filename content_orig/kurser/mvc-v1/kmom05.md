---
author:
    - mos
revision:
    "2021-04-30": "(B, mos) Lade till ORM föreläsning från Zoom och övningar."
    "2021-04-26": "(A, mos) Första utgåvan."
...
Kmom05: ORM / Databas
==================================

När databasdrivna applikationer byggs i ramverk finns olika taktiker för att integrera applikationskoden med databasen. Ett sätt är att jobba mot ett databas API som är uppbyggt av lagrade procedurer (jämför med databas-kursen). Ett annat sätt, som är vanligt i de ramverk vi har studerat, är att använda sig av ett ORM lager (Object Relational Mapping), vars syfte är att objektifiera relationsdatabasen och accessen till databasen. Det handlar alltså om att göra relationsdatabasen mer objektorienterad.

Själva grundtanken med ORM-moduler är att ge programmeraren möjlighet att jobba mot databasen med vanlig objektorienterad PHP kod via metoder, klasser och objekt. Det gränssnitt som ORM erbjuder döljer själva databasen och programmeraren behöver inte vara speciellt bevandrad i varken SQL eller hur en relationsdatabas fungerar.

Relationsmodellen och den objektorienterade modellen är två olika modeller och de har olika sätt att strukturera upp sitt innehåll. I relationsmodellen pratar vi om tabeller, kolumner och rader samt kopplingar mellan tabeller. När databasen döljs bakom ett ORM så erbjuds ett komplett objektorienterat synsätt mot databasens innehåll, fritt från SQL.

Du skall nu läsa på om ORM och välja ett ORM att jobba med samt koppla din applikation, via ett ORM, till en databas.

<!-- more -->

<small><i>Detta är instruktionen för kursmomentet och omfattar cirka **20 studietimmar**. Fokus ligger på uppgifter som du skall lösa och redovisa. För att lösa uppgifterna behöver du normalt jobba igenom övningar och läsanvisningar för att skaffa dig rätt kunskap och förståelse av uppgiftens alla delar. Läs igenom hela kursmomentet innan du börjar jobba.</i></small>



Labbmiljö  {#labbmiljo}
---------------------------------

*(ca: 1-2 studietimmar)*

Du kan använda databaserna MySQL, MariaDB eller SQLite för att genomföra uppgiften. När du publicerar din applikation till studentservern så skall applikationen fungera med sin databaskoppling.

1. Väljer du MySQL/MariaDB så kan du använda BTHs databasserver för studenter enligt följande.

    * [MySQL / MariaDB i BTH’s labbmiljö](labbmiljo/mysql-bth-labbmiljo)

1. Väljer du SQLite så bör du vara bekant med den databasen sedan tidigare och du vet hur den kan publiceras till studentservern (htmlphp-kursen).

En rekommendation är att i övningarna nedan börja jobba med SQLite och när man är bekväm med att det fungerar så kan man byta över till MySQL/MariaDB då de databaserna kräver lite mer administration och hantering för att komma igång.



Uppgifter & Övningar {#uppgifter_ovningar}
-------------------------------------------

*(ca: 10-14 studietimmar)*

Uppgifter skall utföras och redovisas, övningar är träning inför uppgifterna.



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas.

1. Lös uppgiften "[Kom igång med ett ORM i ditt PHP-ramverk](uppgift/kom-igang-med-ett-orm-i-ditt-php-ramverk)".



### Övningar {#ovningar}

Följande övningar kan förbereda dig inför uppgiften.

1. I kursrepot under [`example/orm`](https://github.com/dbwebb-se/mvc/tree/main/example/orm) ligger exempelkod som visar hur du kommer igång med olika ORM och ramverk. Jobba igenom valda exempel, när du har valt vilket ORM/ramverk du tänker jobba med eller testa ett par olika för att utvärdera.

<!--
Bygg ut exemplet så de visar mer samt inkludera MySQL och .env.student.
-->



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-8 studietimmar)*



### Föreläsning {#flas}

Titta igenom följande föreläsningar.



#### Database ORM - Object Relational Mapping {#f1}

Som en del i en Zoom-session hölls en föreläsning om "Database ORM - Object Relational Mapping" och det ger en bra introduktion till vad detta kmom handlar om.

Slides till föreläsningen "[Database ORM - Object Relational Mapping](https://dbwebb-se.github.io/mvc/lecture/L05-orm/slide.html)".

[YOUTUBE src="tCbb3ahGGpA" width=700 caption="Database ORM - Object Relational Mapping (med Mikael)."]

Som ett komplement till föreläsningen hittar du referenser längre ned i detta dokumentet under "[PHP, data abstraktion och ORM](#phporm)".


<!--

* Gör om ovan zoom till en vanlig inspelad föreläsning.

* Föreläs och visa strukturen i Doctrine (bygg ut Anax database så att den kan användas som QB & AR implementation)

-->



### Litteratur  {#litteratur}

Läsanvisningar finns generellt för begreppet ORM och de är samlade längst ned i detta dokumentet under rubriken "Resurser bra-att-ha".

Läsanvisningarna berör olika ramverk och deras implementationer av ORM.

Läsanvisningarna berör implementationer av fristående ORM som kan användas oberoende av ramverk.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa). Observera att denna kursen skiljer sig från hur du normalt sett lämnar in din redovisningstext.

Se till att följande frågor besvaras i texten i din rapport:

* Berätta hur du tog dig an uppgiften och valde ditt ORM och den kodbas du valde att bygga uppgiften på, vad lät du styra dina val, vad valde du och vad gjorde att du slutligen valde det du gjorde?

* När du kom in i ORM-modulerna och började installerade det, hur gick det? Var dokumentationen stöttande och kändes terminologin bekant sedan tidigare?

* Berätta om din applikation, hur den använder databasen och hur du implementerade applikationen, dels med vilken databas och dels med vilka tekniker/lager i ditt valda ORM. Fanns det svårigheter och utmaningar i arbetet?

* Vad är din uppfattning om ORM så här långt och relatera gärna till andra sätt att jobba med applikationskod mot databaser?

* Vilken är din TIL för detta kmom?



Resurser bra-att-ha {#resurser}
---------------------------------

Här anges övriga resurser som kan användas för vidare studier i det som kursmomentet omfattar.



### PHP, data abstraktion och ORM {#phporm}

Detta stycke ger dig en generell introduktion till begreppet ORM och vad som ligger bakom hur det implementeras.

I PHP erbjuder PHP PDO ett _data access lager (DAL)_ som är lika oavsett databas. De metoder man använder för att koppla sig mot databasen och ställa frågor är lika oavsett vilken databas som används. Man har "unifierat" gränssnittet mot olika databaser.

PDO erbjuder inte ett _database access lager (DBAL)_ som ger möjligheten att skriva samma SQL-frågor, oavsett databas. Ett DBAL interface är _databas agnostiskt_ och kommunicerar på exakt samma sätt, oavsett vilken databas som ligger bakom. Ett sådant gränssnitt översätter normalt SQL-frågorna så att de blir lika och fungerar oavsett underliggande databas men det är inget som applikationsprogrammeraren behöver bry sig om.

Ett lager av ORM kan bygga vidare på ett lager DBAL och låter dig behandla relationsdatabasens innehåll som objekt. Några av de vanligaste designmönster som är implementerade i ett ORM är Active record och Repository, andra varianter som kan förekomma är bland annat Table Data Gateway, Row Data Gateway samt Data Mapper. Implementationerna skiljer mellan olika leverantörer av ORM.

Läsresurser.

* [PHP PDO](https://www.php.net/manual/en/book.pdo.php)

Wikipieda.

* [Data access layer](https://en.wikipedia.org/wiki/Data_access_layer)
* [Database abstraction layer](https://en.wikipedia.org/wiki/Database_abstraction_layer)
* [Object Relational Mapping](https://en.wikipedia.org/wiki/Object%E2%80%93relational_mapping)

Designmönster för data access och object-to-relational mapping.

* [Data Access Patterns: The Features of the Main Data Access Patterns Applied in Software Industry](https://medium.com/mastering-software-engineering/data-access-patterns-the-features-of-the-main-data-access-patterns-applied-in-software-industry-6eff86906b4e), en kort artikel om olika designmönster som finns för data access.
* [Catalog of Patterns of Enterprise Application Architecture](https://www.martinfowler.com/eaaCatalog/index.html) innehåller beskrivningen av flera designmönster relaterade till ett ORM, till exempel följande.
    * [Query Object](https://www.martinfowler.com/eaaCatalog/queryObject.html)
    * [Data Mapper](https://www.martinfowler.com/eaaCatalog/dataMapper.html)
    * [Active Record](https://www.martinfowler.com/eaaCatalog/activeRecord.html)
    * [Repository](https://www.martinfowler.com/eaaCatalog/repository.html)



### Doctrine ORM {#doctrine}

Resurser för Doctrine ORM.

* [Wikipedia om Doctrine](https://en.wikipedia.org/wiki/Doctrine_(PHP))
* [Doctrine webbplats](https://www.doctrine-project.org/)



### ReadBeanPHP ORM {#readbean}

Resurser för ReadBeanPHP ORM.

* [Wikipedia om ReadBeanPHP](https://en.wikipedia.org/wiki/RedBeanPHP)
* [ReadBeanPHP webbplats](https://redbeanphp.com/)



### Propel ORM {#propel}

Resurser för Propel ORM.

* [Wikipedia om Propel (PHP)](https://en.wikipedia.org/wiki/Propel_(PHP))
* [Propel webbplats](http://propelorm.org/)



### Symfony {#symfony}

Resurser för Symfony.

* [Symfony: Databases and the Doctrine ORM](https://symfony.com/doc/current/doctrine.html)



### Laravel {#laravel}

Resurser för Laravel.

* [Laravel: Database](https://laravel.com/docs/database)
* [Laravel: Eloquent ORM](https://laravel.com/docs/eloquent)



### Yii framework {#yii}

Resurser för Yii framework.

* [Yii: Working with Databases](https://www.yiiframework.com/doc/guide/2.0/en/start-databases)



### Laminas {#laminas}

Resurser för Laminas.

* [Laminas: Components laminas-db](https://docs.laminas.dev/laminas-db/)



<!--
### DotEnv {#dotenv}

https://github.com/dbwebb-se/mvc/issues/37

Fixa också ett exempel där man skapa konfifiler för MySQL på studentservern.

Hur jobba med dotenv filer. Gör artikel och visa hur det fungerar med programvaran och gör ett test-cli verktyg.

#  * .env                contains default values for the environment variables needed by the app
#  * .env.local          uncommitted file with local overrides
#  * .env.$APP_ENV       committed environment-specific defaults
#  * .env.$APP_ENV.local uncommitted environment-specific overrides

https://laravel.com/docs/8.x/configuration
https://symfony.com/doc/current/configuration.html#configuration-based-on-environment-variables
https://github.com/bkeepers/dotenv
https://github.com/vlucas/phpdotenv
-->



<!--
### Slim {#slim}

Resurser för Slim.
-->

<!--
ANAX implementation

Vi fortsätter att jobba med modulerna i ramverket Anax, i detta kursmomentet tillkommer modulen `anax/database`. Använd modulens README som referensdokumentation.

* [anax/database](https://github.com/canax/database)

Modulen erbjuder en Data Access Object ovan PDO med syftet att förenkla och spara kodrader jämfört med att använda PDO direkt.

Modulen kan även användas tillsammans med en query builder ([anax/database-query-builder](https://github.com/canax/database-query-builder)) och en implementation av active record ([anax/database-active-record](https://github.com/canax/database-active-record)), men det är inget vi berör i denna kurs.
-->
