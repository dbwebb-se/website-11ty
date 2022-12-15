---
author: mos
category:
    - javascript
    - kursen webapp
revision:
    "2017-03-10": "(B, aar) Kopiera Mithril från example istället för ladda ner."
    "2015-11-04": "(A, mos) Första utgåvan inför kursen webapp."
...
Kom igång med ramverket Mithril för JavaScript SPA
==================================

[FIGURE src=/image/snapht15/mithril-logo.png class="right"]

En SPA är en *single page application* som är skriven i HTML, CSS och JavaScript och laddas som en sida. Det är ett sätt att skriva webbapplikationer som är fokuserade i webbläsaren. För att skriva den typen av applikationer så är det inte ovanligt att använda ett MVC-liknande ramverk som ger tillgång till ett visst grundstöd till hur man skriver sin kod.

Mithril är ett sådant ramverk och vi skall nu bekanta oss med hur Mithril kan användas för att skapa SPA-applikationer.

<!--more-->

[INFO]
**Mithril 0.2 och webapp-v1**

Denna artikel är skriven mot en äldre version av Mithril som ingick i kursen webapp-v1.

Mithril har fått uppdateringar och det finns en nyare artikel som beskriver hur man kommer igång med Mithril 1.\*, "[Kom igång med ramverket Mithril](kunskap/kom-igang-med-mithril-och-webpack)" som är en del av kursen webapp-v2.
[/INFO]



