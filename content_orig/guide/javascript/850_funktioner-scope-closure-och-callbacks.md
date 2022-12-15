---
...
Funktioner, scope, closure och callbacks
==================================

Låt oss ta en djupare titt på funktioner och hur de kan användas.



###Funktioner och scope {#functioner-scope}

I ett programmeringsspråk innebär "scope" den synlighet och levnadstid som variabler och parameterar har. Det handlar om minneshantering och namnkonflikter. De flesta C-liknande programmeringsspråk har "block"-scope, alla variabler är synliga i det blocket de är definierade och försvinner ur scoopet när man går ur blocket.

JavaScript har inte block-scope, även om det kan se ut så. JavaScript har "function"-scope vilket betyder att variabler som definierats i en funktion är *inte* synliga utanför den funktionen och en variabel i en funktion är synlig inom hela den funktionen, *inklusive* i funktioner som definierats i funktionen.

```javascript
function f1 (a) {
    var b = a + 1;

    function f2 (c) {
        var d = c + 1; 
        return a + b + c + d - 2; // a, b, c, d is available
    }

    return f2(b);
}

f1(10); // Returns 42
f2(); // Not callable
```

I programmeringsspråk med block-scope säger man att variabler skall definieras så sent som möjligt, precis innan de används eller i det blocket de används. I JavaScript definierar vi variablerna överst i funktionen, helst inom en enda `var`-deklaration separerade med kommatecken.



###Closure {#closure}

