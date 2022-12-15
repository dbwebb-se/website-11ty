---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
id och class {#id-class}
---------------------------------------------------

### id {#id}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id'>https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id</a>

`id` är ett attribut som används för att *identifera* element på en sida. Det får endast förekomma ett element med det ID't på hela sidan, det behöver alltså vara unikt.
`id` kan användas för att style'a med CSS eller för att identifiera ett element från JavaScript. Det används även i formulär för att koppla en relation mellan `label` och `for`.

Ett exempel på där `id` kan användas är till exempel för att identifera huvudmenyn, så att den går att skilja ut från t.ex sidomenyer och liknande.

```html
<nav id="mainmenu" >
	<a href="index.html">Start</a>
	<a href="report.html">Redovisningar</a>
</nav>
```



### Id och a-taggar {#id-lankar}

`id` går också att använda som ankare för länkar på sidan. Man kan t.ex ge en `article` ett `id`, där man sedan kan skapa en länk som går till det id't. Det som händer när man klickar på länkern är att sidan scrollar ner till där elementet med det id't börjar.

```html
<article id="about">
```
```html
<a href="#about">Om mig</a>
```

Det är också vanligt att använda denna interaktion mellan `id` och länkar för att skapa en länk som går tillbaka till toppen av sidan.

```html
<header id="top">
```
```html
<a href="#top">Tillbaka till toppen</a>
```



### Klass attributet {#class}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class'>https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class</a>

`class` är ett attribut som används för att *klassificera* element. Till skillnad från `id` så kan det finnas flera element med samma klass på en sida. Man kan alltså föreställa sig att man grupperar element med varandra. Klasser används för att kunna applicera CSS på elementen, men även för att kunna hämta element i JavsScript.

```html
<span class="red">där en del av den är omsluten i en span</span>
```

Här t.ex har vi tidigare exempel med `span` där det nu finns en klass. Senare i CSS så kan man alltså lägga till så att texten blir röd.
