---
author:
    - moc
revision:
    "2020-09-24": (A, moc) Skapad inför HT2020.
...
CSS Grid Layout
==================================

I moderna webbläsare finns det ett nytt sätt för att skapa grid layouts, istället för metoder man har använt tidigare med tabeller, floats, flexbox osv. Detta nya moderna och tyvärr inte riktigt supporterade sätt kallas CSS Grid Layout eller kort och gott CSS Grid. Webbplatsen Can I Use hjälper till att kolla om en viss konstruktion stöds i en viss webbläsare. Prova att sök på [CSS-Grid på "Can I Use"](http://caniuse.com/#search=css-grid) för att se hur bra stödet är i de olika webbläsarna.

Vi ska i denna artikel kort titta på hur man kan använda CSS Grid för att skapa en enkel responsiv sida med en header, side bar, main med fyra kolumner och en footer. För mer information om CSS Grid kan [A Complete Guide to CSS Grid](https://css-tricks.com/snippets/css/complete-guide-grid/) rekommenderas.

[FIGURE src=image/design-guide/grid-layout.png?w=w3 caption="Från exempel koden"]

Vi börjar med lite HTML där vi skapar en layout för våran sida som vi sedan vill placera ut i ett grid.


```html
<div class="grid wrapper">
    <div class="header">Header</div>

    <div class="side-bar">Side-bar</div>
    <div class="main">Main</div>

    <div class="footer">Footer</div>
</div>
```

För att webbläsaren ska veta om att vi vill använda CSS Grid definierar vi en ny klass `grid` som kan återanvändas där vi skall använda det.

```css
.grid {
    display: grid;
}
```

Vi vill sedan definiera hur vi vill ha våra rader och kolumner i vår grid. Vi kommer ha en rad för header, en där kolumnerna ligger och en för footer, sedan vill vi ha en kolumn för den vänstra kolumnen och en för den högra. Vi definierar det med följande kod, där vi även centrerar `wrapper` och sätter storlekarna på både `wrapper` samt för våra rader och kolumner.


```css
.wrapper {
    max-width: 960px;
    margin: 0 auto;
    grid-template-columns: 200px auto;
    grid-template-rows: 200px 600px 200px;
}
```

I ovanstående exempel sätter vi att vi att andra kolumnen automatisk ska anpassa sig och ta upp resten av utrymmet som finns tillgängligt och att kolumn ett ska vara 200 pixlar bred. Sedan definierar vi vår tre rader som 200 pixlar, 600 pixlar och 200 pixlar höga.

Det som återstår nu är att placera ut våra `items` på rader och kolumner i vårt grid. Vi gör detta med det som kallas `short-hand syntax` så vi definierar på vilken linje mellan rader eller kolumner våra element ska starta och sluta. För header delen vill vi att den ska starta på 1:a kolumn-linjen och sluta på 3:e kolumn-linjen, dvs hela översta raden. Detta gör vi med följande kod.

```css
.header {
    grid-column: 1 / 3;
    grid-row: 1 / 1;
}
```

För de andra element blir det följande kod med de två kolumner och en footer som tar upp hela bredden.

```css
.main {
    grid-column: 2 / 2;
    grid-row: 2 / 3;
}

.side-bar {
    grid-column: 1 / 2;
    grid-row: 2 / 3;
}

.footer {
    grid-column: 1 / 3;
    grid-row: 3 / 3;
}
```

När man använder CSS Grid Layout kan vi alltid placera elementen så som vi gjorde med short-hand syntax. Det finns dock ett mer visuellt alternativ, med grid-template-areas kan vi lättare "rita ut" hur våran layout skall se ut. Vi lägger till tre stycken element inuti i våran main och ger den grid klassen.

```html
<div class="grid main">
    <div class="top-left">Top-left</div>
    <div class="top-right">Top-right</div>

    <div class="bottom">Bottom</div>
</div>
```

Nu vill vi ha tre extra egenskaper till main. `grid-template-areas` där vi ritar ut våran nya layout, `grid-template-columns` med `repeat(2, 1fr);` som säger att båda våra kolumner skall ta lika mycket plats och grid-gap så att våra element får lite utrymme.

```css
.main {
    grid-column: 2 / 2;
    grid-row: 2 / 3;
    grid-template-areas: 'top-left top-right' 'bottom bottom';
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 25px;
}
```

Nu behöver vi tilldela alla elementen deras plats i vårt grid. Detta görs genom `grid-area`. För varje element sätter vi helt enkelt namnet på den template-arean vi satte ut.

```css
.bottom { grid-area: bottom; }
.top-left { grid-area: top-left; }
.top-right { grid-area: top-right; }
```

Så länge webbplatsen är lite bredare ser det bra ut men, när sidan blir mindre och mer svårläst vill vi att våra top elements skall ta hela brädden. Så vi lägger till en liten media query som löser det. 

```css
@media screen and (max-width: 960px) {
    .main {
        grid-gap: 5px;
        grid-template-columns: repeat(1, 1fr);
        grid-template-areas: 'top-left' 'top-right' 'bottom';
    }
}
```

Det som behövdes var att ändra om våra kolumner och rita om layouten.

I `example/css-grid-layout` och på [Github](https://github.com/dbwebb-se/design-v3/tree/master/example/css-grid-layout) finns koden från detta exempel med möjlighet att leka runt med de olika värdena för att testa hur CSS Grid fungerar.
