---
...
Shortcodes
==================================

Shortcodes kan jämföras med BBCodes som är vanligt att användas i forum. Det är en kortare syntax som i sin tur genererar HTML-kod.

Anax har via CTextFilter tillgång till ett antal shortcodes. Strukturen på dessa shortcodes är inspirerade av hur WordPress hanterar shortcodes.

Grundtanken med shortcodes är att göra texterna läsbara och med enkla medel ge tillgång till mer avancerade konstruktioner, via shortcodens enklare gränssnitt.



Bilder med `[FIGURE]` {#figure}
-----------------------------------

[FIGURE src="image/dbwebbisar.jpg?w=700" caption="Här är en liten del av den större planschen."]

Ett exempel med bildtext.

* [`FIGURE src="image/dbwebbisar.jpg?w=700" caption="Här är en liten del av den större planschen."`]

Genererar följande HTML-kod.

```html
<figure class="figure">
<a href="image/dbwebbisar.jpg"><img src="image/dbwebbisar.jpg?w=700" alt="Här är en liten del av den större planschen."/></a>
<figcaption markdown=1>Här är en liten del av den större planschen.</figcaption>
</figure>
```

Ett exempel med klassattribut.

* [`FIGURE src="image/dbwebbisar.jpg?w=200&h=150&a=0,20,20,50&cf" class="right"`]

Genererar följande HTML-kod.

```html
<figure class="figure right">
<a href="image/dbwebbisar.jpg"><img src="image/dbwebbisar.jpg?w=200&h=150&a=0,20,20,50&cf" alt=""/></a>
<figcaption markdown=1></figcaption>
</figure>
```



Videor med `[YOUTUBE]` {#youtube}
-----------------------------------

Ett exempel som ger en video på Youtube.

* [`YOUTUBE src=MgHjC3skvaM width=700 caption="Här är en video."`]

Genererar HTML-kod som inkluderar videon i sidan, så här.

[YOUTUBE src=MgHjC3skvaM width=700 caption="Här är en video."]



Terminal med `[ASCIINEMA]` {#asciinema}
-----------------------------------

Ett exempel som ger en terminal med Asciinema.

* [`ASCIINEMA src=26240 caption="Någon som spelar Gomoku."`]

Genererar HTML-kod som inkluderar Asciinema i sidan, så här.

[ASCIINEMA src=26240 caption="Någon som spelar Gomoku."]



Information med &#x005B;`INFO`&#x005D; {#info}
-----------------------------------

Om du wrappar ett block av text inom &#x005B;`INFO`&#x005D; och &#x005B;`/INFO`&#x005D; så kommer det att bli en blå ruta som representerar information till läsaren.

[INFO]
**Bra att veta**

Om du wrappar ett block av markdown-text inom &#x005B;`INFO`&#x005D; och &#x005B;`/INFO`&#x005D; så kommer det att bli en blå ruta som representerar information till läsaren.
[/INFO]



Varning med &#x005B;`WARNING`&#x005D; {#varning}
-----------------------------------

Om du wrappar ett block av text inom &#x005B;`WARNING`&#x005D; och &#x005B;`/WARNING`&#x005D; så kommer det att bli en gul ruta som representerar ett varningsmeddelande för läsaren.

[WARNING]
**Var nu försiktig**

Om du wrappar ett block av text inom &#x005B;`WARNING`&#x005D; och &#x005B;`/WARNING`&#x005D; så kommer det att bli en gul ruta som representerar ett varningsmeddelande för läsaren.
[/WARNING]
