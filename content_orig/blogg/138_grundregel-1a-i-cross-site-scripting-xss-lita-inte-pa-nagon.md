---
author: mos
category: webbprogrammering
published: "2013-11-08 09:06:51"
updated: "2013-11-08 09:36:57"
created: "2013-11-08 09:06:51"
...
Grundregel 1A i Cross Site Scripting (XSS) - Lita inte på någon
==================================

Som webbprogrammerare vill du bygga en säker webbplats och du matas med information om hur viktigt det är att sanera inkommande variabler från skadlig kod, så kallade injections. Du får lära dig att skydda dig på olika sätt, varav några tas upp i samlingstråden för ["Säker programmering med PHP"](https://dbwebb.se/kunskap/bygg-en-multisida-med-php#secure.

Men, tydligen glömde vi att påminna dig om **grundregel 1A -- "Trust no one" -- Lita inte på någon**. För isåfall kan det gå så här...

<!--more-->


Du vill låna ett JavaScript av en student som går tvåan i Webbprogrammering -- du tycker att hans JavaScript med [gubben som går runt på skärmen](https://github.com/dbwebb-se/javascript/tree/master/example/lekplats/move-around-css-sprite-using-css3-transitions) är coolt -- du väljer att *inkludera hans skript* i din sida. Du litar (*litade*) på honom.

> *"Vilket coolt Javascript du har, kan jag få låna det till min hemsida?"*

Resultatet blev ett lysande exempel på XSS tillsammans med en trivsam eftermiddag i labbsalen där tvåorna hade förvånansvärt roligt i salen och lärde sig oerhört mycket om vad man kan göra med JavaScript. JavaScript blev helt plötsligt en oerhört intressant teknik att behärska.

Så här såg sidan ut i sitt normalläge, innan det trevliga JavaScriptet med den lilla baddien *inkluderades*. Så här i efterhand så hade det kanske varit bättre att *kopiera* skriptet och undvika att ge tvåorna en rolig eftermiddag.

[FIGURE src=/image/snapshot/sappar-xss-orginal.jpg?w=w2 caption="Så här såg orginalsidan ut för studentföreningen."]

När eftermiddagen hade gått och alla tvåor hade varit oerhört hjälpsamma och påhejade i irc-kanalerna så blev till slut resultatet, dokumenterat för framtida generationer, i avskräckande syfte, som följer.

[YOUTUBE src=CYMR4BjHIeM width=630 caption="Studentföreningens sida som en XSS:ad variant."]

Vi glömmer det aldrig - "Trust no one".

Check på "Jag vet vad XSS kan innebära".
