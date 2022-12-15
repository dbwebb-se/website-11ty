---
author:
    - mos
revision:
    "2020-11-09": "(D, mos) Mindre justering inför ht20."
    "2018-11-06": "(C, mos) Uppdaterad inför v2."
    "2017-09-04": "(B, mos) Minskade omfattningen genom att ta bort skrivuppgiften om MVC."
    "2017-08-08": "(A, mos) Första utgåvan."
...
Kmom02: MVC
==================================

Vi tittar på designmönstret Model, View, Controller (MVC) och använder det för att strukturera vår kod i ramverket. Vi har tidigare sett både vyer (V) och kontroller (C) så nu är det dags att väva in M:et som står för model, modell-klasser och/eller modell-lagret.

Vi bekantar oss även med begreppet SOLID som är en akronym för en samling designmönster som är aktuella i sammhanget kring ramverk och allmän objektorienterad utveckling.

Med dessa begrepp i ryggen så skriver vi kod i ramverket som vi strukturerar enligt MVC. Under arbetets gång funderar vi på hur man bäst organiserar sin kod för att göra den återanvändbar, testbar samt lätt att underhålla och vidareutveckla.

<!--more-->

Som exempelkod används en REM-server som är byggd enligt MVC med fokus på delarna Model och Kontroller.

[FIGURE src=image/snapht17/remserver-docs.png?w=w3 caption="Manualen för REM servern som också visar att REM servern är installerad och fungerar."]

[FIGURE src=image/snapht17/remserver-rest-client.png?w=w3 caption="En REST fråga till REM servern."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>

<!--
Fokus på modellklasser.

Hur testa modell-klasser.

Jämför modellklasser mellan ramverk.

Jämför även kontroller/viewer, hela MVC. Ja troligen.

Gör enhetstester.

Hur enhetstesta när webbservern är beroende av restservern?

Egen testserver, speciellt nu när vi börjar använda externa tjänster?
Visa hur man kan mocka en klass.

kmom02 kan bli att bygga en komplett REST server, men bara med get.
den behöver lite fler funktioner dock.

Sen gör vi enhetstester på restservern. Kanske även starta upp restservern så den körs lokalt på travis, under testerna.

Scaffolda saker som behövs. Inkl REM-server som modul till egen.

Bygga på scrutinizer, som en avslutning på kmom02?
Fokus kodtäckningen.

Lyft fram fler design patterns. Tex Url::create() (fler exempel på designmönster som använts i tex kmom01 eller i ramverket som man redan kommit i kontakt med)

Om cURL, då visa exempel på hur man kodar med cURL.

Designmönster, Gangoffour, läsanvisning någon form av artikel som berättar kort om designmönster.
    * Samma med SOLID

Fundera på att skriva artikel, typ Latex, för redovsingstexterna?

Låt studenterna lägga till REMservern som en modul i deras egen server. Kanske kan man göra något som låter dem jobba mot remservern? Nån programmeringsövning?

Glöm inte att REM servern har en liten specialvariant av hur dess routes är kopplade mot respektive dataset.


Kmom03 fokus kodkvalitet på scrutinizer, phpmd, phpstan, phploc?


-->



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 6-10 studietimmar)*



### Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Läs artikeln "[PHP-baserade och MVC-inspirerade ramverk, vad betyder det?](kunskap/php-baserade-och-mvc-inspirerade-ramverk-vad-betyder-det)". Den ger dig en insikt i terminologi och kategorisering av PHP-baserade ramverk, tillsammans med en kort introduktion av Model, View, Controller (MVC).

