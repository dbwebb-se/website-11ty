---
author:
  - mos
  - efo
revision:
    "2018-09-24": "(E, efo) Rensade ut i litteratur och flyttade portfölj längst ner i listan."
    "2017-12-27": "(D, mos) Enhetlig mall för me-sida."
    "2017-11-01": "(C, mos) Länk till rätt uppgift om me-sidan (v2)."
    "2017-10-17": (B, mos) Uppdaterad inför ht17.
    "2015-10-15": (A, mos) Första utgåvan för kursen.
...
Kmom01: JavaScript och WebGL
==================================

Du kommer igång med en labb- och utvecklingsmiljö som stödjer utveckling av HTML, CSS och JavaScript tillsammans med WebGL. Du testar på programmering i JavaScript, bygger en sandbox för dina tester och du skapar dina första WebGL-ritningar i webbläsaren.

<!--more-->


Så här långt kommer du när du läst boken och testat dess exempel.

[FIGURE src=/image/snapht15/webgl-sandbox2-point-random-color.png?w=w2 caption="Placera ut punkter på canvasen i olika färger."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-6 studietimmar)*

Det finns en [längre beskrivning om kursens labbmiljö](./../installera-labbmiljo). Jobba igenom den för att få kursens labbmiljö på plats.den om du är osäker på vad som skall göras.



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [WebGL Programming Guide](kunskap/boken-webgl-programming-guide).
    * Ch 1: Overview of WebGL
    * Ch 2: Your first step with WebGL

