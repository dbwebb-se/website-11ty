---
sectionHeader: true
linkable: true
...
Kmom01: Kom igång med CSS {#kom-igang}
=======================

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
