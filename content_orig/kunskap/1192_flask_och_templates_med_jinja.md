---
author: efo
revision:
    "2021-12-17": (A, efo) Skapad inför VT2022.
...
Flask och templates med Jinja
==================================

Förutom att vara ett bra och enkelt Python ramverk för att skapa API:er som returnerar JSON data kan Flask även användas för att skapa webbgränssnitt.

I denna artikeln ska vi titta på hur vi kan använda template motorn [Jinja](https://flask.palletsprojects.com/en/2.0.x/templating/) kan användas för att skapa ett formulär och hur man kan skicka det formuläret.

Du kan i denna artikeln utgå från den befintliga Flask appen som du redan har skapat i kmom02.



<!--more-->



Templates {#templates}
--------------------------------------

Vi börjar med att skapa en katalog med namnet templates och i den filen index.html. Det görs enklast i Visual Studio Code genom att högerklicka och skapa ny katalog och ny fil.

I index.html lägger jag till följande innehåll:

```html
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bildsök</title>
</head>
<body>
    <div class="container">
        <h1>Bildsök i Lagret</h1>
    </div>
</body>
</html>
```

Ovanstående är en väldigt enkel webbsida, det enda den gör i detta skedet är att skriva rubriken Bildsök i Lagret. För att få webbsidan att synas måste vi rendera den med hjälp av Flask och Jinja. Jag skapar en ny route i min app.py fil:

```python
@app.route('/image_search')
def image_search():
    return render_template("index.html")
```

Jag lägger dessutom till en extra modul att importera på flask import raden:

```python
from flask import Flask, render_template
```

I och med vi la index.html i templates katalogen och Flask per automatik letar där, bör Flask hitta och rendera din template när du startar Flask servern och går till routen /image_search.

Nu vill vi skapa ett formulär i vår template, formuläret ska användas för att kunna skicka en bild-url till [Cognitive Services](kunskap/cognitive-services-i-azure). Så vi vill ha ett text-fält och en knapp som vi kan skicka formuläret med. Vi kommer göra det ganska enkelt för oss själva och skicka formuläret till samma route och med hjälp av metoden GET. Jag lägger formuläret precis under rubriken på följande sätt.

```html
<div class="container">
    <h1>Bildsök i Lagret</h1>
    <form class="" action="" method="GET">
        <label>URL: </label>
        <input type="text" name="image-url" />
        <input type="submit" value="Sök" />
    </form>
</div>
```

Starta om Flask-servern och ladda sedan om i webbläsaren, du ska nu ha ett formulär under rubriken. Testa att fylla i till exempel hej i testfälet och studera sedan URL'n adressfältet i din webbläsare. Bör se ut ungefär så här: `/image_search?image-url=hej`

Allt efter ett frågetecken i en URL i en webbläsare är det som kallas GET-parametrar. I Flask kan vi fånga upp dessa parametrar med följande kod. Vi börjar med att importera Flasks inbyggda request modul: `from flask import Flask, render_template, request`

Sedan med hjälp av denna modulen kan vi hämta ut image-url från URL'n:

```python
@app.route('/image_search')
def image_search():
    image_url = request.args.get("image-url", "")

    if image_url:
        # do lots of stuff
        print(image_url)

    return render_template("index.html", image_url=image_url)
```

I ovanstående hämtar vi ut image-url GET parametern genom att använda request.args.get funktionen, vi kan sedan göra olika saker beroende på om vi har tillgång till URL'n eller ej. Vi kan skicka med den till template genom att lägga variabeln som ett namngivet argument i anropet till render_template. Vi har sedan tillgång till den i templaten med hjälp av `{{ image_url }}`. I templaten använder jag den för att skriva ut vad jag har sökt på. Källkoden för mitt exempel finns på [GitHub](https://github.com/emilfolino/flask-api/blob/main/templates/index.html).

```html
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bildsök</title>

    <link rel="stylesheet" href="{{ url_for('static', filename='style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bildsök i Lagret</h1>
        <form class="" action="" method="GET">
            <label>URL: </label>
            <input type="text" name="image-url" value="{{ image_url }}" />
            <input type="submit" value="Sök" />
        </form>

        {% if image_url %}
            <h2>Sökte på: {{ image_url }}</h2>
        {% endif %}

        {% for cake in cakes %}
            <p>{{ cake.name }} - {{ cake. price }}</p>
        {% endfor %}
    </div>
</body>
</html>
```

Använd gärna [dokumentationen för Jinja](https://jinja.palletsprojects.com/en/2.11.x/templates/) för att hitta till exempel hur man kan använda for-loopar för att skriva ut data.
