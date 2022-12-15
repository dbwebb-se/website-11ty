---
author: lew
revision:
    "2017-11-10": (A, lew) Explain route.
    "2016-04-13": (A, lew) Första versionen.
category:
    - oopython
...
Kom igång med ramverket Flask
===================================

[FIGURE src=/image/oopython/kmom01/topimg.png?w=c5 class="right"]

Flask är ett microramverk för Python, som gör det möjligt att skapa webbapplikationer. Det är litet men kraftfullt. Vi ska gå igenom hur man installerar det och kommer igång med en enkel sida.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och du vet vad variabler, typer och funktioner innebär.


Installation {#installation}
------------------------------

Sparka igång en terminal och installera Flask med pakethanteraren pip. Kör du Windows, starta en terminal som administratör och skippa `sudo`. Har du inte pip installerat, kika på [instruktionerna för pip](kunskap/python-pakethantering-med-pip#installera).

```bash
sudo pip3 install Flask
```

Bra, nu är det bara att köra igång.



Skapa en enkel webbapplikation {#skapa-enkel-app}
------------------------------

Skapa en mapp, me/kmom01/my_app och gå in i den:

```bash
# Ställ dig i kursens rotkatalog
$ cd me/kmom01
$ mkdir my_app
$ cd my_app
```

Flask använder en viss mappstruktur när den letar efter filerna. Till exempel:  

* .html-filer som ska servas ska ligga i mappen /templates
* bilder och annat material ska ligga i /static
* egna stylesheets (css) ska ligga i /static/styles  

Allt har sin plats. Struktur. Det finns såklart andra resurser att tillgå som i sin tur har "egna" platser i applikationen men för stunden räcker det med det här.  



###Frontcontroller {#frontcontroller}

Vi skapar en fil som vi döper till `app.py`. Det är frontcontrollern till applikationen, dvs den fil som hanterar alla inkommande routes och servar webbläsaren med korrekt fil.

I mappen "my_app":

```bash
touch app.py
```

Öppna filen i en editor, förslagsvis Atom, och kopiera in följande kod:

```python
#!/usr/bin/env python3
"""
My first Flask app
"""
# Importera relevanta moduler
from flask import Flask

app = Flask(__name__)

@app.route("/")
def main():
    """ Main route """
    return "Välkommen!"

if __name__ == "__main__":
    app.run()
```

Med hjälp av `@app.route()` kan vi hantera inkommande routes och serva önskat innehåll, i det här fallet strängen "Välkommen!".

Routen / är roten, start eller index om man så vill. En route kan ses som en trafikpolis som dirigerar om trafiken. Om vi har en route `@app.route('/telefon')` kan vi nå den via `http://example.com/telefon`. Funktionen som definieras under behöver inte ha samma namn som routen. Det underlättar dock då Flask bland annat använder funktionsnamnet för att hänvisa till dess sökväg. Flask kan använda till exempel `url_for('main')`, och hade i detta fallet hänvisat till routen `/` (roten). Men mer om det senare, nu går vi vidare.

Starta applikationen med:

```bash
python3 app.py
```

Om allt är ok ser du: ` * Running on http://127.0.0.1:5000/ (Press CTRL+C to quit)`  

Peka sedan webbläsaren på `localhost:5000`, alternativt `127.0.0.1:5000` så ser du resultatet.

[FIGURE src=/image/oopython/kmom01/flaskstart.png?w=w2 caption="Applikationen snurrar på localhost:5000."]



Bootstrap {#bootstrap}
------------------------------

Vi använder [Bootstrap](http://getbootstrap.com/) i applikationen. Det underlättar en snygg design och responsivitet.  

[Temat som används](https://getbootstrap.com/examples/theme/#).  

Du får självklart använda ett annat tema om du vill. De flesta teman har bara en annan .css-fil och kan skilja sig lite i klassnamn och struktur. Inga större skillnader.

Nu kör vi.

Först stänger vi ner servern (ctrl-c) och skapar vi filerna som behövs.

Använd terminalen och ställ dig i "my_app":
```bash
mkdir templates static
mkdir static/styles
touch templates/index.html
touch static/styles/style.css
```

[FIGURE src=/image/oopython/kmom01/tree1.png caption="Filstruktur."]



###index.html {#index}

För Bootstrap's och JQuery's filer använder vi oss av [CDN](https://en.wikipedia.org/wiki/Content_delivery_network). Det krävs att man har åtkomst till internet, då Bootstraps filer laddas in via `http`. Det blir färre filer lokalt. Smidigt!  

Öppna index.html i editorn och kopiera in följande kod:

```html
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Applikation i Flask</title>

    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Private stylesheet, loads last -->
    <link rel="stylesheet" href="{{ url_for('static',filename='styles/style.css') }}">

</head>

<body role="document">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Min första Flask app</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url_for('main') }}">Hem</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" role="main">
        <div class="page-header">
            <h1>Stiligt! En fungerande applikation som hanterar routes!</h1>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
```

Det här är en klassisk Bootstrap-mall. Vi laddar även in en egen stylesheet efter Bootstraps. Det är med den vi kan "personifiera" stylen då vi inte har Bootstraps filer lokalt.  



###url_for() {#url-for}

Som tidigare nämnt så använder Flask `url_for()` för sökvägen ska bli korrekt. I koden ovan ser vi bland annat:

```html
<link rel="stylesheet" href="{{ url_for('static',filename='styles/style.css') }}">
```

Stylesheets och bilder ska ligga i mappen static/. Med argumentet `filename=` kan vi skicka med ett filnamn, eller resten av sökvägen om det är uppdelat i mappar i static/. Om man har en bild till exempel me.png i mappen static/images/ når man den med:

```html
<img src="{{ url_for('static',filename='images/me.png') }}">
```

Vi har även länken i navbaren:

```html
<a href="{{ url_for('main') }}">
```

Här hämtas sökvägen till routen `main`. Jämför det med `<a href="index.html">` i detta fallet.

###style.css {#style}

Vi har som sagt vår egna stylesheet att tillgå. Kopiera in följande kod:

```css
body {
  padding-top: 70px;
  padding-bottom: 30px;
}

.theme-dropdown .dropdown-menu {
  position: static;
  display: block;
  margin-bottom: 20px;
}

.theme-showcase > p > .btn {
  margin: 5px 0;
}

.theme-showcase .navbar .container {
  width: auto;
}
```



###app.py {#app}

Vi måste ju ändra så vi servar en html-fil istället för en sträng. För att kunna rendera html filer behöver vi importera metoden "render_template" och använda den.

```python
from flask import Flask, render_template
```

Bra, nu kan vi använda den i vår route:

```python
@app.route("/")
def main():
    """ Main route """
    return render_template("index.html")
```

Underbart! Testa nu att kicka igång servern med `python3 app.py` och öppna `localhost:5000` i din webbläsare.  

[FIGURE src=/image/oopython/kmom01/app1.png?w=w2 caption="En fungerande applikation."]

För att se responsiviteten kan du prova att förminska fönstret så kommer menyn ändras när fönstret blir tillräckligt litet.



Utöka applikationen {#utoka}
-------------------------------

Det är ju lite tråkigt att bara ha en sida. Vi tittar på hur man utökar med en sida till.

Vi kommer behöva lägga till en route i `app.py` och skapa en ny sida i /templates-mappen. Inte krångligare än så.



###Skapa ny sida i /templates {#skapa-ny-sida-i-templates}

Börja med att skapa filen på följande sätt:  
Den har samma struktur som `index.html` så vi kopierar bara den. Öppna index.html i editorn och lägg till ett `<li>` element för den nya sidan, under  
`<li class="active"><a href="{{ url_for('main') }}">Hem</a></li>`:
```html
<li><a href="{{ url_for('about') }}">Om</a></li>
```

Nu kan vi kopiera innehållet i index.html till filen vi döper till about.html.

Från roten:

```bash
cp templates/index.html templates/about.html
```

Öppna filen `about.html` i en editor. Vill du ha en annan titel ändrar du det här:

```html
<title>Om</title>
```

När man klickat på "Om" i navbaren ska det menyvalet vara aktivt. Vi skiftar så rätt `<li>`-element har rätt klass:

```html
<li><a href="/">Hem</a></li>
<li class="active"><a href="{{ url_for('about') }}">Om</a></li>
```

Du kan såklart ändra innehållet för /about men det hittar du nog.

Sådärja! Nu är det bara en route för den nya sidan som behövs.



###Lägg till en route {#lagg-till-en-route}

Vi öppnar filen `app.py` igen och tittar på routen. Lägg till följande kod under den första routen:

```python
@app.route("/about")
def about():
    """ About route """
    return render_template("about.html")
```

[FIGURE src=/image/oopython/kmom01/app2.png?w=w2 caption="Slutlig applikation."]



Avslutningsvis {#avslutning}
------------------------------

Titta gärna på [Bootstrap temats sida](https://getbootstrap.com/examples/theme/). Högerklicka -> Visa källkod så ser du hur de byggt upp den och vilka klasser som använts. Testa och lek!
