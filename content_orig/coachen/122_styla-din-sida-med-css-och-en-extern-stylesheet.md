---
author: mos
category: webbprogrammering
updated: "2015-08-26 15:31:47"
created: "2014-06-10 13:36:17"
...
Styla din sida med CSS och en extern stylesheet
==================================

Kom i gång med CSS tillsammans med HTML. Vad kan du göra med CSS och hur länkar du in din stylesheet med webbsidan?

<!--more-->

Plocka fram din HTML-fil `hello.html` som du skapade i [tipset om att komma i gång med HTML5](coachen/gor-din-forsta-sida-med-html5). Vi skall lägga till en extern stylesheet till den sidan.

Starta upp din texteditor och skapa en ny fil och döp den till `hello.css`.

I din texteditor, skriv in följande text som är basen för en HTML5-sida.

```css
html {
    background-color: #eee;
}

h1 {
    text-align: center;
    color: red;
}

p {
    border: 1px solid brown;
    color: #00f;
}
```

Spara filen i samma katalog som din HTML-sida.

Nu skall du länka samman din HTML-sida med stylesheeten. Det gör du med följande rad:

```html
<link rel="stylesheet" href="hello.css">
```

Så här ser filen `hello.html` ut när du är klar.

```html
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Min första HTML-sida</title>
    <link rel="stylesheet" href="hello.css">
</head>
<body>
    <h1>Hej Världen!</h1>
    <p>Detta är min första HTML5-sida.</p>
</body>
</html>
```

Spara båda filerna och öppna filen `hello.html` i din webbläsare. Den skall nu vara lite mer färgglad, om du har gjort rätt.

Så här gjorde jag.

[YOUTUBE src=XcMtQ_KEWGg width=630 caption="Mikael gör en enkel stylesheet till en HTML5 sida."]
[YOUTUBE src=4xQHd6ZSpQ8 width=630 caption="Mikael validerar stylesheeten med W3C CSS validator."]

Ett bra sätt att komma i gång med CSS är att titta på ett par tutorials på Youtube. Här är en serie om 4 tutorials som ger en [introduktion till CSS för nybörjare](https://www.youtube.com/watch?v=Wz2klMXDqF4&list=PL07598CCC0961C10C).

Titta på första videon i serien och se om det kan vara något för dig.

[YOUTUBE src=Wz2klMXDqF4 width=630 caption="En serie tutorials om grunderna i CSS."]

Vill du titta på fler introduktionsvideor så har du en serie om 50-talet videor som heter [XHTML and CSS Tutorial](https://www.youtube.com/watch?v=cqszz_OfAFQ&list=PLC1322B5A0180C946) och är gjorda av av Bucky på The New Boston. De är korta och rätt populära så de kan vara en bra källa som kompletterar [en bra bok om HTML & CSS](kunskap/boken-html-css-the-complete-reference) eller den [svenska boken om HTML & CSS](kunskap/boken-html-och-css-boken). Videoserien är relevant trots att den använder en äldre variant av HTML. Det finns det många webbsidor som inte är HTML5 så det skadar inte att titta på föregångaren till HTML5.

Titta på första videon i serien och se om du tycker om den. Är du nybörjare så rekommenderar jag att du tittar igenom hela serien.

[YOUTUBE src=cqszz_OfAFQ width=630 caption="En serie tutorials om grunderna i XHTML och CSS."]

Det var grunderna i CSS.

Ställ dina frågor och ge tips i [tipsets forumtråd](t/2445).
