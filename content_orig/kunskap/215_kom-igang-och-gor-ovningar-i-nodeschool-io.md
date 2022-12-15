---
author: mos
category: javascript
revision:
  "2015-08-07": (A, mos) Första utgåvan för linux-kursen.
updated: "2015-08-07 08:58:33"
created: "2015-08-07 08:57:38"
...
Kom igång och gör övningar i Nodeschool.io
==================================

[FIGURE src=/image/snapht15/nodeschool.png?w=c5&a=20,0,20,0 class="right"]

För att öva upp sin programmeringsförmåga med JavaScript och Node så är Nodeschool.io en bra tjänst. Där hittar du ett antal tutorials och övningar som lär dig grunderna i olika koncept. Eller *workshops*, som de väljer att kalla det.

Låt se hur man installerar och kommer igång med ett par workshops, allt för att komma igång med JavaScript på serversidan med Node.js.

<!--more-->


Förutsättningar {#pre}
--------------------------------------

Du behöver ha installerat nodejs och npm, ungefär som vi gör i artikel "[Kom igång med Node.js på Debian](kunskap/kom-igang-med-node-js-pa-debian)".



Om Nodeschool.io {#om}
--------------------------------------

Via webbplatsen [Nodeschool.io](http://nodeschool.io/) kan vi få tag i övningar kring JavaScript och Node.js. Det workshops som publicerats som öppen källkod på GitHub och vi kan enkelt ladda ned dem via npm och köra dem via nodejs.

Det som erbjuds är alltså ett standardformat på att bygga workshops och en samling förbyggda workshops med fokus på JavaScript och Node.js.



Kom igång med dina första workshops {#forsta}
--------------------------------------

Låt mig visa hur du kommer igång med workshops, jag visar två stycken, nämligen `javascripting` och `learnyounode`.



###Workshop javascripting för grunder i JavaScript {#javascripting}

Workshopen [javascripting](https://github.com/sethvincent/javascripting) är en enkel workshop som låter dig öva grunderna i JavaScript. Det är en bra workshop att testa för att komma igång med konceptet.

Så här gör du för att komma igång.

```bash
$ sudo npm install --global javascripting
$ javascripting
```

Så här kan det se ut när man löser första övningen.

[ASCIINEMA src=24697]

När du gör fler av övningarna så vill du säkert ha din texteditor redo, då blir det enklare att genomföra övningarna.



###Workshop learnyounode för grunder i Node.js {#learnyounode}

Workshopen [learnyounode](https://github.com/workshopper/learnyounode) är en  workshop som hjälper dig igång med grunderna i Node.js.

Så här gör du för att komma igång.

```bash
$ sudo npm install --global learnyounode
$ learnyounode
```

Så här kan det se ut när man löser första övningen.

[ASCIINEMA src=24698]

Ett bra tips är att skapa en egen katalog för varje workshop och döpa den till workshoppens namn och spara alla lösningar i katalogen.



Avslutningsvis {#avslutning}
--------------------------------------

Det var en genomgång av hur du kommer igång med Nodeschool.io och dess workshops.

Ställ gärna frågor om [Nodeschool.io och dess workshops i forumet](t/4354).




