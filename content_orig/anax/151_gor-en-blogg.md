---
...
Gör en blogg
==================================

Låt oss se hur man kan skapa en blogg i Anax. Du kan titta på [dbwebbs blogg](blogg) för att se hur en blogg kan se ut och fungera.

Vi skall skapa en struktur för bloggen och lägga till grunden samt några artiklar och avslutningsvis även en byline för en känd författare.



Skapa en katalog för routen {#struktur}
-----------------------------------

Börja med att skapa en ny katalog, låt säga `content/blogg`. Din route till sidan kommer alltså att bli `index.php/blogg`.



Skapa `.meta.md` {#meta}
-----------------------------------

Skapa filen `content/blogg/.meta.md` som ger förutsättningarna för att innehållet skall betraktas och se ut em en blogg. Filen innehåller detaljer om de vyer som skall visas på sidan.

De vyer som ligger i `.meta.md` gäller för alla sidor som ligger i katalogen, man kan säga att frontmattern ärvs till de individuella sidorna.

```markdown
---
views:
    main:
        template: default/blog-post
        data:
            meta:
                type: toc-sort
                orderby: publishTime
                orderorder: desc

    byline:
        region: main
        template: default/byline
        sort: 2
        data:
            meta: 
                type: author

    next-previous:
        region: main
        template: default/next-previous
        sort: 3
        data:
            meta: 
                type: next-previous

    share-this:
        region: main
        template: default/share
        sort: 4

    breadcrumb:
        region: breadcrumb
        template: default/breadcrumb
        data:
            meta: 
                type: breadcrumb

    article-toc:
        region: sidebar-right
        template: default/article-toc
        sort: 1
        data:
            meta: 
                type: article-toc

    block-about:
        region: sidebar-right
        template: default/block
        sort: 0
        data:
            meta: 
                type: single
                route: ./block-about

...

```

Se till att filen avslutas med en tom rad.

Du kan se ett [exempel på hur meta-filen](https://github.com/dbwebb-se/website/blob/master/content/blogg/.meta.md) ser ut för bloggen på dbwebb.



Skapa `index.md` {#index}
-----------------------------------

Index-sidan ger förutsättningarna för att visa bloggrollen, en lista över de senaste inläggen där det allra senaste visas först.

Skapa filen `content/blogg/index.md` med följande innnehåll.

```markdown
---
views:
    main:
        template: default/article
        data:
            class: blog

    byline: false
    share-this: false
    block-about: false
    article-toc: false

    blog-list:
        region: main
        template: default/blog-list
        sort: 2
        data:
            dateFormat: j F Y
            meta: 
                type: toc
                items: 10

    blog-toc:
        region: sidebar-right
        template: default/blog-toc
        sort: 2
        data:
            meta: 
                type: copy
                view: blog-list

...
Min bild blogg
===========================

Dagens foto presenteras med en kort beskrivning om hur det gick till när bilden togs.
```

I filen kan man förändra beteendet som definieras i `.meta.md` genom att skriva över definitionerna. Det görs här genom att sätta dem till false.

Nu kan du ladda routen `index.php/blogg` i din webbläsare och du kan se första delen av bloggen.

[FIGURE src=image/snapht17/anax-blogg-step1.png caption="Första delen av bloggen är på plats."]

Du kan se ett [exempel på hur index-filen](https://github.com/dbwebb-se/website/blob/master/content/blogg/index.md) ser ut för bloggen på dbwebb.



Skapa `block-about.md` {#about}
-----------------------------------

Skapa filen `content/blogg/block-about.md` som innehåller en kort beskrivning om bloggen. Denna beskrivning visas i sidokolumnen när man tittar på ett blogginlägg.

Du kan skapa filen med följande innehåll.

```markdown
####Min bild blogg

Dagens foto presenteras med en kort beskrivning om hur det gick till när bilden togs.
```

Du kan se ett [exempel på hur block-about-filen](https://github.com/dbwebb-se/website/blob/master/content/blogg/block-about.md) ser ut för bloggen på dbwebb.

Nu behöver vi även lägga till ett första inlägg i bloggen.



Det första inlägget {#inlagg}
-----------------------------------

Nu kan du skapa det första inlägget. Lägg det i filen `content/blogg/100_mitt-forsta-blogginlagg.md`.

Du kan låna detta innehållet, men sätt ditt eget namn/akronym som författare.

```markdown
---
author: mos
published: "2016-11-15"
category:
    - dagens bild
...
Dbwebbisar hoppa omkring bland träden
==================================

[FIGURE src="image/dbwebbisar.jpg?w=200&h=150&a=0,20,20,50&cf" class="right"]

Se hur de små dbwebbisarna hoppar runt i trädet.


<!--more-->



Var kommer de ifrån? {#var}
-----------------------------------

[FIGURE src="image/dbwebbisar.jpg?w=700" caption="Här är en liten del av den större planschen."]

Det är [Anna på Montage](http://montage.se/) som ritade dem en gång i tiden till en plansch.

Planschen ser i sin helhet ut så här, klicka på den för att komma till bilden som fungerar utmärkt som bakgrundsbild på din desktop dator.

[FIGURE src="https://dbwebb.se/img/dbwebb.jpg?w=700" caption="Den stora planschen."]

Håll till godo!

```

Så här ser det ut om du laddar om routen `index.php/blogg`.

[FIGURE src=image/snapht17/anax-blogg-step2.png caption="Första inlägget visas i blogglistan."]

Om du klickar på inlägget så kommer det visas i sin helhet på en egen sida, tillsammans med blocket `block-about` som visas i sidebaren.

[FIGURE src=image/snapht17/anax-blogg-step3.png caption="Inlägget visas i sin helhet på en egen sida."]

Du kan se ett [exempel på hur ett inlägg](https://github.com/dbwebb-se/website/blob/master/content/blogg/1003_hur-manga-klarar-sig-hela-vagen-in-i-mal.md) ser ut på bloggen på dbwebb.



Lägg till fler inlägg i bloggen {#2inlagg}
-----------------------------------

För att se hur en blogg ser ut med flera inlägg så kan du kopiera ditt inlägg och skapa två till. Döp dem enligt följande.

* `content/blogg/101_mitt-andra-blogginlagg.md`
* `content/blogg/102_mitt-tredje-blogginlagg.md`

Det är viktigt att du inte har samma namn på blogginlägget, den delen som är `mitt-andra-blogginlagg` behöver alltså vara unikt. Det är så koden bakom fungerar (för tillfället).

Nu kan du navigera mellan dina blogginlägg och se översikten på förstasidan som visar dina tre olika blogginlägg.



Shortcode för FIGURE {#figure}
-----------------------------------

Som du ser i källkoden (markdown-texten) för blogginlägget så blir det lite stökigt med bilderna och den HTML-kod som används för `<figure>`. Vill du att dina inlägg skall se renare ut så kan du istället använda shortcoden för [`FIGURE`].

Följande shortcodes kan ersätta motsvarande `<figure>` elementen i blogg-texten. Inkludera hakparanteserna.

* [`FIGURE src="image/dbwebbisar.jpg?w=200&h=150&a=0,20,20,50&cf" class="right"`]
* [`FIGURE src="image/dbwebbisar.jpg?w=700" caption="Här är en liten del av den större planschen."`]
* [`FIGURE src="https://dbwebb.se/img/dbwebb.jpg?w=700" caption="Den stora planschen."`]

[Läs mer om shortcodes](anax/shortcodes).



En byline för en author {#byline}
-----------------------------------

Bloggen har stöd för att visa en byline från de författare som är kända. För att bli en känd författare så behövs följande två filer i katalogen `content/author/mos`. Akronymen `mos` byter du ut mot din egen akronym som du själv väljer. Se bara till att du lägger in rätt författare i dina artiklar. Du gör det överst i frontmattern, så här.

```text
author: mos
```

I katalogen `content/author/mos` lägger jag först en fil `.meta.md` med detaljer om mig själv.

```text
---
name: Mikael Roos
mail: mos@dbwebb.se
...

```

Se till att filen avslutas med en tom rad.
 
 Sedan skapar jag filen `byline.md` i samma katalog.
 
 ```text
 [FIGURE src=https://www.gravatar.com/avatar/02f8a1876759ad09f215055ff17cc318.jpg?r=pg&amp;d=wavatar&amp;s=80 alt="Mikael Roos" class="left" caption="Mikael Roos"]
  
  <a href=https://plus.google.com/101196514892086552893 rel=author><strong>Mikael Roos</strong></a> undervisar vid Blekinge Tekniska Högskola och skriver om webbprogrammering, webbutveckling och utmaningen med att undervisa på distans och campus. Mikael driver ett företag inom webbprogrammering och på kvällarna utvecklar han sina projekt inom öppen källkod.
  
```

Nu kan jag ladda om sida och se min byline längst ned på varje bloggartikel som jag skrivit.

[FIGURE src=image/snapht17/anax-blogg-step4.png caption="Min byline visas nu i slutet av artikeln."]

Nu är du klar och kan visa upp din första blogg under routen `index.php/blogg`.
