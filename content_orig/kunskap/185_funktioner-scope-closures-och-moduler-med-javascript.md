---
author: mos
category: javascript
revision:
  "2014-10-22": (A, mos) Första utgåvan i samband med javascript1 som en vidarutveckling
    av del av artikel i kursen javascript.
updated: "2014-10-22 16:10:28"
created: "2014-10-22 14:40:54"
...
Funktioner, scope, closures och moduler med JavaScript
==================================

JavaScript har ett funktions-scope, till skillnad från andra språk som PHP, Python, C/C++ och Java som har ett block-scope. Det påverkar hur vi bör, och kan, skriva vår kod i JavaScript. Vi kan till exempel utnyttja att funktions-scopet öppnar upp för ett så kallat *closure* som är den miljön som funktionen skapas i.

När vi har grepp på dessa konstruktioner så uppenbarar sig ett sätt att strukturera sin JavaScript-kod i så kallade moduler, enligt ett designmönster som kallas "module pattern". Låter det krångligt? Häng med in i en underbar värld av JavaScript, scope, closures och moduler. 

<!--more-->



Funktioner och scope {#scope}
-----------------------

I ett programmeringsspråk innebär “scope” den synlighet och levnadstid som variabler och parameterar har. Det handlar om minneshantering och namnkonflikter. De flesta C-liknande programmeringsspråk har “block”-scope, alla variabler är synliga i det blocket de är definierade och försvinner ur scoopet när man går ur blocket.

JavaScript har inte block-scope, även om det kan se ut så. JavaScript har “function”-scope vilket betyder att:

* Variabler som definierats i en funktion är inte synliga utanför den funktionen.
* En variabel i en funktion är synlig inom hela den funktionen, inklusive i funktioner som definierats i funktionen.

```javascript
function f1 (a) {
    var b; // a & b is available to all functions declared 
           // within this functions scope

    function f2 (c) {
        var d; // c & d is available to only within this functions 
               // scope
    }
}
 
f1(); // OK
f2(); // Not callable
```

Titta på följande utökade exempelkod där funktionen `f2()` definieras inom ramen för funktionen `f1()`. Det innebär att funktionen `f2()` har tillgång till allt som är definierat inom ramen för `f1()`. Det är den yttre funktionen som ger oss scopet.

Men, `f1()` har inte tillgång till de variabler som definierats inom `f2()`. De kan bara nås inifrån `f2()`.

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

Många programmeringsspråk (med block-scope) säger att variabler skall definieras så sent som möjligt, precis innan de används. I JavaScript definierar vi variablerna överst i funktionen, helst inom en enda var-deklaration separerade med kommatecken. Eftersom de är synliga inom hela funktionen så gör vi bäst i att tydligt definiera dem överst i funktionen, oavsett när de används.

Den stora skillnaden mot block-scope är alltså:

* Definiera variablerna överst i funktionen. 
* Den inre funktionen har tillgång till den yttre funktionens variabler.



Funktioner och closure {#closure}
-----------------------

I exemplet ovan har den inre funktionen `f2()` tillgång till allt som är definierat i funktionen `f1()`. Detta kallas för ett "[closure](http://en.wikipedia.org/wiki/Closure_%28computer_science%29)" vilket är ett begrepp i programmeringspråk som stödjer [funktionell programmering](http://en.wikipedia.org/wiki/Functional_programming). Programmeringsspråket [Lisp](http://en.wikipedia.org/wiki/Lisp_%28programming_language%29) är ett exempel på ett sådant språk, liksom JavaScript och faktiskt även PHP.

Det som är spännande med closures är att den omgivning som en funktion skapas i, den lever så länge funktionen lever.

Här är ett exempel på en closure där den inre funktionen har tillgång till de icke lokala variabler som fanns när funktionen definierades. Du kan se det som att den yttre funktionen har variabler som lever, även om vi inte använde den funktionen som de ligger i. Själva scopet, som funktionen `inner()` skapats i, lever kvar. Det är en *closure*, en funktion och den miljö den skapades i.


```javascript
// Example on closure where inner function has access to non-local variables
window.accessToInner = (function() {
    var a = 1;

    function inner (b) {
        a += b;
        return a;
    }

    return inner; // returns access to inner function so it can be called outside of its environment.
})();


accessToInner(1); // returns 2
accessToInner(1); // returns 3
accessToInner(1); // returns 4
accessToInner(1); // returns 5
```

En funktion har det scope som finns när den definieras, oavsett var den exekveras. Man kan alltså definiera en funktion i en miljö och sedan förutsätta att funktionen exekveras i samma miljö. Detta ger möjligheter till inkapsling och låter oss undvika globala variabler.



Moduler -- "Module pattern" {#module}
-----------------------

Ett vanligt sätt är att använda closure är för att skapa moduler av JavaScript kod. Man lägger en hel modul i en funktion, där finns hela scopet, ett eget closure. I denna funktion definieras allt som behövs i modulen, variabler såsom funktioner. Till sist returneras en objekt-literal där man anger modulens publika interface. 

Se följande exempel där jag skapat en modul `Mos` som är tänkt att innehålla lite bra-att-ha saker.

```javascript
window.Mos = (function() {
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

})();

Mos.random(1, 6);
Mos.dump(window.localStorage);
```

Funktionen definierar ett objekt som innehåller två metoder, funktionen exekveras direkt eftersom den omsluts av parenteser och returnerar därmed objektet `Mos` som tilldelas `window`. En poäng med detta är att variabeln `private` som definieras i funktion, är tillgänglig varje gång en metod i objektet `Mos` anropas. Man får alltså en struktur som liknar ett objekt med publikt interface och med privata delar.

Denna struktur är samma som används av kända JavaScript-bibliotek som jQuery och Modernizr.

Du hittar källkoden till jQuery och Modernizr via följande länkar:

* [Källkod modernizr](js/modernizr.js)
* [Källkod jQuery](js/jquery.js)

Studerar du källkoden so ser du att de använder closure båda två. Studera hur första raden och sista raden i koden ser ut. Det är alltså en anonym funktion som exekveras, med argument, och returnerar ett objekt med de delar som skall vara publika.

**Closure för Modernizr.**

```javascript
window.Modernizr = (function() {
    // Code

    return Modernizr; // An object with all public methods

})();
```

**Closure för jQuery.**

```javascript
(function() {
    // Code

    // Expose jQuery to the global object
    window.jQuery = window.$ = jQuery;

})();
```

I båda fallen skapas ett objekt, en modul, med de funktioner som skall vara tillgängliga, och modulen kopplas till window-objektet.

Här är ett mindre exempel, som en variation på samma tema.

```javascript
window.Mumin1 = (function () {

    return {
        myNameIs: function () {
            return "Mumintrollet";
        }
    };

})();

Mumin1.myNameIs(); // returns 'Mumintrollet'
```

Samma kod skulle kunna skrivas så här.

```javascript
window.Mumin2 = (function () {

    function getName() {
        return "Mumintrollet";
    }

  return {
        myNameIs: getName
  };

})();

Mumin2.myNameIs(); // returns 'Mumintrollet'
```

Oavsett funktionens interna namn kan man alltså byta namn på den när man returnerar det publika api:et i form av objekt-literalen.

Vi vill lära sig av de bästa, likt Modernizr och jQuery, så ser vi att detta modul pattern ett bra sätt att kapsla in sin kod på.



Kör exempelprogrammen {#exempel}
-----------------------

De exempelprogram som visas upp här finns med som en del i [kursrepot för kursan javascript1](https://github.com/mosbth/javascript1/blob/master/example/module/js/main.js).

Du kan [testköra exempelprogrammen här](javascript1/repo/example/module/). Öppna Firebugs console och ladda om sidan för att se vad som skrivs ut. Därefter kan du själv anropa funktionerna eftersom de är en del av window-objektet.

Det kan se ut så här när du testkör exempelprogrammen.

[YOUTUBE src=793tN9d5ewU width=630 caption="Testkör exempelprogram genom att anropa funktionerna från Firebugs console."]



Avslutningsvis {#avslutning}
-----------------------

Det finns en egen tråd i forumet där du kan [diskutera det som artikeln tar upp](t/3042).
