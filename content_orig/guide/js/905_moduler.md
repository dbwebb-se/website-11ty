---
...
Moduler
==================================

En tanke med moduler är att man väljer vilka metoder och variabler man vill exponera och göra tillgängliga. Ponera att vi skapar en modul, `Me` som ska innehålla information om mig. Jag är lite känslig för min ålder så användaren ska bara kunna få reda på den om jag talar om vilken metod som ska användas.

```javascript
window.Me = (function() {
    let age = 35;
    let name = "Kenneth";

    function getAge() {
        return age;
    }

    return {
        name: name,
        getAge: getAge
    }
})();

console.log(Me);            // {name: "Kenneth", getAge: ƒ}
console.log(Me.name);       // "Kenneth"
console.log(Me.age);        // undefined
console.log(Me.getAge());   // 35
```

Så vad är det som händer i koden? Vi kopplar på en funktion till window-objektet så gör vi den nåbar av alla. Funktionen kommer köras automatiskt och exponera det vi returnerar. Fundera lite på det vi vet om `scope` och att man kan se ut men inte in. Klar? Bra. Konstruktionen skapar ett `closure` där scopet för den inre funktionen `getAge()` även innefattar variablerna `age` och `name`. Utanför den självexekverande funktionen kan vi inte nå dem. Om vi tittar närmare på `return` så ser vi att vi returnerar ett objekt där vi har definierat vad som ska vara synligt för användaren.

Vi kan byta namn på variabler och metoder när vi returnerar objektet:

```javascript
window.Me = (function() {
    let age = 35;
    let name = "Kenneth";

    function getAge() {
        return age;
    }

    return {
        myNameIs: name, // Vi kan byta namn här...
        myAge: getAge   // ...och här.
    }
})();

console.log(Me);                // {myNameIs: "Kenneth", myAge: ƒ}
console.log(Me.myNameIs);       // "Kenneth"
console.log(Me.myAge());        // 35
```

Vi kan även strukturera om koden ovan på följande sätt:

```javascript
window.Me = (function() {
    let age = 35;
    let name = "Kenneth";

    return {
        myNameIs: name,
        myAge: function() {
            return age;
        }
    }
})();

console.log(Me);                // {myNameIs: "Kenneth", myAge: ƒ}
console.log(Me.myNameIs);       // "Kenneth"
console.log(Me.myAge());        // 35
```
