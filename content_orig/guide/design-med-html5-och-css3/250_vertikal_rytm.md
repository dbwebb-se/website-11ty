---
author: efo
revision:
    "2018-10-08": "(A, efo) Första versionen."
...
Vertikal rytm
=======================
För att ytterligare öka läsbarheten och samtidigt skapa ett lugn på sidan ska vi i denna del av guiden titta på hur vi kan skapa vertikal rytm också kallat det typografiska gridet.

För att skapa vertikal rytm i våra dokument baseras alla typsnitts storlekar och vita utrymmen i mellan texten på en baseline. Vår baseline är standard typsnitts storlek gånger radavståndet. Vi börjar med att definiera radavståndet, en bra tumregel är att använda sig av 120% till 145% av typsnitts storleken. I CSS använder vi `line-height` för att definiera radernas avstånd och vi anger `line-height` utan enhet som en multipel, så 120% är lika med 1.2 och 145% är lika med 1.45.

I exemplet nedan används radavståndet `1.4` och storleken `1.25em` som standard typsnitts storlek. Vår baseline blir då `1.4 * 1.25 = 1.75` För alla marginaler används `rem` då vi inte vill att marginalerna påverkas av typsnittets storlek för aktuella elementet.

```css
body {
    line-height: 1.4;
}

p {
    font-size: 1.25em;
    margin-bottom: 1.75rem; /* 1.4 * 1.25em vår baseline */
}

h1 {
    font-size: 2.8em;
    margin-bottom: 3.5rem; /* baseline * 2, för att skapa mer utrymme */
}
```

I exemplet nedan finns en möjlighet för att leka runt med storleken på typsnitten för de olika elementen och se hur de ändrar sig.

[CODEPEN src=YJNxow user="dbwebb" tab="result" caption="Vertikal rytm"]
