---
author: mos
category: php
revision:
  "2014-04-25": (A, mos) Första utgåvan i samband kursen phpmvc-v2.
updated: "2014-04-25 11:49:53"
created: "2014-04-25 11:49:51"
...
Bygg ut ditt Anax MVC med en egen modul och publicera via Packagist
==================================

När du väl har bekantat dig med grunderna i Anax MVC så kommer du till ett steg där det tar stopp i vad ramverket stödjer. Du behöver utöka det med egen kod och kanske skapa din egna modul som andra kan återanvända i sina egna ramverk.

Låt pröva hur det fungerar. Ta ditt egna ramverk, det som bygger på Anax MVC, och utveckla det med en ny modul, ett paket. Du skall göra en egen modul, som du lägger i ett eget GitHub repo och sedan publicerar som ett paket på Packagist. 

<!--more-->

Det spelar egentligen inget större roll hur stort ditt paket är, bara det är ett vettigt paket som du vill ha i ditt ramverk. Det viktiga är hanteringen kring paketet. Jag kommer i denna artikeln att ge dig några tips på bra-att-ha moduler i ett ramverk.

Sen är det självklart roligare att göra ett paket som andra har nytta av att använda. Välj väg.



Vad skall mitt ramverk stödja? {#stod}
------------------------------

Du behöver nu fundera, vad saknar du i ditt ramverk? Välj en lagom modul som du kan utveckla från grunden, eller förädla om du redan har en befintlig kodbas. Sedan ska jag försöka hjälpa dig att publicera den på Packagist. 

Tänk på att det krånglar säkert när du börjar integrera ditt nya GitHub repo till Packagist och när du skall testa och dokumentera. Välj lagom storlek på din modul (KISS), men gör den ändå intressant för andra att ta del av. 

Här kommer mina tips på moduler som jag själv skulle vilja ha i mitt ramverk.



Loggning och Cachning {#cachning}
------------------------------

Ibland kommer man till en punkt där ens lösning är för långsam. Det hände mig med ramverket Lydia som ligger bakom dbwebb.se.

Här är en artikel om hur jag löste det: "[Att spåra ett prestandaproblem i en webbplats](kunskap/att-spara-ett-prestandaproblem-i-en-webbplats)".

Som ett resultat av det arbetet fick jag fram två klasser. 



###CLog för att logga händelser {#clog}

Jag skapade en [CLog](https://github.com/mosbth/lydia/blob/master/src/CLog/CLog.php) som jag använder för att tidsstämpla händelser i ramverkets kod. Sedan kan jag avläsa differensen mellan tidsstämplarna och se var koden tillbringar mest tid.

I slutet av webbsidan skriver jag ut en tabell över alla tidsstämplar och differensen mellan dem. Det kan vara ett bra och enkelt verktyg för att analyser hur ens kod beter sig.



###CCache för att cacha innehåll på fil {#ccache}

Lösningen på mina prestandaproblem var att introducera cachning av innehållet. Det som tog tid var en metod i CTextFilter och genom att cacha allt innehåll (sidor, bloggposter, etc) så sparar jag en kopia av den genererade texten på fil. Det är alltså en filbaserad cache-lösning. Koden i [CCache](https://github.com/mosbth/lydia/blob/master/src/CCache/CCache.php) är inte särskilt stor.

En filbaserad cache är bra att ha.



###Phalcon om cachning {#phalcon-cache}

Ramverket Phalcon har två artiklar om cachning, dels är det en artikel om databasrelaterad cachning som heter "[Caching in the ORM"](http://docs.phalconphp.com/en/latest/reference/models-cache.html)" och en mer generell om "[Improving Performance with Cache](http://docs.phalconphp.com/en/latest/reference/cache.html)"

Klasser som CLog och CCache är två goda alternativ att implementera.



Publicera RSS-flöde {#rss}
------------------------------

En webbplats om hanterar innehåll behöver också presentera ett flöde över de senaste inläggen, detta gör man vanligen via ett RSS-flöde från webbplatsen.

Webbplatsen dbwebb.se har [flera sådana RSS-flöden](rss), här kan du se ett av dem, [http://dbwebb.se/blogg/rss](blogg/rss)

I ramverket Lydia finns en klass [CMRSSFeedCreate](https://github.com/mosbth/lydia/blob/master/src/CMRSSFeedCreate/CMRSSFeedCreate.php) som skapar ett RSS-dokument utifrån ett antal artiklar som skickas in till objektet. Klassen ger dig en grund för hur du kan skapa en egen klass som genererar ett RSS-flöde utifrån ditt valda innehåll.

När du är klar så testar du ditt resultat genom att köra det genom [W3C Feed Validator](http://validator.w3.org/feed/).



Hämta RSS-flöde och publicera {#rss-get}
------------------------------

På dbwebb.se har vi [ögat](omvarldsbevakning) som håller koll på omvärldsbevakningen och senaste nytt i webbvärlden. Ögat har koll genom att läsa in och sammanföra ett antal RSS-flöden från webbplatser. 

Kodmässigt är det Lydia och klassen [CRSSFeed](https://github.com/mosbth/lydia/blob/master/src/CRSSFeed/CRSSFeed.php) som hämtar hem informationen. CRSSFeed använder sig av en extern modul, [SimplePie](http://simplepie.org/), för att göra detta.

Du kan ha nytta av att integrera SimplePie i ditt ramverk och sedan bygga en wrapperklass runt den som hjälper dig att hämta hem, bearbeta, och sammanställa RSS-flöden.



Visa flash-meddelande via sessionen {#flash}
------------------------------

När man utför något där man vill ge användaren feedback, behövs någon form av meddelande-tjänst. Ofta behöver meddelandet lagras i sessionen för att överleva en *redirect* mellan sidor. 

Ramverket Phalcon har en tjänst som hjälper till med detta, "[Flashing Messages](http://docs.phalconphp.com/en/latest/reference/flash.html)".

Du kan tillverka en liknande tjänst för ditt ramverk, där du lagrar undan information som du vill visa upp för användaren vid nästa sidvisning. Du behöver lite stöd i stylesheet och kanske även i temats template-fil. Men det beror på var du väljer att presentera informationen.

En flash-tjänst behövs i varje ramverk, antingen det är felmeddelanden, ren info eller meddelande som säger att något gick bra.



En egen Escape-klass {#escape}
------------------------------

I PHP använder vi funktionen `htmlentites()` för att *escapa* specialtecken när vi skriver ut dem i vyerna. Men, egentligen är escapandet mer avancerat än så. Många ramverk innehåller sin egen Escaper-klass och det ligger en [PHP RFC Escaper](https://wiki.php.net/rfc/escaper) som föreslår att det skall finnas med en bättre standardlösning i PHP.

En variant är att du utvecklar din egen Escaper, utgå ifrån den koden du ser i RFCn. 

Du kan också titta på [Phalcons Escaper-klass](http://docs.phalconphp.com/en/latest/api/Phalcon_Escaper.html) för inspiration och läsa stycket om "[Contextual Escaping](http://docs.phalconphp.com/en/latest/reference/escaper.html)" i manualen.

Glöm inte att visa hur du använder Escape-klassen i vyerna.



CLI och Scaffoldning {#scaffolding}
------------------------------

För att hantera scaffolding och skapa fördefinierad kod används ofta CLI, *Command Line Interface*. Ramverket Phalcon har ett [Phalcon Developer Tools](http://docs.phalconphp.com/en/latest/reference/tools.html) som hjälper till med sånt.

Du kan implementera ditt eget CLI-baserade verktyg som hjälper dig att hålla koll på ramverket och utföra scaffolding.



Förbättrad hantering av routes {#route}
------------------------------

Klassen som finns för att hantera routes är rätt enkel i Anax MVC. Den kan mappa en länk mot en route, ungefär som funktionen `strcmp()`. Men den är inte så bra på att hantera inkommande argument, på ett mer flexibelt sätt. Eller på att hantera validering av routens inkommande argument.

Läs först om hur Phalcons [hantering av routes](http://docs.phalconphp.com/en/latest/reference/routing.html) fungerar.

Sedan har du allt underlag till hur din klass som hanterar routes borde fungera. Men hur långt klarar du av att utveckla den?



Bygg ut CTextFilter {#text}
------------------------------

En kärna i att producera innehåll i en webbplats är att kunna skriva effektivt. I vårt fall har vi  klassen [Anax MVC CTextFilter](https://github.com/mosbth/Anax-MVC/blob/master/src/Content/CTextFilter.php) som hjälper oss. I ramverket Lydia finns klassen [CTextFilter](https://github.com/mosbth/lydia/tree/master/src/CTextFilter) med mer funktionalitet inbyggd, fler filter för att formattera texten.

Kan du bygga ut klassen CTextFilter med bättre hantering för att formattera texten på bästa sätt? Använd både egna shortcodes och externa moduler som hjälper dig att presentera innehållet på ett bra sätt.



Innehåll i databasen {#content}
------------------------------

I kursen oophp gjorde vi klasser för [Content, Blog och Page](oophp/kmom05) och sparade innehållet i databasen. Kan du flytta över den koden och integrera i ditt Anax MVC?

Bygger du ett CMF, Content Management Framework, så vill du säkert ha bra stöd för att hantera webbplatsens innehåll.



HTML helpers för att skapa HTML-kod {#helpers}
------------------------------

I vissa fall kan du ha ett behov av *HTML Helpers*, klasser som hjälper dig att skapa HTML-konstruktioner som du använder om och om igen. 

En sådan konstruktion, eller egentligen flera, skapade vi i oophp-kursen i kursmomentet med [film-databasen](oophp/kmom04). Det handlade om att visa innehållet från en databastabell i en HTML-tabell och lägga till hantering av CRUD-liknande operationer samt hantera paginering.

Här har du flera tänkbara kandidater, en klass för att visa en HTML-tabell, en klass för paginering, eller kanske till och med lite stöd för CRUD-hantering.

Med en bra uppsättning hjälpfunktioner kan det gå snabbt att skapa webbapplikationer.



Mer att göra {#mer}
------------------------------

Där har du fått ett antal förslag på moduler, men du kan säkert hitta på fler egna varianter. Ta en enkel som har en rimligt omfattning. Poängen är inte att göra en stor och komplex modul, även om det är trevligt. Poängen är att få helheten i att skapa modulen, hantera den på GitHub, skapa paketet på Packagist och sedan dokumentera och visa hur det är tänkt att fungera.

Tänk på att hanteringen runt omkring modulen, det tar säkert ett antal timmar (av strul) för att få ihop det första gången, och samtidigt bekanta dig med alla delar i processen.



Hur gör jag? {#hur}
------------------------------



###Eget repo på GitHub {#repo}

Lägg din kod i ett eget GitHub repo. Du kan studera mina repo för [CDatabase](https://github.com/mosbth/cdatabase), [CForm](https://github.com/mosbth/cform/tree/v2) och [phpmvc-comment](https://github.com/mosbth/phpmvc-comment).

De innehåller alla den grunden som behövs för att bli till ett paket på Packagist. De har samma katalog-struktur som Anax MVC, det är en bra grund, då känner vi igen oss.

Sedan är det filen `composer.json` som behövs för att Packagist skall acceptera paketet. Titta i mina repon och använd de filerna som grund när du skapar ditt eget repo.



###Skapa paket på Packagist {#packagist}

Du behöver ett konto på Packagist och en fil `composer.json` på ditt GitHub repo. Sedan lägger du enkelt till ditt repository som ett paket på Packagist. Blir det fel kan du ta bort det och göra om processen.

Du kommer behöva att autentisera tjänsten Packagist så att den kan kommunicera med ditt GitHub repo och få de senaste uppdateringarna om när du checkat in ny kod. 

Det finns en inbyggd tidsfördröjning när saker händer. Ta med det i beräkningen när du felsöker och jobbar med att lägga upp paketet. Dels är det fördröjning till att Packagist uppdaterar från GitHub och dels är det fördröjning när du använder composer för att ladda ned uppdaterade paket från Packagist.



###Visa hur det fungerar {#testa}

Ett bra sätt att visa att ditt paket fungerar är att göra en ren installation av Anax MVC, editera filen `composer.json` så att ditt paket installeras.

Sedan visar du stegen du gör för att integrera ditt paket med kodbasen i Anax MVC. Kanske behöver filer flyttas från ditt paket in i Anax MVC?

Det är precis så som jag gjort i de fall där du använt dig av CDatabase, CForm och phpmvc-comment. Du har själv jobbat så här i de senaste kursmomenten.

Visa att du kan göra det jag kan. *Hur svårt kan det vara?*



Avslutningsvis {#avslutning}
------------------------------

Hoppas du hittar inspiration till någon modul som du kan göra och publicera på Packagist.

Det finns en [egen tråd](t/2324) till denna artikel, där du kan ställa frågor eller föreslå fler moduler och tips till var man kan hitta kodbaser för moduler.




