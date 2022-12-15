---
author: efo
revision:
    "2018-05-25": "(A, efo) Första versionen."
...
Semantisk HTML
=======================

Vi tittar på hur vi kan använda namn på våra element för att beskriva för dig själv, andra utvecklare och icke-grafiska webbläsare vad som är viktigt på sidan. Exempel på icke-grafiska webbläsare är sökmotorers bottar som indexerar innehåll på webben och skärmläsare som underlättar för personer med problem med synen.

Vi utgår från grundelementen från tidigare och tittar på hur vi kan dela in dessa i olika delar med hjälp av semantisk HTML. Semantik är vilken _betydelse_ eller _mening_ ett ord har och semantisk HTML är att vi ger våra HTML-element ett namn med betydelse. Ett exempel på detta är att istället för att använda `<div>` för att beskriva en ett element använder vi `<main>` eller `<article>` för att beskriva innehåll och betydelse av elementet.

```html
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Design med HTML5 och CSS3</title>

    <link rel="stylesheet" href="normalize.min.css" />
</head>
<body>
    <header>
        <h1>Design med HTML5 och CSS3</h1>
    </header>

    <main>
        <article>
            <h2>Semantisk HTML</h2>
            <p>Vi tittar på hur vi kan använda namn på våra element för att beskriva för dig själv, andra utvecklare och icke-grafiska webbläsare vad som är viktigt på sidan. Exempel på icke-grafiska webbläsare är sökmotorers bottar som indexerar innehåll på webben och skärmläsare som underlättar för personer med problem med synen.</p>
        </article>
    </main>

    <footer>
        <p>&copy; dbwebb</p>
    </footer>
</body>
</html>
```

I exemplet ovan delar vi in vårt HTML dokument i 3 delar: `<header>`, `<main>` och `<footer>`. Vi talar om för alla inblandade parter vad som ska finnas i de olika delarna på ett mycket bättre sätt än om vi bara använt `<div class='header' id='header'>`.
