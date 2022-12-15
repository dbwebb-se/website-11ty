---
author: mos
category:
    - labbmiljo
    - databas
    - mysql
    - mariadb
revision:
    "2019-04-29": "(G, mos) Not om att man inte kan skapa användare samt att databasen är numer MariaDB."
    "2017-02-24": "(F, mos) Länkade till artikel om ssh och klienter."
    "2014-11-10": "(E, mos) Länkade till artikel om ssh och klienter."
    "2014-11-05": "(D, mos) Inforuta om SSH KeepAlive med Workbench."
    "2013-10-22": "(C, mos) Inforuta om secure_auth med Workbench."
    "2013-10-17": "(B, mos) Lade till information om att man inte kan skapa nya databaser på studentservern."
    "2013-08-20": "(A, mos) Första utgåvan som en del av kursen oophp. Omskriven från en [äldre version](https://docs.google.com/document/d/1kyemM3VIHh2u7df8ALQPmwB2S-LBFRNrgN11VaaCIbQ/preview?pli=1#)."
...
BTH's labbmiljö för databasen MySQL
==================================

[FIGURE src=image/snapshot/bth-mysql-login-bluray.jpg?w=c5&a=0,65,80,0&cf class="right"]

BTH's labbmiljö innehåller databasen MySQL och ett par olika klienter som kan användas för att koppla upp sig mot databasen. Här är en översikt av hur du går tillväga, som student vid BTH, för att få tillgång till MySQL.


<!--more-->



