---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
CSS och storlekar {#css-storlekar}
=======================

Det finns olika sätt att ge ett element en storlek. Vi tittar på ett par av de vanliga sätten vilket inkluderar bredd, höjd, overflow och vanliga måttenheter.


###Hur bred är en div? {#bred-div}

Om man har en div med margin, border och padding, hur mycket blir kvar till content och hur stor plats tar diven?

Studera exemplet om [bredden på en div](https://codepen.io/dbwebb/pen/rKYoNZ).  

När vi bestämmer bredden med width så gäller det innehållsdelen, därefter läggs på utrymme för padding, border och margin. Det är bra att ha koll på elementens storlek och hur storleken räknas ut.

Ibland kan det vara bra att använda `min-width` och `max-width`. Det kan ge lite flexibilitet i att bestämma ett elements minsta eller största (möjliga) storlek.

Använd följande exempel för att [testa konstruktioner genom att modifiera min- och max-bredd av ett element](https://codepen.io/dbwebb/pen/qKVLNe).

Välj att visa hela exemplet i en egen webbläsare (klicka på länken "både och" i Style!) och modifiera webbläsarens storlek för att se effekterna. Du kan även använda länken [testa min- och max-bredd i webbläsaren](https://codepen.io/dbwebb/pen/qKVLrW).

Se till att du har koll på hur `width`, `min-width` och `max-width` fungerar. Det kan vara så att din webbläsare har en egen hård gräns för minsta bredd på ett element. Det märker du om du väljer olika värden på `min-width`.



###Hur hög är en div? {#hog-div}

En div är så hög som den behöver vara för att omsluta innehållet. Med konstruktionen `height` går det att explicit sätta en höjd på ett element. Det går även att definera `max-height` och `min-height` och kombinera dessa med `height`, allt för att uppnå önskad effekt.

Studera följande exempel och ändra i det för att se hur de olika konstruktionerna beteer sig.

[Exempel med `height`](https://codepen.io/dbwebb/pen/xzPmqo)

Det är sällan man definerar höjden, ofta klarar man sig utan det. Men det beror ju på vad man vill uppnå.



###Overflow {#overflow}

Vad händer med innehållet som inte får plats inom den definerade storleken? Detta är något som går att styra med konstruktionen `overflow`.

[Exemple om overflow](https://codepen.io/dbwebb/pen/XYzoRO).

Ofta går det att använda default-beteendet på `overflow`, men det är bra att veta hur det fungerar, om man vill ändra det.



###Att ange storlekar {#storlekar}

Det finns olika sätt att ange storlekar i CSS. För en webbutvecklare är tre vanliga mått `%`, `px` och `em`.

| Enhet | Beskrivning |
|-------|-------------|
| `em`  | Ett mått på fontstorleken i nuvarande element. Måttet kommer från typografi. `1em` är nuvarande fonts storlek. `2em` är dubbelt så stort. |
| `px`  | Pixel. Storleken är beroende av det fysiska mediet såsom skärmen eller skrivaren. På en datorskärm säger vi enklast att en `px` är en pixel på skärmen. |
| `%`   | Procent. Relativ sitt omgivande (förälder/parent) element. 100% är så stor som parent-elementet är. |

Här är ett exempel visar [hur elements storlekar kan anges av `em` och `%`](https://codepen.io/dbwebb/pen/RJjEZG).  

Studera exemplet och modifiera det för att se hur storlekar kan justeras.

Det finns absoluta enheter såsom mm (millimeter), cm (centimeter) och pt (points). Dessa har lite användning i webbområdet där vi oftast använder skärmar för att visa resultatet. De absoluta måttenheter blir desto viktigare när det gäller tryckta produkter. När man skriver ut på en skrivare vill man veta exakt hur mycket av papperet man använder. Ett A4 papper är 210 x 297 mm och här passar dessa måttenheter bra.

Läs lite kort om vilka [måttenheter som rekommenderas](http://www.w3.org/Style/Examples/007/units).



###Sammanfattningsvis {#sammanfattning-2}

Slå upp konstruktionerna i Cheatsheet. Vill du läsa specen om storlekar så finns texter både i CSS2 och i CSS3-specarna (de skiljer sig lite åt).

Läs snabbt i [CSS3-specen om vilka måttenheter som finns](http://www.w3.org/TR/css3-values/).
