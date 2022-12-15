---
author: mos
category:
    - php
revision:
    "2019-04-12": "(G, mos) Genomgången och mer krav om enhetstester."
    "2018-09-10": "(F, mos) Nytt krav om att göra enhetstester."
    "2018-03-26": "(E, mos) Uppdaterad inför oophp-v4."
    "2017-03-17": "(D, lew) Ny version för oophp-v3."
    "2014-03-19": "(C, mos) Förtydligande om lite kod i sidkontrollern."
    "2013-08-16": "(B, mos) Gjorde valbara krav till obligatoriska."
    "2013-08-14": "(A, mos) Första utgåvan i samband med oophp version 2."
...
Tärningsspel 100
==================================

Tärningsspelet 100 är ett enkelt och trivsamt tärningsspel. Spelet spelas med en eller flera tärningar och det gäller att samla ihop poäng för att komma först till 100.

I varje omgång kastar en spelare tärningarna tills hon väljer att stanna och spara poängen, eller tills det dyker upp en 1:a och hon förlorar alla poäng som samlats in i rundan. Rundan går då över till nästa spelare. Det gäller att komma först till 100.

I uppgiften får du möjlighet att bygga klasser för tärning, tärningshand, spelrunda och själva spelet. Du väljer själv vilken struktur du vill ha på klasserna och hur de skall samverka.

<!--more-->

Du jobbar också med enhetstestning och försöker bygga testbara enheter (klasser) som du skriver testfall för.

<!--
Ett tärningsspel i Anax kan se ut så här.

[FIGURE src=/image/oophp/v3/dice100.png?w=w1&q=70 caption="Ett tärningsspel i Anax."]
-->

[YOUTUBE src="q_TewfhHukI" width=700 caption="Mikael visar kort hur du kan göra ett klassdiagram i draw.io och exportera till pdf."]



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom delen med "Arv och Komposition" i guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)".

Du har löst uppgiften "[Kom igång med PHPUnit](uppgift/kom-igang-med-phpunit)" och vet hur enhetstester fungerar.



Spelregler tärningsspelet 100 {#regler}
-----------------------

Följande är generella regler för tärningsspelet 100.

Man kan vara två eller fler spelare. Man kan spela med en eller flera tärningar.

Alla spelare kastar en tärning och den som får högst börjar spelet med en spelrunda.

Notera alla spelare på ett papper, protokollet, det gäller att först samla på sig 100 poäng.



### Spelrunda {#spelrunda}

En spelrunda inleds av en spelare genom att den kastar alla tärningar.

Alla tärningar med ögon 2-6 summeras och adderas till totalen för nuvarande spelrunda. En tvåa är värd 2 poäng och en sexa är värd 6 poäng, och så vidare.

Spelaren bestämmer om ett nytt kast skall göras inom samma spelrunda för att försöka samla mer poäng. Eller så väljer spelaren att avbryta spelrundan och föra över de insamlade poängen till säkerhet i protokollet.

Om spelaren kastar en etta så avbryts spelrundan och turen går över till nästa spelare. Nuvarande spelare förlorar alla poäng som samlats in i nuvaranade spelrunda.



### Enhetstester inuti ramverket {#enhetstest}

Skapa en testsvit som testar dina egna klasser inuti ramverket. Du har redan en grund i katalogen `me/redovisa/test`. Där finns ett exempel på en testklass och en konfigurationsfil.

Konfigurationsfilen är främst för att inkludera autoloadern när PHPUnit körs.

Du har redan en konfigurationsfil för PHPUnit i `me/redovisa/.phpunit.xml`. Den bestämmer vilka kataloger som skall testas och ligga som grund för beräkning av kodtäckning. I ursprungsläget är det katalogen `src/` som är aktuell. 

Nu kan du exekvera din testsvit som för tillfället inte innehåller speciellt många testfall.

```text
make phpunit
```

Eller så kör du både enhetstester och alla valideringsverktyg via `make test`.



### Integrera med ramverkets klasser {#ramverk}

Försök att undvika att du i dina klasser använder direkt access till PHPs globala variabler som GET, POST, SERVER och SESSION.

Ramverket erbjuder ett par klasser som är ett lager över PHP's globala variabler samt erbjuder vanliga bra att ha saker.

| Anax klasser | Löser vad? |
|--------------|------------|
| [`Anax\Request`](https://github.com/canax/request/blob/master/src/Request/Request.php) [README](https://github.com/canax/request/blob/master/README.md) | Löser tillgång till `$_GET, $_POST, $_SERVER` och innehåller detaljer om requesten. |
| [`Anax\Session`](https://github.com/canax/session/blob/master/src/Session/Session.php) [README](https://github.com/canax/session/blob/master/README.md) | Löser tillgång till `$_SESSION`. |

Generellt är tanken med dessa klasser att ramverket kopplar loss dig från direkt access till globala variabler och erbjuder bättre möjligheter att testa din kod genom att till exempel från testkoden injecta innehållet till motsvarigheten av `$_GET, $_POST, $_SERVER`.

En annan sak som löses är att sessionen fungerar även när koden körs som CLI under `make test`.

Det handlar delvis om att göra koden mer testbar och det handlar om hyffs och vett att undvika direkt tillgång till globala variabler.



Krav {#krav}
-----------------------

1. Gör så att en spelare kan spela tärningsspelet 100 via din redovisa sida (lägg länken i navbaren). Datorn är din motspelare.

1. Bygg ditt spel med klasser som samverkar. Du kan själv välja vilka klasser du skapar och hur de samverkar.

1. Rita/skissa på ett UML-diagram för klasserna, ett klassidagram. Rita i ett verktyg (dia, draw.io, etc) eller rita på ett papper (och scanna in/fotografera). Spara ditt diagram i filen `doc/class/dice100.pdf`.

1. Tips. Se till att du har minimalt med kod i routens hanterare, flytta spelets logik till klasserna.

1. Tips. Tänk på att skriva kod och klasser som är testbara med enhetstester. Små klasser, små metoder.

1. Tips. Det kan underlätta att undvika att använda $\_GET, $\_POST, $\_SESSION inuti klasserna, lägg dem istället som ett lager i routen, läs av dem och bifoga värdena vid behov in i klassen via argument i metoderna.

1. Skriv enhetstester för alla dina egna klasser i spelet. Varje klass skall täckas av minst tre testfall. Försök nå så hög kodtäckning som möjligt.

1. Ta en skärmdump på översikten av din code coverage och spara som `doc/class/codecoverage.png` (bara små bokstäver). Låt din ambition bestämma hur många testfall du gör för varje klass och vilken kodtäckning du lyckas nå.

1. När du är klar så gör du `dbwebb publish`.



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter om du har tid och lust.

1. Jobba på att förbättra UX-biten, användarens upplevelse av spelet (User Experience). Gör ett snyggt och smidigt gränssnitt så det blir trevligt att spela.

1. Gör det flexibelt så man kan använda valbart antal tärningar när man spelar spelet.

1. Försök göra datorn mer intelligent när den spelare spelet. Försök göra så att datorn tar olika beslut i spelet, beroende av motspelarens poäng eller baserat på andra värden.



Tips från coachen {#tips}
-----------------------

**Lycka till och hojta till i forumet om du behöver hjälp!**