Förutsättningar {#forutsattning}
------------------------------

Du behöver ett studentkonto på studentservern ssh.student.bth.se.

Du kan själv skaffa dig ett konto på databasservern. Du gör det via Studentportalen.

Kom nu ihåg att du har två olika användare/lösenord. Ett till studentservern och ett till databassservern. De har samma användare men två olika lösenord.

Du är bekant med databasen MySQL och dess olika klienter, annars läser du först guiden "[Kom igång med databasen MySQL och dess klienter](kunskap/kom-igang-med-databasen-mysql-och-dess-klienter)".



Databasservern {#dbserver}
------------------------------

Databasservern heter `blu-ray.student.bth.se` och kör en MariaDB (MySQL) server. Du kan inte logga in direkt på servern, men du kommer åt databasen via olika klienter.



### Du har 1 databas {#end}

På servern har du *en (1) databas*, du har *inte* rättigheter att skapa fler databaser så du får samla alla dina tabeller i en databas. 

Databasen heter samma sak som din studentakronym.

I sådana sammanhang brukar man lägga till ett prefix framför tabellnamnet för att ha lite bättre koll på tabellerna, till exempel `labb1_skolan` och `labb2_student` där `labb1_` och `labb2_` skapar en form av *namespace*, en namnrymd, för dina tabeller. På det viset undviker du krockar om tabellerna blir många.



### Du har 1 användare {#ena}

Du har en fördefinierad användare och du kan inte skapa nya användare i databasen.



Klient MySQL CLU  {#clu}
------------------------------

Du kan logga in på studentservern `ssh.student.bth.se` med ditt studentkonto och starta upp kommandoradsklienten MySQL CLU (Command line Utility).

Använd ett terminalprogrammen (xterm, cygwin, putty) för att logga in på studentservern via ssh. Använd ditt vanliga studentlösenord.

**Logga in på studentservern via xterm.**

```bash
ssh mosstud@ssh.student.bth.se
```

Om du använder dbwebb-cli så kan du köra `dbwebb login`, vilket är samma sak som att logga in med ssh till studentservern.

[FIGURE src=/image/snapshot/bth-mysql-login-ssh.jpg?w=w1&q=60 caption="Logga in på studentservern med terminalprogram xterm."]

Nu kan du starta klienten och logga in mot databasen. Använd ditt lösenord för databasen.

**Koppla upp dig mot databasservern med klienten MySQL CLU.**

```bash
mysql -hblu-ray.student.bth.se -p
```

[FIGURE src=/image/snapshot/bth-mysql-login-bluray.jpg?w=w1&q=60 caption="Logga in på databasservern med kommandoradsklienten."]

Så här kan det se ut när jag loggar in på min databas.

[ASCIINEMA src=104465]

Mitt konto på databasservern (mos) skiljer sig från mitt konto på studentservern (mosstud), det är därför jag anger kommandoraden lite annorlunda i bilden (`-umos`). Skriv `mysql --help | more` eller `man mysql` för att se vad de olika parametrarna innebär.



Klient PHPMyAdmin  {#phpmyadmin}
------------------------------

På webbservern `www.student.bth.se` finns den webbaserade klienten phpmyadmin installerad. Du når den via följande länk:

* [http://www.student.bth.se/phpmyadmin](http://www.student.bth.se/phpmyadmin)

Logga in med din akronym och ditt lösenord till databasen.

[FIGURE src=/image/snapshot/bth-phpmyadmin.jpg?w=w1&q=60 caption="PHPMyAdmin finns tillgängligt via webbservern."]



Klient MySQL Workbench {#workbench}
------------------------------

Du kan ladda ned och installera klienten [MySQL Workbench](http://www.mysql.com/products/workbench/).

Om du finns **inom skolans nät** kan du skapa en vanlig koppling mot databasservern.

| Vad               | Ange                   |
|-------------------|------------------------|
| Connection method | Standard (TCP/IP)      |
| Hostname          | blu-ray.student.bth.se |
| Port              | 3306                   |
| Username          | Ditt konto på databasservern |
| Password          | Ditt lösenord till databasservern |


Om du sitter **utanför skolans nät** kan du skapa en SSH-tunnel via studentservern ssh.student.bth.se och på det sättet komma åt databasservern. Du behöver göra så eftersom porten 3306 är spärrad i skolans brandvägg.

| Vad               | Ange                     |
|-------------------|--------------------------|
| Connection method | Standard TCP/IP over SSH |
| SSH Hostname      | ssh.student.bth.se:22    |
| SSH Username      | Ditt konto på ssh.student |
| SSH Password      | Ditt lösenord            |
| MySQL Hostname    | blu-ray.student.bth.se   |
| MySQL Server Port | 3306                     |
| Username          | Ditt konto på databasservern |
| Password          | Ditt lösenord till databasservern |


Så här kan det se ut när du skapar en ny ssh-tunnel mot databasservern via studentservern.

[FIGURE src=/image/snapshot/bth-workbench-new-connection.jpg?w=w1&q=60 caption="Skapa koppling mot databasservern via en ssh-tunnel."]

Kikar du på bilden så ser du att jag har olika användarid:n på studentservern och på databasservern. Du har högst troligen samma id på båda servrarna.



Problem och lösningar med Workbench {#common}
------------------------------

Här följer ett par vanliga problem/lösningar som kan dyka upp med WorkBench.

[INFO]
**Felmeddelande: Connection using old (pre 4.1.1) authentication**

[FIGURE src=/image/snapshot/workbench-disable-secure-auth.jpg?w=300 class=right caption="Klicka för stor bild hur du gör inställningen."]

Detta är ett fel som inträffar i Workbench från och med version 6. Du kan behöva ändra inställning så att Workbench tillåter uppkoppling mot en databas som använder en äldre variant för hantering av lösenord. Se bilden hur du ändrar inställningen för detta. 
[/INFO]

[INFO]
[FIGURE src=/image/snapht14/workbench-ssh-keepalive.png?w=300 class=right caption="Klicka för stor bild hur du gör inställningen."]

**Tappar kopplingen - måste skriva in lösenordet hela tiden?**

Har du problem med att du hela tiden tappar kopplingen, när du kör via SSH-tunnel? Det kan lösas om du ställer du in ett värde på SSH KeepAlive. Då hålls din uppkoppling vid liv, även om du inte gör något. 

Gå till "Edit -> Preferences -> Advanced" och fyll i siffran 200 i fältet för SSH KeepAlive.
[/INFO]



Testa, lek och kom i gång {#testa}
------------------------------

Nu behöver du testa och se att allt fungerar. Om du är nybörjare så finns det här lite SQL-kod som du kan använda för att börja utforska dina klienter och databasen MySQL.

Starta upp din valda klient och gör dig redo att skriva lite SQL-satser.


```sql
--
-- This is a comment
-- 
DROP TABLE IF EXISTS Person;
CREATE TABLE IF NOT EXISTS Person 
(
    idPerson integer primary key, 
    namePerson char(20) default 'No Name',
    phonePerson char(20)
);

DELETE FROM Person;

SELECT * FROM Person;

INSERT INTO Person VALUES ('1', 'Mikael', '0457-385882');
INSERT INTO Person VALUES ('2', 'Tage', '0457-555 555');

SELECT namePerson, phonePerson FROM Person;

UPDATE Person SET namePerson = 'Harald' WHERE idPerson = 2;

SELECT * FROM Person;

DELETE FROM Person WHERE idPerson = 1;

SELECT * FROM Person;

SELECT * FROM Person WHERE namePerson = 'Harald';
```

Kopiera koden ovan och kör i din klient. Testa, lek och pröva. När du får felmeddelande så läs dem noga, de ger bra ledtråd till felet och lösningen. 

Så här kan det se ut i Workbench.

[FIGURE src=/image/snapshot/workbench-test-sql.jpg?w=w1&q=60 caption="Testa och lek i Workbench."]



Avslutningsvis {#avslutning}
------------------------------

Nu vet du hur du kan jobba med BTH's labbmiljö för MySQL och dess olika klienter.

Frågor och kommentarer tar vi i forumet, det finns en [egen tråd för denna artikel](t/6264).