1. Bekanta dig med begreppet MVC genom att översiktligt titta på Wikipedia. Titta på både den [svenska](https://sv.wikipedia.org/wiki/Model-View-Controller) och den [engelska](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) varianten.

1. Bekanta dig med begreppet SOLID genom att översiktligt titta på Wikipedia. Titta på både den [svenska](https://sv.wikipedia.org/wiki/SOLID) och den [engelska](https://en.wikipedia.org/wiki/SOLID_%28object-oriented_design%29) varianten.

1. Läs översiktligt Wikipedia artikeln om "[Software design pattern](https://en.wikipedia.org/wiki/Software_design_pattern)" för att bekanta dig med begreppet. Kika på de designmönster som finns på sidan och se om du kan lägga en handfull av dem på minnet, lite ytligt iallfall. Du vill ha ett hum om vad designmönster innebär och dess terminologi.



### Ramverk referenser {#referenser}

Under kursen skall vi lära oss om ramverk och de moduler och designmönster som bygger upp dagens ramverk. En plats att lära sig om detta är ramverkens manualer. Här följer ett par av de mer använda ramverken och via dess manualer får man en god insikt i hur ett ramverk ser ut och fungerar idag.

Det du kan studera nu är främst att se hur ramverkets router fungerar med en kontroller och om ramverkets manual har något särskilt stycke om MVC. Det räcker att du kikar i två av manualerna. Läs fler vid intresse.

Det finns en fråga om detta som du skall besvara i din redovisningstext.

* [Dokumentationen för Symfony](https://symfony.com/doc/current/), ett ledande ramverk inom PHP. Grundaren är Fabien Potencier och en stark profil inom branschen. Företaget Sensiolabs ligger bakom och stödjer utvecklingen.

* [Dokumentationen för Laravel](https://laravel.com/docs/5.7), Laravel bygger på Symfony men bidrar med ett eget anpassat sätt hur man jobbar i ett ramverk, ett skal ovan Symfony. Bakom Laravel ligger Taylor Otwell som en stark profil.

* [Dokumentationen för Phalcon](https://docs.phalconphp.com/en/). Phalcon är ett PHP-ramverk som är byggt i C/C++ och de bar en bra manual med en egen sektion om MVC. Ramverket skapades av Andres Gutierrez (med flera).

* [Dokumentationen för Yii](https://www.yiiframework.com/doc/guide/2.0/en). Yii underhålls för närvarande av ett team av utvecklare där flera är från Ryssland och Ukraina. Namnet Yii har kinesisk betydelse och ramverkets grundare heter Qiang Xue.



### Videor {#videor}

Kika på följande videos.

1. Titta på seminariet "[PHP UK Conference 2017 - Gareth Ellis - Introduction to SOLID](https://www.youtube.com/watch?v=86Tt2pW9pv4)" som ger dig en introduktion till de designmönster som ligger bakom bokstäverna i SOLID och är en grund i ramverkstänkande. Om du tycker videon är "svår/tung" så kan du själv leta reda på motsvarande innehåll som ger dig en intro till begreppet SOLID. YouTube innehåller många små korta videor på ämnet.



### Referensmaterial {#referens}

Följande används som referensmaterial i kursmomentet.

1. En REM-server implementerad i PHP används som exempel för att se hur 100% kodtäckning kan uppnås av kod separerad i kontroller och modell. Det finns [källkod för modulen REM-server](https://github.com/canax/remserver) (med kontroller och modell) och det finns en [färdig installation av REM servern](https://github.com/canax/remserver-website). Det finns också en [live version av REM servern](https://rem.dbwebb.se/). Du kan även starta din egen REM server med Docker.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 4-8 studietimmar)*


<!--
### Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[En REM Server som Kontroller och Modell](kunskap/en-rem-server-som-kontroller-och-modell)" som ger dig ett exempel hur du skriver kod i form av en kontroller och en modell. REM servern lägger du i `kmom02/remserver`. När du är klar så placerar du den färdiga koden i `me/anax` och integrerar i din me-sida.

-->



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[En webbtjänst för att geotagga ip-adresser](uppgift/en-webbtjanst-for-att-geotagga-ip-adresser)". Spara koden under `me/redovisa`.


<!--
1. Refactoring av din me-sida. Integrera REM servern i din me-sida i `me/anax`. Gör en "framsida" till din REM server och berätta vilka länkar du har till REM servern. Denna "framsida" skall vara en del av din me-sida. Har du kod som borde vara strukturerad enligt kontroller/modell? Överväg isåfall att skriva om den.
-->

<!--
1. Gör uppgiften "[Bygg en prototyp till ett kommentarssystem](uppgift/bygg-en-prototyp-till-ett-kommentarssystem)". Du kommer igång och skriver ett enkelt kommentarssystem, det blir en prototyp för att lära sig domänen och skapa en kodbas. Spara koden under `me/anax`.
-->

1. Pusha och tagga din redovisa, allt eftersom och sätt en avslutande tagg (2.0.\*) när du är klar med kursmomentet.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i momentet då redovisningstexten är aningen mer omfattande än normalt.

* Vilka tidigare erfarenheter har du av MVC? Använde du någon speciell källa för att läsa på om MVC? Kan du med egna ord förklara någon fördel med kontroller/modell-begreppet, så som du ser på det?
* Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?
* Har du någon erfarenhet av designmönster och kan du nämna och kort förklara några designmönster du hört talas om?
* Vilka ramverk valde du att studera manualen för och fann du något intressant? Försök relatera mellan det Anax du använder och de ramverk du studerade i manualerna.
* Vilken är din TIL för detta kmom?

Har du frågor eller funderingar som du vill ha besvarade så ställer du dem i GitHub issues.
