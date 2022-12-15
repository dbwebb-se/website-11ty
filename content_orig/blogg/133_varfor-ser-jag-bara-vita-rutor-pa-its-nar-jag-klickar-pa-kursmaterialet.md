---
author: mos
category: kursnyheter
published: "2013-10-04 13:18:51"
updated: "2013-10-04 16:16:30"
created: "2013-10-04 13:18:51"
...
Varför ser jag bara vita rutor på ITs när jag klickar på kursmaterialet?
==================================

Det är inte den elaka läraren som har kastat ut dig från kursen iallafall, bara så att du vet.

Nej, det här handlar om hur webbläsarna hanterar "Mixed content". Det sker när webbplatsen du besöker anges med https: och den i sin tur laddar innehåll via http: och detta är precis det som sker på läroplattformen Its Learning när du klickar på länkarna för att visa upp kursmaterialet. 

<!--more-->

Du accessar ITs via https: och kursmaterialet laddas i en `<iframe>` laddas som http:. Därav problemet. Det nya är att med senaste uppdateringen av Chrome så har de default blockering av det som betraktas som "osäkert innehåll". Därav blir det helt blankt. Samma hantering finns i webbläsaren Firefox. Internet Explorer har valt att öppna en popup där du får välja att visa innehållet eller inte.

Så här ser det ut i Chrome med senaste uppdateringen (version 30.0.1599.69 m på Windows 7).

> *"This page includes script from unauthenticated sources."*

[FIGURE src=/image/snapshot/chrome_security_mixed_content-3.jpg?w=w2&q=60 caption="1) visar varningsrutan som manuellt kan bockas ut vid 2) och 3) visar länken som går bra att öppna i en egen flik."]

Så, det rätta sättet att laga detta är att införa https: på dbwebb.se, så får det bli. Men som en snabb fix så ändrar jag också så att alla länkar nu kommer att öppnas i egna fönster på ITs, istället för i deras `<iframe>`. Det löser problemet för alla som inte läser detta inlägg och inte hittar varningssymbolerna på Chrome och Firefox där man kan välja manuellt att visa det potentiellt osäkra innehållet.

Läs mer om [Mixed content på MDN](https://developer.mozilla.org/en-US/docs/Security/MixedContent).

Vi har en [forumtråd som visar/diskuterar hur du kan hanterar problemet i Chrome, Firefox och Internet Explorer](t/1433) genom att tillåta att osäkert innehåll visas.