---
author: moc
category:
    - npm
    - sass
    - design
revision:
    "2020-09-29": (A, moc) Skapad inför HT2020.
...
Kom igång med SASS och npm {#intro}
=====================================

Vi har tidigare i kursen skrivit CSS kod för att styla våran webbsida. Även om CSS nu stödjer variabler så saknar den fortfarande funktionalitet som funktioner och matematiska operationer.
Vi skall i denna övningen titta på hur man kan använda sig av pakethanteraren `npm` för att bland annat underlätta stylandet och förbättra webbplatsens laddningstid.

<!--more-->

Förutsättningar {#forutsattningar}
-------------------------------------
Du har installerat [nodejs och npm](https://dbwebb.se/kunskap/installera-node-och-npm).

Innan du börjar övningen {#innan}
-------------------------------------
Denna övning är tänkt att göras i ditt egna tema. Om du känner dig osäker så kan du alltid göra en kopia på ditt tema (ex `theme/aurora` till `theme/auroratest`) innan du påbörjar övningen så kan du alltid gå tillbaka till något du vet fungerade.

Du kan uppnå samma sak med hjälp utav `git` genom att göra `git restore <filnamn>` så länge du inte gjort en commit på dina ändringar. Det återställer filen till så den var vid din senaste commit av den filen. Du kan se vilka filer du uppdaterat med hjälp utav `git status`.


Installera SASS, stylelint och normalize.css via npm {#installera-med-npm}
---------------------------------------------------------------------------
Npm (Node Package Manager) är JavaScripts pakethanterare och världens största programvaruregister med över 800,000 paket. Vem som helst kan publicera sina paket här så det gäller att vara lite försiktig med vad man installerar och använder.

Vi skall använda detta för att installera tre stycken paket:

* [`sass`](https://www.npmjs.com/package/sass) som är en CSS preprocessor vilket tillåter oss att få en bättre struktur. Det kommer ge oss stöd att använda variabler, ta nytta av flera inbyggda funktioner samt göra egna funktioner för att göra vår kod mer återanvändbar och lättare att ändra.   
* [`stylelint`](https://www.npmjs.com/package/stylelint) och [`stylelint-config-sass-guidelines`](https://www.npmjs.com/package/stylelint-config-sass-guidelines) som kommer att validera `.scss` koden vi skriver.
* [`normalize.css`](https://www.npmjs.com/package/normalize.css) vilket är en vanlig CSS fil som man även kan ladda ner utanför npm. Denna skall vi använda för att normalisera vår style mellan olika webbläsare då, alla har sina egna default värden som gör att våran webbsida kan ha olika margins, paddings, typografi med mera.

Vi börjar med att initiera en grund, en `package.json` fil som innehåller alla våra paket och scripts för vårt projekt.

```bash
# gå till me
$ cd portfolio/themes
$ npm init --yes
```

Vi använder `--save-dev` för att det ska sparas som en modul vi endast behöver när vi utvecklar i `package.json`. Om projektet skulle vara beroende av modulen när den skall köras använder vi `--save` istället.

```bash
$ npm install --save-dev normalize.css sass stylelint stylelint-config-sass-guidelines
```

Det kan hända att du får varningar när du kör ovanstående kommandon, men dessa kan du ignorera.

Nu när allt är installerat kommer vår `package.json` likna:

```json
{
  "name": "themes",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "",
  "license": "ISC",
  "devDependencies": {
    "normalize.css": "^8.0.1",
    "sass": "^1.26.11",
    "stylelint": "^13.7.2",
    "stylelint-config-sass-guidelines": "^7.1.0"
  }
}
```

Vi kan se att det även har genererats en ny fil `package-lock.json` som innehåller en exakt kopia av alla våra modulers tillsammans med deras `dependencies` (moduler de behöver) så andra installationer kan få ett identisk träd av moduler, oavsett om paketen har uppdaterats eller ej.   
Det har också skapats en ny mapp `node_modules` där alla modulerna från `package.lock.json` ligger. Denna mappen lägger vi alltid i vår `.gitignore` eftersom den redan nu innehåller lite över 36MB data och växer exponentiellt för varje paket. Vill man ladda ner filerna igen skriver man kommandot `npm install`.

I vår `package.json` hittar vi `scripts`, den tar emot ett objekt av kommandon som kan nås med `npm run {kommando}`. Så för att både kunna validera och konvertera våra `.scss` filer till `.css` behöver vi då lägga till följande:

```json
scripts: {
  ...,
  "lint": "stylelint \"**/*.scss\"",
  "style": "sass playful/scss/style.scss playful/css/style.css --no-source-map",
  "style-min": "sass playful/scss/style.scss playful/css/style.min.css --no-source-map --style compressed"
}
```
**Notera**: `playful` är mitt aktiva tema så byt ut det namnet så att det passar erat tema.

Vi behöver också skapa en till fil `.stylelintrc` där vi kommer definiera lint reglerna så att vi också kan validera våran SCSS kod.

```json
{
    "extends": [
        "stylelint-config-sass-guidelines"
    ],
    "rules": {
        "indentation": [
            4,
            {
                "except": [
                    "value"
                ]
            }
        ],
        "at-rule-no-unknown": null,
        "order/properties-alphabetical-order": null,
        "selector-max-compound-selectors": 5
    },
    "ignoreFiles": [
        "**/node_modules/",
        "shared/fontawesome/**/*.scss",
        "**/*.css",
        "**/*.min.css"
    ]
}
```

* `extends` ärver reglerna från andra filer. Här väljer vi att ärva ifrån `stylelint-config-sass-guidelines` som vi nyligen installerade.
* I `rules` kan man både skriva över regler från de ärvda filerna och lägga till egna.
* `ignoreFiles` kan man lägga till både mappar och filer som man inte vill validera. Här lägger vi till `node_modules` mappen `default` temat som pico genererar. Eftersom att vi kommer skriva SASS-filer och vår sida kommer använda `.min.css` så väljer vi även att exkludera `.css` filer.

Nu kan vi köra våran lint-validering lokalt innan vi kör validate, det går snabbare och är en bra övning inför arbetslivet. Så när ni jobbar lokalt så ska allt gå igenom `npm run lint` och när ni sen kör `dbwebb validate` så körs lint:en en sista gång.


Bygg CSS med SASS {#bygg-css-med-sass}
---------------------------------------
Jag fortsätter att utgå från ett nytt tema `playful` där jag leker runt för att kolla så att allting fungerar. Jag tänkte att jag skulle skapa en liten *alert-box* så att vi kan se hur vi kan använda det nya verktyget.

I `portfolio/themes/` börjar jag med att skapa en bas. Tanken är att man senare kan återanvända denna till kommande teman.

Det första jag gör är att skapa tre nya filer som jag sendan skall anpassa till mitt nya tema. Dessa lägger jag i mappen `themes/shared`. Jag skapar även huvudfilen för vårat nya tema.


```bash
# stå i portfolio/themes/
$ mkdir -p shared/scss playful/scss
$ touch shared/scss/variables.scss shared/scss/base.scss shared/scss/layout.scss
$ touch playful/scss/style.scss
```

Nu när filerna är skapade så börjar jag att definiera några variabler inuti i `shared/scss/variables.scss`. Här vill jag också sätta `!default` efter variablerna deklareras. Detta säger att *"Om variabeln inte redan finns definierat på något annat ställe, sätt mig som värde. Annars, använd den istället"*.

```scss
$base-color: #00f !default; // blue
$border-dark: rgba($base-color, 0.88) !default;
$alert-box-size: 600px !default;
```

I `shared/scss/base.scss` lägger jag in alla mina filer för bastemat.
```scss
@import '../../node_modules/normalize.css/normalize';
@import 'variables';
@import 'layout';
```
Som vi ser så behöver man inte ta med filändelsen när man importerar andra `.scss` eller `.css` filer.


I `themes/dbwebb/index.twig` skapar jag nu basutseendet för vår HTML och jag uppdaterar vår layout i `themes/shared/layout.scss`:

```html
<!-- index.twig -->
<div class="auto alert">
  <h1 class="auto">Alert!</h1>
</div>
```

```scss
// layout.scss
.auto {
    margin: auto;
    text-align: center;
}

.alert {
    background-color: $base-color;
    border: 1px solid $border-dark;
    height: $alert-box-size/2;
    width: $alert-box-size;
}
```

Slår vi ihop alla *shared* filer nu har vi en blå rektangel som är normaliserad och centrerad.


I `playful/scss/style.scss` kan jag nu importera basen vi nyss skapade.

```scss
@import '../../shared/scss/base';
```

Men innan det nya temat är helt klart vill jag ändra bakgrundsfärgen på `.alert` och dess `border`, så att färgen passar `playful` temat.

Innan vi importerar `shared/scss/base` (som innehåller `!default` variablerna) definierar jag `$base-color` så att layout filen kommer använda sig av den istället.

```scss
$base-color: #c6538c; // light pink

@import '../../shared/scss/base';
```

[FIGURE src=/image/design-v3/sass-alert-example.png]

Nu när allt är klart vill jag validera `.scss` filerna med kommandot `npm run lint`. Om allt är grönt är det bara att generera den nya css filen med `npm run style`.

Vill man istället skapa en minifierad version av CSS koden kan man använda sig av `npm run style-min`. En rekommendation är att använda denna då man slipper problem som kan uppkomma från `lint` kommandot och det även att det går snabbare för webbläsaren att ladda in minifierade filer.


Avsluningsvis  {#avslutningsvis}
-------------------------------------
Nu har vi lärt oss att använda `npm` för att sätta upp nya verktyg som kan användas när vi utvecklar. Det blev mycket nytt och det kan ta ett litet tag att komma in i allt.

Ett tips när ni börjar styla är att använda många variabler och dela upp koden i flera moduler så det lättare att återanvända. Glöm inte heller att strukturera allt på ett bra sätt, gruppera gärna dem i undermappar så att de blir enklare att hitta.

SASS dokumentation kan hittas på [sass-lang.com/documentation](https://sass-lang.com/documentation). SASS har två typer av syntax, en med `.sass` som är lite äldre och `.scss` vilket är nyare. Vi skall använda `.scss`.

Om det är några frågor eller om något är oklart, tveka inte att hojta till i Discord så kollar vi på det. Annars lycka till och kör på!
