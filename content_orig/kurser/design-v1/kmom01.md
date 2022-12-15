---
author: mos
revision:
    "2017-10-19": (C, mos) Genomläst, labbmiljön justerad.
    "2016-10-26": (B, mos) Omstrukturerad efter feedback.
    "2016-10-07": (A, mos) Första release.
...
Kmom01: Ramverk och innehåll
====================================

Låt oss kika på några av de mjukare aspekterna inom webbprogrammering. Det handlar om webbdesign och användbarhet. Men det handlar också om snabba sidladdningar, sökmotoroptimering, att skriva för webben och hur vi väljer att organisera webbplatsens material.

Hur bygger vi våra webbplatser för att underlätta för design och användbarhet? Hur kan vi som programmerare rent tekniskt kan förbereda webbplatserna för design och användbarhet? Vi vill vara förberedda när det kommer en webbdesigner, eller designer inom användbarhet, och berättar hur webbplatsen skall se ut. Då vill vi med enkla (rimliga) medel uppfylla deras visioner.

<!--more-->

För att komma igång med en grundstruktur så använder vi ett PHP-baserat ramverk (Anax) för att bygga en me-sida som vi fyller med innehåll genom att skriva texter i Markdown. Vi börjar med grundstrukturen och vi avvaktar med style och utseende till nästa kursmoment.

Öppna ditt sinne och låt oss börja.

[FIGURE src=/image/snapht17/anax-flat-start.png?w=w2 caption="En me-sida med PHP-ramverket Anax Flat."]

Under kursens gång så kommer du att introduceras till ett par tekniker som är bra att ha för en webbprogrammerare. En av de är versionshantering med Git och GitHub.

[FIGURE src=/image/snapvt16/anax-flat-me-github.png?w=w2 caption="Ditt material skall paketeras som ett git-repo och publiceras på GitHub."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Det finns en [längre beskrivning om kursens labbmiljö](./../installera-labbmiljo). Läs den om du är osäker på vad som skall göras, eller om detta är din första dbwebb-kurs.

Den korta varianten är att du behöver [installera labbmiljön](./../labbmiljo), uppdatera [dbwebb-cli](dbwebb-cli) samt klona och initiera kursrepot.

```text
# Gå till din katalog för dbwebb-kurser
dbwebb selfupdate
dbwebb clone design
cd design
dbwebb init
```



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Bläddra lite i kursboken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)". Bara för att bekanta dig med den, vi börjar läsa mer i samband med nästa kmom.



###Tekniker för att skriva för webben {#skriva}

1. Det är viktigt att ha koll på hur vi skall tänka när vi skriver för webben. Under kursen skall vi läsa igenom guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)". Du kan börja kort med följande kapitel, bara för att bekanta dig med materialet.

    * 1. Innehållsförteckning
    * 2. Förord

1. Kika på vad Markdown innebär genom att läsa [John Grubers introduktion till Markdown](https://daringfireball.net/projects/markdown/basics). För att testa själv så öppnar du en [Gist](https://gist.github.com/) och skriver i Markdown, det gör att du kan testa olika konstruktioner under tiden som du läser om dem.



###Webbdesign och användbarhet {#webbdesign}

Läs följande artiklar.

1. Läs artikeln "[Top 10 Mistakes in Web Design](https://www.nngroup.com/articles/top-10-mistakes-web-design/)" skriven av Jakob Nielsen.

1. Läs artikeln som ger en kort introduktion till användbarhet, "[Usability 101: Introduction to Usability](https://www.nngroup.com/articles/usability-101-introduction-to-usability/)" skriven av Jakob Nielsen.



###Video  {#video}

Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 0 och 1. Videorna som börjar på 110* är kopplade till en av de artiklar du skall jobba igenom under övningarna nedan. Titta på dem samtidigt som du jobbar igenom artikeln.



###Lästips {#lastips}

Kika på följande om du är intresserad och finner det värt tiden.

1. I övningarna introduceras du till Git och GitHub. Om du vill jobba igenom en separat övning med Git och GitHub så finns artikeln "[Kom igång med Git och GitHub](kunskap/kom-igang-med-git-och-github)".

1. Ramverket du använder i kursen är Anax. Bekanta dig gärna med [Anax dokumentationen](anax).

1. Anax Flat, en variant av Anax som vi kommer använda i denna kursen, kan sägas vara ett flat-file framework. Bekanta dig kort med ett annat sådant ramverk som heter [Grav](https://getgrav.org/) och är byggt med PHP. Du kan kika på vilka features det har och kika översiktligt på dess dokumentation.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



###Övningar {#ovningar}

Genomför följande övning för att förbereda inför uppgifterna.

1. Lär känna ramverket Anax Flat genom att bygga webbplats. Jobba igenom artikeln "[Bygg en me-sida med Anax Flat](kunskap/bygg-me-sida-med-anax-flat)".




###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Lös uppgiften "[Bygg en me-sida med Anax Flat](uppgift/me-sida-med-anax-flat)".



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Är du sedan tidigare van att jobba i ramverk för att bygga webbplatser? Om ja, vilka ramverk/språk har du jobbat med?
* Det blev en del nya verktyg i labbmiljön, var de nya för dig eller kände du igen dem?
* Hur kändes det att jobba med Anax Flat och bygga din me-sida?
* Har du några förutfattade meningar, eller kanske en etablerad övertygelse, inom design och användbarhet för webben?
* Det fanns videor som kompletterade artiklarna, hjälpte de dig att förstå materialet bättre?
