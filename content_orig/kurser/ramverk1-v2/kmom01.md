---
author:
    - mos
revision:
    "2018-11-05": "(B, mos) Uppdaterad inför v2, nya uppgifter."
    "2017-08-08": "(A, mos) Första utgåvan."
...
Kmom01: Ramverk
==================================

Vi tar en mjukstart för att komma in i ramverkstänkande och läser på om bra-att-ha kunskaper inom PHP och ramverk. Det handlar om nödvändiga verktyg och att nyttja den infrastruktur som finns kring PHP och att börja anamma ett modultänkande kring PHP och ramverk.

Vi tittar på ett par seminarier från konferenser och funderar på vad de försöker säga oss om aktuella tekniker och trender. Kanske kan det hjälpa oss när vi nu skall försöka skapa oss en egen bild av ramverksläget i PHP och om allmänna interna strukturer och designmänster i ramverk.

Vi skapar en sedvanlig me- och redovisa-sida med ramverket vilket kräver att vi sätter oss in i ramverkets grundstruktur.

För att komma igång med programmeringen i ramverket så bygger vi en mindre kontroller som fungerar som en webbsida och som en REST-server. Vi skapar enhetstester för kontrollern och når 100% kodtäckning.

<!--more-->

[FIGURE src=image/snapht18/ramverk1-me.png?w=w3 caption="Vi startar med en me-sida som bygger på ett ramverk med en modulär struktur."]


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>


<!--

OOPHP.

* Lär dem controller fullt ut. Så kan vi bygga REST controller i kmom01.
* Travis?


Inför uppdatering.

Allmänt om ramverk. Prata om deras uppbyggnad.
Prata om designmönster, visa upp några vanliga mönster som används i ramverkssammanhang.
Skrivuppgift om ramverk/designmönster.

Bygg en controller och enhetstesta den.

Bygg en RESTserver som erbjuder en tjänst (ip validering).
(servern borde även erbjuda mer saker)

(fetch mot REST server? exempel)

Bygg en webbplats (controller) som använder restserverns tjänster.

Koppla direkt mot travis, som byggtjänst.

Använd anax manual som guide. Ge enkel uppgiftsbeskrivning utan någon extra hjälp. Studenten bygger från grunden.

Kanske samma upplägg i oophp, när studenten skall komma in i ramverket. Använd scaffolding för att förenkla, jobba mot en och samma version av Anax.

Fixa in travis (Circleci) i kmom01? Som en avslutning?

Scaffolda controller, full och minimal.

Allt skall fungera smärtfritt i docker.


JS på klientsidan. Det vore bra om vi kunde visa, och integrera, lite JS på klientsidan för att jobba med fetch och websockets mot server/REST server.
    * Visar hur man kan jobba med serverside vyer och itnegrera med klientside js kanske.

-->



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Det finns en [längre beskrivning om kursens labbmiljö](./../installera-labbmiljo). Läs den om du är osäker på vad som skall göras.

Den korta varianten är att du behöver [installera labbmiljön](./../labbmiljo), uppdatera [dbwebb-cli](dbwebb-cli) samt klona och initiera kursrepot.

```text
# Gå till din katalog för dbwebb-kurser
dbwebb selfupdate
dbwebb clone ramverk1
cd ramverk1
dbwebb init
```



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*


### Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Läs igenom [PHP The Right Way](http://www.phptherightway.com/). Det ger dig en allmän översikt om verktyg och processer som rekommenderas inom PHP communityn. Gör din egen kunskapsinventering och se vilka delar du kan, vilka delar du behöver bli bättre på och vilka delar har du ännu inte koll på? Du skriver resultatet som en del i din redovisningstext.

1. För ett par år sedan kikade jag på vilka PHP ramverk som var mest populära. Läs artikeln på "[Vilka blir de mest populära PHP-ramverken inför 2014?](blogg/vilka-blir-de-mest-populara-php-ramverken-infor-2014)". Gör sedan din egen (mini) undersökning för att finna mer aktuella resultat för att se vilka ramverk som för tillfället är mest populära inom PHP. Utför gärna arbetet i grupp så har du någon att diskutera med. Du skriver resultatet som en del i din redovisningstext.



### Videor {#videor}

Kika på följande videos och kommentera dem i redovisningstexten.

1. Titta på videon "[PHP UK Conference 2017 - Eli White - State of the PHP Community](https://www.youtube.com/watch?v=1vFycFnVhaw)". Den ger dig en känsla av hur en community kring ett språk (PHP) kan fungera, på gott och ont. Fundera över utmaningar som ligger i att hålla en community levande och om det finns någon nytta med en commity.