I exemplet ovan har den inre funktionen `f2()` tillgång till allt som är definierat i funktionen `f1()`. Detta kallas för "[closure](http://en.wikipedia.org/wiki/Closure_%28computer_science%29)" vilket är ett välkänt begrepp i programmeringspråk som stödjer [funktionell programmering](http://en.wikipedia.org/wiki/Functional_programming), programmeringsspråket [Lisp](http://en.wikipedia.org/wiki/Lisp_%28programming_language%29) är till exempel ett annat sådant språk.

Här är ett exempel på en closure där den inre funktionen har tillgång till de icke lokala variabler som fanns när funktionen definierades.

```javascript
// Example on closure where inner function has access to non-local variables
window.accessToInner = (function() {
    var a = 1;

    function inner (b) {
        a += b;
        return a;
    }

    return inner;
})();


accessToInner(1) // returns 2
accessToInner(1) // returns 3
accessToInner(1) // returns 4
accessToInner(1) // returns 5
```

I fallet ovan blir `window.accessToInner` samma sak som funktionen `inner()` eftersom en anonyma funktionen exekveras och returnerar funktionen `inner`.

Studera följande kodrader för att se skillnanden.

```javascript
myFunc = function() { console.log("hej"); }
myFunc(); // calls the function

myString = (function() { return "hej"; })()
console.log(myString); // just the string
```

Paranteserna gör att funktionen anropas direkt och är ett designmönster som hjälper att skapa ett closure. Detta sättet att automatiskt exekvera en funktion kallas self-invoking-anonymous-function (siaf), eller immediately-invoked-function-expression (iife/iffy) [^11].

En funktion har det scope som finns när den definieras, oavsett var den anropas. Man kan alltså definiera en funktion i en miljö och sedan förutsätta att funktionen exekveras i samma miljö. Detta ger möjligheter till inkapsling och låter oss undvika globala variabler. Därför är closure viktigt i JavaScript.



###Moduler -- "Module pattern" {#module}

Ett vanligt sätt att använda closure är för att skapa moduler av JavaScript kod. Man lägger en hel modul i en funktion, där finns hela scopet, ett eget closure. I denna funktion definieras allt som behövs i modulen, variabler såsom funktioner. Till sist returneras en objekt-literal där man anger modulens publika interface. Se följande exempel där jag skapat en modul `Mos` som är tänkt att innehålla lite bra-att-ha saker.

```javascript
window.Mos = (function(window, undefined) {
  var private, Mos = {};

  /**
   * Dump own properties of an object
   * @param the object to show
   */
  Mos.dump = function (obj) {
    for (var prop in obj) {
      if (obj.hasOwnProperty(prop)) {
        console.log(prop);
      }
    }
  };
    
  /**
   * Generate a random number.
   * @param min the smallest possible number
   * @param max the largest possible number
   * @returns a random number where min >= number <= max
   */
  Mos.random = function (min, max) {
    return Math.floor(Math.random()*(max+1-min)+min);
  };
    
  // Expose public methods
  return Mos;
})(window);

Mos.random(1, 6);
Mos.dump(window.localStorage);
```

Funktionen skapar ett closure med två funktioner och en privat variabel. Funktionen returnerar ett objekt som innehåller de två funktionerna. Den anonyma funktionen exekveras direkt eftersom den omsluts av parenteser och returnerar därmed objektet `Mos` som tilldelas `window`.

En poäng med detta är att variabeln `private` som definieras i funktion, är tillgänglig varje gång en metod i objektet `Mos` anropas. Man får alltså en struktur som liknar ett objekt med publikt interface och med privata delar.

Ta nu och kika på källkoden för JavaScript-biblioteken Modernizr och jQuery, du hittar källkoden via följande länkar:

* [Källkod modernizr](js/modernizr.js)
* [Källkod jQuery](js/jquery.js)

Ser du att de använde closure båda två? Studera hur första raden och sista raden i koden ser ut. Det är alltså en anonym funktion som exekveras, med argument, och returnerar ett objekt med de delar som skall vara publika.

**Closure för Modernizr.**

```javascript
window.Modernizr = (function( window, document, undefined ) {
  // Code

  return Modernizr;

})(this, this.document);
```

**Closure för jQuery.**

```javascript
(function( window, undefined ) {
  // Code

  // Expose jQuery to the global object
  window.jQuery = window.$ = jQuery;

})( window );
```

I båda fallen skapas/returneras ett objekt, *en modul*, med de funktioner som skall vara tillgängliga, och modulen kopplas till window-objektet.

Här är ett mindre exempel på samma tema.

```javascript
window.Mumin = (function (name) {

  return {
    myNameIs: function () {
      return name;
    }
  };

})('Mumintrollet');

Mumin.myNameIs(); // returns 'Mumintrollet'
```

Detta är alltså ett *module pattern* som ofta används i JavaScript för att kapsla in data i ett objekt, eller modul.
 


###Callbacks {#callbacks}

En funktion utan namn kallas ibland för [anonym funktion](http://en.wikipedia.org/wiki/Anonymous_function) eller lambda-funktion[^4]. [Lambda](http://en.wikipedia.org/wiki/Lambda_calculus) kommer från matematiken,

Ett vanligt sätt att använda anonyma funktioner är för callbacks, följande exempel visar en event-hanterare, skapad med [`addEventListener()`](https://developer.mozilla.org/en/DOM/element.addEventListener) som tar hand om ett klick på en knapp via en anonym funktion som *callback funktion*.

```javascript
var button = document.getElementById('button');

button.addEventListener('click', function () {
    console.log('Great - you clicked the button!');
});
```

Enda gången som funktionen kommer anropas är i samband med att någon klickar på den specifika knappen. Det finns ingen anledning att spara undan funktionen i en variabel någonstans, eller att definiera funktionen i det globala scopet. Det räcker bra med att definiera funktionen precis där den används, som en anonym funktion.

[INFO]
**Tips**

Har du koll på hur event fungerar? [Event är en del av DOM](https://developer.mozilla.org/en-US/docs/Web/Events), glöm inte att kolla in manualen vid behov.
[/INFO]

Ett liknande exempel är om man vill animera en händelse med jämna tidsintervall. Då kan man använda en timer i JavaScript, tex [`window.setTimeout()`](https://developer.mozilla.org/en/DOM/window.setTimeout) eller [`window.setInterval()`](https://developer.mozilla.org/en/DOM/window.setInterval). Låt se hur det kan se ut.

```javascript
var button = document.getElementById('button');

button.addEventListener('click', function () {
    var colors = ['green', 'yellow', 'red', 'blue', 'pink'],
        step = 0,

    animateFunction = function () {
        if (step === colors.length) {
            button.style.backgroundColor = '';
        } else {
            button.style.backgroundColor = colors[step];
            step += 1;
            window.setTimeout(animateFunction, 500);
        }
    };

    window.setTimeout(animateFunction, 500);
});
```

Principen är att göra en funktion och sätta en timer att anropa funktionen med jämna intervall. I exemplet skapar jag funktionen `animateFunction()` som jag anropar med ett intervall av 0.5s. Processen startar när någon klickar på knappen och upprepas lika många gånger som det finns färger i arrayen `colors`.

Funktioner är både behändigt och kraftfullt i JavaScript, det är en central del i språket.

Här kan du [testa mitt exempel](javascript/core/animate-using-setTimeout/).

[YOUTUBE src=Nb4nU2VsyIE width=630 caption="Exempel på hur man kan animera med `setTimeout()`."]
