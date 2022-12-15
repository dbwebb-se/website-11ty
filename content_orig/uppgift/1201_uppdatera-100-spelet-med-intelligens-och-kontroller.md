---
author: mos
category:
    - php
    - anax
    - kursen oophp
revision:
    "2019-05-03": "(E, mos) Förtydliga vad spelrunda innebär."
    "2019-04-29": "(D, mos) Optionellt att skriva enhetstester till kontrollerklassen."
    "2019-04-26": "(C, mos) Ny version av artikel, nu inklusive kontroller och video."
    "2018-04-16": "(B, mos) Uppdaterade stycket om enhetstester."
    "2018-04-16": "(A, mos) Första utgåvan i samband med oophp version 4."
...
Uppdatera 100-spelet med intelligens och kontroller
==================================

[FIGURE src=image/snapvt18/fair_dice_probability_distribution.png?w=c5&a=0,0,0,0&cf class="right"]

Du skall jobba vidare med ditt 100 spel och du skall tillföra intelligens till datorspelaren. Tanken är att spelet kan spelas av två spelare där du är den ena och datorn är den andra. Datorn behöver ta beslut om när den skall stanna och fortsätta sin slagserie och du behöver skriva koden som styr datorns beslut.

Under spelets gång så skall du presentera ett histogram för spelarna. Kanske går det att använda till att ta beslut, kanske inte. Annars blir det trevlig kuriosa och statistik kring spelet.

<!--more-->

När du ändå inför stödet för datorn så låter du användaren också se samma data som datorn har tillgång till. Då kan du få en rättvis kamp mellan datorn och spelaren. Spelaren kan se all statistik i den nuvarande spelet och kan ta beslut baserat på informationen.

Du lär dig begreppet "kontroller" och flyttar din kod från dina routes till en kontroller-klass.

När du är klar ser du till att införa en testsvit som har testmetoder som täcker alla dina klasser i en rimlig kodtäckning, givet tiden du har.



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom delen med "Trait och Interface" i guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)".

Du har löst uppgiften "[Tärningsspel 100](uppgift/tarningsspel-100)" inuti din me-sida.



