---
author: mos
revision:
    "2020-08-13": "(C, mos) Uppdelad i flera dokument i v2."
    "2018-06-20": "(B, mos) Bort med kommentarer och lade till uttryck."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Instruktioner
=======================

Om instruktioner.


---

Låt oss titta på byggstenarna i språket och hur de hänger ihop. Vi kan kalla det en del av språkets syntax, det regelverk som säger hur man kan skriva koden.



Instruktioner (statement) och semikolon {#instruktioner}
-----------------------

Det som finns mellan starttagg och sluttagg är _instruktioner_. Man kan ange flera instruktioner och separera dem med semikolon `;`. På engelska brukar vi kalla dessa instruktioner för _statement_.

Här är ett exempel på php-kod fördelat på instruktioner som var och en skriver ut en textsträng.

```php
echo "Hello World!\n";
echo "Hello PHP!\n";
echo "My name is Mikael...\n";
```

En kodsekvens i php är alltså uppbyggd av en eller flera instruktioner.

En instruktion, ett _statement_, kan vara som här en utskrift med `echo` enligt ovan, men det kan också vara en tilldelning av en variabel, en loop eller en if-sats. Du kan se dessa instruktioner som programmeringsspråkets grundläggande byggstenar.



Gruppera instruktioner {#group}
-----------------------

Man kan gruppera instruktioner inom måsvingar `{}`. Allt som ligger inom måsvingarna blir då en egen samlad instruktion som består av flera mindre instruktioner.

```php
{
    echo "Hello World!\n";
    echo "Hello PHP!\n";
    echo "My name is Mikael...\n";
}
```

Ovan konstruktion fungerar, men är inte så vanlig och tillför egentligen inget i den formen den har. Se den bara som ett exempel på en gruppering av instruktioner. Måsvingarna förekommer mest när man jobbar med loopar, villkorssatser, funktioner och klasser.

Du kan se att koden är intabbad inom måsvingarna, det är en konvention som programmerare följer, att tabba in sin kod för att visa att den ligger i ett sammanhang. Den typen av kodkonventioner gör det enklare att läsa kod som är skriven av olika programmerare.
