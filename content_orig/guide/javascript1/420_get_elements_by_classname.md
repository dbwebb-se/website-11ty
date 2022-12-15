---
...
Hämta element via klassnamn
==================================

Om vi hämtar element via klassnamn får vi alla element som har den klassen. Funktionen returnerar en array-list-liknande historia, en HTMLCollection. Vi behöver loopa igenom den eller peka på elementen i arrayen specifikt.



### html-filen {#html-filen}

```html
<div id="content" class="content">
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
</div>
```



### JavaScript-filen {#js-filen}

```javascript
let boxes = document.getElementsByClassName("box");

for (let i = 0; i < boxes.length; i++) {
    boxes[i].style.backgroundColor = "#503899";
    boxes[i].style.margin = "5px";
}

console.log(boxes);
```

En HTMLCollection har egenskapen `length` så vi kan loopa igenom den och nå alla element. Via `.style` kan vi ändra på elementens css.



### Resultat {#resultat}

Om du nu kikar i consolen kan du se att vi har fem objekt i typen `HTMLCollection`.

[FIGURE src=/image/javascript/guide/classname.png?w=w3 caption="element hämtade via klassnamn"]