I kapitel 2 finns en del exempelprogram som du kan testa direkt i ditt kursrepo `example/webgl/theBook/Chapter2/`, eller via [dbwebb's kopia av kursrepot](webgl/repo/example/webgl/theBook/Chapter2/).

1. Bekanta dig med boken [Speaking JavaScript: An In-Depth Guide for Programmers](kunskap/boken-speaking-javascript) genom att läsa igenom det första kapitlet [Ch1 Basic JavaScript](http://speakingjs.com/es5/ch01.html) (läs till och med stycket om "Strict Mode") som ger dig en introduktion till grundkonstruktioner i programmeringsspråket JavaScript.



###MDN {#mdn}

I kursen används Mozilla Developers Network (MDN) som en resurs generellt för webbresurser och specifikt för referensmanual till programmeringsspråket JavaScript.

Vill du hamna på rätt manualsida så lägger du alltid till "mdn" till din googling. Det finns många versioner av JavaScript och du vill gå tillbaka till källan i referensmanualen för att veta vad som är rätt (eller fel).

Gör följande:

1. Bekanta dig kort med översikten på [MDN: Web technology for developers](https://developer.mozilla.org/en-US/docs/Web). Där ser du generellt material om webbteknologier.

<!-- 1. Bekanta dig specifikt med det som finns under rubriken "JavaScript". Använd minst 10 minuter av din tid för att kika runt och läsa någon av de inledande artiklarna om JavaScript. -->

1. För en snabb introduktion till konstruktionerna i språket JavaScript kan jag rekommendera dokumentet "[MDN JavaScript Guide](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide)" och de inledande kapitlen som kompletterar det du läst i kurslitteraturen.
    * Introduction
    * Grammar and types
    * Expressions and operators



###Artiklar {#artiklar}

Läs följande:

1. I kursen används validatorer och en kodstandard för att testa att du skriver kod på ett, enligt kodstandarden, acceptabelt sätt. Du kan läsa om dbwebb-kodstandarden på [npm javascript-code-style](https://www.npmjs.com/package/javascript-style-guide). Du kan diskutera [kodstandarden i forumet](t/6327).

<!--
1. CSS style guide.
-->



###Video  {#video}

Kika på följande videor.

1. Videoserien [Kursen Spelteknik för webben](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_JgJqI31cZeBMnjH1JUUoU) ger en kort introduktion till kursen och hjälper till med att bygga din portfölj. Titta på de videor som börjar på 0 och 1.

1. Videoserien [Lär dig JavaScript](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_YXUQlr5aAzJ406vSsmeMT) är tätt kopplat till kursmaterialet. Kika igenom serien under kursens gång.

1. Videon "[The Future of WebGL and Gaming](https://www.youtube.com/watch?v=6lnEmAYVziA)" ger dig en inblick i en möjlig framtid för 3D-spel på webben.

<!--
1. Videoserien [Lär dig JavaScript](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-Id4-mxJK1Pi91_7Ob1W-K) är tätt kopplat till kursmaterialet. Kika på de videor som börjar med 1.
-->


<!--
###Föreläsningsmaterial {#slide}

Föreläsningsmaterial finner du i kursrepot under [`slide/01.*`](webgl/repo/slide).
-->



###Lästips {#lastips}

Följande källor är relevanta och ger dig en orientering i WebGL och det som krävs för att jobba med WebGL.

1. Webbplatsen [WebGL Fundamentals](http://webglfundamentals.org/) innehåller en samling artiklar som riktar sig till den som precis börjat koda WebGL. Det kan vara bra att använda sig av de artiklarna som komplement till boken.

1. Webbplatsen [Learning WebGL](http://learningwebgl.com/blog/?page_id=1217) innehåller ett antal lektioner om hur man kommer igång med WebGL. De kan komplettera boken.

<!-- 1. [Khronos Group](https://www.khronos.org/) driver standardisering och utveckling inom OpenGL och WebGL. Vänd dig till deras webbplats för referensmaterial.

1. Du bör redan vara mycket väl insatt i vektorer, matriser och hur de relaterar till 3D-grafik. Vill du fräscha upp minnet så finns det bra resurser i artikelserien om "[Vector Math for 3D Computer Graphics](http://www.dickbaldwin.com/KjellTutorial/KjellVectorTutorialIndex.htm)". -->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 10-12 studietimmar)*



###Övningar {#ovningar}

1. Du behöver ha grundläggande koll på HTML och CSS. Som en uppfräschning av dina kunskaper, eller som en kort intro, så jobbar du igenom materialet i tipset "[Kom igång (snabbt) med HTML, CSS och JavaScript](coachen/kom-igang-snabbt-med-html-css-och-javascript)". Jobba igenom materialet grundligt eller översiktligt, beroende på ditt eget behov.

1. Kom igång och gör ditt första program i JavaScript tillsammans med artikeln "[Kom i gång med HTML, CSS, JavaScript och Canvas](kunskap/kom-i-gang-med-html-css-javascript-och-canvas)".

2. Uppgradera din sandbox till att rita med 3D-kontext och WebGL tillsammans med artikeln "[Kom igång och rita med WebGL på en Canvas](kunskap/kom-igang-och-rita-med-webgl-pa-en-canvas)".



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör labben "[JavaScript med variabler och inbyggda funktioner](uppgift/javascript-med-variabler-och-inbyggda-funktioner)"  Labben genereras i `me/kmom01/lab1`.

1. Gör laborationen "[JavaScript med villkor och loopar](uppgift/javascript-med-villkor-och-loopar)". Spara arbetet i `me/kmom01/lab2`.

1. Gör uppgiften "[Rita punkter med WebGL](uppgift/rita-punkter-med-webgl)". Ditt resultat sparar du delvis i `me/kmom01/sandbox2` och delvis i `me/kmom01/point`.

1. Gör uppgiften "[Skapa en portfölj för kursen webgl](uppgift/skapa-en-portfolj-for-kursen-webgl)". Spara resultatet i `me/portfolio`.




Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Vilken utvecklingsmiljö sitter du på?
* Hur väl känner du dig hemma i webbtekniker som JavaScript, HTML och CSS?
* Vilket är ditt första intryck av programmeringsspråket JavaScript, kan du relatera till något annat programmeringsspråk?
* Hur väl känner du dig hemma i 3D programmering med OpenGL, WebGL eller motsvarande?
* Vad tycker du om kursboken så här långt?
* Berätta lite om hur du löste uppgiften med punkterna. Var det något som var svårt, lurigt eller utmanande?
