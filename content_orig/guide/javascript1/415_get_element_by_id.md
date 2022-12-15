---
...
Hämta element via id
==================================

Vi vet att man kan sätta ett `id` på html-elementen, till exempel `<div id="content">`. Vi bör inte använda id för att styla elementen men om man ska hämta ut det via JavaScript går det bra. Ett id får bara tillhöra ett element och ska vara unikt för sidan. Det gör att vi enbart hämtar just det elementet.

Vi behöver en sida som har definierat ett elements id-attribut. Utgångsläget kommer vara sandboxen som du hittar i [exempelmappen](https://github.com/dbwebb-se/javascript1/tree/master/example/sandbox). Tillhörande exempelprogram kommer laddas upp i exempelmappen under kursens gång.

Raden i sandbox/index.html vi ska fokusera på är:

```html
<div id="content" class="content">
```

Där har vi satt ett id på elementet, bra. Då är det bara att tuta på!



### JavaScript-filen {#js-filen}

Då JavaScript-filen har länkats in via `js/main.js` kan vi nå vår div därifrån:

```javascript
let myContent = document.getElementById('content');

myContent.innerHTML = '<h3>This is a template!</h3>';
```

Vi kan se att elementet hämtas via `document` som är själva huvudsidan. Allting kan nås därifrån. Nu har vi div-objektet i variabeln `myContent` och kan styra och ställa med den. Med innerHTML kan vi bestämma hur den "inre html-koden" ska vara i just det elementet. Här skriver vi ut "This is a temlpate!" inuti en `<h3>`-tagg.



### console.log {#console-log}

Ett tips är att använda `consolen`, som du hittar via webbläsaren och `F12`, alternativt högerklicka och välja "Inspect" eller liknande. Vi lägger till raden:

```javascript
window.console.log(myContent);
```

Om du nu kikar i consolen kan du se hela elementet som vi har fångat:

[FIGURE src=/image/javascript/guide/consolelog1.png?w=w3 caption="Utskriften i consolen"]
