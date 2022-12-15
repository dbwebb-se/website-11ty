---
author:
    - mos
revision:
    "2017-11-13": "(B, mos) Uppdatera var koden kan sparas samt redovisningsfråga om enhetstester i Docker."
    "2017-11-03": "(A, mos) Första utgåvan."
...
Kmom03: Test
==================================

Vi orienterar oss kring olika tekniker och termer inom test och samtidigt bygger vi upp grunden i en testmiljö för JavaScript. Det handlar främst om enhetstestning och kodtäckning samt basen för en CI-kedja (Continuous integration).

Det blir också en introduktion i hur vi kan använda Docker för att köra våra enhetstester mot olika versioner av en målmiljö och vi får möjligheten att skapa våra egna anpassade Docker-images.

Vi påbörjar samtidigt grunden till en klient/server applikation i JavaScript som vi under resten av kursen bygger vidare på och använder för att testa och utvärdera olika aspekter av JavaScript i ramverk.

Du får möjligheten att pröva på testdriven utveckling genom att utveckla testfallen innan du skriver koden.

<!--more-->

[FIGURE src=image/snapht17/mocha-nyc-codecoverage.png?w=w2 caption="Kodtäckningen är på 100% i vårt exempel."]

Tänk dig in i rollen som systemarkitekt på ett företag där du är den som gör teknikvalen till nästa projekt. Du skall göra teknikval som hela ditt utvecklargäng sedan skall använda. Tänk så, det blir en bra attityd inför kursmomentet.



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*



###Material {#material}

Kika igenom följande material.

1. Webbplatsen för [Mocha](https://mochajs.org/) ger dig en översikt av ett verktyg för att testa din JavaScript-kod med enhetstester. Du skall själv välja ett eget testverktyg att använda, Mocha är en av möjligheterna.

1. Verktyget [Istanbul](https://istanbul.js.org/) kan kopplas till Mocha för att hantera kodtäckning vid enhetstester. 

1. Det finns en forumtråd med tips om [artiklar för testning](t/6984). Kika där för inspiration.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Kom igång med en testmiljö i JavaScript](kunskap/kom-igang-med-en-testmiljo-i-javascript)" för att komma igång med tester och en testmiljö. Spara dina exempelprogram i `me/kmom03/unittest`.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Integrera en testmiljö med JavaScript i me-sida och Express](uppgift/integrera-en-testmiljo-med-javascript-i-me-sida-och-express)". Det handlar om att integrera enhetstester, kodtäckning och en CI-kedja i din me-sida. Spara allt under `me/redovisa`.

1. Gör uppgiften "[Bygg en klient/server applikation i JavaScript](uppgift/bygg-en-klient-server-applikation-i-javascript)". Spara koden i eget repo under `me/app`.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i detta inledande momentet då redovisningstexten är mer omfattande än du är van vid.

Se till att följande frågor besvaras i texten:

* Berätta vilka tekniker/verktyg du valde för enhetstester och kodtäckning och varför?
* Berätta om cin CI-kedja och reflektera över de valen du gjorde?
* Reflektera över hur det gick att integrera enhetstesterna i olika Docker-kontainerns och om du ser någon nytta med detta. 
* Hur väl lyckades du utvärdera TDD-konceptet och vilka är dina reflektioner?
* Berätta om tankarna kring din klient/server applikation och nämn de tekniker du använder.

Har du frågor eller funderingar så ställer du dem i forumet.
