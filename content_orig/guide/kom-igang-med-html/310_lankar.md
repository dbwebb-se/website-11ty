---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Länkar {#lankar}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a</a>

Taggen `<a>` står för *ankare* och används för att skapa länkar.

Länkar är en viktig del av en hemsida, det är så du ser till så att den som besöker hemsidan kan ta sig mellan dina olika sidor. Självklart används det också för att länka till externa hemsidor.

Skillnaden mellan lokala och externa länkar är att lokalt behöver man inte ange hela länken utan man behöver bara ange vägen till filen från den katalogen där dokumentet som länken i sig ligger i finns, precis som med bilder.

Jag har skapat ett dokument som heter `report.html` som jag lagt i `me/`-katalogen. När jag vill länka till den i index.html så använder jag attributet `href` på en `a`-tagg:

```html
<a href="report.html">Redovisningar</a>
```

Texten mellan start- och slut-taggen blir det som syns som själva länken, medan `href` i start-taggen alltså anger vart länken går.

Här är en extern länk, där man anger hela sökvägen till sidan, precis som det man anger i webbläsaren:

```html
<a href="http://dbwebb.se/forum/">Dbwebb's forum</a>
```
