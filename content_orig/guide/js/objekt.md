---
...
Objekt
==================================

Objekt är en samling av namngivna värden som vanligen kallas "properties". För att referera till ett objekts property används punkt. I andra programmeringsspråk kan du se konstruktionen som en 

Man kan skapa ett objekt med objekt-literalen `{}`.

Här är ett exempel på ett objekt `myBall` som innehåller en bild på en boll och en placering av bollen på en tvådimensionell yta.

```javascript
var myBall = {};

myBall.image = 'http://dbwebb.se/img/black_ball_64_64.png';
myBall.position = {x:10, y:10}

console.log(myBall.position.x); // prints out 10
```

Ett objekt behöver inte innehålla någon properties från början, de kan defineras under resans gång, det är både bra och dåligt. Smidigt att inte behöva ha en specifikation på objektet utan att det går att modifiera dynamiskt under körningen, inte så bra när man skriver fel på namnet på en property och tror att man läser en befintlig property men istället definerar man en ny. Detta kallas att JavaScripts objekt är *mutable* [^10].

I nedan exempel har jag stavat fel på propertyn för `x`. Jag *tror* jag flyttar objektet till position 27 men det gör jag inte. Jag definerar en ny property med namnet `X` (skillnad på stor och liten bokstav). Sådant kan vara lurigt att felsöka.

```javascript
myBall.position.X = 27; 

console.log('The x-position of my ball is: ' + myBall.position.x);
```

Nu har vi ett enkelt objekt och kan lägga till metoder. Eller ja, metoder i form av en property som är en funktion. Det är alltså inget speciellt med en metod, bara ytterligare en property som kan innehålla allt som en vanlig variabel kan innehålla.



###Objekt och `this` {#this}

Vad sägs om en metod `draw()` för att rita ut objektet på skärmen? Vi kallar det metoder när funktioner är kopplade till ett objekt.

```javascript
myBall.HTMLelement = document.getElementById('ball');

myBall.draw = function () {
   this.HTMLelement.style.backgroundImage = 'url(' + this.image + ')';
   this.HTMLelement.style.top = this.position.y + 'px';
   this.HTMLelement.style.left = this.position.x + 'px';
   console.log('Drawing ball.');
}

myBall.draw();
```

När man exekverar en funktion i ett objekt kan man använda [`this`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Operators/this) för att referera till det objekt som anropade funktionen [^5] [^6].

Låt oss lägga till en eventhanterare för klick på bollen och kolla vad som är `this` i en eventhanterare.

```javascript
myBall.HTMLelement.addEventListener('click', function (event) {
  console.log('Clicked on: ' + event.clientX + ' x ' + event.clientY);
  console.log(this);
});
```

Om du testkör ovanstående kod så kommer du att se att `this` pekar på `myball.HTMLelement`, alltså det objekt/funktion som är ägare till funktionen. Bra, då har vi koll på det. Vi måste dock vara lite uppmärksamma på vilket objekt som verkligen är `this` i olika sammanhang. Men här gick det bra.


<!--
###Urmodern till alla objekt {#urmoder}

Det finns en Object wrapper som är urmodern till alla JavaScript objekt, läs om vilka [metoder den erbjuder](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object). Alla nya objekt skapas med en mall som kallas `Object.prototype`. Därför får alla nya objekt tillgång till de metoder och properties som definieras i [Object.prototype](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/prototype). 

Detta är grunden till JavaScripts prototypbaserade objektmodell. Vi skall inte fördjupa oss i den nu. Men detta är anledningen till att ditt nyskapade objekt kan skrivas ut så här.

```javascript
myObject = {};
print(myObject);    // Ger "[object Object]"
myObject.toString() // Ger "[object Object]"
```

I exemplet ovan ser vi att man kan använda metoden `toString()` på vårt objekt som inte borde innehålla en sådan metod. Det är alltså kopplingen till Object som gör att den finns tillgänglig även för vårt nyskapade objekt.

Om man vill se kopplingen mellan objekt så kan man använda operatorn [`instanceof`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/instanceof) för att testa om en relationen stämmer.

```javascript
myString = new String("hej");
myString instanceof Object // true

myObject = {};
myObject instanceof Object // true
```

Vi lämnar den prototypbaserade objektmodellen tills vidare, vi får ta mer om det en annan dag.

Fint, då har vi lite koll på hur objekt fungerar.

-->



###Övning flytta bollen {#uppgift-bollen}

Du har en boll och du kan klicka på en plats i webbläsaren och bollen flyttar sig dit.

Så här kan exempelprogrammet se ut.

[FIGURE src=/image/snapht15/js-push-ball.png caption="Klicka i rutan och bollen flyttar sig."]

Så här blev koden för [exempelprogrammet för mig](javascript/core/pushing-the-ball/).
