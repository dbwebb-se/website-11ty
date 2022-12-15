---
...
Funktioner
==================================

Funktioner är ett spännande kapitel i JavaScript. Även om allt är objekt så är JavaScript ett funktionsorienterat språk, men mer om det senare. Först tar vi grunderna.

Funktioner kan skapas på olika sätt, jämför följande sätt att använda och skapa en funktion.

```javascript
function square (x) {           // Traditionellt sätt, 
  return x*x;                   // att jämföra med C/C++, PHP.  
}
val = square(x);

var square = function (x) {     // Funktions literal / Funktion expression, 
  return x*x;                   // funktionen tilldelas en variabel
}
val = square(x);

element.onclick = function () {  // Namnlös funktion som används 
  alert('Hello');                // som eventhanterare.
}

element.addEventListener("click", function () {
  alert('Hello');                // Variant på namnlös funktion som
});                              // eventhanterare som skickas som 
                                 // parameter i en funktion.
```

Funktioner har en argumentlista. Om man anropar funktionen med färre argument än listan så får de kvarvarande argumenten värdet `undefined`.

```javascript
function sum(a, b, c) {
  return a + b + c;
}

sum(1, 2, 3); // returnerar 6
sum(1, 2);    // returnerar NaN
```

Man kan ge "default"-värden på ett argument med hjälp av operatorn `||`. Studera följande funktion.

```javascript
function sum(a, b, c) {
  a = a || 0;
  b = b || 0;
  c = c || 0;
  return a + b + c;
}

sum(1, 2, 3); // returnerar 6
sum(1, 2);    // returnerar 3
```

Man kan även hantera en variabel argument-lista med identifieraren `arguments` som finns tillgänglig inuti funktionen.

```javascript
function sum() {
  var i, sum = 0;
  
  for(i = 0; i < arguments.length; i++) {
    sum += arguments[i];
  }
  
  return sum;
}

sum(1, 2, 3);           // returnerar 6
sum(1, 2, 3, 4, 5, 6);  // returnerar 21
```

Den inbyggda variabeln `arguments` är en array som innehåller samtliga argument som skickats till funktionen.



###Övning tärning med funktioner {#uppgift-tarning}

Gör ett tärningsprogram, där en tärning kastas, snittvärdet beräknas och visas tillsammans med slagserien. Gör så här:

* Skapa en funktion `random(min, max)` som returnerar ett slumptal mellan `min` och `max`.
* Skapa en funktion `rollDice(times)` som kastar tärningen `times` gånger och returnerar en sträng med resultatet av alla slagningar samt medelvärdet av kast.

Så här kan det se ut när du kör ditt program.

[FIGURE src=/image/snapht15/js-dice.png caption="Tärningar uppbyggt av funktioner."]

Så här blev mitt [testprogram för tärningen](javascript/core/throwing-dice-using-functions/).
