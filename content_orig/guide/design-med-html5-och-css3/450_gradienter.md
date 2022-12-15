---
author: efo
revision:
    "2018-10-11": "(A, efo) Första versionen."
...
Gradienter
=======================

Gradienter kan nog för många skapa hemska flashbacks till slutet av 90-talet och WordArt gradienter i alla Word-dokument och PowerPoint-presentationer. Men gradienter har de senaste åren fått en stark comeback och kan skapa en känsla av rörelse på en webbplats. Vi har inte längre bara en statisk färg i bakgrunden, men om gradienter används på ett sparsamt sätt ger det en subtil ändring av bakgrunden. Ett bra exempel på hur man kan använda gradienter för att skapa rörelse i en webbplats är [Firing People](https://zachholman.com/talk/firing-people)  av Zach Holman (viktigt att scrolla ner lite på sidan).

En gradient definieras med följande CSS. Vi definierar först vilken sorts gradient vi vill skapa (linear, radial eller conic) och sedan vilka färger vi vill använda. I nedanstående exempel har vi en linjär-gradient från röd till orange uppifrån och neråt.

```css
.gradient {
    background-image: linear-gradient(red, orange);
}
```

Om vi vill ändra åt vilket håll gradienten går kan vi använda den riktningen vi vill att gradienten ska gå i. Till exempel 'to right' för en gradient som går från vänster till höger. I nedanstående exempel finns olika exempel på hur man kan använda gradienter. Kolla även in den som ligger på bakgrunden.

[CODEPEN src=aRjRNK user="dbwebb" tab="result" caption="Gradienter"]

För ytterligare exempel rekommenderas CSS-tricks [CSS Gradients](https://css-tricks.com/css3-gradients/) artikel.