Introduktion och förberedelse {#intro}
-----------------------

Gå igenom följande steg för att förbereda dig inför uppgiften.

Du kan se hur jag jobbar delar av stegen i videoserien "[Uppgiften "Uppdatera 100-spelet med intelligens och kontroller" (kursen oophp)](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-xsJ0T0s24cNkWNg5FRpV4)". Jag fokuserar främst på de bitar som handlar om kontrollerklassen.

[YOUTUBE src="SbiwOdsoud8" list="PLKtP9l5q3ce-xsJ0T0s24cNkWNg5FRpV4" width=700 caption="Mikael visar hur du jobbar igenom delar av uppgiften."]



### Trait, interface och histogram {#trait}

Du har tillgång till ett histogram som är implementerat med trait och interface. Använd det för att visa upp ett histogram under spelets gång. 

Spelaren kan titta på histogrammet och välja att ta beslut delvis baserat på det. 

Lägg gärna till mer information såsom snittvärde, senaste tärningsslagen och om du finner något annat som intressant beslutsunderlag.



### Intelligens för datorn {#intelli}

När du bygger intelligensen så kan du låta datorn ta del av histogrammet och andra värden som du tror kan gynna datorns beslut.

Kanske kan du inte bygga så mycket intelligens på just histogrammet, men se vad du kan göra och läs gärna om [Gambler's Fallacy](https://en.wikipedia.org/wiki/Gambler%27s_fallacy) som ger dig lite insikt i om histogram verkligen kan användas för att beräkna sannolikheten av nästa tärningsslag, iallafall enligt matematiska lagar.

Kanske väljer du bara en viss taktik att datorn spelar lugnt i början och när den ligger under så tar den större risker genom att samla på sig fler poäng innan den stannar.

En enkel hemmasnickrad intelligens/taktik räcker, du behöver inte göra det så avancerat (om du nu inte finner en rejäl utmaning i att lösa intelligens/taktik-problemet).

I all enkelhet kan det räcka med en ekvation som beräknar om datorn skall stanna eller inte. Det är ju det beslutet som skall tas. Att stanna eller inte.



### Flytta koden till kontroller {#kontroller}

Du skall flytta den koden du nu har i routes till en kontroller-klass.

Börja med att uppdatera så du har de senaste versionerna av Anax moduler.

```text
# Gå till me/redovisa
composer update
```

Studera hur en controller fungerar genom att läsa dokumentationen av modulen [`anax/controller`](https://github.com/canax/controller).

Kopiera källkoden för kontroller klassen [`Anax\Controller\SampleAppController`](https://github.com/canax/controller/blob/master/src/Controller/SampleAppController.php) och spara i din egen me/redovisa katalog under `src/`. Välj ditt eget namespace på klassen, du kan välja vad du vill. 

Montera kontroller klassen i din router genom att skapa en konfigurationsfil under me/redovisa `config/router/100_game.php`. Du kan döpa konfigurationsfilen till vad du vill. Som mall kan du använda någon av de konfigurationsfiler som finns i katalogen [`config/router`](https://github.com/canax/controller/tree/master/config/router) i modulen anax/controller. De visar hur en kontroller monteras på en monteringspunkt i routern.

Du kan använda routen `dev/` för att kontrollera om routen känner igen din kontroller klass och var i flödet den monterades.



### Integrera med ramverkets klasser {#ramverk}

Gör allt som står i din makt för att försöka undvika att du i dina klasser använder direkt access till PHP's globala variabler som GET, POST, SERVER och SESSION.

Ramverket erbjuder ett par klasser som är ett lager över PHP's globala variabler samt erbjuder vanliga bra att ha saker.

| Anax klasser | Löser vad? |
|--------------|------------|
| [`Anax\Request`](https://github.com/canax/request/blob/master/src/Request/Request.php) [README](https://github.com/canax/request/blob/master/README.md) | Löser tillgång till `$_GET, $_POST, $_SERVER` och innehåller detaljer om requesten. |
| [`Anax\Session`](https://github.com/canax/session/blob/master/src/Session/Session.php) [README](https://github.com/canax/session/blob/master/README.md) | Löser tillgång till `$_SESSION`. |

Generellt är tanken med dessa klasser att ramverket kopplar loss dig från direkt access till globala variabler och erbjuder bättre möjligheter att testa din kod genom att till exempel från testkoden injecta innehållet till motsvarigheten av `$_GET, $_POST, $_SERVER`.

En annan sak som löses är att sessionen fungerar även när koden körs som CLI under `make test`.

Det handlar delvis om att göra koden mer testbar och det handlar om hyffs och vett att undvika direkt tillgång till globala variabler.



### Enhetstester inuti ramverket {#enhetstest}

Uppdatera och bygg vidare på din test suite av enhetstester.

Se om du kan inkludera tester för kontroller-klassen, det finns ett exempel på hur du kan skapa enhetstester till en kontroller klass i anax/controller under dess [`test/`](https://github.com/canax/controller/tree/master/test) katalog. Du kan också läsa i modulens README om tankar kring enhetstestning av kontrollern.

Kan du maximera din kodtäckning, med eller utan kontrollerklassen?



Krav {#krav}
-----------------------

1. Flytta din kod från dina routes och lägg dessa istället i en kontroller-klass.

1. Använd dig av trait och interface för att visa ett histogram över de tärningskast som görs under en spelrunda. En spelrunda är samtliga tärningsslag som spelaren och datorn slår under hela spelet, tills spelet startas om från början. Lägg in så att histogrammet visas.

1. Gör så att datorspelaren blir "intelligent" och har en medveten taktik när den spelar spelet. Det finns ingen speciell nivå av taktik som du måste nå, men någon form av tydliga beslut baserade på spelets nuvarande ställning och/eller tärningens historik är rimliga att förvänta sig.

1. Koppla loss din kod från `$_GET, $_POST, $_SERVER och $_SESSION` och använd ramverkets lager av `Anax\Request` och `Anax\Session`. Syftet är att göra din kod "mer ramverkskorrekt" och "mer testbar".

1. Skriv enhetstester för alla dina egna klasser i spelet, exklusive kontroller-klassen. Varje klass skall täckas av rimligt antal testfall. Försök nå så hög kodtäckning som möjligt. Rimligt antal testfall per klass behöver du själv bestämma, överväg din tillgång av tid mot din ambition och förmåga.

1. Överväg att skriva enhetstester för din kontrollerklass (optionellt).

1. Ta en skärmdump på översikten av din code coverage och spara som `doc/class/codecoverage2.png` (bara små bokstäver). Låt din ambition bestämma hur många testfall du gör för varje klass och vilken kodtäckning du lyckas nå.

1. När du är klar så gör du `dbwebb publish`.



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter om du har tid och lust.

1. Gör din datorspelare riktigt smart och taktisk.

1. Visa upp mer statistik när spelet pågår. 

1. Nå kodtäckning om 100% på dina egna klasser.

1. Träna på din förmåga av User Expericence (UX), användarens upplevelse, och gör ett riktigt trevligt användargränssnitt för spelet.



Tips från coachen {#tips}
-----------------------

**Lycka till och hojta till i forumet om du behöver hjälp!**
