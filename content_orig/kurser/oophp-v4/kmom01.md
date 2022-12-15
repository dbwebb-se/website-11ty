---
author:
    - mos
    - lew
revision:
    "2018-03-23": "(D, mos) Lade till videoserie för kmom."
    "2018-03-19": "(C, mos) Uppdaterad till oophp v4."
    "2017-03-27": "(B, mos) Länkar till phpcs, phpmd, psr-1, psr-2."
    "2017-03-24": "(A, mos, lew) Första versionen släppt."
...
Kmom01: Objektorientering i PHP
==================================

Vi startar med grunderna i objektorienterad PHP, det blir objekt och klasser med inkapsling, konstruktorer och destruktorer, setters och getters, egenskapade exceptions och vi ser hur man kan lagra ett objekt i sessionen.

Vi bygger små enkla testprogram för att se hur sakerna fungerar.

[FIGURE src=image/snapvt18/oophp-constructor.png?w=w3 caption="Små testprogram hjälper oss att förstå grunderna."]

För att komma igång med programmeringen så bygger vi en variant av spelet "Gissa vilket nummer jag tänker på" och vi implementerar spelet med GET, POST och SESSION. Det blir repetition av PHP och hur HTTP-protokollar, formulär och länkar fungerar tillsammans. Dessutom blir det en introduktion till klasser i PHP och ett exempel där vi bygger en klass för att användas från olika klienter.

<!-- more -->

[FIGURE src=image/snapvt18/oophp-guess-my-number-post.png?w=w3 caption="Spela spelet Gissa mitt nummer med PHP."]

Vi bygger dessutom en me-sida med Anax i en katalogstruktur som i längden kommer att ge oss en insikt i hur ett webbaserat ramverk kan byggas upp.

[FIGURE src=image/snapvt18/oophp-me.png?w=w3 caption="Mallen för me-sidan i oophp."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Det finns en [längre beskrivning om kursens labbmiljö](./../installera-labbmiljo). Läs den om du är osäker på vad som skall göras, eller om detta är din första dbwebb-kurs.

Den korta varianten är att du behöver [installera labbmiljön](./../labbmiljo), uppdatera [dbwebb-cli](dbwebb-cli) samt klona och initiera kursrepot.

```text
# Gå till din katalog för dbwebb-kurser
dbwebb selfupdate
dbwebb clone oophp
cd oophp
dbwebb init
```



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*


<!--
https://phpapprentice.com/
-->



###Videor {#videor}

Kika på följande videos.

1. Det finns en [YouTube spellista kopplad till kursen](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_jh6fAj1iwiJSj70DXA2Vn), kika på de videos som börjar med 0 och 1. De hälsar dig välkommen och ger dig en introduktion till kursen och till detta kursmoment.



###Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Fräscha upp ditt minne av PHP genom att snabbt skumma igenom guiden "[20 steg för att komma igång med PHP (php20)](kunskap/kom-i-gang-med-php-pa-20-steg)". Du bör sedan tidigare (htmlphp) ha koll på det som nämns i guiden. Om du bygger exempelprogram för att testa och leka så kan du lägga dem i `me/kmom01/php20`.

1. Bekanta dig snabbt och översiktligt med PHP manualen och stycket om [Klasser och Objekt](http://php.net/manual/en/oop5.intro.php). Som vanligt är referensmanualen vår källa till information, så bli kompis med dess struktur och lär dig vilken typ av information du där kan hitta.

1. Bekanta dig översiktligt med dokumentet [PHP The Right Way](http://www.phptherightway.com/). Det är skrivet av PHP communityn och ger en översikt över PHP som språk och de verktyg och processer man normalt arbetar med. Vi kommer att återkomma till dokumentet under kursens gång.



<!--
###Lästips {#lastips}

Följande lästips är att rekommendera.

1. Vi skriver PHP i enlighet med kodstandarden [PSR-1](http://www.php-fig.org/psr/psr-1/) och [PSR-2](http://www.php-fig.org/psr/psr-2/).

1. Kika gärna på valideringsverktygen vi använder, [phpcs](https://github.com/squizlabs/PHP_CodeSniffer/wiki) och [phpmd](https://phpmd.org/). Du kan installera dem som linters i Atom, men först måste du installera dem i din PATH på ditt lokala system.

-->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-12 studietimmar)*



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. I guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)" jobbar du igenom följande delar. Spara koden i `me/kmom01/oophp1`.
    * [Intro till guiden](guide/kom-igang-med-objektorienterad-programmering-i-php/intro-till-guiden)
    * [Objekt och Klass](guide/kom-igang-med-objektorienterad-programmering-i-php/objekt-och-klass)

1. Gör uppgiften "[Gissa numret med PHP och GET, POST och SESSION](uppgift/gissa-numret)". Uppgiften låter dig värma upp din gamla PHP-kunskaper och samtidigt träna på grunderna med objekt och klasser. Spara din kod i `me/kmom01/guess`.

1. Gör uppgiften "[Bygg en me-sida för oophp med Anax](uppgift/bygg-en-me-sida-for-oophp-med-anax)". Du skall bygga en me-sida som du taggar och publicerar på GitHub. Spara allt under `me/redovisa`.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?
* Berätta hur det gick det att utföra uppgiften "Gissa numret" med GET, POST och SESSION?
* Har du några inledande reflektioner kring me-sidan och dess struktur?

TIL är en akronym för "Today I Learned" vilket leksamt anspelar på att det finns alltid nya saker att lära sig, varje dag. Man brukar lyfta upp saker man lärt sig och där man kanske hajade till lite extra över dess nyttighet eller enkelhet, eller så var det bara en ny lärdom för dagen som man vill notera.

* Vilken är din TIL för detta kmom?



<!--
GAMLA SAKER

1. Läs om "[The MicroPHP Manifesto](https://funkatron.com/posts/the-microphp-manifesto.html)" som ger en reaktion på ramverk och termen mikroramverk. ([Alternativ länk till artikeln](https://dbwebb.se/t/6379)).

1. Gör uppgiften "[En navbar till Anax Lite (steg 1)](uppgift/en-navbar-till-anax-lite-steg-1)" som ger dig en struktur för att separera HTML och konfiguration av din navbar. Spara din kod i `me/anax-lite`.
-->
