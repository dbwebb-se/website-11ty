---
...
MouseEvent
==================================

Det finns en uppsjö events kopplade till musen med. Vi tar några av de vanligaste eventen. Eventen fångas upp på liknande sätt som för tangentbordet.



### click {#click}

Istället för att lägga klick-eventet på `document` kan vi lägga det så det triggas om vi klickar på ett speciellt ställe. Vi skapar några lådor att leka med.

```html
<div class="box"></div>
<div class="box"></div>
<div class="box"></div>
<div class="box"></div>
<div class="box"></div>
```

Lite css på den skapar fina, fyrkantiga lådor.

```css
.box {
    height: 100px;
    width: 100px;
    border: 1px solid black;
    background-color: yellow;
}
```

Vi hämtar lådorna med javascript och lägger på en eventlyssnare, som triggas när man klickar i respektive låda.

```javascript
let boxes = document.getElementsByClassName("box");

for (let i = 0; i < boxes.length; i++) {
    boxes[i].addEventListener("click", function(event) {
        event.target.style.backgroundColor = "blue";
    });
}
```

Först och främst hämtar vi lådorna via klassnamnet. Vi loopar igenom lådorna och lägger på klick-eventet och använder konstruktionen `event.target.style.backgroundColor` för att byta bakgrundsfärg till blå. Med `event.target` når vi just det elementet vi klickat på och kan således använda samma eventlyssnare till alla lådor.



### Resultat {#resultat}

Vi kör koden och om jag klickar på varannan låda blir det på följande sätt:

[FIGURE src=/image/javascript/guide/click1.png?w=w3 caption="MouseEvent som byter bakgrundsfärg."]



### Övriga mouse-events {#ovriga}

Även här finns det fler events att fånga upp. Det skiljer heller inte så mycket, utan definiera rätt event som argument till eventlyssnaren. Några självförklarande exempel är:

```javascript
boxes[i].addEventListener("mouseover", function(event) { ... }
boxes[i].addEventListener("mouseenter", function(event) { ... }
boxes[i].addEventListener("mouseleave", function(event) { ... }
boxes[i].addEventListener("dblclick", function(event) { ... }

// etc
```
