---
author: efo
category: javascript
revision:
  "2018-01-04": (A, efo) Första utgåvan inför kursen linux V18.
...

hej ta bort utmaningar
--------------------------------------

Callbacks, promises och async/await
==================================

[FIGURE src=image/linux/clock.png?w=c5 class="right"]

Vi har i tidigare kursmoment fått känna på hur det är att programmera i en asynkron programmeringsparadigm i JavaScript. I denna övningen ska vi titta vidare på asynkron programmering och hur vi med tre olika tekniker kan lösa de utmaningar som finns med asynkron programmering.



<!--more-->



Vi rekommenderar att du kodar med i denna övning så du själv får känna på hur det är att konstruera asynkron JavaScript kod med callbacks, promises och async/await. Du kan spara din kod i katalogen `me/kmom06/asynkron`.



Callbacks {#callbacks}
--------------------------------------
Vi vet sen tidigare att funktioner är objekt i JavaScript och att vi därför har möjligheten att använda funktioner som argument till andra funktioner. Vi kan alltså skriva kod enligt nedan.

```javascript
const doFirst = (number, callback) => {
    console.log("Do first", number)
    if (callback) callback(number)
}

const doAfter = (number) => console.log("I'm after", number)

doFirst(14, doAfter)
```

Vi har definerat två funktioner `doFirst` och `doAfter` som båda tar ett argument `number`. Funktionen `doFirst` tar dessutom ett argument `callback`, där vi skickar med `doAfter` som argument i funktionsanropet på sista raden.



Avslutningsvis {#avslutning}
--------------------------------------
Asynkron programming ställer ofta till med huvudbry för utvecklare, som är vana vid synkron och sekventiell programming. De tre tekniker beskrivna i denna övning underlättar för oss när vi utvecklar vår kod. Men som alltid övning ger färdighet.

Alla kodexempel från denna övningen finns i kursrepot för [linux-kursen](https://github.com/dbwebb-se/linux/tree/master/example/asynkron) och här på [dbwebb](https://dbwebb.se/repo/linux/example/asynkron).
