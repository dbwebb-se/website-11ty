---
author:
    - mos
revision:
    "2017-08-08": "(A, mos) Första utgåvan."
...
Kmom01: Ramverk
==================================

Vi tar en mjukstart för att komma in i ramverkstänkande och läser på om bra-att-ha kunskaper inom PHP och ramverk. Det handlar om nödvändiga verktyg och att nyttja den infrastruktur som finns kring PHP och att anamma ett PHP modul-tänkande. 

Vi tittar på ett par seminarier från konferenser och funderar på vad de försöker säga oss om aktuella tekniker och trender. Kanske kan det hjälpa oss när vi nu skall försöka skapa oss en egen bild av ramverksläget i PHP och om allmänna interna strukturer och designmänster i ramverk.

<!--more-->

[FIGURE src=image/snapht17/ramverk1-me.png caption="Kataloger och filer på plats i grunden till en Anax me-sida för kursen ramverk1."]


<!--
Kommentarer från oophp-v4 

Introducera backenden till eshopen?
Embryo till eshop sql?

(registrera användare, admin av användare)

Kundvagn
Enhetstesta kundvagn

Inloggning
Enhetstesta inloggning

Guide abstract methods, classes, final interface, trait

Funktionstestning?
Enklare sådan, typ curl?

mockup
prepare testcase, prepare testclass, make mockobject.

Test a trait, interface, abstract class?
Enklare funktionstester.

Enhetstestning mot databas?
-->


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Förkunskaper {#forkunskaper}
---------------------------------

Denna kurs bygger vidare på det du lärt dig under första året på programmet Webbprogrammering och de kurserna du tagit. Även om du har några kurser/kmom släpande efter dig så bör du dock kunna komma igång med kursen då inledningen är av karaktären läs, se och reflektera.

Teknikmässigt bygger kursen främst vidare på strukturen du känner igen från kurserna design och oophp. Vi kodar vidare i Anax som får en uppgraderad struktur av designmönster och modularitet.

Det förekommer skrivuppgifter som man med fördel kan göra i grupp, så skaffa dig en studiekompis eller två, för att hitta någon att diskutera med och för att hjälpas åt med skrivandet.



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Det första du behöver göra är att installera en labbmiljö för kursen. Se till att du har gott om tid när du gör detta.

1. Du kan börja med att [installera labbmiljön](./../labbmiljo) som behövs för kursen. 

1. [Uppdatera kommandot `dbwebb`](dbwebb-cli/selfupdate).

1. Du kan nu [ladda ned (klona) ditt lokala kursrepo `ramverk1`](dbwebb-cli/clone) som innehåller kursmaterial för kursen.



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*


###Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Läs igenom [PHP The Right Way](http://www.phptherightway.com/). Det ger dig en allmän översikt om verktyg och processer som rekommenderas inom PHP communityn. Gör din egen kunskapsinventering och se vilka delar du kan, vilka delar du behöver bli bättre på och vilka delar har du ännu inte koll på? Du skriver resultatet som en del i din redovisningstext.

1. För ett par år sedan kikade jag på vilka PHP ramverk som var mest populära. Läs artikeln på "[Vilka blir de mest populära PHP-ramverken inför 2014?](blogg/vilka-blir-de-mest-populara-php-ramverken-infor-2014)". Gör sedan din egen (mini) undersökning för att finna mer aktuella resultat för att se vilka ramverk som för tillfället är mest populära inom PHP. Utför gärna arbetet i grupp så har du någon att diskutera med. Du skriver resultatet som en del i din redovisningstext.



###Videor {#videor}

Kika på följande videos.

1. Titta på videon "[PHP UK Conference 2017 - Eli White - State of the PHP Community](https://www.youtube.com/watch?v=1vFycFnVhaw)". Den ger dig en känsla av hur en community kring ett språk (PHP) kan fungera, på gott och ont. Fundera över utmaningar som ligger i att hålla en community levande och om det finns någon nytta med en commity.

1. Titta på videon "[PHP UK Conference 2017 - Michael Cullum - Towards a frameworkless world](https://www.youtube.com/watch?v=aFhwnjFF96I)". Den ger dig en bakgrund och översikt till PHP och ramverk och den föreslår en ramverkslös framtid. Håller du med föredragshållaren?



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Bygg ett ramverkslöst ramverk](kunskap/bygg-ett-ramverkslost-ramverk)" som ger dig grunden till en webbplats baserad på komponenter. Du känner igenom koden från oophp och design. Du sparar koden i `me/anax`.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Bygg en me-sida till ramverk1](uppgift/bygg-en-me-sida-till-ramverk1)". Det handlar om att bygga din me-sida med Anax och publicera på Github. Spara allt under `me/anax`.

1. Gör uppgiften "[Förbered för att bygga ett kommentarssystem](uppgift/forbered-for-att-bygga-ett-kommentarssystem)". Detta är introduktion till en uppgift som följer med dig genom kursen, ta tillfället i akt och fundera över din kodstruktur. Spara eventuell kod under `me/anax`.

1. Pusha och tagga ditt Anax, allt eftersom och sätt en avslutande tagg (1.0.\*) när du är klar med kursmomentet.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 3-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i detta inledande momentet då redovisningstexten är mer omfattande än du är van vid.

Se till att följande frågor besvaras i texten:

* Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.
* Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?
* Berätta om din syn/erfarenhet generellt kring communities och specifikt communities inom opensource och programmeringsdomänen.
* Vad tror du om begreppet "en ramverkslös värld" som framfördes i videon?
* Hur gick dina förberedelser inför kommentarssystemet?

Har du frågor eller funderingar så ställer du dem i forumet.


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
