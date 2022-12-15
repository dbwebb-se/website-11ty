---
author: mos
category:
    - databas
    - sql
revision:
    "2017-01-09": (C, mos) Mer i stycket förutsättningar.
    "2015-08-26": (B, mos) phpliteadmin flyttade från Googlecode till Bitbucket.
    "2015-06-10": (A, mos) Första utgåvan inför htmlphp version 2 av kursen.
...
En webbaserad klient för SQLite, phpliteadmin
==================================

[FIGURE src=/image/snapvt15/phpliteadmin-login.png?w=c5&a=15,40,55,20 class="right"]

Det finns en webbaserad klient till SQLite som heter `phpliteadmin`. Det är ett PHP-skript som ger dig möjligheten att titta i och redigera din SQLite-databas via ett webbaserad gränssnitt.

Det kan vara mycket behändigt att ha tillgång till en sådan möjlighet. Ibland har man inte direkt tillgång till filsystemet på servern och en webbaserad klient ger dig då möjligheter att administrera din databas. 

<!--more-->




Förutsättningar {#pre}
--------------------------------------

Du har koll på SQLite och PHP. Det räcker. Men har du även koll på terminalen som verktyg så kan saker bli enklare.

Du har installerat [XAMPP](labbmiljo/webbserver) eller motsvarande.

Kanske har du också kikat på [desktopklienten som går att köra i Firefox](kunskap/kom-igang-med-databasen-sqlite#sqliteman) och [kommandoradsklienten `sqlite3`](kunskap/en-kommandoradsklient-for-sqlite), det vore bra men det är inte nödvändigt.

Om du använder dbwebb-cli för att publicera ditt kursrepo och phpliteadmin, se då till att lägga allt i en underkatalog som du döper till `db` så löser dbwebb-cli så att rättighterna blir 777 på katalogen `db` och 644 på filer som slutar på `.sqlite`.
 


Läs om `phpliteadmin` {#om}
--------------------------------------

Gå till projektsidan och läs kort [om projektet phpLiteAdmin](https://bitbucket.org/phpliteadmin/public/).

Där för du en snabb översikt av vad det handlar om.



Installera `phpliteadmin` {#install}
--------------------------------------

Gå till sidan för att [ladda ned phpliteadmin](https://bitbucket.org/phpliteadmin/public/downloads).

Ladda ned senaste versionen och lägg den i samma katalog som din SQLite-databas.

Jag använder terminalen för att installera skriptet. Det handlar om nedanstående kommandon. Notera att i skrivande stund gäller version 1.9.6 av phpliteadmin, men det uppdateras, så ha koll på vilken som är senast.

```text
wget -O phpliteadmin.zip https://bitbucket.org/phpliteadmin/public/downloads/phpLiteAdmin_v1-9-6.zip
unzip phpliteadmin.zip
rm phpliteadmin.zip
```

Du kan nu ta din webbläsare och peka på filen `phpliteadmin.php`.

[FIGURE src=/image/snapvt15/phpliteadmin-login.png?w=w2 caption="Logga in för att se dina SQLite-databaser."]

Det följer med en README-fil, läs den. Där står om hur du kan konfigurera skriptet.

Titta i filen `phpliteadmin.php`, där står lösenordet. Fundera på att ändra det till ditt eget personliga.




Använda `phpliteadmin` {#anvand}
--------------------------------------

Så här ser det ut när du har loggat in. Du kan skifta mellan de databaser som ligger i katalogen.

[FIGURE src=/image/snapvt15/phpliteadmin-oversikt.png?w=w2 caption="Jobba med databaserna i phpliteadmin."]

Du kan exportera, importera och ställa SQL-frågor mot databasen. Nu är det bara att börja jobba.



Alternativ klient MyWebSQL {#alt}
--------------------------------------

Det finns en alternativ klient i [MyWebSQL](http://mywebsql.net/). Fördelen med MyWebSQL är att den även har stöd för MySQL och PostgreSQL.

[FIGURE src=/image/snapvt15/mywebsql-overview.png?w=w2 caption="MyWebSQL är ett alternativ till phpliteadmin."]

Pröva den gärna och berätta vad du tycker.



Avslutningsvis {#avslutning}
--------------------------------------

Det var alltså en webbaserad klient för SQLite. Det kan vara bra att ha tillhanda. Ibland vill man ha en desktopklient, ibland en kommandoradsklient och ibland vill man ha en webbaserad klient. När det gäller databaser är det bra att ha lite koll på olika klienter, annars kan man hamna i ett läge där man saknar en smidigt möjlighet att prata med databasen.

Ställ gärna frågor om [SQLite och webbaserade klienter i forumet](t/4313).
