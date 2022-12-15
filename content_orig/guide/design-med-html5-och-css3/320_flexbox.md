---
author:
    - nik
revision:
    "2020-11-11": (A, nik) Skapad inför HT2020.
...
Flexbox - Parent Elements
==================================

Ett annat sätt att placera saker på sin sida är med hjälp utav Flex, även kallat Flexbox, och kan ses som ett mellansteg mellan float och grid. Vi ska kolla lite mer på hur det kan användas i den här guiden med hjälp utav två exempelsidor som ligger i `example/flexbox`, så det är bra att öppna upp dem och kolla med i guiden.

Om man vill ha en lite mer djupdykning så kan man kolla på [A Complete Guide to Flexbox](https://css-tricks.com/snippets/css/a-guide-to-flexbox/) ifrån CSS-Tricks, som är en tydlig och utförlig förklaring av hur alla regler kan fungera.

## Utgångsläget

Alla div:ar i exemplet är uppbyggt på samma sätt, bara att det ligger annorlunda CSS-regler på dem. Såhär ser HTML-strukturen ut:

```html
<div class="container">
    <div>Div1</div>
    <div>Div2</div>
    <div>Div3</div>
</div>
```

Jag har valt att skriva en kort text i varje div för att tydligt visa vad som händer med varje CSS-regel, utöver färgkodning.

## Föräldraelement

Vi börjar med att kolla på vilka regler som finns att lägga på föräldraelementet, parent-element. Till att börja med så behöver man först säga att man vill använda sig utav flex. Du kan se hur det ser ut själv genom att öppna `example/flexbox/html-parent-example.html`.

```css
.container {
    display: flex;
}
```

Jag lägger det på `.container` klassen som jag har på samtliga föräldraelement i mitt exempel. Därefter jag kan jag lägga på fler klasser utan att behöva återupprepa `display: flex` för varje element.

Med bara `display: flex` så kan det då ser ut såhär:

[FIGURE src=image/design-v3/flexbox/default.png caption="Default display: flex"]

Utifrån detta så kör vi på med några av de regler man kan använda tillsammans med `display: flex`.

### Flex Direction

Den första regeln vi går igenom, är [flex-direction](https://developer.mozilla.org/en-US/docs/Web/CSS/flex-direction). Det är ett sätt för oss att säga i vilken riktning vi vill lägga våra tre barnelement (child elements). Det finns fyra olika:

```css
.row {
    flex-direction: row;
}

.row-reverse {
    flex-direction: row-reverse;
}

.column {
    flex-direction: column;
}

.column-reverse {
    flex-direction: column-reverse;
}
```

`row` är default och lägger elementen på samma rad, i ordningen de kommer i vår HTML. `row-reverse` är på samma rad, men omvänt. Sen har vi `column` och `column-reverse`, som istället lägger våra element i en kolumn. Nedan kan du se hur det ser ut:

[FIGURE src=image/design-v3/flexbox/flex-direction.png caption="flex-direction"]

### Flex Wrap

Den andra regeln är [flex-wrap](https://developer.mozilla.org/en-US/docs/Web/CSS/flex-wrap) som tillåter oss att bryta en rad som annars blir överfull. Denna är inte så vanlig, men det är bra att veta att den finns. Där finns det tre stycken värden vi kan välja:

```css
.nowrap {
    flex-wrap: nowrap;
}

.wrap {
    flex-wrap: wrap;
}

.wrap-reverse {
    flex-wrap: wrap-reverse;
}
```

`nowrap` är default och lägger allt på samma rad, även om elementen är över 100% av bredden. I exemplet så har vi tre div:ar, som har `width: 50%`. Med `display: flex` och utan någon `flex-wrap` regel, så tar de istället 33% av bredden var. Men om vi lägger på `flex-wrap: wrap` så gör den en brytning och flyttar ner en av boxarna under. `flex-wrap: wrap-reverse` gör samma sak, fast omvänt. Såhär kan det se ut:

[FIGURE src=image/design-v3/flexbox/flex-wrap.png caption="flex-wrap"]

### Justify Content

Den sista regeln vi vill kolla på när det gäller föräldraelementet är [justify-content](https://developer.mozilla.org/en-US/docs/Web/CSS/justify-content) som ger oss möjlighet att placera våra child elements. Det finns sex stycken regler vi vill kolla lite närmre på här:

```css
.flex-start {
    justify-content: flex-start;
}

.flex-end {
    justify-content: flex-end;
}

.center {
    justify-content: center;
}

.around {
    justify-content: space-around;
}

.between {
    justify-content: space-between;
}

.evenly {
    justify-content: space-evenly;
}
```

Först ut har vi `flex-start` som placerar våra tre div:ar i början av flex-container och `flex-end` som placerar dem i slutet. Sen har vi `center` som centrerar våra tre div:ar och sist ut har vi tre sätt att placera med mellanrum. `space-around` ger lika mycket utrymme till vänster och höger på samtliga element. `space-between` placerar elementen så långt ifrån varandra som det går och `space-evenly` som lägger ett lika stort avstånd mellan varje element. Såhär kan det se ut:

[FIGURE src=image/design-v3/flexbox/justify-content.png caption="justify-content"]
