---
...
Function expression
==================================

*Function expression* tilldelar funktionen till en variabel som kan användas som identifierare. Funktionen är i sig anonym (namnlös) och deklareras när programmet körs.

```javascript
let speak = function() {
    console.log("I speak, therefore I am.");
}

speak(); // Prints "I speak, therefore I am." in the console
```

Vi kan även skicka med argument till funktionen:

```javascript
let speak = function(what) {
    console.log(what);
}

speak("I speak, therefore I am."); // Prints "I speak, therefore I am." in the console
```

Se på videon där jag går igenom function expression:

[YOUTUBE src=uVML3Nm-XcI width=630 caption="Kenneth visar function expression."]
