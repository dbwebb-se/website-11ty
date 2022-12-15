---
author: lew
revision:
    "2017-01-18": (A, lew) First version.
category:
    - oopython
...
Flask och Jinja2
===================================

[FIGURE src=/image/oopython/kmom03/kmom03_top_jinja.png?w=c8 class="right"]

[Jinja2](http://jinja.pocoo.org/) är en så kallad "template engine" för Python som renderar template-filer åt oss. Paketet Jinja2 ingår i Flask. Skulle det inte finnas installerat så installerar du det med Pythons pakethanterare `pip`.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och du vet vad variabler, typer, objekt och funktioner innebär.  
Du har gjort övningen "[Kom igång med Flask](kunskap/kom-igang-med-flask)".  
Du har gjort övningen "[Kom igång med objekt](kunskap/kom-igang-med-objekt)".



Separera koden {#separera-koden}
------------------------------

Vi ska använda Jinja2 för att separera koden så vi använder en header och en footer som inkluderas på alla sidor. På så vis behöver vi bara ändra koden på ett ställe vid eventuell uppdatering och vi återanvänder koden. [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) är bra.  

Startläget för den här övningen är appen från kmom01 "my_app".  

Börja med att installera Jinja2:  

```python
pip3 install Jinja2
```

Vi fortsätter med att kopiera in mappen och skapa en header och en footer:

```python
# Ställ dig i roten av kursrepot
cp -ri me/kmom01/my_app/ me/kmom03/my_app2/
cd me/kmom03/my_app2
touch templates/header.html templates/footer.html
```

Nu delar vi upp koden vi har i index.html. Om man funderar en stund på vad som behövs på alla sidor kommer vi fram till att följande kod kan vi lägga i header.html:

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
          <a class="navbar-brand" href="{{ url_for('main') }}">Min första Flask app</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url_for('main') }}">Hem</a></li>
            <li><a href="{{ url_for('about') }}">Om</a></li>
          </ul>
        </div>
      </div>
    </nav>
```

Det är headern och navbaren. Vi siktar på att bara ha relevant innehåll i sidorna så vi flyttar över lite kod till footer.html med:

```html
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
```

Kvar i index.html har vi nu enbart så kallat "content", det unika innehållet för varje sida. Nu är det dags att använda Jinja2 så vi kan inkludera header.html och footer.html i vår index-fil.  

Enbart html-kod kan inte inkludera en annan fil. Tack och lov finns det olika verktyg att tillgå för att åstadkomma detta. Jinja2 använder sig utav `{% include your file or code here %}` för att peta in "icke-html"-kod på webbsidan. Man kan skapa så kallade "templates" med ren python-kod eller inkludera hela html-sidor. Vi tittar på vår index.html igen och lägger till en `include` på header.html och footer.html:

```html
{% include 'header.html' %}

<div class="container" role="main">
    <div class="page-header">
        <h1>Stiligt! En fungerande applikation som hanterar routes!</h1>
        <h3>Nu inkluderas även headern och footern med hjälp av Jinja2</h3>
    </div>
</div>

{% include 'footer.html' %}
```

Vad prydligt det blev! Vi gör likadant för about.html:

```html
{% include 'header.html' %}

<div class="container" role="main">
    <div class="page-header">
        <h1>Om mig</h1>
        <p>Nu har jag skapat en liten applikation för att komma igång med Flask.</p>
    </div>
</div>

{% include 'footer.html' %}
```

Nu har vi skapat templates (mallar) vi kan utgå ifrån. För att skapa nya sidor är det bara att kopiera -> klistra in och köra på.  

Tittar man på den aktiva länken i navbaren ser vi att den inte byts till den aktuella sidan längre. Det beror på att klassen "active" sätts bara på li-elementet som länkar till index.html, i header.html. Vi lägger till en fix i den så det alltid är den aktuella sidan som får klassen "active".  

I header.html:

```html
<ul class="nav navbar-nav">
    <li {%- if request.path == "/" %} class="active" {% endif %}><a href="{{ url_for('main') }}">Hem</a></li>
    <li {%- if request.path == "/about" %} class="active" {% endif %}><a href="{{ url_for('about') }}">Om</a></li>
</ul>
```

Vi använder Jinja2 och modulen "request" som importeras i app.py. En if-sats kollar pathen och lägger till klassen `active` om den matchar. Studera koden ovan så du är med på vad som händer.



Skicka med parametrar {#skicka-med-parametrar}
------------------------------

För att göra vår app lite mer användbar kan vi skicka med parametrar vid routingen i app.py. Det gör att vi kan använda ren python-kod och sedan presentera det i html-koden.  

Vi kikar på hur det går till i app.py. Innan `@app.route()` lägger vi till några variabler:  

```python
my_name = "Kenneth Lewenhagen"
my_course = "OOPython"
```

Låt säga att vi vill skicka med variablerna till `about.html`. Om du kommer ihåg [strängformatering](https://www.youtube.com/watch?v=BkMm0lX-Ytc&list=PLKtP9l5q3ce93pTlN_dnDpsTwGLCXJEpd&index=18) från förra pythonkursen kan du nog lista ut hur det fungerar.  

I app.py:

```python
@app.route("/about")
def show_about():
    return render_template("about.html", name=my_name, course=my_course)
```

Nu fattas det bara att använda variablerna i about.html. Vi lägger till placeholders med hjälp av `{{ }}`:

```html
<p>Jag heter {{ name }} och det här är kursen {{ course }}.</p>
```

about.html tar emot de skickade variablerna och placerar ut dem.

Om vi nu drar igång servern och pekar webbläsaren på `localhost:5000/about`:

[FIGURE src=/image/oopython/kmom03/jinja2_result.png?w=w2 caption="Utskrift via variabler."]



Avslutningsvis {#avslutning}
------------------------------

Fundera lite på vad mer man kan göra med Flask och Jinja2. Det är oerhört kraftfullt och öppnar upp många möjligheter med Python-kod på webbsidan.
