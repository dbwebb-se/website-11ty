---
author: mos
category: webbprogrammering
updated: "2014-01-09 15:06:36"
created: "2014-01-09 15:06:09"
...
Använd mscgen för att generera sekvensdiagram
==================================

Sekvensdiagram är ett bra sätt att visa hur ett program är tänkt att fungera. De går att rita i vilket ritverktyg som helst, men, för en programmerare som är van att skriva kod så kan det gå mycket snabbare att skriva kod för att generera diagrammet. Det är här programmet *msgen* kommer till hjälp.

<!--more-->

Här är ett sekvensdiagram som jag gjorde till [en MVC-artikel](kunskap/php-baserade-och-mvc-inspirerade-ramverk-vad-betyder-det).

[FIGURE-SVG path=phpmvc/msc/mvc-guestbook-flow.svg caption="Sekvensdiagram för användaren som sitter i en webbläsare och klickar för att se alla inläggen i gästboken."]

Bilden är i SVG-formatet, jag *utmanar* webbläsarna och räknar numer med att alla klarar inline SVG. Jag vet att det är att utmana ödet men jag gillar att leva på kanten. Ser du inte bilden så borde du kasta din webbläsare över kanten.

SVG-bilden är genererad av programmet [mscgen](http://www.mcternan.me.uk/mscgen/). Det är samma program som används i webbtjänsten [web sequence diagrams](https://www.websequencediagrams.com/), där används samma syntax för att skriva ett sekvensdiagram. Testa gärna webbtjänsten, innan du tar hem och börjar använda mscgen.

Så här ser text-filen ut, som använts för att generera SVG-bilden. Och ja, det går även att generera PNG-bilder.

```text
# MSC
# MVC guestbook flow

msc {

  width="630";

  # The entities
  A, B, C, D, E, F; 
         
  # Small gap before
  |||;    
         
  # Boxes with labels
  A box A [ label = "Webbläsare" ],
  B box B [ label = "Frontcontroller" ],
  C box C [ label = "Controller" ],
  D box D [ label = "Model" ],
  E box E [ label = "View" ],
  F box F [ label = "Data storage" ]; 
    
  A rbox A [ label = "Användare" ],
  B rbox B [ label = "index.php" ],
  C rbox C [ label = "CCGuestbook" ],
  D rbox D [ label = "CMGuestbook" ],
  E rbox E [ label = "guestbook.tpl" ],
  F rbox F [ label = "CDatabase" ];
  |||;

  # Flow
  A -> B [ label = "guestbook/view" ];
  B => C [ label = "View()" ];
  C => D [ label = "ReadAll()" ];
  D => F [ label = "SELECT * FROM Guestbook" ];
  D >> C [ label = "$entries" ];
  C => E [ label = "include('guestbook.tpl.php')" ];
  C -> A [ label = "Display guestbook with all entries" ];

  # Small gap after
  |||;

}
```

En stor fördel med detta är att det är enkelt att skriva och ändra sekvensdiagrammet. Copy & paste av textrader är ibland mycket snabbare att fixa än att rita om en bild i ett ritverktyg. Jag tycker helt klart att det är lättare att justera diagrammet textmässigt än att ändra i ett ritverktyg, men smaken är delad.

Så här ser kommandot ut när jag kör det i terminalen.

```bash
mscgen -T svg -i mvc-guestbook-flow.txt -o mvc-guestbook-flow.svg
```

Och vips finns bilden där, i SVG-format och lite spännande är det allt att börja jobba mer med SVG-bilder i webbsammanhang, och mscgen fungerar utmärkt som hjälper mig med det.

I forumet finns en tråd med [fler liknande verktyg som hjälper dig att rita bilder med textuell representation](t/1885).