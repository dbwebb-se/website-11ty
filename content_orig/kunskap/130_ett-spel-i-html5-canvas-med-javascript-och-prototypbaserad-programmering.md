---
author: mos
category: artikel
revision:
    2016-02-18: (B, mos) Bort med länk till canvas cheatsheet.  
    2012-12-06: (A, mos) Första utgåvan i samband med kursen JavaScript.  
updated: "2012-12-06 14:42:18"
created: "2012-12-06 14:41:47"
...
Ett spel i HTML5 Canvas med JavaScript och prototypbaserad programmering
==================================

Detta blev en artikel om att göra ett spel i HTML5 Canvas med JavaScript. Du får se grunderna i hur du animerar ett spel i canvas och hur du styr din spelare. Det blev också en artikel om att använda objekt och prototyper i JavaScript. Så fort koden växer så gäller det att skapa förutsättningar för att organisera sin kod.

I artikeln bygger jag upp grunderna till det [gamla klassiska spelet Asteroids](http://en.wikipedia.org/wiki/Asteroids_%28video_game%29). Det som blir kvar får du själv fylla på för att göra spelet klart. :-)

<!--more-->

[FIGURE src=/image/kunskap/javascript/spaceship-in-canvas.jpg?w=w1&q=70 caption="Ett rymdskepp som går att styra runt och påverkas av universums krafter."] 

Då kör vi.



HTML5 och `<canvas>` {#intro}
--------------------------------------------------------------------

Vi skall rita på en canvas, en HTML5 Canvas. Du behöver plugga på om canvas och vilka tekniker som finns för att rita. Om du är nybörjare på att rita så finns allt du behöver på Mozilla Developers Network.

* Tutorial för att komma igång med att [rita på HTML5 Canvas](https://developer.mozilla.org/en-US/docs/Canvas_tutorial).

Någonstans måste man alltså börja, för min del blir det att bekanta mig med möjligheterna att rita på canvas. Så här blev mitt första stapplande exempel. 

* [Att komma igång och rita på en canvas](javascript/lekplats/drawing-on-canvas)



Animering på canvas, en gameloop {#animering}
--------------------------------------------------------------------

Att rita bilder är en sak, men hur kan man då få saker att röra sig och hur styr man dem med tangenterna? Det här handlar om två saker, först animering och sedan hantering av tangentbordstryck.



###`requestAnimationFrame()` {#animframe}

Vi vill skapa en loop som ritar om canvasen med jämna mellanrum. För att göra det på bästa möjliga sätt så måste vi lära oss funktionen `requestAnimationFrame()`. Det handlar om att låta webbläsaren bestämma när uppdateringar av canvasen skall ske.

Du kan läsa om funktionen `requestAnimationFrame()` på MDN:

* [window.requestAnimationFrame](https://developer.mozilla.org/en-US/docs/DOM/window.requestAnimationFrame)

Paul Irish har skrivit en [artikel om en shim](http://paulirish.com/2011/requestanimationframe-for-smart-animating), en polyfill, som tar hand om kompabiliteten mellan webbläsare. Läs den artikeln och använd den koden som finns där.

Så här ser koden ut:

```javascript
/** 
 * Shim layer, polyfill, for requestAnimationFrame with setTimeout fallback.
 * <a href='http://paulirish.com/2011/requestanimationframe-for-smart-animating/'>http://paulirish.com/2011/requestanimationframe-for-smart-animating/</a>
 */ 
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       || 
          window.webkitRequestAnimationFrame || 
          window.mozRequestAnimationFrame    || 
          window.oRequestAnimationFrame      || 
          window.msRequestAnimationFrame     || 
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();


/**
 * Shim layer, polyfill, for cancelAnimationFrame with setTimeout fallback.
 */
window.cancelRequestAnimFrame = (function(){
  return  window.cancelRequestAnimationFrame || 
          window.webkitCancelRequestAnimationFrame || 
          window.mozCancelRequestAnimationFrame    || 
          window.oCancelRequestAnimationFrame      || 
          window.msCancelRequestAnimationFrame     || 
          window.clearTimeout;
})();


/**
 * Init the game and leave control to the animation loop.
 */
(function animloop(){
  requestAnimFrame(animloop);
  render();
})();

```

Då har vi förutsättningarna för att skapa en animeringsloop, ellr en gameloop, som det också kallas. Det finns många tutorials om hur man skapar en sådan loop, en som jag fastat för är denna:

* [Bygg en gameloop med JavaScript](http://nokarma.org/2011/02/02/javascript-game-development-the-game-loop/index.html)

Det är en artikel där det förs lite resonemang till hur man bygger en gameloop.



###Att fånga tangentbordstryck {#tbord}

Vi är ju vana att fånga events från tangentbordet på följande sätt:

```javascript
document.onkeydown = function(event) {
  var key = event.key || event.which;
  switch(key) {
    case 37: rotate(-1); break;                       // left
    case 39: rotate(1); break;                        // right
    case 38: move(1); event.preventDefault(); break;  // up
    case 40: move(-1); event.preventDefault(); break; // down
    case 32: fire(); event.preventDefault(); break;   // fire      
    default: break;
  };        
  console.log('Keypress: ' + event + ' key: ' + key);
};
```

Men, det fungerar inte så bra i vårt fall, när man håller nere en knapp så dröjer det ett litet tag innan det skapas ett nytt event. det tar tid och blir hackigt. Vi behöver ett bättre sätt som harmoniserar med gameloopen.

Lösningen blir att spara vilka tangenter som trycks ned och släpps, att spara det i en array och när gameloopen gör en uppdatering, eller ritar om skärmen, då görs förflyttningen.

Samma webbplats som gav oss en förklaring till gameloopen ger oss också en lösning till att hantera knapptryckningar från tangentbordet.

* [Hantera input från tangentbordet i ett spel](http://nokarma.org/2011/02/27/javascript-game-development-keyboard-input/index.html)

Jag väljer den lösningen och får fram ett nytt exempel där jag nu kan styra ett objekt på min lilla spelplan.

* [En fyrkant som rör sig fram på spelplanen och styrs av tangenter](http://dbwebb.se/javascript/lekplats/canvas-animation-moving-and-steering-player-object/)



Prototypbaserad programmering {#prototypprog}
--------------------------------------------------------------------

Låt oss ta en liten paus från canvas-kodandet och kika lite på  de strukturer vi kan använda för att organisera vår kod.



###Starta spelet {#start}

Själva starten av spelet ligger i en jQuery ready-funktion och initierar spelet och lämnar sedan över till gameloopen. Så här ser det ut:

```javascript
$(function(){
  Game.init('canvas1');
  Game.gameLoop();
  console.log('Ready to play.');  
});
```

Vi ser att hela spelet ligger i modulen `Game`.



###Closure och Module pattern {#module}

Först har vi den struktur som jag valt för min variabel `window.Game`, det är en variant av ett closure och ett module pattern.

```javascript
window.Game = (function(){
  var canvas, ct, player;

  // ... code left out by intention.

  var gameLoop = function() {
    lastGameTick = Date.now();
    requestAnimFrame(gameLoop);
    update();
    render();
  };

  return {
    'init': init,
    'gameLoop': gameLoop
  }
})();
```

Här får vi ett objekt som är tänkt att innehålla själva spelet, ett samlingsobjekt med publika och privata delar.

* Läs en välskriven artikel om "[JavaScript Closures and the Module Pattern](http://www.joezimjs.com/javascript/javascript-closures-and-the-module-pattern)" som visar alternativ för implementationer:  



###Objekt med constructor {#constructor}

Om du kikar på koden för objektet `Key`, så ser du att det objektet skapas med en literal för objekt `{}`. Jämför det med objektet Vector som egentligen är en konstrutor. En konstruktor är en speciell funktion som används när man skapar nya objekt med `new`. Se följande kodexempel där två konstruktorer visas. 

```javascript
/**
 * All positions and forces 
 */
function Vector(x, y) {
  this.x = x || 0;
  this.y = y || 0;
};


/**
 * A Player as an object.
 */
function Player(height, width, position, velocity) {
  this.height   = height    || 32;
  this.width    = width     || 32;
  this.position = position  || new Vector();      // Creating a new object of Vector
  this.velocity = velocity  || new Vector(1,1);   // Creating a new object of Vector
}
```

Här ser vi hur en konstruktor-funktion ser ut och hur ett nytt objekt kan skapas med `new`. En första uppenbar liknelse är ju att jämföra med klasser. Men det låter vi bli, vi säger blott att detta är en konstruktor för att skapa nya objekt.



###Ett objekts prototyp {#prototyp}

I ett senare skede kommer vi att utöka objektet Vector och lägga dit en del funktioner för beräkningar mellan vektorer. Då kommer vi att lägga dem i objektets prototyp på följande vis.

```javascript
/**
 * All objects are Vectors
 */
function Vector(x, y) {
  this.x = x || 0;
  this.y = y || 0;
}

Vector.prototype = {

  // Multiply with scalar
  muls:  function (scalar) { return new Vector( this.x * scalar, this.y * scalar); }, 
  
  // Multiply itself with scalar
  imuls: function (scalar) { this.x *= scalar; this.y *= scalar; return this; },      
  
  // Add with scalar
  adds:  function (scalar) { return new Vector( this.x + scalar, this.y + scalar); },

  // Add itself with Vector
  iadd:  function (vector) { this.x += vector.x; this.y += vector.y; return this; }  
}
```

Fördelen med detta är att alla `Vector` objekt delar samma prototyp, det är alltså ett effektiv sätt att skapa en gemensam kodbas för många objekt. De objekt som vill skriva om, eller över, en funktion kan göra det. Då lagras den i själva objektet. När man sedan anropar funktionen, eller propertyn, så kollas först om den finns i objektet, sedan kollas om den finns i objektets prototyp. Den som först hittas används.


Även objektet `Player` har en prototyp, här är tanken att man kanske vill ha fler spelare efter hand, eller så kanske objektet `Player` går att återanvända när vi ska ha flygande block eller liknande. Kanske, kanske inte. Det är ändå bra att använda objektets prototyp för att organisera koden.


###Läs på om prototypbaserad programmering {#las}

Innan du går vidare så bör du ha skaffat dig en förståelse för hur prototypbaserad programmering, objekt, konstruktorer och prototyper fungerar. Här finns att läsa på.

* [Om prototypbaserad programmering på Wikipedia](http://en.wikipedia.org/wiki/Prototype-based_programming).  

* [Artikel om prototyper och arv i JavaScript](http://msdn.microsoft.com/en-us/magazine/ff852808.aspx).

* [Artikel om att skapa JavaScript objekt med ett annat objekt som mall](http://javascript.crockford.com/prototypal.html).

Har du en känsla för vad det handlar om? Då spelar vi vidare.



Förflytta objektet i en viss riktning {#riktning}
--------------------------------------------------------------------

Tanken är ju att göra Asteroids och det är ju ett rymdskepp som skall styras. Det skall snurra runt och när det går framåt så skall det gå i en viss riktning.

För att lyckas med detta så dammar vi av lite kunskaper i cirklar, radianer, vinklar, sinus och cosinus. För att göra en enkel uppställning av matematiken så ser det ut så här:

```javascript
x += sin(rotation) * speed;
y += cos(rotation) * speed;
```

Så här kan det se ut när jag implementerar det i mitt objekt `Player`.

```javascript
Player.prototype.moveForward = function() {
  this.position.x += this.velocity.x * Math.cos(this.direction);
  this.position.y += this.velocity.y * Math.sin(this.direction);
};

Player.prototype.moveBackward = function() {
  this.position.x -= this.velocity.x * Math.cos(this.direction);
  this.position.y += this.velocity.y * Math.sin(-this.direction);
};

Player.prototype.rotateLeft = function() {
  this.direction -= Math.PI/30;
};

Player.prototype.rotateRight = function() {
  this.direction += Math.PI/30;
};
```

* Här kan du testa resultatet och [flytta runt rymdskeppet med piltangenterna](javascript/lekplats/canvas-animation-moving-object-forward-backward-in-a-direction/).



Krafter i form av acceleration och inbromsning {#acceleration}
--------------------------------------------------------------------

Ett rymdskepp måste kunna gasa och bromsa, det innebär att det skall gå fortare när det gasar och sakta in när det bromsas. Ett enkelt sätt att göra detta är att förändra skeppets acceleration, `this.acceleration`. Man får justera faktorerna tills det känns bra.

```javascript
Player.prototype.throttle = function() {
  this.acceleration += this.acceleration > 2 ? 0 : 0.5;
};

Player.prototype.breaks = function() {
  this.acceleration -= 0.005;
  this.acceleration = this.acceleration > 0 ? this.acceleration  : 0;
};

Player.prototype.moveForward = function() {
  this.position.x += this.velocity.x * this.acceleration * Math.cos(this.direction);
  this.position.y += this.velocity.y * this.acceleration * Math.sin(this.direction);
};
```

* Nu kan man [gasa och bromsa skeppet](javascript/lekplats/canvas-animation-throttle-ship), nu börjar det likna något.  



Krafter {#krafter}
--------------------------------------------------------------------

Nej. Gör om och gör rätt. I alla fall för min del. Taktiken i förra stycket håller inte i längden. Ett bättre sätt är att implementera beräkningar med vektorer och införa krafter i mitt speluniversum. Det låter mer komplicerat, ja. Det kräver sin kunskap i matematik och fysik. Så visst blir det klurigare. Men jag kör på.

En första test när jag kör spelet i olika webbläsare visar att det går olika fort. Hmmm, det innebär att man inte vet hur ofta ett gametick görs. Det behöver vi justera, så att varje förflyttning tar hänsyn till hur mycket tid som förflutit sedan senaste uppdateringen. På det sättet får man spelet att flyta med samma hastighet oavsett webbläsare.

Först inför jag tiden, det gör jag i gameloopen.

```javascript
var gameLoop = function() {
  var now = Date.now();
  td = (now - (lastGameTick || now)) / 1000; // Timediff since last frame / gametick
  lastGameTick = now;
  requestAnimFrame(gameLoop);
  update(td);
  render();
};
```

Nu gäller det att implementera så att resten av spelet förhåller sig till tidskillnaden `td`.

För att ha en grund till alla beräkningar som komma skall så inför jag matematiska beräkningar på vektorer, det handlar om att multiplikation och addition av vektorer. Jag bygger ut mitt objekt `Vector` med ett par metoder i dess prototyp.

```javascript
/**
 * All objects are Vectors
 */
function Vector(x, y) {
  this.x = x || 0;
  this.y = y || 0;
}

Vector.prototype = {

  // Multiply with scalar
  muls:  function (scalar) { return new Vector( this.x * scalar, this.y * scalar); }, 
  
  // Multiply itself with scalar
  imuls: function (scalar) { this.x *= scalar; this.y *= scalar; return this; },      
  
  // Add with scalar
  adds:  function (scalar) { return new Vector( this.x + scalar, this.y + scalar); },

  // Add itself with Vector
  iadd:  function (vector) { this.x += vector.x; this.y += vector.y; return this; }  
}
```

Nu kan jag lägga ihop två vektorer och jag kan multiplera dem. Jag kan också göra addition och multiplikation med en skalär, bara ett värde. Den här typen av matematik är ovärderlig när man bygger spel. Om du är nybörjare så kan du alltid kika lite på [Wikipedia om vektorer](http://sv.wikipedia.org/wiki/Vektor).

Då fortsätter vi med ett objekt som kan hantera krafter av olika slag. Även krafter representeras av vektorer och det är ju bra nu när vi kan räkna med dem.

```javascript
/**
 * The forces around us.
 */
function Forces() {
  this.all = {};
}

Forces.prototype = {

  createAcceleration: function(vector) {
    return function(velocity, td) {
      velocity.iadd(vector.muls(td));
    }
  },

  createDamping: function(damping) {
    return function(velocity, td) {
      velocity.imuls(damping);
    }
  },

  createWind: function(vector) {
    return function(velocity, td) {
      velocity.iadd(vector.adds(td));
    }
  },  

  addAcceleration:  function(name, vector)  { this.all[name] = this.createAcceleration(vector); },
  addDamping:       function(name, damping) { this.all[name] = this.createDamping(damping); },
  addWind:          function(name, vector)  { this.all[name] = this.createWind(vector); },

  update: function(object, td) {
    for(var force in this.all) {
      if (this.all.hasOwnProperty(force)) {
        this.all[force](object, td);
      }
    }
  }

}

window.Forces = new Forces();
window.Forces.addAcceleration('gravity', new Vector(0, 9.82));
window.Forces.addDamping('drag', 0.97);
window.Forces.addWind('wind', new Vector(0.5, 0));
```

Det sista vi gör är att skapa tre olika krafter i vårt speluniversum i form av gravitation, luftmotstånd och vind. Krafterna kanske inte är representativa för Asteroidsspelet men de visar på hur krafterna fungerar. Tanken är att dessa krafter påverkar alla objekt på spelplanen.

Även objektet `Player` behöver nu ta hänsyn till dessa krafter och själv använda kraft-konceptet istället för den enklare varianten med pixlar. I princip så kan slutresultaten se exakt likadana ut, och ibland är det tillräcklligt bra. Men ser man på kodstrukturen och möjligheten att bygga ut spelet så föredrar jag personligen den variant vi ser nu, med krafter och beräkningar med vektorer.

Dessutom tycker jag nog att koden fortfarande ser tilltalande och övergripbar ut. Det är ju oerhört viktigt när vi fortsätter.

Wikipedia är en bra källa när vi vill veta mer om krafter. Se till exempel [sidan om luftmotstånd, "drag"](http://en.wikipedia.org/wiki/Drag_%28physics%29).

Hur blev då resultatet när krafter lades till och hänsyn togs till tidsskillnaden mellan uppdateringarna? Så här blev det:

* [Animering av rymdskepp med krafter](javascript/lekplats/canvas-animation-spaceship-with-forces).



Summering {#summering}
--------------------------------------------------------------------

Där sätter vi stopp för denna gången. Vi är inte framme vid ett spel, men du har en god början, särskilt om du lyckas greppa koncepten med vektorberäkning och krafter.

Och du, vad tycker du om koden som blir resultatet så här långt? Känns det som vi har ett par verktyg för att organisera våd JavaScript kod enligt prototypbaserad programmering? Jag tycker nog det.

Bra jobbat. Vill du fråga något så går det bra i forumet. Det finns en tråd dedikerad till denna artikel. Du når den på:

[Diskutera denna artikel i forumet](f/4851).



Att göra {#gora}
------------------------------


1. Skjuta skott.
1. Fler objekt på spelplanen, asteroiderna och motståndare som skjuter på mig.
1. Collision detection.
1. Ljud med HTML5 Audio.
1. Paus, poäng, highscorelista.
1. Effekter med partikelsystem.
1. Prestanda förbättringar och analys av prestanda.
1. Kompabilitet med äldre läsare via Modernizr.
