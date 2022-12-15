---
author: mos
category:
    - javascript
    - nodejs
revision:
    "2017-02-06": (E, mos) Extrauppgift om bättre kodstruktur.
    "2016-07-04": (D, mos) Default port skall vara 1337 och la till exempel om hur servern dödas med pid.
    "2015-10-16": (C, mos) Lade till krav på servern om LINUX_PORT och klienten om LINUX_PORT + LINUX_SERVER samt krav om att servern skall skriva sitt pid till fil.
    "2015-09-24": (B, mos) Tog bort det andra kommandot date i 1.5.
    "2015-08-13": (A, mos) Första utgåvan i samband med kursen linux.
...
Skapa en RESTful HTTP-server med Node.js och klient i Bash
==================================

Du skriver en HTTP-server i Node.js som fungerar som en RESTful server. För att visa att servern fungerar så skapar du en klient som anropar serverns olika tjänster.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Bygg en RESTful server med Node.js](kunskap/bygg-en-restful-server-med-node-js)".

Du har även läst igenom artiklarna "[Skicka environment variabler till Bash och Node.js](kunskap/skicka-environment-variabler-till-bash-och-node-js)" och "[Spara serverns processid i en fil](kunskap/spara-serverns-processid-i-en-fil)".



Introduktion {#intro}
-----------------------

Spara dina lösningar i katalogen `me/kmom04/server` i ditt kursrepo.



Krav {#krav}
-----------------------



###Del 1 servern {#server}

1\. Skriv ett *main-program* som startar din server, döp det till `index.js`. Din server skall läsa av environment-variabeln `LINUX_PORT` och, om variabeln är definierad, använda dess innehåll för att starta servern på just den porten. Standardport är annars 1337.

2\. Din server skall skriva sitt pid till en fil som heter `pid`. När man kör kommandot `kill $( cat pid )` så skall din server stängas ned.

3\. Skriv en server och spara den i filen `server.js`.

4\. Din server skall svara på routen `/` med strängen "Hello World!" enligt content type `text/plain`.

5\. Skapa en fil `index.html` med innehållet "This is the file index.html.". på routen `/index.html` skall filens innehåll levereras enligt content type `text/html`.

6\. På routen `/status` skall servern ge ett JSON-objekt, content type `application/json`, som innehåller utskriften av kommandot `uname -a` enligt strukturen:

```javascript
{
    "uname": "Utskriften av kommandot uname -a"
}
```

7\. På routen `/sum` skall servern summera alla argument som kommer i querystring efter enligt `/sum?2&3` skall ge svaret 5 i en JSON struktur `{ "sum": 5 }` enligt `application/json`. Routern skall klara oändligt antal parametrar i querystringen.  

8\. På routen `/filter?value1&value2&value3` skall servern filtrera bort alla värden som är större än 42. De kvarvarande värdena skall samlas i en array och skickas tillbaka i svaret i ett JSON-objekt. Till exempel så ger routen `/filter?1&2&3&42&99` svaret:

```javascript
{
    "filter": [1, 2, 3, 42]
}
```

9\. På alla andra routes skall svaras med statuskod 404 och "The resource does not exists."



###Del 2 klienten {#klient}

1. Skapa en klient till din server, lägg den i filen `client.bash`. Skriv klienten i Bash. 

1. Skriptet skall läsa av environment-variabeln `LINUX_PORT` och, om variabeln är definierad, använda dess innehåll som portnummer att koppla upp sig mot. Standardvärde skall vara 1337.

1. Skriptet skall läsa av environment-variabeln `LINUX_SERVER` och, om variabeln är definierad, använda dess innehåll som adress till servern. Standardvärde skall vara localhost.

1. Kommandot `./client.bash hello` skall anropa serverns route `/`, med `curl` eller `wget`, och skriva ut svaret.

1. Kommandot `./client.bash html` skall anropa serverns route `/index.html` och skriva ut svaret.

1. Kommandot `./client.bash status` skall anropa serverns route `/status` och skriva ut svaret.

1. Kommandot `./client.bash sum 2 3 4` skall använda serverns route `/sum` för att beräkna summan av talen. Man kan skicka med valfritt antal tal.

1. Kommandot `./client.bash filter 2 3 4` skall använda serverns route `/filter`. Man kan skicka med valfritt antal tal.

1. Kommandot `./client.bash 404` skall använda en godtycklig felaktig route och ge samma svar som servern ger. Här skall du även visa innehållet i header-delen av svaret (`curl -I`).

1. Kommandot `./client.bash all` skall utföra samtliga ovan nämna kommandon i en följd och visa vilket kommando som utförs och svaret som ges. Gör en snygg utskrift så det blir överskådligt.



###Validera och publicera {#validate}

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb publish server
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter för att träna mer.

1. Se till att du använder moduler för att organisera din JavaScript-kod. Du kan lägga dina route callbacks i en egen modul och du kan flytta utility funktioner till en egen modul (de som hanterar environmentvariabler och skriver pid till fil).



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
