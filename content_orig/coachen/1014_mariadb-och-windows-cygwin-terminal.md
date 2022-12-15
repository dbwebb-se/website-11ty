---
author: mos
category:
    - databas
    - mysql
    - windows
revision:
    "2022-01-20": "(B, mos) Förtydligande om vilket alternativ som rekommenderas."
    "2021-12-21": "(A, mos) Flyttat till eget dokument."
...
MariaDB klient och Windows med cygwin terminalen
==================================

[FIGURE src=image/mariadb/2021/windows/mysql-klient-cygwin.png?w=c5 class="right"]

Vi sätter upp en miljö där vi kan köra terminalklienten för mariadb i Cygwin-terminalen i Windows.

<!--more-->



Förberedelse {#prep}
--------------------------------------

Du har installerat databasen MariaDB i Windows 10 och du kan koppla upp dig mot den med en terminalklient.

Du kan hantera Cygwin terminalen.

Det finns två olika alternativ att installera.

Alternativ 1 innebär att du redan har lagt terminalklienten i din PATH.

Alternativ 2 innebär att du använder pakethanteraren apt-cyg.



Installera terminalklienten i Cygwin {#alt}
--------------------------------------

Du har två alternativ för att köra terminalklienten för mariadb i Cygwin.

Antingen använder du den klienten för "mariadb" som du har installerat i Windows. Du behöver bara lägga den i sökvägen så att du enkelt når den oavsett i vilken katalog du står.

Eller så installerar du en separat klient direkt i Cygwin och då kan du installera klienten "mysql" med pakethanteraren apt-cyg.



Alternativ 1: Använd terminalklienten mariadb i Cygwin {#mariadb}
--------------------------------------

_I kursen databas är detta det rekommenderade alternativet eftersom du redan kan köra terminalklienten i Windowsklienten cmd._

Förutsatt att du har placerat installationskatalogen för MariaDB i din PATH så kan du starta terminalklienten på samma sätt som du gör i Windows cmd terminal.

```text
mariadb -udbadm -pP@ssw0rd
```

Du kan även prova så här.

```text
mariadb -udbadm -p
```

Det kan se ut så här.

[FIGURE src=image/mariadb/2021/windows/mariadb-cygwin-via-windows.png?w=w3 caption="Startar terminalklienten för mariadb i Cygwin."]



Alternativ 2: Installera terminalklienten mysql i Cygwin {#mysql}
--------------------------------------

Du kan göra en lokal installation av terminalklienten "mysql" i Cygwin med pakethanteraren apt-cyg.

```text
apt-cyg install mysql
```

När installationen är klar kan du starta terminalklienten.

```text
mysql -udbadm -pP@ssw0rd -h127.0.0.1
```

Det kan se ut så här.

[FIGURE src=image/mariadb/2021/windows/mysql-klient-cygwin.png?w=w3 caption="Startar terminalklienten för mysql i Cygwin."]

Vi behöver ange hosten till 127.0.0.1 för att tvinga klienten att koppla sig på rätt sätt till databasservern.
