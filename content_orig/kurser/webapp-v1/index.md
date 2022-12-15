---
title: webapp-v1

author: mos
revision:
    "2017-04-26": (F, mos) Fixa länkar till webapp-v1.
    "2015-12-11": (E, mos) Inklusive kmom06 och översyn av syftet.
    "2015-12-04": (D, mos) Inklusive kmom05.
    "2015-11-23": (C, mos) Inklusive kmom03 & 04.
    "2015-10-26": (B, mos) Inklusive kmom01 & 02.
    "2015-03-02": (A, mos) Första revisionen inför kursstart HT2015.
...
Kursen webapp (v1)
==================================

Kursen **Webbapplikationer för mobila enheter**, a.k.a. *webapp*, lär dig hur du bygger applikationer för mobila enheter och läsplattor med HTML, CSS och JavaScript.

[INFO]
**Tidigare version av kursen**

Dett är version 1 av kursen webapp.

Från och med vårterminen 2017 läsperiod 4 finns en ny version av kursen, version 2. Kursmaterialet till [den nya kursen finns här](kurser/webapp-v2).

Om du har påbörjat version 1 så skall du avsluta den och dess kursmoment, eller kan du välja att gå om webapp-v2 från början.
  
[/INFO]



<!--more-->

Kursen syftar till att lära ut utveckling av webbapplikationer med HTML, CSS och JavaScript och fokuserar på mobila enheter och läsplattor.

Kursen går igenom konstruktioner i HTML, CSS och JavaScript som hjälper dig bygga applikationer som är oberoende av skärmens storlek och enhetens styrning (mus, touchscreen, penna, tangentbord).

Du bygger en applikation som använder sig av HTML, CSS och JavaScript på klientsidan <strike>och JavaScript med Node.js på server-sidan</strike> och du jobbar med RESTful API:er och JSON-data för att bygga både webappar och hybrid webappar. <strike>Du skapar ett RESTful API som applikationen använder för att komma åt information på serversidan.</strike>

Via litteraturstudier och praktiska övningar förkovrar du dig i området. I slutet av kursen får du visa dina färdigheter i ett praktiskt programmeringsprojekt där allt integreras.



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> Kunskaper som omfattar avklarade kurser motsvarande minst 15hp i programmering med JavaScript för både klientsidan och serversidan samt HTML och CSS.



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* HTML5, CSS3, JavaScript med mobilt fokus.
* CSS3 för att styla webbapp som en "native app".
* Mobilen och läsplattan som test och utvecklingsmiljö.
* Touch-event.
* Responsive design, storlekar, landskap, portätt.
* Koppling mot server och databas.
* <strike>Skapa RESTful API med JavaScript och Node.js.</strike>
* Jobba med RESTful API:er och JSON.
* Mobil prestanda och tillgänglighet.
* <strike>Att använda hårdvarufunktioner som är specifika på mobila enheter, tex positionering och kartor.</strike>
* Jobba med webappar och hybrid webapp för att komma åt hårdvarunära funktioner.
* Felsökning och tekniker att debugga sitt program.
* Utvecklingsmiljö och verktyg för utveckling av mobila appar.



