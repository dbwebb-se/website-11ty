---
author:
    - mos
revision:
    "2017-12-05": "(A, mos) Första utgåvan."
...
Kmom06: Egen modul
==================================

Som en del i infrastrukturen kring JavaScript finns pakethanteraren npm som erbjuder en hantering av återanvändbara moduler och färdiga program. Från början var npm utvecklat i samband med att Node.js växte fram. Numer ser vi både färdiga program, klient- och server-moduler som distribueras via npm.

Vi dedikerar detta kursmoment till att forma en egen modul som publiceras på npm och som sedan återanvänds i din applikation.

<!--more-->

Du väljer själv en mindre del av din applikation som skall formas som en egen modul med eget Git-repo på GitHub med enhetstester och CI-kedja samt publicering på npm. Därefter kan du åter installera och använda modulen som en fristående modul i din applikation.

[FIGURE src=image/snapht17/modulecounts.png?w=w3 caption="Jämförelse mellan antal paket på tre olika modulbibliotek för JavaScript, Python och PHP. Bild från [Module counts](http://www.modulecounts.com/)."]

I bilden ovan ser vi den exponentiella tillväxten av paket som publicerats på npm sedan starten.

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*



###Material {#material}

Kika igenom följande material.

1. Jämför tillväxten och omfattningen för olika modulbibliotek för olika programmeringsspråk via webbtjänsten [Module Counts](http://www.modulecounts.com/). Det är bara för att ge dig en känsla för omfattningen av moduler på npm, jmfört med andra programmeringsspråk.

1. Kika igenom webbplatsen för [npm](https://www.npmjs.com/) och se hur den presenterar npm-paket. Skapa ett konto på webbplatsen och förbered dig att skapa en modul.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-15 studietimmar)*


<!--
###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Publicera en kodmodul på npm](kunskap/XXX)" för att se hur man publicerar moduler till npm och hur man sedan återanvänder dem i sin kod.
-->



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Publicera en modul till NPM](uppgift/publicera-en-modul-till-npm)". Du skall bekanta dig med npm genom att publicera en av dina moduler som ett npm-paket. Modulen du väljer måste du återanvända i din applikation. Du jobbar i `me/app` och eventuellt i fler underkataloger/repon. Din modul kan ha ett eget repo under `me/module` om du så väljer.

1. Gör uppgiften "[Färdigställ din redovisa-sida i ramverk2](uppgift/fardigstall-din-redovisa-sida-i-ramverk2)". Det handlar mest om att dokumentera hur din redovisa-sida fungerar samt lägga till npm run-skript om det saknas.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i detta inledande momentet då redovisningstexten är mer omfattande än du är van vid.

Se till att följande frågor besvaras i texten:

* Reflektera över vikten av infrastruktur för moduler för ett programmeringsspråk.
* Vill du ge dig på att förklara att just npm är den tjänsten som växt snabbast av de modulerkataloger som presenteras på webbplatsen "Module Counts"?
* Reflektera över hur arbetet gick att välja, separera, publisera och sedan åter integrera module i din applikation.
* Sista uppgiften om att dokumentera och färdigställa redovisa-sidan, tog det mycket tid eller hade du allt klart?

Har du frågor eller funderingar så ställer du dem i forumet.
