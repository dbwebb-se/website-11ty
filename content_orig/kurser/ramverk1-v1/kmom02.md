---
author:
    - mos
revision:
    "2017-09-04": "(B, mos) Minskade omfattningen genom att ta bort skrivuppgiften om MVC."
    "2017-08-08": "(A, mos) Första utgåvan."
...
Kmom02: MVC
==================================

Vi tittar på designmönstret Model, View, Controller (MVC) och använder det för att strukturera vår kod i ramverket.

Vi bekantar oss även med begreppet SOLID som är en akronym för designmönster som är aktuella i sammhanget kring ramverk och objektorienterad utveckling.

Med dessa begrepp i ryggen så skriver vi kod i ramverket som vi strukturerar enligt MVC.

Under arbetets gång funderar vi på hur man bäst organiserar sin kod i moduler för att göra dem återanvändbara, testbara och lätta att underhålla och vidareutveckla.

<!--more-->

Som exempelkod används en REM-server som är byggd enligt MVC med fokus på delarna Model och Kontroller.

[FIGURE src=image/snapht17/remserver-docs.png?w=w2 caption="Manualen för REM servern som också visar att REM servern är installerad och fungerar."]

[FIGURE src=image/snapht17/remserver-rest-client.png?w=w2 caption="En REST fråga till REM servern."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*



###Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Läs artikeln "[PHP-baserade och MVC-inspirerade ramverk, vad betyder det?](kunskap/php-baserade-och-mvc-inspirerade-ramverk-vad-betyder-det)". Den ger dig en insikt i terminologi och kategorisering av PHP-baserade ramverk, tillsammans med en kort introduktion av Model, View, Controller (MVC).

1. Bekanta dig med begreppet MVC genom att översiktligt titta på Wikipedia. Titta på både den [svenska](https://sv.wikipedia.org/wiki/Model-View-Controller) och den [engelska](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) varianten.

1. Bekanta dig med begreppet SOLID genom att översiktligt titta på Wikipedia. Titta på både den [svenska](https://sv.wikipedia.org/wiki/SOLID) och den [engelska](https://en.wikipedia.org/wiki/SOLID_%28object-oriented_design%29) varianten.



###Videor {#videor}

Kika på följande videos.

1. Titta på seminariet "[PHP UK Conference 2017 - Gareth Ellis - Introduction to SOLID](https://www.youtube.com/watch?v=86Tt2pW9pv4)" som ger dig en introduktion till de designmönster som ligger bakom bokstäverna i SOLID och är en grund i ramverkstänkande. Om du tycker videon är "svår/tung" så kan du själv leta reda på motsvarande innehåll som ger dig en intro till begreppet SOLID. YouTube innehåller många små korta videor på ämnet.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[En REM Server som Kontroller och Modell](kunskap/en-rem-server-som-kontroller-och-modell)" som ger dig ett exempel hur du skriver kod i form av en kontroller och en modell. REM servern lägger du i `kmom02/remserver`. När du är klar så placerar du den färdiga koden i `me/anax` och integrerar i din me-sida.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Refactoring av din me-sida. Integrera REM servern i din me-sida i `me/anax`. Gör en "framsida" till din REM server och berätta vilka länkar du har till REM servern. Denna "framsida" skall vara en del av din me-sida. Har du kod som borde vara strukturerad enligt kontroller/modell? Överväg isåfall att skriva om den.

1. Gör uppgiften "[Bygg en prototyp till ett kommentarssystem](uppgift/bygg-en-prototyp-till-ett-kommentarssystem)". Du kommer igång och skriver ett enkelt kommentarssystem, det blir en prototyp för att lära sig domänen och skapa en kodbas. Spara koden under `me/anax`.

1. Pusha och tagga ditt Anax, allt eftersom och sätt en avslutande tagg (2.0.\*) när du är klar med alla uppgifter i kursmomentet.

<!--
1. Skriv gruppvis en artikel om ["Model, View, Controller (MVC)"](uppgift/skriv-artikel-om-mvc). Spara artikeln i din me-sida.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Vilka tidigare erfarenheter har du av MVC? Använde du någon speciell källa för att läsa på om MVC? Kan du med egna ord förklara någon fördel med kontroller/modell-begreppet, så som du ser på det?
* Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?
* Gick arbetet med REM servern bra och du lyckades integrera den i din me-sida?
* Berätta om arbetet med din kommentarsmodul, hur långt har du kommit och hur tänker du?

Har du frågor eller funderingar så ställer du dem i forumet.