Mål {#mal}
------------------------



###Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* påvisa grundläggande förståelse för utveckling av mobila applikationer med valda tekniker genom att skriftligen beskriva och sammanfatta erfarenheter och observationer från övningar och projekt.
* påvisa goda kunskaper i att skapa mobila appar, med HTML, CSS och JavaScript, genom att tillämpa dessa tekniker i praktiska övningar och projekt.
* påvisa goda kunskaper i att använda JavaScript på serversidan tillsammans med Node.js genom att tillämpa dessa tekniker i praktiska övningar och projekt.



###Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* självständigt utveckla, dokumentera och presentera ett projekt baserat på utveckling av en mobil app med både klient- och server-kod.
* ha god praktisk förmåga att hantera de verktyg och miljöer som används vid utveckling och felsökning av mobila appar med valda tekniker.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: En mobil webapp i HTML {#kmom01}

Tanken är att komma igång med utveckling av mobila applikationer. De mobila applikationerna utvecklar vi med tekniker baserade på HTML, CSS och JavaScript och vi kallar dem för mobila webbapplikationer. Som ett första steg så läser vi på om grunderna och vi bygger en me-app med fokus på mindre terminaler.

[Instruktion till kursmoment 01](webapp-v1/kmom01).



###Kmom02: Bygg ut din mobila webapp {#kmom02}

Vi har en me-app, från föregående kursmoment, som är utvecklad mot mobila enheter. Men med mobila terminaler finns det en del som är specifikt och skiljer sig från desktop miljöer. Låt oss bygga vidare på me-appen och testa runt för att se vilka möjligheter och begränsningar som kan finnas. Det blir en blandning av olika tekniker men fokus är att lära oss mer om den mobila utvecklingsmiljön.


[Instruktion till kursmoment 02](webapp-v1/kmom02).



###Kmom03: JSON och RESTful {#kmom03}

Vi jobbar vidare med meappen och jQueryMobile. Nu handlar det om tekniken att hämta JSON data från RESTful servrar via Ajax och hur man kan hantera den informationen i en klientfokuserad webapp.

Kanske når vi en gräns där vi tycker att ett ramverk likt jQm börjar inkränka på vår kod-arkitektur? Eller så är vi nöjda med hur jQm hanterar detta. Låt se.

På vägen tar vi och övar att söka och visa information i JSON-filer.

[Instruktion till kursmoment 03](webapp-v1/kmom03).



###Kmom04: SPA och MVC {#kmom04}

Vi använt jQuery Mobile en del, låt oss nu titta på ett alternativ till att skriva klientfokuserad kod. Jag väljer att titta på ramverket Mithril som är ett ungt och inte alltför stort JavaScript-ramverk med fokus på klientbaserad programmering.

Mithril erbjuder en kodstruktur som är likt *model, view, controller (MVC)* som är en ofta använd design arkitektur. Vi prövar hur en lösning motsvarande meappen kan se ut med Mithril, därefter utvärderar vi och jämför med jQuery Mobile.

[Instruktion till kursmoment 04](webapp-v1/kmom04).



###Kmom05: Litet projekt {#kmom05}

Du skall nu utföra ett mindre projekt till en kund. Du får själv välja vilken teknik du jobbar med -- jQuery Mobile eller Mithril. Detta kursmoment är friare i sin utformning och det gäller att själv tänka till när det gäller val av teknik, prioritera kraven och tänka till vad kunden egentligen vill ha.

[Instruktion till kursmoment 05](webapp-v1/kmom05).



###Kmom06: Hybrid webapp {#kmom06}

Du tar din nyligen utvecklade webapp och gör den till en hybrid webapp som går att installera på enheter likt en vanlig native app.

[Instruktion till kursmoment 06](webapp-v1/kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](webapp-v1/kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?

Det finns en [översikt av kurslitteratur per kurs](kunskap/oversikt-av-kurslitteratur-per-kurs).



###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande bok, tillsammans med ett antal artiklar som finns tillgängliga på nätet.

Det finns läsanvisningar i samband med varje kursmoment.


* **[Mobile HTML5](kunskap/boken-mobile-html5)** -- Estelle Weyl
  Boken går igenom de delar av HTMl5, CSS3 och JavaScript som är relevanta när man bygger applikationer för mobila enheter.



###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter.


* **[HTML och CSS-boken](boken-html-och-css-boken)** -- Rolf Staflin
  En stabil bok för att komma igång med HTML och CSS.

* **[JavaScript: The definitive Guide](kunskap/boken-javascript-the-definitive-guide)** -- D. Flanagan
  En tegelsten, komplett med allt du vill veta om språket JavaScript med dess Core, DOM och eventhantering, inklusive en referens till olika funktioner. Perfekt för dig som verkligen vill JavaScript.

* **[JavaScript: The Good Parts](kunskap/boken-javascript-the-good-parts)** -- D. Crockford
  En genomgång av JavaScript Core och hur man ska, och inte ska, skriva sin kod.





Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment.

| Kursmoment | Mobile HTML5  |
|------------|-------------------------------------------------------------|
| Kmom01     | 1                                                           |
| Kmom02     | 5, 6                                                        |
| Kmom03     | 11, 12                                                      |
| Kmom04     | 13, 14                                                      |
| Kmom05     |                                                             |
| Kmom06     | Introduction                                                |
| Kmom10     |                                                             |

Dessutom har varje kursmoment läsanvisningar i artiklar och videos.



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

För dig som studerar på distans finns det en [rekommenderad studieplan](webapp/studieplan). Du kan behöva anpassa den rekommenderade planen till dina egna datum och förutsättningar.

Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webutv#studieplan).

Går du på campus får du en lektionsplan i samband med kursstart.

Det finns ett särskilt dokument som ger lite [utförligare beskrivning av planeringen av kursen och viktiga hållpunkter](kurser/lektionsplan-och-rekommenderad-studieplan).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning).



Lärarstöd och handledning {#handledning}
----------------------------------------

I distanskurserna är forum och chatt de viktigaste källorna för handledning. Vi har samlat information om handledning och hjälp-till-självhjälp i ett eget dokument.

Läs om hur [handledning och hjälp-till-självhjälp fungerar på dessa kurser](kurser/lararstod-och-handledning).



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [jag jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden DV1546 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1546).
