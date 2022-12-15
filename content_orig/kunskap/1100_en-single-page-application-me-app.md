---
author: efo
category: javascript
revision:
  "2018-01-04": (A, efo) Första utgåvan inför kursen webapp-v3 V18.
...
En Single Page Application me-app
==================================

[FIGURE src=image/webapp/javascript-logo.png?w=c5 class="right"]

Vi ska i denna övning skapa en me-app i HTML5, CSS3 och JavaScript. Vi gör ett medvetet val om design för att vi ska få ett utseende som liknar en "native" mobil-app. Vi skapar navigation anpassat för små enheter, men som även fungerar för stora. Webbläsarens inbyggda teknologier används för att hämta data från ett JSON API och vi gör en redovisningssida, som är lättläst på alla enheter.



<!--more-->



Vi rekommenderar att du kodar med i denna övning så du själv får känna på hur det är att skriva en Single Page Application (SPA). Du kan spara din kod i katalogen `me/redovisa`, där du sedan kan bygga vidare på din me-app.

Exempelprogrammet från denna övning finns i kursrepot [example/redovisa](https://github.com/dbwebb-se/webapp/tree/master/example/redovisa) och i `example/redovisa`.



Grunden i HTML {#html}
--------------------------------------
Som med allt annat vi gör för webben behöver vi en HTML fil. Vi börjar med en enkel sida `index.html`, som inte kommer utvecklas mycket under övningens och kursens gång. Detta blir grunden för alla HTML-element, som vi sedan renderar med hjälp av JavaScript.

```html
<!-- index.html -->

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Me-app</title>

    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="root"></div>

    <script type="text/javascript" src="main.js"></script>
</body>
</html>
```

Vårt tränade öga ser direkt att vi behöver två filer `style.css` för vår CSS kod och `main.js` för vår JavaScript kod. Vi skapar dessa två filer enkelt med `touch`.

```bash
# stå i me/redovisa

touch style.css
touch main.js
```

Vi har nu allt vi behöver för vår Single Page Application me-app.



Rendera HTML-element i JavaScript {#html-element}
--------------------------------------
Då vi inte har några element på HTML sidan än så länge, förutom vårt rot-element `<div id="root"></div>`, öppnar vi upp `main.js`.

```javascript
// main.js

"use strict";

(function () {
    var rootElement = document.getElementById("root");

})();
```

För att vi ska kunna lägga till fler element börjar vi med att hämta ut rot-elementet `#root`. Detta görs som vi har sett tidigare med funktionen `document.getElementById()`. Kodraden är skriven inuti en IIFE (Immediately-Invoked Function Expression), som säkerställer att vi inte skräpar ner den globala namn rymden. Nu är vi redo för att lägga till element i rot-elementet. Detta görs med funktionerna `document.createElement()` och `element.appendChild()`. Vi tilldelar även klasser och innehåll med hjälp av attributen `className` och `textContent`. I [dokumentationen](https://developer.mozilla.org/en-US/docs/Web/API/Element) för element finns alla attribut.

```javascript
// main.js

"use strict";

(function () {
    var rootElement = document.getElementById("root");

    var mainContainer = document.createElement("main");

    mainContainer.className = "container";

    var title = document.createElement("h1");

    title.className = "title";
    title.textContent = "Emil Folino";

    mainContainer.appendChild(title);
    rootElement.appendChild(mainContainer);
})();
```

Vi har nu en enkel sida med en `main.container` och vårt namn som ett `h1`-element,  som ser ut ungefär som skärmbilden nedan beroende på webbläsare. Jag använder "Responsive Design Mode" i valfri webbläsare för att få det att se ut som en mobil enhet. Mikael visar i detta [tips](coachen/developer-tools-i-webblasaren-for-mobila-enheter) hur du kan använda utvecklareverktyg specifikt för mobila enheter.

[FIGURE src=image/webapp/screenshot_namn.png?w=c8 caption="Vårt första utkast."]

> Men Emil hade det inte varit enklare att bara lägga till det i `index.html`, är ju 3 rader HTML-kod och sen är vi klara med detta.

Just nu kanske det känns onödigt, men när vi i slutet av övningen har fyra olika vyer och dynamisk växling mellan dessa är det mer rimligt med alla dessa rader kod för att skriva ut ett namn. Ett simpelt exempel som kan visa på de dynamiska egenskaperna med att rendera HTML-element med hjälp av JavaScript är om vi lägger till en liten hälsning i me-appen.

```javascript
// main.js

"use strict";

(function () {
    var rootElement = document.getElementById("root");

    var mainContainer = document.createElement("main");

    mainContainer.className = "container";

    var title = document.createElement("h1");

    title.className = "title";
    title.textContent = "Emil Folino";

    var greeting = document.createElement("p");
    var timeOfDayGreeting = "Hej";
    var now = new Date();

    if (now.getHours() < 10) {
        timeOfDayGreeting = "Godmorgon";
    } else if (now.getHours() >= 17) {
        timeOfDayGreeting = "God kväll";
    }

    greeting.textContent = timeOfDayGreeting +
        ", jag heter Emil Folino och är lärare i kursen webapp.";

    mainContainer.appendChild(title);
    mainContainer.appendChild(greeting);

    rootElement.appendChild(mainContainer);
})();
```

Nu har vi en hälsning, som beroende av tiden på dagen, skriver ut olika öppningsfraser. En liten dynamisk del av sidan som visar på en av styrkorna hos JavaScript. Notera gärna ordningen som vi använder funktionen `appendChild()`. Vi lägger först till `title` och `greeting` i `mainContainer` innan vi lägger till den i rot-elementet.

Innan vi ser till att vår me-app blir snyggare med hjälp av CSS lägger vi till ytterligare ett element. En meny som vi senare med hjälp av CSS kommer placera i botten av skärmen för att underlätta för navigation på mobila enheter.

```javascript
"use strict";

(function () {
    var rootElement = document.getElementById("root");

    var mainContainer = document.createElement("main");

    mainContainer.className = "container";

    var title = document.createElement("h1");

    title.className = "title";
    title.textContent = "Emil Folino";

    var greeting = document.createElement("p");
    var timeOfDayGreeting = "Hej";
    var now = new Date();

    if (now.getHours() <= 10) {
        timeOfDayGreeting = "Godmorgon";
    } else if (now.getHours() >= 17) {
        timeOfDayGreeting = "God kväll";
    }

    greeting.textContent = timeOfDayGreeting +
        ", jag heter Emil Folino och är lärare i kursen webapp.";

    mainContainer.appendChild(title);
    mainContainer.appendChild(greeting);

    rootElement.appendChild(mainContainer);

    var navigation = document.createElement("nav");

    navigation.className = "bottom-nav";

    var navElements = ["Me", "Om", "Github", "Redovisning"];

    navElements.forEach(function (element) {
        var navElement = document.createElement("a");

        navElement.textContent = element;
        navigation.appendChild(navElement);
    });

    rootElement.appendChild(navigation);
})();
```

Navigationen skapas som ett element med fyra stycken länkar i. En loop används, då vi vill skapa fyra exakt likadana element förutom texten i länken. Ta gärna en stund och titta igenom JavaScript koden som vi har skrivit än så länge. Förstår du alla delar?

Nedan syns resultatet och som vi ser är vi definitivt redo för att börja jobba med utseendet för vår me-app.

[FIGURE src=image/webapp/screenshot_beforecss.png?w=c8 caption="Vår me-app utan styling."]



CSS {#css}
--------------------------------------
Vi börjar med att normalisera stilen så att grunden blir den samma oavsett vilken webbläsare våra användare tycker om att titta på våra mobila applikationer i. Vi använder oss av [normalize.css](https://necolas.github.io/normalize.css/) som enklast laddas ner genom att använda `wget`.

```bash
# me/redovisa
wget https://necolas.github.io/normalize.css/8.0.0/normalize.css -O normalize.min.css
```

Vi lägger till `normalize.min.css` filen i `index.html` så den laddas och kan nollställa ursprungsstilen i olika webbläsare. Notera att jag lägger till `normalize.min.css` innan vår än så länge tomma `style.css`.

```html
<!-- index.html -->
...
<title>Me-app</title>

<link rel="stylesheet" href="normalize.min.css" />
<link rel="stylesheet" href="style.css" />
...
```

Tanken är att vi ska ha en navigationsmeny längst nere på skärmen, som man känner igen det från många mobil-appar. Menyn ligger längst nere på skärmen för att underlätta för användaren av den mobila enheten. Nedan finns exempel på en meny längst ner i en mobil-app, till vänster syns det på android och till höger i iOS.

[FIGURE src=image/webapp/ios-bottom-menu.jpeg?w=c7 class="right" caption="Meny längst ner på iOS."]

[FIGURE src=image/webapp/android-bottom-menu.png?w=c7 caption="Meny längst ner på android."]

Vi börjar med att placera menyn längst ner på skärmen och samtidigt fylla ut hela bredden genom att använda följande CSS.

```css
/* style.css */

.bottom-nav {
    position: fixed;
    bottom: 0;
    overflow: hidden;
    width: 100%;
}
```

Vi sätter positionen med värdet `fixed` och att vi vill ha den längst ner på skärmen med `bottom: 0;`. Vi använder `overflow: hidden;` för att inte få problem med scrolling där vi inte vill ha det. För att fördela länkarna jämt i menyn använder vi [flexbox](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Basic_Concepts_of_Flexbox). Flexbox är en förhållandevis ny teknik för att skapa 1-endimensionella layouter på ett enkelt sätt. I detta tillfälle använder vi följande attribut.

```css
/* style.css */

.bottom-nav {
    position: fixed;
    bottom: 0;
    overflow: hidden;
    width: 100%;
    display: flex;
    flex-flow: row | nowrap;
    justify-content: space-around;
}
```

Vi anger att vår meny ska använda sig av flexbox med attributet `display: flex;`. Attributet `flex-flow: row | nowrap;` är kort notation för  `flex-direction: row;` och `flex-wrap: nowrap;` och vi vill här att länkarna ska lägga sig på en rad och med attributet `justify-content: space-around;` fördelar vi ut länkarna jämt i menyn. I exemplet nedan ser vi hur det kan se när man har lagt sin menyn längst ner på skärmen. Vi kommer använda flexbox under kursens gång så oroa dig inte om du inte känner att du har fullt koll på flexbox, vi kommer bygga vidare på flexbox i kursen.

[FIGURE src=image/webapp/screenshot-styled-menu.png?w=c8  caption="Menyn är nu på plats längst ner."]

Jag har i exemplet lagt till ikoner i menyn med hjälp av [Material icons](http://materializecss.com/icons.html) och lagt till lite mellanrum uppe och nere. Dessutom har jag vald ett annat typsnitt än standard vilket gör att min mobila-app redan ser mycket trevligare ut.

En me-app är ingen riktig me-app utan en bild, så vi lägger till några rader kod för att få till den sista lilla detaljen. Och i `style.css` lägger vi till att bilden ska fylla ut hela bredden av `.container` så den varken är större eller mindre beroende på bildstorlek.

```javascript
// main.js

...
var image = document.createElement("img");

image.src = "emilfolino.jpg";
image.alt = "Emil Folino";

mainContainer.appendChild(title);
mainContainer.appendChild(greeting);
mainContainer.appendChild(image);
...
```

```css
/* style.css */

.container img {
    width: 100%;
}
```

Vi är nu klar med Me-sidan och kan fokusera på resten av vyerna.

[FIGURE src=image/webapp/screenshot-with-image.png?w=c8  caption="En bild hör sig till."]



Navigation mellan vyerna {#navigation}
--------------------------------------

Nu har vi en fin meny, men än så länge är det, det enda den är. För att underlätta när vi ska navigera mellan de olika vyerna och för att ta ett första steg i att strukturera vår kod bryter vi ut renderingen av menyn och renderingen av Me-vyn till var sin funktion. Det sista vi gör i `main.js` är att anropa funktionen `showHome()`, som i sin tur anropar `showMenu()` för att visa menyn. Jag har även flyttat ut skapandet av grund HTML-elementen utanför funktionerna.

```javascript
"use strict";

(function () {
    var rootElement = document.getElementById("root");

    var mainContainer = document.createElement("main");

    mainContainer.className = "container";

    var navigation = document.createElement("nav");

    navigation.className = "bottom-nav";

    var showHome = function () {
        mainContainer.innerHTML = "";

        var title = document.createElement("h1");

        title.className = "title";
        title.textContent = "Emil Folino";

        var greeting = document.createElement("p");
        var timeOfDayGreeting = "Hej";
        var now = new Date();

        if (now.getHours() <= 10) {
            timeOfDayGreeting = "Godmorgon";
        } else if (now.getHours() >= 17) {
            timeOfDayGreeting = "God kväll";
        }

        greeting.textContent = timeOfDayGreeting +
            ", jag heter Emil Folino och är lärare i kursen webapp. ";

        mainContainer.appendChild(title);
        mainContainer.appendChild(greeting);

        rootElement.appendChild(mainContainer);

        showMenu("home");
    };

    var showMenu = function (selected) {
        navigation.innerHTML = "";

        var navElements = [
            {name: "Me", class: "home", nav: showHome},
            {name: "Om", class: "free_breakfast", nav: showAbout},
            {name: "Github", class: "folder", nav: showGithub}
        ];

        navElements.forEach(function (element) {
            var navElement = document.createElement("a");

            if (selected === element.class) {
                navElement.className = "active";
            }

            navElement.addEventListener("click", element.nav);

            var icon = document.createElement("i");

            icon.className = "material-icons";
            icon.textContent = element.class;
            navElement.appendChild(icon);

            var text = document.createElement("span");

            text.className = "icon-text";
            text.textContent = element.name;
            navElement.appendChild(text);

            navigation.appendChild(navElement);
        });

        rootElement.appendChild(navigation);
    };

    showHome();
})();
```

I början av varje funktion som ritar upp en vy eller en del av en vy rensar jag elementet som vyn ska ritas i med hjälp av attributet `innerHTML`. Denna funktion kommer även vara användbar när vi ska skapa redovisningssidan där vi ska lägga stora mängder formaterat text.

Vi hade tidigare definierat våra länkar i menyn `var navElements = ["Me", "Om", "Github", "Redovisning"];` som en array med bara namnen. Denna array har jag i detta exempel bytt ut till en array av objekt. Dels för att lägga till ikoner med en specifik class, men objekten innehåller även funktionen som anropas när man klickar på länken i menyn. När länken sedan skapas läggs det till en `EventListener` för varje länk och funktionen som renderar vyn skickas med som argument. Detta är ett sätt att få till navigationen. Leka gärna runt med koden för att få till det på exakt det sättet du vill ha. Vyerna Me, Om och Redovisning är oerhört lika och borde inte innebära några problem att skapa. I nästa del av övningen ska vi titta på hur vi hämtar data från GitHubs API för att visa upp repon på GitHub sidan i me-appen.



Hämta data från ett API {#api}
--------------------------------------
Än så länge har all data i vår me-app varit statisk och hårdkodat. Vi ska i denna del av övningen titta på hur vi kan hämta JSON data från ett API och hur vi sedan renderar data i en vy. Vi börjar med att använda [XMLHttpRequest](https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest) för att sedan går över till det förenklade och modernare [Fetch API](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API). Vi vill hämta data från Github och som alltid när du använder ett API är [dokumentationen](https://developer.github.com/v3/) din bästa vän.

Funktionen `showGithub()` börjar som de andra vy funktionen med att vi rensar `mainContainer` och skapar ett titel element. Vi skapar därefter en `XMLHttpRequest` genom följande fyra rader kod.

```javascript
var githubRequest = new XMLHttpRequest();

githubRequest.addEventListener("load", renderGithubRepos);
githubRequest.open("GET", "https://api.github.com/users/:username/repos");
githubRequest.send();
```

Först skapar vi ett `XMLHttpRequest` objekt `githubRequest`. Då hämtning av data från ett API är en asynkron process skapar vi en `EventListener` för händelsen `load` för `githubRequest`. Vi tilldelar en callback funktion `renderGithubRepos`, som anropas när vi har laddat data. De två sista raderna definierar vilket sorts anrop vi vill göra `GET` och den URL vi vill anropa. Byt ut `:username` mot ditt Github användarnamn så hämtar du dina egna repon. Sista raden skickar iväg anropet till Githubs api. Om du inte har ett konto på GitHub kan du använda dig av dbwebb-organisationens repon, URL'n till de repos är [https://api.github.com/users/dbwebb-se/repos](https://api.github.com/users/dbwebb-se/repos). När vi får tillbaka svar anropas funktionen `renderGithubRepos`, som vi tilldelade som callback funktion när vi la till vår `EventListener`.

```javascript
var renderGithubRepos = function () {
    var repos = JSON.parse(this.responseText);

    repos.forEach(function(repo) {
        var repoElement = document.createElement("p");

        repoElement.textContent = repo.name;
        mainContainer.appendChild(repoElement);
    });

    rootElement.appendChild(mainContainer);

    showMenu("folder");
};
```

I variabeln `this` finns svaret vi fick tillbaka från Githubs API. Undersöka gärna vad som finns i svaret genom att använda `console.log(this)`. Vi ser att `this.responseText` innehåller arrayen, som en text sträng, med svaret vi förväntade oss och vi gör om text strängen till JSON med hjälp av funktionen `JSON.parse(this.responseText)`. Vi kan nu skriva ut våra repon som element i `mainContainer`.

Om vi vill använda oss av det modernare Fetch API kan koden se ut på följande sätt.

```javascript
fetch("https://api.github.com/users/:username/repos")
.then(function (response) {
    return response.json();
}).then(function(data) {
    data.forEach(function(repo) {
        var repoElement = document.createElement("p");

        repoElement.textContent = repo.name;
        mainContainer.appendChild(repoElement);
    });

    rootElement.appendChild(mainContainer);

    showMenu("folder");
});
```

`fetch` anropas med URL'en för Githubs API på samma sätt som `XMLHttpRequest`. `fetch` returnerar ett promise, som vi tar hand om med `then`. Här returnerar vi svaret som JSON och ytterligare ett promise tar sedan hand om JSON data och renderar våra repon i vyn på samma sätt som för `XMLHttpRequest`.

Det är upp till er själva vad ni tycker verkar smidigast. `XMLHttpRequest` har hängt med ett tag och utgör stommen i AJAX, som revolutionerade webben runt år 2007. `fetch` är ett nyare alternativ som utnyttjar promise för att ta hand om data som hämtas. Genom att utnyttja promise blir felhantering lättare och ger även möjlighet för rendering i samma funktion som vi gör anropet.

För att ta hand om eventuella fel som uppstår under hämtning av data kan vi använda oss av `.catch` på vårt `fetch` promise. Här väljer vi sedan att skriva ut felmeddelandet.

```javascript
fetch("https://api.github.com/users/:username/repos")
.then(function (response) {
    return response.json();
}).then(function(data) {
    data.forEach(function(repo) {
        var repoElement = document.createElement("p");

        repoElement.textContent = repo.name;
        mainContainer.appendChild(repoElement);
    });

    rootElement.appendChild(mainContainer);

    showMenu("folder");
}).catch(function(error) {
    console.log('The fetch operation failed due to the following error: ', error.message);
});
```



Strukturera koden {#strukturera}
--------------------------------------
Vi har nu en del kod både i vår `main.js` och i `style.css` så nu är det dags att strukturera upp koden lite grann så vi har ett bra utgångspunkt. Vi gör detta med hjälp av module pattern och delar upp `main.js` i sex olika filer.

Vi börjar med att göra vår grund HTML-element till en del av window objektet, så vi kommer åt de i alla JavaScript filer. Det sista vi gör i `main.js` är att anropa `showHome` funktionen för att visa upp me-vyn.

```javascript
// main.js
"use strict";

(function () {
    window.rootElement = document.getElementById("root");

    window.mainContainer = document.createElement("main");
    window.mainContainer.className = "container";

    window.navigation = document.createElement("nav");
    window.navigation.className = "bottom-nav";

    home.showHome();
})();
```

Vi måste nu skapa en fil för varje vy och en för menyn. I följande exempel visas Me-vyn i filen `home.js`. Samma princip som visas i exemplet nedan gäller för alla vyer och menyn.

```javascript
"use strict";

var home = (function () {
    var showHome = function () {
        window.mainContainer.innerHTML = "";

        var title = document.createElement("h1");

        title.className = "title";
        title.textContent = "Emil Folino";

        var greeting = document.createElement("p");
        var timeOfDayGreeting = "Hej";
        var now = new Date();

        if (now.getHours() <= 10) {
            timeOfDayGreeting = "Godmorgon";
        } else if (now.getHours() >= 17) {
            timeOfDayGreeting = "God kväll";
        }

        greeting.textContent = timeOfDayGreeting +
            ", jag heter Emil Folino och är lärare i kursen webapp. ";

        window.mainContainer.appendChild(title);
        window.mainContainer.appendChild(greeting);

        window.rootElement.appendChild(window.mainContainer);

        menu.showMenu("home");
    };

    return {
        showHome: showHome
    };
})(home);
```

Vi skapar ett `home` objekt/modul och vi returnerar `showHome` funktionen. Vi kan sedan använda `home` modulen i de andra moduler för att anropa funktionen. Notera att för att komma åt våra grundelement använder vi till exempel `window.rootElement` istället för `rootElement`.

För att kunna använda dessa nya JavaScript filer inkluderas de i `index.html`. Viktigt att `main.js` är sist i ordningen då modulerna måste vara definierade innan vi kan använda modulerna.

```html
<body>
    <div id="root"></div>

    <script type="text/javascript" src="menu.js"></script>
    <script type="text/javascript" src="home.js"></script>
    <script type="text/javascript" src="about.js"></script>
    <script type="text/javascript" src="github.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
```



### Statisk kodvalidering {#validate}

Den statiska kodvalideringen som körs med kommandot `dbwebb validate` tittar bara på en fil i taget. Därför känner validatorn inte till de andra filerna som vi importerade i `ìndex.html`. För att undvika valideringsfel när vi bryter ut vyerna till egna moduler kan man använda `/* global [variabel_namn] [annat_variabel_namn] */` längst upp i filen för de variabler man vill ska vara fördefinierade.



Redovisningstext från markdown {#markdown}
--------------------------------------

Vissa upplever att det inte är helt lätt att skriva redovisningstexter med hjälp av `innerHTML` eller `appendChild`. I detta stycket ska vi titta på hur man kan använda markdown för att skriva sina redovisningstexter. Det är inget krav att skriva texterna i markdown, men kan underlätta och vi får i detta stycke möjlighet för att repetera ovanstående kunskap.

Markdown har använts i kursen [design](kurser/design-v2) innan och [dokumentation](https://daringfireball.net/projects/markdown/) av formatet kan vara bra att ha bredvid sig när man skriver. Markdown är lättlästa strukturerade text filer som på ett enkelt sätt kan konverteras till HTML.

Vi börjar med att skapa en fil `report.js` där vi vill visa redovisningstexter. Denna filen kan utgå från liknande filer till exempel `github.js`. Jag skapar dessutom en katalog `markdown` där jag lägger en enkel markdown fil `kmom01.md` enligt nedan.

```markdown
# kmom01

__Är du sedan tidigare bekant med utveckling av mobila appar?__

__Vilket är den viktigaste lärdomen du gjort om typografi för mobila enheter?__

__Du har i kursmomentet hämtat data från två stycken API. Hur kändes detta?__

__Vilken är din TIL för detta kmom?__
```

I detta exempel kommer vi ladda markdown-filerna med `fetch` eller `XMLHttpRequest` och sedan rendera som HTML med en markdown-modul. Först lägger vi till markdown-modulen med hjälp av ett Content Delivery Network (CDN). Ett CDN är ett nätverk av servrar som skickar statiska filer till klienter över hela världen. [Dokumentation för modulen](https://github.com/markdown-it/markdown-it) är bra att ha till hands när vi fortsätter utvecklingen. **`fetch` fungerar bara via en webbserver så det går inte att öppna filen direkt i webbläsaren, men du kan ladda filen via din lokala webbserver.**

```html
<body>
    <div id="root"></div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/10.0.0/markdown-it.min.js"></script>
    <script type="text/javascript" src="menu.js"></script>
    <script type="text/javascript" src="home.js"></script>
    <script type="text/javascript" src="about.js"></script>
    <script type="text/javascript" src="github.js"></script>
    <script type="text/javascript" src="report.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
```

När vi laddar in modulen `markdown-it` läggs modulen till på `window` objektet och vi kommer åt det via `window.markdownit()`. Vi vill alltså först hämta in markdown filen, jag använder `fetch` i detta exempel, och sedan rendera HTML med hjälp av `window.markdownit()`. Vi hämtar den lokala filen genom att ange en relativ sökväg till filen. Vi gör sedan om `response` objektet till text och använder modulen `window.markdownit()` för att rendera HTML.

```javascript
var md = window.markdownit();

var report = (function () {
    var showReport = function () {
        window.mainContainer.innerHTML = "";

        fetch("markdown/kmom01.md")
            .then(function(response) {
                return response.text();
            })
            .then(function(result) {
                window.mainContainer.innerHTML = md.render(result);
            });

        menu.showMenu("people");
    };

    return {
        showReport: showReport
    };
})(report);
```



Avslutningsvis {#avslutning}
--------------------------------------
Vi har nu skapat en början till en me-app. Vi har fyra olika vyer och navigation för att ta oss mellan vyerna. Vi har sett hur vi kan använda en `EventListener` för att gå mellan de olika vyerna och vi har skapat en lättanvänt meny för mobila enheter. Vi har strukturerat vår kod enligt module pattern och har en bra grund i vår CSS, som blir enkel att bygga vidare på.

Om du har frågor eller tips så finns det en särskild [tråd i forumet](t/7312) om denna artikeln.

Exempelprogrammet från denna övning finns i kursrepot [example/redovisa](https://github.com/dbwebb-se/webapp/tree/master/example/redovisa) och i `example/redovisa`.
