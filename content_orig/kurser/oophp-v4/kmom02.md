---
author:
    - mos
    - lew
revision:
    "2018-09-10": "(D, mos) Flyttade tärningsspelet till kmom03."
    "2018-09-03": "(C, mos) Ingen ändring gjord inför hösten."
    "2018-03-27": "(B, mos) Uppdaterad oophp v4."
    "2017-03-31": "(A, mos, lew) Första versionen."
...
Kmom02: Arv och Komposition
==================================

Vi fortsätter träna på programmering med klasser och objekt. Vi jobbar igenom ett antal grundkonstruktioner i objektorientering och ser hur de implementeras i PHP. Vi tittar på arv och komposition för att se hur klasser kan samverka och bygga på varandra. Vi använder namespace för att strukturera koden och vi använder en autoloader enligt PSR-4. 

Vi ser hur ett klassdiagram kan ritas i UML, för att skissa på relationerna mellan klasserna. Vi ser också hur man kan bygga upp automatisk dokumentation från koden och där ta hjälp av docblock-kommentarer.

Vi börjar koda inuti ramverket och använder oss av routes, vyer och placerar klasserna inuti ramverket med givna namespaces och använder oss av ramverkets autoloader.

<!-- more -->

[FIGURE src=image/snapvt18/dice-graphic-css-sprite.png?w=w3 caption="Ett antal tärningar representerade med olika grafiska metoder."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>


<!--st op-->



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*



###Videor {#videor}

Kika på följande videos.

1. Det finns en [YouTube spellista kopplad till kursen](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_jh6fAj1iwiJSj70DXA2Vn), kika på de videos som börjar med 2. De ger dig en introduktion och översikt till kursmomentet.



###Artiklar {#artiklar}

Läs följande artiklar.

1. Gå tillbaka till manualen och bekanta dig återigen översiktligt med PHP manualen och stycket om [Klasser och Objekt](http://php.net/manual/en/oop5.intro.php). Kika på de sakerna som behandlades i förra kursmomentet, som en repetition.

1. Kika kort i PHP manualen om [begreppet namespace](http://php.net/manual/en/language.namespaces.php). Skaffa dig en översikt vad det handlar om.

1. Bekanta dig kort med verktyget [phpDocumentor](https://www.phpdoc.org/) som kan automatgenerera dokumentation av din kod, genom att bland annat läsa informationen från dina docblock kommentarer. Läs översiktligt så att de är medveten om vad verktyget kan göra.

    1. Kika snabbt och översiktligt igenom [referensen till PHPDoc](https://docs.phpdoc.org/references/phpdoc/), det ger dig en bas för information när du nu börjar skriva dina egna docblock kommentarer.

1. Kika kort på dokumentet som specificerar autolading enligt PHP-FIG och [PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/). Dokumentet ger en stadnard till hur autolading enligt PSR-4 skall fungera tillsammans med namespaces.



###Lästips {#lastips}

Kika igenom följande lästips och ägna tid åt dem om du finner det intressant.

1. [Dia](https://wiki.gnome.org/Apps/Dia/) är ett ritverktyg där du kan skapa UML-diagram. Du vill ha ett sådant, eller motsvarande, i din arsenal av verktyg.

1. Ett webbaserat verktyg för UML är [draw.io](draw.io). Det har stöd för både ER-variant och UML. Verktyget är webbaserat och går att integrera med Google Docs.

1. När man pratar om objektorienterad programmering så behöver man också ha en viss bas i objektorienterad modellering, det underlättar. Därför kan du läsa lite om UML, "Unified Modelling Language". En bra plats att starta är någon av följande:
    * Andreas artikel "[Vad är UML?](kunskap/vad-ar-uml)" som är en del av kursen oopython.
    * [Wikipedia om UML](http://en.wikipedia.org/wiki/Unified_Modeling_Language).



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 10-14 studietimmar)*


###Uppgifter {#uppgifter}

Gör följande uppgifter.

1. I guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)" jobbar du igenom följande del. Spara koden i `me/kmom02/oophp2`. Kopiera alla filer från `me/kmom01/oophp1`, du jobbar vidare på de filerna.
    * [Arv och Komposition](guide/kom-igang-med-objektorienterad-programmering-i-php/arv-och-komposition)

1. Gör uppgiften "[Dokumentera PHP med phpdoc och phpDocumentor](uppgift/dokumentera-php-med-phpdoc-och-phpdocumentor)". Spara uppdateringarna du gör i ditt `me/redovisa`.

1. Gör uppgiften "[Flytta spelet Gissa mitt nummer till me-sidan](uppgift/flytta-spelet-gissa-mitt-nummer-till-me-sidan)". Du skall kopiera koden för ditt gissa-spel och integrera in det i din me-sida. Koden sparar du i `me/redovisa`. 

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (2.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make doc` och en `make test` som en sista avstämning, innan du sätter sista taggen.


<!--
Rita klass och sekvensdiagram? Som en del i uppgiften?

Yatsy?
21, blackjack
Kasta gris (100)
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Hur gick det att överföra spelet "Gissa mitt nummer" in i din me-sida?
* Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet `make doc`?
* Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
* Vilken är din TIL för detta kmom?
