---
...
createElement
==================================

Vi kan även skapa html-element i JavaScript. Det görs med den inbyggda funktionen `createElement`. Låt säga att vi vill skapa 5 lådor, där vi har stylat klassnamnet `box` i css. Vi kan åstadkomma skapandet i JavaScript:

```javascript
let myContent = document.getElementsByClassName('content')[0];

for (let i = 0; i < 5; i++) {
    let box = document.createElement("div");
    box.className = "box";

    myContent.appendChild(box);
}
```

Vi använder den inbyggda funktionen `appendChild` för att lägga till box-elementen inuti content-elementet. Det går att skapa väldigt många html-element på liknande sätt och manipulera dem i JavaScript.



### Resultat {#resultat}

Resultatet blir likadant som tidigare:

[FIGURE src=/image/javascript/guide/create-element.png?w=w3 caption="element skapade med createElement()"]
