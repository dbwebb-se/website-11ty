---
...
Flytta ett element på skärmen
==================================

Nu vet vi hur vi ska fånga input från tangentbordet. Vi sätter det i ytterligare ett exempel som flyttar ett element på skärmen.


### html-koden {#html-koden}

Jag utgår ifrån sandboxen och ser till så följande kod finns i html-filen:

```html
<h1>Min Sandbox</h1>
<div id="content" class="content">
    <div class="box"></div>
</div>
<script type="text/javascript" src="js/main.js"></script>
```



### css-koden {#css-koden}

För att det ska gå att flytta runt elementet behöver det ha en viss css satt:

```css
.box {
    position: absolute;
    height: 100px;
    width: 100px;
    background-color: yellow;
    border: 2px solid black;
}
```

**position: absolute** är satt då vi ska styra elementet med css-egenskaperna `top` och `left`. De egenskaperna sätts automatiskt när "position" är satt och kan då manipuleras via JavaScript. I övrigt är det bara css för syns skull.

Vårt utgångsläge så här långt ser ut som följer:

[FIGURE src=/image/javascript/guide/move-element-start.png?w=w3 caption="Startläge för att flytta element."]



### javascript-koden {#javascript-koden}

Nu till det roliga. Vi vet hur vi fångar upp elementet att vi bland annat kan påverka dess css.

```javascript
let box = document.getElementsByClassName("box")[0];

document.addEventListener("keydown", function(event) {
    let key = event.key;
    let left = box.offsetLeft;
    let top = box.offsetTop;
    let step = 10;

    console.log("Du tryckte på: ", key);
});
```

**let key = event.key;** fångar upp vilken tangent som tryckts ned.  
**let left = box.offsetLeft;** fångar upp positionen på boxens vänstra kant i förhållande till dess förälders vänsterkant.  
**let left = box.offsetTop;** fångar upp positionen på boxens övre kant i förhållande till dess förälders överkant.  
**step = 10** är antalet pixlar elementet ska förflytta sig.

Vi behöver hantera vad som ska hända vid respektive tangent. Jag tänker att piltangenterna får styra elementet.

```javascript
switch (key) {
    case "ArrowUp":
        event.preventDefault();
        box.style.top = (top - step) + "px";
        break;
    case "ArrowDown":
        event.preventDefault();
        box.style.top = (top + step) + "px";
        break;
    case "ArrowLeft":
        box.style.left = (left - step) + "px";
        break;
    case "ArrowRight":
        box.style.left = (left + step) + "px";
        break;
}
```

**event.preventDefault();** är ett sätt att motverka att man scrollar, då "ArrowUp" och "ArrowDown" kan användas för att scrolla.

Vill man kontrollera så elementet håller sig inom ett visst element kan man hämta ut `clientHeight` och `clientWidth` från elementen. Se exemplet [getSize](https://github.com/dbwebb-se/javascript1/tree/master/example/getSize) i kursrepots exempelmapp.



### Resultat {#resultat}

Nu fångar vi upp piltangenterna och förflyttar elemetet 10px i respektive riktning. En CodePen visar ett bättre resultat än en skärmdump:

[CODEPEN src=xyJmjP user="dbwebb" tab="result" caption="Flytta element."]

Vi går vidare och undersöker fler events.
