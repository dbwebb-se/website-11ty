---
author: mos
revision:
  "2015-09-02": (A, mos) Första utgåvan för kursen.
...
Kmom05: Webbtjänst med RESTful API
==================================

Nu har vi en Linux-server, en webbserver, vi kan grunderna i att bygga skript i bash och vi kan bygga servrar med Node.js. Låt oss fortsätta titta på serverprogrammering i Node.js och se hur en mer renodlad webbtjänst kan se ut och fungera.

Du kommer få en färdig server, skriven i Node.js, och ett RESTful API till servern. Servern implementerar en [*maze*](https://en.wikipedia.org/wiki/Maze). Servern är färdig och du kan testköra den via kommandot curl.

Din uppgift är att bygga en bash-klient till servern, enligt en kravspecifikation. Din klient skall använda servern för att lösa mazen.

Så är upplägget. Låt se hur bra vingarna bär. Upplägget på detta kursmomentet är "lite friare", så vi går nästan rakt på själva uppgiften.



<!--more-->

Så här kan det se ut när du löser mazen med ditt skript, skriptet som i detta fallet heter *mazerunner.sh*. Möjligen kan det vara inspirerat av boken/filmen med samma namn, [The Maze Runner](https://sv.wikipedia.org/wiki/The_Maze_Runner).

[ASCIINEMA src=1voz3ecbgsbu5dytp9sz5n2kb]



<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Det finns ingen läsanvisning i kurslitteraturen.



###Artiklar {#artiklar}

1. Läs igenom hur du med Bash kan skapa ett mer avancerat kommandoradsprogram som tar argument. Artikeln ["Skapa Bash-skript med options, command och arguments"](kunskap/skapa-bash-skript-med-options-command-och-arguments) ger dig en struktur till hur du kan skapa mer avancerade och större Bash-skript.



###Video  {#video}

1. Se videon om "[REST API concepts and examples](https://www.youtube.com/watch?v=7YcW25PHnAA)". Den visar exempel på grunderna i REST API och hur det förhåller sig till en webb URL.



###Lästips {#lastips}

1. Det finns en webbplats som föreslår en [JSON API specifikation](http://jsonapi.org/). Du kan titta översiktligt på den, börja med stycket om "Fetching Data". Specifikationen ger oss en guide, eller ledtrådar och tips, till hur man kan skriva ett JSON API för en server.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*



###Övningar {#ovningar}

Det finns inga övningar.



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Lös mazen med din mazerunner i bash](uppgift/los-mazen-med-din-mazerunner-i-bash)".



###Extra {#extra}

Det finns inga extra uppgifter.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/linux-v1/redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Är du bekant med JSON API sedan tidigare?
* Hur kändes det att skriva ett litet större bash-skript? Var det något som var mer eller mindre utmanande och tidskrävande?
* Kikade du på källkoden till maze-servern? Har du några reflektioner kring den?
* Är du nöjd med din mazerunner? Gjorde du nåt speciellt som du vill lyfta fram?




