---
title: webapp-v2

author: mos
revision:
  "2017-03-17": (F, efo) Förberedelser inför webapp-v2.
  "2015-12-11": (E, mos) Inklusive kmom06 och översyn av syftet.
  "2015-12-04": (D, mos) Inklusive kmom05.
  "2015-11-23": (C, mos) Inklusive kmom03 & 04.
  "2015-10-26": (B, mos) Inklusive kmom01 & 02.
  "2015-03-02": (A, mos) Första revisionen inför kursstart HT2015.
...
Kursen webapp (v2)
==================================

Kursen **Webbapplikationer för mobila enheter**, a.k.a. *webapp*, lär dig hur du bygger applikationer för mobila enheter och läsplattor med HTML, CSS och JavaScript.

<!--more-->

Kursen syftar till att lära ut utveckling av webbapplikationer med HTML, CSS och JavaScript och fokuserar på mobila enheter och läsplattor.

Kursen går igenom konstruktioner i HTML, CSS och JavaScript som hjälper dig bygga applikationer som är oberoende av skärmens storlek och enhetens styrning (mus, touchscreen, penna, tangentbord).

Du bygger en applikation som använder sig av HTML, CSS och JavaScript på klientsidan och du jobbar med RESTful API:er och JSON-data för att bygga både webappar och hybrid webappar.

Via litteraturstudier och praktiska övningar förkovrar du dig i området. I slutet av kursen får du visa dina färdigheter i ett praktiskt programmeringsprojekt där allt integreras.



[INFO]
**Tidigare/Nyare version av kursen**

Från och med vårterminen 2018 gäller version 3 av denna kursen, [webapp-v3](kurser/webapp-v3).

Denna versionen av kursen (webapp-v2) gick under vårterminen 2017.

Fram till och med höstterminen 2016 gällde version 1 av kursen, [webapp-v1](kurser/webapp-v1).

Om du påbörjat den äldre version av kursen så skall du också slutföra denna versionen av kursen (eller göra om den nya kursen från start).
[/INFO]



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
* Jobba med RESTful API:er och JSON.
* Mobil prestanda och tillgänglighet.
* Att använda hårdvarufunktioner som är specifika på mobila enheter, tex splash-screens, logotyper och filhantering.
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


###Kmom01: En mobil webapp i mithril {#kmom01}

Tanken är att komma igång med utveckling av mobila applikationer. De mobila applikationerna utvecklar vi med tekniker baserade på HTML, CSS och JavaScript och vi kallar dem för mobila webbapplikationer. Som ett första steg så läser vi på om grunderna och vi bygger en me-app med fokus på mindre terminaler.

[Instruktion till kursmoment 01](webapp-v2/kmom01).



###Kmom02: Bygg ut din mobila webapp {#kmom02}

Vi har en me-app, från föregående kursmoment, som är utvecklad mot mobila enheter. I detta kursmoment bygger vi vidare på vår me-app genom att hämta information från Githubs API.

Vi bygger även en app inför Nobel festen där vi använder oss av Nobelprisets API för att visa information om pristagare.

Innan vi gör detta tittar vi på ett verktyg som hjälper oss att söka och visa information i JSON-filer.

[Instruktion till kursmoment 02](webapp-v2/kmom02).



###Kmom03: Dashboard {#kmom03}

I detta kursmoment skall vi bygga en SPA, som fungerar på alla våra olika stora skärmar. Vi hämtar data från minst två API'er och visualiserar det på en dashboard designat för att ge användaren en snabb överblikk.

Vi kollar på hur vi kan skapa ett enkelt grid-layout och hur vi kan återanvända komponenter i javascript ramverket mithril.

[Instruktion till kursmoment 03](webapp-v2/kmom03).



###Kmom04: CRUD {#kmom04}

Än så länge har vi bara hämtat data från API'er. I detta kursmoment bygger vi en app som hämtar, skapar, uppdaterar och tar bort data med hjälp av ett API.

Vi tittar på hur vi kan optimera formulär för att fungera bra på mobila enheter genom att använda HTML5 input typer.

[Instruktion till kursmoment 04](webapp-v2/kmom04).



###Kmom05: Litet kundprojekt {#kmom05}

Du skall nu utföra ett mindre projekt till en kund. Detta kursmoment är friare i sin utformning och det gäller att själv tänka till när det gäller val av teknik, prioritera kraven och tänka till vad kunden egentligen vill ha.

Vi tittar även på hur vi kan använda våra mobila enheter för att ladda filer.

[Instruktion till kursmoment 05](webapp-v2/kmom05).



###Kmom06: Gomoku {#kmom06}

Vi har tidigare gjort en server för Gomoku och nu är det dags att göra en klient för webbläsaren och mobila enheter. Här använder vi all kunskap från tidigare kursmoment för att skap en trevlig spelupplevelse för användaren.

[Instruktion till kursmoment 06](webapp-v2/kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](webapp-v2/kmom10).



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
| Kmom01     | Introduction, 1                                             |
| Kmom02     | 6                                                           |
| Kmom03     | 11, 12                                                      |
| Kmom04     | 4, 10, 13                                                   |
| Kmom05     | 14                                                          |
| Kmom06     |                                                             |
| Kmom10     |                                                             |

Dessutom har varje kursmoment läsanvisningar i artiklar och videos.



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

Läser du kursen inom ramen för programmet Webbprogrammering (campus/distans) så finns det en [rekommenderad studieplan inom programmet](program/webbprogrammering/studieplan/termin2).

Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webutv#studieplan).

<!--
För dig som studerar kursen som enskild kurs finns det en [rekommenderad studieplan](linux/studieplan) kopplad till de kurstillfällen som erbjuds.
-->

Vissa av kurstillfällena har även en lektionsplan som du får i samband med kursstart. Lektionsplanen visar de tillfällena som är schemalagda träffar.

Finns det en lektionsplan så finns ofta bokningar av salar gjorda i bokningsschemat.

Studieplan, eventuell lektionsplan och eventuellt schema finns tillgängligt via kurstillfället på ITs.

Läs mer om den [rekommenderade studieplanen](kurser/faq/rekommenderad-studieplan) och [lektionsplanen](kurser/faq/lektionsplan-och-schema).



Lärarstöd och handledning {#handledning}
----------------------------------------

Schemalagda labbtillfällen, hangouts samt forum och chatt de viktigaste källorna för handledning. Läs om [handledning och hjälp-till-självhjälp](kurser/faq/lararstod-och-handledning).



Ladok {#ladok}
------------------------

Enligt kursplanen finns ett antal ladokmoment och de är kopplade till kursens kursmoment enligt följande.

| Kursens moment  | Ladok moment enligt kursplan  |
|-----------------|-------------------------------|
| Kmom01 + kmom02 | Uppgift 1 á 2.5hp             |
| Kmom03 + kmom04 | Uppgift 2 á 2.5hp             |
| Kmom05 - kmom10 | Projekt á 2.5hp               |

Läs mer om [rapportering av resultat](kurser/faq/resultatrapportering).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [jag jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden DV1546 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1546).