1. Titta på videon "[PHP UK Conference 2017 - Michael Cullum - Towards a frameworkless world](https://www.youtube.com/watch?v=aFhwnjFF96I)". Den ger dig en bakgrund och översikt till PHP och ramverk och den föreslår en ramverkslös framtid. Håller du med föredragshållaren?



### Genomgångar {#video1}

De genomgångar och föresläsningar som spelas in under kursen sparas i en spellista som uppdateras under kursens gång.

* [ramverk1 streams ht20](https://www.youtube.com/playlist?list=PLKtP9l5q3ce85Cdvu2iycOb4d4OXle_o7).

Du kan även finna äldre inspelade föreläsningar från tidigare kursomgångar.

* [ramverk1 streams ht19](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-kBGV_-kmGIdbJYGgZ2_TW).



### Ramverket Anax {#anax}

Vi kommer jobba vidare i ramverket Anax, som du känner igen från oophp och design-kursen. Här är de moduler som du använde i oophp-kursen, inklusive badges om kodtäckning och kodkvalitet för respektive modul. Kika på modulens README om du behöver fräscha upp minnet.

| Modul | Kodtäckning | Kodkvalitet |
|-------|-------------|-------------|
| [anax/commons](https://github.com/canax/commons) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/commons/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/commons/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/commons/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/commons/?branch=master)
| [anax/controller](https://github.com/canax/controller) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/controller/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/controller/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/controller/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/controller/?branch=master)
| [anax/database](https://github.com/canax/database) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/database/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/database/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/database/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/database/?branch=master)
| [anax/request](https://github.com/canax/request) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/request/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/request/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/request/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/request/?branch=master)
| [anax/response](https://github.com/canax/response) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/response/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/response/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/response/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/response/?branch=master)
| [anax/router](https://github.com/canax/router) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/router/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/router/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master)
| [anax/session](https://github.com/canax/session) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/session/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/session/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/session/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/session/?branch=master)
| [anax/textfilter](https://github.com/canax/textfilter) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/textfilter/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/textfilter/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/textfilter/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/textfilter/?branch=master)
| [anax/view](https://github.com/canax/view) | [![Code Coverage](https://scrutinizer-ci.com/g/canax/view/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/view/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/view/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/view/?branch=master) 



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*


<!--
###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Bygg ett ramverkslöst ramverk](kunskap/bygg-ett-ramverkslost-ramverk)" som ger dig grunden till en webbplats baserad på komponenter. Du känner igenom koden från oophp och design. Du sparar koden i `me/anax`.
-->


### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Bygg en redovisa-sida till ramverk1 (v2)](uppgift/bygg-en-me-sida-till-ramverk1-v2)". Du behöver en me/redovisa-sida och vi använder ramverket Anax för att bygga den. Spara allt under `me/redovisa`.

1. Gör uppgiften "[En kontroller för att validera ip-adresser](uppgift/en-kontroller-for-att-validera-ip-adresser)". Spara koden under `me/redovisa`.

<!--
1. Gör uppgiften "[Förbered för att bygga ett kommentarssystem](uppgift/forbered-for-att-bygga-ett-kommentarssystem)". Detta är introduktion till en uppgift som följer med dig genom kursen, ta tillfället i akt och fundera över din kodstruktur. Spara eventuell kod under `me/anax`.
-->

1. Pusha och tagga din redovisa, allt eftersom och sätt en avslutande tagg (1.0.\*) när du är klar med kursmomentet.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 3-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i momentet då redovisningstexten är aningen mer omfattande än normalt.

Se till att följande frågor besvaras i texten:

* Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under kursen och det kommande året.
* Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?
* Berätta om din syn/erfarenhet generellt kring communities och specifikt communities inom opensource och programmeringsdomänen.
* Vad tror du om begreppet "en ramverkslös värld" som framfördes i videon?
* Hur gick det att komma igång med din redovisa-sida?
* Några funderingar kring arbetet med din kontroller?
* Vilken är din TIL för detta kmom?

TIL är en akronym för "Today I Learned" vilket leksamt anspelar på att det finns alltid nya saker att lära sig, varje dag. Man brukar lyfta upp saker man lärt sig och där man kanske hajade till lite extra över dess nyttighet eller enkelhet, eller så var det bara en ny lärdom för dagen som man vill notera.

Har du frågor eller funderingar som du vill ha besvarade så ställer du dem i GitHub issues.


<!--stop-->

RAMVERK1:

Röd tråd:
---------------------------------
Software engineering, ebok
Software development processes
XP, Agile
software quality assurance
Deployment, Maintenance, Support
Software architecture
Design patterns

Pre:
---------------------------------
Ny kodstandard js.
lokal utvecklingsmiljö och testverktyg

01: (kom igång, även ci med enhetstestning)
---------------------------------
Använd Anax med moduler till me-sida.
Anax med DI, MVC (inkl flat file)
Service container/locator, Inversion of control, SOLID, lazy instantiation/initialisation (by class or by configuration) (egen artikel om injection?) (Typehinting on method arguments)
Titta på REM-server som flyttar koden till domän-modul.
Samt Flatfilecontent-module (som exempel på mer fristående modul)
Enhetstestning av domänmodul, samt packagist, travis (scrutinizer, circleci)
flat file med frontmatter

02: Formulär och Ajax
---------------------------------
anax/form
login och search-form
User login, registrering, aktivering (usability) med ajax. (cookies)
ajaxifiera formulären
modulifiera koden
Kan testas TDD, BDD eller Selenium?
uppgift: gör liknande med egen modul inkl tester (ajax bild upload POST/FILES)


03: Databasdrivna modeller
---------------------------------


04: Ramverkets glue
---------------------------------
middleware
Exempel på middleware, skriv eget och gör som paket på packagist.
eventlisteners, event in framwork
logger


05: Egen modul och tjänst
---------------------------------
(likt phpmvc/kmom05)
Egen dummy-modul (valutakonverterare, datum, kalender, namn, rot, etc), till egna paket packagist (domänmodul till Anax)
eget webbplats för trafik och reklam?
Reklam på webben



06: Systemtest och optimering
---------------------------------
debug och profiling med Xdebug
Debugging med Xdebug
prestandatestning
prestandamätningar, analyser
Systemtest



03:
Cachning, nyhetsplanet, rss-flöde. RSS-modul, Cache-modul (PSR?)
Caching (som modul anax/cache, möjligen PSR)
Kan byggas med BDD?
(domänmoduler)


0x:
Continous integration, fixa en extern validator/badge per kmom.
Grönt efter varje kmom.


0x: (likt phpmvc/kmom04 men splitta upp i delar, viktigt kmom)
MVC (kontroller och modeller)
kontroller versus router, specifika up/down-metoder
dispatching, forward
Databasdrivna modeller (med formulär), olika databaspatterns från phpmvc/kmom04 med SQLQueryBuilder
Kompabilitet databas (sqlite, mysql, postgresql) med SQL Query Builder
scaffolding
HMVC

0x:
visa bilder på olika sätt, bildspel (ajax?)
(zend module?)


0x: Testning
TDD/BDD Testning (phpunit och behat)
Testning (docker och selenium)
Testing (travis, circle, scrutinizer, https://codeclimate.com/, https://coveralls.io/)
Olika versioner av PHP i XAMPP/Docker
enhetstest o doc dag 1
Test doubles, db test, BDD
Guide: Writing Testable Code
Behat
Selenium
Enhetstestning databas
PHPUnit (exception, setup, teardown, database, mocking, providers)
travis, scrutinizer, circle
docker (olika versioner av PHP, databas, egen testmiljö)


0x: Säkerhet
OWASP
Hur escapa på rätt sätt, RFC, url, mot OWASP, tesfall för säkerhet.
* CValidate (eller bätre med Zendmodul?)


Övrigt:
SEO
Om RFC, exempel där man måste läsa RFC.
phpuml (integrera i resp modul)
(Olika språk, anpassa med int/loc) (internationalisering)



RAMVERK2:
---------------------------------

01:
---------------------------------
Express.js, routes, någon tjänst?
AJAX.

0x:
Flex mm? Hur förhåller sig till Mithril?

01:
Ny kodstandard js som exempel på npm-modul.
Bygg egen npm-modul (använd i Express).

02:
---------------------------------
Websockets
Realtime web
Chatt (express.js)
Chatt
Pusha notiser till användaren (desktop/mobil) när saker uppdateras.
Nån social media/chatt-grej med visst fokus (telegram etc)

0x:
datavisualisering med JS https://d3js.org/, googles api, http://www.chartjs.org/
maps, html5 api

0x:
JS test (klient/server)


Exempel uppgifter:
- Generera nyhetsbrev (från info-flödet av news)
- Matchning ala rekrytering
- search i databaser, sökmotor (artiklar, information, slå ihop databaser från andra källor)
- Kommentarssystem, forum, SO


Externa kopplingar:
* Koppling faktureringsmotor


Tema:
* Big data
* Cloud (docker containers)
* Redis (key value data store, caching)

Övrigt:
* Desktop GUI (Atom)
