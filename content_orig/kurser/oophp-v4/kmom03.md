---
author:
    - mos
    - lew
revision:
    "2018-09-10": "(C, mos) Flyttad tärningsspel från kmom02."
    "2018-04-03": "(B, mos) Omarbetad inför oophp v4."
    "2017-04-07": "(A, mos) Första utgåvan."
...
Kmom03: Enhetstestning 
==================================

Vi jobbar vidare med klasser och objekt och denna gången tittar vi på hur klasser kan enhetstestas med verktyget PHPUnit. PHPUnit är ett av de verktyg som vanligen används inom PHP för att utföra enhetstestning av koden.

Vi har tidigare pratat om begreppet inkapsling och att klasserna skall erbjuda ett publikt API, ett gränssnitt för användaren av klassen. Samtidigt vill vi skydda den interna implementationen inuti klassen. Vi vill låta användaren av vår klass ha ett tydligt gränssnitt, men inuti klassen vill vi själva bestämma hur vi implementerar klassens detaljer, utan att påverka det publika gränssnittet.

Samma begrepp använder vi i enhetstestning, vi ser varje klass som en enhet som skall testas och vi testar klassen via dess publika gränssnitt vilket är de metoder vi når som användare av klassen. Vi är medvetna om hur klassen är uppbyggd, vi kallar det _white box testing_ då vi har tillgång till klassens källkod när vi skriver testfallen. Målet är att testa alla varianter av användning mot klassen, även felfall.

<!-- more -->

[FIGURE src=image/snapvt18/phpunit-terminal.png?w=w3 caption="Enhetstestning med PHPUnit via en Makefile."]

[FIGURE src=image/snapvt18/code-coverage-overview.png?w=w3 caption="Kodtäckning vid enhetstestning, en översikt av enheterna (klasserna)."]

[FIGURE src=image/snapvt18/code-coverage-detail.png?w=w3 caption="Detaljerad kodtäckning rad för rad i en enhet (klass)."]

<!--st op-->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Labbmiljö {#labbmiljo}
---------------------------------

*(ca: 1-2 studietimmar)*

Installera följande som en del av din labbmiljö. Se till att du installerar PHPUnit version 6.0 eller högre, men välj en version som matchar din version av PHP.

1. Installera [PHPUnit](labbmiljo/phpunit) och [Xdebug](labbmiljo/xdebug) för att kunna köra enhetstester med kodtäckning på din lokala maskin.



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 3-6 studietimmar)*



###Videor {#videor}

Kika på följande videos.

1. Det finns en [YouTube spellista kopplad till kursen](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_jh6fAj1iwiJSj70DXA2Vn), kika på de videos som börjar med 3. De ger dig en introduktion och översikt till kursmomentet.



### Artiklar {#artiklar}

Läs följande.

1. Läs introduktionen till enhetstester i artikeln "[Enhetstestningens roll i test av mjukvara](kunskap/enhetstestningens-roll-i-test-av-mjukvara)".

1. Gå till hemsidan för [PHPUnit](https://phpunit.de/) och bekanta dig kort och översiktligt med PHPUnits dokumentation. Kika över innehållsförteckningen och skumläs snabbt följande kapitel (för att bekanta dig med manualens struktur och innehåll):
    * 2. Writing Tests for PHPUnit
    * 5. Organizing Tests
    * 10. Code Coverage Analysis
    * Appendix 1. Assertions

1. Bekanta dig kort och översiktligt med [Xdebug för PHP](https://xdebug.org/) och kika snabbt över vilken dokumentation som finns. Se vilka funktioner Xdebug kan tillföra till din utvecklingsmiljö. Vi kommer enbart använda Xdebug tillsammans med PHPUnit för att generera rapporter över kodtäckning.



### Lästips {#lastips}

Läs följande om du har tid och energi och vill fördjupa dig i enhetstestning.

1. Dokumentet [PHP The Right Way](http://www.phptherightway.com/) innehåller en sektion som beskriver vertyg och tekniker för allmän testning med i PHP.

1. För att läsa mer generellt om testning så är [Wikipedia Software Testing](https://en.wikipedia.org/wiki/Software_testing) en bra utgångspunkt.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



### Uppgifter {#uppgifter}

Gör följande uppgifter.

1. Lös uppgiften "[Kom igång med PHPUnit](uppgift/kom-igang-med-phpunit)" som guidar dig igenom de första stapplande stegen i enhetstestning. Spara all kod i `me/kmom03/phpunit`.

1. Gör uppgiften "[Tärningsspel 100](uppgift/tarningsspel-100)" inuti din me-sida. Spara din kod under `me/redovisa`.

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (3.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make doc` och en `make test` som en sista avstämning, innan du sätter sista taggen.

<!--
Gör även enhetstestning på tärningsspelet, eller enbart tärningsklasserna från guiden?

Borde guiden ha en viss del i detta kmom? Eller bättre bara fokusera på enhetstestning kanske.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Har du tidigare erfarenheter av att skriva kod som testar annan kod?
* Hur ser du på begreppen enhetstestning och att skriva testbar kod?
* Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
* Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
* Hur väl lyckades du testa tärningsspelet 100?
* Vilken är din TIL för detta kmom?
