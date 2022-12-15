---
author: mos
category:
    - php
    - anax
    - kursen oophp
revision:
    "2018-04-16": "(B, mos) Uppdaterade stycket om enhetstester."
    "2018-04-16": "(A, mos) Första utgåvan i samband med oophp version 4."
...
Uppdatera 100-spelet med intelligens
==================================

[FIGURE src=image/snapvt18/fair_dice_probability_distribution.png?w=c5&a=0,0,0,0&cf class="right"]

Du skall jobba vidare med ditt 100 spel och du skall tillföra intelligens till datorspelaren. Tanken är att spelet kan spelas av två spelare där du är den ena och datorn är den andra. Datorn behöver ta beslut om när den skall stanna och fortsätta sin slagserie och du behöver skriva koden som styr datorns beslut.

Under spelets gång så skall du presentera ett histogram för spelarna. Kanske går det att använda till att ta beslut, kanske inte. Annars blir det trevlig kuriosa och statistik kring spelet.

<!--more-->

När du ändå inför stödet för datorn så låter du användaren också se samma data som datorn har tillgång till. Då kan du få en rättvis kamp mellan datorn och spelaren. Spelaren kan se all statistik i den nuvarande spelet och kan ta beslut baserat på informationen.

När du är klar ser du till att införa en testsvit som har testmetoder som täcker alla dina klasser i en rimlig kodtäckning, givet tiden du har.



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom delen med "Trait och Interface" i guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)".

Du har löst uppgiften "[Tärningsspel 100](uppgift/tarningsspel-100)" inuti din me-sida.

Du har löst uppgiften "[Kom igång med PHPUnit](uppgift/kom-igang-med-phpunit)" som guidar dig igenom de första stapplande stegen i enhetstestning.



Introduktion och förberedelse {#intro}
-----------------------

Gå igenom följande steg för att förbereda dig inför uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[Uppgiften "Uppdatera 100-spelet med intelligens" (kursen oophp)](https://www.youtube.com/playlist?list=PLKtP9l5q3ce9TiwWWXidbhCgrNVCC-lar)".

[YOUTUBE src="y97x3kdM-y8" list="PLKtP9l5q3ce9TiwWWXidbhCgrNVCC-lar" width=700 caption="Mikael visar hur du jobbar igenom delar av uppgiften."]



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



### Integrera med ramverkets klasser {#ramverk}

När du inför histogrammet och datorns beslutsfattande skall du även se över så att din kod inte använder några PHP globala variabler som GET, POST, SERVER och SESSION.

Ramverket erbjuder ett par klasser som är ett lager över PHP's globala variabler samt erbjuder vanliga bra att ha saker.

| Anax klasser | Löser vad? |
|--------------|------------|
| [`Anax\Response`](https://github.com/canax/response/blob/master/src/Response/ResponseUtility.php) | Skicka svar tillbaka, eller gör redirect till en annan route. |
| [`Anax\Request`](https://github.com/canax/request/blob/master/src/Request/Request.php) [README](https://github.com/canax/request/blob/master/README.md) | Löser tillgång till `$_GET, $_POST, $_SERVER` och innehåller detaljer om requesten. |
| [`Anax\Session`](https://github.com/canax/session/blob/master/src/Session/Session.php) [README](https://github.com/canax/session/blob/master/README.md) | Löser tillgång till `$_SESSION`. |

Generellt är tanken att ramverket kopplar loss dig från globala variabler och erbjuder bättre möjligheter att testa din kod genom att till exempel från testkoden injecta innehållet till motsvarigheten av `$_GET, $_POST, $_SERVER`.

En annan sak som löses är att sessionen fungerar även när koden körs som CLI under `make test`.

När man skriver sin ramverkskod så vill man normalt undvika direkt tillgång till PHP's globala systemvariabler.



### Enhetstester inuti ramverket {#enhetstest}

Skapa en testsvit som testar dina egna klasser inuti ramverket. <s>Du börjar med att skapa en katalog för testklasserna tillsammans med dess konfigfil.</s> Du har redan en grund i katalogen `me/redovisa/test`. Där finns ett exempel på en testklass och en konfigurationsfil.

Konfigurationsfilen är främst för att inkludera autoloadern när PHPUnit körs.

Du har redan en konfigurationsfil för PHPUnit i `.phpunit.xml`. Den bestämmer vilka kataloger som skall testas. I ursprungsläget är det katalogen `src/`. 

Nu kan du exekvera din testsvit som för tillfället inte innehåller speciellt många testfall.

```text
make phpunit
```

Eller så kör du en komplett testsuite med samtliga test och valideringsverktyg via `make test`.

Nu kan du börja bygga upp din testsvit för din `me/redovisa`.



Krav {#krav}
-----------------------

1. Använd dig av trait och interface för att visa ett histogram över de tärningskast som görs under en spelrunda. Lägg in så att histogrammet visas under spelrundan.

1. Gör så att datorspelaren blir intelligent och har en medveten taktik när den spelar spelet. Det finns ingen speciell nivå av taktik som du måste nå, men någon form av tydliga beslut baserade på spelets nuvarande ställning och/eller tärningens historik är rimliga att förvänta sig.

1. Koppla loss din kod från `$_GET, $_POST, $_SERVER och $_SESSION` och använd ramverkets lager av `Anax\Response`, `Anax\Request` och `Anax\Session`.

1. Skriv testfall så att du i någon mån täcker dina egna klasser. Ta en skärmdump på översikten av din code coverage och spara som `doc/class/codecoverage.png` (bara små bokstäver). Låt din ambition bestämma hur många testfall du gör för varje klass och vilken kodtäckning du vill nå. Sikta på minst ett par testfall per klass.

1. När du är klar så gör du `make test` för att kontrollera att din testsvit fungerar och sedan gör du en `dbwebb publish`.



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter om du har tid och lust.

1. Gör din datorspelare riktigt smart och taktisk.

1. Visa upp mer statistik när spelet pågår. 

1. Nå kodtäckning om 100% på dina egna klasser.

1. Gör ett trevligt användargränssnitt för spelet.



Tips från coachen {#tips}
-----------------------

**Lycka till och hojta till i forumet om du behöver hjälp!**
