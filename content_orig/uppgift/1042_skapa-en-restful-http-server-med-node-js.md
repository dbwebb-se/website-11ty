---
author: mos
category:
    - javascript
    - nodejs
    - kursen dbjs
revision:
    "2017-02-14": (F, mos) Kopierad till dbjs, men utan bash-delen.
    "2017-02-06": (E, mos) Extrauppgift om bättre kodstruktur.
    "2016-07-04": (D, mos) Default port skall vara 1337 och la till exempel om hur servern dödas med pid.
    "2015-10-16": (C, mos) Lade till krav på servern om LINUX_PORT och klienten om LINUX_PORT + LINUX_SERVER samt krav om att servern skall skriva sitt pid till fil.
    "2015-09-24": (B, mos) Tog bort det andra kommandot date i 1.5.
    "2015-08-13": (A, mos) Första utgåvan i samband med kursen linux.
...
Skapa en RESTful HTTP-server med Node.js (server)
==================================

Du skriver en HTTP-server i Node.js som fungerar som en RESTful server. För att visa att servern fungerar så använder du webläsaren som klient.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Bygg en RESTful server med Node.js](kunskap/bygg-en-restful-server-med-node-js)".

Du har även läst igenom artiklarna "[Skicka environment variabler till Node.js](kunskap/skicka-environment-variabler-till-nodejs)" och "[Spara serverns processid i en fil](kunskap/spara-serverns-processid-i-en-fil)".



Introduktion {#intro}
-----------------------

När du testkör din server så kan du antingen använda din webbläsare eller kommandot `curl`.

Om du startar servern på din lokala dator så blir dess adress enligt följande:

I webbläsaren: `http://localhost:1337/`.

Via `curl`:

```bash
$ curl http://localhost:1337/
```

Om du inte får localhost att fungera så kan du pröva att byta ut det mot ip-adressen 127.0.0.1.



Krav {#krav}
-----------------------

1\. Skriv ett *main-program* som startar din server, döp det till `index.js`. 

2\. Skriv en server och spara den i filen `server.js`. Du får gärna dela upp servern i fler moduler och filer.

3\. Ditt program skall läsa av environment-variabeln `LINUX_PORT` och, om variabeln är definierad, använda dess innehåll för att starta servern på just den porten. Standardport är annars 1337.

4\. Ditt program skall skriva sitt PID till en fil som heter `pid`. När man kör kommandot `kill $( cat pid )` (eller motsvarande på Cygwin) så skall din server stängas ned.

5\. Ditt program skall svara på routen `/` med strängen "Hello World!" enligt content type `text/plain`.

6\. Skapa en fil `index.html` med innehållet "This is the file index.html.". På routen `/index.html` skall filens innehåll levereras enligt content type `text/html`.

7\. På routen `/status` skall servern ge ett JSON-objekt, content type `application/json`, som innehåller utskriften av kommandot `uname -a` enligt strukturen:

```javascript
{
    "uname": "Den riktiga utskiften av kommandot uname -a"
}
```

8\. På routen `/sum` skall servern summera alla argument som kommer i querystring efter enligt `/sum?2&3` skall ge svaret 5 i en JSON struktur `{ "sum": 5 }` enligt `application/json`. Routern skall klara oändligt antal parametrar i querystringen.  

9\. På routen `/filter?value1&value2&value3` skall servern filtrera bort alla värden som är större än 42. De kvarvarande värdena skall samlas i en array och skickas tillbaka i svaret i ett JSON-objekt. Till exempel så ger routen `/filter?1&2&3&42&99` svaret:

```javascript
{
    "filter": [1, 2, 3, 42]
}
```

10\. Alla andra routes skall svaras med statuskod 404 och "The resource does not exists."

11\. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kursrepot
dbwebb publish server
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter för att träna mer.

1. Se till att du använder moduler för att organisera din JavaScript-kod. Du kan lägga dina route callbacks i en egen modul och du kan flytta utility funktioner till en egen modul (de som hanterar environmentvariabler och skriver PID till fil).



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
