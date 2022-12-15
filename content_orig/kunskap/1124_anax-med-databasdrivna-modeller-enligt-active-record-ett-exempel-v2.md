---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2018-12-10": "(B, mos) Uppdaterad till kursen ramverk1 v2."
    "2017-09-11": "(A, mos) Första utgåvan."
...
Anax med databasdrivna modeller enligt Active Record, ett exempel (v2)
==================================

[FIGURE src=image/snapht17/book-update.png?w=c5&cf&a=10,60,20,0 class="right"]

Vi bygger vidare på hanteringen med formulär och databasdrivna modeller genom att presentera ett exempel som implementerar CRUD med givna tekniker.

Det blir ett komplett kodexempel som visar hur man kan skriva koden i modellagret med stöd av de moduler som presenteras, inklusive formulärhantering, databas med query builder och designmönstret Active Record.

Via detta kodexempel får vi en kodbas att utgå ifrån, en kodbas som visar på ett mer komplext sammanhang där flera delar av ramverkets kod samverkar.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har läst artikeln "[Anax och databasdrivna modeller (v2)](kunskap/anax-och-databasdrivna-modeller-v2)".



Bygg vidare på tidigare exempel {#initanax}
--------------------------------------

Vi jobbar vidare i samma katalog där vi gjorde formulär- och databas-exemplet. Du bör alltså ha tre routes som fungerar, nämligen `user`, `user/login` och `user/create`.

Pröva att öppna din webbläsare mot `htdocs` för att kontrollera dina routes fungerar.

Tanken är att vi skall scaffolda fram ett CRUD exempel och sedan studera koden som genererats.



Exemplet Bok {#exbok}
--------------------------------------

Det exempel vi skall titta på handlar om böcker, `Book`. Exemplet visar en samling av CRUD-relaterade klasser som tillsammans med en modell och en kontroller som hjälper oss att göra CRUD för böcker. Vi kan lägga till böcker, redigera dem, visa dem och radera dem. Exemplet är tänkt att visa på en mer komplett implementation av en databasdriven modell och hur man kan lösa CRUD med scaffolding och kodstrukturer.

När exemplet fungerar och är på plats kan det se ut så här.

[FIGURE src=image/snapht17/book-all.png?w=w3 caption="En lista av böcker."]

Då börjar vi med att plocka fram kodbasen för exemplet.



Scaffolda CRUD för Bok {#scaffbok}
--------------------------------------

Vi använder styrkan med scaffolding och genererar en kodbas för en göra CRUD på böcker.

```bash
# Ställ dig i roten av exempelrepot
anax create src/Book ramverk1-crud-v2
```

Du kommer att skapa alla filerna katalogen `src/Book`.

När du får frågan om namespace skriver du in `Anax\\Book` och byter ut Anax mot ditt eget vendor name. Du behöver dubbla backslash eftersom backslash är ett specialtecken, du _escapar_ ditt backslash-tecken.

På frågan om klassnamn skriver du `Book`.

Det kan se ut så här när du kör det.

[ASCIINEMA src=137189]

När du är klar innehåller den scaffoldade katalogen `src/Book` följande struktur.

```text
$ tree src/Book
src/Book
├── Book.php
├── BookController.php
├── HTMLForm
│   ├── CreateForm.php
│   ├── DeleteForm.php
│   └── UpdateForm.php
└── extra
    ├── config
    │   └── router
    │       └── 100_bookController.php
    ├── sql
    │   └── ddl
    │       ├── book_mysql.sql
    │       └── book_sqlite.sql
    └── view
        └── book
            └── crud
                ├── create.php
                ├── delete.php
                ├── update.php
                └── view-all.php

9 directories, 12 files
```

Låt oss börja med att titta på vilka filer som är scaffoldade.

Kontrollern ligger i `BookController.php`. Kontrollern innehåller metoder för routerna `book/`, `book/create`, `book/update` och `book/delete`. Den injectas med `$di` och använder sig av modellen `Book` för att spara böckerna.

Modellen ligger i `Book.php`. Den är databasdriven och utökar Active Record. I modellklassen `Book` finns en koppling till databastabellen med samma namn samt en koppling mellan klassens properties och de kolumner som finns i databastabellen. Det är så som Active Record är implementerat.

Under katalogen `HTMLForm` ligger de formulär som utför create, update och delete av böcker i databasen. De använder sig av modellklassen `Book` för att lagra resultatet i databasen. De formulär som finns är hårt kopplade till de publika properties som finns i modellklassen, även det är hur Active Record fungerar.

I katalogen `extra/` ligger de saker som behövs för att integrera koden i ditt ramverk. Normalt kopierar du innehållet i katalogen till sina respektive platser i ramverket. När du är klar kan du radera katalogen.

Filen som innehåller routen för kontrollern ligger under `extra/config/router/100_bookController.php`. Alla routes kommer att monteras under routen `book/`.

I katalogen `extra/sql/ddl/*.sql` finns grunden för databastabeller. Databastabellerna motsvaras av de properties som finns i modellklassen `Books`, det finns dock ingen atuomatisk koppling för de properties/kolumner som används. Det får man redigera för hand.

De vyer som skall används ligger under `extra/view/book/crud/*`. Det är vyer som är byggda för scaffolding och ger dig en grund att stå på.

Det var nog allt. Låt oss då göra det som krävs för att exemplet skall fungera.



Ett fungerande exempel av den scaffoldade koden {#fungera}
--------------------------------------

Vi tar det steg för steg.

1. Skapa databastabellen `Book`.
1. Kopiera vyerna.
1. Lägg till routes för `book/`.
1. Pröva att det fungerar via routen `book/`.



### Skapa databastabellen `Book` {#adddbtable}

Jag tar och kopierar de SQL-filer som scaffoldats fram och lägger dem i min egen `sql/ddl`.

```bash
# Stå i rooten av exempel repot
rsync -av src/Book/extra/sql .
```

Sedan skapar jag tabellen i SQLite där jag sedan tidigare har en databas i `data/db.sqlite`.

```bash
sqlite3 data/db.sqlite < sql/ddl/book_sqlite.sql
```

Nu finns databastabellerna på plats. Du kan verifiera via `.schema Book` så här.

```text
$ sqlite3 data/db.sqlite ".schema Book"
CREATE TABLE Book (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "column1" TEXT NOT NULL,
    "column2" TEXT NOT NULL
);
```

<!--
Jag väljer att använda terminalen för att skapa tabellen för MySQL.

```bash
mysql -uanax -panax anaxdb < sql/ddl/book_mysql.sql
```

Sedan med MySQL.

```bash
$ echo "SHOW CREATE TABLE Book\G;" | mysql -uanax -panax anaxdb 
*************************** 1. row ***************************
       Table: Book
Create Table: CREATE TABLE `Book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,   
  `column1` varchar(256) COLLATE utf8_swedish_ci NOT NULL,
  `column2` varchar(256) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci
```

Då vet vi att tabellerna finns i båda databaserna.

-->



### Kopiera vyerna {#addview}

Du kan kopiera template-filern till vyerna som ligger i katalogen `extra/view/book/crud/` till din egen vy-katalog i `view/book/crud/`.

```text
# Stå i rooten av exempel repot
rsync -av src/Book/extra/view .
```

Då är vi redo att testa.



### Lägg till routes för `book/` {#addroutes}

Lägg till routes så att ramverket känner igen dem och skickar dem vidare till kontrollern.


```text
# Stå i rooten av exempel repot
rsync -av src/Book/extra/config/router ./config
```

Du kan verifiera att routerna är tillagda via din `htdocs/dev/router`.



### Pröva routen `book/` {#routebook}

Vi prövar routen `book/`. Det bör se ut så här.

[FIGURE src=image/snapht17/book-view-empty.png?w=w3 caption="Ännu så länge finns inga böcker."]

Om det gick bra så prövar du att lägga till en bok via `book/create` som finns som ett menyval i sidan.

[FIGURE src=image/snapht17/book-create.png?w=w3 caption="Då försöker vi skapa en bok till boksamlingen."]

När det går bra så ser det ut så här.

[FIGURE src=image/snapht17/book-view-one.png?w=w3 caption="Boken blev tillagd och visas i översikten."]

Nu kan jag klicka på bokens id för att redigera boken. Det tar mig till routen `book/update/1` där ettan står för bokens id.

Nu kan jag redigera och spara mina ändringar.

[FIGURE src=image/snapht17/book-update.png?w=w3 caption="Eventuella ändringar sparas och översikten visas igen."]

Du kan även radera en bok via menyvalet "Delete". Det kan se ut så här.

[FIGURE src=image/snapht17/book-delete.png?w=w3 caption="Radera en book via formuläret."]

Det vara det. Ett fungerande CRUD-exempel med databasdrivna modeller.

NU vore det ett bra läge att gå in och uppdatera koden så att den blir mer som en riktig bokhantering. Det vore ett bra sätt att se hur koden hänger ihop. Men det är en annan historia.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har gått igenom hur formulärhantering och databashantering med databasdrivna modeller som implementeras via Active Record kan byggas ihop till en samling av klasser och filer som kan scaffoldas fram.

Vi har sett hur vi kan integrera den scaffoldade koden in i vårt eget ramverk och vi får en känsla för hur andra liknande moduler kan scaffoldas fram. Dessutom får vi ett större kodexempel på hur CRUD kan fungera i våra databasdrivna modeller.

Denna artikel har en [egen forumtråd](t/6766) som du kan ställa frågor i, eller bidra med tips och trix.