Introduktion {#intro}
--------------------------------------

Du kan läsa mer om [begreppet SPA på Wikipedia](https://en.wikipedia.org/wiki/Single-page_application).

Vi kommer installera och använda [Mithril](http://lhorie.github.io/mithril/) för att bygga en enkel applikation som hämtar JSON-data från en server, använder sig av en router och renderar vyerna via en template.

Låter det magiskt? Lika bra vi ser hur det fungerar i kod, så faller saker nog på plats.

Det är bra om du är bekant med [MVC-liknande tekniker](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller). Men det är inte nödvändigt, det här kommer att gå bra ändå. Det handlar bara om att strukturera sin kod.

Du kan testa samtliga exemplel i artikeln via  i kursrepot som ligger på dbwebb i katalogen [`example/mithril`](webapp/repo/example/mithril/). Källkoden för exemplet hittar i i ditt kursrepo eller på [GitHub](https://github.com/mosbth/webapp/tree/master/example/mithril).



Ladda hem Mithril {#stappla}
--------------------------------------

Mithril har en [guide som visar hur man kommer igång](http://lhorie.github.io/mithril/getting-started.html).  

Jag tänker göra en egen variant och spara undan i mitt eget kursrepo. Först behöver jag en katalogstruktur.

```bash
$ mkdir mithril mithril/{js,json,css,img}
$ tree mithril
mithril/               
├── css                
├── img                
├── js                 
└── json               
                       
4 directories, 0 files 
```

Kopiera Mithril från example/lib.

```bash
# utgå från me/kmom04
cp ../../example/lib/mithril.min.js mithril/js
```

<!--Nu kan jag ladda hem Mithril.
```bash
$ cd mithril/js
$ wget http://lhorie.github.io/mithril/mithril.min.zip
$ unzip mithril.min.zip
$ rm mithril.min.zip
``` -->

Nu skapar jag min `rotatelinks.html`, som jag väljer att kalla detta första exempel.

```bash
$ cd ..
$ touch rotatelinks.html
```

Jag lägger in följande kod i rotatelinks.html.

```html
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Mithril test app</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div id="example"></div>

<script src="js/mithril.min.js"></script>
<script>
//app goes here
</script>
```

Lika bra att ladda in det i webbläsaren så man ser att sökvägarna var korrekta. Men det blir ju en tom sida så här långt så man får använda webbläsarens devtools för att se att alla resurser laddas som de ska.



Ett litet exempel {#litet}
--------------------------------------

På Mithrils sida hittar jag ett exempel som roterar länkar som är sparade i ett JSON objekt. Samma exempel tänker jag återskapa här.

Först sparar jag länkarna i en sida `json/pages.json`.

```javascript
[
    {
        "title": "Getting Started",
        "url": "http://lhorie.github.io/mithril/getting-started.html"
    },
    {
        "title": "Documentation",
        "url": "http://lhorie.github.io/mithril/mithril.html"
    },
    {
        "title": "Mithril Blog",
        "url": "http://lhorie.github.io/mithril-blog/"
    },
    {
        "title": "Mailing List",
        "url": "https://groups.google.com/forum/#!forum/mithriljs"
    }
]
```

Sedan lånar jag hela kodexemplet och håller tummarna. När man väl har ett fungerande exempel så kan man alltid kika på delarna i lugn och ro. Följande kod lägger jag in mellan script-taggarna i min `rotatelinks.html`.

```javascript
//model
var Page = {
    list: function() {
        return m.request({method: "GET", url: "json/pages.json"});
    }
};

var Demo = {
    //controller
    controller: function() {
        var pages = Page.list();
        return {
            pages: pages,
            rotate: function() {
                pages().push(pages().shift());
            }
        }
    },

    //view
    view: function(ctrl) {
        return m("div", [
            ctrl.pages().map(function(page) {
                return m("a", {href: page.url}, page.title);
            }),
            m("button", {onclick: ctrl.rotate}, "Rotate links")
        ]);
    }
};

//initialize
m.mount(document.getElementById("example"), Demo);
```

I min första variant hamnar alla länkar direkt efter varandra så jag lägger till style för att få exemplet lite tydligare.

Jag skapar filen `css/style.css`.

```bash
$ touch css/style.css
```

Sedan lägger jag in så att länkarna får en block-style.

```css
a {
    display: block;
    margin-bottom: 0.3em;
}

a::after {
    content: "\bb";
}
```

Nu fungerar det och ser ut så här.

[FIGURE src=/image/snapht15/mithril-rotate-links.png caption="Rotera länkar med Mithril som ett första kodexempel."]

Du kan testa exemplet i kursrepot under [`example/mithril/rotatelinks.html`](webapp/repo/example/mithril/rotatelinks.html).

Okey, så bra då. Men vad betyder de olika delarna?



Bygg ut demot till egen app {#egen}
--------------------------------------

Nu vill jag skapa en egen app, så jag börjar med en kopia av html-filen och skapar den som [`diary.html`](webapp/repo/example/mithril/diary.html).

Nu ska jag steg för steg modifiera demot så det passar min egen applikation och samtidigt får jag möjlighet att gå igenom del för del.



Model {#model}
--------------------------------------

Först tittar vi på modellen. Det är den delen som innehåller datan, informationen som skall visas. Själva innehållet i sidan. 

```javascript
//model
var Page = {
    list: function() {
        return m.request({method: "GET", url: "pages.json"});
    }
};
```

Nu tänker jag skapa min egna JSON-fil och ladda den istället. Jag döper den till `json/diary.json`.

```javascript
[
    {
        "title": "Mina husdjur",
        "content": "Här är mina husdjur som jag brukar prata med.",
        "image": "img/birds.jpg"
    },
    {
        "title": "Mitt nya jobb",
        "content": "Jag har valt att flytta ut till landet till min lantgård.",
        "image": "img/countryside.jpg"
    },
    {
        "title": "Sommarsemester 2015",
        "content": "I somras var jag ute och reste runt och vandrade.",
        "image": "img/hike.jpg"
    },
    {
        "title": "Helgresa till storstaden",
        "content": "I helgen var jag på resa och shoppade i storstaden.",
        "image": "img/houses.jpg"
    }
]
```

Som du ser så är det samma information som jag använde i exemplet där jag gjorde en [listview i jQuery Mobile](kunskap/att-gora-en-mobilapp-av-en-mobil-anpassad-webbplats#lista).

<figure class="wrap">
[FIGURE src=/image/snapht15/webapp-listview-images.png?w=c7 class="left" caption="En listview med alternativ."]

[FIGURE src=/image/snapht15/webapp-listview-image-page.png?w=c7 caption="Ett alternativ i listan valdes och visas upp."]
</figure>

Jag laddar nu den nya JSON-filen i min modell som ser ut så här.

```javascript
//model
var Page = {
    list: function() {
        return m.request({
            method: "GET",
            url: "json/diary.json"
        });
    }
};
```

Modellen ovan är alltså ett objekt som innehåller en funktion `list()`. När funktionen anropas så hämtar den JSON-filen via en Ajax GET request. Funktionen [`m.request()`](http://mithril.js.org/request.html) är Mithrils stöd för att hämta information från webbtjänster via Ajax.

Testkör jag så ser det nu ut så här.

[FIGURE src=/image/snapht15/mithril-diary-step1.png caption="Första steget och titlarna syns."]

Bra, då vet jag att jag kan ändra i modellen.



View {#vy}
--------------------------------------

Vyn kontrollerar vad som skrivs ut. För tillfället ser den ut så här.

```javascript
//view
view: function(ctrl) {
    return m("div", [
        ctrl.pages().map(function(page) {
            return m("a", {href: page.url}, page.title);
        }),
        m("button", {onclick: ctrl.rotate}, "Rotate links")
    ]);
}
```

Hmmm, okey. Vyn får information från kontrollern, via inparametern `ctrl`. Då är det nog lika bra att vi samtidigt kikar på kontrollern.

```javascript
//controller
controller: function() {
    var pages = Page.list();
    return {
        pages: pages,
        rotate: function() {
            pages().push(pages().shift());
        }
    }
},
```

Kontrollern hämtar alla sidor från modellen via `Page.list()` och har även en funktion för att rotera sidorna. För min del behöver jag nu endast sidorna. Jag städar upp kod i kontrollern och får detta kvar.

```javascript
//controller
controller: function() {
    var pages = Page.list();
    return {
        pages: pages,
    }
},
```

Nu hämtar kontrollern alla sidorna från modellen som i sin tur laddar dem från JSON-filen. Jag kunde städat koden mer men det får räcka. Städar man för mycket så riskerar man att införa fel och det vill jag inte just nu. Bättre att städa lite och få koll.

Då går vi till vyn för att se hur den kan använda JSON-objektet för att rendera en HTML-sida.

```javascript
//view
view: function(ctrl) {
    return m(
        "ul", {class: "listview"}, [
            ctrl.pages().map(function(page) {
                return m(
                    "a", {href: "#"}, [
                        m("li", [
                            m("img", {src: page.image}),
                            m("h1", page.title),
                            m("p", page.content)
                        ]),
                ]);
            })
    ]);
}
```

Oj, det blev en del konstruktioner för att skapa HTML-koden. Det är funktionen [`m()`](http://mithril.js.org/hyperscript.html) i Mithril som förbereder skapandet av HTML element.

Då ska vi se om vi kan få ut all information som ligger i `diary.json` och visa upp i webbsidan.

[FIGURE src=/image/snapht15/mithril-diary-step2.png?w=w2 caption="En lista med olika alternativ, stylade med lite CSS."]

Stylen som jag använde ser ut så här.

```css
.listview {
    margin: 0;
    padding: 0;
}

.listview li {
    list-style: none;
    clear: both;
    border: 1px solid #ccc;
    margin-bottom: 0.5em;
}

.listview img {
    width: 100px;
    float: left;
    padding: 0.5em;
}

.listview h1 {
    font-size: 1.3em;
}

.listview a {
    text-decoration: none;
    color: #333;
}

.listview a:hover {
    background-color: #eee;
}
```

Det blev en del kod. Men, som det är nu så hämtar jag ett JSON-objekt från en tänkt server och visar upp det i en motsvarighet till jQm's listview. Man kan ännu inte klicka på de olika delarna i listan. Vi tar det lite senare, ett steg i taget.



En router för flera sidor {#router}
--------------------------------------

Så långt allt väl, men hur kan man hoppa mellan sidor? Jo, låt oss se hur vi kan använda [Mithrils router](http://mithril.js.org/route.html) för att navigera mellan olika sidor.

För att testa så skapar jag en ny sida [`routes.html`](webapp/repo/example/mithril/routes.html) som har en meny och när man klickar på menyn så visas sidans innehåll. 

För varje route skapar jag också en [Mithril komponent](http://mithril.js.org/components.html), som bara innehåller vyn, som ritar ut sidans innehåll.

Okey, då tar vi lite kod. Grunden i min HTML-sida ser nu ut så här.

```html
<body>
    <header>
        <a href="#/">Hem</a>
        <a href="#/redovisning">Redovisning</a>
        <a href="#/om">Om</a>
    </header>
        
    <main id="main"></main>
```

Vi börjar med att titta på komponenterna vars vyer endast skriver ut en kort textsträng.

```javascript
<script src="js/mithril.min.js"></script>
<script>

// Components
var Me = {
    view: function() {
        return m("p", "Me");
    }
}


var Report = {
    view: function() {
        return m("p", "Report");
    }
}


var About = {
    view: function() {
        return m("p", "About");
    }
}
```

Som du ser, ingen kontroller denna gången utan enbart vyer som skriver ut en paragraf.

Nu tar vi och tittar på hjärnan, routern.

```javascript
// Routes
m.route(document.getElementById("main"), "/", {
    "/": Me,
    "/redovisning": Report,
    "/om": About,
});

m.route.mode = "hash";

</script>
```

Vi skapar tre stycken routes och routern kommer själv att rendera den sidan som vi visar.

Så här kan testsidan se ut.

[FIGURE src=/image/snapht15/mithril-routes.png?w=w2 caption="Routing på klientsidan."]

Vi har nu möjligheten att på klientsidan *hoppa mellan sidor/routes* och rendera nytt innehåll för varje sida/route, inom ramen för samma ursprungliga webbsida, en SPA alltså.

Om vi jämför med jQm så fungerar denna delen lite mer automatiskt i jQm. I Mithril blir det tydligt vilka routes vi har och vi kan kan lägga till och ta bort själva. Vilket är bättre eller sämre? Ja, det får som alltid bero på vad man gör och hur man vill skriva sin kod. Föredrar man Mithrils sätt så är det troligen för man ser en tydlig kodstruktur som man känner igen från programmering på serversidan, speciellt om man sedan tidigare är van vid MVC-programmering.



HTML artiklar med Mithril {#artikel}
--------------------------------------

Mithril har ett eget sätt att hantera templates och skapa HTML-kod från innehåll från en tänkt server. Men säg nu att jag vill återskapa min [meapp](webapp/repo/example/meapp) som innehåller mestadels HTML-kod och mycket text. Säg att informationen för respektive sida ligger i en databas och man kan hämta varje sida som ett JSON-objekt.

Hur skulle en sådan lösning se ut i Mithril? Jag skapar en ny exempelsida i `content.html`.

Jo, först skapar jag min modell som blir gränssnittet mot datat.

```javascript
// Model
var Page = {
    me: function() {
        return m.request({method: "GET", url: "json/me.json"});
    },
    report: function() {
        return m.request({method: "GET", url: "json/report.json"});
    },
    about: function() {
        return m.request({method: "GET", url: "json/about.json"});
    }
};
```

Modellen `Page` innehåller en metod för varje sida som hämtas från servern via Ajax och GET.

Strukturen i JSON-filerna ser ut så här.

```javascript
{
    "header": "<h1>Om</h1>",
    "content": "<p>Denna appen är byggd med Mithril.</p>"
}
```

Nu lägger jag till en kontroller till varje vy. Kontrollerns uppgift blir att använda sig av modellen för att hämta data och sedan servera datat till vyn som kan använda det för att rendera HTML-koden.

Så här ser kontrollern och den uppdaterade vyn ut för en av sidorna.

```javascript
var Me = {
    controller: function() {
        return {page: Page.me()};
    },
    view: function(controller) {
        page = controller.page();
        return m("article", [
            m("header", m.trust(page.header)),
            m("section", m.trust(page.content)),
        ]);
    }
}
```

Kontrollern använder modellen `Page.me()` och skickar via `controller.page` resultatet till vyn som kan använda informationen för att rendera den som ren HTML-kod via metoden [`m.trust()`](http://mithril.js.org/trust.html).

Komponenten About får samma uppdatering, så även Report. Men vyn för komponenten Report blir lite mer komplex då dess JSON-fil ser ut så här.

```javascript
{
    "intro" : {
        "header": "<h1>Redovisningar</h1>",
        "content": "<p>Här är mina Redovisningstexter.</p>"
    },
    "sections" : [
        {
            "header": "<h2>Kmom01</h2>",
            "content": "<p>Redovisningstext.</p>"
        },
        {
            "header": "<h2>Kmom02</h2>",
            "content": "<p>Redovisningstext.</p>"
        },
        {
            "header": "<h2>Kmom03</h2>",
            "content": "<p>Redovisningstext.</p>"
        }
    ]
}
```

Hur kan man rendera den JSON-datan? Jodå, det går bra. Så här blir komponenten och vyn.

```javascript
var Report = {
    controller: function() {
        return {page: Page.report()};
    },
    view: function(controller) {
        page = controller.page();
        return m("article", [
            m("header", m.trust(page.intro.header)),
            m("section", m.trust(page.intro.content)), [
                page.sections.map(function(section) {
                    return m("section", [
                        m("header", m.trust(section.header)),
                        m("section", m.trust(section.content)),
                    ]);
                }),
            ]
        ]);
    }
}
```

När det renderas blir HTML-sidan så här, precis som tänkt.

[FIGURE src=/image/snapht15/mithril-render-report.png?w=w2 caption="Sidans resultat är en komponering i flera steg med hjälp av en loop."]

Det gick ju bra och du kan testa resultatet i min [`content.html`](webapp/repo/example/mithril/content.html).

Men, är det enkelt att skapa innehåll på detta viset i sin webapp? Ja, om man är medveten om hur Mithril jobbar med vyerna och renderingen så kan man alltid förbereda innehållet på serversidan och preparera JSON-datat så det blir enkelt att rendera. Det finns ju inget som hindrar att man lägger in "allt" HTML-innehåll i en JSON-variabel. Det fungerar bra för texter och artiklar som skapas i ett annat verktyg, lagras i databas, förbereds och formatteras på serversidan.

Det som till en början ser ut som en krånglig konstruktion kan trots allt vara effektiv, beroende på hur man väljer att hantera sitt innehåll som helhet.

Låt oss kika på ett alternativ till att rendera innehåll i HTML.



HTML templates med Handlebars {#handlebars}
--------------------------------------

Vi tar ett kort sidospår med en *template engine* som heter [Handlebars](http://handlebarsjs.com/). En template engine, eller templatemotor, kan hjälpa dig med att separera HTML-elementen och själva innehållet, *context*.

Till detta exempel skapar jag en ny sida `handlebars.html`.



###En template {#template}

Först en mall, en template, i HTML-kod med *placeholders*, platser där variablers värde skall placeras in.

```html
<script id="page_tpl" type="text/template">
<article>
<header>{{{header}}}</header>
{{{content}}}
</article>
</script>
```

Du ser att det är vanlig HTML-kod och placeholders för `{{{header}}}` och `{{{content}}}` som kan matchas mot innehållet i JSON-filen. Syntaxen för placeholders är specifik för Handlebars men andra template engines har motsvarande hantering. 

Om du tittar i manualen så ser du att det normalt används två måsvingar såsom `{{holder}}`. Om man gör det så escapas HTML-kod som finns i `holder`. Jag har medvetet HTML-element i min `holder`, den skall inte escapas och jag använder därför tre måsvingar så att handelbars undviker att escapa HTML elementen.

Du kan också se att templaten ligger inom ett `<script>` element med typen `text/html`. Det gör att templaten kan vara en del av HTML-sidan men det är inget som visas eller renderas eftersom webbläsaren inte förstår `type="text/template"`. Detta ger oss en möjligghet att lagra saker i webbsidan som vi senare använder.



###Innehåll eller *context* {#innehall}

Låt oss nu titta på JSON-filen som skall mappas mot templaten, vårt innehåll, eller *context* om man så vill.

```javascript
{
    "header": "<h1>Om</h1>",
    "content": "<p>Denna appen är byggd med Mithril.</p>"
}
```

Du ser hur `header` och `content` kan matchas i JSON-filen mot templaten? Bra.



###Rendera innehåll mot template {#rendera}

Låt då se hur man kan ta JSON-datat och applicera på templaten för att rendera HTML-sidan. Det är här som Handlebars hjälper till. 

Vi kikar på komponenten `Me`.

```javascript
// Component
var Me = {
    controller: function() {
        return { page: Pages.me() };
    },
    view: function(controller) {
        var source   = document.getElementById("page_tpl").innerHTML;
        var template = Handlebars.compile(source);
        var context  = controller.page();
        var html     = template(context);

        return m("main", m.trust(html));
    }
}
```

Kontrollern är som tidigare och det är koden i vyn som ändrats. Vi tar kodrad för kodrad.

```javascript
// Get the source for the template as created in the script element
var source   = document.getElementById("page_tpl").innerHTML;

// The template source must be compiled
var template = Handlebars.compile(source);

// Controller contains the details for the page, we store it as context.
var context  = controller.page();

// We apply the context to the template and the result is pure HTML.
var html     = template(context);

// Let Mithril add the HTML to the document.
return m("main", m.trust(html));
```

Det är en del steg men jag antar du uppfattar stegen som rätt logiska om man tänker på hur datan behöver processas. 

Det handlar alltså om att ta templaten och rendera det genom att applicera det context man väljer. Resultatet blir ren HTML som Mithril renderar till den resulterande sida.



###En template med en loop {#loop}

Om du nu tänker på report-sidan igen så var den vyn lite mer komplex. Den kan se ut så här i en Handlebars template.

```html
<script id="report_tpl" type="text/template">
<article>
{{#with intro}}
    <header>{{{header}}}</header>
    {{{content}}}
{{/with}}
{{#each sections}}
    <header>{{{header}}}</header>
    {{{content}}}
{{/each}}
</article>
</script>
```

Konstruktionen `{{#with intro}}` ger en kortare väg till variablerna och `{{#each sections}}` är en loop-konstruktion som loopar igenom varje sektion och skriver ut den.

Det finns alltså möjlighet att skapa kraftfulla templates och man kan till och med skapa egna anpassade funktioner som kan användas i vyn.



###Förkompilera templaten {#kompilera}

Att kompilera en template kan göras på serversidan och templaten behöver då inte kompileras varje gång man renderar vyn. Här kan man göra effektiva sidor genom att välja hur man förbereder sina template.

En template behöver inte heller vara en del av HTML-sidan, det går bra att skicka den via JSON-datat. Eller så förkompilerar man de template som finns och lägger in de förkompilerade varianterna i HTML-sidan.

För att lyckas med liknande förberedelser behövs en utvecklingsprocess som stödjer att man *bygger* sin applikation. Applikationen byggs av flera fristående delar och var del behöver sin byggprocess. I detta fallet är det templates som behöver kompileras och sedan sammanfogas till en applikation.

Vi låter det vara som det är nu. Att bygga sin applikation på det viset jag pratar om, kräver en lite annorlunda utvecklingsmiljö och det får vi prata om en annan dag.

Du kan testa min lösning på [`handlebars.html`](webapp/repo/example/mithril/handlebars.html).



###Templates både på klient och server {#klient}

Att jobba med templates i sin webbapp är en variant på hur man kan dela upp sin kod så att man inte blandar HTML och innehåll/context. Det vi sett i detta stycket är templates på klientsidan. Man kan kan också jobba med templates på serversidan i webbapplikationer som är mer fokuserade på serverbaserad generering av HTML-sidorna.

Den templatemotor vi använde här, Handlebars, är en utbyggnad av [templatemotorn Mustache](https://mustache.github.io/) som finns till många olika programmeringsspråk, klient som server. En templatemotor kan vara ett bra verktyg när man skapar sina webbapplikationer och webbplatser.



###Avslutningsvis om template engines {#avsluttempl}

Att kika på templatehantering var ett sidospår till Mithril. Men, när jag personligen börjar med ett nytt ramverk så vill jag känna att jag har kontroll över koden och kan se vad jag kan göra och inte. Att använda Handlebars gav mig svar på att jag inte är helt bunden till Mithrils sätt att skapa innehållet.

Nu har vi ett par varianter på hur vi kan hantera innehåll i webbsidan och det finns alternativ på hur vi kan dela upp strukturen på en tänkt webapp. Det är bra det. Det ger oss kontroll.



Visa listview och navigera till undersida {#routelistview}
--------------------------------------

Hur var det nu med listvyn och navigeringen till en undersida? Kan vi lösa det med den router som nu finns? Ja, låt oss se hur det kan gå. Vi har alltså en listvy som såg ut så här.

[FIGURE src=/image/snapht15/mithril-diary-step2.png?w=w2 caption="En lista med olika alternativ, stylade med lite CSS."]

Nu skall vi lägga till så att en undersida visas när man klickar på ett alternativ i listan. Till detta skapar jag en ny exempelsida `diaryroutes.html`.



###Template för att rendera listan och sidan {#lvtemplates}

Jag börjar med de templates som jag vill ha. En för att visa listan och en för att visa undersidan.

Templaten `page_tpl` skall visa en undersida.

```html
<script id="page_tpl" type="text/template">
<article>
<img src="{{image}}">
<h1>{{{title}}}</h1>
<p>{{{content}}}</p>
</article>
</script>
```

Templaten `list_tpl` skall visa listan.

```html
<script id="list_tpl" type="text/template">
<ul class="listview">
{{#each items}}
    <a href="#/{{@index}}">
        <li>
            <img src="{{image}}">
            <h1>{{{title}}}</h1>
            <p>{{{content}}}</p>
        </li>
    </a>
{{/each}}
</ul>
</script>
```

Du kan se att jag använder `{{@index}}` som är det index i arrayen som skrivs ut. Med hjälp av det kan jag skapa en länk `href="#/{{@index}}"` till undersidan och senare koppla ihop länken med en position i JSON-objektets array.



###Uppdaterad struktur i JSON-filen {#lvjson}

För att min template `list_tpl` skall fungera med `{{#each items}}` så behöver jag uppdatera min JSON-fil till följande struktur.

```javascript
{
    "items": [
        {
            "title": "Mina husdjur",
            "content": "Här är mina husdjur som jag brukar prata med.",
            "image": "img/birds.jpg"
        },
```

Alla delarna ligger nu i en array som namnges med `items` vilket gör att templaten kan referera till den delen med `{{#each items}}`.



###En vy för Listyn {#lvlista}

Jag bygger en komponent `ListView` som hanterar visningen av listvyn. Det blir en kontroller som hämtar informationen från modellen och en vyn som använder templaten `list_tpl`.

```javascript
var ListView = {
    controller: function() {
        return { items: Diary.list() };
    },
    view: function(controller) {
        html = Template.compile("list_tpl", controller.items());
        return m("div", m.trust(html));
    }
};
```

Som du ser så har jag dolt koden för kompilering av templaten i en egen komponent `Template`.



###Egen komponent för Template {#lvtemplate}

För att ha mindre kod i vyerna så flyttade jag hanteringen av templaten till en egen komponent som ser ut så här.

```javascript
// Template
var Template = {
    compile: function(id, context) {
        var source   = document.getElementById(id).innerHTML;
        var template = Handlebars.compile(source);
        var html     = template(context);

        return html;
    }
};
```

Koden gör samma jobb som tidigare, men kan nu återanvändas från flera vyer. Så här anropar man kompileringen från en vy.

```javascript
html = Template.compile(templateId, context);
```

Kod som används flera gånger är bättre att placera i en egen komponent eller funktion. Det blir enklare att återanvända koden och att underhålla den.



###En router för att landa på en sida {#lvroute}

Nu uppdaterar jag routern och lägger till en ny route `/:id` för undersidorna som skall hanteras av en tänkt komponent `ListViewPage`.

```javascript
// Routes
m.route(document.getElementById("main"), "/", {
    "/": ListView,
    "/:id": ListViewPage,
});

m.route.mode = "hash";
```

Id:et är alltså sidornas position i JSON-objektets array och jag kommer åt värdet på `:id` i min kontroller.



###En vy för respektive sida {#lvsida}

För att matcha den nya routern så skapar jag en ny komponent `ListViewPage` som ser ut så här.

```javascript
var ListViewPage = {
    controller: function() {
        var id = m.route.param("id");
        return { item: Diary.item(id) }
    },
    view: function(controller) {
        html = Template.compile("page_tpl", controller.item);
        return m("div", m.trust(html));
    }
};
```

Vyn använder templaten `page_tpl` och får sitt context från `controller.item`. Kontrollern börjar med att hämta ut värdet på parametern `id` med funktionen `m.route.param("id")`.

Sedan använder kontrollern värdet på `id` för att hämta ut endast den delen från modellen som fått en ny metod i `Diary.item(id)`.



###Modellen hämtar data endast en gång {#lvmodel}

Kvar är den uppdaterade modellen.

```javascript
// Model
var Diary = {
    items: null, 

    list: function() {
        if (this.items === null) {
            this.items = m.request({method: "GET", url: "json/diaryextended.json"});
        }
        return this.items;
    },
    
    item: function(id) {
        json = this.items();
        return json.items[id];
    }
};
```

Först har jag ändrat så att JSON-objektet endast hämtas en gång. Om det redan är hämtat så behövs det inte hämtas igen, ialla fall i detta sammanhanget. Om en applikation skall spara undan information, *cacha*, beror på hur applikationen är tänkt att fungera. I detta fallet är det bra att spara undan svaret och inte hämta det fler gånger.

Den nya metoden `item: function(id) {` använder JSON-objektet och returnerar bara den delen som efterfrågas. Värdet på `id` är ett index i arrayen för `items`, resultatet blir att endast ett item returneras.

Det som ligger i `this.items` är egentligen inte ett JSON-objekt, det är en function `m.prop` som är en lagringsplats, en setter/getter av värden, som också fungerar med den asynkrona programmeringsmodellen som `m.request` innebär. När applikationen utför en `m.request()` så är det en asynkron operation som lagrar sitt svar i en `m.prop`. När svaret är redo kan man använda `m.prop` för att hämta det, innan svaret är klart så innehåller `m.prop` värdet undefined.

Du kan testa mitt exempel på [`diaryroutes.html`](webapp/repo/example/mithril/diaryroutes.html).



Avslutningsvis {#avslutning}
--------------------------------------

Det finns många olika varianter på MVC-liknande ramverk för klientbaserad utveckling av JavaScript. På webbplatsen [TodoMVC](http://todomvc.com/) kan du se en översikt av några av dem och jämföra hur deras kod ser ut när man bygger en Todo applikation.

Att använda designmönstret MVC kan ge dig en god uppdelning av din kod i olika delar som har olika syften. Det ger en god grund för en bra arkitektur i din applikation.

Mithril är en spännande lösning på klientbaserad programmering med JavaScript. Det är inte helt enkelt att komma in i det, men koden är liten och överskådlig. Personligen uppskattar jag mer tydlig kod i Mithril än *magin* i jQuery Mobile. Men var sak kan ha sitt användningsområde. Det vi saknar här är de GUI-element som vi får gratis i jQm. Det är alltid fördelar och nackdelar att väga mot varandra.

Har du [tips, förslag eller frågor om artikeln](t/4778) så finns det en specifik forumtråd för det.
