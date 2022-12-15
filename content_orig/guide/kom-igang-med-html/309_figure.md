---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
figure och figcaption {#fig-caption}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure</a>
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption</a>

`figure` är ett element som används för att omsluta en bild, om man t.ex skulle vilja ha bildtext under bilden med elementet `figcaption`. Detta ger alltså igen det typiska semantiska syftet som HTML5 inriktar sig på, och gör det lättare att placera bilden med en bildtext.

`figcaption` är alltså till för att ange en text och används ihop med `figure`.

Sammantaget så ser bilden ut såhär:

```html
<figure>
	<img src="images/me.jpg" alt="En bild på mig" />
	<figcaption>En bild på mig, tagen förra året.</figcaption>
</figure>
```

Sjävlklart behöver man inte använda `figure` runt alla bilder. Vissa bilder behöver ingen text och motsvarar inte figurer, t.ex om man skulle ha en bild i sin header.
