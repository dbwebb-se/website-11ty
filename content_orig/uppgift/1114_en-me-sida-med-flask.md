---
author: lew
revision:
    "2020-01-23": (D, aar) Tog bort krav om att spara redovisningstext i json filen.
    "2020-01-18": (C, aar) Uppdaterade kraven för vad som ska finnas i Person objektet och spara data som json.
    "2018-11-21": (B, aar) La till krav om venv inför VT19.
    "2017-11-10": (A, lew) Updated version for VT18.
category:
    - oopython
...
Skapa en me-sida med Python och Flask
===================================

Använd microramverket Flask för att skapa en webbapplikation (alt. me-sida).

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom övningen "[Flask och Jinja2](kunskap/flask-med-jinja2)".

Du har gått igenom artikeln "[Kom igång med objekt](kunskap/kom-igang-med-objekt)".

Du har också gjort din [Flask applikation körbar via CGI](coachen/flask-som-cgi-script).

Har du gjort övningarna har du nästan kommit i mål med uppgiften.



Introduktion {#intro}
-----------------------

Vi ska skapa en me-sida med hjälp av ett microramverk i Python. Utgå ifrån övningen. Glöm inte att aktivera `venv` innan du startar Flask servern, detta behövs bara lokalt!



Krav {#krav}
-----------------------

Startfilen ska heta `app.py` och ska ligga i mappen `me/flask` och vara körbar via `app.cgi`. `app.cgi` behöver bara fungera på studentservern.

1. Du har installerat modulerna Flask och Jinja2 i en [virtuell miljö](kunskap/python-virtuel-miljo).

1. Applikationen ska använda Bootstrap.

1. Applikationen ska ha minst tre sidor, index.html, about.html och redovisning.html.

1. header.html och footer.html ska inkluderas med Jinja2.

1. Skapa filen `person.py`, vilken ska innehålla klassen `Person`, som ska användas i din me-sida. Fyll på klassen med följande information:
    * Förnamn
    * Efternamn
    * Födelsedatum (gör attributet privat)
    * länk till en bild som används
    * En metod som räknar ut ålder från födelsedatumet och returnerar åldern.
    * Godtyckliga metoder för skapa strängar som kan användas på me-sidan.

1. Hårdkoda inte datan som utgör ett Person objekt i din kod. Spara den istället i en JSON fil som läses upp när man startar `app.py` och skapa ett objekt med den datan.

1. index.html ska innehålla minst
    * en bild
    * Någon form av välkomsttext, använd dig av ett objekt från personklassen för att få informationen. 

1. redovisning.html ska innehålla
    * Dina redovisningstexter för kursmomenten

1. about.html kan innehålla något om kursen och vilka tekniker du jobbar i, det kan vara bra att visa upp när du är klar med kursen.

1. Validera och publicera applikationen på studentservern.


<!-- 5. Applikationen ska använda port 5000 -->

```bash
# Ställ dig i kurskatalogen
dbwebb validate flask
dbwebb publish flask
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Lär dig felsöka med debuggern, använd den när du får problem. Komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
