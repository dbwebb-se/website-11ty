---
author: mos
category: labbmiljo
revision:
  "2013-12-10": (A, mos) Första utgåvan, renskriven från [en forumpost](f/10622).
updated: "2014-01-31 14:12:03"
created: "2013-12-10 15:59:58"
...
BTH's labbmiljö för Node.js och npm
==================================

Vill du skriva JavaScript på serversidan? Node.js och pakethanteraren npm finns installerat på studentserver och gör det enkelt för dig att komma igång. 

Detta är en guide som visar du hur du använder Node.js och npm på studentservern.

<!--more-->



Bakgrund {#bak}
-----------------------------------------------------

Node.js används som labbmiljö i kursen [javascript](javascript). Som en del i det visar artikeln ["Kom igång med HTML5 Websockets och Node.js"](kunskap/kom-igang-med-html5-websockets-och-node-js), bland annat, hur du installerar **Node.js** och hur du användar pakethanteraren **npm** på din egen maskin. 

Läs mer om [Node.js](http://nodejs.org/) och pakethanteraren [npm](https://npmjs.org/).



Två servrar, nodejs1 och nodejs2 {#tva}
-----------------------------------------------------

Det finns två servrar som kör node, det är egentligen samma maskiner som du använder när du loggar in på ssh.student.bth.se.

* nodejs1.student.bth.se (alias för seekers.student.bth.se)
* nodejs2.student.bth.se (alias för sweet.student.bth.se)

Att namnen är alias för andra maskinnamn är kuriosa, det är sådant som kan ändras över tiden. Det viktiga är att du använder namnen nodejs1 eller nodejs2 när du loggar in på respektive maskin. När du gör övningar med nodejs så behöver du starta servern på en känd maskin och du behöver koppla dig mot samma maskin med din webbläsare.

Men, det är alltså samma maskiner som du når via ssh.student.bth.se och du har tillgång till samma filträd.

Du loggar in som vanligt över ssh.

```text
ssh mosstud@nodejs1.student.bth.se
```


Kommandon node och npm är installerade {#install}
-----------------------------------------------------

På båda maskinerna finns kommandona node och npm installerade.

```text
>/usr/local/node/bin/node -v
v0.8.18

> /usr/local/node/bin/npm -v
1.2.2
```

Du behöver inte skriva hela sökvägen, det räcker om du skriver in `node` respektive `npm`.



Allokera en port på respektive server {#port}
-----------------------------------------------------

Vi har en begränsad mängd portar som är öppna och som vi kan använda. Portarna ligger i området 8001 -- 8200. Det finns ett dokument där du kan allokera max 2 portar, bara så vi har lite koll på läget.

[Allokera portar till Node.js i detta dokument](http://goo.gl/8uIEK).



Installera egna moduler med npm {#npm}
-----------------------------------------------------

För tillfället finns det inga förinstallerade moduler på servrarna. Nåja, om inte min egen installation av websocket och socket.io räknas.

```text
seekers~/www/node: npm list
/home/saxon/teachers/com/mosstud/www/node
├─┬ socket.io@0.9.14
│ ├── base64id@0.1.0
│ ├── policyfile@0.0.4
│ ├── redis@0.7.3
│ └─┬ socket.io-client@0.9.11
│   ├─┬ active-x-obfuscator@0.0.1
│   │ └── zeparser@0.0.5
│   ├── uglify-js@1.2.5
│   ├─┬ ws@0.4.25
│   │ ├── commander@0.6.1
│   │ ├── options@0.0.5
│   │ └── tinycolor@0.0.1
│   └── xmlhttprequest@1.4.2
├─┬ util@0.4.9
│ └── events.node@0.4.9
└── websocket@1.0.3
```

Du kan alltså själv installera de moduler du behöver, eller använda de som jag installerat. Du behöver bara ange rätt sökväg till paketen, när du inkluderar dem i din nodejs javascript-fil.

**Exempel på att använda mosstud's websocket installation.**

```javascript
var WebSocketServer = require('/home/saxon/teachers/com/mosstud/www/node/node_modules/websocket').server;
// var WebSocketServer = require('websocket').server;
```



Diskutera i forumet {#forumet}
--------------------------------------

Den [ursprungliga forumtråden](f/10662), som beskrev hur man gör, finns kvar.

Jag startade en ny forumtråd -- där vi kan samla saker som rör [node.js, npm och skolans labbmiljö](t/1823). Ställ dina frågor och funderingar i den tråden, eller kanske har du tips och tricks som kan förbättra labbmiljön.
