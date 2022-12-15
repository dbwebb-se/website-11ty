---
author: efo
category: javascript
revision:
  "2018-03-20": (A, efo) Första utgåvan inför kursen webapp v3.
...
Content Security Policy
==================================
[FIGURE src=/image/webapp/xss.jpg?w=c6 class="right"]

Vi ska i denna övning titta på hur vi säkrar våra appar mot cross-site scripting (XSS), clickjacking och andra typer av attacker där kod exekveras på vår sida av användare. Vi gör detta med hjälp av en Content Security Policy där vi som utvecklare bestämmer vilket innehåll som kan laddas i vår app.



<!--more-->



Säkra upp apparna {#sakra}
--------------------------------------
En Content Security Policy definieras som en meta-tag i `<head>`-delen av din `index.html`. Vi börjar med en helt grundläggande CSP där vi bara tillåter att hämta data från den egna domänen.

```html
<meta http-equiv="Content-Security-Policy" content="default-src 'self';">
```

Om vi även vill tillåta att vi till exempel kan hämta data från Lager API:t kan vi lägga till det efter `'self'`. Om du vill hämta data från flera olika domäner kan du lägga dessa separerade med ett mellanrum. Nedan hämtar vi data från Lager API:t och Github

```html
<meta http-equiv="Content-Security-Policy" content="default-src 'self' https://lager.emilfolino.se https://api.github.com;">
```

I nedanstående exempel använder vi oss av attributet `'unsafe-eval'` för att göra det möjligt att använda oss av koden som använder funktionen `eval()`. Till exempel koden som webpack genererar använder sig av `eval()`, så lägg till detta attributet i din CSP.

```html
<meta http-equiv="Content-Security-Policy" content="default-src 'self' https://lager.emilfolino.se https://api.github.com 'unsafe-eval';">
```

För att göra det möjligt att vi kan ladda CSS och typsnitt från en domän och data från en annan kan vi använda `style-src` och `font-src`. Här definierar vi domäner vi vill hämta CSS kod ifrån och vilka domäner vi vill hämta typsnitt från. Nedan är ett exempel där vi hämtar typsnitt från Google och vår egna CSS.

```html
<meta http-equiv="Content-Security-Policy" content="default-src 'self' https://lager.emilfolino.se 'unsafe-eval'; style-src 'self' https://fonts.googleapis.com; font-src https://fonts.gstatic.com;">
```

I dokumentation för [Content Security Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP) finns flera exempel på hur vi kan använda till exempel `media-src` och `img-src` för media och bilder.



Avslutningsvis {#avslutning}
--------------------------------------
Vi har i denna artikel tittat på hur man på ett enkelt sätt kan skydda sin app mot attacker från användare försöker exekvera kod på din sida. Vi använder en [Content Security Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP) där vi definierar det innehåll vi vill ladda i appen. I MDN dokumentationen finns många bra exempel på hur du kan skriva din CSP för olika appar.

Om du har frågor eller tips så finns det en särskild [tråd i forumet](t/7372) om denna artikeln.
