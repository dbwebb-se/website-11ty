---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
meta {#meta}
=======================
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta</a>

Lite andra inställningar kan vara saker som [charset](http://www.w3.org/International/questions/qa-what-is-encoding.en), språk och typ av innehåll. Vi behöver initialt bara ange en sak för att våra svenska tecken ska se ut som de borde, och det är charset.

Även denna ska alltid ligga i `head`-taggen, och kommer se ut såhär:

```html
<meta charset="utf-8">
```

När det är inlagt i koden så ser våran hela kod alltså ut som följer:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
		<meta charset="utf-8">
	</head>
	<body>
	</body>
</html>
```

[INFO]
**Attribut**

I `meta`-taggen så ser vi något vi inte har sett innan i taggar, där vi inte bara anger taggen i sig, men vi lägger även till data inom taggen.

```html
charset="utf-8"
```

Detta kallas **attribut**, och det består av två delar: attributets **namn** (*name*) och attributets **värde** (*value*). I fallet för `meta`-taggen ovan så är alltså `charset` namnet, och `"utf-8"` är vårat värde.

Det är bra att komma ihåg begreppet och hur det ser ut, så att när vi pratar om attribut så vet du vad som menas. Vanliga attribut som används är `class` och `id`, mer om dessa hittar du i slutet.
[/INFO]


Bygga kroppen {#kroppen}
---------------------------------------------------

Kroppen ska byggas, som det anges, i `body`-taggen. Elementen som följer handlar om det synliga innehållet på sidan, och därmed måste det ligga just inom `body`-taggen.

Kroppens helhet består oftast utav 3 stora delar: *header, main, footer*. Dessa tre delar är vad som följer.
