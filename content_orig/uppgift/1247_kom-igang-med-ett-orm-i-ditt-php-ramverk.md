---
author: mos
category:
    - kurs mvc
revision:
    "2021-04-26": "(A, mos) Första utgåvan."
...
Kom igång med ett ORM i ditt PHP-ramverk
===================================

Du har sedan tidigare valt ett ramverk och byggt en applikation i det. Nu är det dags att koppla en databas till din applikation. Detta skall ske via ett ORM som du själv väljer.

Du kommer att få tips om de vanligaste kombinationerna av ORM och ramverk. Du kan också välja att fortsätta med "ditt egna ramverk" och välja ett ORM att integrera tillsammans med det.

Databasmodellen du skall implementera är enkel, det handlar bara om ett fåtal tabeller. Tanken är att vi fokuserar mer på att få grunderna i ORM att falla på plats i din applikationskod.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har sedan tidigare ett PHP-ramverk installerat med en egenutvecklad applikation.



<!--
Genomgång {#genom}
------------------------

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.



### Välj utgångsläge för din kodbas {#kodbas}

Till denna uppgiften kan du välja att fortsätta på din A) kodbas från kmom04 med ramverket eller från B) kmom03 med "ditt egna ramverk".

Om du väljer att fortsätta med ramverket (A) så är följande ORM ett normalt val utifrån det ramverk du valt då ramverken kommer med visst inbyggt stöd för ett ORM.

* Laravel: Eloquent ORM
* Symfony: Doctrine ORM
* Yii: Inbyggd databasmodul med stöd för Active Record
* Laminas (mezzio): Egna databaskomponenter med stöd för Active Record

Om du väljer att fortsätta bygga din kod (B) på den kodbas du hade i kmom03 så kan du fritt välja din ORM modul. Följande förslag finns då men du kan göra ett annat aktivt val.

* Doctrine ORM
* RedBeanPHP ORM
* Propel ORM

Du finner [läsanvisningar i kursmomentet mvc/kmom05](kurser/mvc-v1/kmom05#resurser).



### Spara filerna i me {#me}

Alla filerna sparar du i ditt kursrepo under `me/orm/` (skapa katalogen om den inte finns).

Börja med att kopiera över samtliga filer från din valda existerande kodbas.

Om du väljer kmom04 som kodbas.

```
# Stå i rooten av kursrepot
rsync -a me/framework/ me/orm/
```

Om du väljer kmom03 som kodbas.

```
# Stå i rooten av kursrepot
rsync -a me/game/ me/orm/
```



### Git och GitHub/GitLab {#git}

Du fortsätter att jobba med den kodbas du valt och den har redan kopplingar mot Git och GitHub/GitLab.



Krav {#krav}
-----------------------

Kraven är uppdelade i sektioner.



### Integrera med ORM {#integrera}

1. Installera ditt valda ORM och inkludera det i din kodbas.

1. Skapa en databas som innehåller en tabell med böcker. Lägg in minst tre böcker (riktiga eller påhittade) med deras titel, ISBN och författare samt en bild som representerar boken.

1. Skapa en webbsida, i din valda kodbas, där man kan se innehållet för alla böcker.

1. Det skall finnas ett menyval i din webbplats som leder till denna exempelsida.

<!--
1. Knapp för att lägga till slumpmässig data till tabellen så att man kan testa den. Samt knapp för att återställa.
-->



### Bygg din applikation mot ett ORM {#app}

1. Jobba vidare med dina spel för Yatzy och/eller 21 och skapa en Highscore-lista som sparar "de bästa" från spelomgångarna. Du kan själv välja exakt hur det skall fungera.

1. Det skall finnas ett menyval i din webbplats som leder till din HighScore sida.



### Publicera {#publicera}

1. När du är klar, kör `make test` för att köra alla testerna mot ditt repo. När man kör `make test` så bör det passera utan allvarliga felmeddelanden.

1. Dubbelkolla att webbplatsen fungerar på studentservern genom att göra en `dbwebb publishpure me` och testköra den.

1. Committa alla filer till ditt repo och lägg till en ny tagg (5.0.\*). Öka versionnumret om du lägger till ändringar (5.0.1, 5.0.2 och så vidare). Rättaren kommer normalt sett att använda din senaste tagg som är >= 5.0.0 och < 6.0.0. **Notera** att det är tagg version 5 som vi använder i detta kmom, oavsett vilka taggar du använt tidigare.

1. Pusha upp repot till GitHub/GitLab, inklusive taggarna.



<!--
Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

test

make, validators

21, yatzy

-->



Tips från coachen {#tips}
-----------------------

Använd de manualer och lärresurser som varje ORM leverantör och ramverk erbjuder.

Lycka till och hojta till i chatt och forum om du behöver hjälp!
