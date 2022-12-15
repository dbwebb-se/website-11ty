---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Bilder {#bilder}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img</a>

Taggen `img` används för att visa upp bilder på en sida. Detta görs med hjälp av ett *attribut* där man anger länken till själva bilden. Attributet heter `src`. När man ska ange `src` för en bild så behöver man länka den så att länken utgår från samma katalog som html-dokumentet ligger i. Antag t.ex att din fil `index.html` ligger i en katalog som heter `me/`. I den katalogen har du sedan ytterligare en katalog som heter `images/` vari bilden på dig ligger, och den heter `me.jpg`. Det ser alltså ut ungefär såhär:

```text
me/
----images/
--------me.jpg
----index.html
```

Eftersom att `img`-taggen ligger i dokumentet `index.html` så behöver länken alltså se ut såhär:

```text
images/me.jpg
```

Ett annat attribut för `img`-taggen som ska anges är `alt`. Denna är till för att ange en *alternativ text* om bilden inte skulle laddas. Det är vikigt att den finns med, så att om något går fel så kan den som tittar på sidan ändå förstå vad där skulle ha varit för något.

Slutligen så ser det alltså ut såhär:

```html
<img src="images/me.jpg" alt="En bild på mig" />
```
