---
author: mos
category: javascript
updated: "2013-03-25 15:20:55"
created: "2013-03-25 08:36:25"
...
Felsökning i ajax och formulär med POST
==================================

Att felsöka med ajax kan ibland vara en utmaning, speciellt när man vill felsöka i postningen av ett formulär. Svårigheten blir när man använder POST som metod för att posta formuläret. Använder man GET är det enklare, då kan man alltid simulera formuläret genom att skriva in länken i en webbläsare och direkt se vilket svar som genereras. Men hur gör man då med POST?

<!--more-->

Lösningen är Firebug. Med hjälp av Firebug kan du se vilket svar som webbservern ger genom att analysera vilket "response" som kommer tillbaka via Firebugs consol. Du klickar du på länken och får upp information om vad som skickades till servern och vilket resultat som kom tillbaka. Nu kan du fortsätta att felsöka på vanligt sätt, tex med echo-satser i din PHP-kod på server-sidan.

[FIGURE src=/image/kunskap/javascript/debugga-ajax-med-firebug.png?w=w1 caption="Felsökning av svaren från en ajax-request via Firebug."]

Det är inte lätt att navigera i gränslandet mellan JavaScript, ajax och PHP. Men Firebug är en bra kompanjon som underlättar.

Vill du lära dig mer om grunderna i ajax så kan du fortsätta läsa i kunskapsbanken: [Kom igång med jQuery och Ajax](kunskap/kom-igang-med-jquery-och-ajax).
