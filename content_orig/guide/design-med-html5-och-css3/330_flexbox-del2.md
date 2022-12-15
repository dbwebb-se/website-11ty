---
author:
    - nik
revision:
    "2020-11-17": (B, nik) Added part about flex-basis
    "2020-11-11": (A, nik) Skapad inför HT2020.
...
Flexbox - Child Elements
==================================

Vi kollar vidare på flexbox men fokuserar istället på vilka regler vi kan sätta på barnelementen. Det är specifikt två regler, `order` och `flex-grow` vi vill kolla lite mer på.

## Utgångsläget

Vi utgår från samma som förra delen och kan se resultatet i `example/flexbox/html-child-example.html`.

```html
<div class="container">
    <div>Div1</div>
    <div>Div2</div>
    <div>Div3</div>
</div>
```

och vår CSS:

```css
.container {
    display: flex;
}
```

[FIGURE src=image/design-v3/flexbox/default.png caption="Default display: flex"]

## Order

Regeln [order](https://developer.mozilla.org/en-US/docs/Web/CSS/order) tillåter oss att specificera vilken ordning våra element ska ligga. Vi sätter följande CSS-regler:

```css
.order-1 {
    order: 1;
}

.order-2 {
    order: 2;
}

.order-3 {
    order: 3;
}
```

Det gör att vi kan placera reglerna på olika element, t.ex. såhär:

```html
<div class="container">
    <div class="order-2">Div1</div>
    <div class="order-3">Div2</div>
    <div class="order-1">Div3</div>
</div>
```

Det ger oss följande resultat:

[FIGURE src=image/design-v3/flexbox/order.png caption="order"]

## Flex Grow

Den andra regeln vi vill kolla på är [flex-grow](https://developer.mozilla.org/en-US/docs/Web/CSS/flex-grow) som tillåter oss att sätta hur stor del av föräldraelementet våra barnelement ska ta. Vi kollar på tre olika exempel:

```css
.flex-grow-1 {
    flex-grow: 1;
}

.flex-grow-2 {
    flex-grow: 2;
}

.flex-grow-4 {
    flex-grow: 4;
}
```

och vår HTML:

```html
<div class="container">
    <div class="flex-grow-1">Div1</div>
</div>
<div class="container">
    <div class="flex-grow-1">Div1</div>
    <div class="flex-grow-2">Div2</div>
    <div class="flex-grow-4">Div3</div>
</div>
<div class="container">
    <div class="flex-grow-4">Div1</div>
    <div class="flex-grow-2">Div2</div>
    <div class="flex-grow-4">Div3</div>
</div>
```

Om man räknar ihop alla `flex-grow` i hela föräldrarelementet kan vi se hur det blir. I den första finns det bara en, så den tar 100% av bredden. I det andra exemplet så har vi 1, 2 och 4. Totalt är det 7, vilket gör att varje enskilt värde är 100/7 vilket är ca 14.3% av den totala bredden. Första div:en är då 14.3%, andra 28.6% och sista 57.2%, på ett ungefär. Den sista följer samma logik, där den totala summan istället är 10 och de två yttre div:arna är 40% och den mellersta är 20%.

[FIGURE src=image/design-v3/flexbox/grow.png caption="flex-grow"]

### Flex Basis

När man börjar fylla sina div:ar med innehåll så kan det hända att `flex-grow` inte riktigt beter sig som vi tänkt oss. CSS-Tricks har en bra artikel där de förklarar vad det är som händer och varför det inte fungerar som vi vill, ["flex-grow" is weird. Or is it?](https://css-tricks.com/flex-grow-is-weird/).

Vi kan nöja oss med att vi kan jobba runt det genom att använda `flex-basis`. Flex-basis sätter vår elements originalbredd, innan den får sin bredd fördelad av `flex-grow`. Så om vi lägger `flex-basis: 0` på våra element så följer den `flex-grow` som vi förväntas oss.
