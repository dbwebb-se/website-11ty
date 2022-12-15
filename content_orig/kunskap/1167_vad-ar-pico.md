---
author:
    - nik
category:
    - design
    - pico
revision:
    "2020-10-12": (A, nik) Skapad inför HT2020.
...
Vad är Pico? {#inledning}
==================================

Pico är ett CMS, Content Management System, som tillåter användaren att hantera innehållet på en sida utan att behöva "koda" sidan själv. Det finns flera andra stora alternativ, så som WordPress, Drupal och Grav, men i denna kursen ville vi ha ett tunnare ramverk som låter oss fokusera på design-aspekten av webbutveckling. Pico är även ett "flat-file" CMS, vilket innebär att man jobbar emot filer istället för en databas, ungefär så som [dbwebb](https://dbwebb.se/) är uppbyggt.

<!--more-->

Vi ska i denna artikel introducera er till grunderna inom Pico och hur man kan jobba med ett CMS. Delar som kommer nämnas är vad Pico är, hur det fungerar, dess mappstruktur, hur man lägger till nytt innehåll samt hur man kan jobba med sin layout och stil på sidan.

Om det är något mer man eftertraktar kan man alltid hoppa in i [Pico's dokumentation](http://picocms.org/docs/).


Mappstruktur {#mapp}
--------------------------------------

Om vi hoppar in i `example/portfolio` så kan vi se hur mappstrukturen ser ut för vår grundläggande portfolio-sida som kommer användas i kursen.

```bash
.
├── assets/
│   ├── cimage/
│   └── img/
├── cache/
│   └── cimage/
├── composer.json
├── composer.lock
├── config/
│   ├── config.php
│   └── config.yml
├── content/
│   ├── 404.md
│   ├── _meta.md
│   ├── docs/
│   ├── example/
│   └── index.md
├── index.php
├── plugins/
│   └── PicoDeprecated/
├── themes/
│   ├── dbwebb/
│   └── shared/
└── vendor/
```

Kan se ut att vara lite mycket i början, men vi stegar igenom det. Vi börjar med att kolla på allt som ligger längst upp i filträdet.

<!-- * `Makefile` är en fil som tillåter oss att köra `make <command>` för att underlätta i utvecklingen. Så istället för att komma ihåg eller behöva skriva `rm -rf vendor composer.lock` så kan vi köra `make clean-all` för att rensa bort samtliga temporära filer. -->

* `assets/`-mappen innehåller en mapp för de bilder vi vill använda, `assets/img/`. Bilderna kan vi nå i våra Markdown-filer genom en inbyggd variabel i Pico, `%assets_url%`, t.ex. `%assets_url%/img/tree2.jpg`.
* `cache`-mappen innehåller våra cache:ade filer, i detta fallet de filer som bearbetats av CImage. Detta är för att CImage ska slippa behöva arbeta med våra filer varje gång vi laddar hemsidan.
* `composer.json` specificerar vilka moduler vår sida behöver för att fungera, här specificerar vi t.ex. `picocms/pico` och `erusev/parsedown-extra` för att få hem Pico och en extension för våra Markdown-filer. `composer.lock` är autogenererad och säger vilken version man har av varje modul. Ni kommer inte behöva arbeta med dessa filer under denna kurs, men det kommer nämnas mer i oophp i vår.
* `config/`-mappen innehåller lite olika konfigurationsfiler för vår hemsida. `config/config.php` innehåller, som ni kanske känner igen ifrån htmlphp, vårt egna sätt att starta unika sessioner på studentservern. `config/config.yml` innehåller en hel del inställningar för Pico som man kan grotta sig ner i, men inget vi går på djupet med just nu.
* `content/`-mappen innehåller allt innehåll på sidan, i Markdown-filer (`.md`). Vi går igenom detta lite mer i nästa stycke.
* `index.php` är startsidan till vår hemsida och allt laddas därifrån.
* `plugins/`-mappen innehåller eventuella plugins som man kan ladda in ifrån Pico, i nuläget innehåller den filer som Pico håller på att deprecate:a.
* `themes/`-mappen innehåller våra teman, i nuläget ett `themes/dbwebb` som tar sin inspiration ifrån dbwebb.se och en `themes/shared` som innehåller delade filer mellan samtliga teman. Vi går mer in på djupet om detta längre ner.
* `vendor/`-mappen innehåller alla moduler vi hämtar hem med hjälp av Composer (och vår `composer.json`). Den här mappen kan ni helt bortse ifrån.

Som sagt, det är en hel del filer och mappar, men de tre viktiga vi tar med oss är:

* `assets/img/` som kommer innehålla våra lokala bilder.
* `content/` som kommer innehålla våra Markdown-filer (vårt innehåll).
* `themes/` som kommer innehålla vår layout och CSS/SASS-filer.

Innehåll {#innehall}
--------------------------------------

Rimligen vill vi fylla vår sida med innehåll, även i en design-kurs. När vi ska lägga till innehåll på sidan så arbetar vi främst emot vår `content/`-mapp, där länkar, navigering och liknande genereras automatiskt utav Pico. I `example/portfolio` finns det några grundfiler vi kan kolla lite mer noga på.

Filerna skrivs i Markdown, som ni kan hitta mer läsmaterial om [här](kurser/design-v3/kmom01#markdown).

### Meta {#meta}

`_meta.md` innehåller meta information som varje sida i dess mapp får. Vi kan öppna den och se vad som menas med meta information:

```
---
Logo: image/leaf_256x256.png
Tagline: My portfolio.
Social:
    - title: Link till sidans github repo.
      url: https://github.com/dbwebb-se/design-v3
      icon: github
---
```

[FIGURE src=/image/design-v3/pico-meta.png]

* Logo (rött): säger vilken logotyp vi vill använda på sidan, denna variabel används sen i vår layout för att visa en bild längst upp till vänster.
* Tagline (blått): En tagline för vår sida, visas under sidans namn i vår header.
* Social: Länkar till eventuella sociala medier i vår footer, i nuläget en länk till sidans kursrepo på Github. Ikonerna laddas in ifrån FontAwesome, så de flesta därifrån borde fungera.

### Index {#indexmd}

`index.md` är vår startsida, precis som `index.php` eller `index.html` hade varit vår startsida om vi jobbade med ren PHP/HTML. Man bör ha en `index.md` för varje mapp, som exempel kan vi se i `content/index.md` men även `content/example/index.md` och `content/docs/index.md`.

### 404 {#404md}

`404.md` är vår 404-sida. Det är där vi hamnar om vi försöker gå till en sida som Pico inte kan hitta.

### Eget innehåll {#eget-innehall}

Vi testar att lägga till eget innehåll, t.ex vår redovisningssida, genom att skapa en ny mapp, `content/report/` och en `content/report/index.md` som landningssida. I `content/report/index.md` så lägger vi till lite meta information som behövs för att den ska synas i vår navigering samt länkarna till varje kursmoment.

```
---
Title: Report
Description: The course report page
---

Redovisningssida för design
==================

* [kmom01](report/kmom01)
* [kmom02](report/kmom02)
* [kmom03](report/kmom03)
* [kmom04](report/kmom04)
* [kmom05](report/kmom05)
* [kmom06](report/kmom06)
* [kmom10](report/kmom10)
```

Detta ger oss en länklista som kan se ut såhär:

[FIGURE src=/image/design-v3/report-example.png]

Trycker vi på någon av våra länkar får vi en 404, vilket inte är så konstigt i och med att filerna saknas. Jag visar hur man skapar en kmom01, så kan ni lösa resterande del av kursmomenten.

Jag skapar följande fil: `content/report/kmom01.md` och fyller den på liknande sätt som `index.md`

```
---
Title: Kmom01
Description: Part 1
---

Kursmoment 1
==================

Vi testar en undersida
```

I slutet borde ni ha något liknande detta, förutsatt att ni inte hoppat i förväg och pillat på temat, på `me/portfolio/report/kmom01`

[FIGURE src=/image/design-v3/kmom01-example.png]

Layout {#layout}
--------------------------------------

Men fokuset i kursen är design och en del av design är att arbeta med sin layout på sidan. Pico har valt att använda Twig, som är en template engine som ofta används inom PHP. Den har snarlik syntax till EJS som är en av de vanligaste template engine inom JavaScript, som ni kommer jobba mer med i databas-kursen.

Det går att läsa på mer om de olika funktionerna som är tillgängliga i Twig i deras [dokumentation](https://twig.symfony.com/doc/3.x/).

[INFO]
**Editor plugins** {#plugins}

Syntax:en kan se lite lustig ut då Atom och VSCode tror att det är HTML-filer. Om man kollar [Twigs dokumentation](https://twig.symfony.com/doc/3.x/templates.html#ides-integration) kan man se vilka paket som löser syntaxen:

* Atom via the [PHP-twig for atom](https://github.com/reesef/php-twig)
* Visual Studio Code via the [Twig pack](https://marketplace.visualstudio.com/items?itemName=bajdzis.vscode-twig-pack)

[/INFO]

### Vår layout {#var-layout}

I `themes/dbwebb/index.twig` så kan vi se vår default-layout. Den består egentligen utav vanlig HTML, plus lite syntax ifrån Twig. Men jag stegar igenom den, så ni har hyfsad koll på vad som är vad.

### Head-elementet {#head}

Vi börjar med att kolla på vårt `<head>` element,

```html
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ theme_url }}/../shared/img/favicon.ico">
    <title>{% if meta.title %}{{ meta.title }} | {% endif %}{{ site_title }}</title>

    {% if meta.description %}
        <meta name="description" content="{{ meta.description|striptags }}" />
    {% endif %}
    {% if meta.robots %}
        <meta name="robots" content="{{ meta.robots }}" />
    {% endif %}

    {% if current_page %}
        <link rel="canonical" href="{{ current_page.url }}" />
    {% endif %}

    <link rel="stylesheet" href="{{ theme_url }}/../shared/css/font-awsome.min.css" type="text/css" />
    <!-- Insert font choice here -->
    {# <link rel="stylesheet" href="{{ theme_url }}/../shared/css/dorid-sans.css" type="text/css" /> #}
    <!-- End -->
    <link rel="stylesheet" href="{{ theme_url }}/css/style.css" type="text/css" />
</head>
```

De två första raderna känner vi igen sen htmlphp. Rad tre är vår favicon som laddas utifrån en variabel, `{{ theme_url }}`. `{{ ... }}` används vid utskrift och `{% ... %}` används för logik (t.ex. loopar).

Rad 4 kollar om `meta.title` är satt och skriver ut den i såna fall, följt utav `site_title`. Vi minns tillbaka och kommer ihåg att vi satte `title` i vår meta-information för våra `.md` filer.

Rad 6-15 skriver ut lite olika meta-data (om de är specificerade), inget som är kritiskt för oss men bra att ha i CMS-ramverk.

Sen känner vi igen oss igen, det är länkar till våra CSS-filer. Vi behöver jobba utifrån vår `theme_url` som pekar till vårt default tema, `portfolio/themes/dbwebb`.

### Body {#body}

Body-delen är lite stor att ta i ett svep, så vi stegar igenom den. Till att börja med så har vi en if-sats som kollar om vi satt `widescreen: true` i vår config (`config/config.yml`) och lägger på en `.widescreen` på vår body om det är fallet.

#### Header {#header}

Vår header innehåller följande:

```html
<div id="header" role="banner">
    <div class="container">
        <a id="nav-toggle" title="Toggle Menu" role="button" aria-controls="nav" aria-expanded="false" tabindex="1">
            <i class="fa fa-bars" aria-hidden="true" id="toggler"></i>
            <span class="sr-only">Toggle Menu</span>
        </a>
        {% if pages["_meta"].meta.logo %}
            <div id="logo" aria-hidden="true">
                <a href="{{ "index"|link }}">
                    <img src="{{ base_url }}/{{ pages["_meta"].meta.logo|url }}" alt="" />
                </a>
            </div>
        {% endif %}
        <div id="title"{{ pages["_meta"].meta.tagline ? ' class="tagline"' }}>
            <a href="{{ "index"|link }}">
                <h1>{{ site_title }}</h1>
                {{ pages["_meta"].meta.tagline|markdown }}
            </a>
        </div>
        <div id="nav" role="navigation" tabindex="-1">
            <ul>
                {% for page in pages(depthOffset=-1) if page.title and not page.hidden %}
                    <li{% if page.id == current_page.id %} class="active"{% endif %}>
                        <a href="{{ page.url }}">{{ page.title }}</a>
                    </li>
                {% endfor %}
            </ul>
        </div>
        <div class="flash-region">
            <img class="flash-img" src="{{ base_url }}/image/tree2.jpg?sc=banner1&a=40,0,0,0">
        </div>
    </div>
</div>
```

Två omslutande div:ar följs utav vår mobilnavigering, även kallad hamburgaremeny på svenska. Den jobbar emot vår navigering som specificeras längre ner

```html
<a id="nav-toggle" title="Toggle Menu" role="button" aria-controls="nav" aria-expanded="false" tabindex="1">
    <i class="fa fa-bars" aria-hidden="true" id="toggler"></i>
    <span class="sr-only">Toggle Menu</span>
</a>
```

Efter det kommer en till if-sats som visar vår logotyp ifall vi har satt en i vår meta (se `content/_meta.md`). Det följs upp av en div innehållande sidans titel och slogan.

Sen så skrivs vår navigering ut, som används både vid desktop och mobilanvändande. Den genereras automatiskt utifrån innehållet i `content/`, så inget vi behöver oroa oss över.

Tillslut så skriver vi ut vår flash-bild, snällt lånad ifrån dbwebb.

#### Content {#content}

Nästa stycke skriver ut vårt innehåll på sidan, inga konstigheter där:

```html
<div id="main" role="main">
    <div class="container">
        {{ content }}
    </div>
</div>
```

#### Footer {#footer}

Sist har vi sidans footer, som skriver ut länkar till sociala medier utöver en kort liten text.

```html
<div id="footer">
    <div class="container">
        <div class="social">
            <!-- Loads from FontAwesome (themes/shared/css/font-awesome.min.css) -->
            {% for social in pages["_meta"].meta.social %}
                <a href="{{ social.url }}" title="{{ social.title }}" role="button">
                    <i class="fa fa-{{ social.icon }}" aria-hidden="true"></i>
                    <span class="sr-only">{{ social.title }}</span>
                </a>
            {% endfor %}
        </div>
        <p>
            En footer med lite text.
        </p>
    </div>
</div>
```

Tema {#tema}
--------------------------------------

Men var ligger vår CSS? Under `themes/dbwebb/css/style.css` kan ni hitta vårt default-temas CSS-fil. 

Vårt tema består då utav vår layout (`theme/dbwebb/index.twig`) och vår CSS (`theme/dbwebb/css/style.css`). Men för att göra sidan till er egen så vill vi inte att ni ska ta vårt tema, utan vi vill att ni ska skapa ett eget. Jag väljer att skapa ett eget tema i mappen `themes/aurora` (här tar ni givetvis ett eget namn) där jag skapar de nödvändiga filerna, `themes/aurora/index.twig` för min layout och `themes/aurora/css/style.css` för min CSS.

För att ladda in temat så behöver jag uppdatera min `theme: dbwebb` i `config/config.yml` till `theme: aurora` och laddar om sidan. Oj, allt blev vitt. Ja, min layout är ju tom så det är väl inte så konstigt egentligen.

Jag hämtar ut hela `<head>` ifrån dbwebb-layout:en, där är jag nöjd. Sen så vill jag rensa upp lite i min `<body>`, vilket slutade med detta:

```html
<body{% if config.theme_config.widescreen %} class="widescreen"{% endif %}>
    <header class="site-header">
        
    </header>
    <div class="main" id="main" role="main">
        <div class="container">
            {{ content }}
        </div>
    </div>
    <footer class="site-footer">
        <p>Min footer</p>
    </footer>
    <script src="{{ theme_url }}/../shared/js/modernizr-3.3.1-custom.min.js" type="text/javascript"></script>
    <script src="{{ theme_url }}/../shared/js/utils.js" type="text/javascript"></script>
    <script src="{{ theme_url }}/../shared/js/responsive-navbar.js" type="text/javascript"></script>
</body>

```

En helt vit sida som skriver ut innehållet. Rimligen kanske jag vill låna vår navigering med, så jag tar och uppdaterar min `<header class="site-header">`:

```html
<header class="site-header">
    <a id="nav-toggle" title="Toggle Menu" role="button" aria-controls="nav" aria-expanded="false" tabindex="1">
        <i class="fa fa-bars" aria-hidden="true" id="toggler"></i>
        <span class="sr-only">Toggle Menu</span>
    </a>
    <div id="nav" role="navigation" tabindex="-1">
        <ul>
            {% for page in pages(depthOffset=-1) if page.title and not page.hidden %}
            <li{% if page.id == current_page.id %} class="active" {% endif %}>
                <a href="{{ page.url }}">{{ page.title }}</a>
                </li>
                {% endfor %}
        </ul>
    </div>
</header>
```

Nu har vi en fungerande navigering så vi kan ta oss runt på sidan. Jag är nöjd för tillfället, jag lägger till lite stil på sidan i min `themes/aurora/css/style.css`:

```css
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

html, body {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
}

/* Header */

.site-header {
    flex: 0 0 auto;
    background-color: #e74c3c;
    color: #2b2e30;
    padding: 0 2em;
}

.site-header a, .site-header a:visited {
    color: #2b2e30;
}

/* Main */

.main {
    flex: 1 0 auto;
    padding: 2em;
}

/* Footer */

.site-footer {
    flex: 0 0 auto;
    background: #e74c3c;
    color: #2b2e30;
    padding: 2em;
}

.site-footer a {
    color: #f0f0f0;
}
```

### Mobilmeny {#mobilmeny}

Nu ser sidan bra ut, men vår navigering fungerar inte riktigt som vi vill. Jag väljer att skapa en till CSS-fil som får innehålla reglerna som påverkar navigeringen relaterat till mobila enheter. Den får heta `themes/aurora/css/nav.css` och jag inleder med att länka den i min layout under min föregående CSS-fil

```html
<link rel="stylesheet" href="{{ theme_url }}/css/style.css" type="text/css" />
<link rel="stylesheet" href="{{ theme_url }}/css/nav.css" type="text/css" />
```

Sen så lägger jag över de nödvändiga reglerna ifrån föregående CSS-fil:

```css
.hidden {
    display: none !important;
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0 none;
}

.slide {
    overflow-y: hidden !important;
    -webkit-transition: height 0.5s ease-in !important;
    transition: height 0.5s ease-in !important;
}

#nav {
    padding: 3em 0;
    text-align: right;
}

#nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

#nav ul li {
    display: inline-block;
    margin-left: 1em;
    padding: 0;
    font-weight: bold;
}

#nav a:hover, #nav-toggle:hover {
    text-decoration: underline;
}

#nav-toggle {
    display: none;
}

/* Small devices */

@media (max-width: 767px) {
    #nav {
        clear: both;
        padding: 0;
    }
    #nav ul {
        padding-bottom: 1em;
    }
    #nav ul li {
        display: block;
        margin-left: 0;
        text-align: center;
    }
    #nav ul li a {
        display: block;
        padding: 0.5em 0;
    }
    .js #nav-toggle {
        display: block;
        float: right;
        width: 2em;
        margin: 0.6667em 0;
        font-size: 1.5rem;
        line-height: 2em;
        text-align: center;
        cursor: pointer;
    }
    .js #nav-toggle>* {
        vertical-align: middle;
    }
}
```

Ovanstående kod löser vår navigering och vi är nöjda. Mycket kod känner ni igen, lite är nytt. Ta det som överkurs att förstå allt som händer, det är lite JavaScript involverat.

Min slutgiltiga sida ser ut något såhär, eran skiljer sig förhoppningsvis:

[FIGURE src=/image/design-v3/portfolio-example.png]

Avslutningsvis {#avslut}
--------------------------------------

Det är mycket vi gått igenom i den här artikeln, allt kommer inte ha fastnat på första rundan, det är helt okej. Om något är oklart kan man alltid kolla tillbaka på artikeln eller dokumentationen, det är så man jobbar. Om det är några frågor eller om något är oklart, hojta till i chatt så kollar vi på det. Annars lycka till och producera mästerverk!
